<?php 
require('fungsi.php');

$id = $_GET["id_bukti"];
if (hapus_bukti($id) > 0) {
	echo "
				<script>
					alert('Data berhasil dihapus!');
					document.location.href = 'bukti-pembayaran.php';
				</script>
		";
} else {
	echo "
		<script>
					alert('Data gagal dihapus!');
					document.location.href = 'bukti-pembayaran.php
				</script>
		";
}
?>