#!/bin/bash

cp $1 $1.sav
echo "file $1 has been saved as $1.sav"

sed '/^$module/ s/= "[a-z].*[a-z]"/= module_name (__FILE__)/' $1.sav > b 
echo "" > a
echo "\$Documentation[\$module]['what is it'] = \"it is ...\";" >> a
echo "\$Documentation[\$module]['what for'] = \"to ...\";" >> a
echo "" >> a

sed '/^$module/r a' b > $1 

echo "diff $1.sav $1"