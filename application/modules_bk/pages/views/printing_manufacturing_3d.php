<style type="text/css">
.paidfeedback .tab{
	/*display: block;*/
}
/** {box-sizing: border-box;}*/
.tab{display: none; /*width: 100%; height: 50%;margin: 0px auto;*/}
.current{display: block;}

h1 {text-align: center; }

button {cursor: pointer; }

button:hover {opacity: 0.8; }
button:focus{
	text-decoration: none;
	outline:none;
}
.previous { }


.error {color: #f00; }
.checkbox label.error{
    color: red;
    padding-left: 0;
    position: absolute;
    top: -25px;
    font-size: 14px;
    left: 0;
}
ul.printmaterial li{
	list-style-type: none;
	display: inline-block;
	margin-bottom: 10px;
	text-align: center;
	border:1px solid #ccc;
}
ul.printcolor li{
	list-style-type: none;
	display: inline-block;
	margin-bottom: 10px;
	text-align: center;
	border:1px solid #ccc;
	padding: 15px;
}
.paidfeedback .radio{
	font-weight: 100;
}
ul.productList {
	border:1px solid #ccc;
	padding: 10px;
}
ul.productList li{
	list-style-type: none;
	clear: both;
}
.qtyPayment{
	padding: 20px;
	border:1px solid #ccc;
	margin-bottom: 20px;
}
</style>
<!-- <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css"> -->
<!-- <img class="img-responsive bnr-images" src="<?php echo $theme_url?>/images/paidfeedback-bnr.jpg" alt=" "> -->
<div class="clearfix"></div><br/><br/><br/>
<div class="container servay section-pad paidfeedback">
     <div class="col-sm-12 padd-0"> 
         <!-- <?php 	
			   if(hasFlash("dataMsgEnquirySuccess"))	{	?>
				<div class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php echo getFlash("dataMsgEnquirySuccess"); ?>
				</div>
	     <?php }	if(hasFlash("dataMsgEnquiryError"))	{	?>
					<div class="alert alert-danger alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <?php echo getFlash("dataMsgEnquiryError"); ?>
					</div>
		<?php }	?>	   -->

    </div>

	<div class="col-sm-12">
		<div class="row">
			<div class="col-sm-12" id="manufacturediv" style="background-color: #fff; padding: 20px;box-shadow: 0px 0px 10px #dfdcdc;">
				<div  style="">
					<form id="myForm" action="#" method="POST">
						<div class="col-sm-4" >
							<img class="img-responsive" src="<?php echo $theme_url?>/images/learn-new-brain1.jpg" alt=" ">
							<br/>
							<label>Upload your file to see it here</label>
						</div>
						<div class="col-sm-8" style="border-left: 1px solid #ccc;">
							<center><h2>Manufacture your Design</h2></center>
							  	<div class="tab">
							  		<div class="" >
							  			<h3>1. Upload Your 3D Model </h3>
							  			<div class="form-group">
							  				<p>Upload your 3D model so that we can analyze it's design and get you a quote. Our expert job shop will manufacture it and bring it straight to your office.</p>
							  			</div>
							  			<div class="form-group">
							  				<label>Deag and drop your 3D file here or click to browse</label>
							  				<input type="file" name="" placeholder="">
							  			</div>
							  		</div>
							  	</div>
							  	<div class="tab">
									<div class="" style="">
										<label>Product ID : #ABC</label><br/>
										<h3>2. Select the Material </h3>
										<div class="clearfix"></div><br/>
										<div class="form-group">
									 		<ul class="printmaterial">
									 			<li class="col-sm-3"><a href=""><h5>Aluminium</h5><p>Compared to the other 3D printing materials, our aluminum has the roughest surface, but you can contact our sales team for specific surface finishes.</p></a></li>
									 			<li class="col-sm-3"><a href=""><h5>Brass</h5><p>Compared to the other 3D printing materials, our aluminum has the roughest surface, but you can contact our sales team for specific surface finishes.</p></a></li>
									 			<li class="col-sm-3"><a href=""><h5>Copper</h5><p>Compared to the other 3D printing materials, our aluminum has the roughest surface, but you can contact our sales team for specific surface finishes.</p></a></li>
									 			<li class="col-sm-3"><a href=""><h5>Magnesium</h5><p>Compared to the other 3D printing materials, our aluminum has the roughest surface, but you can contact our sales team for specific surface finishes.</p></a></li>
									 			<li class="col-sm-3"><a href=""><h5>Magnesium</h5><p>Compared to the other 3D printing materials, our aluminum has the roughest surface, but you can contact our sales team for specific surface finishes.</p></a></li>
									 			<li class="col-sm-3"><a href=""><h5>Magnesium</h5><p>Compared to the other 3D printing materials, our aluminum has the roughest surface, but you can contact our sales team for specific surface finishes.</p></a></li>
									 			<li class="col-sm-3"><a href=""><h5>Magnesium</h5><p>Compared to the other 3D printing materials, our aluminum has the roughest surface, but you can contact our sales team for specific surface finishes.</p></a></li>
									 			<li class="col-sm-3"><a href=""><h5>Magnesium</h5><p>Compared to the other 3D printing materials, our aluminum has the roughest surface, but you can contact our sales team for specific surface finishes.</p></a></li>
									 		</ul>
									 	</div>
								    </div>
							  	</div>
							  	<div class="tab">
							  		<div class="" style="">
							  			<label>Product ID : #ABC</label><br/>
							  			<label>Material Type Chosen : #ABC</label><br/>
										<h3>3. Choose Options </h3>
										<div class="clearfix"></div><br/>
										<div class="form-group">
											<label>Color :</label>
											<ul class="printcolor">
												<li><a href="">Black</a></li>
												<li><a href="">Bronzed-Silver</a></li>
												<li><a href="">Bronze</a></li>
												<li><a href="">Gold</a></li>
												<li><a href="">Nickle</a></li>
											</ul>
									 	</div>
									 	<div class="clearfix"></div><br/>
									 	<div class="form-group">
											<label>Finish :</label>
											<ul class="printcolor">
												<li><a href="">Matte<br/><p>This surface is unpolished for a rough texture</p></a></li>
												<li><a href="">Polished<br/><p>This surface is polished to be shiny in look and feel</p></a></li>
											</ul>
									 	</div>
									 	<hr/>
									 	<div class="form-group">
									 		<div class="col-sm-6">
									 			<label class="">Quantity :</label>
										 		<input type="number" name="" class="">
									 		</div>
									 		<div class="col-sm-6"><a href="javascript:void(0)" class="btn btn-success " id="addtoCart">Add to Cart</a>&nbsp;<a href="javascript:void(0)" class="btn btn-success " id="addtoCart">Upload Another</a></div>
									 	</div>
								    </div>
							  	</div>
							  	<div class="clearfix"></div><br/><br/><br/>
							  	<div style="overflow:auto;">
								    <div class="text-center" style="">
								      	<button type="button" class="previous btn_orange swapcust">Previous</button>
								      	<button type="button" class="next btn_orange swapcust">Save & Continue</button>
										<button type="button" class="submit btn_orange swapcust">Submit</button>
								    </div>
							  	</div>
						</div>
					</form>
				</div>
				
			</div>
			<div id="checkoutdiv" style="display: none;">
				<div class="col-sm-12 padd-0">
					<div class="col-sm-4 ">
						<div class="paidfeedback" style="border:1px solid #ccc; padding: 15px;">
							<h3>Choose Address for Shipment:</h3>
							<label class="radio">Flat no.5,Sundarshilp Appartment,Tanaji Road,Pune,Maharashtra,India<br/>Pin:400010<input type="radio" name="shipaddress" checked="checked"><span class="checkround"></span> </label>
							<label class="radio">Flat no.5,Sundarshilp Appartment,Tanaji Road,Pune,Maharashtra,India<br/>Pin:400010<input type="radio" name="shipaddress" checked="checked"><span class="checkround"></span> </label>
							<label class="radio">Flat no.5,Sundarshilp Appartment,Tanaji Road,Pune,Maharashtra,India<br/>Pin:400010<input type="radio" name="shipaddress" checked="checked"><span class="checkround"></span> </label>
						</div>
						<br/>
						<div style="border:1px solid #ccc;padding: 15px;">
							<h3>Add New Address:</h3>
							<div class="border_bot">
								<div class="form-group">
									<input type="text" name="flat" placeholder="Flat / Building" class="form_bor_bot">
								</div>
								<div class="form-group">
									<input type="text" name="society" placeholder="Society Name" class="form_bor_bot">
								</div>
								<div class="form-group">
									<input type="text" name="street" placeholder="Street Name" class="form_bor_bot">
								</div>
								<div class="form-group">
									<input type="text" name="locality" placeholder="Locality" class="form_bor_bot">
								</div>
								<div class="form-group">
									<input type="text" name="city" placeholder="City" class="form_bor_bot">
								</div>
								<div class="form-group">
									<input type="text" name="state" placeholder="State" class="form_bor_bot">
								</div>
								<div class="form-group">
									<input type="text" name="pincode" placeholder="Pincode" class="form_bor_bot numbersOnly" minlength="6" maxlength="6">
								</div>
								<div class="form-group text-center">
									<input type="submit" name="submitAddress" class="btn btn_orange" value="Add Address">
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<ul class="productList">
							<li>
								<div class="col-sm-8">
									<h3>1. Product1</h3>
									<label>Price:</label>
								</div>
								<div class="col-sm-4"><img class="img-responsive" src="<?php echo $theme_url?>/images/learn-new-brain1.jpg" alt=" " style="height: 100px;display: inline-block;float: right;"></div>
							</li><div class="clearfix"></div><br/>
							<li>
								<div class="col-sm-8">
									<h3>2. Product2</h3>
									<label>Price:</label>
								</div>
								<div class="col-sm-4"><img class="img-responsive" src="<?php echo $theme_url?>/images/learn-new-brain1.jpg" alt=" " style="height: 100px;display: inline-block;float: right;"></div>
							</li><div class="clearfix"></div><br/>
							<li>
								<div class="col-sm-8">
									<h3>3. Product3</h3>
									<label>Price:</label>
								</div>
								<div class="col-sm-4"><img class="img-responsive" src="<?php echo $theme_url?>/images/learn-new-brain1.jpg" alt=" " style="height: 100px;display: inline-block;float: right;"></div>
							</li><div class="clearfix"></div><br/>
						</ul>
						<div class="clearfix"></div><br/>
						<div class="qtyPayment">
							<a href="">Choose Shipping Speed</a>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="qtyPayment">
							<label>Subtotal:</label>
						</div>
						<div class="qtyPayment">
							<label>Add Promotion Code:</label>
						</div>
						<div class="qtyPayment">
							<label>Total Cost: INR</label>
						</div>
						<div class="qtyPayment">
							<label>Estimated Delivery Date:</label>
						</div>
						<div>
							<center><a href="" class="btn btn-success">Make A Payment</a></center>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>
<div class="clearfix"></div><br/><br/>
<?php $this->template->contentBegin(POS_BOTTOM);?> 
<script>
(function ( $ ) {
  $.fn.multiStepForm = function(args) {
      if(args === null || typeof args !== 'object' || $.isArray(args))
        throw  " : Called with Invalid argument";
      var form = this;
      var tabs = form.find('.tab');
      var steps = form.find('.step');
      steps.each(function(i, e){
        $(e).on('click', function(ev){
          form.navigateTo(i);
        });
      });
      form.navigateTo = function (i) {/*index*/
        /*Mark the current section with the class 'current'*/
        tabs.removeClass('current').eq(i).addClass('current');
        // Show only the navigation buttons that make sense for the current section:
        form.find('.previous').toggle(i > 0);
        atTheEnd = i >= tabs.length - 1;
        form.find('.next').toggle(!atTheEnd);
        // console.log('atTheEnd='+atTheEnd);
        form.find('.submit').toggle(atTheEnd);
        fixStepIndicator(curIndex());
        return form;
      }
      function curIndex() {
        /*Return the current index by looking at which section has the class 'current'*/
        return tabs.index(tabs.filter('.current'));
      }
      function fixStepIndicator(n) {
        steps.each(function(i, e){
          i == n ? $(e).addClass('active') : $(e).removeClass('active');
        });
      }
      /* Previous button is easy, just go back */
      form.find('.previous').click(function() {
        form.navigateTo(curIndex() - 1);
      });

      /* Next button goes forward iff current block validates */
      form.find('.next').click(function() {
        if('validations' in args && typeof args.validations === 'object' && !$.isArray(args.validations)){
          if(!('noValidate' in args) || (typeof args.noValidate === 'boolean' && !args.noValidate)){
            form.validate(args.validations);
            if(form.valid() == true){
              form.navigateTo(curIndex() + 1);
              return true;
            }
            return false;
          }
        }
        form.navigateTo(curIndex() + 1);
      });
      form.find('.submit').on('click', function(e){
        if(typeof args.beforeSubmit !== 'undefined' && typeof args.beforeSubmit !== 'function')
          args.beforeSubmit(form, this);
        /*check if args.submit is set false if not then form.submit is not gonna run, if not set then will run by default*/        
        if(typeof args.submit === 'undefined' || (typeof args.submit === 'boolean' && args.submit)){
          form.submit();
        }
        return form;
      });
      /*By default navigate to the tab 0, if it is being set using defaultStep property*/
      typeof args.defaultStep === 'number' ? form.navigateTo(args.defaultStep) : null;

      form.noValidate = function() {
        
      }
      return form;
  };
}( jQuery ));
</script>
<script type="text/javascript">
	jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
jQuery('.lettersOnly').keyup(function () { 
    this.value = this.value.replace(/[^A-Za-z \.]/g,'');
});
jQuery.validator.addMethod("valEmail1", function(value, element) {
  return this.optional( element ) || /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test( value );
}, 'Please enter a valid email address');

		$(document).ready(function(){
			$.validator.addMethod('date', function(value, element, param) {
				return (value != 0) && (value <= 31) && (value == parseInt(value, 10));
			}, 'Please enter a valid date!');
			$.validator.addMethod('month', function(value, element, param) {
				return (value != 0) && (value <= 12) && (value == parseInt(value, 10));
			}, 'Please enter a valid month!');
			$.validator.addMethod('year', function(value, element, param) {
				return (value != 0) && (value >= 1900) && (value == parseInt(value, 10));
			}, 'Please enter a valid year not less than 1900!');
			$.validator.addMethod('username', function(value, element, param) {
				var nameRegex = /^[a-zA-Z0-9]+$/;
				return value.match(nameRegex);
			}, 'Only a-z, A-Z, 0-9 characters are allowed');

			var val	=	{
			    // Specify validation rules
			    rules: {
			      	fname: {
			      	required: true
			      	},
			      	email: {
					        required: true,
					        valEmail1:true,
					        email: true
					      },
					phone: {
						required:true,
						minlength:10,
						maxlength:10,
						digits:true
					},
					country:{
						required:true
					},
					city:{
						required:true
					},
					company:{
						required:true
					},
					interested_category:{
						required:true
					},
					feature_service:{
						required:true
					},
					role_in_company:{
						required:true
					}

			    },
			    // Specify validation error messages
			    messages: {
					fname: 		"Please enter name",
					email: {
						required: 	"Please enter email",
						email: 		"Please enter a valid e-mail",
					},
					phone:{
						required: 	"Please enter phone number",
						minlength: 	"Please enter 10 digit mobile number",
						maxlength: 	"Please enter 10 digit mobile number",
						digits: 	"Only numbers are allowed in this field"
					},
					country:{
						required:"Please enter country"
					},
					city:{
						required:"Please enter city"
					},
					company:{
						required:"Please enter company name"
					},
					interested_category:{
						required:"Please select categories you are interested in sourcing"
					},
					feature_service:{
						required:"Please select features or services on TERANEX.io you have used before"
					},
					role_in_company:{
						required:"Please select your role in the company"
					},

					
			    }
			}
			$("#myForm").multiStepForm(
			{
				// defaultStep:0,
				beforeSubmit : function(form, submit){
					console.log("called before submiting the form");
					console.log(form);
					console.log(submit);
				},
				validations:val,
			}
			).navigateTo(0);
		});
	</script>
	<script type="text/javascript">

	//	CUSTOMIZE JQUERY FOR OTHER OPTION	
		$(function () {
        $("#chkbx").click(function () {
			
            if ($(this).is(":checked")) {
               $("#txtbx").show(); 
				$("#txtbx").removeClass("invalid");
            } 
			else {
                $("#txtbx").hide().val("");
				$("input[type=text]").removeClass("invalid");
            }
        });
        $("#chkbx2").click(function () {
			
            if ($(this).is(":checked")) {
               $("#txtbx2").show(); 
				$("#txtbx2").removeClass("invalid");
            } 
			else {
                $("#txtbx2").hide().val("");
				$("input[type=text]").removeClass("invalid");
            }
        });
        $("#chkbx3").click(function () {
			
            if ($(this).is(":checked")) {
               $("#txtbx3").show(); 
				$("#txtbx3").removeClass("invalid");
            } 
			else {
                $("#txtbx3").hide().val("");
				$("input[type=text]").removeClass("invalid");
            }
        });
    });

$("#addtoCart").click( function() {
   $('#manufacturediv').hide();
   $('#checkoutdiv').show();
 });
		// FOR SCROLLTOP POSITION

$(".swapcust").click( function() {
   $(window).scrollTop(0);
 });
	</script>
<?php echo $this->template->contentEnd();	?> 