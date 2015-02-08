#!/usr/bin/php
<?php
    // EDIT THE 2 LINES BELOW AS REQUIRED
     = "email@example.com";
     = "Message from Motion";

     = "server@example.com";
     
 
    function died() {
        echo ."<br /><br />";
        die();
    }
     
     = "MOTION DETECTED\n\n";
    .= "Please check FTP for latest imagery";

 = 'From: '.."\r\n".
'Reply-To: '.."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail(, , , );  
echo "sent";
?>
