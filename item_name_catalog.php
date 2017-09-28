<?php
include "session.php";
require_once "father_n_son_stack_module_functions.php";
require_once "item_name_catalog_functions.php";

$module = "item_name_catalog";
entering_in_module ($module);

father_n_son_stack_entity_push_of_current_entity ($module);

exiting_from_module ($module);

?>
