<?php
include "koneksi.php";

$nama_pegawai=$_POST['nama_pegawai'];
$id_pegawai=$_POST['id_pegawai'];

$login="SELECT * FROM pegawai WHERE nama_pegawai='$nama_pegawai'";
$cek=mysqli_query($conn,$login);
$ketemu=mysqli_num_rows($cek);

$login2="SELECT * FROM pegawai WHERE id_pegawai='$id_pegawai'";
$cek2=mysqli_query($conn,$login2);
$ketemu2=mysqli_num_rows($cek2);

$login3="SELECT * FROM pegawai WHERE nama_pegawai='$nama_pegawai' AND id_pegawai='$id_pegawai'";
$cek3=mysqli_query($conn,$login3);
$ketemu3=mysqli_num_rows($cek3);

$r=mysqli_fetch_array($cek3);
$hasil=$r ['nama_pegawai'];



if ($ketemu ==0 & $ketemu2==0){
    echo "<script> alert ('Username dan Password Anda Salah. Coba Lagi');
    window.location = 'login.php'</script>";
}

else if ($ketemu ==0){
    echo "<script> alert ('Username Anda Salah! Coba Lagi.');
    window.location = 'login.php'</script>";
}

else if ($ketemu2 ==0){
    echo "<script> alert ('Password Anda Salah! Coba Lagi.');
    window.location = 'login.php'</script>";
}
//jika ketemu dibuat sesi loginnya
else {
  session_start();
  $_SESSION['nama_pegawai']=$hasil;
  echo "<script> alert ('Login Berhasil');
  window.location = 'index.php'</script>";


//login berhasil
  echo "<script> alert ('Login Berhasil');
  window.location = 'index.php'</script>";


}