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

print_html_array ($script, '$_GET', $_GET);

foreach ($_GET as $get_key => $get_val) {
    $xxx = irp_data_value_retrieve_and_store_of_get_key_of_script_name_of_where ($get_key, $script, $script);
}

$html_str = irp_provide ($entity, $script);

print $html_str;

exiting_from_script ($script);

?>
