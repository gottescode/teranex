<?php
include('header.php'); 
?>

<!-- content starts -->
	<div class="container-fluid userprofile">
		<div class="container">
			<span class="myprofile">My Profile</span>
			<span class="profedit-btn"><a>Edit Profile</a>  |  <a>Save</a></span>
		</div>
	</div>
	<div class="container ">
		<div class="col-sm-6">
				 <div class="col-md-12 col-lg-12 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr class="sec-bg">
                        <td colspan="2">Personal</td>
                      </tr>
                      <tr>
                        <td>First Name</td>
                        <td colspan="2">Dave</td>
                      </tr>
                      <tr>
                        <td>Last Name</td>
                        <td colspan="2">Geoffreys</td>
                      </tr>
                      <tr>
                        <td>Birthday</td>
                        <td colspan="2">17/05/1978</td>
                      </tr>
                      <tr>
                        <td>Language</td>
                        <td colspan="2">English</td>
                      </tr>
                    </tbody>
                  </table>
				  
                  <table class="table table-user-information">
                    <tbody>
                      <tr class="sec-bg">
                        <td colspan="2">Company</td>
                      </tr>
                      <tr>
                        <td>Company Name</td>
                        <td colspan="2">J.J. Engineering</td>
                      </tr>
                      <tr>
                        <td>Job Title</td>
                        <td colspan="2">Sales Manager</td>
                      </tr>
                      <tr>
                        <td>City</td>
                        <td colspan="2">Delhi</td>
                      </tr>
                      <tr>
                        <td>Country</td>
                        <td colspan="2">India</td>
                      </tr>
                    </tbody>
                  </table>
                  
				  <table class="table table-user-information">
                    <tbody>
                      <tr class="sec-bg">
                        <td colspan="2">Contact</td>
                      </tr>
                      <tr>
                        <td>Email Address</td>
                        <td colspan="2">Dave@JJEngineering.com</td>
                      </tr>
                      <tr>
                        <td>Password</td>
                        <td colspan="2"></td>
                      </tr>
                      <tr>
                        <td>Phone Number</td>
                        <td colspan="2">(91) 9823 009978</td>
                      </tr>
                      <tr>
                        <td>Preferred Contact</td>
                        <td colspan="2">Email</td>
                      </tr>
                    </tbody>
                  </table>
                  
				  <table class="table table-user-information specific-interests">
                    <tbody>
                      <tr class="sec-bg">
                        <td colspan="2">Specific Interests</td>
                      </tr>
                      <tr>
                        <td><input type="checkbox">Consulting</td>
                        <td colspan="2"><input type="checkbox">Spare Parts</td>
                      </tr>
                      <tr>
                        <td><input type="checkbox">Contract Manufacturing</td>
                        <td colspan="2"><input type="checkbox">Tooling's</td>
                      </tr>
                      <tr>
                        <td><input type="checkbox">Hosting an Event</td>
                        <td colspan="2"><input type="checkbox">Training</td>
                      </tr>
                      <tr>
                        <td><input type="checkbox">Programming</td>
                        <td colspan="2"><input type="checkbox">Used Machines</td>
                      </tr>
                      <tr>
                        <td><input type="checkbox">Remote Service</td>
                      </tr>
                    </tbody>
                  </table>
				</div>
		</div>
		<div class="col-sm-6 user-pay-tab">
			<div class="user-img"><img src="images/profile-img.jpg" class="img-responsive"></div>
			<div class="payment">
			   <ul class="nav nav-tabs">
				<li class="col-sm-6 active"><a href="#pay-details-1">Payment Details 1</a></li>
				<li class="col-sm-6"><a href="#pay-details-2">Payment Details 2</a></li>
			   </ul>
			   <div class="tab-content">
				<div id="pay-details-1" class="tab-pane fade in active">
					<table class="table table-user-information">
						<tbody>
						  <tr>
							<td>Card Name</td>
							<td colspan="2">Dave Geoffreys</td>
						  </tr>
						  <tr>
							<td>Card Type</td>
							<td colspan="2">Mastercard</td>
						  </tr>
						  <tr>
							<td>Card Number</td>
							<td colspan="2">1345 6783 9289 0399</td>
						  </tr>
						</tbody>
					  </table>
				</div>
				<div id="pay-details-2" class="tab-pane fade">
				  <table class="table table-user-information">
						<tbody>
						  <tr>
							<td>Card Name</td>
							<td colspan="2">Dave Geoffreys</td>
						  </tr>
						  <tr>
							<td>Card Type</td>
							<td colspan="2">Mastercard</td>
						  </tr>
						  <tr>
							<td>Card Number</td>
							<td colspan="2">1345 6783 9289 0399</td>
						  </tr>
						</tbody>
					  </table>
				</div>
			   </div>
			</div>
			<div class="payment">
			   <ul class="nav nav-tabs">
				<li class="col-sm-6 active"><a href="#delivery-details-1">Payment Details 1</a></li>
				<li class="col-sm-6"><a href="#delivery-details-2">Payment Details 2</a></li>
			   </ul>
			   <div class="tab-content">
				<div id="delivery-details-1" class="tab-pane fade in active">
					<table class="table table-user-information">
						<tbody>
						  <tr>
							<td>Address 1</td>
							<td colspan="2">307 Oxwall Hallmark</td>
						  </tr>
						  <tr>
							<td>Address 2</td>
							<td colspan="2">Nolene Nagar</td>
						  </tr>
						  <tr>
							<td>City</td>
							<td colspan="2">New Delhi</td>
						  </tr>
						  <tr>
							<td>State</td>
							<td colspan="2">Delhi</td>
						  </tr>
						  <tr>
							<td>Country</td>
							<td colspan="2">India</td>
						  </tr>
						  <tr>
							<td>Post Code</td>
							<td colspan="2">100601</td>
						  </tr>
						</tbody>
					</table>
				 </div>
				<div id="delivery-details-2" class="tab-pane fade">
					<table class="table table-user-information">
						<tbody>
						  <tr>
							<td>Address 1</td>
							<td colspan="2">307 Oxwall Hallmark</td>
						  </tr>
						  <tr>
							<td>Address 2</td>
							<td colspan="2">Nolene Nagar</td>
						  </tr>
						  <tr>
							<td>City</td>
							<td colspan="2">New Delhi</td>
						  </tr>
						  <tr>
							<td>State</td>
							<td colspan="2">Delhi</td>
						  </tr>
						  <tr>
							<td>Country</td>
							<td colspan="2">India</td>
						  </tr>
						  <tr>
							<td>Post Code</td>
							<td colspan="2">100601</td>
						  </tr>
						</tbody>
					</table>
				 </div>
			   </div>
			</div>
		</div>
	</div>
	<!-- content end -->
	
	<?php
		include('footer.php'); 
	?>
<script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
});
</script>