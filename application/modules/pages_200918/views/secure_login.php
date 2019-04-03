<?
include_once "lib/config.php";

if(isset($_POST["Email"]) && isset($_POST["Passcode"]) && isset($_POST["SigninType"]))
{
	$Email = mysqli_real_escape_string($cn, $_POST['Email']);
	$Passcode = mysqli_real_escape_string($cn, $_POST['Passcode']);
	$SigninType = mysqli_real_escape_string($cn, $_POST['SigninType']);
	$EncPassword = md5($Passcode);
	
	if($SigninType == "Supplier")
	{
	 	$res = mysqli_query($cn, " SELECT SupplierID, Email, MobileNo, CompanyName FROM supplier WHERE Email='jatinder@test.com'   AND Passcode='21232f297a57a5a743894a0e4a801fc3' ");
	
		if(mysqli_num_rows($res)>0)
		{
			$data = mysqli_fetch_array($res);
			session_start();
			$_SESSION["SupplierLogged"] = 1;
			$_SESSION['SupplierID'] = $data["SupplierID"];
			$_SESSION['SupplierEmail'] = $data["Email"];
			$_SESSION['SupplierMobileNo'] = $data["MobileNo"];
			$_SESSION['SupplierCompany'] = $data["CompanyName"];
			header("Location: supplier/supp_profile.php");
		}
		else
		{
			header("Location: sign_in.php?LoginFail=Invalid Credentials");
		}
		exit;
	}
	if($SigninType == "Programmer")
	{
		$res = mysqli_query($cn, "SELECT ProgrammerID, ProgEmail, ProgMobile  FROM programmer WHERE  ProgEmail='programmer@test.com'  AND Passcode='21232f297a57a5a743894a0e4a801fc3'");
		if(mysqli_num_rows($res)>0)
		{
			$data = mysqli_fetch_array($res);
			session_start();
			$_SESSION["ProgLogged"] = 1;
			$_SESSION['ProgrammerID'] = $data["ProgrammerID"];
			$_SESSION['ProgEmail'] = $data["ProgEmail"];
			$_SESSION['ProgMobile'] = $data["ProgMobile"];
			header("Location: programmer/prog_profile.php");
		}
		else
		{
			header("Location: sign_in.php?LoginFail=Invalid Credentials");
		}
	}
	else
	{
		$res = mysqli_query($cn, "SELECT CustomerID, Email, MobileNo, CompanyName FROM customer WHERE Email='vaibhav@test.com' AND Passcode='21232f297a57a5a743894a0e4a801fc3'");
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
			header("Location: sign_in.php?LoginFail=Invalid Credentials");
		}
	}
}
else
{
	header("Location: sign_in.php?LoginFail=Invalid Credentials");
}

?>