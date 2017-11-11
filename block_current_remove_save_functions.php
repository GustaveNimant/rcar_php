<?php

require_once "management_library.php";
require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function block_current_remove_save_page_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);
  $sur_blo_cur = irp_provide ('block_current_surname_from_block_current_name', $here);
  $kin_blo = irp_provide ('entry_block_kind', $here);

  $en_tit = 'page for displaying the result of the removal of the ' . $kin_blo;

  $la_bub_tit  = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_tit .= ' <i><b>' . $sur_blo_cur . '</b></i> ';
  $la_bub_Tit  = string_html_capitalized_of_string ($la_bub_tit);

  $en_tit = 'for entry';
  $la_bub_Tit .= bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit .= ' <i><b>' . $sur_ent_cur . '</b></i> '; 

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center>' . "\n";
  $html_str .= common_html_div_background_color_of_html ($la_bub_Tit);
  $html_str .= '</center>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_current_remove_save_block_file_remove_build () { /* Improve no $log_str */
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent_cur = irp_provide ('entry_current_name', $here);
  $nam_blo_cur = irp_provide ('block_current_name', $here);

  $dir = file_specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent_cur);
  $ext_blo_cur = $_SESSION['parameters']['extension_block_filename'];

  $nof_blo_cur = $nam_blo_cur . '.' . $ext_blo_cur;
  $fno_blo_cur = $dir . $nof_blo_cur;

  $log_str = '';
  if ( file_exists ($fno_blo_cur)) {
      unlink ($fno_blo_cur);
      $log_str = "Block file $fno_blo_cur has been removed";
  }
  else {
      $log_str = "Block file $fno_blo_cur does not exist not removed";
  }

  exiting_from_function ($here . " with $log_str");
 
  return $log_str;
}

function block_current_remove_save_block_catalog_update_build () { /* Improve no $log_str */
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent_cur = irp_provide ('entry_current_name', $here);
  $dir = file_specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent_cur);

  $ext_cat_blo = $_SESSION['parameters']['extension_block_name_list_order_filename'];
  $nof_cat_blo = 'Block_name_list_order' . '.' . $ext_cat_blo;
  $fno_cat_blo = $dir . $nof_cat_blo;
  debug_n_check ($here , '$fno_cat_blo', $fno_cat_blo);

  $nam_blo_cur = irp_provide ('block_current_name', $here);
  debug_n_check ($here , "input block name", $nam_blo_cur);

  $log_str = '';
  if ( file_exists ($fno_cat_blo)) {
      unlink ($fno_cat_blo);
      $log_str = "Block Catalog $fno_cat_blo has been removed";
  }
  else {
      $log_str = "Block Catalog $fno_cat_blo does not exist not removed";
  }

  exiting_from_function ($here . " with $log_str");
  return $log_str;
}

function block_current_remove_save_link_to_return_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
  
  $nam_ent_cur = irp_provide ('entry_current_name', $here);
  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);
  
  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center>' . "\n";
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_return_module_nameoffile ($nam_ent_cur, $sur_ent_cur, 'entry_current_display_script.php'); 
  $html_str .= '</center>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);
  
  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_current_remove_save_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $log_str   = '';

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('pervasive_page_header', $here);
  $html_str .= '<br><br> ';
                            
  $html_str .= irp_provide ('block_current_remove_save_page_title', $here);
  $html_str .= '<br><br> ';

  $log_str  .= irp_provide ('block_current_remove_save_block_file_remove', $here);

  $log_str  .= irp_provide ('block_current_remove_save_block_catalog_update', $here);

  $html_str .= irp_provide ('git_command_n_commit_html', $here);

  $html_str .= irp_provide ('block_current_remove_save_link_to_return', $here);

  $html_str .= irp_provide ('pervasive_page_footer', $here);
  $html_str .= comment_exiting_of_function_name ($here);

  file_log_write ($here, $log_str);

  debug_n_check ($here, '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>