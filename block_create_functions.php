<?php

require_once "management_functions.php";
require_once "irp_functions.php";
require_once "entry_information_functions.php";
require_once "entry_display_functions.php";
require_once "help_text_functions.php";

$module = "block_create_functions";
# entering_in_module ($module);

/* First Section Page Title */

function block_create_section_page_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $sur_ent = irp_provide ('entry_surname', $here);
  $kin_ite = irp_provide ('entry_block_kind', $here);

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

/* Second Section Block Content */

/** Second Section Block Content Title Text **/

function block_create_section_content_title_text_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $kin_ite = irp_provide ('entry_block_kind', $here);

  if ($kin_ite == 'question') {  /* Improve Ugly */
      $en_tit = 'answer to the ' . $kin_ite;  
  }
  else {
      $en_tit = 'content of the ' . $kin_ite;  
  }

  $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);

  debug_n_check ($here , '$la_Tit',  $la_Tit);
  exiting_from_function ($here);

  return $la_Tit;
}

/** Second Section Block Content Title Help **/

function block_create_section_content_title_help_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $kin_ite = irp_provide ('entry_block_kind', $here);

  $key_hel = 'create content block';
  $la_Hel = help_text_of_string_key_of_language ($key_hel, $lan);

  debug_n_check ($here , '$la_Hel',  $la_Hel);
  exiting_from_function ($here);

  return $la_Hel;
}

/** Second Section Block Content Title **/

function block_create_section_content_title_n_help_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $la_Tit  = '';
  $la_Tit .= irp_provide ('block_create_section_content_title_text', $here);
  $la_Tit .= ' : ';
  $la_Tit .= irp_provide ('block_create_section_content_title_help', $here);

  $html_str = common_html_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/** Second Section Block Content Textarea **/

function block_create_section_content_textarea_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $kin_ite = irp_provide ('entry_block_kind', $here);
  $en_con = 'enter the text of the ' . $kin_ite;
  $la_con = ucfirst (language_translate_of_en_string_of_language ($en_con, $lan));

  $html_str  = '';
  $html_str .= '<textarea name="block_content" rows="2" cols="100" placeholder="';
  $html_str .= $la_con;
  $html_str .= '">';
  $html_str .= '</textarea> ' . "\n";

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_create_section_content_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= irp_provide ('block_create_section_content_title_n_help', $here);
  $html_str .= irp_provide ('block_create_section_content_textarea', $here);

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;
}

/* Fourth Section Block Name */

/** Fourth Section Block Name Title Text **/

function block_create_section_name_title_text_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $kin_ite = irp_provide ('entry_block_kind', $here);
  $en_tit = 'enter the name of the ' . $kin_ite;

  $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);

  debug_n_check ($here , '$la_Tit',  $la_Tit);
  exiting_from_function ($here);

  return $la_Tit;
}

/** Fourth Section Block Name Title Help **/

function block_create_section_name_title_help_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $kin_ite = irp_provide ('entry_block_kind', $here);

  $key_hel = 'create name block';
  $la_Hel = help_text_of_string_key_of_language ($key_hel, $lan);

  debug_n_check ($here , '$la_Hel',  $la_Hel);
  exiting_from_function ($here);

  return $la_Hel;
}

/** Fourth Section Block Name Title **/

function block_create_section_name_title_n_help_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $la_Tit  = '';
  $la_Tit .= irp_provide ('block_create_section_name_title_text', $here);
  $la_Tit .= ' : ';
  $la_Tit .= irp_provide ('block_create_section_name_title_help', $here);

  $html_str = common_html_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/** Fourth Section Block Name Inputtypetext **/

function block_create_section_name_inputtypetext_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $kin_ite = irp_provide ('entry_block_kind', $here);
  $en_con = 'enter the name of the ' . $kin_ite;
  $la_con = ucfirst (language_translate_of_en_string_of_language ($en_con, $lan));

  $html_str  = '';
  $html_str .= '<input type="text" name="block_surname" size="40" placeholder="';
  $html_str .= $la_con;
  $html_str .= '"> ';

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_create_section_name_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= irp_provide ('block_create_section_name_title_n_help', $here);
  $html_str .= irp_provide ('block_create_section_name_inputtypetext', $here);

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;

}

/* Fifth Section Block List */

function block_create_block_list_section_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
 
  $lan = $_SESSION['parameters']['language'];
  $sur_ent = irp_provide ('entry_surname', $here);
  $kin_ite = irp_provide ('entry_block_kind', $here);
  $kin_ite_plu = block_kind_plural_of_block_kind ($kin_ite);

  $en_tit = 'the ' . $kin_ite_plu . ' for entry';

  $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);
  $la_Tit .= ' <i><b> ' . $sur_ent . '</b></i> ';

  $html_str = common_html_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_create_block_list_section_mouseover_opentags_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $css_sty = irp_provide ('common_html_css_style', $here);

  $html_str = '';
  $html_str .= $css_sty;

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}
 
function block_create_block_list_section_mouseover_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $en_tit = 'a mouseover to show';
  $la_tit = language_translate_of_en_string_of_language ($en_tit, $lan);
  $html_str = common_html_css_survol_of_la_title ($la_tit);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_create_block_list_section_mouseover_content_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $nam_ent = irp_provide ('entry_name', $here);

  if (!empty ($_SESSION['irp_register']['block_content_by_block_name_array'])) {
      $con_by_nam_ite_a = irp_provide ('block_content_by_block_name_array', $here);
      
      $html_str = '';
      foreach ($con_by_nam_ite_a as $nam_ite => $con_ite) {
          $html_str .= '<li> ' . "\n";
          $html_str .= '<b> ' . $nam_ite . '</b> ';
          $html_str .= " : ";
          $html_str .= $con_ite;
          $html_str .= '</li> ' . "\n";
      };
      
  } else {
      
      $html_str = language_translate_of_en_string_of_language ('first block', $lan);
  }
  
  /* debug_n_check ($here , '$html_str', $html_str); */

  exiting_from_function ($here);

  return $html_str;
}

function block_create_block_list_section_mouseover_closetags_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str = '';
  $html_str .= '</ul></li></ul> ' . "\n";

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;
}

function block_create_block_list_section_mouseover_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str = '';
  $html_str .= irp_provide ('block_create_block_list_section_mouseover_opentags', $here);
  $html_str .= irp_provide ('block_create_block_list_section_mouseover_title', $here);
  $html_str .= irp_provide ('block_create_block_list_section_mouseover_content', $here);
  $html_str .= irp_provide ('block_create_block_list_section_mouseover_closetags', $here);
  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_create_section_block_list_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
 
  $html_str = '';
  $html_str .= irp_provide ('block_create_block_list_section_title', $here);
  $html_str .= irp_provide ('block_create_block_list_section_mouseover', $here);
 
  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;
}


/* Sixth Section Save */

function block_create_section_save_build (){
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $lan = $_SESSION['parameters']['language'];

    $html_str  = '';
    $html_str .= '<center> ';
    $html_str .= '   <input type="submit" value="';
    $html_str .= ucfirst (language_translate_of_en_string_of_language ('save', $lan));
    $html_str .= '" name="submitme"> ' . "\n";
    $html_str .= '</center> ' . "\n";

    debug_n_check ($here , '$html_str', $html_str);
    
    exiting_from_function ($here);
    
  return $html_str;
}

/* Page Block Create */

function block_create_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $nam_ent = irp_provide ('entry_name', $here);
  $sur_ent = irp_provide ('entry_surname', $here);

  $nof_mod = 'entry_display.php';
  $script_action = 'block_create_save.php';

  $html_str = '';
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);
  $html_str .= irp_provide ('block_create_section_page_title', $here);

  $html_str .= '<form action="' . $script_action. '" method="get"> ' . "\n";
  $html_str .= '<input type="hidden" name="block_action" value="create" /> ';
  $html_str .= '<br><br> ';
  $html_str .= irp_provide ('block_create_section_content', $here);
  $html_str .= '<br><br> ';
  $html_str .= irp_provide ('block_create_section_name', $here);
  $html_str .= '<br><br> ';
  $html_str .= irp_provide ('block_create_section_save', $here);
  $html_str .= '</form> ' . "\n";
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_module_nameoffile_of_language ($nam_ent, $sur_ent, $nof_mod, $lan);
  $html_str .= irp_provide ('block_create_section_block_list', $here);
  $html_str .= irp_provide ('pervasive_html_final_section', $here);
  
  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;
}

# exiting_from_module ($module);

?>