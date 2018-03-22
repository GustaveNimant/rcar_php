<?php
include "session.php";
require_once "irp_library.php";
require_once "father_n_son_stack_script_library.php";

$entity = entity_name_of_script_fullnameoffile (__FILE__);
$script = $entity . '_script';

$Documentation[$script]['what is it'] = "it is ...";
$Documentation[$script]['what for'] = "to ...";
$Documentation[$script]['how it is done'] = "from template_irp_path_clean_only_store_foreach_script.php";

entering_in_script ($script);

father_n_son_stack_script_push_of_current_script ($script);

foreach ($_GET as $get_key => $get_val) {
    /* removing entity page */
    irp_path_clean_register_of_top_key_of_bottom_key_of_where ($entity, 'GET_' . $get_key, $script);
    
    /* storing */
    $log_str = irp_data_value_only_store_of_get_key_of_script_name_of_where ($get_key, $script, $script);
    file_log_write ($script, $log_str);
}

irp_path_clean_register_of_top_key_of_bottom_key_of_where ($entity, 'entry_current_selection_display_menuselect', $script);

$html_str = irp_provide ($entity, $script);

print $html_str;

/* Iùprove 'entry_current_name_last' $_SESSION['entry_current_name_last'] = $get_val; */

exiting_from_script ($script);

?>
