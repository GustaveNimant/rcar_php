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

dotfile="$file.dot"

echo "digraph dgn {" > $dotfile

cat ${file} | \
sed -e 's/$/;/' \
    -e '/language/d'  \
    -e '/pervasive/d' \
    -e '/common/d' \
    -e '/label/d' >> ${dotfile}

echo "}" >> $dotfile

echo " do_graph.sh $dotfile"