<?php
include "session.php";
require_once "irp_library.php";
require_once "father_n_son_stack_script_library.php";

$entity = entity_name_of_script_fullnameoffile (__FILE__);
$script = $entity . '_script';

$Documentation[$script]['what is it'] = "it is ...";
$Documentation[$script]['what for'] = "to ...";
$Documentation[$script]['how it is done'] = "by a NON trivial way";
$Documentation[$script]['improve'] = "READ_ must be detected automatically as leaves";

entering_in_script ($script);

father_n_son_stack_script_push_of_current_script ($script);

print_html_array ($script, '$_GET', $_GET);

$get_key = $_SESSION['get_key_by_script_name'][$entity]; /* 'block_current_name' */ 

/* removing entity page */
irp_path_clean_register_of_top_key_of_bottom_key_of_where ($entity, 'GET_' . $get_key, $script);
# irp_path_clean_register_of_top_key_of_bottom_key_of_where ($entity, 'READ_block_current_nameoffile_array', $script); /* Improve this is not obvious */

/* getting DATA $get_val */
$nam_blo_cur = irp_data_value_retrieve_and_store_of_get_key_of_script_name_of_where ($get_key, $script, $script);

$html_str = irp_provide ($entity, $script);

print $html_str;

exiting_from_script ($script);

?>
