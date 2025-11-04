<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

include "database.php";

$action = $_POST["action"] ?? $_GET["action"] ?? "";

if ($action === "add") {
  $rt = $_POST["rt"];
  $rw = $_POST["rw"];
  $ketuaRT = $_POST["ketuaRT"];
  $ketuaRW = $_POST["ketuaRW"];
  $alamat = $_POST["alamat"];

  $stmt = $conn->prepare("INSERT INTO rtrw (rt, rw, ketua_rt, ketua_rw, alamat) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssss", $rt, $rw, $ketuaRT, $ketuaRW, $alamat);

  if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Data berhasil ditambahkan"]);
  } else {
    echo json_encode(["status" => "error", "message" => "Gagal menambahkan data"]);
  }
}

elseif ($action === "get") {
  $result = $conn->query("SELECT * FROM rtrw ORDER BY id DESC");
  $data = [];
  while ($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
  echo json_encode($data);
}

elseif ($action === "delete_all") {
  $conn->query("DELETE FROM rtrw");
  echo json_encode(["status" => "success", "message" => "Semua data berhasil dihapus"]);
}
?>
