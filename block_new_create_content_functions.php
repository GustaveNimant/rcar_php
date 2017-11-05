<?php

require_once "irp_library.php";
require_once "entry_information_functions.php";
require_once "entry_current_display_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function block_new_create_content_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= irp_provide ('block_new_create_content_title_n_help', $here);
  $html_str .= irp_provide ('block_new_create_content_textarea', $here);

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>