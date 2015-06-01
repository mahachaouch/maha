
  <?php
$dsn = 'mysql:host=localhost;dbname=maha';
$user = 'root';
$password = '';

require_once("modeles/database.php");

$bdd = new Database("localhost", " maha", "root", "");

?>

 <!DOCTYPE html>
<html lang="en">
<head>
  <title> <?php echo  $title; ?> Conservatoire Mozart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles/main.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
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

