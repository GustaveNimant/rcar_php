<?php

require_once "irp_functions.php";
require_once "bubble_library.php";
require_once "button_submit_functions.php";
require_once "common_html_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function item_next_create_form_page_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);


  $sur_ent = irp_provide ('entry_current_surname_from_entry_current_name', $here);

  $nam_blo_cur = irp_provide ('block_current_name', $here);
  $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here);
  $sur_blo_cur = surname_of_name_of_surname_by_name_hash ($nam_blo_cur, $sur_by_nam_h);

  $sur_ite = $sur_blo_cur;
  $kin_blo = irp_provide ('entry_block_kind', $here);

  if ($kin_blo == 'question') {
      $en_tit = 'modify the answer to the ' . $kin_blo;  
  }
  else {
      $en_tit = 'modify the content of the ' . $kin_blo;  
  }
  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);
  $la_Tit .= ' <i><b> ' . $sur_ite . '</b></i> '; 

  $en_tit = 'for entry';
  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);

  $la_Tit .= $la_bub_tit;
  $la_Tit .= '<i><b>' . $sur_ent . '</b></i> '; 
  
  $html_str = common_html_div_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>