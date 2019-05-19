
<div class="content-wrapper">
    <section class="content-header">
      <h1>Add Machine</h1>
     <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="<?=site_url()."machine/admin/machineList"?>">Machine List</a></li>
			<li class="active">Add Machine</li>
		</ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
        <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Add Machine</h3>
            </div>
			<div class="box-body">
    <div class="col-xs-12">
        <?php
        // display messages
        if (hasFlash("dataMsgMachineError")) {
            ?>
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo getFlash("dataMsgMachineError"); ?>
            </div>
        <?php } ?>

        <!-- form -->
        <div class="col-xs-12"> 
            <form class="form-horizontal" role="form" action="" id="category" method="post" enctype="multipart/form-data">
                <fieldset>
                   
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="quote">Attach Quote : </label>
                        <div class="col-sm-6">
                            <input type="file" name="quote" id="quote" class="form-control" value="" >
                           
                        </div>
                    </div> 					
                    <div class="form-group"> 
                        <div class="text-center">
                            <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"> 
                        </div>
                    </div> 
                </fieldset>
            </form>



        </div>

    </div>
</div> 

		</div>
	  </div>
	</div>
	</section>
</div> 


					
					
				
<?php $this->template->contentBegin(POS_BOTTOM); ?>
<script src="<?= $theme_url ?>/js/jquery.validate.min.js"></script> 
<script src="<?= $theme_url ?>/js/location.js"></script> 
<script type="text/javascript">
    $("#category").validate({
        ignore: [],
        rules: {
            category_id: {
                required: true
            },
            brand_name: {
                required: true
            },
            model_no: {
                required: true
            },
            //  control_panel:{
            //   required:true
            //  },
            //  table_w:{
            //   required:true
            //  },
            //  table_l:{
            //   required:true
            //  },
            //  machine_axes:{
            //   required:true
            //  },
            //  travel_long:{
            //   required:true
            //  },
            //  travel_cross:{
            //   required:true
            //  },
            //  machine_power:{
            //   required:true
            //  },
            //  machine_rpm:{
            //   required:true
            //  },
            //  machine_description:{
            //   required:true
            //  },
            //  machine_history:{
            //   required:true
            //  },
            //  technical_specification:{
            //   required:true
            //  },
            //  capacity:{
            //   required:true
            //  },
            //  weight:{
            //   required:true
            //  },
            //  price:{
            //   required:true
            //  },
        },
        messages: {
            category_id: {
                required: "Please select category id"
            },
            brand_name: {
                required: "Please select brand name"
            },
            model_no: {
                required: "Please enter model number"
            },
            //  control_panel:{
            //   required:"Please enter control panel"
            //  },
            //  table_w:{
            //   required:"Please enter table w"
            //  },
            //  table_l:{
            //   required:"Please enter table l"
            //  },
            //  machine_axes:{
            //   required:"Please enter machine axes"
            //  },
            //  travel_long:{
            //   required:"Please enter travel long"
            //  },
            //  travel_cross:{
            //   required:"Please enter travel cross"
            //  },
            //  machine_power:{
            //   required:"Please enter machine power"
            //  },
            //  machine_rpm:{
            //   required:"Please enter machine rpm"
            //  },
            //  machine_description:{
            //   required:"Please enter machine description"
            //  },
            //  machine_history:{
            //   required:"Please enter machine history"
            //  },
            //  technical_specification:{
            //   required:"Please enter technical specification"
            //  },
            //  capacity:{
            //   required:"PLease enter capacity"
            //  },
            //  weight:{
            //   required:"Please enter weight"
            //  },
            //  price:{
            //   required:"Please enter price"
            //  },
        }
    });

// ajax request for brand model
    $('#brandId').on('change', function () {
        //alert('hi');
        var brandId = $("#brandId").val();
        $.ajax({
            type: "GET",
            url: site_url + "/machine/api/machineBrandModelList/" + brandId,
            data: {},
            success: function (result) {
                $('#brand_model').empty();
                if (result) {
                    var state_list = result.result.result;
                    $('#brand_model')
                            .append($("<option></option>")
                                    .attr("value", '')
                                    .text('Select Model'));
                    $.each(state_list, function (key, value) {
                        $('#brand_model')
                                .append($("<option></option>")
                                        .attr("value", value.md_id)
                                        .text(value.model_name));
                    });
                } else if (result.error) {

                }
            }

        });
    });
    CKEDITOR.replace('machine_description');
//CKEDITOR.replace( 'machine_at_a_glance' );
    CKEDITOR.replace('machine_history');
    CKEDITOR.replace('standard_specification');
    /*CKEDITOR.replace( 'machine_details');
     CKEDITOR.replace( 'laser_machine' );
     CKEDITOR.replace( 'lch' );
     CKEDITOR.replace( 'control_laser' );
     CKEDITOR.replace( 'data_transfer' );
     CKEDITOR.replace( 'safty' );*/
    CKEDITOR.replace('additional_equipment');
    CKEDITOR.replace('technical_specification');

</script> 
<?php $this->template->contentEnd(); ?> 