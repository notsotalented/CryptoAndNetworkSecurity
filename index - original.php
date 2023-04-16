<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="/style/foxstyle.css">
		<title>FoxNguyenA</title>
		<link rel="icon" type="image/x-icon" href="/images/favicon.ico">
	</head>
<body>
	<header id="header1">
		<div class = "topleft">
			<img id="headerlogo" src="/images/fox.png" alt="LOGO">
		</div>
		<div class = "topright">
			<?php
				   if(!isset($_SESSION['login_user'])){
						if (isset($_GET['page'])) {
							$urlpage = $_GET['page'];
							switch ($urlpage) {
								case "login":
									echo '<a id="loginprompt" href="/index.php?page=register"><i class="fa fa-check-square-o"> REGISTER</i></a>';
									break;				
								default:
									echo '<a id="loginprompt" href="/index.php?page=login"><i class="fa fa-address-card-o"> LOGIN</i></a>';
									break;
							}
						}
						else {
							echo '<a id="loginprompt" href="/index.php?page=login"><i class="fa fa-address-card-o"> LOGIN</i></a>';
						}

				   }
				   else {
				   		echo '<a id="loginprompt_after" href="/logout.php"><i class="fa fa-user-circle-o"> </i> ' .$_SESSION['login_user']. '</a>';
				   }
			?>
		</div>
	</header>
	<header id="header2">
		<a class = "nav" id="hometop" href="/index.php?page=home">HOME</a>
		<a class = "nav" id="latesttop" href="/index.php?page=latest">LATEST</a>
		<div class = "dropdown">
			<a class = "dropbtn" id="productstop" href="/index.php?page=products">PRODUCTS<i class="fa fa-caret-down"></i>
			</a>
			<div class = "dropdown-content">
				<a href="#1">Product no.1</a>
				<a href="#2">Product no.2</a>
				<a href="#3">Product no.3</a>
			</div>
		</div>
		<a class = "nav" id="contactstop" href="/index.php?page=contacts">CONTACTS</a>
		<div class="search_container">
			<form action="/search_engine.php">
				<input type="text" placeholder="Search..." name="search">
				<button type="submit"><i class="fa fa-search"></i></button>
			</form>
		</div>

		<?php
			if(isset($_SESSION['login_user'])) {
				switch ($_SESSION['user_role']) {
					case 0:
						echo '<a class = "nav" id="terminate" href="/index.php?page=terminate">TERMINATE <i class="fa fa-window-close-o"></i></a>';
						echo '<a class = "nav" id="add_product" href="/index.php?page=add-product">ADD PRODUCT</a>';
					break;
					case 1:
						echo '<a class = "nav" id="terminate" href="/index.php?page=terminate">TERMINATE <i class="fa fa-window-close-o"></i></a>';
						echo '<a class = "nav" id="add_product" href="/index.php?page=add-product">ADD PRODUCT</a>';
					break;
					default:
					break;
				}
			}
		?>

	</header>

	<?php
		if (isset($_GET['page'])) {
			$urlpage = $_GET['page'];
			switch ($urlpage) {
				case "home":
					include 'home.php';
					break;
				case "products":
					include 'products.php';
					break;
				case "latest":
					include 'latest.php';
					break;
				case "contacts":
					include 'contacts.php';
					break;
				case "login":
					include 'login.php';
					break;
				case "register":
					include 'register.php';
					break;
				case "forget":
					include 'forget.php';
					break;
				case "add-product":
					include 'add_product.php';
					break;
				case "terminate":
					include 'terminate.php';
					break;	
				default:
					include 'home.php';
					break;
			}
		}
		else {
			include 'home.php';
		}
	?>

	<footer>
		<p id="copyright">Copyright 2022 @QuocAnhNguyen</p>
	</footer>

</body>
</html>