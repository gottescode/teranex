 
<div class="container">
	<div class="col-sm-offset-2 col-sm-8 enrollment">
		<center>
		  <h1>Book Appointment</h1>
		</center>
		<div class="col-sm-offset-1 col-sm-10 ">
		  <form class="form-horizontal" name="#" id="#" method="post" action="<?php echo site_url()."consultant/consultantAvailability/"?>">
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
				  <input type="text" class="form-control input-form" id="#" name="#" value="<?php echo $consultant_data['c_name']?>" readonly>
			  </div>
			  <div class="form-group ">
				  <input type="text" class="form-control input-form" id="#" name="#" value="<?php echo $consultant_data['c_qualification']?>" readonly>
			  </div>
			  <div class="form-group ">
				  <textarea type="text" class="form-control input-form" id="#" name="#" placeholder="Topic to Discuss" ></textarea>
			  </div>
			  <div class="form-group ">
				  <input type="text" class="form-control input-form" id="#" name="#" placeholder="Date Preference" >
			  </div>
			  <div class="form-group">
				  <input type="submit" name="btnAvailabilty" id="submit" class="btn input-form adv-search form-control" value="Submit Request" />
			  </div>
				<input type="hidden"  id="consultant_id" name="consultant_id" value="<?php echo $consultant_data['consultant_id']?>">
			</form>
		</div>
	</div>
</div>
 