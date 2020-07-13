<?php
$nav_en_cours = 'dispo'; //variable pour savoir dans quelle onglet de la navbar on se trouve
$titre = "Tableau des disponibilités";
include('inc/header.php');
require_once 'classes/utilitaire.class.php';
Utilitaire::verifierSessionAdmin(); // empêche l'accès à la page si on est pas admin
Connexion::Init();
?>
</div>
</nav>

<div class="container">

    <div id="participants">

        <table id="target" class="table table-striped table-dark">

            <thead>

                <tr>
                    <th scope="col">Horaire</th>
                    <?php
                    // on recupere tous les jours de la BDD
                    $sqlJour = 'SELECT * from jour';
                    // execution de la requete
                    $jours = Connexion::$pdo->query($sqlJour);
                    //choix du mode dans lequel on veut traiter le résultat, ici un tableau
                    $jours->setFetchMode(PDO::FETCH_ASSOC);

                    // pour chaque jour obtenu
                    foreach ($jours as $jour) {
                        // on créé une nouvelle colonne dans le header du tableau
                        echo '<th scope="col">' . $jour['jour'] . '</th>';
                    }

                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                // on recupere tous les horaires
                $Sqlhoraires = 'SELECT * from horaire';
                $horaires = Connexion::$pdo->query($Sqlhoraires);
                $horaires->setFetchMode(PDO::FETCH_ASSOC);
                // pour chaque plage horaire
                foreach ($horaires as $heure) {
                    // on créé une nouvelle ligne dans laquelle on insert la plage horaire
                    echo '<tr><td scope="row">' . $heure['horaire'] . '</td>';
                    // on refait une requete pour obtenir tous les jours dans le but de parcourir une ligne autant de fois qu'il y a de jour
                    $sqlJour = 'SELECT * from jour';
                    $jours = Connexion::$pdo->query($sqlJour);
                    $jours->setFetchMode(PDO::FETCH_ASSOC);
                    //pour chaque jour
                    foreach ($jours as $jour) {
                        //on entame une nouvelle colonne
                        echo '<td scope="row">';
                        $Sqldispos = 'SELECT * from disponibilites'; // on recupere toutes les disponibilites inscrites
                        $dispos = Connexion::$pdo->query($Sqldispos);
                        $dispos->setFetchMode(PDO::FETCH_ASSOC);

                        foreach ($dispos as $dispo) { //dans cette colonne on parcourt toutes les disponibilites de la BDD
                            // si le jour et la plage horaire en cours (donc la case dans laquelle on se trouve) correspondent à la disponibilite en cours alors on inscrit un nom
                            if ($jour['code_jour'] == $dispo['code_jour'] && $heure['code_horaire'] == $dispo["code_horaire"]) {

                                //on recupere l'etudiant concerné. Il y en a un seul à la fois car on parcourt les disponibilités une par une et une disponibilité fait reference a un seul etudiant
                                $Sqletudiants = 'SELECT * from etudiant WHERE code_etudiant = :code';
                                $etudiants = Connexion::$pdo->prepare($Sqletudiants);
                                $etudiants->execute(['code' => $dispo['code_etudiant']]);
                                $etudiants->setFetchMode(PDO::FETCH_ASSOC);
                                $etudiant =  $etudiants->fetch();
                ?>
                                <form method="POST" action="dispoEtudiants.php">

                                    <?=
                                        //affichage d'un bouton qui redirige vers les details de l'etudiant lors du clique (grace au form)
                                        '<button type="submit" class="bouton2" name="idEtudiant" value="' . $dispo['code_etudiant'] . '">' . $etudiant['nom'] . " " .  $etudiant['prenom'] . '</button>'; ?>
                                </form>
                <?php

                            }
                        }
                        // on ferme la colonne
                        echo '</td>';
                    }
                    // on ferme la ligne
                    echo  '</tr>';
                }
                ?>

            </tbody>
        </table>
    </div>

</div>
<hr>
<?php
include('inc/footer.php')

?>