<?php
include "session.php";

require_once "entry_display_functions.php";
require_once "link_functions.php";
require_once "father_n_son_stack_module_functions.php";

$module = module_name (__FILE__);

# entering_in_module ($module);

father_n_son_stack_entity_push_of_current_entity ($module);

$html_str = irp_provide ($module, $module . "_build");

print $html_str;

# exiting_from_module ($module);

?>
