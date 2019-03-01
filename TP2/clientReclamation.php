<?php
/**
 * Created by PhpStorm.
 * User: Ali Tahir
 * Date: 27/02/2019
 * Time: 16:51
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
    .btn-menu3{
        background-color: #721c24;
    }
</style>
                <div class="main col-8" style="padding: 20px 50px 20px 50px">
                    <h1 class="h1 text-center">Reclamations</h1>
                    <h3 class="h3">Messages réçus</h3>
                    <div style="border: 1px solid red; height: 300px; overflow-y: scroll; padding: 20px">
                        Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.
                            Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme
                            assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait
                            que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en
                            soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des
                            passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte,
                            comme Aldus PageMaker.Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.
                            Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme
                            assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait
                            que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en
                            soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des
                            passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte,
                            comme Aldus PageMaker.

                    </div>
                    <br>

                    <h3 class="h3">Envoyer une réclamation</h3>

                    <form class="form-inline form-row">
                        <div class="col-10">
                            <textarea name="reclamation" class="form-control" style="width: 100%"></textarea>
                        </div>
                        <div class="col">
                            <button type="submit" name="envoyer" class="btn btn-primary">Envoyer</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>


    </body>
</html>