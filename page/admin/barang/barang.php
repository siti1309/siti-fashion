<div class="box-title">
    <p>Barang / <b>Manajemen Barang Jualan</b></p>
</div>
<div id="box">

  <!-- code by muh iriansyah putra pratama -->
  <?php
      include 'lib/koneksi.php';

      $hal = isset($_GET['hal']) ? $_GET['hal'] : 1;
      $batas = 5;
      $posisi = ($hal-1) * $batas;
  // code by muh iriansyah putra pratama
      $query = $conn->prepare("SELECT * FROM tbl_barang LIMIT $posisi, $batas");
      $query->execute();
      $data = $query->fetchAll();
      $count = $query->rowCount();
  ?>

  <h1>Barang Jualan</h1>
  <a href="?page=tambah_barang"class="tombol-biru">Tambah Barang</a><br><br>
  <table class="news">
    <tr>
      <th>Id Barang</th>
      <th>Gambar</th>
      <th>Deskripsi</th>
      <th>Harga</th>
      <th>Stok</th>
      <th>Created</th>
      <th>Aksi</th>
    </tr>
    <?php
    foreach ($data as $value): ?>
        <tr>
            <td><?php echo $value['id_barang'] ?></td>
            <td>
              <img src="img/jersey/<?= $value['nama_image'];?>" width="80">
            </td>
            <td><?php echo $value['deskripsi'] ?></td>
            <td><?php echo $value['harga'] ?></td>
            <td><?php echo $value['stok'] ?></td>
            <td><?php echo $value['created'] ?></td>
            <td>
              <a class="tombol-biru" href="?page=edit_barang&id=<?php echo $value['id_barang']; ?>">ubah</a><br><br>
              <a class="tombol-merah" href="?page=hapus_barang&id=<?php echo $value['id_barang']; ?>">hapus</a>
            </td>
        </tr>

    <?php
    endforeach;
     ?>
  </table>
  <br>
  <?php

    if ($count == 0){
      echo "<center>-- Belum ada data barang --</center>";
    }

    $semua = $conn->prepare("SELECT * FROM tbl_barang");
    $semua->execute();
    $jmldata = $semua->rowCount();
    $jmlhal = ceil($jmldata/$batas);
    $sebelum = $hal - 1;
    $berikut = $hal + 1;
  // code by muh iriansyah putra pratama
    echo "<div class='paging'>";

    if ($hal > 1){
      echo "<span><a href='?page=barang&hal=1'><<</a></span>";
      echo "<span><a href='?page=barang&hal=$sebelum'>Previous</a></span>";
    }else {
      echo "<span><<</span>";
      echo "<span>Previous</span>";
    }

    if ($hal < $jmlhal){
      echo "<span><a href='?page=barang&hal=$berikut'>Next</a></span>";
      echo "<span><a href='?page=barang&hal=$jmlhal'>>></a></span>";
    }else {
      echo "<span>Next</span>";
      echo "<span>>></span>";
    }

    echo "</div>";
  ?>
  <!-- code by muh iriansyah putra pratama -->




</div>
