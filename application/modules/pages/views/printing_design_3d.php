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
			<div class="col-sm-offset-2 col-sm-8" style="background-color: #fff; padding: 10px 40px;box-shadow: 0px 0px 10px #dfdcdc;">
				<form id="myForm" action="#" method="POST">
				  	<div class="tab">
				  		<div class="" >
				  			<center><h3>Tell Us About Your Project</h3></center>
				  			<div class="form-group">
				  				<input type="text" name="" class="form-control" placeholder="Name of your project">
				  			</div>
				  			<div class="form-group">
				  				<textarea name="" class="form-control" placeholder="Describe what would you like to design" rows="6"></textarea>
				  			</div>
				  			<div class="form-group">
				  				<label>Upload reference file :</label>
				  				<input type="file" name="" class="form-control" placeholder="" >
				  			</div>
				  		</div>
				  	</div>
				  	<div class="tab">
						<div class="" style="">
							<center><h3>How Far are along are you with your project ?</h3></center>
							<div class="clearfix"></div><br/>
							<div class="form-group text-center">
						 		<center><img class="img-responsive" src="<?php echo $theme_url?>/images/learn-new-brain1.jpg" alt=" "></center>
						 	</div>
						 	<div class="clearfix"></div><br/>
						 	<div class="form-group text-center">
							 	<button type="button" class="btn btn-default ">Idea</button>
						      	<button type="button" class=" btn btn-default  ">2D Design</button>
								<button type="button" class=" btn btn-default  ">3D Model</button>
							</div>
					    </div>
				  	</div>
				  	<div class="tab">
				  		<div class="" style="">
							<center><h3>What Level Of detail Would yoo like to see in your model ?</h3></center>
							<div class="clearfix"></div><br/>
							<div class="form-group text-center">
						 		<center><img class="img-responsive" src="<?php echo $theme_url?>/images/learn-new-brain1.jpg" alt=" "></center><br/>
						 		<p>I want several detailed features but they dont need to preciely match the reference material</p>
						 	</div>
						 	<div class="clearfix"></div><br/>
						 	<div class="form-group text-center">
							 	<button type="button" class=" btn btn-default  ">True</button>
						      	<button type="button" class=" btn btn-default  ">Not Really</button>
								<button type="button" class=" btn btn-default  ">Irrelevant</button>
							</div>
					    </div>
				  	</div>
				  	<div class="tab">
				     	<div class="" style="">
							<center><h3>Choose A Material</h3></center>
							<div class="clearfix"></div><br/>
							<div class="form-group">
						 		<ul class="printmaterial">
						 			<li class="col-sm-3"><img class="img-responsive" src="<?php echo $theme_url?>/images/learn-new-brain1.jpg" alt=" " style=""><h5>Aluminium</h5></li>
						 			<li class="col-sm-3"><img class="img-responsive" src="<?php echo $theme_url?>/images/learn-new-brain1.jpg" alt=" " style=""><h5>Brass</h5></li>
						 			<li class="col-sm-3"><img class="img-responsive" src="<?php echo $theme_url?>/images/learn-new-brain1.jpg" alt=" " style=""><h5>Copper</h5></li>
						 			<li class="col-sm-3"><img class="img-responsive" src="<?php echo $theme_url?>/images/learn-new-brain1.jpg" alt=" " style=""><h5>Magnesium</h5></li>
						 			<li class="col-sm-3"><img class="img-responsive" src="<?php echo $theme_url?>/images/learn-new-brain1.jpg" alt=" " style=""><h5>Magnesium</h5></li>
						 			<li class="col-sm-3"><img class="img-responsive" src="<?php echo $theme_url?>/images/learn-new-brain1.jpg" alt=" " style=""><h5>Magnesium</h5></li>
						 			<li class="col-sm-3"><img class="img-responsive" src="<?php echo $theme_url?>/images/learn-new-brain1.jpg" alt=" " style=""><h5>Magnesium</h5></li>
						 			<li class="col-sm-3"><img class="img-responsive" src="<?php echo $theme_url?>/images/learn-new-brain1.jpg" alt=" " style=""><h5>Magnesium</h5></li>
						 		</ul>
						 	</div>
						 	<div class="clearfix"></div><br/>
					    </div>
				  	</div>
				  	<div class="clearfix"></div><br/><br/><br/>
				  	<div style="overflow:auto;">
					    <div class="text-center" style="">
					      	<button type="button" class="previous btn_orange swapcust">Previous</button>
					      	<button type="button" class="next btn_orange swapcust">Save & Continue</button>
							<button type="button" class="submit btn_orange swapcust">Choose Later</button>
					    </div>
				  	</div>
				</form>
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
		// FOR SCROLLTOP POSITION

$(".swapcust").click( function() {
   $(window).scrollTop(0);
 });
	</script>
<?php echo $this->template->contentEnd();	?> 