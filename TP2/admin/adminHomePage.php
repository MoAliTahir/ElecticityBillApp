<?php
session_start();

if(isset($_SESSION["id_user"])){
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
}else
{
    header("Location:index.php");
}

include "templateAdmin.html";
?>

<div class="main col-8" style="padding: 20px 40px 20px 50px; margin-left: 33%">
    <h1 class="h1 text-center">Page d'acceuil</h1>
    <p class="h5">Bienvenu dans votre espace monsieur <b><?= $prenom . " " .$nom ;?></b></p>
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
        comme Aldus PageMaker.</p> <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.
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
