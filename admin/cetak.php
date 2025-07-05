<?php
include("koneksi.php");

// Inisialisasi variabel
$result_data = null;

// Jika tombol filter ditekan
if(isset($_GET['filter'])) {
    $mulai = isset($_GET['mulai']) ? $_GET['mulai'] : '';
    $sampai = isset($_GET['sampai']) ? $_GET['sampai'] : '';
    
    if(!empty($mulai) && !empty($sampai)) {
        // Persiapkan query
        $sisip = "";
        $query2 = mysqli_query($conn, "SELECT * FROM data_pertanyaan");
        $jumlah_pertanyaan = mysqli_num_rows($query2);
        $no = 1;
        
        while($row2 = mysqli_fetch_array($query2)) {
            if($no == 1) {
                $sisip .= "MAX(CASE WHEN j.id_pertanyaan = ".$row2['id_pertanyaan']." THEN j.point_jawaban END) as jawaban".$no."";
            } else {
                $sisip .= ", MAX(CASE WHEN j.id_pertanyaan = ".$row2['id_pertanyaan']." THEN j.point_jawaban END) as jawaban".$no."";
            }
            $no++;
        }

        $where = "WHERE DATE(tgl_responden) BETWEEN '$mulai' AND '$sampai'";

        $result_data = mysqli_query($conn, "SELECT 
            r.id_responden,
            r.tgl_responden,
            r.nama_responden,
            $sisip
        FROM data_responden r
        LEFT JOIN data_jawaban j ON r.id_responden = j.id_responden
        $where
        GROUP BY r.id_responden, r.tgl_responden, r.nama_responden
        ORDER BY r.tgl_responden ASC");
    }
}

// Logika cetak Excel
if(isset($_POST['cetak'])) {
    // Validasi tanggal
    if(empty($_POST['mulai']) || empty($_POST['sampai'])) {
        echo "<script>alert('Silakan pilih tanggal terlebih dahulu!');</script>";
        exit;
    }
    
    $mulai = $_POST['mulai'];
    $sampai = $_POST['sampai'];
    
    // Persiapkan query untuk Excel
    $sisip = "";
    $query2 = mysqli_query($conn, "SELECT * FROM data_pertanyaan");
    $jumlah_pertanyaan = mysqli_num_rows($query2);
    $no = 1;
    
    while($row2 = mysqli_fetch_array($query2)) {
        if($no == 1) {
            $sisip .= "MAX(CASE WHEN j.id_pertanyaan = ".$row2['id_pertanyaan']." THEN j.point_jawaban END) as jawaban".$no."";
        } else {
            $sisip .= ", MAX(CASE WHEN j.id_pertanyaan = ".$row2['id_pertanyaan']." THEN j.point_jawaban END) as jawaban".$no."";
        }
        $no++;
    }

    $where = "WHERE DATE(r.tgl_responden) BETWEEN '$mulai' AND '$sampai'";
    
    $query = mysqli_query($conn, "SELECT 
        r.id_responden,
        r.tgl_responden,
        r.nama_responden,
        $sisip
    FROM data_responden r
    LEFT JOIN data_jawaban j ON r.id_responden = j.id_responden
    $where
    GROUP BY r.id_responden, r.tgl_responden, r.nama_responden
    ORDER BY r.tgl_responden ASC");

    // Set header untuk download Excel
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="hasil_pengukuran.xls"');
    header('Cache-Control: max-age=0');
    
    include('mamdani.php');
    
    echo '<table border="1">';
    echo '<tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Responden</th>';
    for($i = 1; $i <= $jumlah_pertanyaan; $i++) {
        echo "<th>P$i</th>";
    }
    echo '<th>Nilai Mamdani</th>
          <th>Kepuasan</th>
          </tr>';

    $no = 1;
    while($row = mysqli_fetch_assoc($query)) {
        $input_data = [];
        echo "<tr>";
        echo "<td>".$no++."</td>";
        echo "<td>".date('d-m-Y', strtotime($row['tgl_responden']))."</td>";
        echo "<td>".$row['nama_responden']."</td>";
        
        for($i = 1; $i <= $jumlah_pertanyaan; $i++) {
            $input_data[] = $row['jawaban'.$i];
            echo "<td>".$row['jawaban'.$i]."</td>";
        }
        
        $hasil = fuzzy_mamdani($input_data);
        echo "<td>".number_format($hasil, 2)."</td>";
        
        if ($hasil <= 2.0) {
            $keterangan = "Tidak Puas";
        } elseif ($hasil <= 3.5) {
            $keterangan = "Cukup Puas";
        } else {
            $keterangan = "Sangat Puas";
        }
        
        echo "<td>".$keterangan."</td>";
        echo "</tr>";
    }
    echo '</table>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan</title>
    <link rel="icon" href="../assetss/images/logo-pemda.ico" type="image/x-icon" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-5 py-20">
    
        <!-- Export Section -->
        <div class="bg-white rounded-lg shadow p-6 mb-8">
            <div class="text-center">
                <div class="mb-4">
                    <!-- Judul -->
                    <h3 class="text-2xl font-bold mb-8 text-start">CETAK LAPORAN</h3>
                    <!-- Icon -->
                    <img src="https://cdn-icons-png.flaticon.com/512/888/888850.png" 
                         alt="Excel Icon" 
                         class="w-16 h-16 mx-auto">
                </div>
                <h2 class="text-xl font-semibold mb-2">Export ke Excel</h2>
                <p class="text-gray-600 mb-4">Download data pendaftar dalam format Excel (.xls)</p>
                
                <?php if(!isset($_GET['filter']) || empty($_GET['mulai']) || empty($_GET['sampai'])): ?>
                    <!-- Tampilkan pesan jika tanggal belum dipilih -->
                    <div class="text-red-500 mb-4">
                        Silakan Pilih Tanggal dan Klik Filter Terlebih Dahulu
                    </div>
                    <button type="button" 
                            class="bg-gray-400 text-white font-semibold py-2 px-6 rounded-lg inline-flex items-center cursor-not-allowed"
                            disabled>
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                        </svg>
                        Download Excel
                    </button>
                <?php else: ?>
                    <!-- Form untuk download jika tanggal sudah dipilih -->
                    <form method="POST" action="cetak.php">
                        <input type="hidden" name="mulai" value="<?php echo $_GET['mulai']; ?>">
                        <input type="hidden" name="sampai" value="<?php echo $_GET['sampai']; ?>">
                        <button type="submit" 
                                name="cetak" 
                                class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-6 rounded-lg inline-flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                            Download Excel
                        </button>
                    </form>
                <?php endif; ?>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="bg-white rounded-lg shadow p-6">
            <form method="GET" class="space-y-4">
                <!-- Tambahkan hidden input untuk parameter page -->
                <input type="hidden" name="page" value="cetak.php">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 mb-2">Tanggal Mulai</label>
                        <input type="date" name="mulai" class="w-full px-4 py-2 border border-gray-300 rounded-lg" value="<?php echo isset($_GET['mulai']) ? $_GET['mulai'] : ''; ?>" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Tanggal Akhir</label>
                        <input type="date" name="sampai" class="w-full px-4 py-2 border border-gray-300 rounded-lg" value="<?php echo isset($_GET['sampai']) ? $_GET['sampai'] : ''; ?>" required>
                    </div>
                </div>
                <div>
                    <button type="submit" 
                            name="filter" 
                            class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg">
                        Filter
                    </button>
                </div>
            </form>
        </div>

        <!-- Tampilkan hasil filter -->
        <?php if(isset($_GET['filter']) && !empty($_GET['mulai']) && !empty($_GET['sampai'])): ?>
            <div class="bg-white rounded-lg shadow p-6 mt-8">
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2">No</th>
                                <th class="px-4 py-2">Tanggal</th>
                                <th class="px-4 py-2">Nama Responden</th>
                                <?php for($i = 1; $i <= $jumlah_pertanyaan; $i++): ?>
                                    <th class="px-4 py-2">P<?php echo $i; ?></th>
                                <?php endfor; ?>
                                <th class="px-4 py-2">Nilai Mamdani</th>
                                <th class="px-4 py-2">Kepuasan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            include('mamdani.php');
                            $no = 1;
                            // Untuk rata-rata
                            $sum_jawaban = array_fill(1, $jumlah_pertanyaan, 0);
                            $sum_mamdani = 0;
                            $total_row = 0;
                            if($result_data) {
                                while($row = mysqli_fetch_assoc($result_data)): 
                                    $input_data = [];
                            ?>
                                    <tr>
                                        <td class="border px-4 py-2"><?php echo $no++; ?></td>
                                        <td class="border px-4 py-2"><?php echo date('d-m-Y', strtotime($row['tgl_responden'])); ?></td>
                                        <td class="border px-4 py-2"><?php echo $row['nama_responden']; ?></td>
                                        <?php 
                                        for($i = 1; $i <= $jumlah_pertanyaan; $i++): 
                                            $input_data[] = $row['jawaban'.$i];
                                        ?>
                                            <td class="border px-4 py-2"><?php echo $row['jawaban'.$i]; ?></td>
                                        <?php 
                                            $sum_jawaban[$i] += $row['jawaban'.$i];
                                        endfor; 
                                        $hasil = fuzzy_mamdani($input_data);
                                        $sum_mamdani += $hasil;
                                        $keterangan = $hasil <= 2.0 ? "Tidak Puas" : ($hasil <= 3.5 ? "Cukup Puas" : "Sangat Puas");
                                        ?>
                                        <td class="border px-4 py-2"><?php echo number_format($hasil, 2); ?></td>
                                        <td class="border px-4 py-2"><?php echo $keterangan; ?></td>
                                    </tr>
                                <?php 
                                    $total_row++;
                                endwhile; 
                                // Baris rata-rata
                                if ($total_row > 0) {
                                    echo "<tr style='font-weight:bold;background:#f0f0f0;'>";
                                    echo "<td colspan='3' class='text-center'>Rata-rata</td>";
                                    for ($i = 1; $i <= $jumlah_pertanyaan; $i++) {
                                        echo "<td>" . number_format($sum_jawaban[$i] / $total_row, 2) . "</td>";
                                    }
                                    $avg_mamdani = $sum_mamdani / $total_row;
                                    echo "<td>" . number_format($avg_mamdani, 2) . "</td>";
                                    // Hasil kepuasan rata-rata
                                    if ($avg_mamdani <= 2.0) {
                                        $keterangan_avg = "Tidak Puas";
                                    } elseif ($avg_mamdani <= 3.5) {
                                        $keterangan_avg = "Cukup Puas";
                                    } else {
                                        $keterangan_avg = "Sangat Puas";
                                    }
                                    echo "<td>" . $keterangan_avg . "</td>";
                                    echo "</tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
