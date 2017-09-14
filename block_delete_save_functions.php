<?php

require_once "management_functions.php";
require_once "irp_functions.php";

$module = "block_delete_save_functions";
# entering_in_module ($module);

/* First Section Page Title */

function block_delete_save_section_page_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $sur_ent = irp_provide ('entry_surname', $here);
  $sur_ite = irp_provide ('block_surname', $here);
  $kin_ite = irp_provide ('entry_item_kind', $here);

  $en_tit = 'for entry';
  $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);
  $la_Tit .= ' <i><b> ' . $sur_ent . '</b></i> '; 

  $en_tit = $kin_ite;
  $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
  $la_Tit .= $la_bub_tit;
  $la_Tit .= ' <i><b> ' . $sur_ite . '</b></i> '; 
 
  $en_tit = 'has been deleted';
  $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
  $la_Tit .= $la_bub_tit;

  $html_str = common_html_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}


function block_delete_save_catalog_actualize_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_name', $here);
  $nam_ite = irp_provide ('block_current_name', $here);

  debug_n_check ($here , "input entry_name", $nam_ent);
  debug_n_check ($here , "input block name", $nam_ite);

  $dir = specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);

  $cat_ite = irp_provide ('block_name_catalog', $here);
  $con = block_name_catalog_delete_of_entry_name_of_block_name_catalog_of_block_current_name ($nam_ent, $cat_ite, $nam_ite);
  $ext_lis = irp_provide ('block_name_catalog_filename_extension', $here);
  $nof = "Block_name_catalog." . $ext_lis;

  if ($con == "") {
      $fno = $dir . $nof;
      if (! unlink ($fno)){
          echo "file $fno does not exist. Not deleted";
      }
  } else {
    file_string_write ($dir . $nof, $con);
  }

  return  "$here done"; 
}

function block_delete_save_delete_file_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_name', $here);
  $nam_ite = irp_provide ('block_current_name', $here);

  $dir = specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);
  $ext_txt = $_SESSION['parameters']['block_text_filename_extension'];

  $cmd_del  = 'cd ' . $dir . ';';
  $cmd_del .= 'rm ' . $nam_blo . '.' . $ext_txt;

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

function block_delete_save_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_name', $here);
  $nam_blo = irp_provide ('block_current_name', $here);
  $nof_mod = 'entry_display.php';

  $lan = $_SESSION['parameters']['language'];

  $html_str  = '';
  $html_log  = '';

  $html_str .= irp_provide ('pervasive_html_initial_section', $here);
  $html_log .= '<br> ';
  $html_log .= irp_provide ('block_delete_save_catalog_actualize', $here);
  $html_str .= irp_provide ('block_delete_save_section_page_title', $here);
  $html_str .= '<br><br> ';
  $html_log .= '<br><br> ';
  $html_log .= irp_provide ('block_delete_save_delete_file', $here);

  $sur_ent   = irp_provide ('entry_surname', $here);

  $html_str .= irp_provide ('git_command_n_commit_html', $here);
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_module_nameoffile_of_language ($nam_ent, $sur_ent, $nof_mod, $lan); 

  $html_str .= irp_provide ('pervasive_html_final_section', $here);

  $html_str .= '<br>Log<br> ';
  /* $html_str .= $html_log; */

  debug_n_check ($module , '$html_str', $html_str);

  return $html_str;
}

# exiting_from_module ($module);

?>