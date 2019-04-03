<?php session_start();
include('header.php'); 
?>


<div class="container section-pad">

<div class="col-sm-6">

<h3>Supplier Registration</h3>
	<?
	if(isset($_POST['submit']))
	{
		include_once "lib/config.php";
		
		$date_now = date('Y-m-d H:i:s');
		
		$Email = mysqli_real_escape_string($cn, $_POST['Email']);

		$MobileNo = mysqli_real_escape_string($cn, $_POST['MobileNo']);

		$Passcode = mysqli_real_escape_string($cn, $_POST['Passcode']);

		$RePasscode = mysqli_real_escape_string($cn, $_POST['RePasscode']);

		$SupplierType = mysqli_real_escape_string($cn, $_POST['SupplierType']);
		
		if($Passcode == $RePasscode)
		{
			if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0)
			{  
				?>
					<div class="alert alert-danger">The captcha validation failed.</div>
				<?		
			}
			else
			{	
				$EncPassword = sha1($Passcode);
				$query="insert into supplier(Email, MobileNo, Passcode, SupplierType, doe, dou) values ('$Email', '$MobileNo', '$EncPassword', '$SupplierType', '$date_now', '$date_now')";
				$res=mysqli_query($cn, $query);
				if($res)
				{
					?>
						<div class="alert alert-success">Thanks. Supplier registration done successfully. Your account will be active in short time.</div>
					<?
				}
				else
				{
					?>
						<div class="alert alert-danger">There was some problem. Please try again.</div>
					<?
				}
			}
		}
		else
		{
			?>
				<div class="alert alert-danger">Password and re-typed password doesn't match</div>
			<?
		}
	}
	?>
	<form name="register" id="register" method="post" action="supplier_registration.php">
		<div class="form-group">
    		<input type="text" class="form-control" id="Email" name="Email" placeholder="Email ID (Required if mobile no not given)">
  		</div>
		<div class="form-group">
    		<input type="text" class="form-control" id="MobileNo" name="MobileNo" placeholder="Mobile No (Required if email id not given)">
  		</div>
		<div class="form-group">
    		<input type="password" class="form-control" id="Passcode" name="Passcode" placeholder="Password (Required)">
  		</div>
		<div class="form-group">
    		<input type="password" class="form-control" id="RePasscode" name="RePasscode" placeholder="Re enter Password">
  		</div>
		<div class="form-group">
    		<select class="form-control" id="SupplierType" name="SupplierType">
				<option value="">Select Supplier Type (Required)</option>
				<option value="A">A</option>
				<option value="B">B</option>
			</select>
  		</div>
		<div class="form-group">
		  	<img src="lib/phpcaptcha/captcha.php?rand=<?php echo rand();?>" id='captchaimg'><br>
			<label for='message'>Enter the code above here :</label>
			<br>
			<input id="captcha_code" name="captcha_code" type="text">
			<br>
			Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh.
		</div>
  		<input type="submit" name="submit" id="submit" class="btn btn-default" value="Register" />
  	</form>

</div>
<div class="col-sm-6">

<h3>Supplier Sign In</h3>
	<?
	if(isset($_GET['LoginFail']))
	{
		?>
		<div class="alert alert-danger"><? echo $_GET['LoginFail'];?></div>
		<?
	}
	?>
	
	<form class="form-signin" name="login" id="login" method="post" action="secure_login.php">
		<div class="form-group">
    		<input type="text" class="form-control" id="Email" name="Email" placeholder="Email ID or Mobile No">
  		</div>
		<div class="form-group">
    		<input type="password" class="form-control" id="Passcode" name="Passcode" placeholder="Password">
  		</div>
	
  		<input type="submit" name="login" id="login" class="btn btn-default" value="Sign in" />
  	</form>
	
</div>

</div>

</div>

<?
include('footer.php'); 
?>

<script language="javascript" type="text/javascript">
$(document).ready(function() {
$("#register").submit(function(){
			
	if($("#Email").val() == "" && $("#MobileNo").val() == "")
	{
		alert("Email or Mobile No. is required");
		return false;
	}
	if($("#Email").val() != "")
	{
		var b = $("#Email").val();
		var atpos=b.indexOf("@");
		var dotpos=b.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=b.length)
		{
		  alert("Not a valid e-mail address");
		  return false;
		}
	}
	if($("#MobileNo").val() != "")
	{
		var check_mobile = $("#MobileNo").val();
		var expression = /\D/;
		if(expression.test(check_this))
		{
			alert("Contact number should be in digits only");
		}
	}

	if($("#Passcode").val() == "")
	{
		alert("Password cannot be empty");
		return false;
	}
		
	if($("#SupplierType").val() == "")
	{
		alert("Supplier Type is required");
		return false;
	}
	
	var yesno = confirm("Are you sure to register");
	return yesno;
	});
});
</script>
<script type='text/javascript'>
function refreshCaptcha(){
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>