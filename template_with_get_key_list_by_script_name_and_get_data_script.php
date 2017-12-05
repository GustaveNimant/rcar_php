<?php
include "session.php";
require_once "irp_library.php";
require_once "father_n_son_stack_script_library.php";

$entity = entity_name_of_script_fullnameoffile (__FILE__);
$script = $entity . '_script';

$Documentation[$script]['what is it'] = "it is ...";
$Documentation[$script]['what for'] = "to ...";
$Documentation[$script]['how it is done'] = "cp template_with_..._script.php";

entering_in_script ($script);

father_n_son_stack_script_push_of_current_script ($script);

/* removing entity page */
$get_key_l = $_SESSION['get_key_by_script_name'][$entity];

$get_key = string_word_of_glue_of_ordinal_of_string (':', 1, $get_key_l);
irp_path_clean_register_of_top_key_of_bottom_key_of_where ($get_key, 'GET_' . $get_key, $script);

$get_key = string_word_of_glue_of_ordinal_of_string (':', 2, $get_key_l);
irp_path_clean_register_of_top_key_of_bottom_key_of_where ($get_key, 'GET_' . $get_key, $script);

$html_str = irp_provide ($entity, $script);

print $html_str;

exiting_from_script ($script);

?>