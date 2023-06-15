<?php 
require('fungsi.php');

$id = $_GET["id_orderan"];
if (hapus_orderan($id) > 0) {
	echo "
				<script>
					alert('Data berhasil dihapus!');
					document.location.href = 'orderan.php';
				</script>
		";
} else {
	echo "
		<script>
					alert('Data gagal dihapus!');
					document.location.href = 'orderan.php
				</script>
		";
}
?>