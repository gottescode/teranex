<?php
$this->template->contentBegin(POS_TOP);
$user_id = $this->session->userdata('uid');
$machineID =4001;
// remote application
?>
<!-- chating ui css-->
<style type="text/css">
    img{ max-width:100%;}
    .inbox_people {
        background: #f8f8f8 none repeat scroll 0 0;
        float: left;
        overflow: hidden;
        width: 40%; border-right:1px solid #c4c4c4;
    }
    .inbox_msg {
        border: 1px solid #c4c4c4;
        clear: both;
        overflow: hidden;
        background: #fff;
    }
    .top_spac{ margin: 20px 0 0;}


    .recent_heading {float: left; width:40%;}
    .srch_bar {
        display: inline-block;
        text-align: right;
        width: 60%; padding:
    }
    .headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

    .recent_heading h4 {
        color: #05728f;
        font-size: 21px;
        margin: auto;
    }
    .srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
    .srch_bar .input-group-addon button {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        padding: 0;
        color: #707070;
        font-size: 18px;
    }
    .srch_bar .input-group-addon { margin: 0 0 0 -27px;}

    .chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
    .chat_ib h5 span{ font-size:13px; float:right;}
    .chat_ib p{ font-size:14px; color:#989898; margin:auto}
    .chat_img {
        float: left;
        width: 11%;
    }
    .chat_ib {
        float: left;
        padding: 0 0 0 15px;
        width: 88%;
    }

    .chat_people{ overflow:hidden; clear:both;}
    .chat_list {
        border-bottom: 1px solid #c4c4c4;
        margin: 0;
        padding: 18px 16px 10px;
    }
    .inbox_chat { height: 550px; overflow-y: scroll;}

    .active_chat{ background:#ebebeb;}

    .incoming_msg_img {
        display: inline-block;
        width: 8%;
    }
    .incoming_msg_img img{
        border-radius: 15px;
    }
    .received_msg {
        display: inline-block;
        padding: 0 0 0 10px;
        vertical-align: top;
        width: 92%;
    }
    .received_withd_msg p {
        background: #ebebeb none repeat scroll 0 0;
        border-radius: 3px;
        color: #646464;
        font-size: 14px;
        margin: 0;
        padding: 5px 10px 5px 12px;
        width: 100%;
    }
    .time_date {
        color: #747474;
        display: block;
        font-size: 10px;
        margin: 0px 0 8px 0;
    }
    .received_withd_msg { width: 57%;}
    .mesgs {
        /*float: left;*/
        padding: 10px 0px 0 10px;
    }

    .sent_msg p {
        background: #05728f none repeat scroll 0 0;
        border-radius: 3px;
        font-size: 14px;
        margin: 0; color:#fff;
        padding: 5px 10px 5px 12px;
        width:100%;
    }
    .outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
    .sent_msg {
        float: right;
        width: 46%;
    }
    .input_msg_write input {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        color: #4c4c4c;
        font-size: 15px;
        min-height: 50px;
        width: 100%;
        border: 1px solid #c4c4c4;
        /*border-radius: 25px;*/
        padding: 0 10px;
    }

    .type_msg {/*border-top: 1px solid #c4c4c4;*/position: relative;}
    .msg_send_btn {
        background: #05728f none repeat scroll 0 0;
        border: medium none;
        border-radius: 50%;
        color: #fff;
        cursor: pointer;
        font-size: 17px;
        height: 33px;
        position: absolute;
        right: 8px;
        top: 8px;
        width: 33px;
    }
    .msg_send_btn:focus{
        outline: none;
    }
    .input_msg_write input:focus{
        outline: #a5c049;
    }
    .messaging { padding: 0 0 10px 0;}
    .msg_history {
        height: 150px;
        overflow-y: auto;
    }
    #slideshow {
        overflow: hidden;
        width: 389px;
        height: 240px;
        padding: 0;
        margin: 0 auto;
        list-style-type: none;
    }
    .bx-viewport, .bx-viewport img {
        min-height: 250px;
    }
    .finance_type h3 {
        /* padding: 36px 75px; */
        padding: 0px 14px;
    }
    video {
        display: inline-block;
        vertical-align: baseline;
        object-fit: unset;
        width: 476px;
        height: 271px;
        /* object-fit: cover; */
    }
    #slideshow li {
        list-style-type: none;
    }
    .bx-pager { text-align: center; }
    .bx-pager-item { display: inline-block; margin: 0 10px; }
    .bx-pager-item .active { color: #F08A22; }
    .bx-prev { float: left; }
    .bx-next { float: right; }
    /*.bx-prev:before{content: '\f101';} */
    #slide-counter {
        text-align: center;
        /*margin: 15px 0 0 0;*/
        font-size: 14px;
        color: #a5c049;
    }
    .cadcam1 .nbs-flexisel-item img{
        /*height: 170px;  */  
        width: 100%;
    }
    .sldsft .nbs-flexisel-nav-right {
        right: 0px;
    }
    .popover.right{
        right:125px!important;
        margin-left:0px!important;
    }
    .nbs-flexisel-nav-left, .nbs-flexisel-nav-right{display:none}
    .nbs-flexisel-inner:hover .nbs-flexisel-nav-left, 
    .nbs-flexisel-inner:hover .nbs-flexisel-nav-right{display:block;}
    .nbs-flexisel-nav-left {
        left: 10px!important;
    }
    .nbs-flexisel-nav-right {
        right: 10px!important;
    }
    .mar-tb-20 {
        margin-top: 20px;
        margin-bottom: 20px;
    }
    .softbx-bdr {
        /* min-height: 304px;*/
    }
    .videosize{    /*margin-top: 5px;*/
        height: 240px;}

    .table_nb .table>tbody>tr>td, 
    .table_nb .table>tbody>tr>th, 
    .table_nb .table>tfoot>tr>td, 
    .table_nb .table>tfoot>tr>th, 
    .table_nb .table>thead>tr>td, 
    .table_nb .table>thead>tr>th{
        padding-top: 0;
        padding-bottom: 15px;
        line-height: 22px;
        padding-left:0px;
    }
    .bx-controls-direction a {
        margin-top: 2px;
    }
    .row {
        margin-right: -8px;
        margin-left: -8px;
    }
    .finance_type h3 {
        color: #fff;
        font-family: "Helvetica Neue",Helvetica;
    }
    .finance_type .fn {
        border-radius: 10px;
        background-color: rgba(0, 0, 0, 0.6);
        /*-webkit-box-shadow: 0px 0px 10px 1px rgba(38, 245, 0, 0.72);
        -moz-box-shadow: 0px 0px 10px 1px rgba(38, 245, 0, 0.72);
        box-shadow: 0px 0px 10px 1px rgba(38, 245, 0, 0.72);*/
        border-radius: 10px;
    }
    @media screen and (max-width: 1024px){
        video{
            width: 100%;
        }
    }
    @media only screen and (max-width: 1024px) and (min-width: 769px)  {
        .container{
            padding: 0;
        }
    }
    .fg_span {
        margin-top: 5px;
        margin-bottom: 20px;
        /* float: left;*/
        /*width: 100%;*/
        display: block;
        margin-left: 10px;
    }
    h3.vconf {
        margin-bottom: 30px;
        margin-top: -2px;
    }
    .videobtn{
        margin-top:5px;
        width:100%;
        float:left;
    }
    table.member_table tr td, th{
        border: 0 !important;
    }
    .technical_spec table.table>thead>tr>th{
        border: 0 !important;
    }
    .service_avail{
        font-size: 20px;
        color: green;
    }
    .service_navail{
        font-size: 20px;
        color: red;
    }
    .dad:hover > .son-1 {
        -moz-transform: scale(2,2);
        -webkit-transform: scale(2,2);
        transform: none;
    }
    /*GALLERY*/
    .gallery .card {
        cursor: pointer;
    }

    .galleryShadow {
        display: none;
        -webkit-transition: ease all .5s;
        transition: ease all .5s;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.9);
    }

    .galleryModal {
        -webkit-transform: scale(0);
        transform: scale(0);
        -webkit-transition: ease all .5s;
        transition: ease all .5s;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background: #000;
        z-index: 10111;
    }

    .galleryModal .galleryContainer {
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        width: 80%;
        height: 80%;
    }

    .galleryModal .galleryContainer img {
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        max-width: 100%;
        max-height: 100%;
        border: 10px solid #fff;
        border-radius: 10px;
    }

    .galleryModal .galleryContainer .galleryText {
        position: absolute;
        width: 100%;
        height: auto;
        top: 100%;
        color: #fff;
        text-align: center;
    }

    .galleryModal .galleryIcon {
        position: absolute;
        font-size: 2rem;
        width: 2rem;
        height: 2rem;
        text-align: center;
        color: #fff;
    }

    .galleryModal .gIquit {
        right: 10px;
        top: 10px;
    }

    .galleryModal .gIleft {
        top: 50%;
        left: 10px;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    .galleryModal .gIright {
        top: 50%;
        right: 10px;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
    }
</style>
<style type="text/css">
    .row {
        margin-right: -8px;
        margin-left: -8px;
    }
    .mar-tb-20 {
        margin-top: 20px;
        margin-bottom: 20px;
    }
    video {
        display: inline-block;
        vertical-align: baseline;
        object-fit: unset;
        width: 396px;
    }
    .fg_span {
        margin-bottom: 30px;
        float: left;
        width: 100%;
    }
    h3.vconf {
        margin-bottom: 30px;
        margin-top: -2px;
    }
    .videobtn{
        margin-top:57px;
        width:100%;
        float:left;
    }
    .videosize {
        margin-top: 5px;
        height: 243px;
    }
</style>


<?php $this->template->contentBegin(POS_TOP);?>
<style>
.header-container1 h2, .header-container1 p{
	color: #fff;
}
.manu_intro{
	padding: 0 40px;
	min-height: 360px;
}
.manu_intro h2{
	/*min-height: 66px;*/
}
.manu_intro h2::before{
	background: #a5c049 none repeat scroll 0 0;
    top: 70px;
    content: "";
    height: 2px;
    /*left: 15px;*/
    position: absolute;
    width: 100px;
}
.manu_intro p{
	text-align: justify;
}
.describe-list li {
    margin-top: 25px;
    vertical-align: top;
}
.describe-list li i {
	color: #a5c049;
    font-size: 30px;
    margin-right: 10px;
}
.manu_process p{
	text-align: justify;
	min-height: 200px;
}
.manu_process .process{
padding: 20px;
}
.manu_application .dad{
	margin-bottom: 30px;
}
.manu_application .son-text p{
	min-height: 75px;
}
.material{
	/*width: 20%;*/
	border:1px solid #ccc;
}
.material p{
	text-align: justify;
	min-height: 200px;
}
.material h3::before{
	background: #a5c049 none repeat scroll 0 0;
    top: 60px;
    content: "";
    height: 2px;
    left: 15px;
    position: absolute;
    width: 50px;
}
.videosize {
    margin-top: 5px;
    height: 221px;
}
.collaboration-sec1 .h2-tag{
	    padding: 8% 16.5% 0;
}
@media screen and (min-width: 415px) and (max-width: 1024px){
	.manu_intro h2{
		min-height: 66px;
	}
.manu_intro h2::before {
    top: 100px;
}
.process h3{
	min-height: 56px;
}
.manu_process p {
    min-height: 250px;
}
.manu_application .son-text p {
    min-height: 100px;
}
.material h3{
	min-height: 56px;
}
.material h3::before{
	top: 80px;
}
}
@media screen and (min-width: 415px) and (max-width: 768px){
.manu_intro {
    padding: 0 20px;
}
.manu_intro h2{
	font-size: 29px;
}
.manu_process .process{
	padding: 20px;
}
.process p{
	min-height: 300px;
}
.material h3{
	font-size: 16px;
	min-height: 56px;
}
.material h3::before{
	top: 80px;
}
}
@media screen and (max-width: 414px){
.material{
	width: 100%;
}
}
.mar-tb-20 {
    margin-top: 20px;
    margin-bottom: 20px;
}
h3.vconf {
    margin-bottom: 30px;
    margin-top: 0px;
}
.fg_span {
    margin-bottom: 30px;
    float: left;
    width: 100%;
}
.videobtn {
    margin-top: 55px;
    width: 100%;
    float: left;
}
.process1 {
    text-align: center;
    padding: 10px;
    margin-bottom: 10px;
    box-shadow: 0 0px 10px rgba(19, 19, 19, 0.10);
}
.process1 p{
	text-align: justify;
	min-height: 150px;
}
.image-upload{
	display: inline-block;background: #fff;padding: 11px;height: 42px;
}
.image-upload img {
    cursor: pointer;
}
.image-upload > input {
    display: none;
}
/*.image-upload img {
    margin-right: 10px;
    cursor: pointer;
}
.image-upload > input {
    display: none;
}*/
</style>
<?php $this->template->contentEnd();  ?> 

<section class="header-container1" style="background-image: url('<?php echo $theme_url?>/images/additive_banner.jpg');height: 100%;width: 100%;background-size: cover;">
	<div class="" style="width: 100%;background-color: #000000c4; height: 450px; position: relative;padding:125px 0 ;">
		<center>
			<h2 style="font-size: 40px;">Additive Manufacturing</h2>
			<p style="font-size: 16px;">Discover the principles and benefits of using additive<br/> manufacturing to create amazing products from 1 to 10,000 units.</p><br/>
                <form action="<?php echo base_url();  ?>additivemanufacturing/manufacturing_import" method="post" enctype="multipart/form-data">
                    <!-- <input type="file" name="file" class="btn btn_orange btn-lg" style="padding: 10px 20px;" id="file"> -->
                    <div class="image-upload " aria-haspopup="true" title="Please select your file">
						<label for="file-input" style="margin-bottom: 0;">
							<img src="<?php echo theme_url()."/images/attachment.png"?>">
						</label>
						<input id="file-input" type="file" name="file" >
					</div>
					<!-- <div class="image-upload" style="display: inline-block;">
						<label for="file-input">
							<img src="<?php echo theme_url()."/images/attachment.png"?>"/>
						</label>
						<input id="file-input" type="file"  name="file"  />
					</div> -->
                    <input type="submit" name="import" class="btn btn_orange" style="padding: 10px 20px;"  value="Upload Your File" name="submit">
                </form>
		</center>
		<div class="clearfix"></div>
	</div>
</section>
<div class="clearfix"></div>
<div class="container">
	<div class="col-sm-12 padd-0">
		<div class="row">
			 <?php foreach($additive_manufacturing_list as $additive_manufacturing) { ?>
			<div class="col-sm-6 manu_intro">
				<h2><?php echo $additive_manufacturing['additive_manufacturing_name'] ?></h2><br/>
				<img src="<?=base_url().'uploads/digitalmanufacturing/'.$additive_manufacturing['additive_manufacturing_image']?>" class="img-responsive" style="height: 300px;width: 100%;"><br/>
			</div>
			<div class="col-sm-6 manu_intro">
				<p style="margin-top: 85px;"><?php echo $additive_manufacturing['additive_manufacturing_description'] ?></p>
			</div>
			<?php } ?>
		</div>
		<hr/>
		<div class="">
			<center><h2>Additive Manufacturing <!-- Benefits -->Advantages</h2></center>
			<div class="col-sm-12 padd-0">
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="process1">
						<h3>Low Cost </h3>
						<p>It enables reduction of lead times and lowers costs significantly while ensuring added functionalities, improved performance and reduced overall weight.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="process1">
						<h3>Design Flexibility</h3>
						<p>Lighter and complex designs are possible with additive manufacturing which provides the designer with creative freedom. </p>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="process1">
						<h3>Increased Efficiency</h3>
						<p>Reduced energy consumption can be achieved by using less material while eliminating steps in the production process. Multiple designs can be tested in a cost effective manner with the help of this technology.<!--  Additive manufacturing has tremendous potential and could prove to be a key differentiator for companies to remain competitive while striving for innovation at the same time. --></p>
					</div>
				</div>
				
			 
			</div>
		</div>
		<!-- <hr/> -->
		<div class="row">
			<div class="col-sm-12">
				<center><h2>The most common <b>Additive Manufacturing</b> processes</h2>
				<p style="text-align: justify;"><b>Additive Manufacturing</b> always starts with a 3D model generated by a CAD software (Computer Aided Design). This file will serve as a blueprint for the machine, by setting perimeters and guides for the material as it lays down layer upon layer. The 3D printer uses the information of the 3D file to create very thin layers of material, often thinner than 150 microns. Once all the successive layers have been created, the Additive Manufacturing process is considered done. Depending on the technology itself, the form of the raw material can vary from solid filaments, powder, to liquid.</p></center>
				<div class="manu_process">
					<!-- <?php foreach($additive_manufacturing_processes_list as $additive_manufacturing_processes) { ?>
					<div class="col-sm-4 col-xs-12 process">
						<img src="<?=base_url().'uploads/digitalmanufacturing/'.$additive_manufacturing_processes['additive_manufacturing_process_image']?>" class="img-responsive" style="width: 100%; height: 200px;">
						<h3><?php echo $additive_manufacturing_processes['additive_manufacturing_process_name'] ?></h3>
						<p><?php echo $additive_manufacturing_processes['additive_manufacturing_process_description'] ?></p>
						<a href="" class="btn btn_orange">Learn More</a>
					</div>
					<?php } ?> -->
			
				<ul class="cadcam">
					<?php foreach($additive_manufacturing_processes_list as $additive_manufacturing_processes) { ?>
						<li>
							<div class="col-sm-12 col-xs-12 process">
								<img src="<?=base_url().'uploads/digitalmanufacturing/'.$additive_manufacturing_processes['additive_manufacturing_process_image']?>" class="img-responsive" style="width: 100%; height: 200px;">
								<h3><?php echo $additive_manufacturing_processes['additive_manufacturing_process_name'] ?></h3>
								<p><?php echo $additive_manufacturing_processes['additive_manufacturing_process_description'] ?></p>
								<center><a href="" class="btn btn_orange">Learn More</a></center>
							</div>
						</li>
					<?php } ?>
			  	</ul>
			  	</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="printing_materials">
			<center><h2>3D Printing Materials</h2></center><br/>
			<ul class="cadcam1">
				<?php foreach($printing_materials3D_list as $printing_materials3D) { ?>
					<li>
						<div class="col-sm-12 material">
							<h3><?php echo $printing_materials3D['printing_material_name'] ?></h3>
							<p><?php echo $printing_materials3D['printing_material_description'] ?></p>
						</div>
					</li>
				<?php } ?>
			</ul>
		</div>
		<div class="clearfix"></div><br/>
		<div class="manu_application">
			<center><h2>Top 3D Printing Applications</h2></center><br/>
			<!-- <?php foreach($additive_manufacturing_printing_application as $printing_application) { ?>
			<div class="col-md-4 col-sm-6 col-xs-12">
				<div class=" dad">
				  	<div class="son-1" style="background-image: url('<?=base_url().'uploads/digitalmanufacturing/'.$printing_application['printing_application_image']?>');"></div>
			    	<div class="son-text">
						<h3><?php echo $printing_application['printing_application_name'] ?></h3>
						<p><?php echo $printing_application['printing_application_description'] ?></p>
						<a href="" class="btn btn_orange">Learn More</a>
					</div>
				</div>
			</div>
			<?php } ?> -->
			<ul class="cadcam2">
					<?php foreach($additive_manufacturing_printing_application as $printing_application) { ?>
						<li>
							<div class=" col-sm-12 col-xs-12">
								<div class=" dad">
								  	<div class="son-1" style="background-image: url('<?=base_url().'uploads/digitalmanufacturing/'.$printing_application['printing_application_image']?>');"></div>
							    	<div class="son-text">
										<h3><?php echo $printing_application['printing_application_name'] ?></h3>
										<p><?php echo $printing_application['printing_application_description'] ?></p>
										<a href="" class="btn btn_orange">Learn More</a>
									</div>
								</div>
							</div>
						</li>
					<?php } ?>
			  	</ul>
		</div>
		<div class="clearfix"></div><hr/>
		<div class="container">
			<div class="col-sm-12 padd-0">
				<div class="intro">
					<center><h2>Why do you need Stelmac 3D Printing Services to create your prototype</h2>
						<h3>4 reasons to reconsider your rapid prototyping strategy</h3></center>
						
					<div class="col-sm-6 manu_intro" style="background: #f1f1f1;">
						<h2>Experience Flexibility Of Design</h2><br>
						<p>3D Printing provides you with access to geometries that were earlier not possible with other manufacturing technologies. Stelmac’s Rapid Prototyping 3D Printing service is both fast and reliable and with over 33 file formats accepted, we let you focus on your schedule and your design. Thanks to our fast turn-around, you get the exact product of your imagination in your hands in just a few days, giving you the possibility to iterate. Your product design process becomes more efficient.</p>
					</div>
						
					<div class="col-sm-6 manu_intro" style="background: #f1f1f1;">
						<h2>Speed Up Your Product Development</h2><br>
						<p>3D software can be used to design and develop any product you can think of. 3D Printing is the shortest way between your ideas, your 3D file and getting your prototype in your hands. And that's a crucial part of your product development. The good news is that you can make it fast and at an affordable price with Stelmac’s Rapid Prototyping Service. </p>
					</div>
						
					<div class="col-sm-6 manu_intro" style="background: #f1f1f1;">
						<h2>Create Prototypes And Functional Parts</h2><br>
						<p>3D Printing materials that include polyamide, alumide and metal are well suited for your prototyping test of mechanical and functional parts. Tearing, assembly or stress tests become affordable as well as easy to implement. Our exhaustive selection of professional-grade 3D-printers can produce 3D objects in various dimensions, from as thin as 0.8mm to as thick as 70 cm. You can also choose the layer thickness in our interface depending on the quality you are looking for. Stelmac’s Batch 3D Printing Service enables you to use the full potential of additive manufacturing and produce pre-series or even first series at a reasonable cost.</p>
					</div>
						
					<div class="col-sm-6 manu_intro" style="background: #f1f1f1;">
						<h2>Think Outside Of The Box</h2><br>
						<p>Traditional manufacturing processes (such as injection molding) dictate how to build a shape - 3D Printing technology doesn't. 3D Printing offers the advantage of being able to make a different product for each of your customers: mass-customization & on-demand production are new markets that you can consider with 3D Printing. Some Stelmac customers have chosen 3D Printing for production because of our quality obsession and our consistency right from the first unit up to 10,000th and beyond.</p>
					</div>
				</div>
				
				<div class="clearfix"></div><hr>
				<div class="container">
			  		<h2 style="margin-top: 4px;"><center>Request for Quotation</center></h2>
					<div class="col-sm-12 rfq-bg row-flex">
						<div class="col-sm-8 col-xs-12" style="padding-left: 0;">
							<div class="gray-bg1 collaboration-sec1">
								<img src="<?php echo $theme_url?>/images/used-machines.jpg" class="img-responsive" style="height:350px;">
								<div class="sec-collaboration1">
									<h2 class="h2-tag">An Easy Way to Send buying request to suppliers &amp; get quotes quickly.
										<ul>
											<li>Get quote sfoe your custom request</li>
											<li>Let the right suppliesrs find you</li>
											<li>Close deals with one click</li>
										</ul>
									</h2>
								</div>
							</div>
						</div>
						
						<div class="col-sm-4" style="background: #fff;">
			        <!-- <form class="form-horizontal" name="#" id="#" method="post" action="">
						<br><br>
						<a href="#" type="submit" data-toggle="modal" data-target="#signinModal" class="btn btn_orange">Request for Quote</a>
	 				</form> -->
	 				<form class="form-horizontal" name="#" id="#" method="post" action="">
					  <br/><br/>
						<?php if($this->session->userdata('uid') && $this->session->userdata('user_type')){ ?>
						<a href="<?php echo site_url()."additivemanufacturing/additive_manufacturingRFQ"?>" type="submit" class="btn btn_orange">Request for Quote</a>
						 <?php }else{?>
						<a href='#' type="submit" data-toggle='modal' data-target='#signinModal' class="btn btn_orange">Request for Quote</a>
						 <?php }?>
					</form>
				</div>
					</div>
				</div>
				<div class="clearfix"></div>
				
				<div class="clearfix"></div><hr>
				
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
		
	</div>
</div>

<div class="clearfix"></div>
	    <div style="background: #f9f9f9;">
        <div class="container">
            <div class="col-sm-12 padd-8">
                <div class="full-width pull-left mar-tb-20" id="chatWithus">
                    <div class="pull-left full-width">
                        <center><h2 style="margin-top: 0;">Chat with Us </h2></center>
                        <div class="col-sm-offset-2 col-sm-4 padd-0">	
                            <form role="form" action="" id="videoconference" method="post" enctype="multipart/form-data">
                                <h3 class="vconf">What would you likes to do?</h3>
                                <div class="form-group" style="margin-bottom:30px;">
                                    <span class="fg_span" ><input type="radio" value="T" name="video_chat" checked> Text chat</span>
                                    <span class="fg_span" ><input type="radio" value="V" name="video_chat"> Video chat </span>
                                    <span class="fg_span" ><input type="radio" value="B" name=""> Book a live demo</span>
                                </div> 
                                <div class="videobtn">
                                    <?php if ($user_id == '') { ?>
                                        <input type="button"  data-toggle="modal" data-target="#signinModal" class="btn btn_orange pull-left" value="Submit"/> 
                                    <?php } else { ?>
                                        <input type="submit" name="btnMachineVideo" class="btn btn_orange pull-left" value="Submit" id="submitrequest" data-custom="<?php echo $this->session->userdata('uid'); ?>"/> 
<?php } ?> 
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-4 padd-0">
                            <div class="T chatbox" style="margin-top: 8px;">
                                <div class="messaging">
                                    <div class="inbox_msg">
                                        <div class="mesgs">
                                            <div class="msg_history" id="msghistory">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="type_msg">
                                    <div class="input_msg_write">
                                        <?php
                                        $user_id = $this->session->userdata('uid');
                                        ?>
                                        <input type="hidden" class="write_msg" value="<?php echo $user_id; ?>" id="userid" placeholder="Type a message" />
                                        <input type="hidden" class="write_msg" value="<?php echo $machineID; ?>" id="machineId" placeholder="Type a message" />
                                        <input type="text" class="write_msg" id="message"  placeholder="Type a message" />
                                        <input type="hidden" class="write_msg" id="type" value="4001" />
                                        <?php
                                        if ($user_id == '' || $user_id == null) {
                                            ?>
                                            <button class="msg_send_btn" type="button" data-toggle="modal" data-target="#signinModal"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                        <?php } else { ?>
                                            <button class="msg_send_btn" onclick="chatingFunction(<?php echo $user_id; ?>,<?php echo $machineID; ?>)" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
<?php } ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<div class="clearfix"></div><br/>
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script type="text/javascript">
	$(document).ready(function(){
		// $(".chatbox").hide();
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".chatbox").not(targetBox).hide();
        $(targetBox).show();
    });
});

</script>
<script  src="<?php echo $theme_url;?>/js/jquery.flexisel.js"></script>
<script type="text/javascript">

$('.cadcam').each(function(){
	$(this).flexisel({
		visibleItems: 3,
		itemsToScroll: 1,  
		autoPlay: {
			enable: false,
			interval: 5000,
			pauseOnHover: true
		},
		responsiveBreakpoints: { 
			portrait: { 
				changePoint:480,
				visibleItems: 1,
				itemsToScroll: 1
			}, 
			landscape: { 
				changePoint:639,
				visibleItems: 3,
				itemsToScroll: 3
			},
			tablet: { 
				changePoint:769,
				visibleItems: 4,
				itemsToScroll: 4
			}
		}				
	});
}); 


$('.cadcam1').each(function(){
	$(this).flexisel({
		visibleItems: 5,
		itemsToScroll: 1,  
		autoPlay: {
			enable: false,
			interval: 5000,
			pauseOnHover: true
		},
		responsiveBreakpoints: { 
			portrait: { 
				changePoint:480,
				visibleItems: 1,
				itemsToScroll: 1
			}, 
			landscape: { 
				changePoint:639,
				visibleItems: 3,
				itemsToScroll: 3
			},
			tablet: { 
				changePoint:769,
				visibleItems: 4,
				itemsToScroll: 4
			}
		}				
	});
}); 

$('.cadcam2').each(function(){
	$(this).flexisel({
		visibleItems: 3,
		itemsToScroll: 1,  
		autoPlay: {
			enable: false,
			interval: 5000,
			pauseOnHover: true
		},
		responsiveBreakpoints: { 
			portrait: { 
				changePoint:480,
				visibleItems: 1,
				itemsToScroll: 1
			}, 
			landscape: { 
				changePoint:639,
				visibleItems: 3,
				itemsToScroll: 3
			},
			tablet: { 
				changePoint:769,
				visibleItems: 4,
				itemsToScroll: 4
			}
		}				
	});
}); 
</script>

<script type="text/javascript">
    $(document).ready(function () {
        getChatHistory();
    });
    setInterval(function ()
    {
        getChatHistory();
    }, 10000);//time in milliseconds
    // enter text box function

    //                                                    document.getElementById("txt_username").onkeypress = function (event) {
    //                                                        if (event.keyCode == 13 || event.which == 13) {
    //                                                            alert("You are clicked");
    //                                                        }
    //                                                    };

    //                                                    function myFunction(userId, machineId, type) {
    //                                                        $('#message').val();
    //                                                        var msg = $('#message').val();
    //                                                        var type = $("#type").val()
    //                                                         chatingFunction(userId, machineId, type);
    //                                                     }

    //                                                     function getChatHistory()
    //                                                        chatingFunction(userId, machineId, type);
    //                                                    }

    function getChatHistory()
    {
        var userId = $("#userid").val();
        var machineId = $("#machineId").val();
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url(); ?>machine/getChat/",
            data: {userId: userId, machineId: machineId},
            success: function (msg) {
                var data = JSON.stringify(msg);
                var datapars = JSON.parse(data);
                var msg = "";
                var msgFrom = "";
                var msgTo = "";
                var created_at = "";
                var htmlStr = "";
                $.each(datapars, function (eventindex, eventData) {
                    msg = eventData.message;
                    msgFrom = eventData.msg_from;
                    msgTo = eventData.msg_to;
                    created_at = eventData.created_at;
                    if (msgFrom == userId)
                    {
                        htmlStr += "<div class='incoming_msg'>";
<?php if ($u_avatar = $this->session->userdata('u_avatar') != '') { ?>
                            htmlStr += "<div class='incoming_msg_img'> <img src='<?php echo site_url() . "uploads/customer/" . $u_avatar = $this->session->userdata('u_avatar'); ?>' alt='sunil'> </div>";
<?php } else { ?>
                            htmlStr += "<div class='incoming_msg_img'> <img src='https://ptetutorials.com/images/user-profile.png' alt='sunil'> </div>";
<?php } ?>
                        htmlStr += "<div class='received_msg'>";
                        htmlStr += "<div class='received_withd_msg'>";
                        htmlStr += "<p>" + msg + "</p>";
                        htmlStr += "<span class='time_date'>" + created_at + "</span></div>";
                        htmlStr += "</div>";
                        htmlStr += "</div>";
                    } else
                    {
                        htmlStr += "<div class='outgoing_msg'>";
                        htmlStr += "<div class='sent_msg'>";
                        htmlStr += "<p>" + msg + "</p>";
                        htmlStr += "<span class='time_date'>" + created_at + "</span> ";
                        htmlStr += "</div>";
                        htmlStr += "</div>";
                    }
                });
                $("#msghistory").html(htmlStr);
            },
            error: function (result)
            {
                //alert("3232");
            },
            fail: (function (status) {
                //alert("8888");
            }),
            beforeSend: function (d) {
                //$('#div_result').html("<center><strong style='color:red'>Please Wait...<br><img height='25' width='120' src='<?php echo base_url(); ?>img/ajax-loader.gif' /></strong></center>");
            }
        });
    }
    function chatingFunction(userId, machineId, type)
    {
      // alert('hi');
        $('#message').val();
        var msg = $('#message').val();
        var type = $("#type").val();
        //alert(type);

        if (msg != "") {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>machine/saveChat/",
                // data: "userId="+userId+",machineId="+machineId+",msg="+msg,
                data: {userId: userId, machineId: machineId, msg: msg, type: type},
                success: function (msg) {
                    $("#message").val("");
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo base_url(); ?>machine/getChat/",
                        data: {userId: userId, machineId: machineId},
                        success: function (msg) {
                            var data = JSON.stringify(msg);
                            var datapars = JSON.parse(data);
                            var msg = "";
                            var msgFrom = "";
                            var msgTo = "";
                            var created_at = "";
                            var htmlStr = "";
                            $.each(datapars, function (eventindex, eventData) {
                                msg = eventData.message;
                                msgFrom = eventData.msg_from;
                                msgTo = eventData.msg_to;
                                created_at = eventData.created_at;
                                if (msgFrom == userId)
                                {
                                    htmlStr += "<div class='incoming_msg'>";
                                    htmlStr += "<div class='incoming_msg_img'> <img src='https://ptetutorials.com/images/user-profile.png' alt='sunil'> </div>";
                                    htmlStr += "<div class='received_msg'>";
                                    htmlStr += "<div class='received_withd_msg'>";
                                    htmlStr += "<p>" + msg + "</p>";
                                    htmlStr += "<span class='time_date'>" + created_at + "</span></div>";
                                    htmlStr += "</div>";
                                    htmlStr += "</div>";
                                } else
                                {
                                    htmlStr += "<div class='outgoing_msg'>";
                                    htmlStr += "<div class='sent_msg'>";
                                    htmlStr += "<p>" + msg + "</p>";
                                    htmlStr += "<span class='time_date'>" + created_at + "</span> ";
                                    htmlStr += "</div>";
                                    htmlStr += "</div>";
                                }
                            });
                            $("#msghistory").html(htmlStr);
                        },
                        error: function (result)
                        {
                            //alert("3232");
                        },
                        fail: (function (status) {
                            //alert("8888");
                        }),
                        beforeSend: function (d) {
                            //$('#div_result').html("<center><strong style='color:red'>Please Wait...<br><img height='25' width='120' src='<?php echo base_url(); ?>img/ajax-loader.gif' /></strong></center>");
                        }
                    });
                },
                error: function (result)
                {
                    //alert("3232");
                },
                fail: (function (status) {
                    //alert("8888");
                }),
                beforeSend: function (d) {
                    //$('#div_result').html("<center><strong style='color:red'>Please Wait...<br><img height='25' width='120' src='<?php echo base_url(); ?>img/ajax-loader.gif' /></strong></center>");
                }
            });
        }
    }
    $(document).ready(function () {
        // $(".chatbox").hide();
        $('input[type="radio"]').click(function () {
            var inputValue = $(this).attr("value");
            var targetBox = $("." + inputValue);
            $(".chatbox").not(targetBox).hide();
            $(targetBox).show();
        });
    });

</script>

<script type="text/javascript">
    $("#message").keyup(function (event) {
        if (event.keyCode === 13) {
            chatingFunction('<?php echo $user_id; ?>', '<?php echo $machineID; ?>');
        }
    });
    // video chat onclick function

    $("#submitrequest").click(function () {
        var customAttr = $(this).attr("data-custom");
        var radioBoxValue = $("input[name='video_chat']:checked").val();
        if (radioBoxValue == "V") {

            window.open("<?php echo site_url(); ?>/welcome/opentok", "_blank");


        }
    });
</script>

<?php echo $this->template->contentEnd(); ?> 