<?php
//*************************************************code connexion cookies


 
include 'header.php';


function loginVerif($mail,$pwd){
  $mail = trim(addslashes($mail));    //$mail = le mail entré par l'utilisateur (trim: enlève les espaces des extrémités)
                                      //adslashes ajoute des caractères d'echapement si nécessaire
  
  $sql = mysql_query("SELECT id_adherent FROM adherents WHERE mail = '$mail' AND Motdepasse = '$pwd'") or die(mysql_error());

  if (!$sql) {  //si erreur dans la requête
    $message  = 'Requête invalide : ' . mysql_error() . "\n";
} 

  //si la requete a retourné une ligne
  if(mysql_num_rows($sql) > 0)
  {
    $row = mysql_fetch_assoc($sql);
    // utilisateur trouvé, maintenant on va créer les cookies (si il n'existe pas)
    if(!isset($_COOKIE["id"]) && !isset($_COOKIE["token"])) 
    {
      $tokenValue=sha1(uniqid(rand()));   // création d'un nouveau token
      $id=$row["id_adherent"];
      setcookie("id",$id,time()+(3600),"/");  //création des cookie avec les valeurs $id et $tokenvalue
      setcookie("token",$tokenValue,time()+(3600),"/");
      mysql_query("UPDATE adherent SET token = '$tokenValue' WHERE id_adherent = '$id' "); //on MAJ la BD
    }
    return true;

  } 
  else 
  {
    return false;
  } 
}


  // Si le tableau $_POST existe alors le formulaire a été envoyé
  if(isset($_POST))
  {
    echo"hahahhaa";
    // Le login est-il rempli ?
    if(empty($_POST['email']) || empty($_POST['Motdepasse']))
    {
      echo "<script language=\"javascript\"> alert(\"Veuillez remplir les 2 champs.\"); </script>"; 
    }
      // Le pseudo et le mot de passe sont-il correct ?
    elseif(!loginVerif($_POST['email'],$_POST['Motdepasse']))
    {
      echo "toto";
      echo "<script language=\"javascript\"> alert(\"le couple pseudo/mot de passe ne correspond pas\"); </script>";
    }
    else
    {
      // L'identification a réussi
      echo "trtrt";
      //header('location:'.$_SERVER["HTTP_REFERER"]);

    }
  }
  unset($_POST);
?>