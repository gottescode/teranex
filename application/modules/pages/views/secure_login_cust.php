<?
include_once "lib/config.php";

if(isset($_POST["Email"]) && isset($_POST["Passcode"]))
{
	$Email = mysqli_real_escape_string($cn, $_POST['Email']);
	$Passcode = mysqli_real_escape_string($cn, $_POST['Passcode']);
	$EncPassword = sha1($Passcode);
	$res = mysqli_query($cn, "SELECT CustomerID, Email, MobileNo, CompanyName FROM customer WHERE (Email='$Email' OR MobileNo='$Email') AND Passcode='$EncPassword'");
	if(mysqli_num_rows($res)>0)
	{
		$data = mysqli_fetch_array($res);
		session_start();
		$_SESSION["CustomerLogged"] = 1;
		$_SESSION['CustomerID'] = $data["CustomerID"];
		$_SESSION['CustomerEmail'] = $data["Email"];
		$_SESSION['CustomerMobileNo'] = $data["MobileNo"];
		$_SESSION['CustomerCompany'] = $data["CompanyName"];
		header("Location: customer/cust_profile.php");
	}
	else
	{
		header("Location: customer_registration.php?LoginFail=Invalid Credentials");
	}
}
else
{
	header("Location: customer_registration.php?LoginFail=Invalid Credentials");
}

?>