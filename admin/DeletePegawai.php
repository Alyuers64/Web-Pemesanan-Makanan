<?php 
require('fungsi.php');

$id = $_GET["id_pegawai"];
if (hapus_pegawai($id) > 0) {
	echo "
				<script>
					alert('Data berhasil dihapus!');
					document.location.href = 'pegawai.php';
				</script>
		";
} else {
	echo "
		<script>
					alert('Data gagal dihapus!');
					document.location.href = 'pegawai.php
				</script>
		";
}
?>