
<?php
    header("Content-Type: application/rss+xml; charset=ISO-8859-1");
     = date('l jS \of F Y h:i:s A');
     = '<?xml version="1.0" encoding="ISO-8859-1"?>';
     .= '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">';
     .= '<channel>';
     .= '<title>Greg\'s Motion Detector</title>';
     .= '<link>http://stuff.example.com</link>';
     .= '<description>Something just moved!! Find out more in this feed!</description>';
     .= '<language>en-us</language>';
     .= '<copyright>Copyright (C) 2013 stuff.example.com</copyright>';
     .= '<atom:link href="http://stuff.example.com/stuff/motion/feed/feed.xml" rel="self" type="application/rss+xml" />'; 
     = mysqli_connect('localhost', 'user', 'password', 'database');

if (!) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
 
     = "SELECT * FROM feed ORDER BY date DESC";
 
=0;

if ( = mysqli_prepare(, )) {

    /* execute statement */
    mysqli_stmt_execute();

    /* bind result variables */
    mysqli_stmt_bind_result(, , , , );

    /* fetch values */
    while (mysqli_stmt_fetch()) {

++; 

     //   printf ("%s %s %s %s\n", , , , );
         .= '<item>';
         .= '<title>' .  . '</title>';
         .= '<description>' .  . '</description>';
         .= '<link>' .  . '</link>';
         .= '<pubDate>' . date("D, d M Y H:i:s O", strtotime()) . '</pubDate>';
         .= '<guid>' .  . "#". date("H:i:s") .  . '</guid>';
         .= '</item>';

    }

    /* close statement */
    mysqli_stmt_close();
}

/* close connection */
mysqli_close();

/*
    = ->query() or die ("Could not execute query");
 printf("Select returned %d rows.\n", ->num_rows);
   while( = mysql_fetch_array()) {
        extract();
 
         .= '<item>';
         .= '<title>' .  . '</title>';
         .= '<description>' .  . '</description>';
         .= '<link>' .  . '</link>';
         .= '<pubDate>' . date("D, d M Y H:i:s O", strtotime()) . '</pubDate>';
         .= '</item>';
    }
 */
     .= '</channel>';
     .= '</rss>';
 
    echo ;
?>

