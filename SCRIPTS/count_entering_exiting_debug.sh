#!/bin/bash

script=`basename $0`

if [ $# -lt 1 ] 
then
    echo -e "Usage :\n ${script} string\n"
    exit 1
fi

entering=`grep "entering  in function $1" ee| wc -l`
exiting=`grep "exiting from function $1" ee| wc -l`
echo "$1 entering $entering"
echo "$1 exiting  $exiting"
