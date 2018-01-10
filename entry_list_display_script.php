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

/* $bot_key = 'entry_current_name'; */
/* irp_path_clean_register_of_top_key_of_bottom_key_of_where ($entity, "GET_$bot_key", $script);  */

$bot_key = 'entry_fullnameofdirectory_array';
irp_path_clean_register_of_top_key_of_bottom_key_of_where ($entity, "READ_$bot_key", $script); 

$bot_key = 'surname_catalog_fullnameoffile';
irp_path_clean_register_of_top_key_of_bottom_key_of_where ($entity, "READ_$bot_key", $script); 

/* to keep track of last entry_current_name */
$bot_key = 'entry_current_name_last';
irp_path_clean_register_of_top_key_of_bottom_key_of_where ($entity, "LEAF_$bot_key", $script);

$html_str = irp_provide ($entity, $script);

print $html_str;

exiting_from_module ($script);

?>
