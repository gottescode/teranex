<?php
  header('Content-Type: image/png');
  readfile("../../teranex_img/" . $_GET['img']);
?>