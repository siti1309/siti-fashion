<div class="box-title">
    <p>Beranda / <b>Produk Jualan</b></p>
</div>
<div id="box">

<!-- code by muh iriansyah putra pratama -->
<?php
  include "lib/koneksi.php";

    $user = $_SESSION['username'];
    $ambiluser = $conn->prepare("SELECT * FROM tbl_users WHERE username =:user");
    $ambiluser->bindparam(':user', $user);
    $ambiluser->execute();
    $data = $ambiluser->fetch(PDO::FETCH_OBJ);

    $id = $_GET['id'];
    $sisa = $_GET['st'];
    $result = $conn->prepare("SELECT * FROM tbl_barang WHERE id_barang =:id");
    $result->bindparam(':id', $id);
    $result->execute();
    $row=$result->fetch(PDO::FETCH_OBJ);
 ?>

<h1>Detail Barang</h1>
<!-- code by muh iriansyah putra pratama -->
<form name="belanja" method="post" action="?page=belanja_detailpro" enctype="multipart/form-data">

  <table class="article">
    <tr>
      <td>Gambar</td>
      <td>
        <input type="hidden" name="id_user" value="<?php echo $data->id_user ?>">
        <input type="hidden" name="id_barang" value="<?php echo $row->id_barang ?>">
        <img src="img/jersey/<?php echo $row->nama_image ?>" width="100"><br><br>
      </td>
    </tr>
<!-- code by muh iriansyah putra pratama -->
    <tr>
      <td>Deskripsi Jersey</td>
      <td>
        <?php echo $row->deskripsi ?>
      </td>
    </tr>
<!-- code by muh iriansyah putra pratama -->
    <tr>
      <td>Harga</td>
      <td>
        <input type="hidden" name="harga" value="<?php echo $row->harga; ?>">
        <?php echo "Rp. ".$row->harga ?>
      </td>
    </tr>
<!-- code by muh iriansyah putra pratama -->
    <tr>
      <td>Stok</td>
      <td>
        <input type="hidden" name="sisa" value="<?php echo $sisa ?>">
        <?php echo $sisa ?>
      </td>
    </tr>
<!-- code by muh iriansyah putra pratama -->
    <tr>
      <td>Ukuran</td>
      <td>
        <select name="ukuran">
          <option>-- pilih salah satu --</option>
          <option value="S">S</option>
          <option value="M">M</option>
          <option value="L">L</option>
          <option value="XL">XL</option>
          <option value="XXL">XXL</option>
        </select>
      </td>
    </tr>
<!-- code by muh iriansyah putra pratama -->
    <tr>
      <td>Qty</td>
      <td>
        <input type="number" name="qty" min="1">
      </td>
    </tr>
<!-- code by muh iriansyah putra pratama -->
    <tr>
      <td>Kurir Pengiriman</td>
      <td>
        <select name="kurir">
          <option>-- pilih salah satu --</option>
          <option value="POS">POS Indonesia</option>
          <option value="JNE">JNE</option>
          <option value="TIKI">TIKI</option>
          <option value="KILAT">KILAT</option>
          <option value="SICEPAT">SI-CEPAT</option>
          <option value="GOJEK">GO-JEK</option>
        </select>
      </td>
    </tr>
<!-- code by muh iriansyah putra pratama -->
    <tr>
      <td></td>
      <td>
        <input class="tombol-biru" type="submit" name="belanja" value="Isi dalam keranjang">
        <a class="tombol-merah" href="?page=beranda">Kembali</a>
      </td>
    </tr>
  </table>
<!-- code by muh iriansyah putra pratama -->
</form>
<!-- code by muh iriansyah putra pratama -->
</div>
