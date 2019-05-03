<?php $this->template->contentBegin(POS_TOP);

$uid = $this->session->userdata('uid');

?>

 <?php echo $this->template->contentEnd();	?>

<section class="employee_box padd_all_50">
    <div class="container employee_box_child">
        <div class="row">
            <div class="col-md-6">
                <div class="em_img">
                    <?php if($consultant_data['u_avatar']){ ?>
                    <img src="<?php echo base_url()."/uploads/customer/".$consultant_data['u_avatar']?>" alt="img">
                    <?php   }else{?>
                        <img src="<?php echo theme_url()."/images/PersonPlaceholder.png"?>" alt="img">
                    <?php }?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="em_text padd_rl_50">
                    <h1 class="basic-head "><?php echo $consultant_data['u_name']?></h1>
                    <p>NYU Senior Lecturer</p>
                    <h3 class="ht-35">$80/hour</h3>
                    <p class="ht-35 country">Melbourne,Australia </p>
                    <?php if($uid){
                    ?>
                        <a data-toggle="modal" data-target="#book_appointment_modal" class="a-green-btn" onclick="open_modal();">Book Now</a>
                    <? }else{ ?>
                        <a href="" class="a-green-btn" data-toggle="modal" data-target="#signinModal">Book Now</a>
                    <?php }
                    ?>

                </div>
            </div>
        </div>
    </div>
</section>

<div  class="feature-this-month-bg" id="c_description">
    <div class="container m-padd-0">
        <div class="clearfix"></div>
        <?php 	// display messages
        if(hasFlash("dataMsgSuccess"))	{	?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo getFlash("dataMsgSuccess"); ?>
            </div>
        <?php	}	?>
        <div class="clearfix"></div>
        <div class=" col-sm-12 padd-0">
            <p class="rcomment readmore"><?php echo $consultant_data['profile_summary'];?></p>
        </div>
    </div>
</div>

<section class="mrgn-top">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="booking_box bx-shdw padd_all_50 white">
                    <div class="child_menu_btm country_area">
                        <h4 class="basic-head"><?php echo $consultant_data['u_name']?> - Senior Engineer</h4>
                        <p>Melbourne Australia</p>
                    </div>
                    <div class="child_menu_btm em_payrs ">
                        <h4 class="basic-head mar-lt-rt">$68.50/hour</h4>
                        <?php if($uid){
                            ?>
                            <a data-toggle="modal" data-target="#book_appointment_modal" class="a-green-btn" onclick="open_modal();">Book Now!</a>
                        <? }else{ ?>
                            <a href="" class="a-green-btn" data-toggle="modal" data-target="#signinModal">Book Now!</a>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="padd_tb_50">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="padd_all_50 bx-shdw glance white according-height">
                    <h2 class="basic-head">At a Glance</h2>
                    <div class="be_table mrgn-top">
                        <table>
                            <tbody>
                            <tr>
                                <td>Qualification</td>
                                <td>BE</td>
                            </tr>
                            <tr>
                                <td>MBA<br>(Strategy)</td>
                                <td>Cambridge<br> University</td>
                            </tr>
                            <tr>
                                <td>Language(s)</td>
                                <td>English,Spanish,<br>German</td>
                            </tr>
                            <tr>
                                <td>Location</td>
                                <td>Melbourne,Australia</td>
                            </tr>
                            <tr>
                                <td>Rate</td>
                                <td>$68.50/hour</td>
                            </tr>
                            <tr>
                                <td>CV/Resume</td>
                                <td><?php  if($consultant_data['user_resume']!=''){ echo "<a href='".site_url()."uploads/customer/".$consultant_data['user_resume']."' target='_blank'>Click Here</a>";} else{ echo "Resume not available";}?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="padd_all_50 bx-shdw strngth white according-height">
                    <h2 class="basic-head">Experience &amp; Strengths</h2>
                    <div class="ex-strngth mrgn-top">
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
                    </div>
                    <div class="row">
                        <?php if($workList){
                            foreach($workList as $rowWork){?>
                        <div class="col-md-6">

                            <div class="strnght_box">
                                <p><?php echo $rowWork['title'];?></p>
                                <p><?php echo $rowWork['exp_details'];?></p>
                                <p>Strength 3</p>
                                <p>Strength 4</p>
                                <p>Strength 5</p>
                                <p>Strength 6</p>

                        </div>
                        </div>
                        <?php }}?>
                        <div class="col-md-6">
                            <div class="strnght_box">
                                <p>Strength 1</p>
                                <p>Strength 2</p>
                                <p>Strength 3</p>
                                <p>Strength 4</p>
                                <p>Strength 5</p>
                                <p>Strength 6</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="em_sect section_slider">
    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <div class=" ">
                    <h3 class="basic-head">Reviews</h3>
                </div>
            </div>
            <div class="col-12 ">
                <div class="mrgn-top bx-shdw white">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 slider_row">
                            <div class="">
                                <div class="padd_rl_50 slider_one_top">
                                    <div class="silider_box ">
                                        <div id="owl-one" class="owl-carousel owl-theme owl-loaded owl-drag">

                                            <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-4050px, 0px, 0px); transition: all 0.25s ease 0s; width: 9450px;"><div class="owl-item cloned" style="width: 1340px; margin-right: 10px;"><div class="item">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="rt-cntnt">
                                                                        <p><span class="coma">&#34;</span> Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature<span class="coma">&#34;</span></p>
                                                                        <h5 class="compny">justin Donaldson <span>-Company Name</span></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div></div><div class="owl-item cloned" style="width: 1340px; margin-right: 10px;"><div class="item">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="rt-cntnt">
                                                                        <p> <span class="coma">&#34;</span>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature<span class="coma">&#34;</span></p>
                                                                        <h5 class="compny">justin Donaldson <span>-Company Name</span></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div></div><div class="owl-item" style="width: 1340px; margin-right: 10px;"><div class="item">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="rt-cntnt">
                                                                        <p> <span class="coma">&#34;</span>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature<span class="coma">&#34;</span></p>
                                                                        <h5 class="compny">justin Donaldson <span>-Company Name</span></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div></div><div class="owl-item active" style="width: 1340px; margin-right: 10px;"><div class="item">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="rt-cntnt">
                                                                        <p> <span class="coma">&#34;</span>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature<span class="coma">&#34;</span></p>
                                                                        <h5 class="compny">justin Donaldson <span>-Company Name</span></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div></div><div class="owl-item" style="width: 1340px; margin-right: 10px;"><div class="item">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="rt-cntnt">
                                                                        <p><span class="coma">&#34;</span>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature<span class="coma">&#34;</span></p>
                                                                        <h5 class="compny">justin Donaldson <span>-Company Name</span></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div></div><div class="owl-item cloned" style="width: 1340px; margin-right: 10px;"><div class="item">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="rt-cntnt">
                                                                        <p> <span class="coma">&#34;</span>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature<span class="coma">&#34;</span></p>
                                                                        <h5 class="compny">justin Donaldson <span>-Company Name</span></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div></div><div class="owl-item cloned" style="width: 1340px; margin-right: 10px;"><div class="item">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="rt-cntnt">
                                                                        <p> <span class="coma">&#34;</span>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature<span class="coma">&#34;</span></p>
                                                                        <h5 class="compny">justin Donaldson <span>-Company Name</span></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div></div></div></div><div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div><div class="owl-dots"><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot active"><span></span></button><button role="button" class="owl-dot"><span></span></button></div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class=" em_mont">
                                <img src="<?php echo theme_url()."/images/profile.jpg" ?>" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
</section>

<section class="mrgn-top">
    <div class="container">
        <div class="padd_all_50 bx-shdw white appointment">
            <div class="row">
                <div class="col-md-8">
                    <div class="child">
                        <div class="col-12">
                            <h3 class="basic-head">Book Appointments With Our App!</h3>
                            <p class="mrgn-top">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                            <div class="lisitng mrgn-top">
                                <ul>
                                    <li>Machine Breakdown</li>
                                    <li>Machine Maintenance</li>
                                </ul>
                                <ul>
                                    <li>Application Support</li>
                                    <li>Spare Parts</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="content mrgn-top">
                        <h4 class="basic-head mar-rt-25">Get it now!</h4>
                        <a href="#" class="mar-rt-25"><img src="<?php echo theme_url()."/images/apple.png" ?> " alt="img"></a>
                        <a href="#" class="mar-rt-25"><img src="<?php echo theme_url()."/images/google.png" ?>"  alt="img"></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="child center_lcs">
                        <img src="<?php echo theme_url()."/images/single_mobile.jpg" ?> " alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- /.myprofile-bg -->
						

<div class="clearfix"></div>
	<div class="detail_heading ">


		

			

		<div id="c_review">
			<div class="container">
				<div class="col-sm-12 padd-0">
					<h2>Reviews</h2>
							<div class="review-block">
							<?php if($commentList){
								foreach($commentList as $rowComment){?>
								<div class="row">
									<div class="col-sm-2">
										<img src="<?php echo $theme_url?>/images/meet-img1.jpg" class="img-rounded img-responsive">
									</div>
									<div class="col-sm-7">
										<div class="review-block-name"><a href="#"><?php echo $rowComment['u_name']?></a></div>
										<div class="review-block-title"><?php echo $rowComment['comment_head']?></div>
										<div class="review-block-description"><?php echo $rowComment['user_comment']?></div>
									</div>
									<div class="col-sm-3">
										<div class="review-block-rate">
											<ul  class="list-unstyled">
											  <?php $rateIng=$rowComment['course_rating'];
											  for($i=1;$i<=5;$i++) {
											  $selected = "";
											  if(!empty($rateIng) && $i<=$rateIng) {
												$selected = "selected";
											  }
											  ?>
											  <span class='spanStar <?php echo $selected; ?>' onmouseover="highlightStar(this,<?php echo $tutorial["id"]; ?>);" onmouseout="removeHighlight(<?php echo $tutorial["id"]; ?>);"  >&#9733;</span>  
											  <?php }  ?>
											 
											</ul>
										</div>
									</div>
								</div>
								<?php }}?>
							</div>
				</div>
				
			</div>
		</div>

	</div>
</div> 
<?php 
?>
<div id="book_appointment_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h2 class="modal-title">Book Appointment</h2></center>
      </div>
      <div class="modal-body">
      	<div class="border_bot col-sm-12 ">
       		<form class="form-horizontal" name="c_book_appoinment" id="c_book_appoinment" method="post" action="#">
       			  <div class="form-group ">
       			  	<div class="col-sm-6">
       			  		<input type="text" class="form_bor_bot" id="u_name" name="u_name" placeholder="Name" value="<?php echo $consultant_data['u_name']; ?>" readonly>
       			  	</div>
       			  	<div class="col-sm-6">
       			  		<input type="text" class="form_bor_bot" id="education" name="education" value="<?php echo $consultant_data['education']; ?>" placeholder="Qualification" readonly>
       			  	</div>
				  </div>
				  <div class="form-group ">
				  	<div class="col-sm-6">
				  		<input type="text" class="form_bor_bot lettersOnly" id="name" name="name" value= "<?php echo $customer_data['u_name']; ?>" placeholder="Full Name" required><span class="compulsary">*</span>
				  	</div>
				  	<div class="col-sm-6">
				  		<input type="email" class="form_bor_bot" id="email" name="email" value="<?php echo $customer_data['u_email'];?>" placeholder="Email" required><span class="compulsary">*</span>
				  	</div>
				  </div>
				  <div class="form-group ">
				  	<div class="col-sm-6">
				  		<input type="text" class="form_bor_bot numbersOnly" minlength="10" maxlength="10" id="ph_no" name="ph_no" value="<?php echo $customer_data['u_mobileno'];?>" placeholder="Phone Number" required><span class="compulsary">*</span>
				  	</div>
				  	<div class="col-sm-6">
				  		<input type="text" class="form_bor_bot" id="company_name" name="company_name" placeholder="Company Name" required><span class="compulsary">*</span>
				  	</div>
				  </div>
				  <div class="form-group ">
				  	<div class="col-sm-6">
				  		<input type="text" class="form_bor_bot" id="topic_discussion" name="topic_discussion" placeholder="Topic to Discuss" required><span class="compulsary">*</span>
				  	</div>
				  	<div class="col-sm-6">
				  		<input type="text" class="form_bor_bot" id="datepicker" name="date_pref" placeholder="Date Preference" required readonly><span class="compulsary">*</span>
				  	</div>
				  </div>
				  <div class="form-group">
					 <center><input type="submit" name="btnAvailabilty" id="submit" class="btn btn_orange " value="Submit Request" /></center> 
				  </div>
					<input type="hidden1"  id="consultant_id" name="consultant_id" value="<?php echo $consultant_data['userId']?>">
					<input type="hidden1"  id="user_id" name="user_id" value="<?php echo $customer_data['userId']?>">
			</form>
			
		</div><div class="clearfix"></div><br/>
      </div>
    </div>

  </div>
</div>
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?=$theme_url?>/js/jquery.bxslider.js"></script>
<script>
	$("ul").find("a").click(function(e) {
  //  e.preventDefault();
    var section = $(this).attr("href");
    $("html, body").animate({
        scrollTop: $(section).offset().top-120
    });
});
//readmore
$(document).ready(function() {
	var showChar = 600;
	var ellipsestext = "...";
	var moretext = "Read More";
	var lesstext = "Show Less";
	$('.readmore').each(function() {
		var content = $(this).html();

		if(content.length > showChar) {

			var c = content.substr(0, showChar);
			var h = content.substr(showChar-1, content.length - showChar);

			var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

			$(this).html(html);
		}

	});

	$(".morelink").click(function(){
		if($(this).hasClass("less")) {
			$(this).removeClass("less");
			$(this).html(moretext);
		} else {
			$(this).addClass("less");
			$(this).html(lesstext);
		}
		$(this).parent().prev().toggle();
		$(this).prev().toggle();
		return false;
	});
});


</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
 <script type="text/javascript">
 	 $(function() {
               $("#datepicker").datepicker({ dateFormat: "dd-mm-yy", minDate: 0}).val()
       });
 </script>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>  
<script>  
jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
jQuery('.lettersOnly').keyup(function () { 
    this.value = this.value.replace(/[^A-Za-z\.]/g,'');
});
jQuery.validator.addMethod("valEmail", function(value, element) {
  return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test( value );
}, 'Please enter a valid email address');
$("#c_book_appoinment").validate({
   rules: {  
				name:{
					required:true
				},
				company_name:{
					required:true
				},
				email:{
					required:true,
					valEmail:true
				},
				ph_no:{
					required:true
				},
				date_pref:{
					required:true
				},
				topic_discussion:{
					required:true
				},
			},
			messages: { 
				name:{
					required:"Please enter name"
				},
				company_name:{
					required:"Please enter company name"
				},
				email:{
					required:"Please enter email id"
				},
				ph_no:{
					required:"Please enter phone number"
				},
				topic_discussion:{
					required:"Please enter topic to discuss"
				},
				date_pref:{
					required:"Please select date preference"
				},
			}
		}); 


	function open_modal(){
	// Clear Form Validation Message
		var $formID = $('#c_book_appoinment');
	    $formID.validate().resetForm();
	    $formID.find('.error').removeClass('error');
	   // $('#c_book_appoinment :input[type="text"]').val('');	
	}
	
	
/*** image slider ***/	
		(function($){
		$(document).ready(function(){

	            //bxslider
$('#slide-counter').prepend('<strong class="current-index"></strong>/');

var slider = $('#slideshow').bxSlider({
	auto: true,
	pager:false,
	onSliderLoad: function (currentIndex){
		$('#slide-counter .current-index').text(currentIndex + 1);
	},
	onSlideBefore: function ($slideElement, oldIndex, newIndex){
		$('#slide-counter .current-index').text(newIndex + 1);
	}
});

$('#slide-counter').append(slider.getSlideCount());

			});
				 
		})(jQuery);
		
</script>
<?php echo $this->template->contentEnd();	?> 