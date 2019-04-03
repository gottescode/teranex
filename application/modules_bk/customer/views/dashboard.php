<?php $this->template->contentBegin(POS_TOP); ?>

<style type="text/css">
    .margin_10_top{
        margin-top: 10px;
    } 
   
</style> 
<?php echo $this->template->contentEnd(); ?> 
<div class="container-fluid myprofile-bg dahboard-bg">
    <div class="container">
        <div class="col-sm-6 padd-0">
            <ul>
                <li class="myprofile">My Dashboard </li>
            </ul>
        </div>

        <div class="col-sm-6 padd-0">
            <ul>
                <li class="" style="float: right;margin: 6px 0;"><a href="<?php echo site_url(); ?>">Go To My Stelmac </a></li>
            </ul>
        </div>
    </div>

    <?php if (hasFlash("dataLinkedSuccessSign")) {
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo getFlash("dataLinkedSuccessSign"); ?>
        </div>
    <?php } ?>

    <?php
    // display messages
    if (hasFlash("ErrorMsgLinked")) {
        ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times;</span></button>
            <?php echo getFlash("ErrorMsgLinked"); ?>
        </div>
        <?php }  // display messages
    ?>
    <!-- /.container --> 
</div>
<div class="welcome-j-bg">
    <div class="container">
        <!-- <div class="col-sm-8 col-lg-10 padd-0">
          <ul>
            <li class="">Welcome <? echo ucwords($_SESSION['u_name']);?></li>
          </ul>
        </div>
        <div class="col-sm-4 col-lg-2 padd-0">
          <ul>
            <li class=""><a href="<?php echo site_url(); ?>">Go To My Stelmac </a> |</li>
            <li class=""><a href="<?php echo site_url() . "pages/logout"; ?>">Sign Out </a></li>
          </ul>
        </div> -->
    </div>
</div>
<!-- /.welcome-j-bg -->

<div class="row margin_0" style="background-color: #353537;">
    <?php $this->load->view("cust_side_menu"); ?> 
    <div class="">
        <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 bg_white"> 
        	<div class="col-sm-12">
                <table id='' class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr bgcolor="#CCCCCC"><td>RFQs</td><td>Today</td><td>This Week</td><td>This Month</td><td>This Quarter</td><td>This Year</td></tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Collective Buying</td>
                            <td>4</td> 
                            <td>12</td> 
                            <td>23</td> 
                            <td>43</td> 
                            <td>82</td> 
                        </tr>
                        <tr>
                            <td>Exchange Groups</td>
                            <td>3</td> 
                            <td>13</td> 
                            <td>19</td> 
                            <td>39</td> 
                            <td>74</td> 
                        </tr>
                        <tr>
                            <td>Machine Services</td>
                            <td>7</td> 
                            <td>9</td> 
                            <td>22</td> 
                            <td>47</td> 
                            <td>85</td> 
                        </tr>
                        <tr>
                            <td>Application Services</td>
                            <td>1</td> 
                            <td>6</td> 
                            <td>15</td> 
                            <td>39</td> 
                            <td>61</td> 
                        </tr>
                        <tr>
                            <td>Training Courses</td>
                            <td>4</td> 
                            <td>9</td> 
                            <td>18</td> 
                            <td>51</td> 
                            <td>82</td> 
                        </tr>
                        <tr>
                            <td>Design</td>
                            <td>3</td> 
                            <td>8</td> 
                            <td>17</td> 
                            <td>33</td> 
                            <td>61</td> 
                        </tr>
                        <tr>
                            <td>Produce</td>
                            <td>5</td> 
                            <td>11</td> 
                            <td>21</td> 
                            <td>27</td> 
                            <td>64</td> 
                        </tr>
                    </tbody>
                </table>
                <div class="clearfix"></div><br/>
                <h3>Orders</h3>
                <div>
					<div id="chart-container">FusionCharts XT will load here!</div>
                </div>
            </div><div class="clearfix"></div><br/>
        </div>
    </div>
</div>

<?php $this->template->contentBegin(POS_BOTTOM); ?>

<!-- Include fusioncharts core library -->
<script type="text/javascript" src=" https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script> 
<!-- Include fusion theme -->
<script type="text/javascript" src=" https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script> 
<script type="text/javascript">
    FusionCharts.ready(function(){
    var fusioncharts = new FusionCharts({
    type: 'column2d',
    renderAt: 'chart-container',
    width: '1000',
    height: '400',
    dataFormat: 'json',
    dataSource: {
        // Chart Configuration
        "chart": {
            "caption": "",
            "subCaption": " ",
            "xAxisName": "2018",
            "yAxisName": "Orders",
            "numberSuffix": "",
            "theme": "fusion",
        },
        // Chart Data
        "data": [{
            "label": "Jan",
            "value": "200"
        }, {
            "label": "Feb",
            "value": "600"
        }, {
            "label": "March",
            "value": "100"
        }, {
            "label": "April",
            "value": "400"
        }, {
            "label": "May",
            "value": "100"
        }, {
            "label": "June",
            "value": "1000"
        }, {
            "label": "July",
            "value": "300"
        }, {
            "label": "Aug",
            "value": "300"
        }, {
            "label": "Sept",
            "value": "600"
        }, {
            "label": "Oct",
            "value": "700"
        }, {
            "label": "Nov",
            "value": "300"
        }, {
            "label": "Dec",
            "value": "500"
        }]
    }
});
    fusioncharts.render();
    });
</script>

  
<?php $this->template->contentEnd(); ?> 
