webcam-motion-detecting
=======================
* addtofeeddb.php *
Used to add motion detection occurences to a database - you can configure motion to do this for you...
* generatefeed.php *
Generates an RSS feed that is also placed in the folder that is ftped up to hosting
* mailer.php *
Email alerting script
* motion.conf *
Example motion configuration used 
* motion-detector.sh *
Cron'd job that checks if there are any files in the motion folder and uploads them (along with an RSS feed) .
* motion-restart.sh *
Crude restart script because motion was crashing probably due to my webcam.
