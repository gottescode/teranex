 
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4">
      <ul>
        <li class="myprofile">Update Proile Details</li>
      </ul>
    </div>
    <div class="col-sm-8 padd-0">
  	<ul>
    	<li class="" style="float: right;margin: 6px 0;"><a href="<?php echo site_url();?>">Go To My Stelmac </a></li>
  	</ul>
</div>
  </div>
  <!-- /.container --> 
</div>
<div class="welcome-j-bg">
  <div class="container">
    <!-- <div class="col-sm-8 col-lg-10">
      <ul>
        <li class="">Welcome  </li>
      </ul>
    </div>
    <div class="col-sm-4 col-lg-2">
      <ul>
        <li class=""><a href="#">Go To My Teranex </a> |</li>
        <li class=""><a href="<?php echo site_url()."pages/logout";?>">Sign Out </a></li>
      </ul>
    </div> -->
  </div>
  <!-- /.container --> 
</div>
<!-- /.welcome-j-bg -->


  <div class=" row-flex">
		<?php   $this->load->view("cust_side_menu" ); ?> 
	<div class="col-sm-9 col-md-9 col-lg-10">
		<div class="border_bot col-md-12 col-sm-12 col-xs-12 supplier-form" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;height: ;">   
			<form class="form" name="editprofile" id="editprofile" method="post" action="">
				<div class="form-group">
					<div class="col-sm-6">
						<input type="text" class="form_bor_bot" id="u_name" name="u_name" placeholder="Full Name" value="<?php echo $customer_data['u_name']?>"  /><span class="compulsary">*</span>
					</div>
					<div class="col-sm-6">
						<input type="text" class="form_bor_bot " id="datepicker" name="birthdate" placeholder="yyyy-mm-dd" value="<?php echo $customer_data['u_date_birth']?>" /><span class="compulsary">*</span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<input type="text" class="form_bor_bot " id="language" name="language" placeholder="Language" value="<?php echo $customer_data['language']?>"  /><span class="compulsary">*</span>
					</div>
					<div class="col-sm-6">
						<input type="text" class="form_bor_bot numbersOnly" id="u_mobileno" name="u_mobileno" placeholder="Mobile number" minlength="10" maxlength="10" value="<?php echo $customer_data['u_mobileno']?>" /><span class="compulsary">*</span>
					</div>
				</div>
			 	<div class="clearfix"></div>
			 	<div class="form-group">
			 		<div class="col-sm-6">
						<input type="email" class="form_bor_bot " id="u_email" name="u_email" placeholder="Email" value="<?php echo $customer_data['u_email']?>"/><span class="compulsary">*</span>
					</div>
				 	<div class="col-sm-6">
						<input type="text" class="form_bor_bot " id="c_work_experiance" name="c_work_experiance" placeholder="Work Experince" value="<?php echo $customer_data['c_work_experiance']?>"/> 
					</div>
				</div>
			 	<div class="clearfix"></div>
			 	<div class="form-group">
			 		<div class="col-sm-12">
			 		<h5>Specific Interests</h5>
					<div class="col-sm-6 padd-0">
						<div class="form-group checkbox profile-checkbox-label">
						  <label><input type="checkbox" value="">Machines</label>
						</div>
						<div class="form-group checkbox profile-checkbox-label">
						  <label><input type="checkbox" value="">Spare Parts</label>
						</div>
						<div class="form-group checkbox profile-checkbox-label">
						  <label><input type="checkbox" value="">Toolings</label>
						</div>
						<div class="form-group checkbox profile-checkbox-label">
						  <label><input type="checkbox" value="">Contract Manufacturing</label>
						</div>
						<div class="form-group checkbox profile-checkbox-label">
						  <label><input type="checkbox" value="">Excess capacity Utilization</label>
						</div>
						<div class="form-group checkbox profile-checkbox-label">
						  <label><input type="checkbox" value="">Group Buying</label>
						</div>
					</div>
					<div class="col-sm-6 padd-0">
						<div class="form-group checkbox profile-checkbox-label">
						  <label><input type="checkbox" value="">Programming</label>
						</div>
						<div class="form-group checkbox profile-checkbox-label">
						  <label><input type="checkbox" value="">Service Support</label>
						</div>
						<div class="form-group checkbox profile-checkbox-label">
						  <label><input type="checkbox" value="">Application Support</label>
						</div>
						<div class="form-group checkbox profile-checkbox-label">
						  <label><input type="checkbox" value="">Live Training</label>
						</div>
						<div class="form-group checkbox profile-checkbox-label">
						  <label><input type="checkbox" value="">Live Event</label>
						</div>
						<div class="form-group checkbox profile-checkbox-label">
						  <label><input type="checkbox" value="">Consulting</label>
						</div>
					</div>
					</div>
				</div>
			 	<div class="clearfix"></div><br/>
				<div class="form-group">
				   <center><input type="submit" name="btnUpdate" id="submit" class="btn btn-default submit-btn" value="Update Profile Details" /></center>
				</div>
			</form>
		</div><div class="clearfix"></div>

	</div><div class="clearfix"></div><br/>
</div>
 <?php $this->template->contentBegin(POS_BOTTOM);?>
  
 <script type="text/javascript">
 	 $(function() {
               $("#datepicker").datepicker({ dateFormat: "yy-mm-dd", maxDate: 0,changeYear: true,yearRange: "-70:+0" }).val()
       });
 </script>

<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>  
<script>  
jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
jQuery('.lettersOnly').keyup(function () { 
    this.value = this.value.replace(/[^A-Za-z\.]/g,'');
});
jQuery('.alphaNumeric').keyup(function () { 
    this.value = this.value.replace(/[^A-Za-z0-9\.]/g,'');
});
jQuery.validator.addMethod("valEmail", function(value, element) {
  return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test( value );
}, 'Please enter a valid email address');
$("#editprofile").validate({
   rules: {  
				u_name:{
					required:true
				},
				birthdate:{
					required:true
				},
				language:{
					required:true
				},
				u_mobileno:{
					required:true
				},
				u_email:{
					required:true,
					valEmail:true
				},
			},
			messages: { 
				u_name:{
					required:"Please enter full number"
				},
				birthdate:{
					required:"Please select birth date"
				},
				language:{
					required:"Please enter language"
				},
				mobile_no:{
					required:"Please enter mobile number"
				},
				u_email:{
					required:"Please enter email id"
				},
			}
		}); 
		</script>
<?php echo $this->template->contentEnd();	?> 