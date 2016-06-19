<?php
session_start();
include_once('functions.php');

$servername = "localhost";
$username = "root";
$password = "root";
$db_name = "canshop";
$conn = mysqli_connect($servername, $username, $password, $db_name);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
<html>
<head>
<meta charset="UTF-8">
<TITLE>Can'Shop</TITLE>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.png" type="image/png">
<link rel="icon" sizes="32x32" href="ressources/favicon.ico" type="image/png">
<link rel="stylesheet" type="text/css" href="home.css">
<link rel="stylesheet" type="text/css" href="soda.css">
<link rel="stylesheet" type="text/css" href="cart.css">
<link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
  <div id="titre" class="header">
	<a href="index.php"><IMG src= "ressources/logo.png" ALT="logo" title="Can'Shop" style="height:11%">
	<div><h1>Can'Shop<h1></div></a>
	<?php
	if ($_SESSION['login'] == "") {
		?>
		<form class="log" method="POST" action="login.php">
			Identifiant: <input type="text" name="login" placeholder="login"required/>
			Mot de passe: <input type="password" name="passwd"  placeholder="passwd"required/>
			<input style="width: 40px;" type="submit" name="submit" value="OK"/>
		</form>
		<div class="inscription">
			<a href="register.php">
				<img src="ressources/inscrire.png" style="height: 50px;margin-top: 13px;"></img>
			</a>
		</div>
	<?php
	} //endif
	else {
		// displays admin button
		if ($_SESSION['admin'] == 1) { ?>
			<div class="log">
				<a href="delete.php"><button>Supprimer le compte</button></a>
				<?php echo $_SESSION['login'];?>
				<a href="logout.php"><button>Deco</button></a>
				<a href="index_admin.php"><button>ADMIN SPECIAL ACCESS</button></a>
			</div><?php
	  	}
	  	else { ?>
	  		<div class="log">
				<a href="delete.php"><button>Supprimer le compte</button></a>
				<?php echo $_SESSION['login'];?>
				<a href="logout.php"><button>Deco</button></a>
			</div><?php
	  	}
	  	?>
	<?php
	} // endelse
	?>
	<div class="basket">
	  <a href="cart.php">
		<img src="ressources/basket/basket.png"></img>
	  </a>
	</div>
  </div>
</div>
<div id="main">
	<ul id="menu">	
		<li><a href="product.php?c=soda">Sodas</a>
			<ul style= "position: absolute;top: 62px;">
				<?PHP
				$query = "SELECT * FROM products WHERE soda=1";
				if ($result = mysqli_query($conn, $query)) {
					while ($row = mysqli_fetch_array($result)) {?>
						<li>
						<a href="product.php?c=soda"><?PHP echo $row['name'];?></a>
						</li>
					<?PHP
					}
				}
				?>
			</ul>
		</li><li><a href="product.php?c=alcool">Alcool</a>
		<ul style= "position: absolute;top: 62px;">
			  <?PHP
			  $query = "SELECT * FROM products WHERE alcool=1";
		  if ($result = mysqli_query($conn, $query)) {
			while ($row = mysqli_fetch_array($result)) {?>
					<li>
					  <a href="product.php?c=alcool">
						<?PHP echo $row['name'];?></a>
						</li>
				  <?PHP
				}
				}
				?>
		</ul>
		</li><li><a href="product.php?c=jus">Jus</a>
			<ul style= "position: absolute;top: 62px;">
			  <?PHP
			  $query = "SELECT * FROM products WHERE jus=1";
		  if ($result = mysqli_query($conn, $query)) {
			while ($row = mysqli_fetch_array($result)) {?>
					<li>
					  <a href="product.php?c=jus"><?PHP echo $row['name'];?></a>
					</li>
				  <?PHP
				}
				}
				?>
			</ul>
		</li>
	</ul>
<!--</div>-->