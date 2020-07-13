<?php
$nav_en_cours = 'seco'; 
$titre = "Connexion";
include('inc/header.php');
?>
<link rel="stylesheet" href="css/connexion.css">

<div class="wrapper fadeInDown">
    <h1 class="fadeIn fourth">Connectez-vous</h1>
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <i class="far fa-user"></i>
        </div>

        <!-- Login Form -->
        <form id="formLogin" method="POST" action="rqtconnexion.php">
            <?php
            // La requête renvoit pbLogin si erreur il y a 
        if (isset($_GET['pbLogin']) && $_GET['pbLogin'] == 'pbLogin') {
                        echo "<p style='color:red'> Login ou mot de passe incorrect </p>";
                    } ?>
            <input type="text" id="login" class="fadeIn second" name="login" placeholder="identifiant">
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="mot de passe">
            <input type="submit" class="fadeIn fourth" value="Se connecter">
            <div id="form-errors"><!-- ERRORS HERE --></div>

        </form>
        <div id="formFooter">
            <a class="underlineHover credit" href="#">Copyright &copy; Département Lettre et Communication - CAF</a>
        </div>

    </div>
</div>


<?php
include('inc/footer.php')

?>