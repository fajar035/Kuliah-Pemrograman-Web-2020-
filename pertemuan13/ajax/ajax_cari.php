<?php
require '../function.php';

$mahasiswa = cari($_GET['cari']);
?>

<table border="1" cellpadding="10" cellspacing="0">
  <tr>
    <th>No</th>
    <th>Gambar</th>
    <th>Nama</th>
    <th>Aksi</th>
  </tr>

  <?php if (empty($mahasiswa)) : ?>
    <tr>
      <td colspan="5">
        <p style="font-size: 30px; color:red; font-style: italic;">Data Tidak Ditemukan</p>
      </td>
    </tr>
  <?php endif; ?>


  <?php $nomor = 1; ?>
  <?php foreach ($mahasiswa as $m) : ?>
    <tr>
      <td><?= $nomor; ?></td>
      <td><img src="picture/<?= $m['gambar']; ?>" alt="foto" width="50" height="50"></td>
      <td><?= $m['nama']; ?></td>
      <td>
        <button><a href="detail.php?id=<?= $m['id']; ?>">Lihat Detail</a></button>

      </td>
    </tr>
  <?php endforeach; ?>
  <?php $nomor++; ?>
</table>