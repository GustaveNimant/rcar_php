<?php

require_once "management_functions.php";
require_once "irp_functions.php";
require_once "item_functions.php";
require_once "bubble_functions.php";
require_once "button_submit_functions.php";
require_once "common_html_functions.php";

$module = "item_modify_functions";
# entering_in_module ($module);

/* First Section Page Title */

function item_justify_section_page_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $sur_ent = irp_provide ('entry_surname', $here);
  $sur_ite = irp_provide ('item_surname', $here);
  $kin_ite = irp_provide ('entry_item_kind', $here);

  $en_tit = 'modify the justification of the ' . $kin_ite;  
  $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);
  $la_Tit .= ' <i><b> ' . $sur_ite . '</b></i> '; 

  $en_tit = 'for entry';
  $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
  $la_Tit .= $la_bub_tit;
  $la_Tit .= ' <i><b> ' . $sur_ent . '</b></i> '; 
  
  $html_str = common_html_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Second Section Item Content Old */

function item_justify_section_content_old_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $en_tit = 'content of the current justification'; 

  $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);

  $html_str = common_html_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function item_justify_section_content_old_display_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ite = irp_provide ('item_name', $here);
  $nam_ent = irp_provide ('entry_name', $here);
  $ext_jus = irp_provide ('item_justification_filename_extension', $here);
  
  $hdir = specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);
  $nof_jus = $hdir . $nam_ite . '.' . $ext_jus;
  debug_n_check ($here , '$nof_jus',  $nof_jus);
  $con_jus = file_content_read ($nof_jus);
  debug_n_check ($here , '$con_jus',  $con_jus);

  $html_str  = '<textarea rows="2" cols="100" disabled/>';
  $html_str .= $con_jus;
  $html_str .= '</textarea> ';

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function item_justify_section_content_old_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= irp_provide ('item_justify_section_content_old_title', $here);
  $html_str .= irp_provide ('item_justify_section_content_old_display', $here);
  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}


/* Third Section Item Content New Create */
/* Third Section Item Content New Create Title */

function item_justify_section_content_new_create_title_build (){
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

/* Third Section Item Content New Create Textarea */

function item_justify_section_content_new_create_textarea_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ite = irp_provide ('item_name', $here);
  $nam_ent = irp_provide ('entry_name', $here);
  $ext_jus = irp_provide ('item_justification_filename_extension', $here);
  
  $hdir = specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);
  $nof = $hdir . $nam_ite . '.' . $ext_jus;
  $con_jus_raw = file_content_read ($nof);

  $str_a = explode ("\n", $con_jus_raw);
  $key_a = array_keys ($str_a);
  $last_key = end ($key_a);
  unset ($str_a[$last_key]);
  $con_jus = implode ($str_a);

  $html_str  = '';
  $html_str .= '<textarea name="item_justification_modified" rows="2" cols="100" />';
  $html_str .= $con_jus;
  $html_str .= '</textarea> ' . "\n";

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function item_justify_section_content_new_create_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= irp_provide ('item_justify_section_content_new_create_title', $here);
  $html_str .= irp_provide ('item_justify_section_content_new_create_textarea', $here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Page Item Modify_Justify */

function item_justify_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $nam_ent = irp_provide ('entry_name', $here);
  $sur_ent = irp_provide ('entry_surname', $here);
  $nof_mod = 'entry_display.php';

  $script_action = 'item_justify_save.php';

  $html_str  = '';
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);

  $html_str .= irp_provide ('item_justify_section_page_title', $here);

  $html_str .= '<form action="' . $script_action. '" method="get"> ' . "\n";
  /* $html_str .= '<input type="hidden" name="item_action" value="justification" /> '; */
  $html_str .= '<br> ';
  $html_str .= irp_provide ('item_justify_section_content_old', $here);
  $html_str .= '<br><br> ';
  $html_str .= irp_provide ('item_justify_section_content_new_create', $here);
  $html_str .= '<br><br> ';
  $html_str .= button_submit_centered_of_button_value_en_of_language ('save', $lan);
  $html_str .= '</form> ' . "\n";

  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_module_nameoffile_of_language ($nam_ent, $sur_ent, $nof_mod, $lan);

  $html_str .= irp_provide ('pervasive_html_final_section', $here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;

}

# exiting_from_module ($module);


?>
