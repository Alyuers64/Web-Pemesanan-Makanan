<?php 
require('fungsi.php');

$id = $_GET["id_pelanggan"];
if (hapus_pelanggan($id) > 0) {
	echo "
				<script>
					alert('Data berhasil dihapus!');
					document.location.href = 'pelanggan.php';
				</script>
		";
} else {
	echo "
		<script>
					alert('Data gagal dihapus!');
					document.location.href = 'pelanggan.php
				</script>
		";
}
?>