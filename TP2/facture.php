<?php
session_start();
if(isset($_SESSION["id_user"])){
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];

    require_once "db.php";
    $sql = "SELECT id_facture, num_facture, consommation, prixHT, facture.date_enreg, mois FROM facture, consommation WHERE facture.id_consom = consommation.id_consom AND id_client = ? AND id_facture = ?";
    $requete = $db->prepare($sql);
    $requete->execute(array($_SESSION['id_user'],$_GET['id']));
    $facture = $requete->fetch();

    $requete2 = $db->prepare("SELECT * FROM user WHERE id_user = ?");
    $requete2->execute(array($_SESSION['id_user']));
    $user = $requete2->fetch();
}else
{
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Facture</title>
    <link rel="stylesheet" href="css/facture.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>
<!-- onload="imprimer()" -->
<body>
<div class="container">
    <script>
        function imprimer() {
            window.print();

        }
    </script>
    <div class="invoice">
        <div class="row">
            <div class="col-7">
                <img src="ressources/amendis.jpg" class="logo">
            </div>
            <div class="col-5">
                <h1 class="document-type display-4">FACTURE</h1>
                <p class="text-right"><strong>N°90T-17-01-0123</strong></p>
            </div>
        </div>
        <div class="row">
            <div class="col-7">
                <p>
                    <strong>Amendis</strong><br>
                    6B Rue Aux-Saussaies-Des-Dames<br>
                    57950 MONTIGNY-LES-METZ
                </p>
            </div>
            <div class="col-5">
                <br><br><br>
                <p>
                    <strong>Electricite</strong><br>
                    Réf. Client <strong><em><?= $facture['num_facture'] ?></em></strong><br>
                    12 Rue de Verdun<br>
                    54250 JARNY
                </p>
            </div>
        </div>
        <br>
        <br>
        <br>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Nom & Prenom</th>
                <th>Quantité</th>
                <th>Unité</th>
                <th>PU HT</th>
                <th>TVA</th>
                <th>Total HT</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?= $user['nom'] . " ". $user['prenom'] ?></td>
                <td>1</td>
                <td>Jour</td>
                <td class="text-right">500,00€</td>
                <td>20%</td>
                <td class="text-right">500,00€</td>
            </tr>
            <tr>
                <td>Génération des rapports d'activité</td>
                <td>4</td>
                <td>Rapport</td>
                <td class="text-right">800,00€</td>
                <td>20%</td>
                <td class="text-right">3 200,00€</td>
            </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-8">
            </div>
            <div class="col-4">
                <table class="table table-sm text-right">
                    <tr>
                        <td><strong>Total HT</strong></td>
                        <td class="text-right">3 700,00€</td>
                    </tr>
                    <tr>
                        <td>TVA 20%</td>
                        <td class="text-right">740,00€</td>
                    </tr>
                    <tr>
                        <td><strong>Total TTC</strong></td>
                        <td class="text-right">4 440,00€</td>
                    </tr>
                </table>
            </div>
        </div>

        <p class="conditions">
            En votre aimable règlement
            <br>
            Et avec nos remerciements.
            <br><br>
            Conditions de paiement : paiement à réception de facture, à 15 jours.
            <br>
            Aucun escompte consenti pour règlement anticipé.
            <br>
            Règlement par virement bancaire.
            <br><br>
            En cas de retard de paiement, indemnité forfaitaire pour frais de recouvrement : 40 euros (art. L.4413 et L.4416 code du commerce).
        </p>

        <br>
        <br>
        <br>
        <br>

        <p class="bottom-page text-right">
            90TECH SAS - N° SIRET 80897753200015 RCS METZ<br>
            6B, Rue aux Saussaies des Dames - 57950 MONTIGNY-LES-METZ 03 55 80 42 62 - www.90tech.fr<br>
            Code APE 6201Z - N° TVA Intracom. FR 77 808977532<br>
            IBAN FR76 1470 7034 0031 4211 7882 825 - SWIFT CCBPFRPPMTZ
        </p>
    </div>
</div>
</body>
</html>