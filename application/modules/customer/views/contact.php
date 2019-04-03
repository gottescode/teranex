 

<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Add Contact Details</li>
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
    <!-- <div class="col-sm-8 col-lg-10 padd-0">
      <ul>
        <li class="">Welcome <? echo $_SESSION['CustomerCompany'];?></li>
      </ul>
    </div>
    <div class="col-sm-4 col-lg-2 padd-0">
      <ul>
        <li class=""><a href="<?php echo site_url();?>">Go To My Teranex </a> |</li>
        <li class=""><a href="<?php echo site_url()."pages/logout";?>">Sign Out </a></li>
      </ul>
    </div> -->
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->
<div class="row margin_0" style="background-color: #353537;">
	<?php   $this->load->view("cust_side_menu" ); ?> 
	<div class=" bg_white"> 
		<div class="col-sm-9 col-md-9 col-lg-10">
		<div class="border_bot col-sm-offset-2 col-sm-8 col-xs-8" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;margin-top: 30px;">
			<form class="form" name="contact" id="contact_form" method="post" action="">
				<div class="form-group">
					<div class="col-sm-6">
						<input type="text" class="form_bor_bot lettersOnly" id="contact_person_name" name="contact_person_name" placeholder="Contact Person Name"  /><span class="compulsary">*</span>
					</div>
					<div class="col-sm-6">
						<input type="text" class="form_bor_bot" id="person_short_name" name="person_short_name" placeholder="Contact Person Short Name"  /><span class="compulsary">*</span>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="form-group">
					<div class="col-sm-6">
						<input type="text" class="form_bor_bot" id="person_designation" name="person_designation" placeholder="Contact Person Designation"  /><span class="compulsary">*</span>
					</div>
					<div class="col-sm-6">
						<input type="text" class="form_bor_bot" id="department" name="department" placeholder="Department"  /><span class="compulsary">*</span>
					</div>
				</div><div class="clearfix"></div>

				<div class="form-group">
					<div class="col-sm-6">
						<input type="text" class="form_bor_bot" id="email_id" name="email_id" placeholder="Email"  /><span class="compulsary">*</span>
					</div>
					<div class="col-sm-6">
						<input type="text" class="form_bor_bot numbersOnly" id="office_phone_no" name="office_phone_no" placeholder="Office Phone No"  />
					</div>
				</div><div class="clearfix"></div>
				<div class="form-group">
					<div class="col-sm-6">
						<input type="text" class="form_bor_bot" id="phone_ext" name="phone_ext" placeholder="Ext"  />
					</div>
					<div class="col-sm-6">
						<input type="text" class="form_bor_bot numbersOnly" id="mobile_no" name="mobile_no" placeholder="Mobile Number"  minlength="10" maxlength="10" /><span class="compulsary">*</span>
					</div>
				</div><div class="clearfix"></div><br/>
				<div class="form-group col-sm-12 col-xs-6">
				   <center><input type="submit" name="submit" id="submit" class="btn btn_orange" value="Add Contact" /></center>
				</div>
			</form>
		</div><div class="clearfix"></div><br/>
		
		<div class="">
			<?php
			if($customerContactList)
			{
			?>
				<table id='' class="table table-striped table-hover">
					<thead>
						<tr bgcolor="#CCCCCC"><td>S.No</td><td>Contact Person Name</td><td>Designation</td><td>Department</td><td>Email</td><td>Phone (Ext)</td><td>Mobile</td><td>Addition Date</td><td>Action</td></tr>
					</thead>
					<tbody>
							<?
							$SNo = 1;
							foreach($customerContactList as $rowData)
							{
								?>
								<tr>
									<td><? echo $SNo;?></td>
									<td><? echo $rowData['contact_person_name'];?></td>
									<td><? echo $rowData['person_designation'];?></td>
									<td><? echo $rowData['department'];?></td>
									<td><? echo $rowData['email_id'];?></td>
									<td><? echo $rowData['office_phone_no'];?> <? if($rowData['phone_ext']!="") echo "($data[phone_ext])";?></td>
									<td><? echo $rowData['mobile_no'];?></td>
									<td><? echo  date_dmy($rowData['update_date']);?></td>
									<td> <a href="<?php echo site_url()?>customer/contactUpdate/<?=$rowData[uc_id]?>"   >Edit</a> &nbsp; &nbsp; <a href="<?php echo site_url()?>customer/contactDelete/<?=$rowData[uc_id]?>"   >Delete</a></td>
								</tr>
								<?
								$SNo = $SNo + 1;
							}
						?>
					</tbody>
				</table>
			<?
			}
			?>
		</div><div class="clearfix"></div>
	</div><div class="clearfix"></div>
</div><div class="clearfix"></div>
</div>
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script language="javascript" type="text/javascript">
$(document).ready(function() {
$("#contact").submit(function(){
			
	if($("#Name").val() == "")
	{
		alert("Contact Name is required");
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
	
	var yesno = confirm("Are you sure to save");
	return yesno;
	});
});
</script>

<!-- <script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>  --> 
<script>  
	jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
jQuery('.lettersOnly').keyup(function () { 
    this.value = this.value.replace(/[^A-Za-z \.]/g,'');
});
jQuery.validator.addMethod("valEmail1", function(value, element) {
  return this.optional( element ) || /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test( value );
}, 'Please enter a valid email address');
$("#contact_form").validate({
   rules: {  
				contact_person_name:{
					required:true
				},
				person_short_name:{
					required:true
				},
				person_designation:{
					required:true
				},
				department:{
					required:true
				},
				email_id:{
					required:true,
					valEmail1:true
				},
				// office_phone_no:{
				// 	required:true
				// },
				mobile_no:{
					required:true
				},
			},
			messages: { 
				contact_person_name:{
					required:"Please enter contact person name"
				},
				person_short_name:{
					required:"Please enter short name"
				},
				person_designation:{
					required:"Please enter designation"
				},
				department:{
					required:"Please enter department"
				},
				email_id:{
					required:"Please enter email id"
				},
				office_phone_no:{
					required:"Please enter office phone number"
				},
				mobile_no:{
					required:"Please enter mobile number"
				},
			}
		}); 
		</script>
<?php $this->template->contentEnd();	?> 