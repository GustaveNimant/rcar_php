<?php
include "session.php";
require_once "irp_library.php";

$entity = entity_name_of_module_script_fullnameoffile (__FILE__);
$module = $entity . '_script';

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

father_n_son_stack_module_push_of_current_module ($module);

$html_str = irp_provide ($entity, $module);

print $html_str;

exiting_from_module ($module);

?>
