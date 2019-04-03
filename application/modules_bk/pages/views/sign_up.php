<?php $this->template->contentBegin(POS_TOP);?>
 <link href="multiple-select.css" rel="stylesheet"/>
 <?php echo $this->template->contentEnd();	?> 
<?php session_start();
include('header.php'); 
?>
 
<div class="container">

    <form class="form-signin" name="register" id="register" method="post" action="sign_up.php">
    <h2 class="sign-up-hdd">Welcome on Stelmac</h2>
	
	<?
	if(isset($_POST['submit']))
	{
		include_once "lib/config.php";
		
		$date_now = date('Y-m-d H:i:s');
		
		$Email = mysqli_real_escape_string($cn, $_POST['Email']);

		$MobileNo = mysqli_real_escape_string($cn, $_POST['MobileNo']);

		$Passcode = mysqli_real_escape_string($cn, $_POST['Passcode']);

		$RePasscode = mysqli_real_escape_string($cn, $_POST['RePasscode']);

		$SignupType = mysqli_real_escape_string($cn, $_POST['SignupType']);
		
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
				if($SignupType == "Supplier")
				{
					$EncPassword = sha1($Passcode);
					$query="insert into supplier(Email, MobileNo, Passcode, SignupType, doe, dou) values ('$Email', '$MobileNo', '$EncPassword', '$SignupType', '$date_now', '$date_now')";
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
				else
				{
					$EncPassword = sha1($Passcode);
					$query="insert into customer(Email, MobileNo, Passcode, SignupType, doe, dou) values ('$Email', '$MobileNo', '$EncPassword', '$SignupType', '$date_now', '$date_now')";
					$res=mysqli_query($cn, $query);
					if($res)
					{
						?>
							<div class="alert alert-success">Thanks. Customer registration done successfully. Your account will be active in short time.</div>
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
		}
		else
		{
			?>
				<div class="alert alert-danger">Password and re-typed password doesn't match</div>
			<?
		}
	}
	?>
	
        <h2 class="form-signin-heading">Sign up</h2>
        <label for="inputEmail" class="sr-only">Email ID</label>
        <input type="text" id="Email" name="Email" class="form-control" placeholder="Email ID" >
        <label for="inputEmail" class="sr-only">Mobile Number</label>
        <input type="text" id="MobileNo" name="MobileNo" class="form-control" placeholder="Mobile Number" >
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="Passcode" name="Passcode" class="form-control" placeholder="Password" >
        <label for="inputPassword" class="sr-only">Re-confirm password</label>
        <input type="password" id="RePasscode" name="RePasscode" class="form-control" placeholder="Re-confirm password" >
        <label for="inputEmail" class="sr-only">Customer / Supplier</label>
		
		<select multiple="multiple" class="form-control" id="SignupType" name="SignupType">
			<optgroup label="Customer">
				<option value="1">Option 1</option>
			</optgroup>
			<optgroup label="Supplier">
				<option value="9">Option 9</option>
			</optgroup>
		</select>
        
		<img src="lib/phpcaptcha/captcha.php?rand=<?php echo rand();?>" id='captchaimg'><br>
		<label for='message'>Enter the code above here :</label>
		<br>
		<input id="captcha_code" name="captcha_code" type="text">
		<br>
		Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh.
        
        <div class="checkbox">
          <label>
           <input tabindex="3" class="" name="remember" id="remember" type="checkbox">Newsletter
          </label>
        </div>
        <div class="checkbox">
          <label>
           <input tabindex="3" class="" name="remember" id="remember" type="checkbox">I accept privacy policy
          </label>
        </div>
        <div class="text-center"><input type="submit" name="submit" class="btn btn-default addmore-btn" value="Sign up"></div>
        <ul class="sign-up-orng">
        <li>Email ID will be used as user name for sign in.</li>
        <li>Notifications shall be Sent on the Email ID
       and Mobile Number </li>
        </ul>
          <div class="checkbox">
          <label>
             Difficulty signing in? <span><a href="contact.php">Write to us</a></span>
          </label>
        </div>
          
      </form>
  
</div><!-- container --> 

<?
include('footer.php'); 
?>
<?php $this->template->contentBegin(POS_BOTTOM);?>
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
		
	if($("#CustomerType").val() == "")
	{
		alert("Customer Type is required");
		return false;
	}
	
	var yesno = confirm("Are you sure to register");
	return yesno;
	});
});
</script>
  <script src="<?php echo $theme_url?>/js/multiple-select.js"></script>
    <script>	
        $('select').multipleSelect();
    </script>
<script type='text/javascript'>
function refreshCaptcha(){
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>
<?php echo $this->template->contentEnd();	?> 