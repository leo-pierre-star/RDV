<?php
$nav_en_cours = 'tableau';
$i = 0;
$titre = "Liste des étudiants";
include('inc/header.php');
require_once 'classes/utilitaire.class.php';
Utilitaire::verifierSessionAdmin();
?>
 </div>

</nav>
<div class="container">

  <div id="participants">
<!-- Tableau qui affiche la liste des étudiants  -->
    <table id="target" class="table table-striped table-dark">

      <thead>

        <tr>
          <th>#</th>
          <th>Code Etudiant</th>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Courriel</th>
          <th>Ses disponibilités</th>

        </tr>
      </thead>
      <tbody>
        <?php
        Connexion::Init();
        // Requête pour selectionner tous les étudiants
        $sql = 'SELECT * FROM etudiant
      ORDER by nom';
        $result = Connexion::$pdo->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        while ($membre = $result->fetch()) {
          $i++;
        ?>
        <!-- Affichage de la liste des étudiants -->
          <tr>
            <td><?= $i ?></td>
            <td><?= $membre['code_etudiant'] ?></td>
            <td><?= $membre['nom'] ?></td>
            <td><?= $membre['prenom'] ?></td>
            <td><?= $membre['courriel'] ?></td>
            <td>
              <!-- form afin d'envoyer en post le code étudiant sur la page dispoEtudiants afin d'y afficher ses heures -->
              <form method="POST" action="dispoEtudiants.php">
                <?=
                  '<button type="submit" class="btn btnConsult" name="idEtudiant" value="' . $membre['code_etudiant'] . '">Consulter</button>'; ?>
              </form>
            </td>


          </tr>
        <?php
        } ?>

      </tbody>
      <!-- Fin tableau  -->
    </table>
  </div>
</div>
<hr>
<?php
include('inc/footer.php')

?>