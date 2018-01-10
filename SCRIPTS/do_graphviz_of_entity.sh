#!/bin/bash

do_graphviz.sh 

script=`basename $0`

if [ $# -lt 1 ] 
then
    pngfile="father_n_son_entity.png"
else
    pngfile="father_n_son_entity_$1.png"
    cp father_n_son_entity.png $pngfile
fi

echo -e "\n eog $pngfile &\n"
