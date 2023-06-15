<?php

include "koneksi.php";

$id = $_POST['id'];

$query = "CALL TotalPembelianOtomatis('" . $id . "')";

$ambildata = mysqli_query($conn, $query);
if(!$ambildata){
    die("Gagal ambil data total pembelian sepatu ". $id .mysqli_error($conn));

}

while($row = mysqli_fetch_assoc($ambildata)){
    $data = $row;
    echo json_encode($data);
}