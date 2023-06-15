<?php 
require('fungsi.php');

$id = $_GET["id_history"];
if (hapus_history($id) > 0) {
	echo "
				<script>
					alert('Data berhasil dihapus!');
					document.location.href = 'history.php';
				</script>
		";
} else {
	echo "
		<script>
					alert('Data gagal dihapus!');
					document.location.href = 'history.php
				</script>
		";
}
?>