 
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Work Experience</li>
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
        <li class="">Welcome <? echo $_SESSION['CustomerCompany'];?></li>
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
<!-- /.welcome-j-bg -->

<div class="row margin_0" style="background-color: #353537;">
	<?php   $this->load->view("cust_side_menu" ); ?> 
	<div class=" bg_white">  
		<div class="col-sm-9 col-md-9 col-lg-10">
			<div class="border_bot col-sm-offset-2 col-sm-8 col-xs-8" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;margin-top: 30px;">
				<form class="form" name="workexperience" id="workexperience" method="post" action="">
					<div class="form-group">
						<div class="col-sm-6">
							<input type="text" class="form_bor_bot" id="title" name="title" placeholder="Work Title" value="" /><span class="compulsary">*</span>
						</div>
						<div class="col-sm-6">
							<textarea type="text" class="form_bor_bot" id="exp_details" name="exp_details" placeholder="Experience Details"></textarea>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="form-group">
						<div class="col-sm-6">
							<input type="text" class="form_bor_bot numbersOnly" id="sartDatepicker" name="sartDatepicker" placeholder="Start Date"  /><span class="compulsary">*</span>
						</div>
						<div class="col-sm-6">
							<input type="text" class="form_bor_bot" id="endDatepicker" name="endDatepicker" placeholder="End Date"  /><span class="compulsary">*</span>
						</div>
					</div><div class="clearfix"></div>
					<div class="clearfix"></div>
					<div class="form-group">
						<div class="col-sm-12">
							Current Company	<input type="checkbox" class=" " id="current_company" name="current_company" value="Y"/>
						</div>
					</div><div class="clearfix"></div><br/>
					<div class="form-group col-sm-12 col-xs-6">
					   <center><input type="submit" name="btnExperince" id="submit" class="btn btn_orange" value="Add Experience" /></center>
					</div>
				</form>
			</div>
			<div class="clearfix"></div><br/>
			<div>
				<?php 
				if($workList)
				{
				?>
					<table id='' class="table table-striped table-hover">
						<thead>
							<tr bgcolor="#CCCCCC"><td>S.No</td><td>Title</td><td>Exp Details</td><td>Start Date</td><td>End Date</td> <td>Action</td></tr>
						</thead>
						<tbody>
								<?php
								$SNo = 1;
								foreach($workList as $rowWork)
								{
									?>
									<tr>
										<td><?php echo $SNo;?></td>
										<td><?php echo $rowWork['title'];?></td>
										<td><?php echo $rowWork['exp_details'];?></td>
										<td><?php echo date_dmy($rowWork['start_date']);?></td>
										<td><?php if($rowWork['current_company']=='Y'){ echo "Current Working";}else{echo date_dmy($rowWork['end_date']);};?></td> 
										<td>  
											<a href="<?php echo site_url()?>customer/workExperinceDelete/<?=$rowWork['ued_id']?>"   >Delete</a> &nbsp; &nbsp;
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
		</div><div class="clearfix"></div>
	</div>
</div>
<!-- /.row --> 
	  
<?php $this->template->contentBegin(POS_BOTTOM);?> 
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>  
 
 <script type="text/javascript">
 	 $(function() {
               $("#sartDatepicker").datepicker({ dateFormat: "yy-mm-dd", maxDate: 0}).val()
               $("#endDatepicker").datepicker({ dateFormat: "yy-mm-dd", maxDate: 0}).val()
       }); 
$("#workexperience").validate({
   rules: {  
				title:{
					required:true
				},
				sartDatepicker:{
					required:true
				},
				endDatepicker:{
					required:true
				},
			},
			messages: { 
				title:{
					required:"Please enter title"
				},
				sartDatepicker:{
					required:"Please select start date"
				},
				endDatepicker:{
					required:"Please select end date"
				},
			}
		}); 
		</script>
<?php $this->template->contentEnd();	?> 