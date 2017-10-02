#!/bin/bash

egrep 'entering|exiting' debug  | egrep -v ' check_| is_|has_|!--'
