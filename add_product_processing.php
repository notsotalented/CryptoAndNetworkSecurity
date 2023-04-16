<?php
	session_start();

	$host = "localhost";
	$user = "root";
	$password = "";
	$db_name = "login";
	$product_name = $_POST['product_name'];
	$product_desc = $_POST['product_desc'];
	$product_stock = $_POST['product_stock'];

	$number    = preg_match('@[0-9]@', $product_stock);

	if(!$number || strlen($product_stock) > 5) {
		echo "<script>
				window.location.href='index.php?page=add-product';
				alert('Product stock invalid, please input again!');
			</script>";
	}

	$product_owner = $_SESSION['login_user'];

	$con = mysqli_connect($host, $user, $password, $db_name);

	if (mysqli_connect_error()) {
		die("Failed to connect to MySQL:". mysqli_connect_error());
	}

	$sql_insert =  "insert into product_info (product_name, product_desc, product_stock, product_owner) values ('$product_name', '$product_desc', '$product_stock', '$product_owner')";
	if (mysqli_query($con, $sql_insert) == TRUE) {
		$con->close();
		echo "<script>
			window.location.href='index.php?page=home';
			alert('Item added successful! Back to home');
		</script>";
	}
	else {
		$con->close();
		echo "<script>
			window.location.href='index.php?page=add-product';
			alert('Something wrong happened! Please try again.');
		</script>";
	}
?>