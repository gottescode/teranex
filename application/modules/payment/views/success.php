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
	       echo "Invalid Transaction. Please try again.";
		   } else {

        ?>
<div class="col-sm-12 text-center">
  <div class="" style="padding: 40px 0;">
      <h1><span style="font-size: 80px;color: #4fc650;"><i class="fa fa-check-circle"></i></span> <br/>Payment Success</h1>
      <div class="row">
        <div class="col-sm-12 event_list">
          <?
          echo "<h3>Thank You. Your order status is ". $status .".</h3>";
          echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
          echo "<h4>We have received a payment of Rs. " . $amount . ". </h4>";
       ?>
        </div>
      </div>
    </div>
</div>
        
     <? }
?>	
