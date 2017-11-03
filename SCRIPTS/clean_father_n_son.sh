#!/bin/bash

/keep/sources/ocaml_top/setup/utilities/delete_lines_where.pl pervasive father_n_son_entity.txt
/keep/sources/ocaml_top/setup/utilities/delete_lines_where.pl title     father_n_son_entity.txt
/keep/sources/ocaml_top/setup/utilities/delete_lines_where.pl command   father_n_son_entity.txt

chmod 777 father_n_son_entity.txt
