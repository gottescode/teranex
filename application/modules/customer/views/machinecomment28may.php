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
    padding: 30px;    border-bottom: 1px solid #eee;
}
.msgcomment:hover{
    background-color: #eee;
}
 </style>
 <?php $this->template->contentEnd();	
	$imgArray=array("jpeg","JPEG","jpg","JPG","png","PNG");
	$docArray=array("pdf","PDF","DOC","doc","docx","DOCX","txt","TXT");
 ?> 
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4">
      <ul>
        <li class="myprofile">Machine Comment</li>
      </ul>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->
<div class="welcome-j-bg">
  <div class="container">
    <div class="col-sm-8 col-lg-10">
      <ul>
		<li>Machine Name</li>
      </ul>
    </div>
    <div class="col-sm-4 col-lg-2">
      <ul>
        <li class=""><a href="#">Go To My Teranex </a> |</li>
        <li class=""><a href="<?php echo site_url()."pages/logout";?>">Sign Out </a></li>
      </ul>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->
<div class="row margin_0" style="background-color: #353537;">

    <?php   $this->load->view("cust_side_menu" ); ?> 
    <div class="col-md-10 col-sm-12 col-xs-12 bg_white"> 
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
    				<div class="col-sm-10"><b><?php echo $rowreply['u_name']?> </b>&nbsp; <?php echo date('M d, h:i A', strtotime( $rowreply['comment_date_time']))?>
                        <div class="clearfix"></div>
                        <p><?php echo $rowreply['comment_msg']?></p>
                        <div class="clearfix"></div>
                        <div class="">
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
                                        echo "<a href='".site_url()."uploads/machine_reply/".$docFile[$i]."'  target='_blank'>File Attachment</a> &nbsp; &nbsp;";
                                    }
                                } 
                            }?>
                        </div>
                    </div> 
    			</div>
    			
    	<?php  }}?>
        <div class="clearfix"></div><br/>
        <div class="col-sm-offset-1 col-sm-9">
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
                            <img src="<?php echo theme_url()."/images/attachment.png"?>"/>
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
</div>
<!-- /.row -->  
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script> 
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