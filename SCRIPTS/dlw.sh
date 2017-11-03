#!/bin/bash

delete_lines_where.pl "from module" $1
delete_lines_where.pl "function bubble_" $1
delete_lines_where.pl "in module" $1
delete_lines_where.pl Rcar.log $1
delete_lines_where.pl common_html $1
delete_lines_where.pl entry_information_array $1
delete_lines_where.pl father_n_son_stack_entity_push_of_father_of_son $1
delete_lines_where.pl file_content_append $1
delete_lines_where.pl file_log $1