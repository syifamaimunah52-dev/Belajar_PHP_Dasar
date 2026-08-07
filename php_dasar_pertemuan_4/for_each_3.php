<?php
$orang = [
    ["Nama" => "Aji", "Umur" => 20],
    ["Nama" => "Boby", "Umur" => 34],
    ["Nama" => "lie", "Umur" => 70]
];

foreach ($orang as $individu) {
    echo $individu["Nama"] . " berumur " . $individu["Umur"] . " tahun.<br>";
}
?>