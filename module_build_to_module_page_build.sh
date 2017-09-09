#!/bin/bash

for i in `ls *php | grep -v functions`
do
    echo "module $i"
    if [ `grep -c ${i}_build ${i}_functions.php` -ne 0 ]
    then
	echo "function $i_build"
    fi
done