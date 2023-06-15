<?php include("../koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $id_detail = $_GET["id_detail"];

  $query = "DELETE FROM detail_orderan WHERE id_detail = $id_detail";

  if (mysqli_query($conn, $query)) {
    echo json_encode(["status" => "success"]);
  } else {
    echo json_encode(["status" => "error", "message" => mysqli_error($conn)]);
  }
}

?>