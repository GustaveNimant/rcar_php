<?php
include "session.php";
require_once "irp_library.php";
require_once "father_n_son_stack_module_library.php";

$entity = entity_name_of_module_script_fullnameoffile (__FILE__);
$module = $entity . '_script';

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

$pre_mod = link_previous_module_name_make ();

print_html_scalar ($module, 'debut $previous_module', $pre_mod);
debug ($module, 'debut $previous_module', $pre_mod);

father_n_son_stack_module_push_of_current_module ($module);

/* delete page */
irp_path_clean_register_of_top_key_of_bottom_key_of_where ($entity, 'GET_block_current_surnamenew', $module);

/* getting DATA $get_val */
$get_key = 'block_current_surnamenew'; 
$new_sur_blo = irp_data_value_retrieve_and_store_of_get_key_of_module_name_of_where ($get_key, $module, $module);

$html_str = irp_provide ($entity, $module);

print $html_str;

$pre_mod = link_previous_module_name_make ();
print_html_scalar ($module, 'fin $previous_module', $pre_mod);
debug ($module, 'fin $previous_module', $pre_mod);
exiting_from_module ($module);

?>
