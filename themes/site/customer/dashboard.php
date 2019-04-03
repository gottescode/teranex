<?php session_start();

if(!isset($_SESSION["CustomerLogged"]) || $_SESSION["CustomerLogged"] == 0)
{
	header("Location: ../customer_registration.php");
}
include('../lib/config.php');
include('cust_header.php'); 
include('cust_side_menu.php'); 
?>


<div class="col-xs-12 col-sm-9 col-md-9 col-lg-10">
      <div class="contact-right-text">
        <p>Dashboard<br>
          <br>
        </p>
      </div>
    </div>
    <!-- /.col-sm-6 col-lg-6 col-lg-offset-1--> 
  </div>
  <!-- /.row --> 
  
</div>
<!-- /.container -->
<?
include('cust_footer.php'); 
?>
