<?php
include "session.php";
require_once "father_n_son_stack_module_functions.php";

require_once "block_modify_functions.php";

$module = "block_modify";
# entering_in_module ($module);
father_n_son_stack_entity_push_of_current_entity ($module);

debug_n_check ($module , '$_GET', $_GET);

$html_str = irp_provide ($module, $module . "_build");

debug_n_check ($module , '$html_str', $html_str);

print $html_str;

# exiting_from_module ($module);

?>
