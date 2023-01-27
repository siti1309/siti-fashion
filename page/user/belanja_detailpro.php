<div class="box-title">
    <p>Beranda / <b>Produk Jualan</b></p>
</div>
<div id="box">
<h1>Detail Barang</h1>
<?php
// code by muh iriansyah putra pratama
    include 'lib/koneksi.php';
// code by muh iriansyah putra pratama

    $iduser = $_POST['id_user'];
    $idbarang = $_POST['id_barang'];
    $harga = $_POST['harga'];
    $date = date('Ymd');
    $ukuran = $_POST['ukuran'];
    $qty = $_POST['qty'];
    $kurir = $_POST['kurir'];
    $total = $harga * $qty;
    $sisa = $_POST['sisa'];
// code by muh iriansyah putra pratama

    if ($qty > $sisa){
      echo "<script>alert('Kuantitas pesanan melebihi sisa stok barang');window.location='?page=belanja_detail&id=$idbarang&st=$sisa'</script>";
    }
    elseif ($qty <= 0){
      echo "<script>alert('Keliru dalam menginputkan kuantitas');window.location='?page=belanja_detail&id=$idbarang&st=$sisa'</script>";
    }
    else {

    try {
      $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $pdo = $conn->prepare('INSERT INTO tbl_keranjang (id_user, id_barang, ukuran, qty, kurir, date_in, total)
                  values (:id_user, :id_barang, :ukuran, :qty, :kurir, :date_in, :total)');
      $insertdata = array(':id_user' => $iduser, ':id_barang' => $idbarang, ':ukuran' => $ukuran, 'qty' => $qty, 'kurir' => $kurir, ':date_in' => $date, ':total' => $total);

      $pdo->execute($insertdata);
// code by muh iriansyah putra pratama
      echo "<center><b>barang berhasil ditambahkan ke keranjang</b></center>";
      echo"<meta http-equiv='refresh' content='1;
      url=?page=beranda'>";

    } catch (PDOexception $e) {
      print "Added data failed: " . $e->getMessage() . "<br/>";
       die();
    }
    }
// code by muh iriansyah putra pratama
 ?>
</div>
