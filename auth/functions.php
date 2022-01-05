<?php
// Koneksi ke Database
$connect = mysqli_connect("localhost", "root", "", "auth");

function query($query){
  global $connect;
  $result = mysqli_query($connect, $query);
  $rows = [];
  while($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
  }
  return $rows;
}

function registrasi($data){
  global $connect;

  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($connect, $data["password"]);
  $password2 = mysqli_real_escape_string($connect, $data["password2"]);

  // Cek username sudah ada atau belum
  $result = mysqli_query($connect, "SELECT username FROM user WHERE username = '$username'");

  if(mysqli_fetch_assoc($result)){
    echo "<script>
            alert('Username sudah terdaftar!');
          </script>";
    return false;
  }

  // Cek konfirmasi password
  if($password !== $password2){
    echo "<script>
            alert('Konformasi password tidak sesuai!');
          </script>";
    return false;
  }

  // Enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // Tambahkan user baru ke database
  mysqli_query($connect, "INSERT INTO user VALUES('', '$username', '$password')");

  return mysqli_affected_rows($connect);

}
