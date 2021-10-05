<?php
require 'function.php';
$mahasiswa = query("SELECT * FROM mahasiswa");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <!-- <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
    </style> -->
</head>

<body>
    <h3>Daftar Mahasiswa</h3>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
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
</body>

</html>