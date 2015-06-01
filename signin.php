<?php 
$title='Sign up - ' ;
include 'header.php';
$coursS = $bdd->getCours();
$instruments = $bdd->getInstruments();
 ?>

  <h2>Sign up form</h2>
  <form action="signin.php" method="post" role="form">

  	<div class="form-group">
      <label for="nom">Nom:</label>
      <input type="nom" class="form-control" name="nom" placeholder="Donnez votre nom">
    </div>

    <div class="form-group">
      <label for="prenom">Prenom:</label>
      <input type="prenom" class="form-control" name="prenom" placeholder="Donnez votre prenom">
    </div>


    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name="email" placeholder="email">
    </div>
    <div class="form-group">
      <label for="tel">Num tel:</label>
      <input type="tel" class="form-control" name="tel" placeholder="Doonnez votre num de tel">
    </div>

<!-- choix du cours -->
<div class="container">
  <h2>Liste des cours</h2>
  <p>Choisissez le(s) cours au quel(s) vous voulez suivre:</p>
  	<?php while($cours = $coursS->fetch()) {
  			echo '<div class="checkbox">';
      			echo '<label for="c1"><input type="checkbox" name="cours[]" value="'.$cours['id_cours'].'" >'.$cours['nom_cours'].'</label>';
    		echo'</div>';
  	}
  	?>
 
 <!-- récupérer les tarifs des cours et instrument(s) -->

<?php while($cours = $coursS->fetch()) {
  			echo '<div class="checkbox">';
      			echo '<label for="c1"><input type="checkbox" name="cours[]" value="'.$cours['id_cours'].'" >'.$cours['nom_cours'].'</label>';

    		echo'</div>';
  	}
  	?>    



    <!-- choix de l'instrument -->
    <div class="container">
  <h2>Liste des instruments</h2>
  <p>Choisissez votre instrument:</p>

<?php 
while($instrument = $instruments->fetch()) {
  			echo '<div class="checkbox">';
      			echo '<label for="c1"><input type="checkbox" name="instrument[]" value="'.$instrument['ref_instrument'].'" >'.$instrument['nom_instrument'].'</label>';
    		echo'</div>';
    		}
  	?>

    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="pwd" placeholder="votre mot de passe">
     <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </form>
</div>

    
<?php
if(isset($_POST['nom']) && (isset($_POST['prenom'])) && (isset($_POST['email'])) && (isset($_POST['tel'])) && (isset($_POST['pwd'])) && ((isset($_POST['cours']))|| isset($_POST['instrument'])) )
{
	$erreurs = Array();
	$nom = $_POST['nom'];
	$nom = strip_tags($nom);  /*strip_tag pour enlever les balises : mesure de securité */

	if(strlen($nom) < 2) {
		$erreurs[] = "Veuillez entrer un nom de deux caracteres au minimum ";
		echo 'votre nom doit contenir au moins deux lettres';
	}
	$prenom = $_POST['prenom'];
	$prenom = strip_tags($prenom);

	if(strlen($prenom) < 3) {
		$erreurs[] = "Veuillez entrer un prenom de trois caracteres au minimum ";
	}
	
	$email = $_POST['email'];
	$email = strip_tags($email);
	
	$num=$bdd->verifmail($email);
	if ($num >= 1) {

          $erreurs[] = "Cette adresse mail existe déja";
    	}


	
	$tel = $_POST['tel'];
	$tel = strip_tags($tel);
	
	if(strlen($tel) != 10) {
		$erreurs[] = "Veuillez entrer un num valide";
	}

	$pwd = $_POST['pwd'];
	$pwd = strip_tags($pwd);
	 
	$pwd = sha1($pwd);
     if (isset($_POST['cours'])) {
	$cours = $_POST['cours'];
}
  


	if(empty($erreurs)) {

		$id=$bdd->addAdherent($nom, $prenom, $email, $tel, $pwd);             /*toutes les infos sont valides , on peut donc l ajouter a notre base 
		                                                                                  on recupere son id suite a l ajout*/ 
		    ?>
		 <p>Appuyez ici pour voir le récapitulatif de votre inscription: <a href="moncompte.php">Recap</a></p>                                                                                   
      <?php
    setcookie("id","$id"+1, time() + (3600*24*365),"/" );
	 
	
if (!empty($_POST['cours']))  {             /*si il coche une case cours*/
	$i=0;
	while($i < count($_POST['cours'])) {
		$bdd->remplissage1($id,$_POST['cours'][$i]);
		$i++;
	}
}

if (!empty($_POST['instrument'])) {          /*si il coche une case instrument*/


	$j=0;
	while($j < count($_POST['instrument'])) {
	$bdd->remplissage2($id,$_POST['instrument'][$j]);
	$j++;
	}
       }
          

	$tarif1=$bdd->calculTarifcours($id);
	$tarif2=$bdd->calculTarifInstru($id);
	$total= $tarif1 + $tarif2 ;
	$bdd->updateTarifAdherent($id,$total);	


    }   
	else {
		echo '<ul>';
		foreach($erreurs as $err) {  
			echo '<li>'.$err.'</li>';

		}
		echo '</ul>';
		
	}
	
	
}	 

    
?>


<!-- pour retourner au top de la page -->
 <p class="pull-right"><a href="#">Back to top</a></p>
      

</p> 
</body>
</html>
