<?php
/**
 * Created by PhpStorm.
 * User: Ali Tahir
 * Date: 27/02/2019
 * Time: 16:51
 */
session_start();
if(isset($_SESSION["id_user"])){
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
    require_once "db.php";
    $sql = "SELECT contenue, date_envoi, reclamation.id_user, nom, prenom FROM reclamation, user WHERE id_to=".$_SESSION['id_user']." AND reclamation.id_user = user.id_user";

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

include "template.html";

?>
<style>
    .btn-menu3{
        background-color: #721c24;
    }
</style>
                <div class="main col-8" style="padding: 20px 40px 20px 50px; margin-left: 33%">
                    <h1 class="h1 text-center">Reclamations</h1>
                    <h3 class="h3">Messages réçus</h3>
                    <div style="height: 300px; overflow-y: scroll; padding: 20px">
                        <!--<div class="text-primary card border-primary" style="max-width: 600px">
                            <p class="card-header"><b>Titre</b></p>
                            <p class="card-body">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                        </div>-->
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Date réception</th>
                                <th scope="col">Message</th>
                            </tr>
                            </thead>
                            <tbody style="padding: 20px 50px 20px 50px">
                            <?php
                            foreach ($db->query($sql) as $reclamations) : ?>
                                <tr>
                                    <td><?= $reclamations['date_envoi'] ?></td>
                                    <td><?= $reclamations['contenue'] ?></td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                            </tbody>
                        </table>

                    </div>
                    <br>

                    <h3 class="h3">Envoyer une réclamation</h3>

                    <form class="form-inline form-row" action="clientReclamation.php" method="post">
                        <div class="col-10">
                            <textarea name="reclamation" class="form-control" style="width: 100%"></textarea>
                        </div>
                        <div class="col">
                            <button type="submit" name="envoyer" class="btn btn-primary">Envoyer</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>


    </body>
</html>