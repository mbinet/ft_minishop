<?php 
include_once('head.php');


$var = $_GET['c'];
$product_id = $_GET['product_id'];
$product_name = $_GET['product_name'];

$query = "SELECT * FROM products WHERE " . $var ."=1";

if ($result = mysqli_query($conn, $query)) {
    while ($row = mysqli_fetch_array($result)) {
    ?>
    <table border=0 id="article" style="text-align: center;width:80%;">
        <tr>
            <td style="width:20%;">
                <input type="hidden" name="value"/>
                <img src="<?php echo $row['photo']; ?>" alt="<?PHP echo $row['name'];?>" title="<?PHP echo $row['name'];?>" style="margin-left: auto; max-width: 100px; max-height: 250px">
            </td>
            <td style="width:20%;"><p style="font-size: 94px;"><?php echo $row['name']; ?></p></td>
            <td style="width:20%;">
                <p style="font-size: 40px;"><?php echo $row['price']; ?>$</p>
                <a href="product.php?c=<?php echo $var; ?>&product_id=<?php echo $row['id']; ?>&product_name=<?php echo $row['name']; ?>">
                    <img src="ressources/ajouter_panier.png" alt="ajouter" title="ajouter" style="margin-left: auto; width: 200px">
                </a>
            </td>
        </tr>
    </table>
  <?php
	}

} else {
    echo "Aucun produit dans cette categorie.";
}
?>
     
     
    </div>
</body>
</html>
<?php

if ($product_id) {
    $_SESSION['cart'][$product_name]['quantity'] += 1;
    $_SESSION['cart'][$product_name]['id'] = $product_id;
    $_SESSION['cart'][$product_name]['price'] = $product_price;
    $_SESSION['cart'][$product_name]['name'] = $product_name;
    pr($_SESSION['cart']);
}

?>