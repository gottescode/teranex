<?php session_start();
include("../lib/config.php");
   if(isset($_SESSION["CustomerLogged"]))
    {

		unset($_SESSION['CustomerID']);
		unset($_SESSION['CustomerEmail']);
		unset($_SESSION['CustomerMobileNo']);
		unset($_SESSION['CustomerCompany']);
				
		session_unset();
        session_destroy();
		
       	header("location:../sign_in.php");
        exit;
    }
    else{

    }
   
?>