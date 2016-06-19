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
    <?php
    $query = "SELECT * FROM orders";
    $result = mysqli_query($conn, $query);
    foreach ($result as $row) {
        $cmd = unserialize($row['string']);
        ?>
        <table border=0>
            <tr class="border_bottom">
                <td>
                </td>
                <td>
                    <span class="title"><b>Produit</b></span>
                </td>
                <td>
                    <span class="title"><b>Reference</b></span>
                </td>
                <td>
                    <span class="title"><b>Quantite</b></span>
                </td>
                <td>
                    <span class="title"><b>Prix</b></span>
                </td>
            </tr>
            <?php
            $count = 0;
                foreach ($cmd as $product) {
                    // getting product infos from db
                    $query = "SELECT * FROM products WHERE id=" . $product['id'] . "";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_array($result);
                    if ($row != NULL) {
                        ?>
                        <tr class="border_bottom">
                            <td>
                                <div class="img"><img src="<?php ?>"></img></div>
                            </td>
                            <td>
                                <span class="title"><?php echo $row['name']; ?></span>
                            </td>
                            <td>
                                <span class="title">#<?php echo $product['id']; ?></span>
                            </td>
                            <td>
                                <span class="title"><?php echo $product['quantity']; $count += $product['quantity'] * $row['price'];?></span>
                            </td>
                            <td>
                                <span class="title"><?php echo $row['price'];?> $</span>
                            </td>
                        </tr>
                    <?php
                    }
                }
            ?>
            <tr>
                <td colspan=4></td>
                <td>
                    Total : <?php echo $count;?> $
                </td>
            </tr>
        </table>
    <?php
    }
    ?>
</div>
