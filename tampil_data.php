<?php
include 'koneksi.php';

$query = "SELECT * FROM rt_rw";
$result = mysqli_query($conn, $query);

echo "<h2>Data RT dan RW</h2>";
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>No</th><th>Nama</th><th>Jabatan</th><th>Nomor</th></tr>";

$no = 1;
while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>".$no++."</td>";
    echo "<td>".$row['nama']."</td>";
    echo "<td>".$row['jabatan']."</td>";
    echo "<td>".$row['nomor']."</td>";
    echo "</tr>";
}

echo "</table>";
?>
