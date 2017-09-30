<?php

require_once "management_functions.php";
require_once "irp_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function item_new_name_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ite_new = get_hash_retrieve_value_of_key_of_where ('item_new_name', $here);
  
  exiting_from_function ($here);

  return $nam_ite;

}

exiting_from_module ($module);

?>
