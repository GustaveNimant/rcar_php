<?php
require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what for'] = "to display the form page where one can modify the current item";

entering_in_module ($module);

function toward_item_next_create_form_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $script_action = 'block_next_save_script.php';
 
  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<form ' . "\n";
  $html_str .= 'method="get" action="' . $script_action. '">' . "\n";
  
  $html_str .= '<br>';
  $html_str .= irp_provide ('subsection_item_next_create_title', $here);
  $html_str .= '<br>';

  $html_str .= irp_provide ('subsection_item_next_content', $here);

  $html_str .= '<br><br>';

  $html_str .= irp_provide ('subsection_item_next_justify_title', $here);
  $html_str .= '<br>';

  $html_str .= irp_provide ('subsection_item_next_justification', $here);
  $html_str .= '<br>';

  $html_str .= '<center>';
  $html_str .= inputtypesubmit_of_en_action_name ('save');
  $html_str .= '</center>';

  $html_str .= '</form> ' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>