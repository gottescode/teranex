<? 
include_once "lib/config.php";
$email = mysqli_real_escape_string($cn, $_POST['email']);

$res = mysqli_query($cn, "SELECT NewsletterID FROM newsletter WHERE Email='$email'");
if(mysqli_num_rows($res)>0)
{
	echo "AlreadyThere";
}
else
{
	$date_now = date('Y-m-d H:i:s');
	$query="insert into newsletter(Email, doe) values ('$Email', '$date_now')";
	$res=mysqli_query($cn, $query);
	if($res)
	{
		echo "Pass";
	}
	else
	{
		echo "Fail";
	}
}

?>
