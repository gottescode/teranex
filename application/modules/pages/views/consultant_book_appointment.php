<?php session_start();
include('header.php'); 
?>

<div class="container">
<center>
<h1>Book Appointment</h1>
</center>
<div class="col-sm-offset-4 col-sm-4">
	<form class="form-horizontal" name="#" id="#" method="post" action="#">
	  <div class="form-group ">
		  <input type="text" class="form-control input-form" id="#" name="#" placeholder="First Name" required>
	  </div>
	  <div class="form-group ">
		  <input type="text" class="form-control input-form" id="#" name="#" placeholder="Last Name" required>
	  </div>
	  <div class="form-group ">
		  <input type="text" class="form-control input-form" id="#" name="#" placeholder="Company Name" required>
	  </div>
	  <div class="form-group ">
		  <input type="email" class="form-control input-form" id="#" name="#" placeholder="Email Address" required>
	  </div>
	  <div class="form-group ">
		  <input type="text" class="form-control input-form" id="#" name="#" placeholder="Phone Number" required>
	  </div>
	  <div class="form-group ">
		  <input type="text" class="form-control input-form" id="#" name="#" placeholder="Joshua Devons" required>
	  </div>
	  <div class="form-group ">
		  <input type="text" class="form-control input-form" id="#" name="#" placeholder="Management Consultant" required>
	  </div>
	  <div class="form-group ">
		  <textarea type="text" class="form-control input-form" id="#" name="#" placeholder="Topic to Discuss" ></textarea>
	  </div>
	  <div class="form-group ">
		  <input type="text" class="form-control input-form" id="#" name="#" placeholder="Date Preference" >
	  </div>
	  <div class="form-group">
		  <input type="submit" name="submit" id="submit" class="btn input-form adv-search form-control" value="Submit Request" />
	  </div>
	</form>
</div>
</div>

<?php
include('footer.php'); 
?>

