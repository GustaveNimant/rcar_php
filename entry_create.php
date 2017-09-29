<?php
include "session.php";
require_once "father_n_son_stack_module_functions.php";

/* Page where a new Entry is created */

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);
file_log_write ($module, "entering  in module"); 

father_n_son_stack_entity_push_of_current_entity ($module);

# irp_path_clean_register_of_top_key_of_bottom_key ($module, 'entry_newsurname');

$html_str = irp_provide ($module, $module . "_build");

print $html_str;
    
file_log_write ($module, "exiting from module"); 
exiting_from_module ($module);

?>
