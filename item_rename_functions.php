<?php

require_once "management_library.php";
require_once "irp_library.php";
require_once "item_functions.php";
require_once "bubble_library.php";
require_once "button_submit_functions.php";
require_once "common_html_library.php";

$module = "item_rename_functions";
entering_in_module ($module);

/* First Section Page Title */

function item_rename_section_page_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_ent = irp_provide ('entry_current_surname_from_entry_current_name', $here);
  $sur_ite = irp_provide ('item_surname', $here);
  $kin_blo = irp_provide ('entry_block_kind', $here);


  $en_tit = 'rename the ' . $kin_blo;  
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

/* Second Section Item Name Modify */
/* Second Section Item Name Modify Title */

function item_rename_section_name_modify_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'enter the new name below';


  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);
 
  $html_str = common_html_div_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Second Section Item Name Modify Inputtype */

function item_rename_section_name_modify_inputtype_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_ite = irp_provide ('item_surname', $here);

  $html_str  = '';
  $html_str .= '<input type="text" value="' . $sur_ite . '" name="item_newsurname" size="87" /> ';

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function item_rename_section_name_modify_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= irp_provide ('item_rename_section_name_modify_title', $here);
  $html_str .= irp_provide ('item_rename_section_name_modify_inputtype', $here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Third Section Modification Justify */

/* Third Section Item Justify Title */

function item_rename_section_justify_title_build (){
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

/* Third Section Item Justify Textarea */

function item_rename_section_justify_textarea_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= '<textarea name="item_newname_justification" rows="2" cols="100" />';
  $html_str .= '</textarea> ' . "\n";

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function item_rename_section_justify_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= irp_provide ('item_rename_section_justify_title', $here);
  $html_str .= irp_provide ('item_rename_section_justify_textarea', $here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Page Item Rename */

function item_rename_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);


  $nam_ent = irp_provide ('entry_current_name', $here);
  $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here);
  $sur_ent = surname_of_name_of_surname_by_name_hash ($nam_ent, $sur_by_nam_h);

  $nof_mod = 'entry_current_display_script.php';
  $script_action = 'item_rename_save_script.php';

  $html_str  = '';
  $html_str .= irp_provide ('pervasive_page_header', $here);
  $html_str .= '<form action="' . $script_action. '" method="get"> ' . "\n";
  $html_str .= irp_provide ('item_rename_section_page_title', $here);
  $html_str .= '<br><br> ';
  $html_str .= irp_provide ('item_rename_section_name_modify', $here);
  $html_str .= '<br><br><br> ';
  $html_str .= irp_provide ('item_rename_section_justify', $here);
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