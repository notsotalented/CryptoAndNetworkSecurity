<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
		<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
		<link href="css/addons/datatables.min.css" rel="stylesheet">
		<script type="text/javascript" src="js/addons/datatables.min.js"></script>


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
<!--	<header id="header2">
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

	</header> -->


<script type="text/javascript">
        $(document).ready(function () {
            $("#search_box").keyup(function () {
                var query = $(this).val();
                if (query != "") {
                    $.ajax({
                        url: 'search_engine.php',
                        method: 'POST',
                        data: {
                            query: query
                        },
                        success: function (data) {
                            $('#search_result').html(data);
                            $('#search_result').css('display', 'block');
                            $("#	").focusout(function () {
                                $('#search_result').css('display', 'none');
                            });
                            $("#search_box").focusin(function () {
                                $('#search_result').css('display', 'block');
                            });
                        }
                    });
                } else {
                    $('#search_result').css('display', 'none');
                }
            });
        });
</script>

<div class = "header2">
	<nav id="nav_bar_on_top" class="navbar navbar-expand-sm" style="background-color: skyblue;">
	  <!-- Brand -->
	  <a id="home_button" class="navbar-brand" href="/index.php?page=home">HOME</a>

	  <!-- Links -->
	  <ul class="navbar-nav">
	    <li class="nav-item">
	      <a class="nav-link" href="/index.php?page=latest">LATEST</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" href="/index.php?page=contacts">CONTACTS</a>
	    </li>

	    <!-- Dropdown -->
	    <li class="nav-item dropdown">
	      <a class="nav-link dropdown-toggle" href="/index.php?page=products" id="navbardrop" data-toggle="dropdown">
	        PRODUCTS
	      </a>
	      <div id="drop_menu" class="dropdown-menu">
	        <a class="dropdown-item" href="/index.php?products=1">UN#1</a>
	        <a class="dropdown-item" href="/index.php?products=2">DEUX#2</a>
	        <a class="dropdown-item" href="/index.php?products=3">TROIS#3</a>
	        <div class="dropdown-divider"></div>
			<a class="dropdown-item" href="/index.php?page=products">#ALL</a>
	      </div>
	    </li>
	    <li  class="nav-item dropdown">
			<form class="form-inline" action="/search_engine.php">

				<div data-toggle="dropdown">
				
				<input id="search_box"  autocomplete="off" class="form-control mr-sm-2" type="text" placeholder="Search products...">

				</div>
				<div id="drop_menu" class="dropdown-menu">
				<div id="search_result"></div>
				</div>

				<button id="search_button" class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
			</form>
		</li>
		<?php
			if(isset($_SESSION['login_user'])) {
				switch ($_SESSION['user_role']) {
					case 0:
						echo '<li class="nav-item">';
						echo '<a id="manage" class="nav-link" href="/index.php?page=add-product">MANAGE ITEMS</a>';
						echo '</li>';
						echo '<li class="nav-item">';
						echo '<a id="terminate" class="nav-link" href="/index.php?page=terminate">TERMINATE <i class="fa fa-window-close-o"></i></a>';
						echo '</li>';
					break;
					case 1:
						echo '<li class="nav-item">';
						echo '<a id="manage" class="nav-link" href="/index.php?page=add-product">MANAGE ITEMS</a>';
						echo'</li>';
					break;
					default:
					break;
				}
			}
		?>
	  </ul>
	</nav>
</div>

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
		/*else {
			if(isset($_GET['products'])) {
				$products = $_GET['products'];
				echo "<script> alert('Not implemented yet') </script>";
			}
			else {
				include 'home.php';
			}		
		}*/
		elseif (isset($_GET['products'])) {
			//$products = $_GET['products'];
			echo "<script> alert('Not implemented yet');
					window.location.href='index.php';
				 </script>";
		}
		elseif (isset($_GET['products_id'])) {
			include 'product_showcase.php';
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