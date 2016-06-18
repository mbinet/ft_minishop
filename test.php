<?php
include_once('head.php');
include_once('sql.php');

// pr($conn);
// pr($_SESSION['test']);

$query = "SELECT * FROM products";

if ($result = mysqli_query($conn, $query)) {
    while ($row = mysqli_fetch_array($result)) {
    	pr($row);
	}

} else {
    echo mysqli_error($result);
}
// mysqli_close($_SESSION['link']);
?>