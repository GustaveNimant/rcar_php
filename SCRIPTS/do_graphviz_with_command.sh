#!/bin/bash

script=`basename $0`

if [ $# -lt 1 ] 
then
    echo -e "Warning :\n ${script} no input file. father_n_son_entity.txt used\n"
    txtfile=father_n_son_entity.txt
else
    txtfile=$1
fi

txtpath=$ALSE/FILES/$txtfile
if [ ! -f ${txtpath} ] 
then 
    echo "$script : file ${txtpath} does not exist"
    exit 1
else
    echo "$script : found file ${txtpath}"
fi

cp ${txtpath} $txtfile

/keep/sources/ocaml_top/setup/utilities/delete_lines_where.pl pervasive ${txtfile}
/keep/sources/ocaml_top/setup/utilities/delete_lines_where.pl title     ${txtfile}

do_dot_file_from_father_n_son.sh $txtfile

dotfile=`echo $txtfile | sed 's/\.txt/.dot/'`

do_graph.sh $dotfile