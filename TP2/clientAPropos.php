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
                <div class="main col-8" style="padding: 20px 50px 20px 50px">
                    <h1 class="h1 text-center">A propos</h1>
                    <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.
                        Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme
                        assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait
                        que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en
                        soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des
                        passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte,
                        comme Aldus PageMaker.</p><p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.
                        Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme
                        assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait
                        que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en
                        soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des
                        passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte,
                        comme Aldus PageMaker.</p>

                </div>

            </div>
        </div>


    </body>
</html>