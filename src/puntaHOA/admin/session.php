<?php
   include('../databaseconnect.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"select nombreAdmin from catalogoadministrativos where userAdmin = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row["nombreAdmin"];
   
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
      die();
   }
?>