<?php

require('koneksi.php');

if (isset($_POST["login"])) {
    $nama_pegawai = $_POST["nama_pegawai"];
    $id_pegawai = $_POST["id_pegawai"];

    $check = mysqli_query($conn, "SELECT * FROM pegawai WHERE nama_pegawai = '$nama_pegawai' and id_pegawai = '$id_pegawai'");
    if (mysqli_num_rows($check) === 1) {
        echo "
        <script>
        alert('Login Berhasil');
        document.location.href = 'index.php';
        </script> ";
    } else {
        echo "
        <script>
        alert('Username/Password Salah');
        document.location.href = 'login.php';
        </script> ";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="assets/css/main.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Login - Admin</title>
</head>

<body>
  <section class="material-half-bg">
    <div class="cover"></div>
  </section>
  <section class="login-content">
    <div class="logo">
      <!-- <h1>Restaurant Memoriam</h1> -->
    </div>
    <div class="login-box">
      <form action="login-proses.php" method="POST" class="login-form" action="index.html">
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>ADMIN</h3>
        <div class="form-group">
          <label class="control-label">USERNAME</label>
          <input class="form-control" name="nama_pegawai" type="text" placeholder="Email" autofocus>
        </div>
        <div class="form-group">
          <label class="control-label">PASSWORD</label>
          <input class="form-control" name="id_pegawai" type="password" placeholder="Password">
        </div>
        <div class="form-group">
          <div class="utility">
            <div class="animated-checkbox">
              <label>
                <input type="checkbox"><span class="label-text">Ingat Saya</span>
              </label>
            </div>
            <!-- <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Lupa Password ?</a></p> -->
          </div>
        </div>
        <div class="form-group btn-container">
          <button class="btn btn-primary btn-block" type="submit" name="login"><i
              class="fa fa-sign-in fa-lg fa-fw"></i>LOGIN</button>
        </div>
      </form>
    </div>
  </section>
  <!-- Essential javascripts for application to work-->
  <script src="assets/js/jquery-3.3.1.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/main.js"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="assets/js/plugins/pace.min.js"></script>
  <script type="text/javascript">
  // Login Page Flipbox control
  $('.login-content [data-toggle="flip"]').click(function() {
    $('.login-box').toggleClass('flipped');
    return false;
  });
  </script>
</body>

</html>