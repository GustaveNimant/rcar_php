<?php
include "session.php";
require_once "irp_library.php";
require_once "father_n_son_stack_script_library.php";

$entity = entity_name_of_script_fullnameoffile (__FILE__);
$script = $entity . '_script';

$Documentation[$script]['what is it'] = "it is ...";
$Documentation[$script]['what for'] = "to ...";

entering_in_script ($script);

father_n_son_stack_script_push_of_current_script ($script);

irp_path_clean_register_of_top_key_of_bottom_key_of_where ($entity, 'GET_entry_current_name', $script);

/* getting DATA $get_val */
$get_key = 'entry_current_name'; 
$nam_blo_cur = irp_data_value_retrieve_and_store_of_get_key_of_script_name_of_where ($get_key, $script, $script);

$html_str = irp_provide ($entity, $script);

print $html_str;

exiting_from_script ($script);

?>
