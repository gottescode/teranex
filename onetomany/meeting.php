<?php
    //echo "Type=>". $_GET['type']; 
    $type = $_GET['type']; 
?>

<!DOCTYPE html>
<html>

<head>
    <title> OpenTok Getting Started </title>
    <link href="css/app.css" rel="stylesheet" type="text/css">

    <script src="https://static.opentok.com/v2/js/opentok.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript">
        var type = '<?php echo $type; ?>';        
    </script>
</head>

<body>
 <button id="publish">Publish</button>
 <button id="unpublish">Stop Meeting</button>
    <div id="videos">
        <div id="subscriber"></div>
        <div id="publisher"></div>
    </div>
	
    <script type="text/javascript" src="js/app.js"></script>
</body>

</html>
