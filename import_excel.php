<?php
require 'vendor/autoload.php'; // composer autoload

use PhpOffice\PhpSpreadsheet\IOFactory;

$koneksi = new mysqli("localhost", "root", "", "kelurahan_jati");

if (isset($_FILES['file_excel'])) {
    $file_tmp = $_FILES['file_excel']['tmp_name'];
    $spreadsheet = IOFactory::load($file_tmp);
    $sheet = $spreadsheet->getActiveSheet()->toArray();

    // Lewati baris pertama (judul kolom)
    for ($i = 1; $i < count($sheet); $i++) {
        $nama   = $sheet[$i][0];
        $alamat = $sheet[$i][1];
        $rt     = $sheet[$i][2];
        $rw     = $sheet[$i][3];
        $no_hp  = $sheet[$i][4];

        $koneksi->query("INSERT INTO data_warga (nama, alamat, rt, rw, no_hp) 
                         VALUES ('$nama', '$alamat', '$rt', '$rw', '$no_hp')");
    }

    echo "Data berhasil diimport!";
} else {
    echo "File tidak ditemukan.";
}
?>
