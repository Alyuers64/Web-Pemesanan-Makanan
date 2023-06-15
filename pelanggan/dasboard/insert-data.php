<?php
include("../koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_detail = $_POST['id_detail'];
    $id_orderan = $_POST["id_orderan"];
    $jumlah_orderan = $_POST["jumlah_orderan"];
    $total_harga = $_POST["total_harga"];
    $ongkir = $_POST["ongkir"];
    $total_pembayaran = $_POST["total_pembayaran"];

    $query = "INSERT INTO detail_orderan (id_detail, id_orderan, id_pegawai, jumlah_orderan, total_harga, 
    ongkir, total_pembayaran) VALUES ('$id_detail', '$id_orderan', NULL, '$jumlah_orderan', '$total_harga', '$ongkir', '$total_pembayaran')";

if ($conn->query($query) === TRUE) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "error", "message" => "Koneksi Gagal"));
}
} else {
echo json_encode(array("status" => "error", "message" => "Gagal"));
}
?>