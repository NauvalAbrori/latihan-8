<?php
$servername = "localhost";   // biasanya localhost
$username = "root";          // default XAMPP
$password = "";              // default XAMPP kosong
$dbname = "kelurahan_jati";  // nama database kamu

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}
?>
