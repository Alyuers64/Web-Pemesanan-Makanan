<?php 
require('fungsi.php');

$id = $_GET["id_detail"];
if (hapus_detail_orderan($id) > 0) {
	echo "
				<script>
					alert('Data berhasil dihapus!');
					document.location.href = 'detail_orderan.php';
				</script>
		";
} else {
	echo "
		<script>
					alert('Data gagal dihapus!');
					document.location.href = 'detail_orderan.php
				</script>
		";
}
?>