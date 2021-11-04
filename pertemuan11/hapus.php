<?php

require 'function.php';

// ambill id dari url 
$id = $_GET['id'];

if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

if (hapus($id) > 0) {
  echo "<script>
        alert('Data berhasil di hapus');
        document.location.href = 'index.php';
  </script>";
} else {
  echo "<script>
        alert('Data gagal di hapus');
        document.location.href = 'index.php';
  </script>";
}
