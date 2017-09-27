#!/bin/bash

script=`basename $0`

if [ $# -lt 1 ] 
then
    echo -e "Usage :\n ${script} $ALSE/FILES/father_n_son_stack_entity.txt\n"
    exit 1
fi

txtfile=$1
if [ ! -f ${txtfile} ] 
then 
    echo "$script : file ${txtfile} does not exist"
    exit 1
else
    echo "$script : on ${txtfile}"
fi

txtbase=`basename $txtfile`
dotfile=`echo $txtbase | sed 's/\.txt/.dot/'`

echo "dot file is ${dotfile}"

echo "digraph dgn {" > $dotfile

sed -e 's/$/;/' \
    -e '/language/d'  \
    -e '/pervasive/d' \
    -e '/common/d' \
    -e '/label/d' ${txtfile} >> ${dotfile}

echo "}" >> $dotfile

echo " do_graph.sh $dotfile"