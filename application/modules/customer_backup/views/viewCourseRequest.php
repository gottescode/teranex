 

<div class="container-fluid myprofile-bg dahboard-bg">

  <div class="container">

    <div class="col-sm-5 padd-0">

      <ul>

        <li class="myprofile">View Group Buying Request Quotation</li>

      </ul>

    </div>
    <div class="col-sm-7 padd-0">
  	<ul>
    	<li class="" style="float: right;margin: 6px 0;"><a href="<?php echo site_url();?>">Go To My Stelmac </a></li>
  	</ul>
</div>

  </div>

  <!-- /.container --> 

</div>

<!-- /.myprofile-bg dahboard-bg -->

<div class="welcome-j-bg">

  <div class="container">

    <!-- <div class="col-sm-8 col-lg-10 padd-0">

      <ul>

       

      </ul>

    </div>

    <div class="col-sm-4 col-lg-2 padd-0">

      <ul>

        <li class=""><a href="<?php echo site_url()."customer/profile/".formaturl($_SESSION['u_name']);?>">Go To My Teranex </a> |</li>

        <li class=""><a href="<?php echo site_url()."pages/logout";?>">Sign Out </a></li>

      </ul>

    </div> -->

  </div>

  <!-- /.container --> 

</div>

<!-- /.welcome-j-bg -->



<div class="row margin_0" style="background-color: #353537;">

<?php   $this->load->view("cust_side_menu" ); ?>

	<div class="bg_white"> 

		<div class="col-lg-10 col-md-9 col-sm-9 col-xs-12"> 

		<div class="border_bot col-sm-offset-3 col-md-4 col-sm-4 col-xs-12" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;">  

               <?php// print_r($result);exit; ?>

				<form class="form" name="qoutationAdd" id="traineeAdd" method="post" action="" enctype="multipart/form-data">

					<div class="form-group">

						<label>Category Name : </label> <?php echo $result['category_name']?> 

					</div><div class="clearfix"></div>

					<div class="form-group">

						<label>Model Name :</label> <?php echo $result['model_name']?>

					</div>

					<div class="form-group">

						<label>Brand Name :</label> <?php echo $result['brand_name']?>

					</div>

					

					<div class="form-group ">

						<label>Company Name:</label> <?php echo $result['company_name']?> 

					</div>

				
					<div class="form-group ">

						<label>No Of Participants :</label> <?php echo $result['noofparticipants']?> 

					</div>

				 

					 <div class="clearfix"></div>

					 

					<div class="form-group col-sm-12 col-xs-6">

					   <center>
					   		<?php   if( $result['supplier_id']!='0'){  }else{?>

							<a class="btn btn-success" href="<?php echo site_url()."customer/supplierCourseRfqAccept/"?><?php echo $result['csr_id'] ?>" >Generate Quotation</a>

							<a class="btn btn-danger" href="<?php echo site_url()."customer/supplierCourseRfqReject/"?><?php echo $result['csr_id'] ?>" >Reject</a>

							<?php }?>


					   </center>

					</div>

					 

				</form>

		</div>

		</div>

			<div class="clearfix"></div>
	</div>
</div>

<?php $this->template->contentBegin(POS_BOTTOM);?> 

<?php $this->template->contentEnd();	?> 