<?

date_default_timezone_set('Asia/Kolkata');

$cn = mysqli_connect("localhost","root","","teranex");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>