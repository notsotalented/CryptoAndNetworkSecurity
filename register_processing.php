<?php
	session_start();
	$host = "localhost";
	$user = "root";
	$password = "";
	$db_name = "login";
	$id = $_POST['username'];
	$pass = $_POST['password'];
	$pass_r = $_POST['password_r'];
	$role = $_POST['role'];

	$uppercase = preg_match('@[A-Z]@', $pass);
	$lowercase = preg_match('@[a-z]@', $pass);
	$number    = preg_match('@[0-9]@', $pass);
	$specialChars = preg_match('@[^\w]@', $pass);

	if(!filter_var($id, FILTER_VALIDATE_EMAIL)) {
		echo "<script>
			window.location.href='index.php?page=register';
			alert('Input email address was invalid');
		</script>";
	}

	if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pass) < 8 || strlen($pass) > 20) {
		echo "<script>
			window.location.href='index.php?page=register';
			alert('Password should be at least [8-20] characters in length and should include at least one upper case letter, and one number.');
		</script>";
	}

	if ($pass != $pass_r) {
		echo "<script>
			window.location.href='index.php?page=register';
			alert('The provided passwords did not match!');
		</script>";
	}

	if ($role != 0 && $role != 1 && $role != 2) {
		echo "<script>
			window.location.href='index.php?page=register';
			alert('Inappropriate input for role. Please read the instruction carefully.');
		</script>";
	}

	$con = mysqli_connect($host, $user, $password, $db_name);

	if (mysqli_connect_error()) {
		die("Failed to connect to MySQL:". mysqli_connect_error());
	}


	$usernames = mysqli_real_escape_string($con, $id);
	$passwords = mysqli_real_escape_string($con, $pass);

	$sql = "select *from login_info where username = '$usernames'";  
	$result = mysqli_query($con, $sql);  
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$count = mysqli_num_rows($result);


	if ($count == 1) {
		echo "<script>
			window.location.href='index.php?page=register';
			alert('Existed username, please choose another one.');
		</script>";
	}
	else {

		$sql_insert =  "insert into login_info values ('$id', '$pass', '$role')";
		if (mysqli_query($con, $sql_insert) == TRUE) {
			$con->close();
			echo "<script>
				window.location.href='index.php?page=login';
				alert('Register successful! Please login now.');
			</script>";
		}
		else {
			$con->close();
			echo "<script>
				window.location.href='index.php?page=login';
				alert('Something wrong happened! Please try again.');
			</script>";
		}

	}
?>