<?php
/**
 * Created by PhpStorm.
 * User: Ali Tahir
 * Date: 28/02/2019
 * Time: 08:31
 */

session_start();

if(isset($_SESSION["id_user"])){
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];

    require_once "../db.php";

    //Modification du client
    if (isset($_POST['modifier'])) {

        $id_client = $_POST['id_client'];
        $identifiant = $_POST['identifiant'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $motDePasse = $_POST['motDePasse'];

        $sql = "UPDATE `user` SET login =:login, password =:password, nom = :nom, prenom = :prenom, status = 'client'  WHERE id_user =" . $id_client;
        $update = $db->prepare($sql);


        $data = [
            'login' => $identifiant,
            'password' => $motDePasse,
            'nom' => $nom,
            'prenom' => $prenom
        ];

        $update->execute($data);
        header("Location:adminGestionClient.php");
    }

    //Ajout d'un nouveau client
    if (isset($_POST['inscription']))
    {

    }

    //Modification d'un client
    if (isset($_GET['id']))
    {
        $id_client = $_GET['id'];
        $requete = $db->prepare("SELECT * FROM user WHERE id_user = ?");
        $requete->execute(array($id_client));
        $client = $requete->fetch();
        $i = $requete->rowCount();
    }
    //Suppression du client selectionné
    if (isset($_GET['supprimer'])) {
        $id_client = $_GET['supprimer'] ;

        $delete=$db->prepare('DELETE FROM `user` WHERE id_user= :id');
        $delete->execute(array('id'=>$id_client));

        header("Location:adminGestionClient.php");
    }

}else
{
    header("Location:index.php");
}

include "templateAdmin.html";
?>
<style>
    .btn-menu1{
        background-color: #721c24;
    }
</style>
<div class="main col-8" style="padding: 20px 40px 20px 50px; margin-left: 33%">
    <h1 class="h1 text-center"><?php if (isset($_GET['id'])) echo "Modification d'un client"; else echo "Inscription d'un nouveau client"; ?></h1>
    <p class="h5">Bienvenu dans votre espace monsieur <b><?= $prenom . " " .$nom ;?></b></p>

    <br>

    <form action="inscriptionClient.php" method="post">
        <input type="hidden" name="id_client" value="<?php if (isset($i)) echo $client['id_user']; ?>">
        <div class="form-group">
            <label for="identifiant">Identifiant</label>
            <input type="text" class="form-control" id="identifiant" aria-describedby="identifiantHelp" placeholder="CLxxxx" name="identifiant" value=<?php if(isset($i)) echo "\"".$client['login']."\" readonly" ; ?>>
            <small id="identifiantHelp" class="form-text text-muted">Cet identifiant doit etre unique et réprésente le numéro du compteur</small>
        </div>
        <div class="form-group">
            <label for="motDePasse">Mot de Passe</label>
            <input type="password" class="form-control" id="motDePasse" name="motDePasse" placeholder="Mot de Passe" value="<?php if(isset($i)) echo $client['password']; ?>">
        </div>
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" placeholder="Nom" name="nom" value="<?php if(isset($i)) echo $client['nom']; ?>">
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" id="prenom" placeholder="Prénom" name="prenom" value="<?php if(isset($i)) echo $client['prenom']; ?>">
        </div>
        <br>
        <div class="row">
            <button type="reset" class="btn btn-secondary col-3">Annuler</button>
            <?php
            if (isset($_GET['id'])) :
                ?>
            <button type="submit" class="btn btn-primary col-3" style="margin-left: 75%; margin-top: -39px" name="modifier">Modifier</button>
            <?php
            else:
            ?>
            <button type="submit" class="btn btn-primary col-3" style="margin-left: 75%; margin-top: -39px" name="inscription">Inscription</button>
            <?php
            endif;
            ?>
        </div>
    </form>


</div>

</div>
</div>


</body>
</html>
