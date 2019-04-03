<?php session_start();

if(!isset($_SESSION["CustomerLogged"]) || $_SESSION["CustomerLogged"] == 0)
{
	header("Location: ../customer_registration.php");
}
include('../lib/config.php');
include('cust_header.php'); 
?>
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4">
      <ul>
        <li class="myprofile">My Dashboard</li>
      </ul>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->


<?
include('cust_side_menu.php'); 

$qy_supp="select CompanyName, CustomerType, CompanyType, GSTIN, PAN, Email, MobileNo, Website, CompanyLogo from customer where CustomerID='$_SESSION[CustomerID]'";
$qy_supp1=mysqli_fetch_array(mysqli_query($cn, $qy_supp));

?>


<div class="col-xs-12 col-sm-9 col-md-9 col-lg-10">
      <div class="contact-right-text">
       <br />
		
		<div class="container">
		  <div class="col-sm-5">
			<div class="profile-left">
			  <h3>Company</h3>
			  <form class="form-horizontal">
				<div class="form-group">
				  <label for="inputEmail3" class="col-sm-3 contact-label-text">Company Name</label>
				  <div class="col-sm-9">
					<input type="email" class="form-control input-form" id="inputEmail3" placeholder="" value="<? echo $qy_supp1['CompanyName'];?>" >
				  </div>
				</div>
				
				<div class="form-group">
				  <label for="inputEmail3" class="col-sm-3 contact-label-text">Customer Type</label>
				  <div class="col-sm-9">
					<input type="email" class="form-control input-form" id="inputEmail3" placeholder="" value="<? echo $qy_supp1['CustomerType'];?>" >
				  </div>
				</div>
				
				<div class="form-group">
				  <label for="inputEmail3" class="col-sm-3 contact-label-text">Company Type</label>
				  <div class="col-sm-9">
					<input type="email" class="form-control input-form" id="inputEmail3" placeholder="" value="<? echo $qy_supp1['CompanyType'];?>" >
				  </div>
				</div>
				
				<div class="form-group">
				  <label for="inputEmail3" class="col-sm-3 contact-label-text">GSTIN</label>
				  <div class="col-sm-9">
					<input type="email" class="form-control input-form" id="inputEmail3" placeholder="" value="<? echo $qy_supp1['GSTIN'];?>" >
				  </div>
				</div>
				
				<div class="form-group">
				  <label for="inputEmail3" class="col-sm-3 contact-label-text">PAN</label>
				  <div class="col-sm-9">
					<input type="email" class="form-control input-form" id="inputEmail3" placeholder="" value="<? echo $qy_supp1['PAN'];?>" >
				  </div>
				</div>
				
				
			  </form>
			</div>
			
		
			<div class="profile-left">
			  <h3>Contact</h3>
			  <form class="form-horizontal">
				<div class="form-group">
				  <label for="inputEmail3" class="col-sm-3 contact-label-text">Email Address</label>
				  <div class="col-sm-9">
					<input type="email" class="form-control input-form" id="inputEmail3" placeholder="" value="<? echo $qy_supp1['Email'];?>" >
				  </div>
				</div>
				
				<div class="form-group">
				  <label for="inputEmail3" class="col-sm-3 contact-label-text">Mobile No</label>
				  <div class="col-sm-9">
					<input type="email" class="form-control input-form" id="inputEmail3" placeholder="" value="<? echo $qy_supp1['MobileNo'];?>" >
				  </div>
				</div>
				
				<div class="form-group">
				  <label for="inputEmail3" class="col-sm-3 contact-label-text">Website</label>
				  <div class="col-sm-9">
					<input type="email" class="form-control input-form" id="inputEmail3" placeholder="" value="<? echo $qy_supp1['Website'];?>" >
				  </div>
				</div>
				
				
			  </form>
			</div>
			
			<div class="profile-left">
			  <h3>Specific Interests</h3>
			  <form class="form-horizontal col-sm-6">
				<div class="form-group checkbox profile-checkbox-label">
				  <label>
					<input type="checkbox" value="">
					Machines</label>
				</div>
				
				<div class="form-group checkbox profile-checkbox-label">
				  <label>
					<input type="checkbox" value="">
					Spare Parts</label>
				</div>
				
				<div class="form-group checkbox profile-checkbox-label">
				  <label>
					<input type="checkbox" value="">
					Toolings</label>
				</div>
				
				<div class="form-group checkbox profile-checkbox-label">
				  <label>
					<input type="checkbox" value="">
					Contract Manufacturing</label>
				</div>
				
				<div class="form-group checkbox profile-checkbox-label">
				  <label>
					<input type="checkbox" value="">
					Excess capacity Utilization</label>
				</div>
				<div class="form-group checkbox profile-checkbox-label">
				  <label>
					<input type="checkbox" value="">
					Group Buying</label>
				</div>
			  </form>
			  
			  <form class="form-horizontal col-sm-6">
				<div class="form-group checkbox profile-checkbox-label">
				  <label>
					<input type="checkbox" value="">
					Programming</label>
				</div>
				
				<div class="form-group checkbox profile-checkbox-label">
				  <label>
					<input type="checkbox" value="">
					Service Support</label>
				</div>
				
				<div class="form-group checkbox profile-checkbox-label">
				  <label>
					<input type="checkbox" value="">
					Application Support</label>
				</div>
				
				<div class="form-group checkbox profile-checkbox-label">
				  <label>
					<input type="checkbox" value="">
					Live Training</label>
				</div>
				<div class="form-group checkbox profile-checkbox-label">
				  <label>
					<input type="checkbox" value="">
					Live Event</label>
				</div>
				
				<div class="form-group checkbox profile-checkbox-label">
				  <label>
					<input type="checkbox" value="">
					Consulting</label>
				</div>
			  </form>
			</div>
		  </div>
		  
		  <div class="col-sm-6">
			<div class="contact-right-text">
			  <center>
                                <img src="../image.php?img=<? echo $qy_supp1['CompanyLogo'] ?>" width="181" height="180" alt="Company Logo">
							  </center>
			  <?
			  $qy_supp2="select Name, Mobile, Email from cust_contact where CustomerID='$_SESSION[CustomerID]'";
			  $qy_supp3=mysqli_fetch_array(mysqli_query($cn, $qy_supp2));
			  ?>
			  <div id="exTab2" class="col-sm-12">
				<ul class="nav nav-tabs profile-tabs">
				  <li class="active"> <a  href="#1" data-toggle="tab">Contact Details 1</a> </li>
				  <li><a href="#2" data-toggle="tab">Contact Details 2</a> </li>
				</ul>
				
				<div class="tab-content">
				  <div class="profile-left tab-pane active" id="1">
					<form class="form-horizontal">
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 contact-label-text">Contact Name</label>
						<div class="col-sm-8">
						  <input type="email" class="form-control input-form" id="inputEmail3" placeholder="" value="<? echo $qy_supp3['Name'];?>" />
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 contact-label-text">Contact No</label>
						<div class="col-sm-8">
						  <input type="email" class="form-control input-form" id="inputEmail3" placeholder="" value="<? echo $qy_supp3['Mobile'];?>" />
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 contact-label-text">Email</label>
						<div class="col-sm-8">
						  <input type="email" class="form-control input-form" id="inputEmail3" placeholder="" value="<? echo $qy_supp3['Email'];?>" />
						</div>
					  </div>
					</form>
				  </div>
				  
				  <div class="tab-pane" id="2">
					<h3>Notice the gap between the content and tab after applying a background color</h3>
				  </div>
				</div>
			  </div>
			  
			  <?
			  $qy_supp4="select Address1, Address2, City, State, Country, PinCode from cust_address where CustomerID='$_SESSION[CustomerID]'";
			  $qy_supp5=mysqli_fetch_array(mysqli_query($cn, $qy_supp4));
			  ?>
			  <div id="exTab12" class="col-sm-12">
				<ul class="nav nav-tabs profile-tabs">
				  <li class="active"> <a  href="#5" data-toggle="tab">Address Details 1</a> </li>
				  <li><a href="#6" data-toggle="tab">Address Details 2</a> </li>
				</ul>
			   
				<div class="tab-content">
				  <div class="profile-left tab-pane active" id="5">
					<form class="form-horizontal">
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 contact-label-text">Address 1</label>
						<div class="col-sm-8">
						  <input type="email" class="form-control input-form" id="inputEmail3" placeholder="" value="<? echo $qy_supp5['Address1'];?>" />
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 contact-label-text">Address 2</label>
						<div class="col-sm-8">
						  <input type="email" class="form-control input-form" id="inputEmail3" placeholder="" value="<? echo $qy_supp5['Address2'];?>" />
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 contact-label-text">City</label>
						<div class="col-sm-8">
						  <input type="email" class="form-control input-form" id="inputEmail3" placeholder="" value="<? echo $qy_supp5['City'];?>" />
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 contact-label-text">Stare</label>
						<div class="col-sm-8">
						  <input type="email" class="form-control input-form" id="inputEmail3" placeholder="" value="<? echo $qy_supp5['State'];?>" />
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 contact-label-text">Country</label>
						<div class="col-sm-8">
						  <input type="email" class="form-control input-form" id="inputEmail3" placeholder="" value="<? echo $qy_supp5['Country'];?>" />
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 contact-label-text">Post Code</label>
						<div class="col-sm-8">
						  <input type="email" class="form-control input-form" id="inputEmail3" placeholder="" value="<? echo $qy_supp5['PinCode'];?>" />
						</div>
					  </div>
					</form>
				  </div>
				 
				  <div class="tab-pane" id="6">
					<h3>Notice the gap between the content and tab after applying a background color</h3>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
      </div>
    </div>
    <!-- /.col-sm-6 col-lg-6 col-lg-offset-1--> 
  </div>
  <!-- /.row --> 
  
</div>
<!-- /.container -->
<?
include('cust_footer.php'); 
?>
