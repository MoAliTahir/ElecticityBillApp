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

        $lignes = fgets($file);
        while(!empty($lignes))
        {
            $ligne = trim($lignes);
            list($identifiant, $consommation) = explode(",", $ligne);

            echo $identifiant . " " . $consommation."\n";
            $data[] = [$identifiant => $consommation];

            $lignes = fgets($file);
        }

        fclose($file);

        print_r($data);
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

                </div>

            </div>
        </div>


    </body>
</html>