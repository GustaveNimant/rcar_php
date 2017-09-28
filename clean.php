<?php

require_once "clean_functions.php";

$module = "clean";
entering_in_module ($module);
father_n_son_stack_entity_push_of_current_entity ($module);

clean ();

exiting_from_module ($module);