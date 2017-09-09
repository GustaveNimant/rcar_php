<?php
include "session.php";
require_once "array_functions.php";
require_once "apropos_functions.php";
require_once "irp_functions.php";
require_once "father_n_son_stack_module_functions.php";

$module = "apropos";
# entering_in_module ($module);

$html_str = irp_provide ($module, $module . "_build");

debug_n_check ($module , '$html_str', $html_str);

print $html_str;

# exiting_from_module ($module);

?>
