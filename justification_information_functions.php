<?php 
require_once "management_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function justification_information_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $jus_inf = 'undefined';
  if (array_key_exists ('item_new_justification', $_SESSION['irp_register']) ){ 
      $jus_inf = irp_provide ('item_new_justification', $here);
  }
  if (array_key_exists ('item_next_justification', $_SESSION['irp_register']) ){ 
      $jus_inf = irp_provide ('item_next_justification', $here);
  }
  exiting_from_function ($here);
  
  return $jus_inf;
}

exiting_from_module ($module);

?>