<?
include_once "lib/config.php";

if(isset($_POST["UserName"]) && isset($_POST["Passcode"]))
{
	$UserName = mysqli_real_escape_string($cn, $_POST['UserName']);
	$Passcode = mysqli_real_escape_string($cn, $_POST['Passcode']);
	$EncPassword = sha1($Passcode);
	$res = mysqli_query($cn, "SELECT AdminID, UserName FROM admin WHERE UserName='$UserName' AND Passcode='$EncPassword'");
	if(mysqli_num_rows($res)>0)
	{
		$data = mysqli_fetch_array($res);
		session_start();
		$_SESSION["AdminLogged"] = 1;
		$_SESSION['AdminID'] = $data["AdminID"];
		$_SESSION['UserName'] = $data["UserName"];
		header("Location: admin/dashboard.php");
	}
	else
	{
		header("Location: admin_login.php?LoginFail=Invalid Credentials");
	}
}
else
{
	header("Location: admin_login.php?LoginFail=Invalid Credentials");
}

?>