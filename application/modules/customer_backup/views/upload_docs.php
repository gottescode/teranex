 
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Update Company Docs</li>
      </ul>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->
<div class="welcome-j-bg">
  <div class="container">
    <div class="col-sm-8 col-lg-10 padd-0">
      <ul>
        <li class="">Welcome <? echo $_SESSION['CustomerCompany'];?></li>
      </ul>
    </div>
    <div class="col-sm-4 col-lg-2 padd-0">
      <ul>
        <li class=""><a href="<?php echo site_url();?>">Go To My Teranex </a> |</li>
        <li class=""><a href="<?php echo site_url()."pages/logout";?>">Sign Out </a></li>
      </ul>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.welcome-j-bg -->

<div class="row margin_0" style="background-color: #353537;">
	<?php   $this->load->view("cust_side_menu" ); ?> 
		<div class="bg_white">
			<div class="border_bot col-sm-offset-2 col-md-5 col-sm-5 col-xs-12 supplier-form" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;height: 550px;margin-top: 30px;"> 
				<form class="form" name="company" id="upload_doc_form" method="post" action="" enctype="multipart/form-data">
					<div class="form-group ">
						<label class="col-sm-6">Company Logo  </label>
						<input type="file" name="CompanyLogo" id="CompanyLogo" class="col-sm-6" value="<?=$customer_data['user_company_logo']?>" />
						<?php if($customer_data['user_company_logo']){ ?>
							<img src="<?php echo site_url()."uploads/customer/".$customer_data['user_company_logo']?>" width="100px" />
						<?php   }?>
					</div><div class="clearfix"></div><br/>
					<div class="form-group">
						<label class="col-sm-6">GSTIN </label>
						<input type="file" name="GSTINImg" id="GSTINImg" class="col-sm-6" />
						<?php if($customer_data['user_gst_image']){ ?>
							<img src="<?php echo site_url()."uploads/customer/".$customer_data['user_gst_image']?>" width="100px" />
						<?php   }?>
					</div><div class="clearfix"></div><br/>
					<div class="form-group">
						<label class="col-sm-6">PAN </label>
						<input type="file" name="PANImg" id="PANImg" class="col-sm-6" />
						<?php if($customer_data['user_pan_image']){ ?>
							<img src="<?php echo site_url()."uploads/customer/".$customer_data['user_pan_image']?>" width="100px" />
						<?php   }?>
					</div><div class="clearfix"></div><br/>
					<div class="form-group">
						<label class="col-sm-6">Company Incorporation Certificate </label>
						<input type="file" name="CompanyIncorp" id="CompanyIncorp" class="col-sm-6" />
						<?php if($customer_data['user_certificate']){ ?>
							<img src="<?php echo site_url()."uploads/customer/".$customer_data['user_certificate']?>" width="100px" />
						<?php   }?>
					</div><div class="clearfix"></div><br/>
					
					<div class="form-group col-sm-12 col-xs-6">
					   <center><input type="submit" name="btnDocument" id="submit" class="btn btn_orange" value="Update Company Docs" /></center>
					</div>
					<input type="hidden" name="old_gst"  value="<?php echo $customer_data['user_gst_image'];?>"/>
					<input type="hidden" name="old_pan"  value="<?php echo $customer_data['user_pan_image'];?>"/>
					<input type="hidden" name="old_logo"  value="<?php echo $customer_data['user_company_logo'];?>"/>
					<input type="hidden" name="old_certificate"  value="<?php echo $customer_data['user_certificate'];?>"/>
					<input type="hidden" name="old_user_profile"  value="<?php echo $customer_data['old_user_profile'];?>"/>
				</form>
			</div><div class="clearfix"></div>
		</div><div class="clearfix"></div>
</div><div class="clearfix"></div>
<!-- /.row --> 
	
 <?php $this->template->contentBegin(POS_BOTTOM);?>
<script language="javascript" type="text/javascript">
$(document).ready(function() {
/*$("#company").submit(function(){
			
	if($("#CompanyType").val() == "")
	{
		alert("Company Type is required");
		return false;
	}

	var yesno = confirm("Are you sure to save");
	return yesno;
	});*/
});
</script>

<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>  
<script>  
/* var CompanyLogo= '<?=$customer_data['user_company_logo']?>';
$("#upload_doc_form").validate({
   rules: {  
				CompanyLogo:{
					required:true
				},
				// GSTINImg:{
				// 	required:true
				// },
				// PANImg:{
				// 	required:true
				// },
				// CompanyIncorp:{
				// 	required:true
				// },
				userProfile:{
					required:true
				},
			},
			messages: { 
				CompanyLogo:{
					required:"Please select company logo"
				},
				// GSTINImg:{
				// 	required:"Please select GSTIN image"
				// },
				// PANImg:{
				// 	required:"Please select PAN image"
				// },
				// CompanyIncorp:{
				// 	required:"Please select Incorporation Certificate"
				// },
				userProfile:{
					required:"Please select user profile"
				},
			}
		});  */
		</script>
<?php echo $this->template->contentEnd();	?> 