<?php

include './koneksi.php';
$data = mysqli_query($conn, "SELECT max((id_pelanggan)+1) as id_pe FROM pelanggan");
$row = mysqli_fetch_array($data);
error_reporting(0);

session_start();

if (isset($_SESSION['nama_pelanggan'])) {
    header("Location: login-plg.php");
}

if (isset($_POST['submit'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
	$nama_pelanggan = $_POST['nama_pelanggan'];
	$Alamat = $_POST['Alamat'];
	$no_hp = $_POST['no_hp'];
	$cno_hp= $_POST['cno_hp'];



	if ($no_hp == $cno_hp) {
		$sql = "SELECT * FROM pelanggan WHERE nama_pelanggan='$nama_pelanggan'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "CALL insert_pelanggan ('$id_pelanggan','$nama_pelanggan', '$no_hp','$Alamat')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>
        alert('Pendaftaran Berhasil, Silahkan Login!');
        window.location.href = 'login-plg.php';
        </script>";
        
				$nama_pelanggan = "";
				$Alamat = "";
				$_POST['no_hp'] = "";
				$_POST['cno_hp'] = "";
			} else {
				echo "<script>alert('Nama Pelanggan dan No Hp Salah!')</script>";
			}
		} else {
			echo "<script>alert('Nama Pelanggan Sudah Ada!')</script>";
		}

	} else {
		echo "<script>alert('No Hp Tidak Cocok!')</script>";
	}
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="css/login.css">

  <title>Daftar - Pelanggan</title>
</head>

<body style="background-image: url(nasgor.jpg);">
  <div class="container">
    <form action="" method="POST" class="login-email">
      <p class="login-text" style="font-size: 2rem; font-weight: 800;">Registrasi Pelanggan</p>
      <input type="hidden" placeholder="id Pelanggan" name="id_pelanggan" value="<?php echo $row['id_pe']; ?>" required>
      <div class="input-group">
        <input type="text" placeholder="Nama Pelanggan" name="nama_pelanggan" value="<?php echo $nama_pelanggan; ?>"
          required>
      </div>
      <div class="input-group">
        <input type="text" placeholder="Alamat" name="Alamat" value="<?php echo $Alamat; ?>" required>
      </div>
      <div class="input-group">
        <input type="telp" placeholder="No Hp" name="no_hp" value="<?php echo $_POST['no_hp']; ?>" required>
      </div>
      <div class="input-group">
        <input type="telp" placeholder="Konfirmasi No Hp" name="cno_hp" value="<?php echo $_POST['cno_hp']; ?>"
          required>
      </div>
      <div class="input-group">
        <button name="submit" type="submit" class="btn"> <a href="login-plg.php"
            style="text-decoration: none;">Daftar</a></button>
      </div>
      <p class="login-register-text ">Sudah Jadi Pelanggan? <a href="login-plg.php">Login Disini</a>.</p>
    </form>
  </div>
</body>

</html>