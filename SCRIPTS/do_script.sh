#!/bin/bash

script=`basename $0`

if [ $# -lt 1 ] 
then
    echo -e "Warning :\n ${script} no input file. father_n_son_entity.txt used\n"
    txtfile=father_n_son_entity.txt
else
    txtfile=$1
fi

if [ ! -f ${txtfile} ] 
then 
    echo "$script : file ${txtfile} does not exist"
    exit 1
else
    echo "$script : on ${txtfile}"
fi

