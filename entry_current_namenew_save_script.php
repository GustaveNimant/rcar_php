<?php
include "session.php";
require_once "irp_library.php";
require_once "father_n_son_stack_module_library.php";

$entity = entity_name_of_module_script_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($entity . '_script');

father_n_son_stack_entity_push_of_current_entity ($entity);

irp_path_clean_register_of_top_key_of_bottom_key_of_where ('entry_current_namenew_save', 'GET_entry_current_surnamenew', $module);

/* getting DATA $get_val */
$get_key = 'entry_current_surnamenew'; 
$nam_blo_cur = irp_data_value_retrieve_and_store_of_get_key_of_module_name_of_where ($get_key, $module, $module);

$html_str = irp_provide ($entity, $entity . '_script');

print $html_str;

exiting_from_module ($entity . '_script');

?>
