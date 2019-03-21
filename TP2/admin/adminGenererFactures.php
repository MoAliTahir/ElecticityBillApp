<?php
session_start();

if(isset($_SESSION["id_user"])){
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];

    require_once "../db.php";
    $sql = "SELECT id_consom, compteur, annee, mois, nom, prenom FROM consommation, user WHERE id_user = id_client and valide = 0 and mois != 0";
    $requete = $db->query($sql);


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
    <p class="h5">Bienvenu dans votre espace monsieur <b><?= $prenom . " " .$nom;?></b></p>
    <br>
    <p class="h3">Liste des consommations</p>
    <table class="table" style="cellspacing: 0px">
        <thead class="thead-dark">
        <tr class="text-center">
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Compteur</th>
            <th scope="col">Precedent</th>
            <th scope="col">Mois</th>
            <th scope="col">Annee</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while($consommations= $requete->fetch()) {
            $moisPrec = $consommations['mois']-1;
            $requete1 = $db->query("SELECT compteur FROM consommation WHERE mois = ".$moisPrec);
            $compteurPrec = $requete1->fetch();
            if ($requete1->rowCount())
                $valComptPrec = $compteurPrec['compteur'];
            else
                $valComptPrec = 0;
            ?>
            <tr class="text-center">
                <td><?= $consommations['nom'] ?></td>
                <td><?= $consommations['prenom'] ?></td>
                <td><?= $consommations['compteur'] ?></td>
                <td><?= $valComptPrec ?></td>
                <td><?= $consommations['mois'] ?></td>
                <td><?= $consommations['annee'] ?></td>
                <td class="text-center">
                    <a href="adminModifieConsommation.php?id=<?= $consommations['id_consom']?>">
                        <button class="btn btn-primary">Modifier</button>
                    </a>
                    <a href="adminModifieConsommation.php?generer=<?= $consommations['id_consom']?>&value=<?= $consommations['compteur']-$valComptPrec ?>">
                        <button class="btn btn-success">Generer</button>
                    </a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>



</div>

</div>
</div>


</body>
</html>
