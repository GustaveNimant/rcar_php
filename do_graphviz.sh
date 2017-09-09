#!/bin/bash

script=`basename $0`

if [ $# -lt 1 ] 
then
    echo -e "Usage :\n ${script} father_n_son_stack_entity\n"
    exit 1
fi

file=$1
if [ ! -f ${file} ] 
then 
    echo "file ${file} does not exist"
    exit 1
fi

do_dot_file_from_father_n_son.sh $file

dotfile="$file.dot"
do_graph.sh $dotfile