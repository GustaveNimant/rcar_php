<?php

require_once "irp_functions.php";

$module = module_name (__FILE__);

# entering_in_module ($module);

function block_current_rename_newname_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'enter the new name below';

  $lan = $_SESSION['parameters']['language'];

  $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);
 
  $html_str = common_html_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Second Section Block_Current Name Modify Inputtype */

function block_current_rename_newname_inputtypetext_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_blo = irp_provide ('block_surname', $here);

  $html_str  = '';
  $html_str .= '<input type="text" value="' . $sur_blo . '" name="block_current_surname" size="87" /> ';

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_current_rename_newname_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= irp_provide ('block_current_rename_newname_title', $here);
  $html_str .= irp_provide ('block_current_rename_newname_inputtypetext', $here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

# exiting_from_module ($module);

?>