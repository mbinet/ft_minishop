<?PHP
include ("head.php");

if ($_SESSION['login'] != "")
{
    mysqli_query($conn, "DELETE FROM users WHERE login='".$_SESSION['login']."'") or die(mysqli_error($conn));
    $_SESSION['login']= "";
    echo "Compte Supprimé.";
    pr ($_SESSION);
}
else
    echo "vous ne devriez pas etre ici, loguez vous.";
?>