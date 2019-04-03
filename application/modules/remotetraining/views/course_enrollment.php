
<div class="container">
<div class="col-sm-offset-4 col-sm-4 enrollment">
<center>
<h1>Course Enrollment</h1>
</center>
	<form class="form-horizontal" name="#" id="course_enroll_form" method="post" action="<?php echo site_url()."payment"?>">
	  <div class="form-group ">
		  <input type="text" class="form-control input-form lettersOnly" id="firstname" name="firstname" required>
		  <span class="placeholder" data-placeholder="First Name"></span>
	  </div>
	  <div class="form-group ">
		  <input type="text" class="form-control input-form lettersOnly" id="lastname" name="lastname" required>
		  <span class="placeholder" data-placeholder="Last Name"></span>
	  </div>
	  <div class="form-group ">
		  <input type="text" class="form-control input-form" id="company_name" name="company_name" required>
		  <span class="placeholder" data-placeholder="Company Name"></span>
	  </div>
	  <div class="form-group ">
		  <input type="email" class="form-control input-form" id="email" name="email" required>
		  <span class="placeholder" data-placeholder="Email Address"></span>
	  </div>
	  <div class="form-group ">
		  <input type="text" class="form-control input-form numbersOnly" id="phone" name="phone" minlength="10" maxlength="10"required>
		  <span class="placeholder" data-placeholder="Phone Number"></span>
	  </div>
	  <div class="form-group ">
		  <input type="text" class="form-control input-form numbersOnly" id="participant_no" name="participant_no" required>
		  <span class="placeholder" data-placeholder="Number of Participants"></span>
	  </div>
	  <div class="form-group ">
		  <input type="text" class="form-control input-form" id="#" name="#" value="<?php echo $course_data['date']?>" readonly>
	  </div>
	  <div class="form-group ">
		  <input type="text" class="form-control input-form" id="#" name="#" value="CaD" readonly> 
	  </div>
	  <div class="form-group ">
		  <input type="text" class="form-control input-form" id="#" name="#" value="<?php echo $course_data['name']?>" readonly>
	  </div>
	  <div class="form-group ">
		  <input type="text" class="form-control input-form" id="#" name="#" value="<?php echo $course_data['course_level']?>" readonly> 
	  </div>
	  <div class="form-group">
		  <input type="submit" name="btnAvailabilty" id="submit" class="btn input-form adv-search form-control" value="Go to Payment" />
	  </div>
	</form>
</div>
</div>
 
 <?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>  
<script>  
jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
jQuery('.lettersOnly').keyup(function () { 
    this.value = this.value.replace(/[^A-Za-z\.]/g,'');
});
jQuery.validator.addMethod("valEmail", function(value, element) {
  return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test( value );
}, 'Please enter a valid email address');
$("#course_enroll_form").validate({
   rules: {  
				firstname:{
					required:true
				},
				lastname:{
					required:true
				},
				company_name:{
					required:true
				},
				email:{
					required:true,
					valEmail:true
				},
				phone:{
					required:true
				},
				participant_no:{
					required:true
				},
			},
			messages: { 
				firstname:{
					required:"Please enter first name"
				},
				lastname:{
					required:"Please enter last name"
				},
				company_name:{
					required:"Please enter company name"
				},
				email:{
					required:"Please enter email id"
				},
				phone:{
					required:"Please enter phone number"
				},
				participant_no:{
					required:"Please enter number of participants"
				},
			}
		}); 
</script>
		
		<?php echo $this->template->contentEnd();	?> 