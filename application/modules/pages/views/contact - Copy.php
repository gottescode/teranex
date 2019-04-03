
<div class="container">

<center><h1>Contact Us</h1></center>
<div class="col-sm-8">
<img src="<?php echo $theme_url?>/images/contact-img.jpg" width="100%" class="contact-img-padd">
<form class="form-horizontal" name="contact" id="contact" method="post" action="contact.php">
  <div class="form-group ">
    <label class="col-sm-3 contact-label-text">Full Name:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control input-form" id="Name" name="Name" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 contact-label-text">Company Name:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control input-form" id="Company" name="Company" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 contact-label-text">Phone:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control input-form" id="Phone" name="Phone" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 contact-label-text">Country:</label>
    <div class="col-sm-9">
    <select name="Country" id="Country" class="form-control input-form">
    <option value="">Select...</option>
    <option value="A">A</option>
    <option value="B">B</option>
  </select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 contact-label-text">State:</label>
    <div class="col-sm-9">
    <select name="State" id="State" class="form-control input-form">
    <option value="">Select...</option>
    <option value="A">A</option>
    <option value="B">B</option>
  </select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 contact-label-text">City:</label>
    <div class="col-sm-9">
    <select name="City" id="City" class="form-control input-form">
    <option value="">Select...</option>
    <option value="A">A</option>
    <option value="B">B</option>
  </select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 contact-label-text">Email</label>
    <div class="col-sm-9">
      <input type="text" class="form-control input-form" id="Email" name="Email" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 contact-label-text">Subject:</label>
    <div class="col-sm-9">
    <select name="Subject" id="Subject" class="form-control input-form">
   <option value="">Select...</option>
    <option value="A">General Enquiry</option>
    <option value="B">Sales</option>
    <option value="B">Service</option>
  </select>
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-sm-3 contact-label-text">Message:</label>
    <div class="col-sm-9">
   <textarea rows="4" cols="50" name="Message" id="Message" class="form-control input-form">
</textarea>
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
	  <input type="submit" name="submit" id="submit" class="btn input-form contact-submit" value="Submit" />
    </div>
  </div>
</form>
</div>


<div class="col-sm-3 col-sm-offset-1">
	<div class="contact-right-text">
		<h3>Registered Office</h3>
		<p> 
		<span>B-Wing 4th Floor, Statesman House</span>
		<span>Barakhamba Road, Cannought</span>
		<span> Place,</span>
		<span>New Delhi, Delhi</span>
		<span>India, 110001</span>
		
		<h3>Phone: (+91) 9833 009976</h3>
		
		</p>
	</div>

<div class="contact-right-text">
	<h3>Corporate Office</h3>
	<p> 
	<span>7th Floor, Newry Shreya</span>
	<span>F-92, Anna Nagar (East)</span>
	<span>Chennai, Tamil Nadu</span>
	<span>India, 600102</span>
	
	</p>
</div>

<div class="contact-right-text">
	<h3>Corporate Office</h3>
	<p> 
	<span>B-Wing 4th Floor, Statesman House</span>
	<span>Barakhamba Road, Cannought</span>
	<span> Place,</span>
	<span>New Delhi, Delhi</span>
	<span>India, 110001</span></p>
</div>

<div class="contact-right-text">
	<h3>Corporate Office</h3>
	<p> 
	<span>B-Wing 4th Floor, Statesman House</span>
	<span>Barakhamba Road, Cannought</span>
	<span> Place,</span>
	<span>New Delhi, Delhi</span>
	<span>India, 110001</span>
	
	</p>
</div>

</div>

</div>

<script language="javascript" type="text/javascript">
$(document).ready(function() {
$("#contact").submit(function(){
			
	if($("#Phone").val() == "")
	{
		alert("Phone is required");
		return false;
	}
	});
});
</script>
