<script src="<?php echo base_url("assets/newTheme/assets/js/vendors/jquery.min.js") ?>"></script>
<script src="<?php echo base_url("assets/newTheme/assets/js/vendors/vendors.js") ?>"></script>
<!-- Local Revolution tools-->
<!-- Only for local and can be removed on server-->

<script src="<?php echo base_url("assets/newTheme/assets/js/custom.js") ?>"></script>
<script src="<?php echo base_url("assets/newTheme/assets/js/jquery-dateFormat.min.js") ?>"></script>
<script src="<?php echo base_url("assets/newTheme/assets/js/jquery.playSound.js") ?>"></script>
<script src="<?php echo base_url("assets/newTheme/assets/js/toastr.min.js") ?>"></script>
<script src="<?php echo base_url("assets/newTheme/assets/js/anchorme.min.js") ?>"></script>
<script src="<?php echo base_url("assets/newTheme/assets/js/fastselect.standalone.min.js") ?>"></script>
<script src="<?php echo base_url("assets/newTheme/assets/js/magicsuggest.js") ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<!-- <script src="<?php /*echo base_url("assets/newTheme/assets/js/socket.io.min.js")."?".rand(5,50000); */?>"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
<script src="<?php echo base_url("assets/newTheme/assets/js/socket.io-file-client.js") ?>"></script>

<script src="<?php echo base_url("assets/js/scripts/jwt-decode.min.js") ?>"></script>
<script src="<?php echo base_url("assets/js/jquery-ui.min.js") ?>"></script>
<script src="<?php echo base_url("assets/js/bootstrap-multiselect.js") ?>"></script>
<script src="<?php echo base_url("assets/newTheme/assets/js/clamp.min.js") ?>"></script>

<script src="//vjs.zencdn.net/5.4.6/video.min.js"></script>
<script>
    var baseUrl="<?php echo base_url() ?>";
</script>

<script src="<?php echo base_url("assets/js/video.min.js")?>"></script>
<script src="<?php echo base_url("assets/js/scripts/fullcalendar.min.js") ?>"></script>

<script>
    let $buoop = {
        notify:{e:-1,f:-1,o:-1,s:-1,c:-1},
        insecure:true,
        api:5,
        text:"Your browser, {brow_name}, is too old for Chat manager: <a{up_but}>update</a>.",
        style: "top",
        container: document.body,
        jsshowurl: "//browser-update.org/update.show.min.js",
        l: false,
    };
    function $buo_f(){
        let e = document.createElement("script");
        e.src = "//browser-update.org/update.min.js";
        document.body.appendChild(e);
    };
    try {document.addEventListener("DOMContentLoaded", $buo_f,false)}
    catch(e){window.attachEvent("onload", $buo_f)}
</script>