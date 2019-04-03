<?php session_start();
include('header.php'); 
?>

<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4">
      <ul>
        <li class="myprofile">New Machines (500)</li>
      </ul>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->

<div class="container-fluid programmers-grey-bg">
  <div class="container">
    <div class="col-sm-12">
    <div class="col-sm-8">
      <form class="navbar-form search-padd" role="search">
        <div class="col-sm-3 input-group">
          <input type="text" class="form-control search-go" placeholder="Search" name="q">
          <div class="input-group-btn">
            <button class="btn btn-default search-go" type="submit"><span>Go</span></button>
          </div>
        </div>
      </form>
      </div>
      
      
    </div>
    <div class="col-sm-8 col-md-10">
      <div class="col-sm-4 col-md-2">
        <form>
          <div class="form-group advanced-marg">
            <label for="inputEmail3" class="sort-by">Sort by:</label>
            <div class="col-sm-1">
              <select name="cars" class="form-control input-form sort-input">
                <option value="volvo">English</option>
                <option value="saab">Saab</option>
                <option value="fiat">Fiat</option>
                <option value="audi">Audi</option>
              </select>
            </div>
          </div>
        </form>
      </div>
      <div class="col-sm-4 col-md-2"> <a href="#"><span class="advanced-search">Advanced Search</span></a></div>
    </div>
    <div class="col-sm-4 col-md-2 sortby-marg">
      <p><span class="one-ten-text">1 - 10</span> of 500 Machines</p>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.container-fluid -->

  <div class="container">
    <div class="row punching-main-marg">
      <div class="col-sm-4">
        <div class="amit-border"> <img src="images/punching-img1.jpg">
          <div class="amit-text"> <span class="amit-das-text">MEP GAM1500</span> <span class="certified">NY, United States</span> <span class="punching-ny-text">3,030,090 INR</span>
            <ul>
              <li>Capacity: 150 ton</li>
              <li>Shot weight: 250 grams</li>
              <li>Type: Toggle</li>
              <li>Col straight bar 2012</li>
            </ul>
            <button type="submit" class="btn btn-default addmore-btn">View Profile </button>
          </div>
          <div class="col-sm-6 col-xs-6">
            <form class="form-horizontal">
              <div class="form-group checkbox consulting-text">
                <label> Consulting
                  <input value="" type="checkbox">
                </label>
              </div>
            </form>
          </div>
          <div class="col-sm-6 col-xs-6">
            <p class="details-text">Details ></p>
          </div>
        </div>
      </div>
      
      <div class="col-sm-4">
        <div class="amit-border"> <img src="images/punching-img1.jpg">
          <div class="amit-text"> <span class="amit-das-text">MEP GAM1500</span> <span class="certified">NY, United States</span> <span class="punching-ny-text">3,030,090 INR</span>
            <ul>
              <li>Capacity: 150 ton</li>
              <li>Shot weight: 250 grams</li>
              <li>Type: Toggle</li>
              <li>Col straight bar 2012</li>
            </ul>
            <button type="submit" class="btn btn-default addmore-btn">View Profile </button>
          </div>
          <div class="col-sm-6 col-xs-6">
            <form class="form-horizontal">
              <div class="form-group checkbox consulting-text">
                <label> Consulting
                  <input value="" type="checkbox">
                </label>
              </div>
            </form>
          </div>
          <div class="col-sm-6 col-xs-6">
            <p class="details-text">Details ></p>
          </div>
        </div>
      </div>
      
      <div class="col-sm-4">
        <div class="amit-border"> <img src="images/punching-img1.jpg">
          <div class="amit-text"> <span class="amit-das-text">MEP GAM1500</span> <span class="certified">NY, United States</span> <span class="punching-ny-text">3,030,090 INR</span>
            <ul>
              <li>Capacity: 150 ton</li>
              <li>Shot weight: 250 grams</li>
              <li>Type: Toggle</li>
              <li>Col straight bar 2012</li>
            </ul>
            <button type="submit" class="btn btn-default addmore-btn">View Profile </button>
          </div>
          <div class="col-sm-6 col-xs-6">
            <form class="form-horizontal">
              <div class="form-group checkbox consulting-text">
                <label> Consulting
                  <input value="" type="checkbox">
                </label>
              </div>
            </form>
          </div>
          <div class="col-sm-6 col-xs-6">
            <p class="details-text">Details ></p>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  
  
  <div class="container">
    <nav aria-label="...">
      <ul class="prog-pagi pagination pagination-sm">
        <li class="page-item"> <a class="page-link" href="#" tabindex="-1">Result Pages </a> </li>
        <li class="page-item"><a class="page-link" href="#">1,</a></li>
        <li class="page-item"><a class="page-link" href="#">2,</a></li>
        <li class="page-item"><a class="page-link" href="#">3,</a></li>
        <li class="page-item"><a class="page-link" href="#">4,</a></li>
        <li class="page-item"><a class="page-link" href="#">5,</a></li>
        <li class="page-item"> <a class="page-link" href="#">...Next >></a> </li>
      </ul>
    </nav>
  </div><!--- container --->
  

<?
include('footer.php'); 
?>

<script language="javascript" type="text/javascript">
$(document).ready(function() {
$("#register").submit(function(){
			
	if($("#Email").val() == "" && $("#MobileNo").val() == "")
	{
		alert("Email or Mobile No. is required");
		return false;
	}
	if($("#Email").val() != "")
	{
		var b = $("#Email").val();
		var atpos=b.indexOf("@");
		var dotpos=b.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=b.length)
		{
		  alert("Not a valid e-mail address");
		  return false;
		}
	}
	if($("#MobileNo").val() != "")
	{
		var check_mobile = $("#MobileNo").val();
		var expression = /\D/;
		if(expression.test(check_this))
		{
			alert("Contact number should be in digits only");
		}
	}

	if($("#Passcode").val() == "")
	{
		alert("Password cannot be empty");
		return false;
	}
		
	if($("#CustomerType").val() == "")
	{
		alert("Customer Type is required");
		return false;
	}
	
	var yesno = confirm("Are you sure to register");
	return yesno;
	});
});
</script>
<script type='text/javascript'>
function refreshCaptcha(){
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>