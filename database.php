<?php
$host = "localhost";       // biasanya localhost
$user = "root";            // user MySQL kamu
$pass = "";                // password MySQL kamu
$db   = "kelurahan_jati";  // nama database kamu

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}
?>
