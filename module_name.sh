#!/bin/bash

cp $1 $1.sav
echo "file $1 has been saved as $1.sav"

sed '/^$module/ s/= "[a-z].*[a-z]"/= module_name (__FILE__)/' $1.sav > $1 

echo "diff $1.sav $1"