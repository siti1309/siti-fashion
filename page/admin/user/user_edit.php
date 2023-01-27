<div class="box-title">
    <p>User / <b>Manajemen User</b></p>
</div>
<div id="box">

<!-- code by muh iriansyah putra pratama -->
<?php
  include "lib/koneksi.php";

    $id = $_GET['id'];
    $result = $conn->prepare("SELECT * FROM tbl_users WHERE id_user =:id");
    $result->bindparam(':id', $id);
    $result->execute();
    $row=$result->fetch(PDO::FETCH_OBJ);
 ?>

<h1>User Ubah</h1>
<!-- code by muh iriansyah putra pratama -->
<form name="edit" method="post" action="?page=user_editpro" enctype="multipart/form-data">

  <table class="article">
    <tr>
      <td>Id User</td>
      <td>
        <input type="button" name="id_user" value="<?php echo $row->id_user ?>">
      </td>
    </tr>
    <tr>
      <td>Nama Lengkap</td>
      <td>
        <input type="hidden" name="id_user" value="<?php echo $row->id_user ?>">
        <input type="text" name="nama_lengkap" size="40" value="<?php echo $row->nama_lengkap ?>">
      </td>
    </tr>
<!-- code by muh iriansyah putra pratama -->
    <tr>
      <td>Email</td>
      <td>
        <input type="text" name="email" size="30" value="<?php echo $row->email ?>" required>
      </td>
    </tr>
<!-- code by muh iriansyah putra pratama -->
    <tr>
      <td>Alamat</td>
      <td>
        <textarea name="alamat" rows="4" cols="40"><?php echo $row->alamat ?></textarea>
      </td>
    </tr>
<!-- code by muh iriansyah putra pratama -->
    <tr>
      <td>No HP</td>
      <td>
        <input type="text" name="no_hp" value="<?php echo $row->no_hp ?>" required>
      </td>
    </tr>
<!-- code by muh iriansyah putra pratama -->
    <tr>
      <td>Username</td>
      <td>
        <input type="text" name="username" maxlength="6" value="<?php echo $row->username ?>" required>
      </td>
    </tr>
<!-- code by muh iriansyah putra pratama -->
    <tr>
      <td>Password</td>
      <td>
        <input type="text" name="password" maxlength="6" value="<?php echo $row->password ?>" required>
      </td>
    </tr>
<!-- code by muh iriansyah putra pratama -->
    <tr>
      <td></td>
      <td>
        <input class="tombol-biru" type="submit" name="edit" value="Ubah & Simpan">
        <a class="tombol-merah" href="?page=user">Tutup</a>
      </td>
    </tr>
  </table>
<!-- code by muh iriansyah putra pratama -->
</form>
<!-- code by muh iriansyah putra pratama -->
</div>
