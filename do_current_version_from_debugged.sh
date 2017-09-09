#!/bin/bash

cp DEBUGGED_VERSION/*.php .
for i in *php
do
    do_comment_debug.sh $i
done