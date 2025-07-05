<?php
// Fungsi untuk mencetak hasil dengan format yang lebih baik
function printHeader($text) {
    echo "<div style='margin: 20px 0; padding: 10px; background-color: #f0f0f0; border-left: 5px solid #333;'>";
    echo "<h3 style='margin: 0;'>$text</h3>";
    echo "</div>";
}

function printSection($text) {
    echo "<div style='margin: 10px 0; padding: 5px 10px; border-left: 3px solid #666;'>";
    echo $text;
    echo "</div>";
}

function printValue($label, $value) {
    echo "<div style='margin: 5px 20px;'>";
    echo "<strong>$label:</strong> $value";
    echo "</div>";
}

// Fungsi Keanggotaan Input
function membership_input($x) {
    printHeader("Proses Membership Input untuk nilai $x");
    
    $tidak_setuju = max(0, min((2.0 - $x) / 0.5, 1));
    $kurang_setuju = max(0, min(($x - 1.5) / 0.5, (3.0 - $x) / 0.5, 1));
    $setuju = max(0, min(($x - 2.5) / 0.5, (3.5 - $x) / 0.25, 1));
    $sangat_setuju = max(0, min(($x - 3.5) / 0.5, 1));
    
    printSection("Hasil perhitungan derajat keanggotaan:");
    printValue("Tidak Setuju", number_format($tidak_setuju, 4));
    printValue("Kurang Setuju", number_format($kurang_setuju, 4));
    printValue("Setuju", number_format($setuju, 4));
    printValue("Sangat Setuju", number_format($sangat_setuju, 4));
    
    return [
        'tidak_setuju' => $tidak_setuju,
        'kurang_setuju' => $kurang_setuju,
        'setuju' => $setuju,
        'sangat_setuju' => $sangat_setuju,
    ];
}

// Fungsi Keanggotaan Output
function membership_output($z) {
    echo "<br>=== Proses Membership Output untuk nilai $z ===<br>";
    
    $tidak_puas = max(0, min(($z - 1.0) / 0.5, (2.0 - $z) / 0.5, 1));
    $cukup_puas = max(0, min(($z - 2.0) / 0.75, (3.5 - $z) / 0.75, 1));
    $sangat_puas = max(0, min(($z - 3.5) / 0.25, (4.0 - $z) / 0.25, 1));
    
    echo "Hasil perhitungan derajat keanggotaan output:<br>";
    echo "- Tidak Puas: $tidak_puas<br>";
    echo "- Cukup Puas: $cukup_puas<br>";
    echo "- Sangat Puas: $sangat_puas<br>";
    
    return [
        'tidak_puas' => $tidak_puas,
        'cukup_puas' => $cukup_puas,
        'sangat_puas' => $sangat_puas,
    ];
}

// Fungsi Defuzzifikasi dengan penjelasan detail
function defuzzification($rules) {
    printHeader("Proses Defuzzifikasi");
    
    $numerator = 0;
    $denominator = 0;
    
    $output_values = [
        'tidak_puas' => 1.5,
        'cukup_puas' => 2.75,
        'sangat_puas' => 3.75,
    ];
    
    printSection("Perhitungan untuk setiap rule:");
    foreach ($rules as $key => $value) {
        $current_numerator = $value * $output_values[$key];
        $numerator += $current_numerator;
        $denominator += $value;
        
        echo "<div style='margin: 10px 20px; padding: 10px; background-color: #f9f9f9;'>";
        echo "<strong>Rule: $key</strong><br>";
        echo "Nilai rule: $value<br>";
        echo "Nilai tengah: {$output_values[$key]}<br>";
        echo "Perhitungan: $value × {$output_values[$key]} = $current_numerator<br>";
        echo "Running total numerator: $numerator<br>";
        echo "Running total denominator: $denominator";
        echo "</div>"; 
    }
    
    $result = $denominator == 0 ? 0 : $numerator / $denominator;
    
    printSection("Hasil Akhir Defuzzifikasi:");
    printValue("Numerator", number_format($numerator, 4));
    printValue("Denominator", number_format($denominator, 4));
    printValue("Hasil (Numerator/Denominator)", number_format($result, 4));
    
    return $result;
}

// Proses Fuzzy Mamdani dengan penjelasan detail
function fuzzy_mamdani($inputs) {
    printHeader("PROSES FUZZY MAMDANI");
    printValue("Input yang diterima", implode(", ", $inputs));
    
    $aggregated_rules = [
        'tidak_puas' => 0,
        'cukup_puas' => 0,
        'sangat_puas' => 0,
    ];
    
    foreach ($inputs as $index => $x) {
        printSection("Proses Input ke-" . ($index + 1) . " (Nilai: $x)");
        
        // Fuzzifikasi
        $membership = membership_input($x);
        
        // Inferensi
        printSection("Proses Inferensi:");
        $prev_tidak_puas = $aggregated_rules['tidak_puas'];
        $prev_cukup_puas = $aggregated_rules['cukup_puas'];
        $prev_sangat_puas = $aggregated_rules['sangat_puas'];
        
        $aggregated_rules['tidak_puas'] = max($aggregated_rules['tidak_puas'], $membership['tidak_setuju']);
        $aggregated_rules['cukup_puas'] = max($aggregated_rules['cukup_puas'], $membership['kurang_setuju']);
        $aggregated_rules['cukup_puas'] = max($aggregated_rules['cukup_puas'], $membership['setuju']);
        $aggregated_rules['sangat_puas'] = max($aggregated_rules['sangat_puas'], $membership['sangat_setuju']);
        
        printValue("Tidak Puas", "$prev_tidak_puas → {$aggregated_rules['tidak_puas']}");
        printValue("Cukup Puas", "$prev_cukup_puas → {$aggregated_rules['cukup_puas']}");
        printValue("Sangat Puas", "$prev_sangat_puas → {$aggregated_rules['sangat_puas']}");
    }
    
    printHeader("HASIL AGREGASI FINAL");
    printValue("Tidak Puas", number_format($aggregated_rules['tidak_puas'], 4));
    printValue("Cukup Puas", number_format($aggregated_rules['cukup_puas'], 4));
    printValue("Sangat Puas", number_format($aggregated_rules['sangat_puas'], 4));
    
    // Defuzzifikasi
    $final_output = defuzzification($aggregated_rules);
    
    printHeader("HASIL AKHIR");
    printValue("Nilai numerik", number_format($final_output, 4));
    
    $interpretasi = $final_output <= 2.0 ? "Tidak Puas" : 
                   ($final_output <= 3.5 ? "Cukup Puas" : "Sangat Puas");
    printValue("Interpretasi", $interpretasi);
    
    return $final_output;
}

// Contoh penggunaan
$input_data = [4.0, 4.0, 4.0, 4.0, 4.0, 3.0, 3.0, 3.0, 4.0];
printHeader("MULAI EKSEKUSI PROGRAM");
printValue("Input data", "[" . implode(", ", $input_data) . "]");
$hasil = fuzzy_mamdani($input_data);
printValue("Nilai akhir", number_format($hasil, 4));
printHeader("SELESAI EKSEKUSI PROGRAM");
?>
