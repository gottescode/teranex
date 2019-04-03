<?php
$status=$postData["status"];
$firstname=$postData["firstname"];
$amount=$postData["amount"];
$txnid=$postData["txnid"];

$posted_hash=$postData["hash"];
$key=$postData["key"];
$productinfo=$postData["productinfo"];
$email=$postData["email"];
$salt="4YWkTvpBIu";

// Salt should be same Post Request 

If (isset($postData["additionalCharges"])) {
       $additionalCharges=$postData["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
  } else {
        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
         }
		 $hash = hash("sha512", $retHashSeq);
  
       if ($hash != $posted_hash) {
	       $fail= "Invalid Transaction. Please try again";
		   } else {
         $fail = "<h3>Your order status is ". $status .".</h3>";
         $fail.= "<h4>Your transaction id for this transaction is ".$txnid.". </h4>";
		 } 
?>
 <div class="container-fluid gray-bg">
	<div class="col-sm-12 text-center"> 
		<div class="" style="padding: 40px 0;">
			<h1><span style="font-size: 80px;color: #ed1e24;"><i class="fa fa-exclamation-triangle"></i></span> <br/>Payment Fail</h1>
			<div class="row">
				<div class="col-sm-12 event_list">
					<?php echo $fail;?>
				</div>
			</div>
		</div>
		
	</div>
</div>