<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Accept Request</li>
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
        <li class="">Welcome  </li>
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
<!-- /.welcome-j-bg -->
<div class="clearfix"></div>
<div class="row margin_0" style="background-color: #353537;">
	   <?php   $this->load->view("cust_side_menu" ); ?> 
    <div class="bg_white">
      <div class="col-sm-9 col-md-9 col-lg-10">
	  <div class="clearfix"></div>
			<?php 	// display messages
				if(hasFlash("dataMsgSuccess"))	{	?>
						<br><div class="alert alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <?php echo getFlash("dataMsgSuccess"); ?>
					</div>
			<?php	}	?>	
			<?php 	// display messages
				if(hasFlash("dataMsgError"))	{	?>
						<br><div class="alert alert-warning alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <?php echo getFlash("dataMsgError"); ?>
					</div>
			<?php	}	?>
      	<div class="border_bot col-sm-offset-3 col-md-4 col-sm-4 col-xs-12 supplier-form" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;"> 
      		<form class="form" name="sendQuotation" id="sendQuotation" method="post" action="">
      			<div class="form-group">
      				<input type="text" class="form_bor_bot" id="supplier_comments" name="supplier_comments" placeholder="Enter Comment" value=""  /><span class="compulsary">*</span>
      			</div><div class="clearfix"></div>
      		
      			<div class="form-group">
      			   <center><input type="submit" name="btnSubmit" id="submit" class="btn btn_orange" value="Accept" /></center>
      			   <center><input type="hidden" name="id" id="id" value="<?php echo $id;?>" /></center>
      			</div>
      		</form>
      	</div>
      </div><div class="clearfix"></div>
    </div><div class="clearfix"></div>
</div>
	<!-- /.row --> 
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script language="javascript" type="text/javascript">


$(document).ready(function() {
$("#sendQuotation").submit(function(){
	var yesno = confirm("Are you sure to save");
	return yesno;
	});
});

$(document).ready(function () {
 	$("#sendQuotation").validate({ 
            rules: {   
				supplier_amount:{
                	required: true
                },
            },
			messages: { 
				supplier_amount:{
                	required: "Please enter Old Password"
                }, 
	      }); 
	}); 
</script>
<?php echo $this->template->contentEnd();	?> 