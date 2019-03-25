<?php
session_start();

if(isset($_SESSION["id_user"])){
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
}else
{
    header("Location:index.php");
}

include "templateAdmin.html";
?>

<div class="main col-8" style="padding: 20px 40px 20px 50px; margin-left: 33%">
    <h1 class="h1 text-center">Page d'accueil</h1>
    <p class="h3" style="padding-top: 80px">Bienvenu dans votre espace monsieur <b><?= $prenom . " " .$nom ;?></b></p>



</div>

</div>
</div>


</body>
</html>
