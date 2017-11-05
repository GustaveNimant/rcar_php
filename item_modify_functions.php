<?php

require_once "management_library.php";
require_once "irp_library.php";
require_once "item_functions.php";
require_once "bubble_library.php";
require_once "button_submit_functions.php";
require_once "common_html_library.php";

$module = "item_modify_functions";
entering_in_module ($module);

/* First Section Page Title */

function item_modify_section_page_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);


  $sur_ent = irp_provide ('entry_current_surname_from_entry_current_name', $here);
  $sur_ite = irp_provide ('item_surname', $here);
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
  $la_Tit .= ' <i><b> ' . $sur_ent . '</b></i> '; 
  
  $html_str = common_html_div_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Second Section Item Content Old */

function item_modify_section_content_old_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $kin_blo = irp_provide ('entry_block_kind', $here);

  if ($kin_blo == 'question') {  /* Improve Ugly */
      $en_tit = 'answer to the ' . $kin_blo;  
  }
  else {
      $en_tit = 'content of the ' . $kin_blo;  
  }

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);

  $html_str = common_html_div_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function item_modify_section_content_old_display_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ite = irp_provide ('item_name', $here);

  $con_by_nam_ite_a = irp_provide ('item_content_by_item_name_array', $here);
  $con_ite_old = $con_by_nam_ite_a[$nam_ite];
  debug_n_check ($here , '$con_ite_old', $con_ite_old);

  $html_str  = '<textarea rows="2" cols="100" disabled/>';
  $html_str .= $con_ite_old;
  $html_str .= '</textarea> ';

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function item_modify_section_content_old_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= irp_provide ('item_modify_section_content_old_title', $here);
  $html_str .= irp_provide ('item_modify_section_content_old_display', $here);
  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}


/* Third Section Item Content New Create */
/* Third Section Item Content New Create Title */

function item_modify_section_content_new_create_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'enter your modification below';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);
 
  $html_str = common_html_div_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Third Section Item Content New Create Textarea */

function item_modify_section_content_new_create_textarea_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ite = irp_provide ('item_name', $here);

  $con_by_nam_ite_a = irp_provide ('item_content_by_item_name_array', $here);
  $con_ite_new = $con_by_nam_ite_a[$nam_ite];
  debug_n_check ($here , '$con_ite_new', $con_ite_new);

  $html_str  = '';
  $html_str .= '<textarea name="item_content" rows="2" cols="100" />';
  $html_str .= $con_ite_new;
  $html_str .= '</textarea> ' . "\n";

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function item_modify_section_content_new_create_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= irp_provide ('item_modify_section_content_new_create_title', $here);
  $html_str .= irp_provide ('item_modify_section_content_new_create_textarea', $here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Fourth Section Modification Justify */

/* Fourth Section Item Justify New Create Title */

function item_modify_section_justify_new_create_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'enter your justification below';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);
 
  $html_str = common_html_div_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Fourth Section Item Justify New Create Textarea */

function item_modify_section_justify_new_create_textarea_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= '<textarea name="justify" rows="2" cols="100" />';
  $html_str .= '</textarea> ' . "\n";

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function item_modify_section_justify_new_create_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= irp_provide ('item_modify_section_justify_new_create_title', $here);
  $html_str .= irp_provide ('item_modify_section_justify_new_create_textarea', $here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Page Item Modify */

function item_modify_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_current_name', $here);
  $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here);

  $sur_ent = surname_of_name_of_surname_by_name_hash ($nam_ent, $sur_by_nam_h);

  $nof_mod = 'entry_current_display_script.php';
  $script_action = 'item_modify_save.php';

  $html_str  = '';
  $html_str .= irp_provide ('pervasive_page_header', $here);

  $html_str .= irp_provide ('item_modify_section_page_title', $here);

  $html_str .= '<form action="' . $script_action. '" method="get"> ' . "\n";
  $html_str .= '<input type="hidden" name="item_action" value="modify" /> ';
  $html_str .= '<br> ';
  $html_str .= irp_provide ('item_modify_section_content_old', $here);
  $html_str .= '<br><br> ';
  $html_str .= irp_provide ('item_modify_section_content_new_create', $here);
  $html_str .= '<br><br> ';
  $html_str .= irp_provide ('item_modify_section_justify_new_create', $here);
  $html_str .= '<br><br> ';
  $html_str .= inputtypesubmit_of_en_action_name ('save');
  $html_str .= '</form> ' . "\n";

  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_return_module_nameoffile ($nam_ent, $sur_ent, $nof_mod);

  $html_str .= irp_provide ('pervasive_page_footer', $here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;

}

exiting_from_module ($module);


?>