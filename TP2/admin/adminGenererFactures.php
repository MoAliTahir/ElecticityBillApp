<?php
session_start();

if(isset($_SESSION["id_user"])){
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];

    require_once "../db.php";
    $sql = "SELECT id_facture, consommation, valide, date_enreg, date_facture, prix, nom, prenom FROM facture, user WHERE id_user = id_client and valide = 0";

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
    <p>Liste des factures</p>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Consommation</th>
            <th scope="col">Valide?</th>
            <th scope="col">Date d'enregistrement</th>
            <th scope="col">Prix</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($db->query($sql) as $factures) : ?>
            <tr>
                <td><?= $factures['nom'] ?></td>
                <td><?= $factures['prenom'] ?></td>
                <td><?= $factures['consommation'] ?></td>
                <td><?= $factures['valide'] ?></td>
                <td><?= $factures['date_enreg'] ?></td>
                <td><?= $factures['prix'] ?></td>
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
