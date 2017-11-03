#!/bin/bash

script=`basename $0`

if [ $# -lt 1 ] 
then
    echo -e "Usage :\n ${script} string\n"
    exit 1
fi

egrep '^function ' *php | grep $1  