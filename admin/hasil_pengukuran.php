<?php

include('../koneksi.php');
?>

<head>
    <link rel="icon" href="../assetss/images/logo-pemda.ico" type="image/x-icon" />
</head>

<?php

?>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-xl font-bold text-bold">Hasil Pengukuran Survei</h3>
                        </div>
                        <div class="card-body">
                            <!-- Filter Section -->
                            <div class="row m-b-60">
                                <div class="col-md-4">
                                    <form method="GET" action="">
                                        <input type="hidden" name="page" value="hasil_pengukuran.php">
                                        <div class="form-group">
                                            <h4 class="text-xl font-bold text-bold">Filter Periode</h4>
                                            <select class="form-control" name="periode">
                                                <option value="">Semua Periode</option>
                                                <?php
                                                $query = mysqli_query($conn, "SELECT DISTINCT DATE_FORMAT(tgl_responden, '%Y-%m') as periode FROM data_responden  ORDER BY periode DESC");
                                                while ($row = mysqli_fetch_assoc($query)) {
                                                    $selected = (isset($_GET['periode']) && $_GET['periode'] == $row['periode']) ? 'selected' : '';
                                                    echo "<option value='" . $row['periode'] . "' $selected>" . date('F Y', strtotime($row['periode'] . '-01')) . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </form>
                                </div>
                            </div>

                            <!-- Statistics Cards -->
                            <div class="row m-b-30">
                                <div class="col-md-3">
                                    <div class="card bg-primary text-white">
                                        <div class="card-body">
                                            <h3 class="text-xl font-bold text-white">Total Responden</h3>
                                            <?php
                                            $where = "";
                                            $whered = "";
                                            if (isset($_GET['periode']) && $_GET['periode'] != "") {
                                                $periode = $_GET['periode'];
                                                $where = " DATE_FORMAT(data_responden.tgl_responden, '%Y-%m') = '$periode'";
                                                $whered = " WHERE DATE_FORMAT(data_responden.tgl_responden, '%Y-%m') = '$periode'";
                                            }
                                            $query = mysqli_query($conn, "SELECT COUNT(DISTINCT data_responden.id_responden) as total FROM data_responden $whered");
                                            $total = mysqli_fetch_assoc($query)['total'];
                                            ?>
                                            <h2 class="text-xl font-bold text-white"><?php
                                                                                        echo $total;
                                                                                        ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card bg-success text-white">
                                        <div class="card-body">
                                            <h3 class="text-xl font-bold text-white">Rata-Rata Kepuasan</h3>
                                            <?php
                                            $wheres = "";
                                            if (isset($_GET['periode']) && $_GET['periode'] != "") {
                                                $periode = $_GET['periode'];
                                                $wheres = ", data_responden WHERE data_responden.id_responden = data_jawaban.id_responden AND " . $where;
                                            }
                                            $query = mysqli_query($conn, "SELECT AVG(data_jawaban.point_jawaban) as rata_rata FROM data_jawaban $wheres");
                                            $rata_rata = number_format(mysqli_fetch_assoc($query)['rata_rata'], 2);
                                            ?>
                                            <h2 class="text-xl font-bold text-white">
                                                <?php
                                                echo $rata_rata;
                                                ?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Results Table -->
                            <div class="table-responsive table--no-card m-b-30">
                                <table class="table table-bordered table-striped table-earning">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Nama Responden</th>
                                            <?php
                                            $query2 = mysqli_query($conn, "SELECT * FROM data_pertanyaan");
                                            $jumlah_pertanyaan = mysqli_num_rows($query2);
                                            for ($i = 1; $i <= $jumlah_pertanyaan; $i++) {
                                                echo "<th>P$i</th>";
                                            }
                                            ?>
                                            <th>Nilai Mamdani</th>
                                            <th>Kepuasan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sisip = "";
                                        $no = 1;
                                        while ($row2 = mysqli_fetch_array($query2)) {
                                            if ($no == 1) {
                                                $sisip .= "MAX(CASE WHEN j.id_pertanyaan = " . $row2['id_pertanyaan'] . " THEN j.point_jawaban END) as jawaban" . $no . "";
                                            } else {
                                                $sisip .= ", MAX(CASE WHEN j.id_pertanyaan = " . $row2['id_pertanyaan'] . " THEN j.point_jawaban END) as jawaban" . $no . "";
                                            }
                                            $no++;
                                        }
                                        $wherex = "";
                                        if (isset($_GET['periode']) && $_GET['periode'] != "") {
                                            $periode = $_GET['periode'];
                                            $wherex = " WHERE DATE_FORMAT(r.tgl_responden, '%Y-%m') = '$periode'";
                                        }
                                        $query = mysqli_query($conn, "SELECT 
    r.id_responden,
    r.tgl_responden,
    r.nama_responden,
    $sisip
FROM data_responden r
LEFT JOIN data_jawaban j ON r.id_responden = j.id_responden
$wherex
GROUP BY r.id_responden, r.tgl_responden, r.nama_responden
ORDER BY r.tgl_responden ASC");
                                        $no = 1;
                                        include('mamdani.php');
                                        // Untuk rata-rata
                                        $sum_jawaban = array_fill(1, $jumlah_pertanyaan, 0);
                                        $sum_mamdani = 0;
                                        $total_row = 0;
                                        while ($row = mysqli_fetch_assoc($query)) {
                                            $input_data = [];
                                            echo "<tr>";
                                            echo "<td>" . $no++ . "</td>";
                                            echo "<td>" . date('d-m-Y', strtotime($row['tgl_responden'])) . "</td>";
                                            echo "<td>" . $row['nama_responden'] . "</td>";
                                            $avg = 0;
                                            for ($i = 1; $i <= $jumlah_pertanyaan; $i++) {
                                                $avg += $row['jawaban' . $i];
                                                $input_data[] = $row['jawaban' . $i];
                                                echo "<td>" . $row['jawaban' . $i] . "</td>";
                                                $sum_jawaban[$i] += $row['jawaban' . $i];
                                            }
                                            $hasil = fuzzy_mamdani($input_data);
                                            echo "<td>" . number_format($hasil, 2) . "</td>";
                                            $sum_mamdani += $hasil;
                                            if ($hasil <= 2.0) {
                                                $keterangan = "Tidak Puas";
                                            } elseif ($hasil <= 3.5) {
                                                $keterangan = "Cukup Puas";
                                            } else {
                                                $keterangan = "Sangat Puas";
                                            }
                                            echo "<td>" . $keterangan . "</td>";
                                            echo "</tr>";
                                            $total_row++;
                                        }
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
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>