<?php

require_once "irp_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "the current content of current item as placeholder"; 
$Documentation[$module]['what for'] = "to be modified by user"; 

# entering_in_module ($module)

function item_current_modify_form_current_content_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $kin_blo = irp_provide ('entry_block_kind', $here);

  if ($kin_blo == 'question') {  /* Improve Ugly */
      $en_tit = 'answer to the ' . $kin_blo;  
  }
  else {
      $en_tit = 'content of the ' . $kin_blo;  
  }

  $la_bub_tit = bubble_bubbled_text_la_of_en_text ($en_tit, $lan);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);

  $html_str = common_html_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function item_current_modify_form_current_content_display_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $con_ite_old = irp_provide ('item_current_content', $here);
  debug_n_check ($here , '$con_ite_old', $con_ite_old);

  $html_str  = '<textarea rows="2" cols="100" disabled/>';
  $html_str .= $con_ite_old;
  $html_str .= '</textarea> ';

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function item_current_modify_form_current_content_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= irp_provide ('item_current_modify_form_current_content_title', $here);
  $html_str .= irp_provide ('item_current_modify_form_current_content_display', $here);
  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

# exiting_from_module ($module);

?>
