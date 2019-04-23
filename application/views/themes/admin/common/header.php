<!-- HEADER -->
	<header class="main-header">
	<!-- Logo -->
    <a href="<?php echo site_url()."dashboard";?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">Admin</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Stelmac</b> </span>
    </a> 
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav"> 
		  <?php 
				$uid=$this->session->userdata('user_id');
				$url=site_url()."dashboard/api/findSingleProfile/$uid";
				$adminUserdata=apicall($url,"get");
				$adminUserdata=$adminUserdata['result']; 
			?>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<?php if($adminUserdata['profile_pic']!='')
				{

			?>
			   <img src="<?=site_url().'uploads/prof_image/'.$adminUserdata['profile_pic'];?>" class="user-image" alt="User" style="float: left; width: 39px; height: 39px; border-radius: 66px;margin-right: 6px; margin-top: -9px;">

				 
			<?	}else {?>
			<img src="<?php echo $theme_url?>/images/PersonPlaceholder.png" class="user-image" alt="User" style="float: left; width: 39px; height: 39px; border-radius: 66px;margin-right: 6px; margin-top: -9px;">
			<?php
				}
			?>	
            
              <span class="hidden-xs"><?php echo $adminUserdata['uname'];?></span>
            </a>
			
            <ul class="dropdown-menu">
			   <li class="user-header">
			   <?php 
				if($adminUserdata['profile_pic']!='')
				{ 
			?> <img src="<?=site_url().'uploads/prof_image/'.$adminUserdata['profile_pic'];?>" class="img-circle" alt="User Image"> 
			<?	}else {?> 
				<img src="<?php echo $theme_url?>/images/PersonPlaceholder.png" class="img-circle" alt="User Image">
			<?php
				}
			?>	 <p>
				  <?=$adminUserdata['uname']?>
				</p>
			  </li>
			  <li class="user-footer">
				<div class="text-center">
					<a href="<?=site_url().'dashboard/changePassword'?>"class="btn btn-default btn-flat">Password</a>
					<a href="<?=site_url().'dashboard/updateprofile'?>"class="btn btn-default btn-flat">
					Profile</a>
					<a href="<?php echo site_url()."/loginbackend/logout"; ?>" title="Sign Out"class="btn btn-default btn-flat">Logout</a> 
				</div>
			  </li>
            </ul>
          </li>
        </ul>
      </div>
	</nav>
  </header>
		<!-- END HEADER -->