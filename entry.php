<?php
include "session.php";

require_once "entry_functions.php";
require_once "link_functions.php";
require_once "father_n_son_stack_module_functions.php";

$module = "entry";
entering_in_module ($module);

father_n_son_stack_entity_push_of_current_entity ($module);

irp_path_clean_register_of_top_key_of_bottom_key ($module, 'entry_name');
/* irp_path_clean_register_of_top_key_of_bottom_key ($module, 'entry_section_create_item_title'); */
/* irp_path_clean_register_of_top_key_of_bottom_key ($module, 'entry_section_reorder_item_title'); */

$html_str = irp_provide ($module, $module . "_build");

debug_n_check ($module , '$html_str', $html_str);

print $html_str;

exiting_from_module ($module);

debug ($module, 'SESSION irp_register', $_SESSION['irp_register']);

?>
