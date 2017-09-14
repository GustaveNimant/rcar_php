<?php
include "session.php";

require_once "father_n_son_stack_module_functions.php";

$module = "item_new_create";
# entering_in_module ($module);

father_n_son_stack_entity_push_of_current_entity ($module);

irp_path_clean_register_of_top_key_of_bottom_key ($module, 'item_content');
$html_str = irp_provide ('item_new_create', $module . '_build');

print $html_str;

# exiting_from_module ($module);

?>