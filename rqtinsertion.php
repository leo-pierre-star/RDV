<?php
require_once 'classes/conf.class.php';
require_once 'classes/connexion.class.php';

Connexion::Init();
if (
    // On regarde si tous les inputs sont complétés et initialisés
    isset($_POST['nom']) && $_POST['nom'] != null &&
    isset($_POST['prenom']) && $_POST['prenom'] != null  &&
    isset($_POST['code']) && $_POST['code'] != null &&
    isset($_POST['courriel']) && $_POST['courriel'] != null &&
    isset($_POST['dispo']) && $_POST['dispo'] != null
) {
    
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $code = $_POST['code'];
    $courriel = ($_POST['courriel']);
    $dispo = $_POST['dispo'];
     // Requête afin de savoir s'il y a un mail identique à celui saisi
    $sql = "SELECT count(courriel) as 'nombre' , count(code_etudiant) as 'codeEtudiant' 
    FROM etudiant
    WHERE courriel = :mail";
    $result = Connexion::$pdo->prepare($sql);
    $result->execute(['mail' => $courriel]);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $email = $result->fetch();
    $result = null;
    // Requête afin de savoir s'il y a un code etudiant identique à celui saisi
    $sqlcode = "SELECT count(code_etudiant) as 'codeEtudiant' 
    FROM etudiant
    WHERE code_etudiant = :etu";
    $result = Connexion::$pdo->prepare($sqlcode);
    $result->execute(['etu' => $code]);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $etudiant = $result->fetch();
    $result = null;
    // Si le courriel exite redirige à la page inscription + messsage qu'on récupère sur inscription.php pour afficher une erreur
    if ($email['nombre'] > 0) {
        header("Location: disponibilite.php?pbmail=pbmail");
    }
    // Si le code etudiant existe déjà redirige à la page d'inscription et envoie un message d'erreur
    elseif ($etudiant['codeEtudiant'] > 0) {
        header("Location: disponibilite.php?pbcode=pbcode");
    }
    // Insert dans la bdd les données
    else {
        $reqsec2 = Connexion::$pdo->prepare("INSERT INTO  etudiant (code_etudiant, nom, prenom, courriel)
                 VALUES (?, ?, ?, ?)");
        // Défini les valeurs
        $reqsec2->execute(array($code, $nom, $prenom, $courriel));
        // on requete pour avoir le code étudiant via son mail
        $rq = ("SELECT code_etudiant FROM etudiant where courriel = :mail");
        $result = Connexion::$pdo->prepare($rq);
        $result->execute(['mail' => $courriel]);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $etu = $result->fetch();
        $codetu = $etu['code_etudiant'];
        $result = null;
        // on parcourt le tableau dispo
        foreach ($dispo as $jours) {
            if ($jours['jour'] != 0) {
                // echo "<pre>";
                // print_r($jours);
                // echo "</pre>";
                // on parcourt le tableau jours
                foreach ($jours['heure'] as $heure) {
                    if ($heure > 0) {
                        // on insert dans la bdd quand un horaire existe
                        $reqsec2 = Connexion::$pdo->prepare("INSERT INTO  disponibilites (code_etudiant, code_jour, code_horaire)
            VALUES (?, ?, ?)");

                        // Défini les valeurs
                        $reqsec2->execute(array($codetu, $jours['jour'], $heure));
                        header('location: index.php?pop=y');
                    }
                }
            }
        }
    }
    // Redirige si y'a une erreur
} else {
    header('location: index.php');
}

?>
