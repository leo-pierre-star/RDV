<?php
$nav_en_cours = 'form';
$titre = "Vos disponbilités !";
include('inc/header.php');
?>
 </div>

</nav>
<header class="masthead" style="background-image: url('img/bandeaucaf.jpg')" aria-label="Bandeau du CAF">
</header>
<div class="container formulaire">
    <div class="note">
        <p>Saisissez vos disponibilités.</p>
    </div>

    <form class="form-content" name="dispos" id="myform" action="rqtinsertion.php" enctype="multipart/form-data" method="POST">
        <?php
        // Si une erreur est retournée par la requête alors une erreur va s'afficher
        if (isset($_GET['pbmail']) || isset($_GET['pbcode'])) {
            echo "<p style='color:red'> Formulaire non envoyé, veuillez le renvoyer </p>";
        }
        ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom  *" value="" pattern="[A-Za-z]" title="nom sans chiffre" required />
                </div>
                <div class="form-group">

                    <input type="email" name="courriel" id="courriel" class="form-control" placeholder="Courriel *" value="" required />
                    <?php
                    // Si l'url recupère pbmail alors un message s'affichera
                    if (isset($_GET['pbmail']) && $_GET['pbmail'] == "pbmail") {
                        echo "<p style='color:red'> Courriel déjà utilisé </p>";
                    }
                    ?>
                </div>


            </div>
            <div class="col-md-6">

                <div class="form-group">
                    <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Prénom *" pattern="[a-zA-Z]" value="" required />
                </div>
                <div class="form-group">

                    <input type="text" name="code" id="code" class="form-control" placeholder="Code *" value="" required />
                    <?php
                    // Si l'url recupère pbcode alors un message d'erreur s'affichera
                    if (isset($_GET['pbcode']) && $_GET['pbcode'] == 'pbcode') {
                        echo "<p style='color:red'> Code déjà existant </p>";
                    } ?>
                </div>

            </div>

            <div class="col-md-12 row d-flex justify-content-center">
                <?php
                for ($i = 0; $i < 5; $i++) { ?>
                    <div class="form-group ">
                 <!-- affichage des jours avec la value du code jour  -->
                        <select class="form-control jour" name="dispo[][jour]" id="jour<?= $i ?>">
                            <option value="0" selected>Selectionner un Jour</option>
                            <?php
                            // Requête afin d'afficher les jours dans le select
                            Connexion::init();
                            $reponse = Connexion::$pdo->query("SELECT * FROM jour");
                            $reponse->setFetchMode(PDO::FETCH_OBJ);
                            while ($rep = $reponse->fetch()) {
                            ?>
                            
                                <option value="<?= $rep->code_jour ?>"><?= $rep->jour ?></option>
                            <?php }
                            ?>
                        </select>
                         <!-- affichage des heures avec la value du code horaire  -->
                        <?php for ($j = 0; $j < 9; $j++) { ?>
                            
                            <select style="display: none;" class="form-control heure" name="dispo[<?= $i ?>][heure][]" id="heure<?= $i . $j ?>">
                                <option value="0" selected>Plage horaire</option>
                                <?php
                                // requête afin d'afficher les horaires dans le select  
                                Connexion::init();
                                $reponse = Connexion::$pdo->query("SELECT * FROM horaire");
                                $reponse->setFetchMode(PDO::FETCH_OBJ);
                                // affichage des horaires avec la value du code horaire
                                while ($rep = $reponse->fetch()) {
                                ?>
                                 
                                    <option value="<?= $rep->code_horaire ?>"><?= $rep->horaire ?></option>
                                <?php } ?>
                            </select>

                        <?php } ?>
                        <!-- Bouton ajout/suppresion plage horaire -->
                        <button style="display: none;" type="button" class="btn btn-danger btn-circleS" id="heure<?= $i . "-" ?>"><i class="fas fa-minus"></i> </button>
                        <button style="display: none;" type="button" class="btn btn-success btn-circleA" id="heure<?= $i . "+" ?>"><i class="fas fa-plus"></i> </button>
                    </div>
                <?php } ?>
            </div>
            <div class="col-md-6">
                <input class="btnEffacer" type="reset" id="effacer">
            </div>
            <div class="col-md-6">

                <input class="btnSubmit" name="btnCreer" id="btnCreer" type="submit">

            </div>
        </div>

    </form>
</div>
<?php
include('inc/footer.php')

?>