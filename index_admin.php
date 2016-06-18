<?php
include_once('head.php');

if (!$_SESSION['loggued']) {
    echo "Vous n'etes pas autorise a acceder a cette page<br/>";
    echo "merci de vous rendre a l'<a href='../index.php'>Accueil</a>";
}

?>