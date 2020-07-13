<?php
class Utilitaire
{
    static public function verifierSession() //verifier que quelqu'un est connecté
    {
        if (!isset($_SESSION['etatConnexion']) && !$_SESSION['etatConnexion']) {
            header('Location: index.php');
            exit();
        }
    }
    static public function verifierSessionAdmin() //verifier que quelqu'un est connecté et qu'il est admin
    {
        if (!isset($_SESSION['etatConnexion']) && !$_SESSION['etatConnexion'] || $_SESSION['role']!='admin') {
            header('Location: index.php');
            exit();
        }
    }
}
