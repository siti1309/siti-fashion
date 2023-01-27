<div class="box-title">
    <p>Barang / <b>Manajemen Barang Jualan</b></p>
</div>
<div id="box">

<h1>Barang Jualan Ubah</h1>
<!-- code by muh iriansyah putra pratama -->
<?php

  include 'lib/koneksi.php';

$id = $_POST['id_barang'];
$desk = $_POST['deskripsi'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

$name_image = $_FILES['gambar']['name'];
$loc_image = $_FILES['gambar']['tmp_name'];
$type_image = $_FILES['gambar']['type'];

$date = date('Ymd');

$cek         = array('png','jpg','jpeg','gif');
$x           = explode('.',$name_image);
$extension   = strtolower(end($x));
$size_image  = $_FILES['gambar']['size'];
// code by muh iriansyah putra pratama

if ($loc_image != ""){

      if (in_array($extension, $cek) === TRUE){
        if ($size_image < 5044070){
// code by muh iriansyah putra pratama
          $query = $conn->prepare("SELECT * FROM tbl_barang WHERE id_barang =:id ");
          $query->bindparam(':id', $id);
          $query->execute();
          $row=$query->fetch(PDO::FETCH_OBJ);

          if ($row->nama_image)
            unlink("img/jersey/$row->nama_image");

            move_uploaded_file($loc_image,"img/jersey/$name_image");
// code by muh iriansyah putra pratama
          try {
      			$conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      			$pdo = $conn->prepare('UPDATE tbl_barang SET
                                  deskripsi = :deskripsi,
                                  harga = :harga,
                                  stok = :stok,
                                  created = :created,
                                  nama_image = :nama_image,
                                  type_image = :type_image,
                                  size_image = :size_image
                                  WHERE id_barang = :id_barang');

      			$updatedata = array(':deskripsi' => $desk, ':harga' => $harga, ':stok' => $stok, 'created' => $date, ':nama_image' => $name_image,
      						              ':type_image' => $type_image, ':size_image' => $size_image, ':id_barang' => $id);
// code by muh iriansyah putra pratama
      			$pdo->execute($updatedata);

						echo "<center><img src='img/icons/ceklist.png' width='60'></center>";
      			echo "<center><b>data barang berhasil diubah</b></center>";
            echo "</br>";
						echo"<meta http-equiv='refresh' content='1;
				    url=?page=barang'>";

      		} catch (PDOexception $e) {
      			print "Insert data gagal: " . $e->getMessage() . "<br/>";
      		   die();
      		}
			}else{
				echo "<center><img src='img/icons/cancel.png' width='60'></center>";
			  echo "<center><b>ukuran file gambar terlalu besar</b></center>";
				echo "<center><a href='?page=barang'>back</a></center>";
        echo "</br>";
      }
			}else {
				echo "<center><img src='img/icons/cancel.png' width='60'></center>";
			  echo"<center><b>ekstensi file tidak sesuai</b></center>";
				echo "<center><a href='?page=barang'>back</a></center>";
        echo "</br>";
			}
		}else{
// code by muh iriansyah putra pratama
			try {
				$conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo = $conn->prepare('UPDATE tbl_barang SET
															deskripsi = :deskripsi,
                              harga = :harga,
                              stok = :stok,
															created = :created
															WHERE id_barang = :id_barang');

				$updatedata = array(':deskripsi' => $desk, ':harga' => $harga, ':stok' => $stok, 'created' => $date, ':id_barang' => $id);
				$pdo->execute($updatedata);

				echo "<center><img src='img/icons/ceklist.png' width='60'></center>";
				echo "<center><b>data barang berhasil diubah</b></center>";
        echo "</br>";
				echo"<meta http-equiv='refresh' content='1;
		    url=?page=barang'>";


			} catch (PDOexception $e) {
				print "Insert data gagal: " . $e->getMessage() . "<br/>";
				 die();
			}
// code by muh iriansyah putra pratama
		}

 ?>
<!-- code by muh iriansyah putra pratama -->

</div>
