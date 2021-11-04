<?php
session_start();

require 'function.php';

// cek session
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

// cek apakah tombo tambah sudah di tekan
if (isset($_POST['tambah'])) {
  // jika udah di kllik tombol tambah, ambil data post, kirimkan ke sebuah function namanya tambah
  // tambah($_POST);
  // cek jika function tambah berhasil 
  if (tambah($_POST) > 0) {
    echo "<script>
          alert('Berhasil Ditambah');
          document.location.href = 'index.php';
          </script>";
  } else {
    echo "<script>
          alert('Gagal Ditambah');
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
  <title>Form Tambah Data Mahasiswa</title>
</head>

<body>
  <a href="index.php">Kembali</a>
  <h3>Form Tambah Data Mahasiswa</h3>
  <form action="" method="post" enctype="multipart/form-data">
    <ul>
      <li>
        <label>
          Nama :
          <input type="text" name="nama" autofocus required>
        </label>
      </li>
      <li>
        <label>
          NRP :
          <input type="text" name="nrp">
        </label>
      </li>
      <li>
        <label>
          Email :
          <input type="email" name="email">
        </label>
      </li>
      <li>
        <label>
          Jurusan :
          <input type="text" name="jurusan">
        </label>
      </li>
      <li>
        <label>
          Gambar :
          <input type="file" name="gambar" class="gambar" onchange="priviewImage()">
        </label>
        <img src="picture/nopoto.jpg" width="120" style="display: block;" class="img-priview">
      </li>
      <li>
        <button type="submit" name="tambah">Tambah Data</button>
      </li>
    </ul>
  </form>

  <script src="js/script.js"></script>
</body>

</html>