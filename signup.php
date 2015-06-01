<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <?php 
$title='Log in - ' ;
include 'header.php'
; ?>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="post" action="signup.php">
        <h2 class="form-signin-heading">Log in to your account</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" name="Motdepasse" placeholder="Password" required>
        <div class="checkbox">
           
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
      </form>

    </div> <!-- /container -->

<?php 
//*************************************************code connexion cookies
 
 loginVerif($_POST['email'],$_POST['Motdepasse']);

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






    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
