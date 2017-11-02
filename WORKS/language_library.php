<?php

require_once "module_name_library.php";
require_once "management_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function language_from_navigator () {
  $here = __FUNCTION__;
  entering_in_function ($here);


  debug_n_check ($here, '$lan', $lan); 
  exiting_from_function ($here);

  return $lan;
}

function language_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);


  debug_n_check ($here , '$lan', $lan);
  exiting_from_function ($here);
  
  return $lan;  
}

exiting_from_module ($module);

?>
