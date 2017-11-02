<?php
include "session.php";
require_once "father_n_son_stack_entity_library.php";
require_once "arce_functions.php";

/* require_once "debug_html_library.php"; */
/* require_once "parsing_modifys_items_functions.php"; */

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

father_n_son_stack_entity_push_of_current_entity ($module);

entering_in_module ($module);
file_log_write ($module, "entering  in module"); 

# irp_path_clean_register_of_top_key_of_bottom_key_of_where ($module, 'entry_name_array', $module);

$html_str = irp_provide ($module, $module . "_build");

print $html_str;

file_log_write ($module, "exiting from module"); 
exiting_from_module ($module);

?>
