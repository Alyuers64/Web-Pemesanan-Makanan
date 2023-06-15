<?php
include('../koneksi.php');

$id_pelanggan = $_GET['id_pelanggan'];

$sql = "SELECT id_orderan FROM orderan WHERE id_pelanggan='$id_pelanggan' ORDER BY id_orderan DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $idOrderan = $row["id_orderan"];

    echo $idOrderan;
} else {
    echo "Tidak ada data id_orderan yang tersedia.";
}
?>