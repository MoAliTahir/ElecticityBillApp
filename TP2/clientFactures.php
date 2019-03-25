<?php
/**
 * Created by PhpStorm.
 * User: Ali Tahir
 * Date: 27/02/2019
 * Time: 16:46
 */
session_start();
if(isset($_SESSION["id_user"])){
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];

    require_once "db.php";
    $sql = "SELECT num_facture, consommation, prixHT, facture.date_enreg, mois FROM facture, consommation WHERE facture.id_consom = consommation.id_consom AND id_client = ".$_SESSION['id_user'];
}else
{
    header("Location:index.php");
}

include "template.html";

?>
<style>
    .btn-menu2{
        background-color: #721c24;
    }
</style>
                <div class="main col-8" style="padding: 20px 40px 20px 50px; margin-left: 33%">
                    <h1 class="h1 text-center">Liste de vos factures</h1>
                    <br>
                    <p class="h3" style="margin-bottom: -25px">Liste des factures approuvées</p>
                    <br><br>

                    <table class="table">
                        <thead class="thead-dark">
                        <tr class="text-center">
                            <th scope="col">Compte</th>
                            <th scope="col">Consommation</th>
                            <th scope="col">Mois</th>
                            <th scope="col">PrixHT</th>
                            <th scope="col">PrixTTC</th>
                            <th scope="col">Date Validation</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody style="padding: 20px 50px 20px 50px">
                        <?php
                        foreach ($db->query($sql) as $facture) : ?>
                            <tr class="text-center">
                                <td><?= $facture['num_facture'] ?></td>
                                <td><?= $facture['consommation'] ?></td>
                                <td><?= $facture['mois'] ?></td>
                                <td><?= $facture['prixHT'] ?></td>
                                <td><?= $facture['prixHT']*1.14 ?></td>
                                <td><?= $facture['date_enreg'] ?></td>
                                <td><a href="facture.php"><button class="btn btn-success my-2 my-sm-0">Télécharger</button></a></td>
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