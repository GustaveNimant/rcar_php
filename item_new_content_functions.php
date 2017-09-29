<?php

require_once "irp_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function item_new_content_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $con_ite_new = dollar_get_array_retrieve_value_of_key_of_where ('item_new_content', $here);

  debug_n_check ($here , '$con_ite_new', $con_ite_new);

  exiting_from_function ($here . '$con_ite_new = ' . $con_ite_new);

  return $con_ite_new;
}

exiting_from_module ($module);

?>