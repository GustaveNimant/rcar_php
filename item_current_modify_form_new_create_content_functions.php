<?php

require_once "irp_functions.php";

$module = module_name (__FILE__);

$Documentation[$module]['what is it'] = "??? "; 
$Documentation[$module]['what for'] = "to build the ???"; 

# entering_in_module ($module)

function item_current_modify_form_new_create_content_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $en_tit = 'enter your modification below';

  $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);
 
  $html_str = common_html_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Third Section Item_Current Content New Create Textarea */

function item_current_modify_form_new_create_content_textarea_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $con_ite_cur = irp_provide ('item_current_content', $here);
  debug_n_check ($here , '$con_ite_cur', $con_ite_cur);

  $html_str  = '';
  $html_str .= '<textarea name="item_current_modify_content" rows="2" cols="100" />';
  $html_str .= $con_ite_new;
  $html_str .= '</textarea> ' . "\n";

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function item_current_modify_form_new_create_content_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= irp_provide ('item_current_modify_form_new_create_content_title', $here);
  $html_str .= irp_provide ('item_current_modify_form_new_create_content_textarea', $here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

# exiting_from_module ($module);

?>