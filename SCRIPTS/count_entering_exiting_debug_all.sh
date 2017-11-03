#!/bin/bash

script=`basename $0`

if [ $# -lt 0 ] 
then
    echo -e "Usage :\n ${script} string\n"
    exit 1
fi

all=`fgrep.sh functions.php *php | cut -d":" -f2 | cut -d" " -f2`
for i in $all
do
    count_entering_exiting_debug.sh $i
done