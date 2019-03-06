<?php
session_start();

if(isset($_SESSION["id_user"])){
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];

    require_once "../db.php";
    $sql = "SELECT id_consom, compteur, date_enreg, mois, nom, prenom FROM consommation, user WHERE id_user = id_client and valide = 0";

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
    <h1 class="h1 text-center">Generation des Factures</h1>
    <p class="h5">Bienvenu dans votre espace monsieur <b><?= $prenom . " " .$nom ;?></b></p>
    <br>
    <p class="h3">Liste des consommations</p>
    <table class="table">
        <thead class="thead-dark">
        <tr class="text-center">
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Compteur</th>
            <th scope="col">Date d'enregistrement</th>
            <th scope="col">Mois</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($db->query($sql) as $consommations) : ?>
            <tr class="text-center">
                <td><?= $consommations['nom'] ?></td>
                <td><?= $consommations['prenom'] ?></td>
                <td><?= $consommations['compteur'] ?></td>
                <td><?= $consommations['date_enreg'] ?></td>
                <td><?= $consommations['mois'] ?></td>
                <td class="text-center">
                    <a href="adminModifieConsommation.php?id=<?= $consommations['id_consom'] ?>"><button class="btn btn-primary">Modifier</button></a>
                    <a href="adminModifieConsommation.php?generer=<?= $consommations['id_consom'] ?>"><button class="btn btn-success">Generer</button></a>
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
