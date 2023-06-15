<?php
require('koneksi.php');
?>

<?php
//fungsi untuk mengambil data pada sintaks query mysql
function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}


//fungsi untuk menambah data pada tabel pelanggan 
function tambah_pelanggan($data)
{
    //memanggil variabel global conn
    global $conn;
    //mendeklariskan variabel untuk tambah data
    $id_pelanggan = htmlspecialchars($data["id_pelanggan"]);
    $nama_pelanggan = htmlspecialchars($data["nama_pelanggan"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $Alamat = htmlspecialchars($data["Alamat"]);
    //query untuk menambah data
    $query = "CALL insert_pelanggan ('$id_pelanggan','$nama_pelanggan','$no_hp','$Alamat')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

//fungsi untuk mengubah data pada tabel pelanggan
function ubah_pelanggan($data)
{
    //memanggil variabel global conn
    global $conn;
    //mendeklariskan variabel untuk ubah data
    $id_pelanggan = $data["id_pelanggan"];
    $nama_pelanggan = $data["nama_pelanggan"];
    $Alamat = $data["Alamat"];
    $no_hp = $data["no_hp"];
    //query untuk mengubah / updata data
    $query = "CALL update_pelanggan('$id_pelanggan','$nama_pelanggan','$no_hp','$Alamat')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

//fungsi untuk menghapus data pada tabel pelanggan
function hapus_pelanggan($id)
{
    //memanggil variabel global conn
    global $conn;
    //query untuk menghapus data
    mysqli_query($conn, "CALL delete_pelanggan ('$id')");
    return mysqli_affected_rows($conn);
}

//fungsi untuk menambah data pada tabel meja
function tambah_meja($data)
{
    //memanggil variabel global conn
    global $conn;
    //mendeklariskan variabel untuk tambah data
    $nomor_meja = htmlspecialchars($data["nomor_meja"]);
    $id_pelanggan = htmlspecialchars($data["id_pelanggan"]);
    $kapasitas = htmlspecialchars($data["kapasitas_meja"]);
    //query untuk menambah data
    $query = "CALL insert_meja ('$nomor_meja','$id_pelanggan','$kapasitas')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

//fungsi untuk mengubah data pada tabel meja
function ubah_meja($data)
{
    //memanggil variabel global conn
    global $conn;
    //mendeklariskan variabel untuk ubah data
    $nomor_meja = htmlspecialchars($data["nomor_meja"]);
    $id_pelanggan = htmlspecialchars($data["id_pelanggan"]);
    $kapasitas = htmlspecialchars($data["kapasitas_meja"]);
    //query untuk mengubah / updata data
    $query = "CALL update_meja('$nomor_meja','$id_pelanggan','$kapasitas')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

//fungsi untuk menghapus data pada tabel meja
function hapus_meja($id)
{
    //memanggil variabel global conn
    global $conn;
    //query untuk menghapus data
    mysqli_query($conn, "CALL delete_meja ('$id')");
    return mysqli_affected_rows($conn);
}

//fungsi untuk menambah data pada tabel orderan 
function tambah_orderan($data)
{
    //memanggil variabel global conn
    global $conn;
    //mendeklariskan variabel untuk tambah data
    $id_orderan = htmlspecialchars($data["id_orderan"]);
    $id_menu = htmlspecialchars($data["id_menu"]);
    $id_pelanggan = htmlspecialchars($data["id_pelanggan"]);
    $nomor_meja = htmlspecialchars($data["nomor_meja"]);
    $jenis_orderan = htmlspecialchars($data["jenis_orderan"]);
    $status_orderan = htmlspecialchars($data["status_orderan"]);
    //query untuk menambah data
    $query = "CALL insert_orderan ('$id_orderan', '$id_menu', '$id_pelanggan', '$nomor_meja', '$jenis_orderan', '$status_orderan')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

//fungsi untuk mengubah data pada tabel orderan
function ubah_orderan($data)
{
    //memanggil variabel global conn
    global $conn;
    //mendeklariskan variabel untuk ubah data
    $id_orderan = htmlspecialchars($data["id_orderan"]);
    $id_menu = htmlspecialchars($data["id_menu"]);
    $id_pelanggan = htmlspecialchars($data["id_pelanggan"]);
    $nomor_meja = htmlspecialchars($data["nomor_meja"]);
    $jenis_orderan = htmlspecialchars($data["jenis_orderan"]);
    $status_orderan = htmlspecialchars($data["status_orderan"]);
    //query untuk mengubah / updata data
    $query = "CALL update_orderan ('$id_orderan', '$id_menu', '$id_pelanggan', '$nomor_meja', '$jenis_orderan', '$status_orderan')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

//fungsi untuk menghapus data pada tabel orderan
function hapus_orderan($id)
{
    //memanggil variabel global conn
    global $conn;
    //query untuk menghapus data
    mysqli_query($conn, "CALL delete_orderan ('$id')");
    return mysqli_affected_rows($conn);
}

//fungsi untuk menambah data pada tabel menu
function tambah_menu($data)
{
    //memanggil variabel global conn
    global $conn;
    //mendeklariskan variabel untuk tambah data
    $id_menu = htmlspecialchars($data["id_menu"]);
    $nama_menu = htmlspecialchars($data["nama_menu"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $Harga = htmlspecialchars($data["Harga"]);
    $stok = htmlspecialchars($data["stok"]);
    $Keterangan = htmlspecialchars($data["keterangan"]);
    $status = htmlspecialchars($data["status"]);

    $lokasi_file        =$_FILES['foto_menu']['tmp_name'];
    $nama_file          =$_FILES['foto_menu']['name'];
    $ukuran             =$_FILES['foto_menu']['size'];
if($ukuran <= 2048000){
    $image              =addslashes(file_get_contents($_FILES['foto_menu']['tmp_name']));
   move_uploaded_file($lokasi_file, 'pelanggan/img/' . $nama_file);
   $query = "INSERT INTO menu (id_menu, nama_menu, kategori,stok, Harga, foto_menu, keterangan, status) VALUES ('$id_menu','$nama_menu', '$kategori', '$stok','$Harga', '$image', '$Keterangan', '$status')";
} else {
echo "<script> alert ('ukuran gambar $nama_file lebih dari 2 MB, Tidak Bisa Tambah Data'); window.location='menu.php'</script>";
}
$hasil = mysqli_query($conn, $query);
if ($hasil) {
echo "<script> alert ('Proses Tambah Menu Berhasil'); window.location='menu.php';</script>";
} 
else {
echo "<script> alert ('Proses Tambah Menu Gagal'); history.back();</script>"; 
}
    return mysqli_affected_rows($conn);
}


//fungsi untuk mengubah data pada tabel menu
function ubah_menu($data)
{
    //memanggil variabel global conn
    global $conn;
     $id_menu = htmlspecialchars($data["id_menu"]);
    $nama_menu = htmlspecialchars($data["nama_menu"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $Harga = htmlspecialchars($data["Harga"]);
    $stok = htmlspecialchars($data["stok"]);
    $Keterangan = htmlspecialchars($data["keterangan"]);
    $status = htmlspecialchars($data["status"]);

    $lokasi_file        =$_FILES['foto_menu']['tmp_name'];
    $nama_file          =$_FILES['foto_menu']['name'];
    $ukuran             =$_FILES['foto_menu']['size'];
    $image              =addslashes(file_get_contents($_FILES['foto_menu']['tmp_name']));
    if($nama_file!=''){
    move_uploaded_file($lokasi_file, 'pelanggan/img/' . $nama_file);
    $query = "UPDATE menu SET nama_menu='$nama_menu', kategori='$kategori', stok='$stok', Harga='$Harga', foto_menu = '$image', keterangan = '$Keterangan', STATUS='$status'
    WHERE id_menu='$id_menu';";
     $hasil = mysqli_query($conn, $query);
     if ($hasil) {
     echo "<script> alert ('Proses Tambah Menu Berhasil'); window.location='menu.php';</script>";
     } 
     else {
     echo "<script> alert ('Proses Tambah Menu Gagal'); history.back();</script>"; 
     }
    }
    else {
        $query = "UPDATE menu SET nama_menu='$nama_menu', kategori='$kategori', stok='$stok', Harga='$Harga', keterangan = '$Keterangan', STATUS='$status'
        WHERE id_menu='$id_menu';";
         $hasil = mysqli_query($conn, $query);
         if ($hasil) {
         echo "<script> alert ('Proses Tambah Menu Berhasil'); window.location='menu.php';</script>";
         } 
         else {
         echo "<script> alert ('Proses Tambah Menu Gagal'); history.back();</script>"; 
         }
    }
    return mysqli_affected_rows($conn);
}

//fungsi untuk menghapus data pada tabel menu
function hapus_menu($id)
{
    //memanggil variabel global conn
    global $conn;
    //query untuk menghapus data
    mysqli_query($conn, "CALL delete_menu ('$id')");
    return mysqli_affected_rows($conn);
}
 
//fungsi untuk menambah data pada tabel pegawai
function tambah_pegawai($data)
{
    //memanggil variabel global conn
    global $conn;
    //mendeklariskan variabel untuk tambah data
    $id_pegawai = htmlspecialchars($data["id_pegawai"]);
    $nama_pegawai = htmlspecialchars($data["nama_pegawai"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $posisi = htmlspecialchars($data["posisi"]);
    $jam_kerja = htmlspecialchars($data["jam_kerja"]);
    //query untuk menambah data
    $query = "CALL insert_pegawai ('$id_pegawai', '$nama_pegawai', '$alamat', '$no_hp', '$posisi', '$jam_kerja')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

//fungsi untuk mengubah data pada tabel pegawai
function ubah_pegawai($data)
{
    //memanggil variabel global conn
    global $conn;
    //mendeklariskan variabel untuk ubah data
    $id_pegawai = htmlspecialchars($data["id_pegawai"]);
    $nama_pegawai = htmlspecialchars($data["nama_pegawai"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $posisi = htmlspecialchars($data["posisi"]);
    $jam_kerja = htmlspecialchars($data["jam_kerja"]);
    //query untuk mengubah / updata data
    $query = "CALL update_pegawai ('$id_pegawai', '$nama_pegawai', '$alamat', '$no_hp', '$posisi', '$jam_kerja')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

//fungsi untuk menghapus data pada tabel pegawai
function hapus_pegawai($id)
{
    //memanggil variabel global conn
    global $conn;
    //query untuk menghapus data
    mysqli_query($conn, "CALL delete_pegawai ('$id')");
    return mysqli_affected_rows($conn);
} 

//fungsi untuk menambah data pada tabel detail orderan
function tambah_detail($data)
{
    //memanggil variabel global conn
    global $conn;
    //mendeklariskan variabel untuk tambah data
    $id_detail = htmlspecialchars($data["id_detail"]);
    $id_orderan = htmlspecialchars($data["id_orderan"]);
    $id_pegawai = htmlspecialchars($data["id_pegawai"]);
    $jumlah_orderan = htmlspecialchars($data["jumlah_orderan"]);
    $total_harga = htmlspecialchars($data["total_harga"]);
    $ongkir = htmlspecialchars($data["ongkir"]);
    $total_pembayaran = htmlspecialchars($data["total_pembayaran"]);
    //query untuk menambah data
    $query = "CALL insert_detail_orderan ('$id_detail', '$id_orderan', '$id_pegawai', '$jumlah_orderan', '$total_harga', '$ongkir', '$total_pembayaran')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

//fungsi untuk mengubah data pada tabel detail orderan
function ubah_detail($data)
{
    //memanggil variabel global conn
    global $conn;
    //mendeklariskan variabel untuk ubah data
    $id_detail = htmlspecialchars($data["id_detail"]);
    $id_orderan = htmlspecialchars($data["id_orderan"]);
    $id_pegawai = htmlspecialchars($data["id_pegawai"]);
    $jumlah_orderan = htmlspecialchars($data["jumlah_orderan"]);
    $total_harga = htmlspecialchars($data["total_harga"]);
    $ongkir = htmlspecialchars($data["ongkir"]);
    $total_pembayaran = htmlspecialchars($data["total_pembayaran"]);
    //query untuk mengubah / updata data
    $query = "CALL update_detail_orderan ('$id_detail', '$id_orderan', '$id_pegawai', '$jumlah_orderan', '$total_harga', '$ongkir', '$total_pembayaran')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

//fungsi untuk menghapus data pada tabel detail orderan
function hapus_detail_orderan($id)
{
    //memanggil variabel global conn
    global $conn;
    //query untuk menghapus data
    mysqli_query($conn, "CALL delete_detail_orderan ('$id')");
    return mysqli_affected_rows($conn);
}

function tambah_history($data)
{
    //memanggil variabel global conn
    global $conn;
    //mendeklariskan variabel untuk tambah data
    $id_history = htmlspecialchars($data["id_history"]);
    $id_detail = htmlspecialchars($data["id_detail"]);
    $tgl_beli = htmlspecialchars($data["tgl_beli"]);
    //query untuk menambah data
    $query = "CALL insert_history ('$id_history', '$id_detail', '$tgl_beli')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

//fungsi untuk mengubah data pada tabel menu
function ubah_history($data)
{
    //memanggil variabel global conn
    global $conn;
    //mendeklariskan variabel untuk ubah data
    $id_history = htmlspecialchars($data["id_history"]);
    $id_detail = htmlspecialchars($data["id_detail"]);
    $tgl_beli = htmlspecialchars($data["tgl_beli"]);
    //query untuk mengubah / updata data
    $query = "CALL update_history ('$id_history', '$id_detail', '$tgl_beli')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

//fungsi untuk menghapus data pada tabel menu
function hapus_history($id)
{
    //memanggil variabel global conn
    global $conn;
    //query untuk menghapus data
    mysqli_query($conn, "CALL delete_history ('$id')");
    return mysqli_affected_rows($conn);
}

function tambah_bukti($data)
{
    // Memanggil variabel global conn
    global $conn;

    // Mendeklarasikan variabel untuk tambah data
    $id_bukti = htmlspecialchars($data["id_bukti"]);
    $id_detail = htmlspecialchars($data["id_detail"]);
    $tanggal_pesan = htmlspecialchars($data["tanggal_pesan"]);

    $lokasi_file = $_FILES['foto_bukti']['tmp_name'];
    $nama_file = $_FILES['foto_bukti']['name'];
    $ukuran = $_FILES['foto_bukti']['size'];
    $image              =addslashes(file_get_contents($_FILES['foto_bukti']['tmp_name']));
    if ($ukuran <= 2048000) {
        move_uploaded_file($lokasi_file, 'pelanggan/img/' . $nama_file);
        $query = "INSERT INTO bukti_pembayaran (id_bukti,id_detail,foto_bukti,tanggal_pesan) VALUES ('$id_bukti','$id_detail','$image','$tanggal_pesan')";

        $hasil = mysqli_query($conn, $query);
        if ($hasil) {
            echo "<script> alert ('Proses Tambah bukti pembayaran Berhasil'); window.location='bukti-pembayaran.php';</script>";
        } else {
            echo "<script> alert ('Proses Tambah bukti pembayaran Gagal'); history.back();</script>";
        }
    } else {
        echo "<script> alert ('Ukuran gambar $nama_file lebih dari 2 MB, Tidak Bisa Tambah Data'); window.location='bukti-pembayaran.php'</script>";
    }

    return mysqli_affected_rows($conn);
}


//fungsi untuk mengubah data pada tabel menu
function ubah_bukti($data)
{
    //memanggil variabel global conn
    global $conn;
    $id_bukti = htmlspecialchars($data["id_bukti"]);
    $id_detail = htmlspecialchars($data["id_detail"]);
    $tanggal_pesan = htmlspecialchars($data["tanggal_pesan"]);

    $lokasi_file = $_FILES['foto_bukti']['tmp_name'];
    $nama_file = $_FILES['foto_bukti']['name'];
    $ukuran = $_FILES['foto_bukti']['size'];
    $image              =addslashes(file_get_contents($_FILES['foto_bukti']['tmp_name']));
    if($nama_file!=''){
    move_uploaded_file($lokasi_file, 'pelanggan/img/' . $nama_file);
    $query = "UPDATE bukti_pembayaran SET id_detail='$id_detail', foto_bukti = '$image', tanggal_pesan = '$tanggal_pesan' WHERE id_bukti='$id_bukti';";
     $hasil = mysqli_query($conn, $query);
     if ($hasil) {
     echo "<script> alert ('Proses Ubah Bukti Pembayaran Berhasil'); window.location='bukti-pembayaran.php';</script>";
     } 
     else {
     echo "<script> alert ('Proses Ubah Bukti Pembayaran Gagal'); history.back();</script>"; 
     }
    }
    else {
        $query = "UPDATE bukti_pembayaran SET id_detail='$id_detail', tanggal_pesan = '$tanggal_pesan' WHERE id_bukti='$id_bukti';";
         $hasil = mysqli_query($conn, $query);
         if ($hasil) {
         echo "<script> alert ('Proses Ubah Bukti Pembayaran Berhasil'); window.location='bukti-pembayaran.php';</script>";
         } 
         else {
         echo "<script> alert ('Proses Ubah Bukti Pembayaran Gagal'); history.back();</script>"; 
         }
    }
    return mysqli_affected_rows($conn);
}


//fungsi untuk menghapus data pada tabel menu
function hapus_bukti($id)
{
    //memanggil variabel global conn
    global $conn;
    //query untuk menghapus data
    mysqli_query($conn, "CALL delete_bukti ('$id')");
    return mysqli_affected_rows($conn);
}
?>