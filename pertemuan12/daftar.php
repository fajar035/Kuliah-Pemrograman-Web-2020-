<?php
require "function.php";

if (isset($_POST['daftar'])) {
  if (daftar($_POST) > 0) {
    echo "<script>
            alert('Registrasi Berhasil');
            document.location.href = 'login.php';
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
  <title>Registrasi</title>
</head>

<body>
  <h3>Form Registrasi</h3>
  <form action="" method="POST">

    <ul>
      <li><label>
          Username
          <input type="text" name="username" required autocomplete="off" autofocus>
        </label>
      </li>
      <li>
        <label>
          Password
          <input type="password" name="password1" required>
        </label>
      </li>
      <li>
        <label>
          Password
          <input type="password" name="password2" required>
        </label>
      </li>
      <li>
        <button type="submit" name="daftar">Registrasi</button>
      </li>
    </ul>
  </form>
</body>

</html>