
 <?php 
error_reporting(E_ALL);  
$connection = mysqli_connect('localhost', 'user', 'password', 'database');
date_default_timezone_set('UTC');

if (!$connection) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}


$feedtitle=date('l jS \of F Y h:i:s A')." Motion Detected";
$feeddescription="Something moved at: ".date('h:i A');
$feedurl="http://stuff.example.com/stuff/index.php?dir=motion%2F".date('Ymd')."%2F";


mysqli_query($connection,"INSERT INTO  feed (title ,description ,link ,date) VALUES ('$feedtitle',  '$feeddescription',  '$feedurl',CURRENT_TIMESTAMP);");

//mysqli_query($connection,"INSERT INTO  feed (title ,description ,link ,date) VALUES ('Motion Detected',  'Something moved',  'http://stuff.example.com/stuff',CURRENT_TIMESTAMP);");

/* close connection */
mysqli_close($connection);
echo "done";
 ?>

