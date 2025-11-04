<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama = $_POST['nama'];
  $rt = $_POST['rt'];
  $rw = $_POST['rw'];
  $alamat = $_POST['alamat'];
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // enkripsi aman

  // Cek apakah username sudah ada
  $cek = $conn->prepare("SELECT id FROM users WHERE username=?");
  $cek->bind_param("s", $username);
  $cek->execute();
  $cek->store_result();

  if ($cek->num_rows > 0) {
    echo "username_exists";
    exit;
  }

  // Simpan data baru
  $stmt = $conn->prepare("INSERT INTO users (nama, rt, rw, alamat, username, password) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssss", $nama, $rt, $rw, $alamat, $username, $password);

  if ($stmt->execute()) {
    echo "success";
  } else {
    echo "error";
  }
}
?>
