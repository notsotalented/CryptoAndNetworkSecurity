<?php
   session_start();


   $host = "localhost";
   $user = "root";
   $password = "";
   $db_name = "login";
   $con = mysqli_connect($host, $user, $password, $db_name);

   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($con,"select username from login_info where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:index.php?page=login");
      die();
   }
?>