<?php
include_once('head.php');

$var = $_GET['c'];
$product = $_GET['add'];
$query = "SELECT * FROM products";
?>

<div class="wrap">
    <div class="elem">
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
            if ($_SESSION['cart'] != "") {
                foreach ($_SESSION['cart'] as $product) {
                    // getting product infos from db
                    $query = "SELECT * FROM products WHERE id=" . $product['id'] . "";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_array($result);
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
            <tr>
                <td colspan=5>
                        <form name="cart" action="" method="POST" style="position: inherit; top: 0;float:none;margin-bottom:0">
                        <input type="hidden" name="order" value="true"/>
                        <input type="submit" value="Commander" style=""/>
                    </form>
                </td>
            </tr>
        </table>
    </div>
    <?php
    if ($_SESSION['login'] != "") {
        if($_POST['order'] == true && $_SESSION['cart'] != "") {
            $serialized = serialize($_SESSION['cart']);
            $final = mysqli_real_escape_string($conn, $serialized);
            mysqli_query($conn, "INSERT INTO orders (string) VALUES ('$final')") or die(mysqli_error($conn));
            echo "Votre commande a ete prise en compte";
        }
    }
    else {
        echo "Vous devez vous connecter pour valider votre panier.";
    }
    ?>
</div>