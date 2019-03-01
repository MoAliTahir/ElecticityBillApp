<?php
$erreurConnexion = "";
    if(isset($_POST["connexion"]))
    {
        require_once "db.php";
        $requete = $db->prepare("SELECT * FROM user WHERE login=? and password=?");
        $requete->execute(array($_POST['login'], $_POST['password']));
        $user = $requete->fetch();

		$i = $requete->rowCount();
		if ($i > 0) {
            session_start();

            $_SESSION["id_user"]=$user["id_user"];
            $_SESSION['nom']=$user['nom'];
            $_SESSION['prenom']=$user['prenom'];

            if($user["status"] == "client")
            {
                header("location:clientHomePage.php");
            }elseif($user["status"] == "admin")
            {
                header("location:admin/adminHomePage.php");
            }
		}
		else
		{
			$erreurConnexion = "<p style='font-size:20px; color:red; font-weight:500;text-align:center;'>Identifiant et/ou mot de passe incorrect(s)!</p>";
		}
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Connexion · Amendis</title>

    <!-- Bootstrap core CSS -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center" >
    <form class="form-signin" method="POST" action="<?= $_SERVER['PHP_SELF']?>" style="border: 1px solid #491217;">
        <h1 class="h3 mb-3 font-weight-normal">Se connecter</h1>
        <label for="login" class="sr-only">Email address</label>
        <input type="text" name="login" id="login" class="form-control" placeholder="Identifient" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Mot de Passe" required>

        <?= $erreurConnexion?>
        <div class="checkbox mb-3">
            <label>
            <input type="checkbox" value="remember-me"> Se souvenir de moi
            </label>
        </div>
        <button class="btn btn-lg btn-secondary btn-block" type="submit" name="connexion">Connexion</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
    </form>
  </body>
</html>
