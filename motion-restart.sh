#/bin/bash
ProcessID="$$"
ScriptName="motion-restart"
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


PROCID=$(ps aux|grep motion|head -1|awk '{print$2}')
echo ${PROCID}
kill ${PROCID}
motion

