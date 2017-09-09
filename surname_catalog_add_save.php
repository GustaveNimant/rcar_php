<?php
include "session.php";
require_once "father_n_son_stack_module_functions.php";
require_once "surname_catalog_add_save_functions.php";

$module = "surname_catalog_add_save";
# entering_in_module ($module);

father_n_son_stack_entity_push_of_current_entity ($module);

$html_str = irp_provide ($module, $module . "_build");

print $html_str;

irp_path_clean_register_of_top_key_of_bottom_key ($module, 'GET');

/* irp_path_clean_register_of_top_key_of_bottom_key ($module, 'name_without_surname'); */
/* irp_path_clean_register_of_top_key_of_bottom_key ($module, 'surname_of_name_without_surname'); */

# exiting_from_module ($module);

?>
