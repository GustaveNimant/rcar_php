#!/bin/bash

/keep/sources/ocaml_top/setup/utilities/delete_lines_where.pl 'entering  in module' Rcar.deb 
/keep/sources/ocaml_top/setup/utilities/delete_lines_where.pl 'exiting from module' Rcar.deb 

chmod 777 Rcar.deb