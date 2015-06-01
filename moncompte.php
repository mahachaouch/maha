<?php 
$title='Récapitulatif insription- ';
include 'header.php';
?>
<html>
<body>
	<h1>Bienvenue dans notre conservatoire vous etes désormais membre</h1>
	<h2>Récapitulatif</h2>
	<h3>Votre liste de cours :</h3>
   
<?php
   	 $recapit = $bdd->recap($_COOKIE['id']) ;
	 $i=0;
while ($i < count($recapit)) { ?>
                        <table>
                                <tr>
                                <td><?php echo $recapit[$i]['nom_cours'];?></td>
                                <td><?php echo $recapit[$i]['tarifMensuel'];?> </td>
                                </tr>
                        </table>        
                <?php
                $i++; 
  }
  ?>
	</body>
	</html>