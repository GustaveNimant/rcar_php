<?php
require_once "irp_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function block_current_remove_form_justify_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'justify below your deletion';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit = string_html_capitalized_of_string ($la_bub_tit);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= common_html_span_background_color_of_html ($la_bub_Tit);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}



function block_current_remove_form_justification_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $get_key = "block_current_remove_justification";

  $row_hta = $_SESSION['parameters']['html_textarea_rows'];
  $col_hta = $_SESSION['parameters']['html_textarea_cols'];

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<textarea name="' . $get_key; 
  $html_str .= '" rows="' . $row_hta .'" cols="' .$col_hta;
  $html_str .= '"/>';
  $html_str .= '</textarea>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_current_remove_form_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $script_action = 'block_current_remove_save_script.php';
  $entity = entity_name_of_script_nameoffile ($script_action);

  $get_key = 'block_current_remove_justification';
  $_SESSION['get_key_by_script_name'][$entity] = $get_key;

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<form action="' . $script_action . '" method="get">' . "\n";

  $html_str .= irp_provide ('block_current_remove_form_justify_title', $here);
  $html_str .= '<br>' . "\n";

  $html_str .= irp_provide ('block_current_remove_form_justification', $here);
  $html_str .= '<br><br>'  . "\n";

  $html_str .= '<center>';
  $html_str .= inputtypesubmit_of_en_action_name ('remove');
  $html_str .= '</center>';

  $html_str .= '</form>' . "\n";

  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  
  exiting_from_function ($here);

  return $html_str;

}

exiting_from_module ($module);

?>

