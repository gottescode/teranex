<?php session_start();

if(!isset($_SESSION["CustomerLogged"]) || $_SESSION["CustomerLogged"] == 0)
{
	header("Location: ../customer_registration.php");
}
include('../lib/config.php');
if(isset($_POST['submit']))
{
	$doe = date('Y-m-d H:i:s');
	$CommunityID = mysqli_real_escape_string($cn, $_POST["CommunityID"]);
	$Email = mysqli_real_escape_string($cn, $_POST["Email"]);
	
	// Email content --------------

	/*$subject = "Invite to join community on Teranex";
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= "Reply-To:<info@teranex.co>\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From:Admin<info@teranex.co>' . "\r\n";*/
	
	//-----------------------------------------
	
		
	$Email1=explode(',', $Email);
	for ($i = 0; $i < count($Email1); $i++) 
	{
		$chars2 = explode(',','0,1,2,3,4,5,6,7,8,9');
		$random2 = "";
		
		for($j=0; $j<6;$j++)  
		{
			$random2.=$chars2[mt_rand(0,count($chars2)-1)];
		}
	
		if($Email1[$i] != "")
		{
			//$to  = $Email1[$i];
			//$msg1 ="Your code for joining the community on Teranex is $random2. You are required to register first at teranex.co and then proceed to forum section.";
			//mail($to, $subject, $msg1, $headers);
			
			$result1 = "INSERT INTO community_invite (CommunityID, Email, Code, doe) VALUES ('$CommunityID', '$Email1[$i]', '$random2', '$doe')";
			$result2 = mysqli_query($cn, $result1);
		}
	}
	header("Location: show_communities.php?msg_invite=Pass");
}	

?>
