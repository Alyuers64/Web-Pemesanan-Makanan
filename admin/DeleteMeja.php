<?php 
require('fungsi.php');

$id = $_GET["nomor_meja"];
if (hapus_meja($id) > 0) {
	echo "
				<script>
					alert('Data berhasil dihapus!');
					document.location.href = 'meja.php';
				</script>
		";
} else {
	echo "
		<script>
					alert('Data gagal dihapus!');
					document.location.href = 'meja.php
				</script>
		";
}
?>