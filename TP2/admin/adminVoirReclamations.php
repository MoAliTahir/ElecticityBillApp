<?php
/**
 * Created by PhpStorm.
 * User: Ali Tahir
 * Date: 07/03/2019
 * Time: 03:45
 */
session_start();

if(isset($_SESSION["id_user"])){
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];

    require_once "../db.php";
    $sql = "SELECT contenue, date_envoi, reclamation.id_user, nom, prenom FROM reclamation, user WHERE id_to=".$_SESSION['id_user']." AND reclamation.id_user = user.id_user";

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
    <h1 class="h1 text-center">Reclamations</h1>
    <p class="h5">Bienvenu dans votre espace monsieur <b><?= $prenom . " " .$nom ;?></b></p>
    <br>
    <p class="h3" style="margin-bottom: -25px">Liste des réclamations</p>
    <form class="form-inline" action="adminEnvoiReclamation.php" style="margin-left: 87.5%; margin-bottom: 2px">
        <button class="btn btn-success my-2 my-sm-0" type="submit">+Nouveau</button>
    </form>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Date d'envoi</th>
            <th scope="col">Message</th>
            <th scope="col" class="text-center">Action</th>
        </tr>
        </thead>
        <tbody style="padding: 20px 50px 20px 50px">
        <?php
        foreach ($db->query($sql) as $reclamations) : ?>
        <tr>
            <td><?= $reclamations['nom'] ?></td>
            <td><?= $reclamations['prenom'] ?></td>
            <td><?= $reclamations['date_envoi'] ?></td>
            <td><?= $reclamations['contenue'] ?></td>
            <td class="text-center">
                <a href="adminEnvoiReclamation.php?id=<?= $reclamations['id_user'] ?>"><button class="btn btn-primary my-2 my-sm-0">Répondre</button></a>
            </td>
        </tr>
        <?php
        endforeach;
        ?>
        </tbody>
    </table>



</div>

</div>
</div>


</body>
</html>
