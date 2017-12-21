<?php
include "session.php";
require_once "irp_library.php";
require_once "father_n_son_stack_script_library.php";

$entity = entity_name_of_script_fullnameoffile (__FILE__);
$script = $entity . '_script';

$Documentation[$script]['what is it'] = "it is ...";
$Documentation[$script]['what for'] = "to ...";
$Documentation[$script]['how it is done'] = "cp template_...";

entering_in_module ($script);

father_n_son_stack_script_push_of_current_script ($script);

/* Improve define the two leaves */
irp_path_clean_register_of_top_key_of_bottom_key_of_where ($entity, 'GET_entry_current_name', $script); 

$bot_key = 'entry_current_selection_display_menuselect';
irp_path_clean_register_of_top_key_of_bottom_key_included_of_where ($entity, $bot_key, $script);

$bot_key = 'entry_current_selection_rename_menuselect';
irp_path_clean_register_of_top_key_of_bottom_key_included_of_where ($entity, $bot_key, $script);

$html_str = irp_provide ($entity, $script);

print $html_str;

exiting_from_module ($script);

?>
