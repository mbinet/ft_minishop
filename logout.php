<?PHP
include("head.php");
if ($_SESSION['login'] == "")
    echo "Vous ne devriez pas etre ici, vous n'etes pas log.";
else
    echo "Vous êtes desormais deconnecté.";
$_SESSION = "";
$_SESSION['cart'] = "";
$_SESSION['login'] = "";
$_SESSION['admin'] = "";
?>
