<div class="container">
<center>
<h1>Join a Live Event</h1>
</center>
<div class="col-sm-offset-4 col-sm-4 ">
	<form class="form-horizontal enrollment" name="#" id="#" method="post" action="<?php echo site_url()."consultant/consultantAvailability/"?>">
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
		  <input type="text" class="form-control input-form" id="#" name="#" placeholder="Phone Number" >
	  </div>
	  <div class="form-group ">
		  <input type="text" class="form-control input-form" id="#" name="#" required>
		  <span class="placeholder" data-placeholder="Number of Participants"></span>
	  </div>
	  <div class="form-group ">
		  <input type="text" class="form-control input-form" id="#" name="#" >
	  </div>
	  <div class="form-group ">
		  <input type="text" class="form-control input-form" id="#" name="#" >
	  </div>
	  <div class="form-group ">
		  <input type="text" class="form-control input-form" id="#" name="#" >
	  </div>
	  <div class="form-group">
		  <input type="submit" name="btnAvailabilty" id="submit" class="btn input-form adv-search form-control" value="Submit" />
	  </div>
	</form>
</div>
</div>
<?php $this->template->contentBegin(POS_BOTTOM);?>

<?php echo $this->template->contentEnd();	?> 