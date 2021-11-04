<?php
require 'function.php';

// ambil data id dari url
$id = $_GET['id'];

if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}


// query data berdasarkan id
$m = query("SELECT * FROM mahasiswa WHERE id = $id");
var_dump($m);

// cek apakah tombo tambah sudah di tekan
if (isset($_POST['ubah'])) {
  // jika udah di kllik tombol tambah, ambil data post, kirimkan ke sebuah function namanya tambah
  // tambah($_POST);
  // cek jika function tambah berhasil 
  if (ubah($_POST) > 0) {
    echo "<script>
          alert('Berhasil Diubah');
          document.location.href = 'index.php';
          </script>";
  } else {
    echo "<script>
          alert('Gagal Diubah');
          document.location.href = 'index.php';
          </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Ubah Data Mahasiswa</title>
</head>

<body>
  <a href="index.php">Kembali</a>
  <h3>Form Ubah Data Mahasiswa</h3>
  <form action="" method="POST">
    <input type="hidden" name="id" value="<?= $m['id'] ;?>">
    <ul>
      <li>
        <label>
          Nama :
          <input type="text" name="nama" autofocus value="<?= $m['nama'] ;?>">
        </label>
      </li>
      <li>
        <label>
          NRP :
          <input type="text" name="nrp" value="<?= $m['nrp'] ;?>">
        </label>
      </li>
      <li>
        <label>
          Email :
          <input type="email" name="email" value="<?= $m['email'] ;?>">
        </label>
      </li>
      <li>
        <label>
          Jurusan :
          <input type="text" name="jurusan" value="<?= $m['jurusan'] ;?>" >
        </label>
      </li>
      <li>
        <label>
          Gambar :
          <input type="text" name="gambar" value="<?= $m['gambar'] ;?>">
        </label>
      </li>
      <li>
        <button type="submit" name="ubah">Ubah Data</button>
      </li>
    </ul>
  </form>
</body>

</html>