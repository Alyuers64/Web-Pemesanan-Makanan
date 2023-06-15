<html>

<head>
    <meta charset="utf-8">
    <title>Nota Pembayaran</title>
    <link rel="stylesheet" href="assets/css/css-struk.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- <script src="nota.js"></script> -->
</head>

<body>
    <header>
        <h1>Nota Pembayaran</h1>
        <address>
            <?php include("koneksi.php");
            
// if (isset($_GET['id_detail'])) {
//     $id=$_GET['id_detail'];
//     $data = mysqli_query ($conn,"SELECT * FROM detail_orderan WHERE id_detail='$id'");
//     $result = mysqli_query($conn, $data);
//     $data2 = mysqli_fetch_array($result);
    
//    }else{
//     echo 'data kosong';
//    }

    $id=$_GET['id'];
    $data = mysqli_query ($conn,"SELECT * FROM pelanggan_offline WHERE nama_pelanggan='$id'");
    
    while ($row = mysqli_fetch_array($data)) {
      ?>
            <p>Nama Kasir : <?php echo $row['nama_pegawai']; ?></p>
            <p>Resto Memoriam<br>Palangka Raya</p>
            <p>0857-5540-1222</p>
            <br>
            <!-- <a href="#" value="Print" onclick="window.print()" class="button"><i class="fa fa-file"
                    aria-hidden="true"></i> Cetak Struk</a> -->
        </address>
        <span><img alt="" src="http://www.jonathantneal.com/examples/invoice/logo.png"><input type="file"
                accept="image/*"></span>
    </header>
    <article>
        <h1>Pembayaran</h1>
        <address>
            <p>Nama Pelanggan<br><?php echo $row['nama_pelanggan']; ?></p>

        </address>
        <table class="meta">
            <tr>
                <th><span>ID Detail #</span></th>
                <td><span><?php echo $row['id_detail']; ?></span></td>
            </tr>
            <tr>
                <th><span>Tanggal, Waktu</span></th>
                <td><span><?php echo $row['tgl_beli']; ?> WIB</span></td>
            </tr>

        </table>
        <table class="inventory">
            <thead>
                <tr>
                    <th><span>Nama Pesanan</span></th>
                    <th><span>Jumlah Orderan</span></th>
                    <th><span>Jenis Orderan</span></th>
                    <th><span>Harga Satuan</span></th>
                    <th><span>Status Pembayaran</span></th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <!-- <a class="cut">-</a> -->
                        <span><?php echo $row['nama_menu']; ?></span>
                    </td>
                    <td><span></span><span><?php echo $row['jumlah_orderan']; ?></span></td>
                    <td><span></span><span><?php echo $row['jenis_orderan']; ?></span></td>
                    <td><span></span>Rp.<?php echo number_format($row['total_harga']) ?></td>
                    <td><span></span><?php echo $row['status_orderan']; ?></td>
                </tr>
            </tbody>
        </table>
        <!-- <a class="add">+</a> -->
        <table class="balance">
            <tr>
                <th><span>Total</span></th>
                <td><span></span><span>Rp.<?php echo number_format($row['total_pembayaran']) ?></span></td>
            </tr>
            <!-- <tr>
                <th><span>Ongkir</span></th>
                <td><span>Rp. </span><span><?php echo $row['ongkir']; ?></span></td>
            </tr> -->
            <!-- <tr>
                <th><span>Diskon</span></th>
                <td><span>Rp. </span><span>0</span></td>
            </tr> -->
        </table>
        <?php 
}
?>

    </article>
    <aside>
        <h1><span>Terima Kasih</span></h1>

    </aside>

    <script>
    window.print();
    </script>
</body>

</html>