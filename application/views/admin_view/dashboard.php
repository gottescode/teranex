<?php
/**
 * Created by PhpStorm.
 * User: Farhad Zaman
 * Date: 3/13/2017
 * Time: 1:38 PM
 */

?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="#">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Dashboard</span>
        </li>
    </ul>
    <!-- <div class="page-toolbar">
         <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
             <i class="icon-calendar"></i>&nbsp;
             <span class="thin uppercase hidden-xs"></span>&nbsp;
             <i class="fa fa-angle-down"></i>
         </div>
     </div>-->
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h1 class="page-title"> Dashboard
    <small>statistics</small>
</h1>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
            <div class="visual">
                <i class="fa fa-user"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="<?php echo $totalUser ?>"><?php echo $totalUser ?></span>
                </div>
                <div class="desc"> Total Users</div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 red" href="#">
            <div class="visual">
                <i class="fa fa-user"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup"
                          data-value="<?php echo $totalActiveUser ?>"><?php echo $totalActiveUser ?></span>
                </div>
                <div class="desc">Active Users</div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 green" href="#">
            <div class="visual">
                <i class="fa fa-envelope-o"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="<?php echo $totalMessage ?>"><?php echo $totalMessage ?></span>
                </div>
                <div class="desc"> Total Messages</div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
            <div class="visual">
                <i class="fa fa-user-circle"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="<?php echo $totalGroups ?>"><?php echo $totalGroups ?>
                </div>
                <div class="desc"> Total Groups</div>
            </div>
        </a>
    </div>
</div>
<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-share font-red-sunglo "></i>
                        <span class="caption-subject font-dark bold uppercase">Messages</span>
                        <span class="caption-helper">monthly status...</span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div id="site_activities_content" class="display-none" style="display: block;">
                        <div id="site_activities" style="height: 228px; padding: 0px; position: relative;">
                            <canvas class="flot-base" width="340" height="228"
                                    style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 340px; height: 228px;">

                            </canvas>
                            <div class="flot-text"
                                 style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);">
                                <div class="flot-x-axis flot-x1-axis xAxis x1Axis"
                                     style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;">
                                    <div
                                        style="position: absolute; max-width: 48px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 18px; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 21px; text-align: center;">
                                        DEC
                                    </div>
                                    <div
                                        style="position: absolute; max-width: 48px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 18px; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 55px; text-align: center;">
                                        JAN
                                    </div>
                                    <div
                                        style="position: absolute; max-width: 48px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 18px; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 88px; text-align: center;">
                                        FEB
                                    </div>
                                    <div
                                        style="position: absolute; max-width: 48px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 18px; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 118px; text-align: center;">
                                        MAR
                                    </div>
                                    <div
                                        style="position: absolute; max-width: 48px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 18px; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 153px; text-align: center;">
                                        APR
                                    </div>
                                    <div
                                        style="position: absolute; max-width: 48px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 18px; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 185px; text-align: center;">
                                        MAY
                                    </div>
                                    <div
                                        style="position: absolute; max-width: 48px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 18px; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 220px; text-align: center;">
                                        JUN
                                    </div>
                                    <div
                                        style="position: absolute; max-width: 48px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 18px; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 254px; text-align: center;">
                                        JUL
                                    </div>
                                    <div
                                        style="position: absolute; max-width: 48px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 18px; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 284px; text-align: center;">
                                        AUG
                                    </div>
                                    <div
                                        style="position: absolute; max-width: 48px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 18px; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 319px; text-align: center;">
                                        SEP
                                    </div>
                                </div>
                                <div class="flot-y-axis flot-y1-axis yAxis y1Axis"
                                     style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;">
                                    <div
                                        style="position: absolute; top: 197px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 20px; text-align: right;">
                                        0
                                    </div>
                                    <div
                                        style="position: absolute; top: 149px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 7px; text-align: right;">
                                        500
                                    </div>
                                    <div
                                        style="position: absolute; top: 100px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">
                                        1000
                                    </div>
                                    <div
                                        style="position: absolute; top: 52px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">
                                        1500
                                    </div>
                                    <div
                                        style="position: absolute; top: 3px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">
                                        2000
                                    </div>
                                </div>
                            </div>
                            <canvas class="flot-overlay" width="340" height="228"
                                    style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 340px; height: 228px;">

                            </canvas>
                        </div>
                    </div>
                    <div style="margin: 20px 0 10px 30px">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
<!-- BEGIN QUICK SIDEBAR -->

<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
</div>
<script type="text/javascript">
    $(document).ready(function () {
        //$('#userTab').addClass('open');
        $('#dashBoard').addClass('active open');
        //chart 1
            var data1 = [
                <?php if($chart[1]['month']==1){ ?>
                ['JAN', <?php echo $chart[1]['total']?>],
                <?php } else{ ?>
                ['JAN', 0],
                <?php } ?>
                <?php if($chart[2]['month']==2){ ?>
                ['FEB', <?php echo $chart[2]['total']?>],
                <?php } else{ ?>
                ['FEB', 0],
                <?php } ?>
                <?php if($chart[3]['month']==3){ ?>
                ['MAR', <?php echo $chart[3]['total']?>],
                <?php } else{ ?>
                ['MAR', 0],
                <?php } ?>
                <?php if($chart[4]['month']==4){ ?>
                ['APR', <?php echo $chart[4]['total']?>],
                <?php } else{ ?>
                ['APR', 0],
                <?php } ?>

                <?php if($chart[5]['month']==5){ ?>
                ['MAY', <?php echo $chart[5]['total']?>],
                <?php } else{ ?>
                ['MAY', 0],
                <?php } ?><?php if($chart[6]['month']==6){ ?>
                ['JUN', <?php echo $chart[6]['total']?>],
                <?php } else{ ?>
                ['JUN', 0],
                <?php } ?><?php if($chart[7]['month']==7){ ?>
                ['JUL', <?php echo $chart[7]['total']?>],
                <?php } else{ ?>
                ['JUL', 0],
                <?php } ?><?php if($chart[8]['month']==8){ ?>
                ['AUG', <?php echo $chart[8]['total']?>],
                <?php } else{ ?>
                ['AUG', 0],
                <?php } ?><?php if($chart[9]['month']==9){ ?>
                ['SEP', <?php echo $chart[9]['total']?>],
                <?php } else{ ?>
                ['SEP', 0],
                <?php } ?><?php if($chart[10]['month']==10){ ?>
                ['OCT', <?php echo $chart[10]['total']?>],
                <?php } else{ ?>
                ['OCT', 0],
                <?php } ?><?php if($chart[11]['month']==11){ ?>
                ['NOV', <?php echo $chart[11]['total']?>],
                <?php } else{ ?>
                ['NOV', 0],
                <?php } ?><?php if($chart[12]['month']==12){ ?>
                ['DEC', <?php echo $chart[12]['total']?>],
                <?php } else{ ?>
                ['DEC', 0],
                <?php } ?>
            ];


            var plot_statistics = $.plot($("#site_activities"),

                [{
                    data: data1,
                    lines: {
                        fill: 0.2,
                        lineWidth: 0,
                    },
                    color: ['#BAD9F5']
                }, {
                    data: data1,
                    points: {
                        show: true,
                        fill: true,
                        radius: 4,
                        fillColor: "#9ACAE6",
                        lineWidth: 2
                    },
                    color: '#9ACAE6',
                    shadowSize: 1
                }, {
                    data: data1,
                    lines: {
                        show: true,
                        fill: false,
                        lineWidth: 3
                    },
                    color: '#9ACAE6',
                    shadowSize: 0
                }],

                {

                    xaxis: {
                        tickLength: 0,
                        tickDecimals: 0,
                        mode: "categories",
                        min: 0,
                        font: {
                            lineHeight: 18,
                            style: "normal",
                            variant: "small-caps",
                            color: "#6F7B8A"
                        }
                    },
                    yaxis: {
                        ticks: 5,
                        tickDecimals: 0,
                        tickColor: "#eee",
                        font: {
                            lineHeight: 14,
                            style: "normal",
                            variant: "small-caps",
                            color: "#6F7B8A"
                        }
                    },
                    grid: {
                        hoverable: true,
                        clickable: true,
                        tickColor: "#eee",
                        borderColor: "#eee",
                        borderWidth: 1
                    }
                });


    });
</script>
</body>