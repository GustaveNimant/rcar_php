<?php
include "session.php";
require_once "father_n_son_stack_module_functions.php";

require_once "block_rename_functions.php";

$module = "block_rename";
entering_in_module ($module);
father_n_son_stack_entity_push_of_current_entity ($module);

/* $irp_register = $_SESSION['irp_register']; */

/* $nam_ite = irp_provide ('block_current_name', $module); */
/* $log_str = "$module : Block_current_name >$nam_ite< stored"; */

$html_str = irp_provide ($module, $module . "_build");

print $html_str;

/* $_SESSION['irp_register'] = $irp_register; */

/* file_log_write ($here, $log_str); */

exiting_from_module ($module);

?>
