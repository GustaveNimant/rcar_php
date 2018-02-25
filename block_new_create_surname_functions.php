<?php

require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function block_new_create_surname_inputtypetext_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $kin_blo = irp_provide ('entry_block_kind', $here);
  $en_nam_blo = 'enter the name of the ' . $kin_blo;
  $la_nam_blo = ucfirst (language_translate_of_en_string ($en_nam_blo));

  $siz_hit = $_SESSION['parameters']['html_input_text_size'];

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<input type="text"'; 
  $html_str .= ' size="' . $siz_hit . '"';
  $html_str .= ' name="block_new_surname"'; 
  $html_str .= ' placeholder="' . $la_nam_blo . '"';
  $html_str .= '>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_new_create_surname_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('block_new_create_surname_title_n_help', $here);
  $html_str .= '<br>' . "\n";
  $html_str .= irp_provide ('block_new_create_surname_inputtypetext', $here);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;

}

exiting_from_module ($module);

?>