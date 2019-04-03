<?
	$user_type = $this->session->userdata('user_type');
	$user_role = $this->session->userdata('user_role'); 
	$arrayData = array();

	$arrayData['user_type'] = $user_type;
	$arrayData['user_role'] = $user_role;
	//print_r($arrayData);exit;
	$url = site_url()."pages/adminapi/menuListByuserRoleType"; 
		$menuList =  apiCall($url, "post",$arrayData);
		
		$comment = array();
		foreach ($menuList['result'] as $old_key => $asset)
		{	
			 $new_key = $asset['menu_id'];
			 $comment[ $new_key ] = $asset;
		}
		$menuList = $comment;
		
		// now loop your menuList list, and everytime you find a child, push it 
		//   into its parent
		foreach ($menuList as $k => &$v) {
		  if ($v['parent_id'] != 0) {
			$menuList[$v['parent_id']]['childs'][] =& $v;
		  }
		}
		unset($v);

		// delete the childs menuList from the top level
		foreach ($menuList as $k => $v) {
		  if ($v['parent_id'] != 0) {
			unset($menuList[$k]);
		  }
		}
		$details=0;
		// now we display the menuList list, this is a basic recursive function
	function display_menuList(array $menuList, $level = 0) {
		foreach ($menuList as $info) {
	?>		
			<li class="<?php if($info['childs']){ ?>has-sub<?php } ?>"><a href="<?php echo site_url().$info['menu_url'];?>"><?php echo $info['menu_desc'] ?></a>
				<?php if($level!=0){ ?>	<?	} ?>
		<?php if (empty($info['childs'])) { ?>
			</li> 
		<? } ?>
		<?
			if (!empty($info['childs'])) {
			?>
			<ul>
				<?	display_menuList($info['childs'], $level +1); ?>
			</ul>
		<?
			}
		?>		
		<?php if (!empty($info['childs'])) { ?></li> 
			<? } ?>
		<?
	  }
	  
	}
?>

<style type="text/css">
	/*ul.main_ul li{
		padding-left: 15px;
	}
	li.has-sub ul li{
		padding: 0;
	}*/
</style>
<?php 
	
	/*  1 Supplier		2 Customer 		3 Freelancer		4 TERANEX 
			1;"Admin"
			2;"Sales"
			3;"Service"
			4;"Finance"
			5;"Training"
			6;"Applications"	
			7;"Programming"
			8;"Designing"
			9;"Superuser"
			10;"Operator"
			11;"Support"
			12;"Attendee"	*/
?>
    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2 col-flex padd-0" style="min-height: 100%;">
      	<div class="sidebar-navigation">
		
		 	
	     <ul>
		<li> 
			<!-- <a href="<?php echo site_url()."customer/profile_detail/";?>">===DYNAMIC MENU===</a> -->
		</li>
		<?php if($user_type!=2 AND $user_type!=3 ) { ?>
		<li class="has-sub">
			<a href="javascript:void(0)">Technical Services Request</a>
				<ul>
					<li class=""><a href="<?php echo site_url()."customer/training_request_supplier/";?>">Service Agreement</a></li>
					<li class=""><a href="<?php echo site_url()."customer/training_request_supplier_onDemand/";?>">On Demand</a></li>
					<li class=""><a href="<?php echo site_url()."customer/training_request_supplier_warrenty/";?>">Warrenty List</a></li>
				</ul>
		</li> 
			<li class=""><a href="<?php echo site_url()."customer/application_support_request_supplier/";?>">Application Request List</a></li>
		<!--<li class=""><a href="<?php echo site_url()."customer/spare_part_requests/";?>">Spare Part Request List</a></li>-->
		<? } ?>
		<?php if($user_type!=2 AND $user_type!=3) { ?>
	<!-- 
	
	<li class=""><a href="<?php echo site_url()."customer/machineOrdersSupplier/";?>">Machine Orderes</a></li>
	-->	
		<? } ?>
		<?php if($user_type==2) { ?>
	<!-- 
	
	<li class=""><a href="<?php echo site_url()."customer/machineOrdersCustomer/";?>">Machine Orderes</a></li>
	-->	
		<? } ?>
		
		<?php if($user_type==3) { ?>
		<li class=""><a href="<?php echo site_url()."customer/freelancer_requestList/";?>">Freelancer Request List</a></li>
		<? } ?>
			<?php display_menuList($menuList);?>
		</ul>  
      	</div>
    </div>
    <!-- /.col-sm-3 col-md-2 -->

					
