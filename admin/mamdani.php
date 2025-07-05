<?php
// Fungsi Keanggotaan Input
function membership_input($x) {
    return [
        'tidak_setuju' => max(0, min((2.0 - $x) / 0.5, 1)),
        'kurang_setuju' => max(0, min(($x - 1.5) / 0.5, (3.0 - $x) / 0.5, 1)),
        'setuju' => max(0, min(($x - 2.5) / 0.5, (3.5 - $x) / 0.25, 1)),
        'sangat_setuju' => max(0, min(($x - 3.5) / 0.5, 1)),
    ];
}

// Fungsi Keanggotaan Output (Kepuasan)
function membership_output($z) {
    return [
        'tidak_puas' => max(0, min(($z - 1.0) / 0.5, (2.0 - $z) / 0.5, 1)),
        'cukup_puas' => max(0, min(($z - 2.0) / 0.75, (3.5 - $z) / 0.75, 1)),
        'sangat_puas' => max(0, min(($z - 3.5) / 0.25, (4.0 - $z) / 0.25, 1)),
    ];
}

// Fungsi Defuzzifikasi (Metode Centroid)
function defuzzification($rules) {
    $numerator = 0;
    $denominator = 0;

    // Nilai output fuzzy
    $output_values = [
        'tidak_puas' => 1.5,   // Titik pusat dari "Tidak Puas"
        'cukup_puas' => 2.75,  // Titik pusat dari "Cukup Puas"
        'sangat_puas' => 3.75, // Titik pusat dari "Sangat Puas"
    ];

    foreach ($rules as $key => $value) {
        $numerator += $value * $output_values[$key];
        $denominator += $value;
    }

    return $denominator == 0 ? 0 : $numerator / $denominator;
}

// Proses Fuzzy Mamdani
function fuzzy_mamdani($inputs) {
    $aggregated_rules = [
        'tidak_puas' => 0,
        'cukup_puas' => 0,
        'sangat_puas' => 0,
    ];

    foreach ($inputs as $x) {
        // Fuzzifikasi input (himpunan fuzzy input)
        $membership = membership_input($x);

        // Inferensi berdasarkan aturan
        $aggregated_rules['tidak_puas'] = max($aggregated_rules['tidak_puas'], $membership['tidak_setuju']);
        $aggregated_rules['cukup_puas'] = max($aggregated_rules['cukup_puas'], $membership['kurang_setuju']);
        $aggregated_rules['cukup_puas'] = max($aggregated_rules['cukup_puas'], $membership['setuju']);
        $aggregated_rules['sangat_puas'] = max($aggregated_rules['sangat_puas'], $membership['sangat_setuju']);
    }

    // Defuzzifikasi
    $final_output = defuzzification($aggregated_rules);
    return $final_output;
    // Klasifikasi hasil akhir
    // if ($final_output <= 2.0) {
    //     return "Tidak Puas";
    // } elseif ($final_output <= 3.5) {
    //     return "Cukup Puas";
    // } else {
    //     return "Sangat Puas";
    // }
}

// Contoh Input Data (NRRu1 - NRRu18)
// $input_data = [4.0, 4.0, 4.0, 4.0, 4.0, 4.0, 4.0, 4.0, 4.0, 4.0, 4.0, 4.0, 4.0, 4.0, 4.0, 4.0, 4.0, 4.0];

// // Menjalankan Fungsi Fuzzy Mamdani
// $hasil = fuzzy_mamdani($input_data);

// // Output Hasil
// echo "Tingkat Kepuasan: " . $hasil;
?>
