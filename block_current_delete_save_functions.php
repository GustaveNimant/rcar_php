<?php

require_once "management_functions.php";
require_once "irp_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

/* First Section Page Title */

function block_current_delete_save_section_page_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $sur_ent = irp_provide ('entry_surname', $here);
  $sur_ite = irp_provide ('block_surname', $here);
  $kin_blo = irp_provide ('entry_block_kind', $here);

  $en_tit = 'for entry';
  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);
  $la_Tit .= ' <i><b> ' . $sur_ent . '</b></i> '; 

  $en_tit = $kin_blo;
  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_Tit .= $la_bub_tit;
  $la_Tit .= ' <i><b> ' . $sur_ite . '</b></i> '; 
 
  $en_tit = 'has been deleted';
  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_Tit .= $la_bub_tit;

  $html_str = common_html_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_current_delete_save_catalog_actualize_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_name', $here);
  $nam_blo_cur = irp_provide ('block_current_name', $here);

  debug_n_check ($here , "input entry_name", $nam_ent);
  debug_n_check ($here , "input block name", $nam_blo_cur);

  $dir = specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);

  $cat_blo = irp_provide ('block_name_catalog', $here);

  $con_cat_blo = block_name_catalog_remove_block_name_of_entry_name_of_block_name_catalog_of_block_current_name ($nam_ent, $cat_blo, $nam_blo_cur);
  $ext_cat = $_SESSION['parameters']['extension_block_name_catalog_filename'];
  $nof = "Block_name_catalog." . $ext_cat;

  if ($con_cat_blo == "") {
      $fno = $dir . $nof;
      if ( ! file_exists ($fno)) {
          $lan = $_SESSION['parameters']['language'];
          $en_tx1 = 'file';
          $en_tx2 = 'does not exist';
          $en_tx3 = 'not deleted';
          $la_tx1 = language_translate_of_en_string ($en_tx1);
          $la_tx2 = language_translate_of_en_string ($en_tx2);
          $la_tx3 = language_translate_of_en_string ($en_tx3);
          $la_Tx3  = string_html_capitalized_of_string ($la_tx3);

          warning ($here, $la_tx1 . $fno . ' ' . $la_tx2 . '. ' . $la_Tx3);
      }
      else {
          unlink ($fno);
      }
      
  } else {
      file_string_write ($dir . $nof, $con_cat_blo);
  }

  $log_str = $nof . " file updated on disk";
  exiting_from_function ($here);
  return $log_str; 
}

function block_current_delete_save_delete_file_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_name', $here);
  $nam_blo_cur = irp_provide ('block_current_name', $here);

  $dir = specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);
  $ext_blo = $_SESSION['parameters']['extension_block_filename'];

  $cmd_del  = 'cd ' . $dir . ';';
  $cmd_del .= 'rm ' . $nam_blo . '.' . $ext_blo;

  debug_n_check ($here , '$cmd_del', $cmd_del);

  $str_exe = shell_exec ($cmd_del);
  
  if ($str_exe) {
      fatal_error ($here, $str_exe);
  }
  else {
      $str_exe = "delete shell command done";
  }

  debug ($here , '$str_exe', $str_exe);
  exiting_from_function ($here);
 
  return  $str_exe;
}

function block_current_delete_save_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_name', $here);
  $nam_blo = irp_provide ('block_current_name', $here);
  $nof_mod = 'entry_display.php';

  $lan = $_SESSION['parameters']['language'];

  $html_str  = '';
  $log_str  = '';

  $html_str .= irp_provide ('pervasive_html_initial_section', $here);
  $log_str .= '<br> ';
  $log_str .= irp_provide ('block_current_delete_save_catalog_actualize', $here);
  $html_str .= irp_provide ('block_current_delete_save_section_page_title', $here);
  $html_str .= '<br><br> ';
  $log_str .= '<br><br> ';
  $log_str .= irp_provide ('block_current_delete_save_delete_file', $here);

  $sur_ent   = irp_provide ('entry_surname', $here);

  $html_str .= irp_provide ('git_command_n_commit_html', $here);
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_return_module_nameoffile ($nam_ent, $sur_ent, $nof_mod, $lan); 

  $html_str .= irp_provide ('pervasive_html_final_section', $here);

  $html_str .= '<br>Log<br> ';
  /* $html_str .= $log_str; */

  debug_n_check ($module , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>