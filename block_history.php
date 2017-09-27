<?php
include "session.php";
require_once "father_n_son_stack_module_functions.php";

require_once "block_history_functions.php";

$module = "block_history";
# entering_in_module ($module);
father_n_son_stack_entity_push_of_current_entity ($module);

$html_str = irp_provide ($module, $module . "_build");

print $html_str;

/* $_SESSION['irp_register'] = $irp_register; */

/* file_log_write ($here, $str_log); */

# exiting_from_module ($module);

?>
