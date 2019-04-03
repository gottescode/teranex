 
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Training Specialties</li>
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
    <!-- <div class="col-sm-8 col-lg-10">
      <ul>
        <li class="">Welcome <? echo $_SESSION['CustomerCompany'];?></li>
      </ul>
    </div>
    <div class="col-sm-4 col-lg-2">
      <ul>
        <li class=""><a href="#">Go To My Teranex </a> |</li>
        <li class=""><a href="<?php echo site_url()."pages/logout";?>">Sign Out </a></li>
      </ul>
    </div> -->
  </div>
  <!-- /.container --> 
</div>
<!-- /.welcome-j-bg -->

<div class="">
  	<div class=" row-flex">
	<?php   $this->load->view("cust_side_menu" ); ?> 
		<div class="col-md-10 col-sm-10 col-xs-12 supplier-form" style="background-color: #fff">  
			<div class="border_bot col-sm-offset-2 col-sm-6 col-xs-12" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;height: ">
				<form class="form" name="specialties" id="specialties" method="post" action="">
					 
					<div class="form-group">
						<input type="text" class="form_bor_bot" id="title" name="title" placeholder="Specialties Title" value="" /><span class="compulsary">*</span>
					</div><div class="clearfix"></div>
					 
					<div class="form-group col-sm-12 col-xs-6">
					   <center><input type="submit" name="btnSpecialties" id="submit" class="btn btn-default submit-btn" value="Add Specialties" /></center>
					</div>
				</form>
			</div>
			<div class="clearfix"></div><br/>
			
			<?php 
			if($rainingList)
			{
			?>
				<table id='' class="table table-striped table-hover">
					<thead>
						<tr bgcolor="#CCCCCC"><td>S.No</td><td>Title</td>  <td>Action</td></tr>
					</thead>
					<tbody>
							<?php
							$SNo = 1;
							foreach($rainingList as $rowWork)
							{
								?>
								<tr>
									<td><?php echo $SNo;?></td>
									<td><?php echo $rowWork['title'];?></td> 
									<td>  
										<a href="<?php echo site_url()?>customer/trainingSpecialtiesDelete/<?=$rowWork['usd_id']?>"   >Delete</a> &nbsp; &nbsp;
									</td>
								</tr>
					<?php
								$SNo = $SNo + 1;
							}
						?>
					</tbody>
				</table>
				<?php
				}
			?>
		</div>
	</div>
<!-- /.row --> 
	  
</div>
<?php $this->template->contentBegin(POS_BOTTOM);?> 
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>  
 
 <script type="text/javascript">
 	 $(function() {
               $("#sartDatepicker").datepicker({ dateFormat: "yy-mm-dd", maxDate: 0}).val()
               $("#endDatepicker").datepicker({ dateFormat: "yy-mm-dd", maxDate: 0}).val()
       }); 
$("#specialties").validate({
   rules: {  
				title:{
					required:true
				},
				 
			},
			messages: { 
				title:{
					required:"Please select Title"
				},
				 
			}
		}); 
		</script>
<?php $this->template->contentEnd();	?> 