 <?php $this->template->contentBegin(POS_TOP);?> 
 <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
  <link href="<?php echo $theme_url?>/css/ekko-lightbox.css" rel="stylesheet">
 <style type="text/css">
 .image-upload{
  display: inline-block;
 }
 	.image-upload > input
{
    display: none;
}
.image-upload img
{
    width: 16px;
    cursor: pointer;
}
.hidden {
    display: none;
}
.msgcomment{
    padding: 30px 15px;    /*border-bottom: 1px solid #eee;*/
    box-shadow: 0 7px 22px rgba(19,19,19,.10);
}
.msgcomment video,img{
    vertical-align: bottom;
        height: auto;
}
/*.msgcomment:hover{
    background-color: #f5f5f5;
}*/
.cmt_attch a{
    text-align: center;
    display: inline-block;
    padding: 0 10px;
}
.cmt_attch i{
    font-size: 25px;
    color: #ccc;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 25px;
}

ul.machne_name{
list-style-type: none;
/*border-left: 1px solid #e7e7e7;*/
}
ul.machne_name li a{
    color: #333;
}
ul.machne_name li{
    padding: 10px 10px;
    font-size: 14px;
    color: #333;
}
ul.machne_name li:hover{
    background-color: #f9f9f9;
}
 </style>
 <?php $this->template->contentEnd();	
	$imgArray=array("jpeg","JPEG","jpg","JPG","png","PNG");
	$docArray=array("pdf","PDF","DOC","doc","docx","DOCX","txt","TXT");
 ?> 
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Machine Comment</li>
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
		<li>Machine Name</li>
      </ul>
    </div>
    <div class="col-sm-4 col-lg-2 padd-0">
      <ul>
        <li class="pull-right"><a href="<?php echo site_url()."pages/logout";?>"> Sign Out </a></li>
        <li class="pull-right"><a href="<?php echo site_url();?>">Go To My Teranex </a>&nbsp;|&nbsp; </li>
      </ul>
    </div> -->
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->
<div class="row margin_0" style="background-color: #353537;">
<?php   $this->load->view("cust_side_menu" ); ?> 
<div class="">
    <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 bg_white padd-0" style="padding-top: 0;"> 
        <div class="col-sm-10" style="border-right: 1px solid #e7e7e7;">
            <div class="" style="padding: 0 30px;">
                <h3>Bending Machine ADD9226-5</h3>
            </div>
    	    <?php if($machineCommentReplyList){
    			foreach($machineCommentReplyList as $rowreply){
    			
    			$url = site_url()."machine/api/machineCommentReplyFileList/".$rowreply['mcr_id'];; 
    			$commentReplyFileList =  apiCall($url, "get"); 
    			?>
    		 
    			<div class="row msgcomment">
    				<div class="col-sm-1">
    					<?php if($rowComment['u_avatar']){?>
    						<img src="<?php echo site_url()."uploads/customer/".$rowComment['u_avatar']?>" class="img-rounded img-responsive" style="width:70px">
    					<?php }else{?>
    						<img src="<?php echo site_url()."uploads/customer/user-default.png"?>" class="img-rounded img-responsive" style="width:70px">
    					<?php }?>
    				</div>
    				<div class="col-sm-11 padd-0">
                        <div class="" style="background: #f9f9f9;padding: 5px;">
                            <b><?php echo $rowreply['u_name']?> </b>&nbsp;<br/><small> <?php echo date('M d, h:i A', strtotime( $rowreply['comment_date_time']))?></small>
                        </div>
                        <div class="clearfix"></div><br/>
                        <div class="col-sm-8 padd-0 cmt_msg" style="border-right: 1px solid #e7e7e7;min-height: 70px;">
                            <!-- <p><?php echo $rowreply['comment_msg']?></p> -->
                            <p>ebHost Manager® (WHM) lets you use your own domain name as a nameserver for websites your server hosts. To use yebHost Manager® (WHM) lets you use your own domain name as a nameserver for websites your server hosts. To use yebHost Manager® (WHM) lets you use your own domain name as a nameserver for websites your server hosts. </p>
                        </div>
                        <div class="col-sm-4 cmt_attch">
                            <a href="" target="_blank"><span><i class="fa fa-file"></i></span><br/><span>filename</span></a>
                            <a href="" target="_blank"><span><i class="fa fa-file"></i></span><br/><span>rfq</span></a>
                        </div>
                        <div class="clearfix"></div><br/>
                        <div class="cmt_attch">
                            <h5>Attachments :</h5>
                            <a href="<?php echo $theme_url?>/images/cb1.jpg" data-toggle='lightbox' data-gallery='example-gallery'><img src="<?php echo $theme_url?>/images/cb1.jpg" width='100px' height='56px' class='img-fluid' ><br/><span>filename</span></a>
                            <a href="<?php echo $theme_url?>/images/cb1.jpg" data-toggle='lightbox' data-gallery='example-gallery'><img src="<?php echo $theme_url?>/images/cb1.jpg" width='100px' height='56px' class='img-fluid' ><br/><span>filename</span></a>
                            <a href="<?php echo $theme_url?>/images/cb1.jpg" data-toggle='lightbox' data-gallery='example-gallery'><img src="<?php echo $theme_url?>/images/cb1.jpg" width='100px' height='56px' class='img-fluid' ><br/><span>filename</span></a>
                            <a href="<?php echo $theme_url?>/images/cb1.jpg" data-toggle='lightbox' data-gallery='example-gallery'><img src="<?php echo $theme_url?>/images/cb1.jpg" width='100px' height='56px' class='img-fluid' ><br/><span>filename</span></a>
                            <a href="http://192.168.0.104/teranex/themes/site/images/sample.mp4" target='_blank'><video width='100px' height='70px'><source src="http://192.168.0.104/teranex/themes/site/images/sample.mp4" type="video/mp4"><source src="http://192.168.0.104/teranex/themes/site/images/sample.ogg" type="video/ogg">Your browser does not support the video tag.</video><br/><span>filename</span></a>
                            <a href="http://192.168.0.104/teranex/themes/site/images/sample.mp4" target='_blank'><video width='100px' height='70px'><source src="http://192.168.0.104/teranex/themes/site/images/sample.mp4" type="video/mp4"><source src="http://192.168.0.104/teranex/themes/site/images/sample.ogg" type="video/ogg">Your browser does not support the video tag.</video><br/><span>filename</span></a>
                        </div>
                        <!-- <div class="">
                            <?php if($commentReplyFileList['result']){
                                foreach($commentReplyFileList['result'] as $rowName){ 
                                    $extnFile = explode('.', $rowName['file_name']);
                                    if(in_array($extnFile[1],$imgArray)){
                                      echo "<a href='".site_url()."uploads/machine_reply/".$rowName['file_name']."' data-toggle='lightbox' data-gallery='example-gallery'  ><img src='".site_url()."uploads/machine_reply/".$rowName['file_name']."' width='100px' height='70px' class='img-fluid' ></a>";
                                    }else{
                                        $docFile[]=$rowName['file_name'];
                                    }  
                                    ?>
                            <?php }
                                if($docFile>0){
                                    echo "<p>File Document</p>";
                                    for($i=0;$i< count($docFile);$i++){ 
                                        echo "<a href='".site_url()."uploads/machine_reply/".$docFile[$i]."'  target='_blank'>File</a> &nbsp; &nbsp;";
                                    }
                                } 
                            }?>
                        </div> -->
                    </div> 
    			</div>
                <div class="row msgcomment">
                    <div class="col-sm-1">
                        <?php if($rowComment['u_avatar']){?>
                            <img src="<?php echo site_url()."uploads/customer/".$rowComment['u_avatar']?>" class="img-rounded img-responsive" style="width:70px">
                        <?php }else{?>
                            <img src="<?php echo site_url()."uploads/customer/user-default.png"?>" class="img-rounded img-responsive" style="width:70px">
                        <?php }?>
                    </div>
                    <div class="col-sm-11 padd-0">
                        <div class="" style="background: #f9f9f9;padding: 5px;">
                            <b><?php echo $rowreply['u_name']?> </b>&nbsp;<br/><small> <?php echo date('M d, h:i A', strtotime( $rowreply['comment_date_time']))?></small>
                        </div>
                        <div class="clearfix"></div><br/>
                        <div class="col-sm-12 padd-0 cmt_msg" style="min-height: 70px;">
                            <!-- <p><?php echo $rowreply['comment_msg']?></p> -->
                            <p>ebHost Manager® (WHM) lets you use your own domain name as a nameserver for websites your server hosts. To use yebHost Manager® (WHM) lets you use your own domain name as a nameserver for websites your server hosts. To use yebHost Manager® (WHM) lets you use your own domain name as a nameserver for websites your server hosts. </p>
                        </div>
                        <div class="col-sm-4 cmt_attch">
                            
                        </div>
                        <div class="clearfix"></div><br/>
                        <div class="cmt_attch">
                            <h5>Attachments :</h5>
                            <a href="<?php echo $theme_url?>/images/cb1.jpg" data-toggle='lightbox' data-gallery='example-gallery'><img src="<?php echo $theme_url?>/images/cb1.jpg" width='100px' height='56px' class='img-fluid' ><br/><span>filename</span></a>
                            <a href="<?php echo $theme_url?>/images/cb1.jpg" data-toggle='lightbox' data-gallery='example-gallery'><img src="<?php echo $theme_url?>/images/cb1.jpg" width='100px' height='56px' class='img-fluid' ><br/><span>filename</span></a>
                            <a href="<?php echo $theme_url?>/images/cb1.jpg" data-toggle='lightbox' data-gallery='example-gallery'><img src="<?php echo $theme_url?>/images/cb1.jpg" width='100px' height='56px' class='img-fluid' ><br/><span>filename</span></a>
                            <a href="<?php echo $theme_url?>/images/cb1.jpg" data-toggle='lightbox' data-gallery='example-gallery'><img src="<?php echo $theme_url?>/images/cb1.jpg" width='100px' height='56px' class='img-fluid' ><br/><span>filename</span></a>
                            <a href="http://192.168.0.104/teranex/themes/site/images/sample.mp4" target='_blank'><video width='100px' height='70px'><source src="http://192.168.0.104/teranex/themes/site/images/sample.mp4" type="video/mp4"><source src="http://192.168.0.104/teranex/themes/site/images/sample.ogg" type="video/ogg">Your browser does not support the video tag.</video><br/><span>filename</span></a>
                            <a href="http://192.168.0.104/teranex/themes/site/images/sample.mp4" target='_blank'><video width='100px' height='70px'><source src="http://192.168.0.104/teranex/themes/site/images/sample.mp4" type="video/mp4"><source src="http://192.168.0.104/teranex/themes/site/images/sample.ogg" type="video/ogg">Your browser does not support the video tag.</video><br/><span>filename</span></a>
                        </div>
                    </div> 
                </div>
    			
    	    <?php  }}?>
            <div class="clearfix"></div><br/>
            <div class="col-sm-offset-1 col-sm-10">
            	<form class="form-horizontal" role="form" action="" id="machine_form" method="post" enctype="multipart/form-data">
        			<div class="form-group">
            			<!-- <label class="control-label col-sm-2" for="comment_msg">Comment :<span class="compulsary">*</span></label> -->
            			<div class="">
            			    <textarea name="comment_msg" id='comment_msg' class="form-control required" rows="4" placeholder="Write your comment here.."></textarea>
            			</div>
        		    </div>
        		    <div class="form-group pull-right">
                        <div class="image-upload">
                            <label for="file-input">
                                <img src="<?php echo theme_url()."/images/file.png"?>" aria-haspopup="true" title="File"/> 
                            </label>
                            <input id="file-input2" type="file"  name="commentFile[]" multiple  />
                        </div>
                        <div class="image-upload">
                            <label for="file-input">
                                <img src="<?php echo theme_url()."/images/attachment.png"?>" aria-haspopup="true" title="Media"/>
                            </label>
                            <input id="file-input" type="file"  name="commentFile[]" multiple />
                        </div>
        				<input type="submit" name="btnComment" value="Submit" class="btn btn-primary btn_orange"> 
        		    </div>
                    <div class="clearfix"></div><br/>
            	</form>
                <div class="clearfix"></div><br/>
            </div> 
        </div>
        <div class="col-sm-2 padd-0">
            <div class="gray_bg">
                <h4 class="padd_5 margin_0" >Machine List</h4>
            </div>
            <div>
                <ul class="machne_name">
                    <li><a href="">Bending Machine ADD9226-5</a></li>
                    <li><a href="">Bending Machine ADD9226-5</a></li>
                    <li><a href="">Bending Machine ADD9226-5</a></li>
                </ul>
            </div>
        </div>
    </div> <div class="clearfix"></div>
</div>
</div>
<!-- /.row -->  
<?php $this->template->contentBegin(POS_BOTTOM);?>
<!-- <script src="<?=$theme_url?>/js/jquery.validate.min.js"></script> --> 
<script src="<?php echo $theme_url?>/js/ekko-lightbox.js"></script>
<script type="text/javascript">
    $(document).ready(function ($) {
        // delegate calls to data-toggle="lightbox"
        $(document).on('click', '[data-toggle="lightbox"]:not([data-gallery="navigateTo"]):not([data-gallery="example-gallery-11"])', function(event) {
            event.preventDefault();
            return $(this).ekkoLightbox({
                onShown: function() {
                    if (window.console) {
                        return console.log('Checking our the events huh?');
                    }
                },
				onNavigate: function(direction, itemIndex) {
                    if (window.console) {
                        return console.log('Navigating '+direction+'. Current item: '+itemIndex);
                    }
				}
            });
        });

        // disable wrapping
        $(document).on('click', '[data-toggle="lightbox"][data-gallery="example-gallery-11"]', function(event) {
            event.preventDefault();
            return $(this).ekkoLightbox({
                wrapping: false
            });
        });

        //Programmatically call
        $('#open-image').click(function (e) {
            e.preventDefault();
            $(this).ekkoLightbox();
        });
        $('#open-youtube').click(function (e) {
            e.preventDefault();
            $(this).ekkoLightbox();
        });

		// navigateTo
        $(document).on('click', '[data-toggle="lightbox"][data-gallery="navigateTo"]', function(event) {
            event.preventDefault();

            return $(this).ekkoLightbox({
                onShown: function() {

					this.modal().on('click', '.modal-footer a', function(e) {

						e.preventDefault();
						this.navigateTo(2);

                    }.bind(this));

                }
            });
        });
        /**
         * Documentation specific - ignore this
         */
        anchors.options.placement = 'left';
        anchors.add('h3');
        $('code[data-code]').each(function() {

            var $code = $(this),
                $pair = $('div[data-code="'+$code.data('code')+'"]');

            $code.hide();
            var text = $code.text($pair.html()).html().trim().split("\n");
            var indentLength = text[text.length - 1].match(/^\s+/)
            indentLength = indentLength ? indentLength[0].length : 24;
            var indent = '';
            for(var i = 0; i < indentLength; i++)
                indent += ' ';
            if($code.data('trim') == 'all') {
                for (var i = 0; i < text.length; i++)
                    text[i] = text[i].trim();
            } else  {
                for (var i = 0; i < text.length; i++)
                    text[i] = text[i].replace(indent, '    ').replace('    ', '');
            }
            text = text.join("\n");
            $code.html(text).show();

        });
    });
    // machine_form
    $("#machine_form").validate({
    rules: {  
        comment_msg:{
          required:true
        },
      },
    messages: { 
      comment_msg:{
        required:"Please enter your comment"
      },
    }
  }); 
</script>
<?php $this->template->contentEnd();	?> 