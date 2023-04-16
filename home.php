<?php
	if(!isset($_SESSION['login_user'])){
		echo "Click on Login button to login and/or find register button";
		echo '<br>';
		echo '<br>';
		echo "Otherwise, check CONTACTS for all registered accounts and PRODUCTS->#ALL for all products";
		echo '<br>';
		echo '<br>';
		echo "LOGIN->Forgot password is for modifying existed accounts' password, require correct input of that account's role";
		echo '<br>';
		echo '<br>';
		echo "Please login to fully ultilize all features!";
		echo '<br>';
		echo '<br>';
		echo "ONLY FOR EDUCATION PURPOSE ALL INFO ARE SHOWN AND ONLY A HANDFUL OF RESTRICTIONS APPLIED IN METHODS (ADD-DELETE-...)!";
	}
	else {
		echo 'Log out button is at the same place as login button';
		echo '<br>';
		echo '<br>';
		echo "Otherwise, check CONTACTS for all registered accounts and PRODUCTS->#ALL for all products";
		echo '<br>';
		echo '<br>';
		echo "ROLE: 0-ADMIN-HIGHEST || 1-VENDOR-FEWER PRIVILLEDGES || 2-USER-ONLY SEE, CAN'T MODIFY";
		echo '<br>';
		echo "MANAGE ITEMS is for adding new items when logged in, only Role 0 and 1 can access this";
		echo '<br>';
		echo '<br>';
		echo "LOGIN->Forgot password is for modifying existed accounts' password, require correct input of that account's role";
		echo '<br>';
		echo '<br>';
		echo "TERMINATE is for deleting existed accounts when logged in, only Role 0 can access this";
		echo '<br>';
		echo '<br>';
		echo "ONLY FOR EDUCATION PURPOSE ALL INFO ARE SHOWN AND ONLY A HANDFUL OF RESTRICTIONS APPLIED IN METHODS (ADD-DELETE-...)!";
	}
?>