  <?php $this->template->contentBegin(POS_TOP);?>
 <script src="https://cdn.ckeditor.com/4.9.0/standard/ckeditor.js"></script> 
 <?php $this->template->contentEnd();	?> 
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
		<div class="col-xs-12 border_bot"> 
			<form class="form-horizontal" role="form" action="" id="team_form" method="post" enctype="multipart/form-data">
				<fieldset>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="name">Team Name:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="name" id="name" class="form_bor_bot required" value="<?=$team_data['name']?>">
					</div>
				  </div> 
				   <div class="form-group">
					<label class="control-label col-sm-3" for="designation">Designation:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="designation" id="designation" class="form_bor_bot required" value="<?=$team_data['designation']?>">
					</div>
				  </div> 
				   <div class="form-group">
					<label class="control-label col-sm-3" for="role">Role<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="role" id="role" class="form_bor_bot required" value="<?=$team_data['role']?>">
					</div>
				  </div> 
				  <div class="form-group">
					<label class="control-label col-sm-3" for="linkdin_url">Linkdin URL:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="linkdin_url" id="linkdin_url" class="form_bor_bot required" value="<?=$team_data['linkdin_url']?>">
					</div>
				  </div> 
			<!-- 	   <div class="form-group">
					<label class="control-label col-sm-3" for="experiance">Experience<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="experiance" id="experiance" class="form_bor_bot required" value="<?=$team_data['experiance']?>">
					</div>
				  </div> 
				  <div class="form-group">
					<label class="control-label col-sm-3" for="report_tables_figures">Specialization<span class="star">*</span></label>
					<div class="col-sm-8">
					<textarea   name="specialization" id="specialization" class="form-control required" ><?=$team_data['specialization']?></textarea>
					</div>
				  </div> 
				  <div class="form-group">
					<label class="control-label col-sm-3" for="qualification">Qualification<span class="star">*</span></label>
					<div class="col-sm-8">
					<textarea name="qualification" id="qualification" class="form-control required" ><?=$team_data['qualification']?></textarea>	
					</div>
				  </div>  -->
				 
					<div class="form-group">
					<label class="control-label col-sm-3" for="team_image">Image :<span class="star">*</span> </label>
					<div class="col-sm-6">
					<input type="file" name="team_image" id="team_image" class="required"  >
					 <?php if($team_data['team_image']){?>
					  <img src="<?=site_url().'/uploads/teranex-team/'.$team_data['team_image']?>" width="100px">
					  <input type="hidden" id="old_image" name="old_image"  value="<?=$team_data['team_image']?>">
					  <?php }?>
					</div>
				  </div> 
				  <div class="form-group"> 
					<div class="text-center">
					 <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"> 
					  <input type="hidden" name="id" value="<?php echo $team_data['team_id']?>"  > 
					</div>
				  </div>
				</fieldset>
			</form>
			
		</div>
	
	</div>
</div> 
<?php  // $countList=json_encode($countryList) ?>
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>  
<script> 
$("#team_form").validate({
   rules: {  
			   	name:{
				   required:true
			   	},
			  	designation:{
				   required:true
			   	},
			  	role:{
				   required:true
			   	},
				linkdin_url:{
				   required:true
			   	},
				team_image:{
				   required:true
			   	},
			},
			messages: { 
				name:{
				   required:"Please enter name"
			   	},
			   	designation:{
				   required:"Please enter designation"
			   	},
			  	role:{
				   required:"Please enter role"
			   	},
				linkdin_url:{
				   required:"Please enter linkedin url"
			   	},
				team_image:{
				   required:"Please select profile image"
			   	},
			
			}
});  
// CKEDITOR.replace( 'specialization' );
</script> 
<?php $this->template->contentEnd();	?> 