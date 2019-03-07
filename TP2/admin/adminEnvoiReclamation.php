<?php
/**
 * Created by PhpStorm.
 * User: Ali Tahir
 * Date: 07/03/2019
 * Time: 04:02
 */


session_start();

if(isset($_SESSION["id_user"])){
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];

    require_once "../db.php";
/*
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
    }*/

}else
{
    header("Location:index.php");
}

include "templateAdmin.html";
?>
<style>
    .btn-menu3{
        background-color: #721c24;
    }
</style>
<div class="main col-8" style="padding: 20px 40px 20px 50px; margin-left: 33%">
    <h1 class="h1 text-center"><?php if (isset($_GET['id'])) echo "Envoi d'une réponse"; else echo "Nouveau message"; ?></h1>
    <p class="h5">Bienvenu dans votre espace monsieur <b><?= $prenom . " " .$nom ;?></b></p>

    <br>

    <form action="adminEnvoiReclamation.php" method="post">
        <?php
        if (isset($_GET['id']))
        {
            $req = $db->query("SELECT * FROM user WHERE id_user = ".$_GET['id']);
            $client = $req->fetch();
            if ($req->rowCount()) {
                ?>
                <div class="form-group">
                    <label>Destinataire</label>
                    <input type="text" readonly class="form-control-plaintext" value="<?= $client['nom']." ".$client['prenom'] ?>">
                    <input type="hidden" value="<?= $client['id_user'] ?>" name="destinataire">
                </div>
                <?php
            }else
                header("Location:adminVoirReclamations.php");
        }else
        {
            $req = $db->query("SELECT * FROM user WHERE status = 'client'");
            ?>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Destinataire</label>
                <select class="form-control" id="exampleFormControlSelect2" name="destinataire">
                    <?php
                    while($client = $req->fetch()):
                    ?>
                    <option value="<?= $client['id_user'] ?>"><?= $client['nom'] ." ". $client['prenom'] ?></option>
                    <?php
                    endwhile;
                    ?>
                </select>
            </div>
        <?php
        }
        ?>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" class="form-control"></textarea>
        </div>
        <br>
        <div class="row">
            <a href="adminVoirReclamations.php" class="btn btn-secondary col-3">Annuler</a>
            <button type="submit" class="btn btn-primary col-3" style="margin-left: 75%; margin-top: -39px" name="envoyer">Envoyer</button>
        </div>
    </form>


</div>

</div>
</div>


</body>
</html>
