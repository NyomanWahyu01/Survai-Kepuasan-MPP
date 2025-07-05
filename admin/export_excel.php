<?php
include("koneksi.php");

if (isset($_POST['mulai']) && isset($_POST['sampai'])) {
    $mulai = $_POST['mulai'];
    $sampai = $_POST['sampai'];

    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=report.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    echo "<table border='1'>";
    echo "<tr>
            <th>No</th>
            <th>Pertanyaan</th>
            <th>Sangat Setuju</th>
            <th>Setuju</th>
            <th>Kurang Setuju</th>
            <th>Tidak Setuju</th>
            <th>Nilai Rata2</th>
            <th>Kategori Mutu</th>
          </tr>";

    $query = mysqli_query($conn, "select * from data_pertanyaan");
    $x = 1;
    while ($dt = mysqli_fetch_array($query)) {
        $totx_sangatpuas = mysqli_num_rows(mysqli_query($conn, "select * from data_jawaban,data_responden where data_jawaban.point_jawaban='4' and data_jawaban.status='selesai' and data_jawaban.id_pertanyaan='$dt[id_pertanyaan]' and data_jawaban.id_responden=data_responden.id_responden and date(data_responden.tgl_responden)>'$mulai' and date(data_responden.tgl_responden)<'$sampai'"));
        $totx_puas = mysqli_num_rows(mysqli_query($conn, "select * from data_jawaban,data_responden where data_jawaban.point_jawaban='3' and data_jawaban.status='selesai' and data_jawaban.id_pertanyaan='$dt[id_pertanyaan]' and data_jawaban.id_responden=data_responden.id_responden and date(data_responden.tgl_responden)>'$mulai' and date(data_responden.tgl_responden)<'$sampai'"));
        $totx_tidakpuas = mysqli_num_rows(mysqli_query($conn, "select * from data_jawaban,data_responden where data_jawaban.point_jawaban='2' and data_jawaban.status='selesai' and data_jawaban.id_pertanyaan='$dt[id_pertanyaan]' and data_jawaban.id_responden=data_responden.id_responden and date(data_responden.tgl_responden)>'$mulai' and date(data_responden.tgl_responden)<'$sampai'"));
        $totx_kecewa = mysqli_num_rows(mysqli_query($conn, "select * from data_jawaban,data_responden where data_jawaban.point_jawaban='1' and data_jawaban.status='selesai' and data_jawaban.id_pertanyaan='$dt[id_pertanyaan]' and data_jawaban.id_responden=data_responden.id_responden and date(data_responden.tgl_responden)>'$mulai' and date(data_responden.tgl_responden)<'$sampai'"));

        $rata = (($totx_sangatpuas * 4) + ($totx_puas * 3) + ($totx_tidakpuas * 2) + ($totx_kecewa * 1)) / 4;
        $huruf = "";
        if ($rata == 4) {
            $huruf = "A";
        } elseif ($rata == 3) {
            $huruf = "B";
        } elseif ($rata == 2) {
            $huruf = "C";
        } elseif ($rata == 1) {
            $huruf = "D";
        } else {
            $huruf = "E";
        }

        echo "<tr>
                <td>P$x</td>
                <td>$dt[pertanyaan]</td>
                <td>$totx_sangatpuas</td>
                <td>$totx_puas</td>
                <td>$totx_tidakpuas</td>
                <td>$totx_kecewa</td>
                <td>$rata</td>
                <td>$huruf</td>
              </tr>";
        $x++;
    }

    echo "</table>";
}
?>
