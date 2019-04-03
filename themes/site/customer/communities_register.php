<?php session_start();

if(!isset($_SESSION["CustomerLogged"]) || $_SESSION["CustomerLogged"] == 0)
{
	header("Location: ../customer_registration.php");
}
include('../lib/config.php');
if(isset($_POST['register']))
{
	$doe = date('Y-m-d H:i:s');
	$Code = mysqli_real_escape_string($cn, $_POST["Code"]);
	$CommunityID = mysqli_real_escape_string($cn, $_POST["CommunityID"]);

	$qy_add6="select Code from community_invite where Email='$_SESSION[CustomerEmail]' and CommunityID='$CommunityID'";
	$qy_add7=mysqli_fetch_assoc(mysqli_query($cn, $qy_add6));
	
	if($qy_add7['Code'] == $Code)
	{
		$result1 = "INSERT INTO community_user (CommunityID, UserID, doe) VALUES ('$CommunityID', '$_SESSION[CustomerID]', '$doe')";
		$result2 = mysqli_query($cn, $result1);
		if($result2)
		{
			header("Location: show_communities.php?msg=Pass");
		}
		else
		{
			header("Location: show_communities.php?msg=Fail");
		}
	}
	else
	{
		header("Location: show_communities.php?msg=Fail");
	}
				
}
else
{
	header("Location: show_communities.php?msg=Fail");
}

?>
