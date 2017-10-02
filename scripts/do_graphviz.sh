#!/bin/bash

script=`basename $0`

if [ $# -lt 1 ] 
then
    echo -e "Usage :\n ${script} father_n_son_entity.txt\n"
    exit 1
fi

txtfile=$ALSE/FILES/$1
if [ ! -f ${txtfile} ] 
then 
    echo "$script : file ${txtfile} does not exist"
    exit 1
else
    echo "$script : found file ${txtfile}"
fi

do_dot_file_from_father_n_son.sh $txtfile

dotfile=`echo $1 | sed 's/\.txt/.dot'`

do_graph.sh $dotfile