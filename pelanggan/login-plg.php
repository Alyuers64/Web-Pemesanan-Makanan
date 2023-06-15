<?php

include 'koneksi.php';

session_start();

error_reporting(0);

if (isset($_SESSION['nama_pelanggan'])) {
    header("Location: dasboard/index.php");
}

if (isset($_POST['submit'])) {
	$nama_pelanggan = $_POST['nama_pelanggan'];
	$no_hp = $_POST['no_hp'];

	$sql = "SELECT * FROM pelanggan WHERE nama_pelanggan='$nama_pelanggan' AND no_hp='$no_hp'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['nama_pelanggan'] = $row['nama_pelanggan'];
		header("Location: dasboard/index.php");
	} else {
		echo "<script>alert('Nama Pelanggan Dan No Hp Tidak Ditemukan!')</script>";
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

  <title>Login - Pelanggan</title>
</head>

<body style="background-image: url(nasgor.jpg);">
  <div class="container">
    <form action="" method="POST" class="login-email">
      <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
      <div class="input-group">
        <input type="text" placeholder="Nama Pelanggan" name="nama_pelanggan" value="<?php echo $nama_pelanggan; ?>"
          required>
      </div>
      <div class="input-group">
        <input type="text" placeholder="No Hp" name="no_hp" value="<?php echo $_POST['no_hp']; ?>" required>
      </div>
      <div class="input-group">
        <button name="submit" class="btn">Login</button>
      </div>
      <p class="login-register-text">Bukan Pelanggan ? <a href="daftar.php">Daftar Disini</a>.</p>
    </form>
  </div>
</body>

</html>