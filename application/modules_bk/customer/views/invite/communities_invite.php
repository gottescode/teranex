

 
<div class="box-body">
	<div class="col-xs-12">
		<?php 	// display messages
			if(hasFlash("dataMsgError"))	{	?>
				<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php echo getFlash("dataMsgError"); ?>
				</div>
	<?php	}	?>
	
		<!-- form -->
		<div class="col-xs-12"> 
			<form class="form" name="community_invite_id" id="community_invite_id" method="post" action="">
				<input type="hidden" name="community_id" value="<?php $_GET['community_id'];?>" />
				<div class="form-group col-sm-6">
					<label class="col-sm-12 contact-label-text">Enter email address with comma as separator and max 10-15 a time</label>
					<div class="col-sm-12">
						<textarea rows="6" name="community_invite_email" type="text" class="form-control" id="Email" value="<?php $_GET['community_invite_email'];?>" placeholder=""></textarea>
					</div>
				</div>
				
				
				<div class="form-group col-sm-12 col-xs-6">
				   <input type="submit" name="submit" id="submit" class="btn btn-default submit-btn" value="Send Invite" />
				</div>
				
			</form>
			
		</div>
	
	</div>
</div> 
<?php  // $countList=json_encode($countryList) ?>
<?php $this->template->contentBegin(POc_BOTTOM);?>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script> 
<script src="<?=$theme_url?>/js/location.js"></script> 
 
<script language="javascript" type="text/javascript">
$(document).ready(function() {
$("#communities").submit(function(){
			
	if($("#Email").val() == "")
	{
		alert("Email address is required");
		return false;
	}
	
	var yesno = confirm("Are you sure to save");
	return yesno;
	});
});
</script>

 
<?php $this->template->contentEnd();	?> 