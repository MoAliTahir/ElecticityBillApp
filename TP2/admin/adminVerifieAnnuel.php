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

    if (isset($_POST['envoyer']))
    {
        if (isset($_FILES['fichier']))
        {
            $file_name = $_FILES['fichier']['name'];
            $file_tmp = $_FILES['fichier']['tmp_name'];
   
            $destination = "../ressources/";
            $tab = explode(".", $file_name);
            $file_ext = end($tab);
            $annee = $_POST['annee'];
   
            if($file_ext == "txt")
            {
                move_uploaded_file($file_tmp, $destination.$annee.".".$file_ext);
                $file_moved = true;
                
                header("Location:adminVerifieAnnuelList.php?an=".$annee);
            }
        }
/*
        require_once "db.php";
        $requete = $db->prepare("INSERT INTO reclamation(contenue, date_envoi, id_user, id_to) VALUES (:message, CURRENT_DATE, :user, 2)");
        $requete->execute(["message"=>$_POST['reclamation'], "user"=>$_SESSION['id_user']]);*/
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

                    <form action="adminVerifieAnnuel.php" method="post" enctype="multipart/form-data">
                        <div class="custom-file">
                            <input type="file" name="fichier" required class="form-control-file btn-info">
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Année</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="annee">
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary" name="envoyer">Verifier</button>

                    </form>
                </div>


            </div>
        </div>


    </body>
</html>