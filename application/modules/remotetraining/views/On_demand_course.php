<div class="container">
<div class="col-sm-offset-4 col-sm-4 enrollment">
	<center><h1>On-Demand Course</h1></center>
	<form class="form-horizontal" name="#" id="#" method="post" action="<?php echo site_url()."consultant/consultantAvailability/"?>">
	  <div class="form-group ">
		  <input type="text" class="form-control input-form" id="#" name="#" required>
		  <span class="placeholder" data-placeholder="First Name"></span>
	  </div>
	  <div class="form-group ">
		  <input type="text" class="form-control input-form" id="#" name="#" required>
		  <span class="placeholder" data-placeholder="Last Name"></span>
	  </div>
	  <div class="form-group ">
		  <input type="text" class="form-control input-form" id="#" name="#" required>
		  <span class="placeholder" data-placeholder="Company Name"></span>
	  </div>
	  <div class="form-group ">
		  <input type="email" class="form-control input-form" id="#" name="#" required>
		  <span class="placeholder" data-placeholder="Email Address"></span>
	  </div>
	  <div class="form-group ">
		  <input type="text" class="form-control input-form" id="#" name="#" required>
		  <span class="placeholder" data-placeholder="Phone Number"></span>
	  </div>
	  <div class="form-group ">
		  <input type="text" class="form-control input-form" id="#" name="#" required>
		  <span class="placeholder" data-placeholder="Number of Participants"></span>
	  </div>
	  <div class="form-group ">
		  <select class="form-control" id="#" name="#">
			<option value="">Topic</option>
			<option value="">CAD/CAM </option>
			<option value="">Machine Operation</option>
			<option value="">Maintenance</option>
		</select>
	  </div>
	  <div class="form-group ">
		  <select class="form-control" id="#" name="#">
			<option value="">Subject</option>
			<option value="">TruTops 2000 </option>
			<option value="">TruLaser 2000</option>
		</select>
	  </div>
	  <div class="form-group ">
		  <select class="form-control" id="#" name="#">
			<option value="">Level</option>
			<option value="">Beginner </option>
			<option value="">Intermediate</option>
			<option value="">Advanced</option>
		</select>
	  </div>
	  <div class="form-group ">
		  <input type='text' class="form-control" id='datepicker'  placeholder="Date Preference"/>
	  </div>
	  <div class="form-group">
		  <input type="submit" name="btnAvailabilty" id="submit" class="btn input-form adv-search form-control" value="Submit Request" />
	  </div>
	</form>
</div>
</div>
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php echo $this->template->contentEnd();	?> 