<?PHP
include ("head.php");

if (!isset($_POST['login']) && !isset($_POST['[passwd'])) {
?>
<form class="register" method="POST" action="register.php">
    <table border=0 align=center>
        <tr>
            <td>Identifiant: </td>
            <td><input type="text" name="login" value="" placeholder="login" required/></td>
        </tr>
        <tr>
            <td>Mot de passe:</td>
            <td><input type="password" name="passwd" value="" placeholder="password" required/></td>
        </tr>
        <tr>
            <td colspan=2 style="text-align:center"><input style="width: 40px;" type="submit" name="submit" value="OK"/></td>
        </tr>
    </table>
    <br />
</form>

<?php
}
else {
    $query = "SELECT * FROM users WHERE login='" . $_POST['login'] . "'";
    $result = mysqli_query($conn, $query);
    if ($row = mysqli_fetch_array($result)) {
        echo "Vous etes deja inscrit.";
    }
    else {
        $psd = hash("whirlpool", $_POST["passwd"]);
	    $finalpass = hash("sha512", $psd."hyllore");
        mysqli_query($conn, "INSERT INTO users (login, password) VALUES ('" . $_POST['login'] . "', '" . $finalpass . "')") or die(mysqli_error($conn));
        echo "Felicitation, vous etes inscrit.";
    }
}
?>