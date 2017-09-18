<?php

require_once "irp_functions.php";

$module = module_name (__FILE__);

$Documentation[$module]['what is it'] = "??? "; 
$Documentation[$module]['what for'] = "to build the ???"; 

# entering_in_module ($module);

function item_current_modify_content_form_textarea_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $con_ite_cur = irp_provide ('item_current_content', $here);
  debug_n_check ($here , '$con_ite_cur', $con_ite_cur;

  $html_str = textarea_of_name_of_content_placeholder ('item_current_modify_content', $con_ite_cur, '  ');

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

# exiting_from_module ($module);

?>