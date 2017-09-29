<?php

require_once "irp_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function block_current_rename_newname_surname_title_n_help_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'enter the new name below';

  $lan = $_SESSION['parameters']['language'];

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);
 
  $html_str = common_html_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_current_rename_newname_surname_inputtypetext_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_blo = irp_provide ('block_surname', $here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<input type="text" value="' . $sur_blo . '" ';
  $html_str .= 'name="block_current_newname_surname" ';
  $html_str .= ' size="87" />' . "\n";
  $html_str .= comment_exiting_of_function_name ($here); 

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_current_rename_newname_surname_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= irp_provide ('block_current_rename_newname_title_n_help', $here);
  $html_str .= irp_provide ('block_current_rename_newname_inputtypetext', $here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>