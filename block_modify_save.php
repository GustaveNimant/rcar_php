<?php
include "session.php";
require_once "father_n_son_stack_module_functions.php";
require_once "block_modify_save_functions.php";

$module = "block_modify_save";
entering_in_module ($module);
father_n_son_stack_entity_push_of_current_entity ($module);

$html_str = irp_provide ($module, $module . "_build");

print $html_str;

irp_path_clean_register_of_top_key_of_bottom_key ($module, 'GET');

/* irp_path_clean_register_of_top_key_of_bottom_key ($module, 'block_content'); */
/* irp_path_clean_register_of_top_key_of_bottom_key ($module, 'user_information'); */
/* irp_path_clean_register_of_top_key_of_bottom_key ($module, 'justify'); */
/* irp_path_clean_register_of_top_key_of_bottom_key ($module, 'block_content_by_block_name_array'); */

exiting_from_module ($module);

?>