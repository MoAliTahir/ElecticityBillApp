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

    $succesMessage = "";
    if (isset($_POST['envoyer']))
    {
        $requete = $db->prepare("INSERT INTO reclamation (contenue, date_envoi, id_user, id_to) VALUES (:content, CURRENT_DATE , :from, :to)");
        if ($requete->execute(["content" => $_POST['message'], "from" => $_SESSION['id_user'], "to" => $_POST['destinataire']]))
            $succesMessage = "<p style='color: green'>Message envoyé avec succès</p>";
        else
            $succesMessage = "<p style='color: red'>Message non envoyé, une erreur s'est produite, veuillez ressayer</p>";
    }

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
    <br><?= $succesMessage ?><br>

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
            <textarea name="message" id="message" class="form-control" required></textarea>
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
