#!/bin/bash
ProcessID="$$"
ScriptName="motion-detector"
LockFile=/var/run/${ScriptName}.lock

if [[ -f ${LockFile} ]];then
 echo "Another Process was started (PID $(cat ${LockFile}))"
 Running=$(ps -ef | grep `cat ${LockFile}` | grep -v grep | wc -l)
 if [ ${Running} -ne 0 ] ; then
  echo "Process still running."
 else
  echo "Stale pid file. Removing"
  rm -f ${LockFile}
 fi
 exit 1
fi

echo "${ProcessID}" >${LockFile}
# Remove $lockfile when Ctrl+C is pressed
trap "rm ${LockFile}" EXIT
# __________________________
# ______Start Script________

DIR="/home/pi/motion/motion"
PHPDIR="/home/pi/scripts/motion"
if [ "$(ls -A $DIR)" ]; then
     echo "Take action $DIR is not Empty"

php ${PHPDIR}/addtofeeddb.php
sdir="stuff/motion"
hostname="ftp.gregkeeley.com"
username="gregkeeley"
password="P0gm0th01n!!"

cd $DIR
chmod 755 *
mkdir feed
cd ${DIR}/feed
php ${PHPDIR}/generatefeed.php > ${DIR}/feed/feed.xml

ncftp <<EOF
open -u  $username -p $password $hostname
cd stuff/motion
lcd "/home/pi/motion/motion"
put -R *
bye
EOF

rm -rf ${DIR}/motion/*
#php /usr/bin/mailer.php
else
    echo "$DIR is Empty"
fi
