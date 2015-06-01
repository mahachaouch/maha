
  <?php
$dsn = 'mysql:host= 127.9.150.130:3306;dbname=maha';
$user = 'adminWzZH6pH';
$password = 'u_bKWtXEbEAS';

require_once("modeles/database.php");

$bdd = new Database("127.9.150.130", "maha", "adminWzZH6pH", "u_bKWtXEbEAS");

?>

 <!DOCTYPE html>
<html lang="en">
<head>
  <title> <?php echo  $title; ?> Conservatoire Mozart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
  
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Conservatoire Mozart</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="contact.php">contact</a></li>
        <li><a href="signin.php">Sign up</a></li>
      
        <li><a href="#">about</a></li>

      </ul>
    </div>
  </div>
</nav>
  
<div class="container">

