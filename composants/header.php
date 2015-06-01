 <?php include("composants/header.php"); ?>
<?php
// connexion à MySQL
$serveur = "localhost";
$bdd = "maha";
$login = "root";
$mdp = "";
mysql_connect ($serveur,$login,$mdp) or die ('ERREUR de conexion au serveur '.mysql_error());


// sélection de la base de données
mysql_select_db ($bdd) or die ('ERREUR de selection de la base de donnée '.mysql_error());
?>

