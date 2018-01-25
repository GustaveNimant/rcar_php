<?php
require_once "irp_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function block_current_undo_form_justification_titled_gather_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'justify below your revert';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit = string_html_capitalized_of_string ($la_bub_tit);

  $entity_textarea = "block_current_undo_justification";

  $row_hta = $_SESSION['parameters']['html_textarea_rows'];
  $col_hta = $_SESSION['parameters']['html_textarea_cols'];

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= common_html_span_background_color_of_html ($la_bub_Tit);
  $html_str .= '<br>';
  $html_str .= '<textarea name="' . $entity_textarea; 
  $html_str .= '" rows="' . $row_hta .'" cols="' .$col_hta;
  $html_str .= '"/>';
  $html_str .= '</textarea> ' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_current_undo_form_submit_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'undo';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit = string_html_capitalized_of_string ($la_bub_tit);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center>' . "\n";
  $html_str .= '<input type="submit" value="';
  $html_str .= $la_bub_Tit;
  $html_str .= '">' . "\n";
  $html_str .= '</center>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;
}

function block_current_undo_form_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $script_action = 'block_current_undo_save_script.php';

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<form action="' . $script_action . '" method="get">' . "\n";

  $html_str .= irp_provide ('block_current_undo_form_justification_titled_gather', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('block_current_undo_form_submit', $here);
  $html_str .= '</form>' . "\n";

  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  
  exiting_from_function ($here);

  return $html_str;

}

exiting_from_module ($module);

?>

