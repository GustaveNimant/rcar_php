<?php
include "session.php";
require_once "irp_library.php";
require_once "father_n_son_stack_script_library.php";

$entity = entity_name_of_script_fullnameoffile (__FILE__);
$script = $entity . '_script';

$Documentation[$script]['what is it'] = "it is ...";
$Documentation[$script]['what for'] = "to ...";
$Documentation[$script]['how it is done'] = "cp template_with_get_key_by_script_name_and_get_data_script.php";

entering_in_script ($script);

father_n_son_stack_script_push_of_current_script ($script);

/* removing entity page */
$get_key = 'command_selection_action';
irp_path_clean_register_of_top_key_of_bottom_key_of_where ($entity, 'BUTTON_' . $get_key, $script);

$get_key = 'command_selection_argument';
irp_path_clean_register_of_top_key_of_bottom_key_of_where ($entity, 'BUTTON_' . $get_key, $script);

$html_str = irp_provide ($entity, $script);

print $html_str;

exiting_from_script ($script);

?>
