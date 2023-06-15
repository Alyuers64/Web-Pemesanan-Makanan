<?php 
require('fungsi.php');

$id = $_GET["id_menu"];
if (hapus_menu($id) > 0) {
	echo "
				<script>
					alert('Data berhasil dihapus!');
					document.location.href = 'menu.php';
				</script>
		";
} else {
	echo "
		<script>
					alert('Data gagal dihapus!');
					document.location.href = 'menu.php
				</script>
		";
}
?>