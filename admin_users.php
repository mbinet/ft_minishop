<?php
include('head.php');
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
    <!---------------------->
    <!-- DELETE AN USER -->
    <!---------------------->
    <table border=0 style="text-align: center;width:80%;">
        <form name="del_product" action="" method="POST">
            <tr>
                <td colspan=3>
                    Supprimer un utilisateur
                </td>
            </tr>
            <tr>
                <td style="width:20%;">
                </td>
                <td style="width:20%;text-align:center">
                    <select name="delete_id">
                    <?php
                        $query = "SELECT * FROM users";
                        if ($result = mysqli_query($conn, $query)) {
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<option value='" . $row['id'] . "'>" . $row['login'] . "</option>";
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
        <?php
        if ($_POST['delete_product'] == true) {
            mysqli_query($conn, "DELETE FROM users WHERE id='".$_POST['delete_id']."'") or die(mysqli_error($conn));
            echo "Produit supprimé";
        }
        ?>
    </table>
    <!---------------------->
    <!-- GRANT AN USER -->
    <!---------------------->
    <table border=0 style="text-align: center;width:80%;">
        <form name="del_product" action="" method="POST">
            <tr>
                <td colspan=3>
                    Donner les droits admin
                </td>
            </tr>
            <tr>
                <td style="width:20%;">
                </td>
                <td style="width:20%;text-align:center">
                    <select name="id">
                    <?php
                        $query = "SELECT * FROM users";
                        if ($result = mysqli_query($conn, $query)) {
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<option value='" . $row['id'] . "'>" . $row['login'] . "</option>";
                            }
                        }
                    ?>
                    </select>
                    <br/><br/>
                    <input type="hidden" name="grant" value="true"/>
                    <input type="submit" name="submit" value="VALIDER"/>
                </td>
                <td style="width:20%;">
                </td>
            </tr>
        </form>
        <?php
        if ($_POST['grant'] == true) {
            mysqli_query($conn, "UPDATE users SET admin='1' WHERE id='".$_POST['id']."'") or die(mysqli_error($conn));
            echo "Utilisateur admin";
        }
        ?>
    </table>
</div>
