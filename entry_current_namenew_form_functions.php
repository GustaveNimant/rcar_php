<?php
require_once "irp_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function entry_current_namenew_form_surnamenew_titled_gather_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'modify the name below';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit = string_html_capitalized_of_string ($la_bub_tit);

  $get_key = 'entry_current_surnamenew';
  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);

  $siz_htz = $_SESSION['parameters']['html_input_text_size'];

/* Improve gather_small_of_get_key_of_initial_value */
/* Improve gather_small_titled_of_title_of_get_key_of_initial_value */

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<span class="my-fieldset">' . "\n";

  $html_str .= '<legend>';
  $html_str .= common_html_div_background_color_of_html ($la_bub_Tit);
  $html_str .= '</legend>' . "\n";

  $html_str .= '<input type="text"';
  $html_str .= ' name="' . $get_key . '"'; 
  $html_str .= ' value="' . $sur_ent_cur . '"'; 
  $html_str .= ' size="' . $siz_htz . '">' . "\n";
  $html_str .= '</span>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);
  return $html_str;
}

function entry_current_namenew_form_justification_titled_gather_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'justify below your change';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit = string_html_capitalized_of_string ($la_bub_tit);

/* Improve gather_wide_of_get_key_of_initial_value */
/* Improve gather_wide_titled_of_title_of_get_key_of_initial_value */

  $entity_textarea = "entry_current_namenew_justification";

  $row_hta = $_SESSION['parameters']['html_textarea_rows'];
  $col_hta = $_SESSION['parameters']['html_textarea_cols'];

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<span class="my-fieldset">' . "\n";

  $html_str .= '<legend>' . "\n";
  $html_str .= common_html_div_background_color_of_html ($la_bub_Tit);
  $html_str .= '</legend>' . "\n";
  
  $html_str .= '<textarea name="' . $entity_textarea; 
  $html_str .= ' rows="' . $row_hta. '" cols="' . $col_hta; 
  $html_str .= '"/>' . "\n";
  $html_str .= '</textarea>' . "\n";

  $html_str .= '</span>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);
  return $html_str;
}

function entry_current_namenew_form_submit_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'save';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit = string_html_capitalized_of_string ($la_bub_tit);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center>' . "\n";
  $html_str .= '<input type="submit"';
  $html_str .= ' value="';
  $html_str .= $la_bub_Tit;
  $html_str .= '">' . "\n";
  $html_str .= '</center>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;
}

function entry_current_namenew_form_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $script_action = 'entry_current_namenew_save_script.php';

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<form action="' . $script_action .'" method="get">' . "\n";

  $html_str .= irp_provide ('entry_current_namenew_form_surnamenew_titled_gather', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('entry_current_namenew_form_justification_titled_gather', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('entry_current_namenew_form_submit', $here);
  $html_str .= '</form>' . "\n";

  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  
  exiting_from_function ($here);

  return $html_str;

}

exiting_from_module ($module);

?>