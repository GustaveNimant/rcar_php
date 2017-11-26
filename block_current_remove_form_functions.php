<?php
require_once "irp_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function block_current_remove_form_justification_titled_gather_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'justify below your deletion';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit = string_html_capitalized_of_string ($la_bub_tit);

/* Improve gather_wide_of_get_key_of_initial_value */
/* Improve gather_wide_titled_of_title_of_get_key_of_initial_value */

  $get_key = "block_current_remove_justification";

  $row_hta = $_SESSION['parameters']['html_textarea_rows'];
  $col_hta = $_SESSION['parameters']['html_textarea_cols'];

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= common_html_span_background_color_of_html ($la_bub_Tit);
  $html_str .= '<br>';
  $html_str .= '<textarea rows="' . $row_hta. '" cols="' . $col_hta . '" name="' . $get_key . '"/>'; 
  $html_str .= '</textarea>' . "\n";
  $html_str .= '</span>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_current_remove_form_submit_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'remove';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit = string_html_capitalized_of_string ($la_bub_tit);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center>' . "\n";
  $html_str .= '<input type="submit" value="';
  $html_str .= $la_bub_Tit;
  $html_str .= '" name="submitme">' . "\n";
  $html_str .= '</center>' . "\n";
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

  $get_key_sel = 'block_current_name';
  $_SESSION['get_key_by_script_name'][$entity] = $get_key_sel;

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<form action="' . $script_action . '" method="get">' . "\n";

  $html_str .= irp_provide ('block_current_remove_form_justification_titled_gather', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('block_current_remove_form_submit', $here);
  $html_str .= '</form>' . "\n";

  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  
  exiting_from_function ($here);

  return $html_str;

}

exiting_from_module ($module);

?>

