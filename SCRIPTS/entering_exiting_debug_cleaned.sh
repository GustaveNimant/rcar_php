#!/bin/bash

egrep 'entering|exiting' Rcar.deb  | egrep -v ' check_| is_|has_|!--|function irp_|function session_hash_push_|function father_n_son_stack|function common_html|function bubble|^... e'
