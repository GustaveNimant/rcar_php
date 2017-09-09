<?php

require_once "management_functions.php";
require_once "irp_functions.php";

# "License : This code is available under the Creative Commons License https://creativecommons.org/licenses/by-sa/3.0/legalcode.fr";

$module = "item_delete_functions";
# entering_in_module ($module);

/* First Section Page Title */

function item_delete_section_page_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $sur_ent = irp_provide ('entry_surname', $here);
  $sur_ite = irp_provide ('item_surname', $here);
  $kin_ite = irp_provide ('entry_item_kind', $here);

  $en_tit = 'delete the ' . $kin_ite;  
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

/* Second Section Item Delete Justify */

/* Second Section Item Delete Justify Title */

function item_delete_section_justify_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $en_tit = 'enter your justification below';

  $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);
 
  $html_str = common_html_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Second Section Item Delete Justify Textarea */

function item_delete_section_justify_textarea_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= '<textarea name="item_delete_justification" rows="2" cols="100" />';
  $html_str .= '</textarea> ' . "\n";

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Second Section Item Delete Justify */

function item_delete_section_justify_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= irp_provide ('item_delete_section_justify_title', $here);
  $html_str .= irp_provide ('item_delete_section_justify_textarea', $here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Third Section Item Delete Save */

function item_delete_section_save_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $html_str  = '';
  $html_str .= '<center> ';
  $html_str .= '   <input type="submit" value="';
  $html_str .= ucfirst (language_translate_of_en_string_of_language ('delete', $lan));
  $html_str .= '" name="submitme"> ' . "\n";
  $html_str .= '</center> ' . "\n";

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;

}

/* Page Item Delete */

function item_delete_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $nam_ent = irp_provide ('entry_name', $here);
  $nam_ite = irp_provide ('item_name', $here);
  $nof_mod = 'entry_display.php';

  $script_action = 'item_delete_save.php';

  $html_str = '';
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);
  $html_str .= irp_provide ('item_delete_section_page_title', $here);
  $html_str .= '<br><br> ';
  $html_str .= '<form action="' . $script_action. '" method="get"> ' . "\n";
  $html_str .= '<input type="hidden" name="item_name" value="';
  $html_str .= $nam_ite;
  $html_str .= '">';
  $html_str .= irp_provide ('item_delete_section_justify', $here);
  $html_str .= '<br><br> ';
  $html_str .= irp_provide ('item_delete_section_save', $here);
  $html_str .= '    </form> ' . "\n";

  $sur_ent = irp_provide ('entry_surname', $here);
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_module_nameoffile_of_language ($nam_ent, $sur_ent, $nof_mod, $lan); 

  $html_str .= irp_provide ('pervasive_html_final_section', $here);
  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;
}


# exiting_from_module ($module);

?>