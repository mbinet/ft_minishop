<?PHP
include ("head.php");

if (!isset($_POST['login']) && !isset($_POST['[passwd'])) {
	echo "Vous n'etes pas sense etre ici. Bisous.";
}
else {
	
    $query = "SELECT * FROM users WHERE login='" . $_POST['login'] . "'";
    $result = mysqli_query($conn, $query);
    if (!$row = mysqli_fetch_array($result)) {
        echo "Vous n'etes pas inscrit. Allez <a href='register.php'>ici</a>";
    }
    else {
        $psd = hash("whirlpool", $_POST["passwd"]);
	    $finalpass = hash("sha512", $psd."hyllore");
        if ($finalpass == $row['password']) {
	        $_SESSION['login'] = $_POST['login'];
	        echo "Felicitation, vous etes connecte.";
	        if ($row['admin'] == 1) {
	            $_SESSION['admin'] = 1;
	            echo " EN SUPERADMIN.";
	        }
        }
    }
}
?>