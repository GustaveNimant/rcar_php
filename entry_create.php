<?php
include "session.php";
require_once "father_n_son_stack_module_functions.php";

/* Page where a new Entry is created */

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

father_n_son_stack_entity_push_of_current_entity ($module);

# irp_path_clean_register_of_top_key_of_bottom_key ($module, 'entry_newsurname');

/* if (! isset ($_SESSION['irp_register'])) { */
/*     print "NO<br>";exit; */
/* }  */

$html_str = irp_provide ($module, $module . "_build");

print $html_str;

exiting_from_module ($module);

?>
