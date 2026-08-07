<?php
// Mendefinisikan array multidimensi menggunakan []
$orang = [
    ["Nama" => "leo", "Umur" => 16],
    ["Nama" => "apoh", "Umur" => 36],
    ["Nama" => "mile", "Umur" => 35]
];

// Mengakses elemen array multidimensi
echo $orang[2]["Nama"] . " berumur " . $orang[2]["Umur"] . " tahun.<br>"; // Output: mile berumur 35 tahun.
echo $orang[0]["Nama"] . " berumur " . $orang[0]["Umur"] . " tahun.<br>"; // Output: leo berumur 16 tahun.
?>