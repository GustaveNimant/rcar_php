#!/bin/bash

if [ ! -d .save ]
then 
    mkdir .save
fi

cp $1 .save/$1
cat $1 | sed -e '/^[[:blank:]]*debug/s/^/#/' > x
mv x $1