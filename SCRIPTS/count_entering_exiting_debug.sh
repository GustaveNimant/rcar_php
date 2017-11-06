#!/bin/bash

script=`basename $0`

if [ $# -lt 1 ] 
then
    echo -e "Usage :\n ${script} function_initial_string\n"
    exit 1
fi

entering=`grep "entering  in function $1" ee`
entering_count=`grep "entering  in function $1" ee| wc -l`
exiting=`grep "exiting from function $1" ee`
exiting_count=`grep "exiting from function $1" ee| wc -l`

echo "$entering"
echo "$exiting"

echo "$1 entering $entering_count"
echo "$1 exiting  $exiting_count"
