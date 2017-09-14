<?php

require_once "irp_functions.php";
require_once "entry_information_functions.php";
require_once "entry_display_functions.php";

$module = module_name (__FILE__);

# entering_in_module ($module);

function block_new_create_form_page_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $sur_ent = irp_provide ('entry_surname', $here);
  $kin_ite = irp_provide ('entry_item_kind', $here);

  if ($kin_ite == 'question'){
      $en_tit = 'ask a new ' . $kin_ite; 
      $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
      $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);
  } 
  else {
      $en_tit = 'define a new ' . $kin_ite . ' for entry'; 
      $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
      $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);
      $la_Tit .= ' <i><b> ' . $sur_ent . '</b></i> ';
  }

  $html_str = common_html_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

# exiting_from_module ($module);

?>