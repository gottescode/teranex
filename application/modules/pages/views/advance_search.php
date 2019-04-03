<?php session_start();
include('header.php'); 
?>

<div class="container">
<center>
<h1>Advance Search</h1>
</center>
<div class="col-sm-offset-4 col-sm-4">
	<form class="form-horizontal" name="#" id="#" method="post" action="#">
	  <div class="form-group ">
		  <input type="text" class="form-control input-form" id="#" name="#" placeholder="Keywords">
	  </div>
	  <div class="form-group">
			<select name="Country" id="Country" class="form-control input-form">
				<option value="">Consultancy Type</option>
				<option value="A">A</option>
				<option value="B">B</option>
			</select>
	  </div>
	  <div class="form-group">
			<select name="Country" id="Country" class="form-control input-form">
				<option value="">Consultant Qualification</option>
				<option value="A">A</option>
				<option value="B">B</option>
			</select>
	  </div>
	  <div class="form-group">
			<select name="Country" id="Country" class="form-control input-form">
				<option value="">Years of Experience</option>
				<option value="A">A</option>
				<option value="B">B</option>
			</select>
	  </div>
	  <div class="form-group">
			<select name="#" id="#" class="form-control input-form">
				<option value="">Language</option>
				<option value="A">A</option>
				<option value="B">B</option>
			</select>
	  </div>
	  <div class="form-group">
			<select name="#" id="#" class="form-control input-form">
				<option value="">Rate</option>
				<option value="A">A</option>
				<option value="B">B</option>
			</select>
	  </div> 
	  <div class="form-group">
		  <input type="submit" name="submit" id="submit" class="btn input-form adv-search form-control" value="Submit" />
	  </div>
	</form>
</div>
</div>

<?php
include('footer.php'); 
?>

