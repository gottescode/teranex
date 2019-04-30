<?php
$this->template->contentBegin(POS_TOP);
?>
<!-- chating ui css-->
<style type="text/css">
    img{ max-width:100%;}
    .inbox_people {
        background: #f8f8f8 none repeat scroll 0 0;
        float: left;
        overflow: hidden;
        /* width: 40%; */
        border-right:1px solid #c4c4c4;
    }
    .inbox_msg {
        border: 1px solid #c4c4c4;
        clear: both;
        overflow: hidden;
        background: #fff;
    }
    .top_spac{
        margin: 20px 0 0;
    }

    .recent_heading {
        float: left; width:40%;
    }
    .srch_bar {
        display: inline-block;
        text-align: right;
        width: 60%; padding:
    }
    .headind_srch{
        padding:10px 29px 10px 20px;
        overflow:hidden;
        border-bottom:1px solid #c4c4c4;
    }
    .recent_heading h4 {
        color: #05728f;
        font-size: 21px;
        margin: auto;
    }
    .srch_bar input{
        border:1px solid #cdcdcd;
        /* border-width:0 0 1px 0;
          width:80%;
          padding:2px 0 4px 6px; */
        width: 85%;
        padding: 6px;
        background:none;
    }
    .srch_bar button{
        padding: 5px;
        margin: 0;
        margin-left: -6px;
    }
    .srch_bar .input-group-addon button {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        padding: 0;
        color: #707070;
        font-size: 18px;
    }
    .srch_bar .input-group-addon { margin: 0 0 0 -27px;}
    .chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
    .chat_ib h5 span{ font-size:11px; float:right;padding: 4px;}
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
        /*padding: 18px 16px 10px;*/
        padding: 15px;
    }
    .inbox_chat { height: 365px; overflow-y: scroll;}
    .active_chat{ background:#ebebeb;}
    .incoming_msg_img {
        display: inline-block;
        width: 8%;
        float: left;
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
        float: left;
        padding: 10px 0px 0 10px;
        width: 100%;
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
        /*border: medium none;*/
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
        height: 250px;
        overflow-y: auto;
    }

    .tab-content{
        border: 0;
    }
    .nav-tabs>li.chat_list.active>a, .nav-tabs>li.chat_list.active>a:focus, .nav-tabs>li.chat_list.active>a:hover{
        color: #555;
        cursor: default;
        background-color: transparent !important;
        border: 0;
        border-bottom-color: transparent;
        padding: 0;
    }
    .nav>li.chat_list>a:focus, .nav>li.chat_list>a:hover {
        text-decoration: none;
        background-color: #eee0;
        border:0;
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
        /*margin-bottom: 30px;*/
        float: left;
        /*width: 100%;*/
    }
    h3.vconf {
        margin-bottom: 30px;
        margin-top: -2px;
    }
    .videobtn{
/*        margin-top:57px;
        width:100%;
        float:left;*/
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
    /*margin-bottom: 30px;*/
    float: left;
    /*width: 100%;*/
}
.videobtn {
/*    margin-top: 55px;
    width: 100%;
    float: left;*/
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
<section class="banner banner_image course_2_banner align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner_text">
                    <p>Discover the benefits of</p>
                    <h1 class="basic-head white-color">additive manufacturing</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section class=" bx-shdw downld-app">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 white">
                <div class="padd-left">
                    <div class="down-cntnt  our-app-txt ">
                        <p>are you interested in additive manufaturing for your custom project?</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 commut">
                <div class="down-cntnt app-box_child">
                    <h3 class="basic-head white-color">request a quote</h3>
                    <h3 class="basic-head white-color">today!</h3>
                    <button class="green-btn mrgn-top">Get A Quote</button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="additive_manufacturing">
    <div class="container">
        <div class="white bx-shdw mrgn-top">
            <div class="row">
                <?php foreach($additive_manufacturing_list as $additive_manufacturing) { ?>
                <div class="col-md-6">
                    <div class="padd_all_50">
                        <h3 class="basic-head"><?php echo $additive_manufacturing['additive_manufacturing_name'] ?></h3>
                        <p class="mrgn-top"><?php echo $additive_manufacturing['additive_manufacturing_description'] ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="c_info_im">
                        <img src="<?=base_url().'uploads/digitalmanufacturing/'.$additive_manufacturing['additive_manufacturing_image']?>" alt="img">
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<section class="mrgn-top addvantage-box">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="padd_tb_50">
                    <h3 class="basic-head">Advantages of additive manufacturing</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="text_cnt bx-shdw padd_all_50 white">
                    <h3 class="basic-head">Cost<br> Efficient</h3>
                    <p class=" ">It enables reduction of lead times and lowers costs significantly while ensuring added functionalities, improved performance and reduced overall weight.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text_cnt bx-shdw padd_all_50 white">
                    <h3 class="basic-head">Desgin<br> Flexibilty</h3>
                    <p class=" ">Lighter and complex designs are possible with additive manufacturing which provides the designer with creative freedom.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text_cnt bx-shdw padd_all_50 white">
                    <h3 class="basic-head">Increased<br>Flexibilty</h3>
                    <p class=" ">Reduced energy consumption can be achieved by using less material while eliminating steps in the production process. Multiple designs can be tested in a cost effective manner with the help of this technology.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mrgn-top bx-shdw downld-app">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 white">
                <div class="padd-left ">
                    <div class="down-cntnt  our-app-txt loan-require ">
                        <p>Need Help?</p>
                        <p>chat with taranex support!</p>
                        <button class="green-btn mar-25">Click Here</button>

                    </div>
                </div>
            </div>
            <div class="col-md-6 commut">
                <div class="down-cntnt padd_all_50 app-box_child loan-require">
                    <h3 class="basic-head white-color">prefer to talk?</h3>
                    <h3 class="basic-head white-color">video call now! </h3>
                    <button class="green-btn mar-25">Click Here</button>
                </div>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mrgn-top our-engn_head ">
                    <h2 class="basic-head">common additive manufacturing processes</h2>
                </div>

                <div class="sort-catg mrgn-top bx-shdw padd_all_50 white">
                    <div class="sort-text">
                        <p>Additive Manufacturing always starts with a 3D model generated by a CAD software (Computer Aided Design). This file will serve as a blueprint for the machine, by setting perimeters and guides for the material as it lays down layer upon layer. The 3D printer uses the information of the 3D file to create very thin layers of material, often thinner than 150 microns. Once all the successive layers have been created, the Additive Manufacturing process is considered done. Depending on the technology itself, the form of the raw material can vary from solid filaments, powder, to liquid.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    <section class="mrgn-top demand-slider" id="first-manu-add">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class=" slider_one_top">
                        <div class="silider_box bx-shdw ">
                            <div id="owl-one" class="owl-carousel owl-theme">
                                <?php foreach($additive_manufacturing_processes_list as $additive_manufacturing_processes) { ?>
                                <div class="item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="rt-cntnt">
                                                <h3 class="basic-head sub-line"><?php echo $additive_manufacturing_processes['additive_manufacturing_process_name'] ?></h3>
                                                <p ><?php echo $additive_manufacturing_processes['additive_manufacturing_process_description'] ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="">
                                                <img src="<?=base_url().'uploads/digitalmanufacturing/'.$additive_manufacturing_processes['additive_manufacturing_process_image']?>" alt="img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



<!--<section class="mrgn-top demand-slider">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class=" slider_one_top">
                    <div class="silider_box bx-shdw ">
                        <div id="sla" class="owl-carousel owl-theme">
                            <?php /*foreach($additive_manufacturing_processes_list as $additive_manufacturing_processes) { */?>
                            <div class="item">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="rt-cntnt">
                                            <h3 class="basic-head sub-line"><?php /*echo $additive_manufacturing_processes['additive_manufacturing_process_name'] */?></h3>
                                            <p ><?php /*echo $additive_manufacturing_processes['additive_manufacturing_process_description'] */?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="">
                                            <img src="<?/*=base_url().'uploads/digitalmanufacturing/'.$additive_manufacturing_processes['additive_manufacturing_process_image']*/?>" alt="img">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <?php /*} */?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>-->

<section class="two-divine">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class=" our-engn_head padd_tb_50">
                    <h2 class="basic-head">Common Additive Manufacturing Materials</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class=" slider_one_top">
                    <div class="silider_box ">
                        <div id="two-dvine" class="owl-carousel owl-theme">
                            <?php foreach($printing_materials3D_list as $printing_materials3D) { ?>
                            <div class="item bx-shdw">
                                <div class="padd_all_50   white">
                                    <h3 class="basic-head sub-line"><?php echo $printing_materials3D['printing_material_name'] ?></h3>
                                    <p class="mrgn-top"><?php echo $printing_materials3D['printing_material_description'] ?></p>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class=" our-engn_head padd_tb_50">
                    <h2 class="basic-head">Top Additive manufacturing applications</h2>
                </div>

                <div class="sort-catg  bx-shdw padd_all_50 white">
                    <div class="sort-text">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="mrgn-top demand-slider" id="first-manu-add-two">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class=" slider_one_top">
                    <div class="silider_box bx-shdw ">
                        <div id="go-add" class="owl-carousel owl-theme">
                            <?php foreach($additive_manufacturing_printing_application as $printing_application) { ?>
                                <div class="item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="rt-cntnt">
                                                <h3 class="basic-head sub-line"><?php echo $printing_application['printing_application_name'] ?></h3>
                                                <p ><?php echo $printing_application['printing_application_description'] ?></p>
                                                <button class="green-btn mrgn-top">Learn More</button>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="">
                                                <img src="<?=base_url().'uploads/digitalmanufacturing/'.$printing_application['printing_application_image']?>" alt="img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="choose-ternex">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="padd_tb_50 ">
                    <h3 class="basic-head">Why Choose Teranex</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="bx-shdw padd_all_50 mar-25 jumper white">
                    <h3 class="basic-head">Experience Flexibilty Of Desgin</h3>
                    <p class="mrgn-top">3D Printing provides you with access to geometries that were earlier not possible with other manufacturing technologies. Stelmac’s Rapid Prototyping 3D Printing service is both fast and reliable and with over 33 file formats accepted, we let you focus on your schedule and your design. Thanks to our fast turn-around, you get the exact product of your imagination in your hands in just a few days, giving you the possibility to iterate. Your product design process becomes more efficient.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bx-shdw padd_all_50 mar-25 jumper white">
                    <h3 class="basic-head">Speed Up Your Product Development</h3>
                    <p class="mrgn-top">3D software can be used to design and develop any product you can think of. 3D Printing is the shortest way between your ideas, your 3D file and getting your prototype in your hands. And that's a crucial part of your product development. The good news is that you can make it fast and at an affordable price with Stelmac’s Rapid Prototyping Service.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bx-shdw padd_all_50 mar-25 jumper white">
                    <h3 class="basic-head">Create Prototypes and functional parts</h3>
                    <p class="mrgn-top">3D Printing materials that include polyamide, alumide and metal are well suited for your prototyping test of mechanical and functional parts. Tearing, assembly or stress tests become affordable as well as easy to implement. Our exhaustive selection of professional-grade 3D-printers can produce 3D objects in various dimensions, from as thin as 0.8mm to as thick as 70 cm. You can also choose the layer thickness in our interface depending on the quality you are looking for. Stelmac’s Batch 3D Printing Service enables you to use the full potential of additive manufacturing and produce pre-series or even first series at a reasonable cost.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bx-shdw padd_all_50 mar-25 jumper white">
                    <h3 class="basic-head">Think oustside of the box</h3>
                    <p class="mrgn-top">Traditional manufacturing processes (such as injection molding) dictate how to build a shape - 3D Printing technology doesn't. 3D Printing offers the advantage of being able to make a different product for each of your customers: mass-customization & on-demand production are new markets that you can consider with 3D Printing. Some Stelmac customers have chosen 3D Printing for production because of our quality obsession and our consistency right from the first unit up to 10,000th and beyond.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mrgn-top bx-shdw downld-app">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 white">
                <div class="padd-left">
                    <div class="down-cntnt  our-app-txt ">
                        <p>need an instant quote for your custom additive manufacturing project?</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 commut">
                <div class="down-cntnt app-box_child">
                    <h3 class="basic-head white-color">request a quote</h3>
                    <h3 class="basic-head white-color">today!</h3>

                    <form class="form-horizontal" name="#" id="#" method="post" action="">
                        <br/><br/>
                        <?php if($this->session->userdata('uid') && $this->session->userdata('user_type')){ ?>
                            <a href="<?php echo site_url()."additivemanufacturing/additive_manufacturingRFQ"?>" type="submit" class="btn btn_orange">Request for Quote</a>
                        <?php }else{?>
                            <a href='#' type="submit" data-toggle='modal' data-target='#signinModal' class="a-green-btn">Get A Quote</a>
                        <?php }?>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>


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
                                                // $(".chatbox").hide();
                                                $('input[type="radio"]').click(function () {
                                                    var inputValue = $(this).attr("value");
                                                    var targetBox = $("." + inputValue);
                                                    $(".chatbox").not(targetBox).hide();
                                                    $(targetBox).show();
                                                });
                                            });

</script>

<?php echo $this->template->contentEnd(); ?>