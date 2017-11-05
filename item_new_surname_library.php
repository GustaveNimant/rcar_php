<?php

require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function item_new_surname_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $log_str  = '';

  $nam_ent = irp_provide ('entry_current_name', $here);
  debug_n_check ($here , '$nam_ent', $nam_ent);

  $sur_ite_new = irp_provide ('item_new_surname', $here); 
  $nam_ite_new = word_name_capitalized_of_string_surname ($sur_new_ite, $here);
  debug_n_check ($here , '$nam_ite_new', $nam_ite_new);
  
  debug_n_check ($here , '$nam_ite_new', $nam_ite_new);
  exiting_from_function ($here);

  return $nam_ite_new;

}

exiting_from_module ($module);

?>