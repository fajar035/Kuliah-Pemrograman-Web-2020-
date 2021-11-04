<?php
session_start();

// cek session
if (!isset($_SESSION['login'])) {
  header("Location: index.php");
}
require 'function.php';
// ambil id di url
$id = $_GET['id'];

// query data
$mahasiswa = query("SELECT * FROM mahasiswa WHERE id = '$id'");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Mahasiswa</title>
</head>

<body>
  <h3>Detail Mahasiswa</h3>

  <ul>
    <li><img src="picture/<?= $mahasiswa['gambar']; ?>" width="200" height="200" alt="foto"></li>
    <li>NRP : <?= $mahasiswa['nrp']; ?></li>
    <li>Nama : <?= $mahasiswa['nama']; ?></li>
    <li>Email : <?= $mahasiswa['email']; ?></li>
    <li>Jurusan : <?= $mahasiswa['jurusan']; ?></li>
    <li><a href="ubah.php?id=<?= $id; ?>">Ubah</a> | <a href="hapus.php?id=<?= $id; ?>" onclick="return confirm('Apakah yakin ingin menghapus?');">Hapus</a></li>
    <li><a href="index.php">Kembali</a></li>
  </ul>

</body>

</html>