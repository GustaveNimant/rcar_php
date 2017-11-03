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

dotfile=`echo $txtfile | sed 's/\.txt/.dot/'`

echo "dot file is ${dotfile}"

echo "digraph dgn {" > $dotfile

sed -e 's/$/;/' \
    -e '/language/d'  \
    -e '/pervasive/d' \
    -e '/common/d' \
    -e '/label/d' ${txtfile} >> ${dotfile}

echo "}" >> $dotfile

echo " do_graph.sh $dotfile"