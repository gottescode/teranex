<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Laser Processing Quotation Details</li>
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
<!-- /.myprofile-bg dahboard-bg -->
<div class="welcome-j-bg">
  <div class="container">
  </div>
  <!-- /.container --> 
</div>
<!-- /.welcome-j-bg -->
<div class="row margin_0" style="background-color: #353537;">
<?php   $this->load->view("cust_side_menu" ); ?> 
	<div class="bg_white">
		<div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">  
				<?php 	// display messages
					if(hasFlash("dataMsgAddError"))	{	?>
						<div class="alert alert-warning alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <?php echo getFlash("dataMsgAddError"); ?>
						</div>
				<?php }	?>
			<div class="border_bot col-sm-offset-3 col-md-4 col-sm-4 col-xs-12" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;"> 
				<form class="form" name="qoutationAdd" id="qoutationAdd" method="post" action="" enctype="multipart/form-data">

					<div class="form-group">
					<label>Part Description :</label>
					<input type="text" class="form_bor_bot numbersOnly" id="part_description" name="part_description" placeholder="Part Description"   value="<?php echo $result['part_description']?>"readonly/>
					</div>

					<div class="form-group">
					<label>Quote Quantity :</label>
					<input type="text" class="form_bor_bot numbersOnly" id="quote_quantity" name="quote_quantity" placeholder="Quote Quantity"   value="<?php echo $result['quote_quantity']?>"readonly/>
					</div>
					
					<div class="form-group">
					<label>Supplier Invite :</label>
					<input type="text" class="form_bor_bot numbersOnly" id="invite_supplier" name="invite_supplier" placeholder="Supplier Invite"   value="<?php echo $result['invite_supplier']?>"readonly/>
					</div>
					
					<div class="form-group">
					<label>Delivery Address :</label>
					<input type="text" class="form_bor_bot numbersOnly" id="delivery_address" name="delivery_address" placeholder="Delivery Address"   value="<?php echo $result['delivery_address']?>"readonly/>
					</div>

					<div class="form-group">
					<label>Quotation Needed By :</label>
					<input type="text" class="form_bor_bot numbersOnly" id="quotes_needed_by" name="quotes_needed_by" placeholder="Quotation Needed By"   value="<?php echo $result['quotes_needed_by']?>"readonly/>
					</div>

					<div class="form-group">
					<label>Work Will Awarded :</label>
					<input type="text" class="form_bor_bot numbersOnly" id="work_will_awarded" name="work_will_awarded" placeholder="Work Will Awarded"   value="<?php echo $result['work_will_awarded']?>"readonly/>
					</div>

					<div class="form-group">
					<label>Programm Needed :</label>
					<input type="text" class="form_bor_bot" id="program_needed" name="program_needed" placeholder="Programm Needed"   value="<?php echo $result['program_needed']?>" readonly/>
					</div>

					<div class="form-group">
					<label>Requested Date & Time :</label>
					<input type="text" class="form_bor_bot numbersOnly" id="requested_date" name="requested_date" placeholder="requested_date"   value="<?php echo $result['requested_date']?>"readonly/>
					</div>

				</form>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<?php $this->template->contentBegin(POS_BOTTOM);?> 

<!-- <script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>  --> 

<script>   
jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});

<?php $this->template->contentEnd();	?> 