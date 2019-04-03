<?php


 include_once APPPATH."libraries/linkedin/config.php";

if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != "") {
  // user already logged in the site
$this->template->load('home');
}

include_once APPPATH."libraries/linkedin/header.php";
?>
<div class="container">
  <div class="margin10"></div>
  
  <?php if ($_SESSION["e_msg"] <> "") { ?>
    <div class="alert alert-dismissable alert-danger">
      <button data-dismiss="alert" class="close" type="button">x</button>
      <p><?php echo $_SESSION["e_msg"]; ?></p>
    </div>
  <?php } ?>
  <div class="col-sm-3 col-sm-offset-4 padding20">
    <a class="btn btn-block btn-social btn-linkedin" href="<?php echo site_url() . "pages/linked_login" ?>">
            <i class="fa fa-linkedin"></i> Login with LinkedIn
          </a>
  </div>
</div>
<?php
include_once APPPATH."libraries/linkedin/footer.php";
// unset if after it display the error.
$_SESSION["e_msg"] = "";
?>
