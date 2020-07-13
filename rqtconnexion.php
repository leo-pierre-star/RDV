<?php
session_start();

$goIndex = function () {
    header('Location: seConnecter.php');
    exit();
};
// Vérifie si login et pwd existe  et s'ils sont non nuls
if (isset($_POST['login']) && isset($_POST['password']) && $_POST['login'] != NULL && $_POST['password'] != NULL) {

    $p_login = $_POST['login'];
    $p_mdp = $_POST['password'] ;

    require_once 'classes/conf.class.php';
    require_once 'classes/connexion.class.php';
    // Connexion à la BDD + préparation de la requête 
    Connexion::Init();
    $sql = "SELECT mdp
    from administrateur 
    WHERE login = :login";
    $result = Connexion::$pdo->prepare($sql);
    // On spécifie que le login du WHERE dans la requête aura comme valeur $p_login;
    $result->execute(['login' => $p_login]);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $membre = $result->fetch();
    // verifie si le mdp match avec celui de la bdd
    $result = null;
    echo $p_mdp;
    echo "<br>";
    echo $membre['mdp'];
   // Verifie si le mot de passe correspond et redirige
    if ($p_mdp == $membre['mdp']) {
        $_SESSION['etatConnexion'] = true;
        $_SESSION['role'] = 'admin';
        header('location: tableaudispo.php');
        exit();
    }
    // Renvoie à au formulaire de connexion si pb
    else {
        header('location: seConnecter.php?pbLogin=pbLogin');
    }
   
} 
