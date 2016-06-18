<?PHP
if (file_exists("../private/passwd/mdp.txt") && $_POST["login"] && $_POST["passwd"] && $_POST["submit"] == "OK")
{
	$tab = array();
	$tabs = array();
	$tabs = unserialize(file_get_contents("../private/passwd/mdp.txt"));
	foreach ($tabs as $tamere=>$tamere2)
	{
		if ($tamere2["login"] == $_POST['login'])
		{
			echo "ERROR\n";
			return ;
		}
	}
	$psd = hash("whirlpool", $_POST["passwd"]);
	$psd = hash("sha512", $psd."hyllore");
	$tab['login'] = $_POST['login'];
	$tab['passwd'] = $psd;
	$tabs[] = $tab;
	file_put_contents("../private/passwd/mdp.txt", serialize($tabs));
	echo "OK\n";
}
else if ($_POST["login"] && $_POST["passwd"] && $_POST["submit"] == "OK")
{
	mkdir("../private", 0700);
	mkdir("../private/passwd", 0700);
	$psd = hash("whirlpool", $_POST["passwd"]);
	$psd = hash("sha512", $psd."hyllore");
	$tab = array(array("login" => $_POST["login"], "passwd" => $psd));
	file_put_contents("../private/passwd/mdp.txt", serialize($tab));
	echo "OK\n";
}
else
	echo "ERROR\n";
?>
