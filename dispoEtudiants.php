<?php
$nav_en_cours = 'dispo';
$titre = "Disponibilité de l'étudiant";
include('inc/header.php');
require_once 'classes/utilitaire.class.php';
Utilitaire::verifierSessionAdmin();

?>

<div class="container">
    <div id="participants">
        <!-- Tableau qui va permettre d'afficher les horaires d'un etudiant -->
        <table id="target" class="table table-striped table-dark">
            <thead class="bg-primary">
                <tr>
                    <th scope="col">Code Etudiant</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Courriel</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Reuête afin de selectionner le nom, prenom, courriel étudiant grâce au code étudiant
                $i = 0;
                Connexion::Init();
                $sql = 'SELECT  d.code_jour, jour, horaire, nom, prenom, courriel FROM jour j, horaire h, disponibilites d, etudiant e WHERE j.code_jour = d.code_jour and h.code_horaire = d.code_horaire and e.code_etudiant = d.code_etudiant AND d.code_etudiant =:codeEtu group by d.code_jour';
                $result = Connexion::$pdo->prepare($sql);
                $result->execute(['codeEtu' => $_POST['idEtudiant']]);
                $result->setFetchMode(PDO::FETCH_ASSOC);
                while ($membre = $result->fetch()) {
                    if ($i <= 0) {
                ?>
                        <tr>
                            <!-- idEtudiant est le code étudiant récupéré en post de la page tableaudispo ou listeEtudiants, 
                            Affichage des cellules du tableau -->
                            <td scope="row"><?= $_POST['idEtudiant'] ?></td>
                            <td scope="row"><?= $membre['nom'] ?></td>
                            <td scope="row"><?= $membre['prenom'] ?></td>
                            <td scope="row"><?= $membre['courriel'] ?></td>
                        </tr>
                        <!-- séparation entre les deux tableaux -->
                        <tr class="table-light">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Mes disponibilités</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <!-- Tableau afin d'afficher les horaires de l'étudiant -->
                            <td scope="row" hidden><?= $membre['code_jour'] ?></td>
                            <td scope="row"><?= $membre['jour'] ?></td>
                            <td scope="row">
                            <?php $i++;
                        } else { ?>
                        <tr>
                            <td scope="row" hidden><?= $membre['code_jour'] ?></td>
                            <td scope="row"><?= $membre['jour'] ?></td>
                            <td scope="row">
                            <?php $i++;
                        }
                        // Requête qui permet de selectionner les horaires d'un étudiant selon le jour et son code 
                        $sql2 = 'SELECT  horaire FROM horaire h, disponibilites d WHERE  h.code_horaire = d.code_horaire AND d.code_jour =:jour and d.code_etudiant=:etu';
                        $resul = Connexion::$pdo->prepare($sql2);
                        $resul->execute(array(
                            'jour' => $membre['code_jour'],
                            'etu' => $_POST['idEtudiant']
                        ));
                        $resul->setFetchMode(PDO::FETCH_ASSOC);
                        while ($heure = $resul->fetch()) { ?>
                                <?= $heure['horaire'] ?> <br>
                            <?php } ?>
                            </td>
                            <td scope="row"></td>
                            <td scope="row"></td>
                        </tr>
                    <?php
                }
                    ?>
            </tbody>
            <!-- Fin tableau  -->
        </table> 
         <!-- bouton retour -->
        <input class="btn btnRetour" type="button" value="Retour" onclick="self.location.href='tableaudispo.php'">
    </div>
</div>
<hr>
<?php
include('inc/footer.php')

?>