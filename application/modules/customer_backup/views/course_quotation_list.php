<div class="container-fluid myprofile-bg dahboard-bg">

  <div class="container">

    <div class="col-sm-4 padd-0">

      <ul>

        <li class="myprofile">Course Quotation List</li>

      </ul>

    </div>
    <div class="col-sm-8 padd-0">
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

        <li class=""><a href="<?php echo site_url();?>">Go To My Teranex </a> |</li>

        <li class=""><a href="<?php echo site_url()."pages/logout";?>">Sign Out </a></li>

      </ul>

    </div> -->

  </div>

  <!-- /.container --> 

</div>

<!-- /.myprofile-bg dahboard-bg -->

<div class="row margin_0" style="background-color: #353537;">

	<?php   $this->load->view("cust_side_menu" ); ?> 

	<div class="bg_white">

		<div class="col-md-10 col-sm-12 col-xs-12 ">  

			<?php 	// display messages

			if(hasFlash("dataMsgAddError"))	{	?>

			<div class="alert alert-warning alert-dismissible" role="alert">

			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

			  <?php echo getFlash("dataMsgAddError"); ?>

			</div>

			<?php }	?>



			<table id='' class="table table-striped table-hover">

				<thead>

					<tr bgcolor="#CCCCCC">
						<th>Sr.No.</th>
						<th>Product Category Name</th>  
						<th>Brand Name</th> 
						<th>Product Module</th> 
						<th>Company Name</th>  
						<th>Course Date</th> 
						<th>Course Time</th>
					</tr>

				</thead>

				<tbody>

						<?php 

						if($requestList >0){ $i=1;

							foreach($requestList  as $rowData){

							?>

							<tr>

								<td><?=$i++?></td>

								<td><?=$rowData['category_name']?></td> 
								<td><?=$rowData['brand_name']?></td> 
								<td><?=$rowData['model_name']?></td>
								<td><?=$rowData['company_name']?></td> 
								<td><?=$rowData['course_date']?></td>   
								<td><?=$rowData['course_time']?></td>   

							</tr>

						

						<?php }

							echo "";

						}else{

							echo "<tr><td colspan='7'>Record not found</td></tr>";

						}?>

				</tbody>

			</table>

		</div> 	  

		<div class="clearfix"></div>

	</div>

</div> 

<?php $this->template->contentBegin(POS_BOTTOM);?>

<script language="javascript" type="text/javascript">

</script>

<?php $this->template->contentEnd();	?> 