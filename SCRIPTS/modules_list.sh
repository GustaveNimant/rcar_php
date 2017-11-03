#!/bin/bash
ls *php | egrep -v '_functions.php|_library.php|_register.php'

#  for i in `modules_list.sh` ; do echo $i;grep -c session.php $i; done