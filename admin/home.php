<?php
include("koneksi.php");
$tot_responden = mysqli_num_rows(mysqli_query($conn, "select * from data_responden where status_responden!='belum' "));
$tot_instansi = mysqli_num_rows(mysqli_query($conn, "select * from data_instansi  "));
$tot_pertanyaan = mysqli_num_rows(mysqli_query($conn, "select * from data_pertanyaan  "));
$tot_jawaban = mysqli_num_rows(mysqli_query($conn, "select * from data_jawaban where status='selesai'  "));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="icon" href="../assetss/images/logo-pemda.ico" type="image/x-icon" />

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Breadcrumb Section -->
    <section class="py-5 pb-10">
        <div class="container mx-auto px-6">
            <div class="bg-white p-5 rounded shadow">
                <ul class="flex items-center space-x-2">
                    <h3 class="text-xl font-bold text-bold">Dashboard Admin</h3>
                </ul>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-4">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Responden -->
                <div class="bg-white p-6 rounded shadow flex items-center justify-between">
                    <div>
                        <h2 class="text-3xl font-bold"><?= $tot_responden; ?></h2>
                        <p class="text-gray-600">Responden</p>
                    </div>
                    <div>
                        <i class="zmdi zmdi-account-o text-4xl text-blue-500"></i>
                    </div>
                </div>
                <!-- Pertanyaan -->
                <div class="bg-white p-6 rounded shadow flex items-center justify-between">
                    <div>
                        <h2 class="text-3xl font-bold"><?= $tot_pertanyaan; ?></h2>
                        <p class="text-gray-600">Pertanyaan</p>
                    </div>
                    <div>
                        <i class="zmdi zmdi-calendar-note text-4xl text-yellow-500"></i>
                    </div>
                </div>
                <!-- Instansi -->
                <div class="bg-white p-6 rounded shadow flex items-center justify-between">
                    <div>
                        <h2 class="text-3xl font-bold"><?= $tot_instansi; ?></h2>
                        <p class="text-gray-600">Instansi</p>
                    </div>
                    <div>
                        <i class="zmdi zmdi-home text-4xl text-green-500"></i>
                    </div>
                </div>
                <!-- Jawaban -->
                <div class="bg-white p-6 rounded shadow flex items-center justify-between">
                    <div>
                        <h2 class="text-3xl font-bold"><?= $tot_jawaban; ?></h2>
                        <p class="text-gray-600">Jawaban</p>
                    </div>
                    <div>
                        <i class="zmdi zmdi-comments text-4xl text-red-500"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Table Section -->
    <section class="py-4">
        <div class="container mx-auto px-6">
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-lg font-semibold mb-4">Detail Jawaban Responden Per Pertanyaan</h3>
                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-300 text-sm">
                        <thead>
                            <tr class="bg-blue-500 text-white">
                                <th class="text-center py-2 border border-gray-300" rowspan="2">No</th>
                                <th class="text-center py-2 border border-gray-300" width="50%" rowspan="2">Pertanyaan</th>
                                <th class="text-center py-2 border border-gray-300" colspan="4">Jumlah Responden Yang Menjawab (orang)</th>
                                <th class="text-center py-2 border border-gray-300" rowspan="2">Rata-Rata</th>
                            </tr>
                            <tr class="bg-blue-500 text-white">
                                <th class="text-center py-2 border border-gray-300">Sangat Sesuai</th>
                                <th class="text-center py-2 border border-gray-300">Sesuai</th>
                                <th class="text-center py-2 border border-gray-300">Kurang Sesuai</th>
                                <th class="text-center py-2 border border-gray-300">Tidak Sesuai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($conn, "select * from data_pertanyaan");
                            $x = 1;
                            while ($dt = mysqli_fetch_array($query)) {
                                $totx_sangatpuas = mysqli_num_rows(mysqli_query($conn, "select * from data_jawaban where point_jawaban='4' and status='selesai' and id_pertanyaan='$dt[id_pertanyaan]'"));
                                $totx_puas = mysqli_num_rows(mysqli_query($conn, "select * from data_jawaban where point_jawaban='3' and status='selesai' and id_pertanyaan='$dt[id_pertanyaan]'"));
                                $totx_tidakpuas = mysqli_num_rows(mysqli_query($conn, "select * from data_jawaban where point_jawaban='2' and status='selesai' and id_pertanyaan='$dt[id_pertanyaan]'"));
                                $totx_kecewa = mysqli_num_rows(mysqli_query($conn, "select * from data_jawaban where point_jawaban='1' and status='selesai' and id_pertanyaan='$dt[id_pertanyaan]'"));
                                $rata = (($totx_sangatpuas * 4) + ($totx_puas * 3) + ($totx_tidakpuas * 2) + ($totx_kecewa * 1)) / 4;
                                $huruf = ($rata == 4 ? "A" : ($rata == 3 ? "B" : ($rata == 2 ? "C" : ($rata == 1 ? "D" : "E"))));
                                echo "<tr>
                            <td class='border border-gray-300 px-4 py-2 text-center'>P$x</td>
                            <td class='border border-gray-300 px-4 py-2'>$dt[pertanyaan]</td>
                            <td class='border border-gray-300 px-4 py-2 text-center'>$totx_sangatpuas</td>
                            <td class='border border-gray-300 px-4 py-2 text-center'>$totx_puas</td>
                            <td class='border border-gray-300 px-4 py-2 text-center'>$totx_tidakpuas</td>
                            <td class='border border-gray-300 px-4 py-2 text-center'>$totx_kecewa</td>
                            <td class='border border-gray-300 px-4 py-2 text-center'>$rata</td>
                            
                        </tr>";
                                $x++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

</body>

</html>