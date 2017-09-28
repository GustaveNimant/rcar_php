<?php
include "session.php";

require_once "father_n_son_stack_module_functions.php";
require_once "command_functions.php";

$module = "command";
entering_in_module ($module);

father_n_son_stack_entity_push_of_current_entity ($module);

$html_str = irp_provide ($module, $module . '_build');

if (isset ($_GET['command_action']) && (isset ($_GET['command_argument'])) ) {
    $nam_act = $_GET['command_action'];
    $str_arg = $_GET['command_argument'];
    command_action_of_action_name_of_argument ($nam_act, $str_arg);
}

print $html_str;

exiting_from_module ($module);

?>
