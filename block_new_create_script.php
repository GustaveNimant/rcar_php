<?php
include "session.php";
require_once "irp_library.php";
require_once "father_n_son_stack_script_library.php";

$entity = entity_name_of_script_fullnameoffile (__FILE__);
$script = $entity . '_script';

$Documentation[$script]['what is it'] = "it is ...";
$Documentation[$script]['how it is done'] = "cp template_bare_script.php";

entering_in_script ($script);

father_n_son_stack_script_push_of_current_script ($script);

/* $get_key = 'block_new_surname'; */
/* irp_path_clean_register_of_top_key_of_bottom_key_of_where ('block_new_create', 'GET_' . $get_key, $script); */

$html_str = irp_provide ($entity, $script);

print $html_str;

exiting_from_script ($script);

?>
