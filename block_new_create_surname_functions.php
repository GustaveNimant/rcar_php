<?php

require_once "irp_functions.php";

$module = module_name (__FILE__);

# entering_in_module ($module);

function block_new_create_surname_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= irp_provide ('block_new_create_surname_title_n_help', $here);
  $html_str .= irp_provide ('block_new_create_surname_inputtypetext', $here);

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;

}

# exiting_from_module ($module);

?>