<?php
/**
 * Created by PhpStorm.
 * User: Ali Tahir
 * Date: 27/02/2019
 * Time: 16:54
 */
session_start();
if(isset($_SESSION["id_user"])){
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
}else
{
    header("Location:index.php");
}

include "template.html";

?>
<style>
    .btn-menu4{
        background-color: #721c24;
    }
</style>
                <div class="main col-8" style="padding: 20px 40px 20px 50px; margin-left: 33%">
                    <h1 class="h1 text-center">A propos</h1>
                    <br><br>
                    <p>Amendis est une societe de gestion d'eau et d'electricite dans la ville de Tétouan </p>

                </div>

            </div>
        </div>


    </body>
</html>