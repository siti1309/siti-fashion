<div class="box-title">
    <p>Profil / <b>Detail User</b></p>
</div>
<div id="box">
  <h1>Profil</h1>
  <?php

  include 'lib/koneksi.php';

  $user = $_SESSION['username'];
  $ambiluser = $conn->prepare("SELECT * FROM tbl_users WHERE username =:user");
  $ambiluser->bindparam(':user', $user);
  $ambiluser->execute();
  $data = $ambiluser->fetch(PDO::FETCH_OBJ);
   ?>
  <table class="article">
    <tr>
      <td>Status</td>
      <td>
        <input type="button" value="<?php echo $data->title; ?>">
      </td>
    </tr>
    <tr>
      <td>Nama Lengkap</td>
      <td>
        <?php echo $data->nama_lengkap; ?>
      </td>
    </tr>
    <tr>
      <td>Email</td>
      <td>
        <?php echo $data->email; ?>
      </td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>
        <?php echo $data->alamat; ?>
      </td>
    </tr>
    <tr>
      <td>No Hp</td>
      <td>
        <?php echo $data->no_hp; ?>
      </td>
    </tr>
    <tr>
      <td>Username</td>
      <td>
        <?php echo $data->username; ?>
      </td>
    </tr>
    <tr>
      <td>Password</td>
      <td>
        <input type="password" name="" value="<?php echo $data->password; ?>" disabled>
      </td>
    </tr>
    <tr>
      <td></td>
      <td>
        <a class="tombol-biru" href="?page=profilad_ubah">Ubah</a>
        <a class="tombol-merah" href="?page=beranda">Kembali</a>
      </td>
    </tr>
  </table>
  <br>
</div>
