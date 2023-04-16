<?php
	session_start();

	$host = "localhost";
	$user = "root";
	$password = "";
	$db_name = "login";
	$id = $_POST['username'];
	$pass = $_POST['password'];

	$uppercase = preg_match('@[A-Z]@', $pass);
	$lowercase = preg_match('@[a-z]@', $pass);
	$number    = preg_match('@[0-9]@', $pass);
	$specialChars = preg_match('@[^\w]@', $pass);


	if(!filter_var($id, FILTER_VALIDATE_EMAIL)) {
		echo "<script>
			window.location.href='index.php?page=login';
			alert('Input email address was invalid');
		</script>";
	}

	if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pass) < 8 || strlen($pass) > 20) {
		echo "<script>
				window.location.href='index.php?page=login';
				alert('Password should be at least [8-20] characters in length and should include at least one upper case letter, and one number.');
			</script>";
	}

	$con = mysqli_connect($host, $user, $password, $db_name);

	if (mysqli_connect_error()) {
		die("Failed to connect to MySQL:". mysqli_connect_error());
	}

	$usernames = mysqli_real_escape_string($con, $id);
	$passwords = mysqli_real_escape_string($con, $pass);


	$sql = "select *from login_info where username = '$usernames' and password = '$passwords'";  
	$result = mysqli_query($con, $sql);  
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$count = mysqli_num_rows($result);

	if($count == 1) {
		$sql = "select role from login_info where username = '$usernames' and password = '$passwords'";  
		$result = mysqli_query($con, $sql);  
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);

		if ($count == 1) {
			$_SESSION['login_user'] = $usernames;
			$_SESSION['user_role'] = $row["role"];
			$con->close();
			echo "<script>
			window.location.href='index.php';
			alert('Login successful');
			</script>";
		}
	}
	else {
		$con->close();
		echo "<script>
			window.location.href='index.php?page=login';
			alert('Username or Password is invalid');
		</script>";
	}
?>