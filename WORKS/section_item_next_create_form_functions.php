<?php
require_once "irp_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what for'] = "to display the form page where one can modify the current item";

entering_in_module ($module);

function subsection_item_next_create_title_build () { 
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'enter your modification below';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit = string_html_capitalized_of_string ($la_bub_tit);
  
  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= common_html_div_background_color_of_html ($la_bub_Tit);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function subsection_item_next_content_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $con_ite_cur = irp_provide ('item_current_content_from_block_current_content', $here);
  debug_n_check ($here , '$con_ite_cur', $con_ite_cur);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<textarea name="item_next_content" rows="2" cols="100" />';
  $html_str .= $con_ite_cur;
  $html_str .= '</textarea> ' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function subsection_item_next_justify_title_build () { 
  $here = __FUNCTION__;
  entering_in_function ($here);

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

function subsection_item_next_justification_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<textarea name="item_next_justification" rows="2" cols="100" />';
  $html_str .= '</textarea> ' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function section_item_next_create_form_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<form ' . "\n";
  $html_str .= 'method="get" action="block_next_save_script.php">' . "\n";
  
  $html_str .= get_hash_store_of_get_key_of_get_value_of_where ('item_current_action', 'modify', $here);

  $html_str .= '<br>';
  $html_str .= irp_provide ('subsection_item_next_create_title', $here);

  $html_str .= '<br>';
  $html_str .= irp_provide ('subsection_item_next_content', $here);

  $html_str .= '<br> ';

  $html_str .= irp_provide ('subsection_item_next_justify_title', $here);
  $html_str .= '<br> ';

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