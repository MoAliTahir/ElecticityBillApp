<?php
session_start();

if(isset($_SESSION["id_user"])){
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];

    require_once "../db.php";
    //Suppression du client selectionné
    if (isset($_GET['supprimer'])) {
        $id_client = $_GET['supprimer'] ;

        $delete=$db->query("DELETE FROM user WHERE id_user= ".$id_client);

        if (!$delete)
            header("Location: adminHomePage.php");
    }
    $sql = "SELECT * FROM user WHERE status = 'client'";

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
    <h1 class="h1 text-center">Gestion des Clients</h1>
    <p class="h5">Bienvenu dans votre espace monsieur <b><?= $prenom . " " .$nom ;?></b></p>
    <br>
    <p class="h3" style="margin-bottom: -25px">Liste des clients</p>
    <form class="form-inline" action="inscriptionClient.php" style="margin-left: 87.5%; margin-bottom: 2px">
        <button class="btn btn-success my-2 my-sm-0" type="submit">+Nouveau</button>
    </form>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Identifiant</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Role</th>
            <th scope="col" class="text-center">Action</th>
        </tr>
        </thead>
        <tbody style="padding: 20px 50px 20px 50px">
        <?php
        foreach ($db->query($sql) as $clients) : ?>
        <tr>
            <td><?= $clients['login'] ?></td>
            <td><?= $clients['nom'] ?></td>
            <td><?= $clients['prenom'] ?></td>
            <td><?= $clients['status'] ?></td>
            <td class="text-center">
                <a href="inscriptionClient.php?id=<?= $clients['id_user'] ?>"><button class="btn btn-primary my-2 my-sm-0">Modifier</button></a>
                <a href="adminGestionClient.php?supprimer=<?= $clients['id_user'] ?>"><button class="btn btn-danger my-2 my-sm-0">Supprimer</button></a>
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
