<?php
include "session.php";
require_once "father_n_son_stack_module_functions.php";

require_once "item_list_neworder_functions.php";

$module = "item_list_neworder";
entering_in_module ($module);
father_n_son_stack_entity_push_of_current_entity ($module);

debug_n_check ($module , "GET", $_GET);

$html_str = irp_provide ($module, $module . "_build");

print $html_str;

exiting_from_module ($module);

?>

