<?php session_start();
include('header.php'); 
?>


<div class="container">
	
	
    <form class="form-signin" name="login" id="login" method="post" action="secure_login_admin.php">
	
    <img src="images/signin-logo.jpg" class="img-responsive">
        <h2 class="form-signin-heading">Admin Sign in</h2>
		
		<?
		if(isset($_GET['LoginFail']))
		{
			?>
			<div class="alert alert-danger"><? echo $_GET['LoginFail'];?></div>
			<?
		}
		?>
		
        <label for="inputEmail" class="sr-only">User Name</label>
        <input type="text" id="UserName" name="UserName" class="form-control" placeholder="User Name" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="Passcode" name="Passcode" class="form-control" placeholder="Password" required>
        <div class="text-center"><input type="submit" name="login" id="login" class="btn btn-default addmore-btn" value="Sign in" /></div>
        
      </form>
  </div><!-- container --> 

<?
include('footer.php'); 
?>
