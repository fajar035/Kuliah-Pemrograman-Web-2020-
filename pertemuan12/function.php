<?php

// koneksi database
function koneksi()
{
  return mysqli_connect("localhost", "root", "", "fajar");
}

// query data
function query($query)
{
  $conn = koneksi();

  $result = mysqli_query($conn, $query);

  // Jika data hanya 1
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

// tambah data
function tambah($data)
{
  $conn = koneksi();

  $nama = htmlspecialchars($data['nama']);
  $nrp = htmlspecialchars($data['nrp']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "INSERT INTO
                mahasiswa
            VALUES
            (null, '$nama', '$nrp', '$email', '$jurusan', '$gambar')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

// hapus data
function hapus($id)
{
  $conn = koneksi();
  mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

// ubah data
function ubah($data)
{
  $conn = koneksi();

  $id = $data['id'];
  $nama = htmlspecialchars($data['nama']);
  $nrp = htmlspecialchars($data['nrp']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "UPDATE mahasiswa SET
              nama = '$nama',
              nrp = '$nrp',
              email = '$email',
              jurusan = '$jurusan',
              gambar = '$gambar'
              WHERE id = $id";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function cari($data)
{
  $conn = koneksi();

  $query = "SELECT * FROM mahasiswa
              WHERE 
            nama LIKE '%$data%' OR
            nrp LIKE '%$data%'";

  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function login($data)
{
  $conn = koneksi();

  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  // cek username
  if ($user = query("SELECT * FROM users WHERE username = '$username'")) {
    // cek password
    if (password_verify($password, $user['password'])) {
      // set session
      $_SESSION['login'] = true;
      header('Location: index.php');
      exit;
    }
  }
  return [
    'error' => true,
    'pesan' => 'Username / password salah'
  ];
}

function daftar($data)
{
  $conn = koneksi();

  $username = htmlspecialchars(strtolower($data['username']));
  $password1 = mysqli_real_escape_string($conn, $data['password1']);
  $password2 = mysqli_real_escape_string($conn, $data['password2']);

  // cek jika data kosong
  if (empty($username) || empty($password1) || empty($password2)) {
    echo "<script>
            alert('Username / Password Tidak boleh kosong !!');
            document.location.href = 'daftar.php';
          </script>";
    return false;
  }

  // jika username sudah ada
  if (query("SELECT * FROM users WHERE username = '$username'")) {
    echo "<script>
            alert('Username Sudah Terdaftar');
            document.location.href = 'daftar.php';
          </script>";
    return false;
  }

  // konfirmasi password tidak sesuai
  if ($password1 !== $password2) {
    echo "<script>
            alert('Konfirmasi Password Tidak Sama!!');
            document.location.href = 'daftar.php';
          </script>";
    return false;
  }

  // jika password < 5 digit
  if (strlen($password1) < 5) {
    echo "<script>
            alert('Password Terlalu pendek');
            document.location.href = 'login.php';
          </script>";
    return false;
  }

  // jika username dan password sesuai
  // enkripsi password
  // password_hash(password, type_algo)
  $password_baru = password_hash($password1, PASSWORD_DEFAULT);

  // insert tabel users
  $query = "INSERT INTO users
              VALUES
            (NULL, '$username', '$password_baru')";

  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}
