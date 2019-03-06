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
        $requete = $db->prepare("INSERT INTO electricity.facture(consommation, date_enreg, id_client) values (:consom, CURRENT_DATE(), :id_client)");

        if ($requete->execute(array("consom" => $_POST['consommation'], "id_client" => $id_client)))
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
                <div class="main col-8" style="padding: 20px 40px 20px 50px; margin-left: 33%">
                    <h1 class="h1 text-center">Saisit d'une consommation mensuelle</h1>
                    <br><br>
                    <p class="p-4">Veuillez saisir votre consommation du mois courant</p>
                    <p class="p-2">Notez que cette consommation doit etre supérieur à la valeur du mois précedent, sinon votre facture ne sera pas génerée.</p>


                    <form action="clientSaisirConsommation.php" method="post">
                        <div class="form-group">
                            <label for="consommation">Consommation en KWH</label>
                            <input type="number" class="form-control" id="consommation" required placeholder="Entrer une valeur" name="consommation">
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
