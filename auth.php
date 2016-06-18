<?PHP
function auth($login, $passwd)
{
	$tab = array();
	$tab = unserialize(file_get_contents("../private/passwd/mdp.txt"));
	$passwd = hash("whirlpool", $passwd);
	$passwd = hash("sha512", $passwd."hyllore");
	foreach ($tab as $key=>$value)
	{
		if ($value["login"] == $login)
		{
			if ($value["passwd"] == $passwd)
			{
				return (1);
			}
		}
	}
	return (0);
}
?>
