<?php $this->template->contentBegin(POS_TOP);?>
<style type="text/css">
 
</style>
<?php $this->template->contentEnd();  ?> 
<div class="container">
    <center><h1>Customer Service Report</h1></center>
    <div class="col-sm-12">
        <div class="border_bot" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;">
          <form class="" name="" id="cust_service_report" method="post" enctype="multipart/form-data" action="#" >
                <div class="form-group ">
                  <div class="col-sm-6"><input type="text" id="csr_no" name="csr_no" class="form_bor_bot numbersOnly" placeholder="CSR No." ></div>
                  <div class="col-sm-6"><input type="text" id="date" name="date" class="datepicker form_bor_bot" placeholder="Date" ></div>
                </div><div class="clearfix"></div><br/>
                <div class="form-group">
                  <div class="col-sm-6"><input type="text" id="cust_name" name="cust_name" class="form_bor_bot" placeholder="Customer Name" ><span class="compulsary">*</span></div>
                  <div class="col-sm-6"><input type="text" id="address" name="address" class="form_bor_bot" placeholder="Address" ></div>
                </div><div class="clearfix"></div><br/>
                <div class="form-group">
                  <div class="col-sm-6"><input type="text" id="city" name="city" class="form_bor_bot" placeholder="City" ></div>
                  <div class="col-sm-6"><input type="text" id="state" name="state" class="form_bor_bot" placeholder="State" ></div>
                </div><div class="clearfix"></div><br/>
                <div class="form-group">
                  <div class="col-sm-6"><input type="text" id="zipcode" name="zipcode" class="form_bor_bot numbersOnly" minlength="6" maxlength="6" placeholder="ZIP Code" ></div>
                  <div class="col-sm-6"><input type="text" id="callstatus" name="callstatus" class="form_bor_bot" placeholder="Status of Call" ></div>
                </div>
                <div class="clearfix"></div>
                <h3>Nature Of Problem</h3>
                <div class="form-group">
                  <div class="col-sm-6"><input type="text" id="problemreported" name="problemreported" class="form_bor_bot" placeholder="Problem Reported" ></div>
                  <div class="col-sm-6"><input type="text" id="machine" name="machine" class="form_bor_bot" placeholder="Machine" ></div>
                </div><div class="clearfix"></div><br/>
                <div class="form-group">
                  <div class="col-sm-6"><input type="text" id="type" name="type" class="form_bor_bot" placeholder="Type" ></div>
                  <div class="col-sm-6"><input type="text" id="brand" name="brand" class="form_bor_bot" placeholder="Brand" ></div>
                </div><div class="clearfix"></div><br/>
                <div class="form-group">
                  <div class="col-sm-6"><input type="text" id="model" name="model" class="form_bor_bot" placeholder="Model" ></div>
                  <div class="col-sm-6"><input type="text" id="serialno" name="serialno" class="form_bor_bot numbersOnly" placeholder="Serial No." ></div>
                </div><div class="clearfix"></div><br/>
                <div class="form-group">
                  <div class="col-sm-6"><input type="text" id="callreportby" name="callreportby" class="form_bor_bot" placeholder="Call Reported By" ></div>
                  <div class="col-sm-6"><input type="text" id="rdate" name="rdate" class="form_bor_bot datepicker" placeholder="Date" ></div>
                </div><div class="clearfix"></div><br/>
                <div class="form-group">
                  <div class="col-sm-6"><input type="text" id="time" name="time" class="form_bor_bot" placeholder="Time" ></div>
                  <div class="col-sm-6"><input type="text" id="location" name="location" class="form_bor_bot" placeholder="Location of Installation" ></div>
                </div>
                <div class="clearfix"></div>
                <h3>Service Details</h3>
                  <div class="form-group">
                    <div class="col-sm-6"><input type="text" id="servicerender" name="servicerender" class="form_bor_bot" placeholder="Service Rendered" ><span class="compulsary">*</span></div>
                    <div class="col-sm-6"><input type="text" id="rendertime" name="rendertime" class="form_bor_bot" placeholder="Time" ></div>
                  </div>
                  <div class="clearfix"></div><br/>
                  <div class="text-center">
                    <input type="submit" name="addSubmit" id="submit" class="btn btn_orange" value="Submit" />
                  </div>
          </form>
        </div>
    </div>
   
</div>
  <div class="clearfix"></div><br/>
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>  
 
 <script type="text/javascript">
$(function() {
           $(".datepicker").datepicker({ dateFormat: "yy-mm-dd", minDate: 0}).val()
   }); 
jQuery('.numbersOnly').keyup(function () { 
this.value = this.value.replace(/[^0-9\.]/g,'');
});
$("#cust_service_report").validate({
    rules: {  
        cust_name:{
          required:true
        },
        servicerender:{
          required:true
        },
      },
    messages: { 
      cust_name:{
        required:"Please enter customer name"
      },
      servicerender:{
        required:"Please enter service rendered"
      },
    }
  }); 
</script>
<?php $this->template->contentEnd();  ?> 
