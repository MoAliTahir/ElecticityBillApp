<?php
/**
 * Created by PhpStorm.
 * User: Ali Tahir
 * Date: 06/03/2019
 * Time: 00:52
 */
session_start();
if(isset($_SESSION["id_user"]))
{
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];

    require_once "../db.php";

    //Modification de consommation
    if (isset($_POST['enregistrer']))
    {
        $id_consom = $_POST['id_consom'];
        $id_client = $_POST['id_client'];
        $date_enreg = $_POST['date'];
        $compteur = $_POST['compteur'];
        $mois = $_POST['mois'];

        $sql = "UPDATE `consommation` SET compteur =:compteur, mois =:mois WHERE id_consom =" . $id_consom;
        $update = $db->prepare($sql);


        $data = [
            'compteur' => $compteur,
            'mois' => $mois
        ];

        $update->execute($data);
        header("Location:adminGenererFactures.php");

    }

    //Génération de la facture
    if (isset($_GET['generer']))
    {
        $id_consom = $_GET['generer'];
    }

    //Recupération de la consommation choisie
    if (isset($_GET['id']))
    {
        $id_consom = $_GET['id'];
        $requete = $db->prepare("SELECT * FROM consommation WHERE id_consom = ?");
        $requete->execute(array($id_consom));
        $consommation = $requete->fetch();
        $i = $requete->rowCount();
    }
}else
{
    header("Location:index.php");
}

include "templateAdmin.html";
?>
<style>
    .btn-menu2{
        background-color: #721c24;
    }
</style>
<div class="main col-8" style="padding: 20px 40px 20px 50px; margin-left: 33%">
    <h1 class="h1 text-center">Modification de la consommation</h1>
    <p class="h5">Bienvenu dans votre espace monsieur <b><?= $prenom . " " .$nom ;?></b></p>

    <br>

    <form action="adminModifieConsommation.php" method="post">
        <input type="hidden" name="id_consom" value="<?php if (isset($i)) echo $consommation['id_consom']; ?>">
        <div class="form-group">
            <label for="identifiant">Id Client</label>
            <input type="text" class="form-control" id="identifiant" aria-describedby="identifiantHelp" name="id_client" value=<?php if(isset($i)) echo "\"".$consommation['id_client']."\" readonly" ; ?>>
            <small id="identifiantHelp" class="form-text text-muted">Cet identifiant est unique pour chaque client</small>
        </div>
        <div class="form-group">
            <label for="date">Date enregistrement</label>
            <input type="date" class="form-control" readonly id="date" name="date" value="<?php if(isset($i)) echo $consommation['date_enreg']; ?>">
        </div>
        <div class="form-group">
            <label for="compteur">Compteur</label>
            <input type="text" class="form-control" id="compteur" name="compteur" value="<?php if(isset($i)) echo $consommation['compteur']; ?>">
        </div>
        <div class="form-group">
            <label for="mois">Mois de consommation</label>
            <input type="number" class="form-control" id="mois" name="mois" value="<?php if(isset($i)) echo $consommation['mois']; ?>">
        </div>
        <br>
        <div class="row">
            <button type="reset" class="btn btn-secondary col-3">Annuler</button>
            <button type="submit" class="btn btn-primary col-3" style="margin-left: 75%; margin-top: -39px" name="enregistrer">Enregistrer</button>
        </div>
    </form>


</div>

</div>
</div>


</body>
</html>