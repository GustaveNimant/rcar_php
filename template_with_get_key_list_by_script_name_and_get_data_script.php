<?php
include "session.php";
require_once "irp_library.php";
require_once "father_n_son_stack_script_library.php";

$entity = entity_name_of_script_fullnameoffile (__FILE__);
$script = $entity . '_script';

$Documentation[$script]['what is it'] = "it is ...";
$Documentation[$script]['what for'] = "to ...";
$Documentation[$script]['how it is done'] = "cp template_with_get_key_list_by_script_name_and_get_data_script.php";

entering_in_script ($script);

father_n_son_stack_script_push_of_current_script ($script);

/* getting $get_keys from list */
$get_key_lis = $_SESSION['get_key_by_script_name'][$entity];

$get_key_1 = string_word_of_glue_of_ordinal_of_string (':', 1, $get_key_lis);  /* block_current_surnamenew */
$get_key_2 = string_word_of_glue_of_ordinal_of_string (':', 2, $get_key_lis);  /* block_current_surnamenew_justification */

/* removing entity page */
irp_path_clean_register_of_top_key_of_bottom_key_of_where ($get_key_1, 'GET_' . $get_key_1, $script);
irp_path_clean_register_of_top_key_of_bottom_key_of_where ($get_key_2, 'GET_' . $get_key_2, $script);

/* getting DATA $get_val */
$log_str = irp_data_value_only_store_of_get_key_of_script_name_of_where ($get_key_1, $script, $script);
file_log_write ($script, $log_str);

$log_str = irp_data_value_only_store_of_get_key_of_script_name_of_where ($get_key_2, $script, $script);
file_log_write ($script, $log_str);

$html_str = irp_provide ($entity, $script);

print $html_str;

exiting_from_script ($script);

?>
