#!/bin/bash

cat $1 | sed -e 's/^[ ][ ][ ]/   $fat_by_son_a/' -e 's/ => / = "/' -e 's/$/";/'
