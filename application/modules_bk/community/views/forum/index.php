<?php $this->template->contentBegin(POS_TOP);?>
<link rel="stylesheet" type="text/css" href="<?php echo $theme_url;?>/css/community.css"/>
<style type="text/css">
    .cmtimg {
        float: right;
        width: 10%;
        margin-top: 0px!important;
    }
    .cmtimg img{
        width:18px;
        margin: 2px!important;
        
    }
    .cmtname {    
        float: left!important;
        margin-top: 0px!important;
        width: 80%;    
        margin-left: 10%;
    }
    .cmtname h4, .cmtimg h4{
        margin-top:0px;
    }
    .tbl-community .cmtname h4, .tbl-community .cmtname a{
        float: left;
        font-size: 14px;
    }
    .tbl-community tr td:last-child .cmtname h4 {
        text-align: left!important;
        font-size: 16px;
        font-family: inherit;
        font-weight: 500;
        color: inherit;
        line-height: 22px!important;
    }
    .tbl-community .cmtname a:hover {
        color: #337ab7;
        text-decoration: none;
    }
    .tbl-community tbody tr td, .tbl-community tbody tr th{    padding: 13px 8px!important;}
    .tbl-community tr td:last-child .cmtname h4{    line-height: 22px!important;}
    .tbl-community tr td h3, .tbl-community tr th h3{    line-height: 20px!important;}
    .tbl-community tr td:first-child {width: 400px;}
    .tbl-community tr td:last-child {width: 350px;}
    .tbl-community tr td:last-child .cmtimg h4{line-height: 20px!important;}
</style>
<?php echo $this->template->contentEnd();?> 

<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="" style="margin-top:79px"><img class="img-responsive bnr-images" src="<?php echo $theme_url?>/images/usercomunitybanr.jpg"> </div>
<div class="container">
    <center>
        <h2>Discussion Forums</h2>
    </center>

     <?php   // display messages
                       if(hasFlash("dataMsgEnquirySuccess"))    {   ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <?php echo getFlash("dataMsgEnquirySuccess"); ?>
                        </div>
                 <?php }    if(hasFlash("dataMsgEnquiryError")) {   ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <?php echo getFlash("dataMsgEnquiryError"); ?>
                            </div>
                <?php } ?>  
    <div class="col-md-12 text-right padd-0">
        <ul class="pagination pagination-lg pager" id="myPager"></ul>
    </div>

    <div class="table-responsive">
        <table class="table table-striped tbl-community">
            <thead>
                <tr>
                    <th>
                        <h3>Discussion Forums</h3>
                    </th>
                   <!--  <th>
                        <h3>votes</h3>
                    </th> -->
                    <th>
                        <h3>answers</h3>
                    </th>
                    <th>
                        <h3>views</h3>
                    </th>
                    <th>
                        <h3>Created by</h3>
                    </th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php if ($forums) : ?>
                   <?php //print_r($forums); exit() ?>
                <?php foreach ($forums as $forum) : ?>
                <tr>
                    <td>
                        <h3><?php if (isset($_SESSION['uid'])) : ?><?php else : ?><?php endif; ?><?= $forum->title ?></h3>
                        <h4> <?php echo date('d-M-Y',strtotime($forum->created_at))?></h4>
                    </td>
					<!-- 
                    <td>
                        <h3 id="<?php echo $i;?>">  <?php 
                            $url = site_url()."community/api/communityvoteCount/".$forum->id;
                            
                            $result = apiCall($url,"get");
                            echo $result['result']['count'];
//print_r($result);

                        ?> </h3>
                      
                    </td> -->
                    <td>
                       <h3 id="<?php echo $i;?>">  <?php 
                            $url = site_url()."community/api/communityanswerCount/".$forum->id;
                            
                            $result = apiCall($url,"get");
                            echo $result['result']['count'];
//print_r($result);

                        ?> </h3>
                      
                    </td>
                    <td>
                        <h3 id="<?php echo $i;?>">  <?php 
                            $url = site_url()."community/api/communityviewerCount/".$forum->id;
                            
                            $result = apiCall($url,"get");
                             if($result['result'][0]['count']){
                                echo $result['result'][0]['count'];
                             }else{
                                echo "0";
                             }
                        ?> </h3>
                      
                              
                    </td>
                    <!--<td>
                        <span><?php if(($_SESSION['uid']==$forum->admin_user || $_SESSION['uid']==$forum->moderator_user))
                        {  ?>
                            <a href="<?= site_url()."customer/forum/send_invite_code/". $forum->slug ?>"  aria-haspopup="true" title="Share"><img src="<?php echo $theme_url?>/images/sharing.png" /></a>
                            <a href="<?= site_url()."community/forum/index/".$forum->slug ?>" aria-haspopup="true" title="Inside"> <img src="<?php echo $theme_url?>/images/login-button.png" /></a>
                        <?php } 
                        else if(in_array($forum->id,$communityListId)) { ?>
                            
                            <a href="<?= site_url()."community/forum/index/".$forum->slug ?>"><img src="<?php echo $theme_url?>/images/login-button.png" /></a>
                        <?php }else if($_SESSION['uid']){
                            ?>
                             <a href="<?= site_url()."community/forum/send_invite_request/". $forum->slug ?>" aria-haspopup="true" title="Join"><img src="<?php echo $theme_url?>/images/linked.png" /></a>
                             <?php
                        }else{
                            ?>
                             <a href="#" data-toggle="modal" data-target="#signinModal" ><img src="<?php echo $theme_url?>/images/linked.png" /></a>
                            <?php
                        } ?>
                            <h4><a><?php if($forum->u_name ){echo ucwords($forum->u_name); }else{ echo 'Admin';} ?> </a></h4>
                        </span>
                    </td> -->
                    <td>
                        <?php// print_r($forum);exit; ?>
                        <span class="cmtname">
                            <h4><a>Name : <?php if($forum->u_name ){echo ucwords($forum->u_name); }else{ echo 'Admin';} ?></a> </h4>
                            <h4><a style="padding-top: 3px;">Designation :<?php echo $forum->designation ?> </a></h4>
                            <h4><a style="padding-top: 1px;">Company : <?php echo $forum->company_name ?></a></h4>
                        </span>
                        <span class="cmtimg">
                            
                            <h4><?php if($_SESSION['uid']==$forum->admin_user || $_SESSION['uid']==$forum->moderator_user)
                        {  ?><a href="<?= site_url()."customer/forum/send_invite_code/". $forum->slug ?>"  aria-haspopup="true" title="Share"><img src="<?php echo $theme_url?>/images/sharing.png" /></a><?php } else if($_SESSION['uid']) { ?>
                           <a href="#" data-toggle="modal" data-target="#shareingerror"  title="Share" ><img src="<?php echo $theme_url?>/images/sharing.png" /></a>
                            <?php }  else { ?>
                           <a href="#" data-toggle="modal" data-target="#signinModal"  title="Share" ><img src="<?php echo $theme_url?>/images/sharing.png" /></a>
                            <?php } ?> </h4>

                             <h4><?php  if(in_array($forum->id,$communityListId)|| $_SESSION['uid']==$forum->admin_user || $_SESSION['uid']==$forum->moderator_user)
                        {  ?>
                          <a href="<?= site_url()."community/forum/index/".$forum->slug ?>" aria-haspopup="true" title="Inside"> <img title="Inside" src="<?php echo $theme_url?>/images/inside.png" /></a><?php } else if(!in_array($forum->id,$communityListId) && $_SESSION['uid'] )  { ?><a href="#" data-toggle="modal" data-target="#errormsg"  title="Inside" > <img title="Inside" src="<?php echo $theme_url?>/images/inside.png" /></a>
                            <?php }  else { ?><a href="#" data-toggle="modal" data-target="#signinModal"  title="Inside" > <img title="Inside" src="<?php echo $theme_url?>/images/inside.png" /></a>
                            <?php } ?></h4>
                            <h4>
                            <?php if(in_array($forum->id,$communityListId) || $_SESSION['uid']==$forum->admin_user || $_SESSION['uid']==$forum->moderator_user)
                        {  ?>
                            <a href="#" data-toggle="modal" data-target="#joinModal" title="Join"><img title="Join" src="<?php echo $theme_url?>/images/linked.png" /></a><?php } else if($_SESSION['uid']) { ?><a href="<?= site_url()."community/forum/send_invite_request/".$forum->slug ?>" aria-haspopup="true" title="Join"><img title="Join" src="<?php echo $theme_url?>/images/linked.png" /></a>
                            <?php } else { ?><a href="#" data-toggle="modal" data-target="#signinModal" title="Join"><img title="Join" src="<?php echo $theme_url?>/images/linked.png" /></a>
                            <?php } ?></h4>
                        </span>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?> 
            </tbody>
        </table>   
    </div>
</div>

  <div class="modal fade" id="errormsg" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">Community</h4></center>
        </div>
        <div class="modal-body">
            <div class="border_bot col-xs-12 " > 
             <p>Please Join community First !!</p>
            </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="shareingerror" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">Community</h4></center>
        </div>
        <div class="modal-body">
            <div class="border_bot col-xs-12 " > 
             <p>You are not moderator and admin so you cant invite other members</p>
            </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="joinModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">Community</h4></center>
        </div>
        <div class="modal-body">
            <div class="border_bot col-xs-12 " > 
             <p>You are Already member of this community</p>
            </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="joincommunitymsg" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">Community Message</h4></center>
        </div>
        <div class="modal-body">
            <div class="border_bot col-xs-12 " > 
             <p>Please check email and verify to join this community !!</p>
            </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
<?php //var_dump($forums); ?>
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script type="text/javascript">
    $.fn.pageMe = function(opts){
    var $this = this,
        defaults = {
            perPage: 6,
            showPrevNext: false,
            hidePageNumbers: false
        },
        settings = $.extend(defaults, opts);
    
    var listElement = $this;
    var perPage = 6; 
    var children = listElement.children();
    var pager = $('.pager');
    
    if (typeof settings.childSelector!="undefined") {
        children = listElement.find(settings.childSelector);
    }
    
    if (typeof settings.pagerSelector!="undefined") {
        pager = $(settings.pagerSelector);
    }
    
    var numItems = children.size();
    var numPages = Math.ceil(numItems/perPage);

    pager.data("curr",0);
    
    if (settings.showPrevNext){
        $('<li><a href="#" class="prev_link">«</a></li>').appendTo(pager);
    }
    
    var curr = 0;
    while(numPages > curr && (settings.hidePageNumbers==false)){
        $('<li><a href="#" class="page_link">'+(curr+1)+'</a></li>').appendTo(pager);
        curr++;
    }
    
    if (settings.showPrevNext){
        $('<li><a href="#" class="next_link">»</a></li>').appendTo(pager);
    }
    
    pager.find('.page_link:first').addClass('active');
    pager.find('.prev_link').hide();
    if (numPages<=1) {
        pager.find('.next_link').hide();
    }
    pager.children().eq(1).addClass("active");
    
    children.hide();
    children.slice(0, perPage).show();
    
    pager.find('li .page_link').click(function(){
        var clickedPage = $(this).html().valueOf()-1;
        goTo(clickedPage,perPage);
        return false;
    });
    pager.find('li .prev_link').click(function(){
        previous();
        return false;
    });
    pager.find('li .next_link').click(function(){
        next();
        return false;
    });
    
    function previous(){
        var goToPage = parseInt(pager.data("curr")) - 1;
        goTo(goToPage);
    }
     
    function next(){
        goToPage = parseInt(pager.data("curr")) + 1;
        goTo(goToPage);
    }
    
    function goTo(page){
        var startAt = page * perPage,
            endOn = startAt + perPage;
        
        children.css('display','none').slice(startAt, endOn).show();
        
        if (page>=1) {
            pager.find('.prev_link').show();
        }
        else {
            pager.find('.prev_link').hide();
        }
        
        if (page<(numPages-1)) {
            pager.find('.next_link').show();
        }
        else {
            pager.find('.next_link').hide();
        }
        
        pager.data("curr",page);
        pager.children().removeClass("active");
        pager.children().eq(page+1).addClass("active");
    
    }
};

$(document).ready(function(){
    
  $('#myTable').pageMe({pagerSelector:'#myPager',showPrevNext:true,hidePageNumbers:false,perPage:4});
    
});
</script>

<!-- <script type="text/javascript">
    $("#joincommunity").on('click', function() {
     var forum_slug = <?php echo $forum->slug; ?>;
        
$.ajax({

    type:'POST',
    url:"<?php echo site_url();?>community/forum/send_invite_request/<?php echo $forum->slug ?>",
     data: { forum_slug:forum_slug, },
     dataType: 'json',
    success: function(data){
      
         alert("inside onclick");
        $('#joincommunitymsg').modal({'show' : true});
    }
});
return false;
});
</script> -->
<?php $this->template->contentEnd();    ?>
