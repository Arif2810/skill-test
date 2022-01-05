<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location: login.php");
  exit;
}

require 'functions.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Admin</title>

  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/script.js"></script>
</head>
<body>

<a href="logout.php" class="logout">Logout</a>
  
<h1>Halaman Admin</h1>

</body>
</html>