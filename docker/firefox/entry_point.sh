#!/bin/bash
#
# IMPORTANT: Change this file only in directory StandaloneDebug!

# this is customized version of entry_point.sh that creates and runs a python server
# listing all the files in the download directory
# so we can see which files were downloaded by firefox


## THe path we should actually run this on is /home/seluser/Downloads; as that firefox profile is running under seluser
## Again; imgData links don't actually download in selenium anyway... so there is no reason to look at this now
## For these kinds of images; we should convert to reading the image from canvas: https://intoli.com/blog/saving-images/

$thePWD=$(pwd)
mkdir /root/Downloads
cd /root/Downloads
# Start server
nohup python3 -m http.server 8732 &> /dev/null &
cd $thePWD

source /opt/bin/functions.sh

export GEOMETRY="$SCREEN_WIDTH""x""$SCREEN_HEIGHT""x""$SCREEN_DEPTH"

function shutdown {
  kill -s SIGTERM $NODE_PID
  wait $NODE_PID
}

if [ ! -z "$SE_OPTS" ]; then
  echo "appending selenium options: ${SE_OPTS}"
fi

rm -f /tmp/.X*lock

SERVERNUM=$(get_server_num)
env | cut -f 1 -d "=" | sort > asroot
sudo -E -u seluser -i env | cut -f 1 -d "=" | sort > asseluser
sudo -E -i -u seluser \
  $(for E in $(grep -vxFf asseluser asroot); do echo $E=$(eval echo \$$E); done) \
  DISPLAY=$DISPLAY \
  xvfb-run -n $SERVERNUM --server-args="-screen 0 $GEOMETRY -ac +extension RANDR" \
  java ${JAVA_OPTS} -jar /opt/selenium/selenium-server-standalone.jar \
  ${SE_OPTS} &
NODE_PID=$!

trap shutdown SIGTERM SIGINT
for i in $(seq 1 10)
do
  xdpyinfo -display $DISPLAY >/dev/null 2>&1
  if [ $? -eq 0 ]; then
    break
  fi
  echo Waiting xvfb...
  sleep 0.5
done

fluxbox -display $DISPLAY &

x11vnc -forever -usepw -shared -rfbport 5900 -display $DISPLAY &

wait $NODE_PID
