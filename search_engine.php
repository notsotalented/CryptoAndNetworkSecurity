<?php
	$host = "localhost";
	$user = "root";
	$password = "";
	$db_name = "login";

	$con = mysqli_connect($host, $user, $password, $db_name);

if (isset($_POST['query'])) {

        $query = "SELECT * FROM product_info WHERE product_name LIKE '{$_POST['query']}%' LIMIT 100";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($res = mysqli_fetch_array($result)) {
				echo '<a class="dropdown-item" href="/index.php?products_id=' .$res['product_id']. '">' .$res['product_name']. '</a>';
            }

        } else {
            //echo "Product not found!";
            echo '<em class="dropdown-item">Product not found!</em>';
        }
}
    $con->close();
?>