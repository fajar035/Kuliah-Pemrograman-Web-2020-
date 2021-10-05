<?php
// Koneksi Database
$conn = mysqli_connect("localhost", "root", "", "fajar");

// Query isi tabel mahasiswa
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

// Ubah data ke dalam array
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

// Tampung ke variable mahasiswa
$mahasiswa = $rows;
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
            <th>NRP</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
        <?php $nomor = 1; ?>
        <?php foreach ($mahasiswa as $m) : ?>
            <tr>
                <td><?= $nomor; ?></td>
                <td><img src="picture/<?= $m['gambar']; ?>" alt="foto" width="50" height="50"></td>
                <td><?= $m['nrp']; ?></td>
                <td><?= $m['nama']; ?></td>
                <td><?= $m['email']; ?></td>
                <td><?= $m['jurusan']; ?></td>
                <td>
                    <button><a href="#">Edit</a></button>
                    <button><a href="#">Hapus</a></button>
                </td>
            </tr>
            <?php $nomor++; ?>
        <?php endforeach; ?>
    </table>
</body>

</html>