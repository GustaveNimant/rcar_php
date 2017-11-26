<?php

require_once "irp_library.php";
require_once "common_html_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function subsection_block_current_surnamenew_title_build () { 
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'enter the new name below';
  
  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit = string_html_capitalized_of_string ($la_bub_tit);
  
  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= common_html_div_background_color_of_html ($la_bub_Tit);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function subsection_block_current_surnamenew_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_blo_cur = irp_provide ('block_current_surname_from_block_current_name', $here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= inputtypetext_of_get_key_of_default_value ('block_current_surnamenew', $sur_blo_cur);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function subsection_block_current_surnamenew_justify_title_build () { 
  $here = __FUNCTION__;
  entering_in_function ($here);

/* Improve Constant fonction to be moved with Constant_functions.php */

  $en_tit = 'enter your justification below';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit = string_html_capitalized_of_string ($la_bub_tit);
  
  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= common_html_div_background_color_of_html ($la_bub_Tit);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function subsection_block_current_surnamenew_justification_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<textarea name="block_current_surnamenew_justification" rows="2" cols="100" />';
  $html_str .= '</textarea> ' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function section_block_current_rename_form_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $script_action = 'block_current_namenew_save_script.php';
  $entity = entity_name_of_script_nameoffile ($script_action);

  $get_key_sel = 'block_current_name';
  $_SESSION['get_key_by_script_name'][$entity] = $get_key_sel;

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<form ' . "\n";
  $html_str .= 'method="get" action="' . $script_action . '">' . "\n";

  $html_str .= irp_provide ('subsection_block_current_surnamenew_title', $here);
  $html_str .= '<br> ';

  $html_str .= irp_provide ('subsection_block_current_surnamenew', $here);
  $html_str .= '<br> ';

  $html_str .= irp_provide ('subsection_block_current_surnamenew_justify_title', $here);
  $html_str .= '<br> ';

  $html_str .= irp_provide ('subsection_block_current_surnamenew_justification', $here);
  $html_str .= '<br>';

  $html_str .= '<center>';
  $html_str .= inputtypesubmit_of_en_action_name ('save');
  $html_str .= '</center>';

  $html_str .= '</form> ' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>