<?php include("../koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $id_orderan = $_GET["id_orderan"];

  $query = "DELETE FROM orderan WHERE id_orderan = $id_orderan";

  if (mysqli_query($conn, $query)) {
    echo json_encode(["status" => "success"]);
  } else {
    echo json_encode(["status" => "error", "message" => mysqli_error($conn)]);
  }
}

?>