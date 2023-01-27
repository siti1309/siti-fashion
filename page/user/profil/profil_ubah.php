<div class="box-title">
    <p>Profil / <b>Detail User</b></p>
</div>
<div id="box">
  <h1>Profil Ubah</h1>
  <?php

  include 'lib/koneksi.php';

  $user = $_SESSION['username'];
  $ambiluser = $conn->prepare("SELECT * FROM tbl_users WHERE username =:user");
  $ambiluser->bindparam(':user', $user);
  $ambiluser->execute();
  $data = $ambiluser->fetch(PDO::FETCH_OBJ);
   ?>

  <form name="ubah" action="?page=profil_ubahpro" method="post" enctype="multipart/form-data">

  <table class="article">
    <tr>
      <td>Id User</td>
      <td>
        <input type="hidden" name="id_user" value="<?php echo $data->id_user; ?>">
        <input type="button" name="id_user" value="<?php echo $data->id_user; ?>">
      </td>
    </tr>
    <tr>
      <td>Nama Lengkap</td>
      <td>
        <input type="text" name="nama_lengkap" value="<?php echo $data->nama_lengkap; ?>" required>
      </td>
    </tr>
    <tr>
      <td>Email</td>
      <td>
        <input type="text" name="email" value="<?php echo $data->email; ?>" required>
      </td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>
        <textarea name="alamat" rows="5" cols="40" required><?php echo $data->alamat; ?></textarea>
      </td>
    </tr>
    <tr>
      <td>No Hp</td>
      <td>
        <input type="text" name="no_hp" value="<?php echo $data->no_hp; ?>" required>
      </td>
    </tr>
    <tr>
      <td>Username</td>
      <td>
        <input type="text" name="username" maxlength="6" value="<?php echo $data->username; ?>" required>
      </td>
    </tr>
    <tr>
      <td>Password</td>
      <td>
        <input type="text" name="password" maxlength="6" value="<?php echo $data->password; ?>" required>
      </td>
    </tr>
    <tr>
      <td></td>
      <td>
        <input class="tombol-biru" type="button" value="Jika melakukan perubahan data, maka akun akan otomatis KELUAR. Setelah itu MASUK lagi seperti biasa">
      </td>
    </tr>
    <tr>
      <td></td>
      <td>
        <input class="tombol-biru" type="submit" name="ubah" value="Ubah & Simpan">
        <a class="tombol-merah" href="?page=profil">Kembali</a>
      </td>
    </tr>
  </table>

  </form>
  <br>
</div>
