<div class="box-title">
    <p>Pesanan / <b>Daftar Pesanan</b></p>
</div>
<div id="box">
  <h1>Pesanan</h1>

  <?php
  include 'lib/koneksi.php';

  if (isset($_SESSION['username'])) $user = $_SESSION['username'];
  $ambiluser = $conn->prepare("SELECT * FROM tbl_users WHERE username =:user");
  $ambiluser->bindparam(':user', $user);
  $ambiluser->execute();
  $data = $ambiluser->fetch(PDO::FETCH_OBJ);
  if (isset($_SESSION['username'])) $id = $data->id_user;

  $query = $conn->prepare("SELECT * FROM tbl_pesanan
                           JOIN tbl_barang ON tbl_pesanan.id_barang=tbl_barang.id_barang
                           WHERE tbl_pesanan.id_user=:id
                           GROUP BY tbl_pesanan.id_pesanan");
  $query->bindparam(':id', $id);
  $query->execute();
  $data = $query->fetchAll();
  $count = $query->rowCount();
  ?>

  <table class="news">
    <tr>
      <th>No</th>
      <th>Id Pesanan</th>
      <th>Barang</th>
      <th>Harga</th>
      <th>Ukuran</th>
      <th>Qty</th>
      <th>Kurir</th>
      <th>Tanggal Masuk</th>
      <th>Total</th>
      <th>Status</th>
    </tr>
    <?php
    $no=1;
    foreach ($data as $value): ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $value['id_pesanan'] ?></td>
            <td><?php echo $value['deskripsi'] ?></td>
            <td><?php echo $value['harga'] ?></td>
            <td><?php echo $value['ukuran'] ?></td>
            <td><?php echo $value['qty'] ?></td>
            <td><?php echo $value['kurir'] ?></td>
            <td><?php echo $value['date_in'] ?></td>
            <td><?php echo $value['total'] ?></td>
            <td>
              <a class="tombol-biru">Sukses</a>
            </td>
        </tr>
    <?php
    $no++;
    endforeach;
     ?>
  </table>
  <br>
  <?php
  if ($count == 0){
    echo "<center>-- Belum ada pesanan barang --</center>";
    echo "<br>";
  }
   ?>
</div>
