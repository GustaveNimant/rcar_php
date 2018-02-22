<?php

require_once "irp_library.php";
require_once "common_html_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function block_current_rename_form_title_build () { 
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

function block_current_rename_form_surnamenew_build (){
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

function block_current_rename_form_justify_title_build () { 
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

function block_current_rename_form_justification_build (){
    $here = __FUNCTION__;
    entering_in_function ($here);

/* justification of the renaming action */
    
    $get_key = 'block_current_surnamenew_justification';
    
    $row_hta = $_SESSION['parameters']['html_textarea_rows'];
    $col_hta = $_SESSION['parameters']['html_textarea_cols'];
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<textarea name="' . $get_key;
    $html_str .= '" rows="' . $row_hta .'" cols="' .$col_hta;
    $html_str .= '"/>';
    $html_str .= '</textarea> ' . "\n";
    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here , '$html_str',  $html_str);
    exiting_from_function ($here);
    
    return $html_str;
}

function block_current_rename_form_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $script_action = 'block_current_namenew_save_script.php';
  $entity = entity_name_of_script_nameoffile ($script_action);

  $get_key_lis  = 'block_current_surnamenew';
  $get_key_lis .= ':' ;
  $get_key_lis .= 'block_current_surnamenew_justification';
  $_SESSION['get_key_by_script_name'][$entity] = $get_key_lis;

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<form ' . "\n";
  $html_str .= 'method="get" action="' . $script_action . '">' . "\n";

  $html_str .= irp_provide ('block_current_rename_form_title', $here);
  $html_str .= '<br>' . "\n";

  $html_str .= irp_provide ('block_current_rename_form_surnamenew', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('block_current_rename_form_justify_title', $here);
  $html_str .= '<br>' . "\n";

  $html_str .= irp_provide ('block_current_rename_form_justification', $here);
  $html_str .= '<br>' . "\n";

  $html_str .= '<center>' . "\n";
  $html_str .= inputtypesubmit_of_en_action_name ('save');
  $html_str .= '</center>' . "\n";

  $html_str .= '</form> ' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>