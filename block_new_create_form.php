<?php
include "session.php";

require_once "block_new_create_form_functions.php";
require_once "father_n_son_stack_module_functions.php";

$module = module_name (__FILE__);

# entering_in_module ($module);

father_n_son_stack_entity_push_of_current_entity ($module);

irp_path_clean_register_of_top_key_of_bottom_key ($module, 'block_content');
$html_str = irp_provide ('block_new_create_form', $module . '_build');

print $html_str;

# exiting_from_module ($module);

?>