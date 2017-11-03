#!/bin/bash
#!/bin/bash

chown www-data.www-data father_n_son_entity.txt
echo '$fat_n_son_h = array (' > father_n_son_entity.array
sed -e 's/^/"/' -e 's/$/",/' $1 >> father_n_son_entity.array
echo -e "\n);" >> father_n_son_entity.array

/keep/sources/ocaml_top/setup/utilities/delete_lines_where.pl pervasive father_n_son_entity.array
/keep/sources/ocaml_top/setup/utilities/delete_lines_where.pl title     father_n_son_entity.array
/keep/sources/ocaml_top/setup/utilities/delete_lines_where.pl command   father_n_son_entity.array


