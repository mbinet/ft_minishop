<?php
include_once('head.php');

if (!$_SESSION['login'] || $_SESSION['admin'] != 1) {
    echo "Vous n'etes pas autorise a acceder a cette page<br/>";
    echo "merci de vous rendre a l'<a href='../index.php'>Accueil</a>";
}
else {
?>


<ul id="menu">
	<li style="z-index:100"><a href="index_admin.php">Produits</a>
		<ul style= "position: absolute;top: 62px;">
		</ul>
   </li><li style="z-index:100"><a href="admin_users.php">Utilisateurs</a>
	<ul style= "top: 62px;" class="test">
	</ul>
	</li><li style="z-index:100"><a href="admin_cmd.php">Commandes</a>
	<ul style= "top: 62px;" class="test">
	</ul>
	</li>
</ul>

<div class="admin">
    <!------------------->
    <!-- ADD A PRODUCT -->
    <!------------------->
    <form name="add_product" action="" method="POST">
        <table border=0 style="text-align: center;width:80%;">
            <tr>
                <td colspan=3>
                    Ajouter un produit
                </td>
            </tr>
            <tr>
                <td style="width:20%;">
                    <input type="text" name="name" placeholder="Nom"/>
                    <br /><br />
                    <input type="text" name="price" placeholder="Prix"/>
                    <br /><br />
                    <input type="text" name="photo" placeholder="Lien photo"/>
                </td>
                <td style="width:20%;text-align:left">
                    <div class="checkbox">
                        <p style="text-align:center">Categorie</p>
                        <br />
                        <div class="inner_checkbox">
                            <input type="checkbox" name="cat[]" value="soda"/> soda<br />
                            <input type="checkbox" name="cat[]" value="alcool"/> alcool<br />
                            <input type="checkbox" name="cat[]" value="jus"/> jus<br />
                        </div>
                    </div>
                </td>
                <td style="width:20%;">
                    <input type="hidden" name="add_product" value="true"/>
                    <input type="submit" name="submit" value="ADD"/>
                </td>
            </tr>
        </table>
    </form>
    <?php
    if ($_POST['add_product'] == true) {
        foreach($_POST['cat'] as $valeur)
        {
            if ($valeur == "soda") {
                $soda = 1;
            }
            if ($valeur == "jus") {
                $jus = 1;
            }
            if ($valeur == "alcool") {
                $alcool = 1;
            }
        }
        mysqli_query($conn, "INSERT INTO products (name, price, jus, soda, alcool, photo) VALUES ('".$_POST['name']."', '".$_POST['price']."', '$jus', '$soda', '$alcool', '".$_POST['photo']."' )") or die(mysqli_error($conn));
        echo "Produit ajouté";
    }
    ?>
    <!---------------------->
    <!-- CHANGE A PRODUCT -->
    <!---------------------->
    <table border=0 style="text-align: center;width:80%;">
        <form name="modif_product1" action="" method="POST">
            <tr>
                <td colspan=3>
                    Modifier un produit
                </td>
            </tr>
            <tr>
                <td style="width:20%;">
                </td>
                <td style="width:20%;text-align:center">
                    <select name="select_id">
                    <?php
                        $query = "SELECT * FROM products";
                        if ($result = mysqli_query($conn, $query)) {
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                            }
                        }
                    ?>
                    </select>
                    <br/><br/>
                    <input type="submit" name="submit" value="MODIF">
                </td>
                <td style="width:20%;">
                </td>
            </tr>
        </form>
            <?php
                $query = "SELECT * FROM products WHERE id='" . $_POST['select_id'] . "'";
                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                $row = mysqli_fetch_array($result);
            ?>
        <form name="modif_product2" action="" method="POST">
            <tr>
                <td style="width:20%;">
                    <input type="text" name="name_modif" placeholder="Nom" value="<?php echo $row['name'];?>"/>
                    <input type="hidden" name="id_modif" value="<?php echo $row['id'];?>"/>
                    <br /><br />
                    <input type="text" name="price_modif" placeholder="Prix" value="<?php echo $row['price'];?>"/>
                    <br /><br />
                    <input type="text" name="photo_modif" placeholder="Lien photo" value="<?php echo $row['photo'];?>"/>
                </td>
                <td style="width:20%;text-align:left">
                    <div class="checkbox">
                        <p style="text-align:center">Categorie</p>
                        <br />
                        <div class="inner_checkbox">
                            <input type="checkbox" name="cat_modif[]" value="soda"/> soda<br />
                            <input type="checkbox" name="cat_modif[]" value="alcool"/> alcool<br />
                            <input type="checkbox" name="cat_modif[]" value="jus"/> jus<br />
                        </div>
                    </div>
                </td>
                <td style="width:20%;">
                    <input type="hidden" name="modif_product2" value="true"/>
                    <input type="submit" name="submit_modif" value="EXEC MODIF"/>
                </td>
            </tr>
        </form>
        <?php
        if ($_POST['modif_product2'] == true) {
            if (isset($_POST['cat_modif'])) {
                foreach($_POST['cat_modif'] as $valeur)
                {
                    if ($valeur == "soda") {
                        $soda = 1;
                    }
                    if ($valeur == "jus") {
                        $jus = 1;
                    }
                    if ($valeur == "alcool") {
                        $alcool = 1;
                    }
                }
            }
            mysqli_query($conn, "UPDATE products SET name='".$_POST['name_modif']."', price='".$_POST['price_modif']."', photo='".$_POST['photo_modif']."' WHERE id='".$_POST['id_modif']."'") or die(mysqli_error($conn));
            echo "Produit modifié";
        }
        ?>
    </table>
    <!---------------------->
    <!-- DELETE A PRODUCT -->
    <!---------------------->
    <table border=0 style="text-align: center;width:80%;">
        <form name="del_product" action="" method="POST">
            <tr>
                <td colspan=3>
                    Supprimer un produit
                </td>
            </tr>
            <tr>
                <td style="width:20%;">
                </td>
                <td style="width:20%;text-align:center">
                    <select name="delete_id">
                    <?php
                        $query = "SELECT * FROM products";
                        if ($result = mysqli_query($conn, $query)) {
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                            }
                        }
                    ?>
                    </select>
                    <br/><br/>
                    <input type="hidden" name="delete_product" value="true"/>
                    <input type="submit" name="submit" value="SUPPRIMER"/>
                </td>
                <td style="width:20%;">
                </td>
            </tr>
        </form>
        <!--$sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";-->
        <?php
        if ($_POST['delete_product'] == true) {
            mysqli_query($conn, "DELETE FROM products WHERE id='".$_POST['delete_id']."'") or die(mysqli_error($conn));
            echo "Produit supprimé";
        }
        ?>
    </table>
</div>
<?php
}

?>