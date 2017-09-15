<?php

require_once "array_functions.php";
require_once "file_functions.php";
require_once "debug_functions.php";
require_once "button_submit_functions.php";
require_once "irp_functions.php";
require_once "bubble_functions.php";

$module = "apropos_functions";
# entering_in_module ($module);

function apropos_content_by_block_name_array_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_name', $here);
  $nam_blo_a = irp_provide ('block_name_array', $here);

  if (is_empty_of_array ($nam_blo_a)) {
    $con_by_nam_blo_a = array ();
  }
  else {
    $hdir = specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);
    debug_n_check ($here , "hdir", $hdir);

    $ext_blo = $_SESSION['parameters']['block_filename_extension'];

    foreach ($nam_blo_a as $nam_blo) {
      $fno_txt = $hdir . $nam_blo . '.' .  $ext_blo;
      
      $con_ite = file_content_read ($fno_txt);
      
      /* $con_ite =  item_content_filtered_after_ckeditor_of_string ($con_ite) */;
      
      $con_by_nam_blo_a[$nam_blo] = $con_ite;
    }
  }

  # debug ($here , "output apropos_content_by_item_name_array", $con_by_nam_blo_a);
  exiting_from_function ($here);

  return $con_by_nam_blo_a;
};


function apropos_display_item_html_make_of_entry_name_of_item_name_of_item_content_of_item_name_array_of_language ($nam_ent, $nam_blo, $con_ite, $nam_blo_a, $lan) {
  $here = __FUNCTION__;
  entering_in_function ($here . "($nam_ent, $nam_blo, $con_ite, $nam_blo_a[0], $lan)");

  $la_str = language_translate_of_en_string_of_language ('Action', $lan);

  $html_str = '';

  $html_str .= '<b> ' . $nam_blo . '</b> ';

  $html_str .= '<span id="right"> ';
  $html_str .= '<table> '; 
  $html_str .= '<tr><td> ';
  $html_str .= button_submit_modify_item_name ($nam_ent, $nam_blo);
  $html_str .= '</td><td> ';
  $html_str .= button_submit_modify_item_content ($nam_ent, $nam_blo);
  $html_str .= '</td><td> ';
  $html_str .= button_submit_justify_justify ($nam_ent, $nam_blo);
  $html_str .= '</td><td> ';
  $html_str .= button_submit_item_delete_of_entry_name_of_item_name_of_item_name_array ($nam_ent, $nam_blo, $nam_blo_a);
  $html_str .= '</td></tr></table> ';
  $html_str .= '</span> ';
  $html_str .= '<br> ';

  $html_str .= $con_ite;
  $html_str .= '<br> ';
 
  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function apropos_display_item_array_html_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $nam_ent = irp_provide ('entry_name', $here);

  $con_by_nam_blo_a = irp_provide ('item_content_linked_by_item_name_array', $here);
  # debug_n_check ($here , '$con_by_nam_blo_a', $con_by_nam_blo_a);

  $nam_blo_a = irp_provide ('item_name_array', $here);
  # debug_n_check ($here , '$nam_blo_a', $nam_blo_a);

  $html_str = '';
  foreach ($con_by_nam_blo_a as $nam_blo => $con_ite) {
      $html_str .= apropos_display_item_html_make_of_entry_name_of_item_name_of_item_content_of_item_name_array_of_language ($nam_ent, $nam_blo, $con_ite, $nam_blo_a, $lan);
  }
   
  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function apropos_display_section_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_txt = ''; /* Improve */
  /* $en_str_a = array ('properties', 'entry_name'); */
  /* # debug_n_check ($here , "en_str_a", $en_str_a); */

  /* include "bubble_text_en_by_key_array_functions.php"; */
  /* $la_txt = bubbled_text_lan_of_text_lan_of_bubble_key_en_array ($en_txt, $en_str_a); */

  $nam_ent = irp_provide ('entry_name', $here);
  
  $html_str   = '';
  /* $html_str  .= item_list_section_list_of_entry_name_of_title_la ($la_txt . ' ' .  $nam_ent); */
  $html_str  .= item_list_section_list_of_entry_name_of_title_la ($nam_ent, "???");
  $html_str  .= apropos_display_item_array_html_make ($nam_ent);

  debug_n_check ($here , '$html_str', $html_str);


  exiting_from_function ($here);

  return $html_str;
}

/* Section New property */

function apropos_create_input_submit_html_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $nam_ent = irp_provide ('entry_name', $here);
  debug_n_check ($here, 'entry_name', $nam_ent);
  
  $script_action = script_array_retrieve_module_of_function ($here);
  debug_n_check ($here , "script_action", $script_action);

  $la_str = language_translate_of_en_string_of_language ('Create', $lan);
  $html_str .= '<form action="' . $script_action . '"' . "\n";
  $html_str .= 'method="get"> ' .  "\n"; 
  $html_str .= '<input type="hidden" name="entry_name" value="' . $nam_ent . '" /> ';
  $html_str .= '<center> ' . "\n";
  $html_str .= '  <input type="submit" value="' . $la_str . '" /> ' . "\n";
  $html_str .= '</center> ' . "\n";
  $html_str .= '</form> ' . "\n";

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function apropos_href_html_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

/*  include "language_translate_register.php"; */

  $lan = $_SESSION['parameters']['language'];
  $tit = language_translate_of_en_string_of_language ('Apropos', $lan);

/*
  $abo = $about [$lan];
  $abo = str_replace ("<br>", "\n", $abo);
  $abo = str_replace ("<br>", "\n", $abo);
*/

  $script_action = script_array_retrieve_module_of_function ($here);
  debug_n_check ($here , "script_action", $script_action);

  $html_str  = '';
 
  $html_str .= '<span id="menu-header-links"> ';   
  /* Improve Get */
  $html_str .= '<a href="' . $script_action .  '?entry_name=Introduction" title="';
  $html_str .= $abo;
  $html_str .= '"> ';

  $html_str .= $tit;
  $html_str .= '</a> ';
  $html_str .= "</span>";
  
  exiting_from_function ($here);
  return $html_str;
}

function apropos_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);
  $html_str .= irp_provide ('apropos_display_section', $here);
  $html_str .= irp_provide ('pervasive_html_final_section', $here);


  exiting_from_function ($here);

  return $html_str;
}

# exiting_from_module ($module);

?>