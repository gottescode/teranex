<html>
<head>
    <title>Upload Form</title>
</head>
<body>
<pre>
<?php print_r($error);?>
<?php print_r($message);?>
</pre>
<?php echo form_open_multipart();?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" name="send" />

</form>

</body>
</html>