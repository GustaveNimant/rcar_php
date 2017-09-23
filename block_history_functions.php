<?php

require_once "management_functions.php";
require_once "irp_functions.php";
require_once "item_functions.php";
require_once "bubble_functions.php";
require_once "button_submit_functions.php";
require_once "common_html_functions.php";

$module = "block_history_functions";
# entering_in_module ($module);

/* First Section Page Title */

function block_history_section_page_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_ent = irp_provide ('entry_surname', $here);
  $sur_ite = irp_provide ('item_surname', $here);
  $kin_blo = irp_provide ('entry_block_kind', $here);

  $lan = $_SESSION['parameters']['language'];

  $en_tit = 'history the ' . $kin_blo;  
  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit, $lan);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);
  $la_Tit .= ' <i><b> ' . $sur_ite . '</b></i> '; 

  $en_tit = 'for entry';
  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit, $lan);
  $la_Tit .= $la_bub_tit;
  $la_Tit .= ' <i><b> ' . $sur_ent . '</b></i> '; 

  $html_str = common_html_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Second Section Item Name Modify */
/* Second Section Item Name Modify Title */

function block_history_section_since_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'enter the new name below';

  $lan = $_SESSION['parameters']['language'];

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit, $lan);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);
 
  $html_str = common_html_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Second Section Item Name Modify Inputtype */

function block_history_section_since_inputtype_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_ite = irp_provide ('item_surname', $here);

  $html_str  = '';
  $html_str .= '<input type="text" value="' . $sur_ite . '" name="item_newsurname" size="87" /> ';

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_history_section_since_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= irp_provide ('block_history_section_since_title', $here);
  $html_str .= irp_provide ('block_history_section_since_inputtype', $here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Third Section Modification Justify */

/* Third Section Item Justify Title */

function block_history_section_before_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $en_tit = 'enter your justification below';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit, $lan);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);
 
  $html_str = common_html_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Third Section Item Justify Textarea */

function block_history_section_before_textarea_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= '<textarea name="item_newname_justification" rows="2" cols="100" />';
  $html_str .= '</textarea> ' . "\n";

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_history_section_before_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= irp_provide ('block_history_section_before_title', $here);
  $html_str .= irp_provide ('block_history_section_before_textarea', $here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Page Item History */

function block_history_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $nam_ent = irp_provide ('entry_name', $here);
  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);
  $sur_ent = surname_of_name_of_surname_by_name_array ($nam_ent, $sur_by_nam_a);

  $nof_mod = 'entry_display.php';
  $script_action = 'block_history_save.php';

  $html_str  = '';
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);
  $html_str .= '<form action="' . $script_action. '" method="get"> ' . "\n";
  $html_str .= irp_provide ('block_history_section_page_title', $here);
  $html_str .= '<br><br> ';
  $html_str .= irp_provide ('block_history_section_since', $here);
  $html_str .= '<br><br><br> ';
  $html_str .= irp_provide ('block_history_section_before', $here);
  $html_str .= '<br><br> ';
  $html_str .= button_submit_centered_of_button_value_en_of_language ('save', $lan);
  $html_str .= '</form> ' . "\n";
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_return_module_nameoffile ($nam_ent, $sur_ent, $nof_mod, $lan);
  $html_str .= irp_provide ('pervasive_html_final_section', $here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;

}

# exiting_from_module ($module);


?>