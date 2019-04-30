<?php $this->template->contentBegin(POS_TOP);?>
<link rel="stylesheet" type="text/css" href="<?php echo $theme_url;?>/css/community.css"/>

<?php echo $this->template->contentEnd();?>

<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="banner banner_image help_banner align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner_text">
                    <p>Community Name</p>
                    <div class="selct-box get_start">
                        <div class="arrow">
                            <select name="" id="" class="dropdow" >
                                <option value="New">Members</option>
                                <option value="New">Item I</option>
                                <option value="New">Item II</option>
                                <option value="New">Item III</option>
                            </select>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>




<section class="child_menu_btm  xchange">
    <div class="container">
        <div class="row">
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
            <div class="col-md-12">
                <div class="main-bx-diss mrgn-top  bx-shdw white">
                    <div class="main-bx-diss-ch padd_all_50">
                        <h3 class="basic-head">Topic Name</h3>
                        <h3 class="basic-head">Comments</h3>
                    </div>
                    <div class="main-bx-diss-ch padd_all_50">
                        <h3 class="basic-head">Views</h3>
                        <h3 class="basic-head">Created By</h3>
                    </div>
                </div>
            </div>
            <?php if ($forums) : ?>
            <?php foreach ($forums as $forum) : ?>
            <div class="col-md-12">
                <div class="main-bx-diss mrgn-top  bx-shdw white">
                    <div class="main-bx-diss-ch padd_all_50">
                        <div class="min-in">
                            <h3 class="basic-head"><?php if (isset($_SESSION['uid'])) : ?><?php else : ?><?php endif; ?><?= $forum->title ?></h3>
                            <p><?php echo date('d-M-Y',strtotime($forum->created_at))?></p>
                        </div>
                        <div class="min-in">
                            <h3 class="basic-head"  id="<?php echo $i;?>"> <?php
                                $url = site_url()."community/api/communityanswerCount/".$forum->id;

                                $result = apiCall($url,"get");
                                echo $result['result']['count'];
                                //print_r($result);

                                ?> </h3>
                        </div>
                    </div>
                    <div class="main-bx-diss-ch padd_all_50">
                        <div class="min-in">
                            <h3 class="basic-head"  id="<?php echo $i;?>"> <?php
                                $url = site_url()."community/api/communityviewerCount/".$forum->id;

                                $result = apiCall($url,"get");
                                if($result['result'][0]['count']){
                                    echo $result['result'][0]['count'];
                                }else{
                                    echo "0";
                                }
                                ?></h3>
                        </div>
                        <div class="cussion">
                            <div class="disscuisn">
                                <h3 class="basic-head"><?php if($forum->u_name ){echo ucwords($forum->u_name); }else{ echo 'Admin';} ?></h3>
                                <p><?php echo $forum->designation ?> </p>
                                <p><?php echo $forum->company_name ?></p>
                            </div>
                            <div class="disscuisn_nd">
                                <?php if($_SESSION['uid']==$forum->admin_user || $_SESSION['uid']==$forum->moderator_user)
                                {  ?><a href="<?= site_url()."customer/forum/send_invite_code/". $forum->slug ?>"  aria-haspopup="true" title="Share"><img src="<?php echo $theme_url?>/images/share.jpg" /></a><?php } else if($_SESSION['uid']) { ?>
                                    <a href="#" data-toggle="modal" data-target="#shareingerror"  title="Share" ><img src="<?php echo $theme_url?>/images/share.jpg" /></a>
                                <?php }  else { ?>
                                    <a href="#" data-toggle="modal" data-target="#signinModal"  title="Share" ><img src="<?php echo $theme_url?>/images/share.jpg" /></a>
                                <?php } ?>

                                <?php  if(in_array($forum->id,$communityListId)|| $_SESSION['uid']==$forum->admin_user || $_SESSION['uid']==$forum->moderator_user)
                                {  ?>
                                <a href="<?= site_url()."community/forum/index/".$forum->slug ?>" aria-haspopup="true" title="Inside"> <img title="Inside" src="<?php echo $theme_url?>/images/input.jpg" /></a><?php } else if(!in_array($forum->id,$communityListId) && $_SESSION['uid'] )  { ?><a href="#" data-toggle="modal" data-target="#errormsg"  title="Inside" > <img title="Inside" src="<?php echo $theme_url?>/images/input.jpg" /></a>
                                <?php }  else { ?><a href="#" data-toggle="modal" data-target="#signinModal"  title="Inside" > <img title="Inside" src="<?php echo $theme_url?>/images/input.jpg" /></a>
                                <?php } ?>

                                <?php if(in_array($forum->id,$communityListId) || $_SESSION['uid']==$forum->admin_user || $_SESSION['uid']==$forum->moderator_user)
                                {  ?>
                                    <a href="#" data-toggle="modal" data-target="#joinModal" title="Join"><img title="Join" src="<?php echo $theme_url?>/images/add-people.jpg" /></a><?php } else if($_SESSION['uid']) { ?><a href="<?= site_url()."community/forum/send_invite_request/".$forum->slug ?>" aria-haspopup="true" title="Join"><img title="Join" src="<?php echo $theme_url?>/images/add-people.jpg" /></a>
                                <?php } else { ?><a href="#" data-toggle="modal" data-target="#signinModal" title="Join"><img title="Join" src="<?php echo $theme_url?>/images/add-people.jpg" /></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>


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
