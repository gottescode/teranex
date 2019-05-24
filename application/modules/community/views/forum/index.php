<?php $this->template->contentBegin(POS_TOP);?>
<link rel="stylesheet" type="text/css" href="<?php echo $theme_url;?>/css/community.css"/>

<?php echo $this->template->contentEnd();?>

<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="home-page-container height-550 banner-without-overlay" style="background: url(<?php echo $theme_url ?>/images/community-bg.jpg)">
    <div class="container">
        <div class="banner-content-text">
            <span>Teranex Community Platform</span>
            <b>Xchange Communities</b>
        </div>
    </div>
</div>
<div class="home-page-body-container">
    <div class="home-inner-block-set">
        <div class="container">
            <div class="additive-card align-items-center flex web-additive-card">
                <div class="full-width">
                    <div class="row justify-content-between">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                            <div class="form-set-content p-0">
                                    <span class="web-additive-card-title">
                                        <b>Community Name</b>
                                    </span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                            <div class="form-set-content p-0 flex">
                                    <span class="web-additive-card-title text-center">
                                        <small class="mr-5"><b>Topics</b></small>
                                        <small><b>Views</b></small>
                                    </span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-2 col-xl-2 text-right">
                                <span class="web-additive-card-title text-right">
                                    <small><b>Created By</b></small>
                                </span>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-1 col-xl-1 text-right"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if ($forums) : ?>
    <?php foreach ($forums as $forum) : ?>
    <div class="home-inner-block-set">
        <div class="container">
            <div class="additive-card align-items-center flex web-additive-card">
                <div class="full-width">
                    <div class="row justify-content-between">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                            <div class="form-set-content p-0">
                                    <span class="web-additive-card-title">
                                        <b><?php if (isset($_SESSION['uid'])) : ?><?php else : ?><?php endif; ?><?= $forum->title ?></b> <br>
                                        <small><?php echo date('d-M-Y',strtotime($forum->created_at))?></small>
                                    </span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                            <div class="form-set-content p-0 flex">
                                    <span class="web-additive-card-title text-center">
                                        <small class="mr-5" id="<?php echo $i;?>"><b><?php
                                                $url = site_url()."community/api/communityanswerCount/".$forum->id;

                                                $result = apiCall($url,"get");
                                                echo $result['result']['count'];
                                                // print_r($result);die;

                                                ?> </h3></b></small>
                                        <small  id="<?php echo $i;?>"><b><?php
                                                $url = site_url()."community/api/communityviewerCount/".$forum->id;

                                                $result = apiCall($url,"get");
                                                if($result['result'][0]['count']){
                                                    echo $result['result'][0]['count'];
                                                }else{
                                                    echo "0";
                                                }
                                                ?></h3></b></small>
                                    </span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-2 col-xl-2 text-right">
                                <span class="web-additive-card-title text-right">
                                    <small><b><?php if($forum->u_name ){echo ucwords($forum->u_name); }else{ echo 'Admin';} ?></b></small> <br>
                                    <small><?php echo $forum->designation ?> <br><?php echo $forum->company_name ?></small>
                                </span>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-1 col-xl-1 text-right">
                            <div class="community-card-icon-list">
                                <?php if($_SESSION['uid']==$forum->admin_user || $_SESSION['uid']==$forum->moderator_user)
                                {  ?><a href="<?= site_url()."customer/forum/send_invite_code/". $forum->slug ?>"  aria-haspopup="true" title="Share"><img src="<?php echo $theme_url?>/images/share.jpg" /></a><?php } else if($_SESSION['uid']) { ?>
                                    <a href="#" data-toggle="modal" data-target="#shareingerror"  title="Share" ><i class="ion-android-share-alt"></i></a>
                                <?php }  else { ?>
                                    <a href="#" data-toggle="modal" data-target="#signinModal"  title="Share" ><i class="ion-android-share-alt"></i></a>
                                <?php } ?>
                                <?php  if(in_array($forum->id,$communityListId)|| $_SESSION['uid']==$forum->admin_user || $_SESSION['uid']==$forum->moderator_user)
                                {  ?>
                                <a href="<?= site_url()."community/forum/index/".$forum->slug ?>" aria-haspopup="true" title="Inside"> <img title="Inside" src="<?php echo $theme_url?>/images/input.svg" /></a><?php } else if(!in_array($forum->id,$communityListId) && $_SESSION['uid'] )
                                { ?><a href="#" data-toggle="modal" data-target="#errormsg"  title="Inside" > <i class="ion-person-add"></i></a>
                                <?php }  else { ?><a href="#" data-toggle="modal" data-target="#signinModal"  title="Inside" > <i class="ion-person-add"></i></a>
                                <?php } ?>
                                <?php if(in_array($forum->id,$communityListId) || $_SESSION['uid']==$forum->admin_user || $_SESSION['uid']==$forum->moderator_user)
                                {  ?>
                                    <a href="#" data-toggle="modal" data-target="#joinModal" title="Join"><img title="Join" src="<?php echo $theme_url?>/images/add-peopel.svg" /></a><?php } else if($_SESSION['uid']) { ?><a href="<?= site_url()."community/forum/send_invite_request/".$forum->slug ?>" aria-haspopup="true" title="Join">
                                        <i class="fa fa-sign-in"></i></a>
                                <?php } else { ?><a href="#" data-toggle="modal" data-target="#signinModal" title="Join"><i class="fa fa-sign-in"></i></a>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php endforeach; ?>
    <?php endif; ?>
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
