<?php session_start();

if(!isset($_SESSION["CustomerLogged"]) || $_SESSION["CustomerLogged"] == 0)
{
	header("Location: ../customer_registration.php");
}
include('../lib/config.php');

if(isset($_GET['RFQID']))
{
	$RFQID = mysqli_real_escape_string($cn, $_GET["RFQID"]);
	$result1 = "UPDATE rfq SET SubmitStat='1' WHERE RFQID='$RFQID'";
	$result2 = mysqli_query($cn, $result1);
	if($result2)
	{
		header("Location: create_rfq.php?submit_stat=success");
	}
	else
	{
		header("Location: create_rfq.php?submit_stat=fail");
	}
}

?>