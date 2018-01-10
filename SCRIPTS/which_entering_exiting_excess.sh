
#!/bin/bash

script=`basename $0`

if [ $# -lt 1 ] 
then
    echo -e "Usage :\n ${script} string\n"
    exit 1
fi

functions=`grep -h '^function ' $1 | cut -d" " -f2`
for i in `echo $functions`
do
    entering=`grep -w "$i" Rcar.deb  | grep entering | wc -l`;
    exiting=`grep -w "$i" Rcar.deb  | grep exiting | wc -l`;
    if [ $entering -ne $exiting ]
    then
	echo "$i entering $entering"
	echo "$i exiting  $exiting"
    fi
done

