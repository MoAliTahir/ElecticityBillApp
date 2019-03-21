<?php
/**
 * Created by PhpStorm.
 * User: Ali Tahir
 * Date: 07/03/2019
 * Time: 11:39
 */

session_start();
if(isset($_SESSION["id_user"])){
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
    require_once "../db.php";
    $sql = "SELECT * FROM user WHERE status='client'";

    if(isset($_GET['an']))
    {
        $annee = $_GET['an'];
        $file = fopen("../ressources/".$annee.".txt", "r");
        $data = array();
        $somme = array();

        $lignes = fgets($file);
        while(!empty($lignes))
        {
            $ligne = trim($lignes);
            list($identifiant, $consommation) = explode(",", $ligne);

            $sql = "SELECT id_user from user where status = 'client' and login='".$identifiant."'";
            $id_client = $db->query($sql)->fetch();
            if(!empty($id_client))
            {
                $data[$id_client['id_user']]=$consommation;
            }
            
            $lignes = fgets($file);
        }

        fclose($file);

        foreach($data as $key => $val)
        {
            $sql = "INSERT INTO consommation(compteur, valide, annee, mois, id_client) values (:compteur, 0, :annee, 0, :client)";
            $requete = $db->prepare($sql);
            $requete->execute([
                "compteur" => $val,
                "annee" => $annee+1,
                "client" => $key
            ]);

            $sql2 = "SELECT SUM(compteur) as somme FROM consommation WHERE annee = ".$annee." AND mois != 0 AND id_client =".$key;
            $sommeDesConsommations = $db->query($sql2)->fetch();
            
            $somme[$key] = $sommeDesConsommations['somme'];
        }
        $sql3 = "SELECT id_consom, compteur, annee, mois, nom, prenom, id_user FROM consommation, user WHERE id_user = id_client and valide = 0 and mois = 0";
        $requete = $db->query($sql3);
    }
    

}else
{
    header("Location:index.php");
}

include "templateAdmin.html";

?>
<style>
    .btn-menu4{
        background-color: #721c24;
    }
</style>
                <div class="main col-8" style="padding: 20px 40px 20px 50px; margin-left: 33%">
                    <h1 class="h1 text-center">Verification Annuelle</h1>
                    <br>

                    <?php
                    ?>
                    <table class="table" style="cellspacing: 0px">
                        <thead class="thead-dark">
                        <tr class="text-center">
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Somme consom.</th>
                            <th scope="col">Agent</th>
                            <th scope="col">Mois</th>
                            <th scope="col">Annee</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while($consommations= $requete->fetch()) {
                            if (!empty($somme[$consommations['id_user']]))
                                $valSomCompt = $somme[$consommations['id_user']];
                            else
                                $valSomCompt = "-";
                            ?>
                            <tr class="text-center">
                                <td><?= $consommations['nom'] ?></td>
                                <td><?= $consommations['prenom'] ?></td>
                                <td><?= $valSomCompt ?></td>
                                <td><?= $consommations['compteur'] ?></td>
                                <td><?= $consommations['mois'] ?></td>
                                <td><?= $consommations['annee'] ?></td>
                                <td class="text-center">
                                    <a href="">
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