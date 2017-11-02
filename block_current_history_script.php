<?php
include "session.php";
require_once "father_n_son_stack_entity_library.php";

require_once "block_current_history_functions.php";

$module = "block_current_history";
entering_in_module ($module);

father_n_son_stack_entity_push_of_current_entity ($module);

$html_str = irp_provide ($module, $module . "_build");

print $html_str;

/* file_log_write ($here, $log_str); */

exiting_from_module ($module);

?>
