#!/bin/bash

egrep 'entering|exiting' Rcar.deb  | egrep -v ' check_| is_|has_|!--'
