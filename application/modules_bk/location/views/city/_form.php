<div class="box-body">
<?php //print_r($data); ?>
	<div class="col-xs-12">

		<?php	// display messages

			if(hasFlash("subMenuErrorMsg"))	{	?>

				<div class="alert alert-warning alert-dismissible" role="alert">

				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

				  <?php echo getFlash("subMenuErrorMsg"); ?>

				</div>

	<?php	}	?> 

		

		<!-- form -->

		<div class="col-xs-12 border_bot">	

			<form id="city_form" name="" class="form-horizontal" enctype="multipart/form-data" method="post">

				<div class="form-group">

					<label class="col-md-3 control-label" for="text-field">Country :<span class="star">*</span></label>

					<div class="col-md-6">

						<select type="text" id="country_id" name="country_id" class="form_bor_bot required" onchange="state_list(this.value)">

							<option value = ""> Select </option>

			<?php	if($countryList){

						foreach($countryList as $row){		?>

							<option value = "<?php echo $row["id"]; ?>" <?php if($row["id"] == $data['country_id']){ echo "selected";} ?> > 

									<?php echo $row["country_name"]; ?> 

							</option>

			<?php		}

					}		?>

						</select>

					</div>

				</div>

				

				<div class="form-group">

					<label class="col-md-3 control-label" for="text-field">State :<span class="star">*</span></label>

					<div class="col-md-6">

					<div id="statelist"></div>

						<select type="text" id="state_id" name="state_id" class="form_bor_bot required">

							<option value = ""> Select State</option>

							<?php	
							//print_r($stateList);
							if($stateList){

									foreach($stateList as $row){		?>

										<option value = "<?php echo $row["sid"]; ?>"

											<?php if($row["sid"] == $data['state_id']) echo "selected"; ?> > 

												<?php echo $row["state_name"]; ?> 

										</option>

						<?php		}

								}		?>

						</select>

					</div>

				</div>

				

				<div class="form-group">

					<label class="col-md-3 control-label" for="text-field">City Name :<span class="star">*</span></label>

					<div class="col-md-6">

						<input type="text" id="city_name" name="city_name" class="form_bor_bot required"

							value="<?php echo $data["city_name"]; ?>" >

					</div>

				</div> 

				<div class="form-group">

					<label class="col-md-3 control-label" for="text-field">Publish :</label>

					<div class="col-md-8">

						<input type="checkbox" name="publish" value="Y" 

							<?php if($data["publish"] == 'Y') echo "checked"; ?> >

					</div>

				</div>

				 

				<div class="form-group">

					<div class="text-center">

						<button type="submit" name="btnSubmit" class="btn btn-primary">Submit</button>

					</div>

				</div>

					

			</form>

			

		</div>	

		<!-- end form -->

	</div>

	<!-- end widget content -->

</div>

<!-- end widget div -->



<!-- form validation -->



<?php $this->template->contentBegin(POS_BOTTOM);?>

<script src="<?=$theme_url;?>/js/location.js"></script>

 

   <!--  <script src="<?=$theme_url;?>/js/validator/location_validate.js"></script> -->

	<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>  

<script>  

$("#city_form").validate({

   rules: {  

				country_id: "required",

				state_id: "required", 

				city_name: "required", 

			},

			messages: { 

				country_id: "Please select country ",

				state_id: "Please select state name",

				city_name: "Please enter city name", 

			}

		}); 

</script>

<?php echo $this->template->contentEnd();	?>   