<?php
include "session.php";

require_once "git_command_functions.php";
require_once "father_n_son_stack_module_functions.php";

$module = "git_command";
entering_in_module ($module);

father_n_son_stack_entity_push_of_current_entity ($module);

$html_str = irp_provide ('git_command', $module . "_build");

print $html_str;

# irp_path_clean_register_of_top_key_of_bottom_key ($module, 'git_command');

exiting_from_module ($module);

?>