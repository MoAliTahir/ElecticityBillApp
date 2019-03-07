<?php
/**
 * Created by PhpStorm.
 * User: Ali Tahir
 * Date: 07/03/2019
 * Time: 11:39
 */

session_start();
if(isset($_SESSION["id_user"])){
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
    require_once "../db.php";
    $sql = "SELECT * FROM user WHERE status='client'";

    if (isset($_POST['envoyer']))
    {
        require_once "db.php";
        $requete = $db->prepare("INSERT INTO reclamation(contenue, date_envoi, id_user, id_to) VALUES (:message, CURRENT_DATE, :user, 2)");
        $requete->execute(["message"=>$_POST['reclamation'], "user"=>$_SESSION['id_user']]);
    }

}else
{
    header("Location:index.php");
}

include "templateAdmin.html";

?>
<style>
    .btn-menu4{
        background-color: #721c24;
    }
</style>
                <div class="main col-8" style="padding: 20px 40px 20px 50px; margin-left: 33%">
                    <h1 class="h1 text-center">Verification Annuelle</h1>

                    <form action="adminVerifieAnnuel.php" method="post">
                        <div class="form-group">
                            <label for="client">Choisir un client</label>
                            <select class="form-control" id="client" name="client">
                                <?php
                                foreach ($db->query($sql) as $client):
                                ?>
                                <option value="<?= $client['id_user'] ?>"><?= $client['prenom']." ".$client['nom'] ?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="consommation">La consommation annuelle</label>
                            <input type="number" class="form-control" id="consommation" aria-describedby="consommationHelp" placeholder="KWH" name="consommation">
                            <small id="consommationHelp" class="form-text text-muted">Veuillez entrer la consommation annuelle.</small>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choisir votre fichier .txt</label>
                        </div>
                        <br><br>
                        <button type="submit" class="btn btn-primary">Verifier</button>

                    </form>

                </div>

            </div>
        </div>


    </body>
</html>