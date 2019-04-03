<?php $this->template->contentBegin(POS_TOP);?>

<?php $this->template->contentEnd();  ?> 
<div class="" style="margin-top: 80px;">
    <img class="img-responsive bnr-images" src="<?php echo $theme_url?>/images/indexbckg.jpg" alt=" ">
 </div>
<div class="container">
    <center><h1>Details for collective buying request</h1></center>
	<?php 	// display messages
			if(hasFlash("dataGroupMsgSuccess"))	{	?>
				<div class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php echo getFlash("dataGroupMsgSuccess"); ?>
				</div>
	<?php	}	?>
    <div class="col-sm-12">
        <div class="col-sm-6 col-sm-offset-3 border_bot" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;">
            <form class="" name="" id="buyingrequest" method="post" enctype="multipart/form-data" action="#" >
                <div class="form-group">
                    <select class="form_bor_bot" name="product_cat" id="product_cat">
                      <option value="">Select Product Category</option>
						<?php if($machineCatList){
							foreach($machineCatList as $rowCat){?>
								<option value="<?php echo $rowCat['mc_id']?>" ><?php echo $rowCat['category_name']?></option>
						<?php }}?>
                    </select><span class="compulsary">*</span>
                </div>
                <div class="form-group">
                    <select class="form_bor_bot" name="prod_brandName" id="prod_brandName">
                      <option value="">Select Brand</option>
                      <?php if($brandList){
									foreach($brandList as $rowBrand){?>
								<option value="<?php echo $rowBrand['mb_id']?>"  <?php if($rowProduct['prod_brandName']==$rowBrand['mb_id']){ echo "selected";}?>><?php echo $rowBrand['brand_name']?></option>
									<?php }}?>
                    </select><span class="compulsary">*</span>
                </div>
                <div class="form-group">
                    <select class="form_bor_bot" name="prod_model" id="prod_model">
                      <option value="">Select Product Model</option>
                     
                    </select><span class="compulsary">*</span>
                </div>
                <div class="form-group">
                    <input type="text" id="monthly_consum" name="monthly_consum" class="form_bor_bot numbersOnly" placeholder="Average Monthly Consumption" ><span class="compulsary">*</span>
                </div>
                <div class="form-group">
                    <input type="text" id="quartly_consum" name="quartly_consum" class="form_bor_bot numbersOnly" placeholder="Average Quarterly Consumption" ><span class="compulsary">*</span>
                </div>
                <div class="form-group">
                    <input type="text" id="monthly_forcast" name="monthly_forcast" class="form_bor_bot numbersOnly" placeholder="Expected Monthly Forecast" ><span class="compulsary">*</span>
                </div>
                <div class="form-group">
                    <input type="text" id="buying_price" name="buying_price" class="form_bor_bot decimal" placeholder="Current Buying Price" ><span class="compulsary">*</span>
                </div>
                <div class="clearfix"></div>
                <div class="text-center">
                    <input type="submit" name="addSubmit" id="submit" class="btn btn_orange" value="Submit" />
                </div>
            </form>
        </div>
    </div>
   
</div><!--//.container -->
  <div class="clearfix"></div><br/>
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script> 
<script type="text/javascript">
$(function() {
           $(".datepicker").datepicker({ dateFormat: "yy-mm-dd", minDate: 0}).val()
   }); 
jQuery('.numbersOnly').keyup(function () { 
this.value = this.value.replace(/[^0-9\.]/g,'');
});
$(".decimal").keyup(function() {
    var $this = $(this);
    $this.val($this.val().replace(/[^\d.]/g, ''));        
});
$("#buyingrequest").validate({
    rules: {  
        product_cat:{
          required:true
        },
        prod_brandName:{
          required:true
        },
        monthly_consum:{
          required:true
        },
        quartly_consum:{
          required:true
        },
        monthly_forcast:{
          required:true
        },
        buying_price:{
          required:true
        },
      },
    messages: { 
      product_cat:{
        required:"Please select product category"
      },
      prod_brandName:{
        required:"Please select brand"
      },
      monthly_consum:{
          required:"Please enter average Monthly Consumption"
        },
        quartly_consum:{
          required:"Please enter average Quarterly Consumption"
        },
        monthly_forcast:{
          required:"Please enter expected Monthly Forecast for Next 1 Year"
        },
        buying_price:{
          required:"Please enter current Buying Price"
        },
    }
  }); 
  $('#prod_brandName').on('change', function() {
	var prod_brandName = $("#prod_brandName").val();
		 $.ajax({
		  type: "GET",
		  url: site_url+"/machine/api/machineBrandModelList/"+prod_brandName,
		  data: {},
			success: function(result){ 
				$('#prod_model').empty();
				 if(result){ 	 
						var state_list=result.result.result; 
						$('#prod_model')
							.append($("<option></option>")
							.attr("value",'')
							.text('Select Product Module'));	
						$.each(state_list, function(key, value) { 
							$('#prod_model')
							.append($("<option></option>")
							.attr("value",value.md_id)
							.text(value.model_name));
						});		
					}
				else if(result.error){
				
				} 
			}
			
		});
});
</script>
<?php $this->template->contentEnd();  ?> 
