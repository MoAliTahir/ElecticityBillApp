<?php
/**
 * Created by PhpStorm.
 * User: Ali Tahir
 * Date: 27/02/2019
 * Time: 16:38
 */
session_start();
if(isset($_SESSION["id_user"])){
    $succes_message = "";
    $id_client = $_SESSION['id_user'];
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
    if (isset($_POST["envoyer"]))
    {
        require_once "db.php";
        $requete = $db->prepare("INSERT INTO electricity.consommation(compteur, annee, mois, id_client) values (:compt, :annee, :mois, :id_client)");

        if ($requete->execute(array("compt" => $_POST['compteur'],"annee"=>$_POST['annee'], "mois" => $_POST['mois'], "id_client" => $id_client)))
        {
            $succes_message = "Votre enregistrement a été effectué avec succès!";
        }

    }
}else
{
    header("Location:index.php");
}

include "template.html";

?>
                <style>
                    .btn-menu1{
                        background-color: #721c24;
                    }
                </style>
                <div class="main col-8" style="padding: 20px 40px 0px 50px; margin-left: 33%">
                    <h1 class="h1 text-center">Saisit d'une consommation mensuelle</h1>
                    <p>Veuillez saisir la valeur au niveau de votre compteur</p>
                    <p>Notez que cette valeur doit etre supérieur à la valeur prélévée au mois précedent, sinon votre facture ne sera pas validée.</p>

                    <form action="clientSaisirConsommation.php" method="post">
                        <div class="form-group">
                            <label for="compteur">Valeur au niveau du compteur</label>
                            <input type="number" class="form-control" id="compteur" required placeholder="Entrer une valeur" name="compteur">
                        </div>
                        <div class="form-group">
                            <label for="mois">Mois consommé</label>
                            <select class="form-control" id="mois" name="mois">
                                <option value="1">Janvier</option>
                                <option value="2">Fevrier</option>
                                <option value="3">Mars</option>
                                <option value="4">Avril</option>
                                <option value="5">Mai</option>
                                <option value="6">Juin</option>
                                <option value="7">Juillet</option>
                                <option value="8">Aout</option>
                                <option value="9">Septembre</option>
                                <option value="10">Octobre</option>
                                <option value="11">Novembre</option>
                                <option value="12">Decembre</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="annee">Année</label>
                            <input type="number" class="form-control" id="annee" required placeholder="2018" name="annee">
                        </div>
                        <button type="submit" class="btn btn-primary" name="envoyer">Envoyer</button>
                    </form>

                    <br>
                    <p class="p-2" style="color: #1c7430"><?= $succes_message ?></p>


                </div>

            </div>
        </div>


    </body>
</html>
