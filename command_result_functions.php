<?php

require_once "irp_library.php";
require_once "command_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function command_result_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

/* getting DATA $get_val */

  $nam_mod_cur = module_name_of_module_fullnameoffile (__FILE__);

  $get_key = 'command_action';
  $com_act = irp_data_value_retrieve_and_store_of_get_key_of_module_name_of_where ($get_key, $nam_mod_cur, $here);

  $get_key = 'command_argument';
  $com_arg = irp_data_value_retrieve_and_store_of_get_key_of_module_name_of_where ($get_key, $nam_mod_cur, $here);

  command_action_of_action_name_of_argument ($com_act, $com_arg);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('pervasive_page_header', $here);
  $html_str .= '<br><br>' . "\n";
  $html_str .= irp_provide ('pervasive_page_footer', $here);
  $html_str .= comment_exiting_of_function_name ($here); 

  exiting_from_function ($here);
  return $html_str;
}

exiting_from_module ($module);

?>
