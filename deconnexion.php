<?php

session_start();
// Détruit la session active et redirige
session_destroy();
header("Location: index.php");
?>