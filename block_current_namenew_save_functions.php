<?php

require_once "irp_library.php";
require_once "irp_path_library.php";
require_once "block_name_array_order_current_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function block_current_namenew_save_page_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);
  $sur_blo_cur = irp_provide ('block_current_surname_from_block_current_name', $here);
  $sur_new_blo_cur = irp_provide ('block_current_surnamenew', $here);

  $kin_blo = irp_provide ('entry_block_kind', $here);

  $en_tit = 'page for displaying the result of the renaming of the ' . $kin_blo;

  $la_bub_tit  = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_tit .= ' <i><b>' . $sur_blo_cur . '</b></i> ';
  $la_bub_Tit  = string_html_capitalized_of_string ($la_bub_tit);

  $en_tit = 'to ' . $kin_blo;

  $la_bub_Tit .= bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit .= ' <i><b>' . $sur_new_blo_cur . '</b></i> ';

  $en_tit = 'for entry';
  $la_bub_Tit .= bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit .= ' <i><b>' . $sur_ent_cur . '</b></i>'; 

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center>' . "\n";
  $html_str .= common_html_div_background_color_of_html ($la_bub_Tit);
  $html_str .= '</center>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_current_namenew_save_block_file_rename_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent_cur = irp_provide ('entry_current_name', $here);

  $hdir = $_SESSION['parameters']['absolute_path_server'];
  $fnd_ent_cur = $hdir . '/' . $nam_ent_cur;
  debug_n_check ($here , '$fnd_ent_cur', $fnd_ent_cur);

  $ext_blo_cur = $_SESSION['parameters']['extension_block_filename'];

  $old_nam_blo_cur = irp_provide ('block_current_name', $here);
  $old_nof_blo_cur = $old_nam_blo_cur . '.' . $ext_blo_cur;
  $old_fno_blo_cur = $fnd_ent_cur . '/' . $old_nof_blo_cur;

  $new_nam_blo_cur = irp_provide ('block_current_namenew_from_block_current_surnamenew', $here);
  $new_nof_blo_cur = $new_nam_blo_cur . '.' . $ext_blo_cur;
  $new_fno_blo_cur = $fnd_ent_cur . '/' . $new_nof_blo_cur;

  debug_n_check ($here , '$old_nam_blo_cur', $old_nam_blo_cur);
  debug_n_check ($here , '$new_nam_blo_cur', $new_nam_blo_cur);
  debug_n_check ($here , '$ext_blo_cur', $ext_blo_cur);

  if ( file_exists ($old_fno_blo_cur)) {
      block_file_rename ($nam_ent_cur, $old_nam_blo_cur, $new_nam_blo_cur, $ext_blo_cur);
      $log_str = "Block file >$old_fno_blo_cur< has been renamed as >$new_nam_blo_cur<";
  }
  else {
      print_fatal_error ($here,
      "Block file $old_fno_blo_cur exist",
      "it does NOT",
      "Check");
      $log_str = "Warning :Block file $old_fno_blo_cur does NOT exits";
  }

  exiting_from_function ($here . " with $log_str");
 
  return  $log_str;
}

function block_current_namenew_save_surname_catalog_update_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  /* File server/SURNAMES/Surname_catalog.cat : add "$new_nam_blo : $new_sur_blo" */

  $new_sur_blo_cur = irp_provide ('block_current_surnamenew', $here);
  $new_nam_blo_cur = irp_provide ('block_current_namenew_from_block_current_surnamenew', $here);

  $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here);

  if (array_key_exists ($new_nam_blo_cur, $sur_by_nam_h)) {
      $old_sur = $sur_by_nam_h[$new_nam_blo_cur];
      surname_by_name_hash_replace_n_write_of_name_of_surnamenew_of_current_hash ($new_nam_blo_cur, $new_sur_blo_cur, $sur_by_nam_h);
      $log_str = "Block Surname >$old_sur< has been replaced by >$new_sur_blo_cur< in Surname_catalog name >$new_nam_blo_cur<";
  }
  else {
      surname_by_name_hash_add_n_write_of_name_of_surname_of_current_hash ($new_nam_blo_cur, $new_sur_blo_cur, $sur_by_nam_h);
      $log_str = "Block Surname >$new_sur_blo_cur< has been added to Surname_catalog at name >$new_nam_blo_cur<";
  }
  
  exiting_from_function ($here . " with $log_str");
  return  $log_str;
}

function block_current_namenew_save_block_name_array_update_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent_cur = irp_provide ('entry_current_name', $here);

  $hdir = $_SESSION['parameters']['absolute_path_server'];
  $fnd_ent_cur = $hdir . '/' . $nam_ent_cur;
  debug_n_check ($here , '$fnd_ent_cur', $fnd_ent_cur);
  
  $old_nam_blo_cur = irp_provide ('block_current_name', $here);
  debug_n_check ($here , '$old_nam_blo_cur', $old_nam_blo_cur);
  
  $ext_lis_blo = $_SESSION['parameters']['extension_block_name_list_order_filename'];
  $nof_lis_blo = 'Block_name_list_order_string' . '.' . $ext_lis_blo;
  $fno_lis_blo = $fnd_ent_cur . '/' . $nof_lis_blo;
  debug_n_check ($here , '$fno_lis_blo', $fno_lis_blo);

  if ( file_exists ($fno_lis_blo)) {
      $log_str = "Block Catalog $fno_lis_blo has been renamed";
  }
  else {
      $log_str = "Block Catalog $fno_lis_blo does not exist not renamed";
  }

  $old_nam_blo_a = irp_provide ('block_name_array_order_current', $here);
  check_is_array_unique_of_what_of_array ('block_nameold_array', $old_nam_blo_a);

  $new_nam_blo_cur = irp_provide ('block_current_namenew_from_block_current_surnamenew', $here);
  $new_nam_blo_a = block_name_array_order_current_update_after_block_rename ($nam_ent_cur, $old_nam_blo_cur, $new_nam_blo_cur, $old_nam_blo_a);

# SKIPPED  check_is_array_unique_of_what_of_array ('block_namenew_array', $new_nam_blo_a);
  debug_n_check ($here , '$old_nam_blo_a', $old_nam_blo_a);
  debug_n_check ($here , '$new_nam_blo_a', $new_nam_blo_a);

  exiting_from_function ($here . " with $log_str");
  return $new_nam_blo_a;
}

function block_current_namenew_save_block_name_list_write_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
  
  $new_nam_blo_a = irp_provide ('block_current_namenew_save_block_name_array_update', $here);
  debug_n_check ($here, '$new_nam_blo_a', $new_nam_blo_a); 
  $new_nam_blo_lis = block_name_list_order_of_block_name_array_order ($new_nam_blo_a);
  debug_n_check ($here, '$new_nam_blo_lis', $new_nam_blo_lis); 

/* Write Improve */
  $nam_ent_cur = irp_provide ('entry_current_name', $here);
  $log_str = block_name_list_order_write_of_entry_name_of_block_name_list_order_string ($nam_ent_cur, $new_nam_blo_lis);

  $entity = entity_name_of_build_function_name ($here);
  father_n_son_stack_entity_push_of_father_of_son ("WRITE_block_name_list_order", $entity);

  exiting_from_function ($here . " with $log_str");
  return  $log_str;
}

function block_current_namenew_save_link_to_return_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
  
  $nam_ent_cur = irp_provide ('entry_current_name', $here);
  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);
  
  $script_to_return = 'entry_current_display_script.php'; 

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center>' . "\n";
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_script_to_return ($nam_ent_cur, $sur_ent_cur, $script_to_return); 
  $html_str .= '</center>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);
  
  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_current_namenew_save_irp_path_clean () {
  $here = __FUNCTION__;
  entering_in_function ($here);

/* Clean all Father Nodes and Store New as Current */
  irp_path_clean_register_of_top_key_of_bottom_key_of_where ('index', 'READ_block_name_list_order_current', $here); 
  irp_path_clean_register_of_top_key_of_bottom_key_of_where ('index', 'READ_block_current_nameoffile_array', $here); 

#  irp_path_clean_register_of_top_key_of_bottom_key_of_where ('index', 'GET_block_current_surnamenew', $here); 
 
  exiting_from_function ($here);
  return;
}

function block_current_namenew_save_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('pervasive_page_header', $here);

  $html_str .= irp_provide ('block_current_namenew_save_page_title', $here);
  $html_str .= '<br><br> ';

  $log_str   = irp_provide ('block_current_namenew_save_block_file_rename', $here);
  file_log_write ($here, $log_str);
  
  $log_str   = irp_provide ('block_current_namenew_save_surname_catalog_update', $here);
  file_log_write ($here, $log_str);

  $log_str   = irp_provide ('block_current_namenew_save_block_name_list_write', $here);
  file_log_write ($here, $log_str);

  block_current_namenew_save_irp_path_clean (); /* Improve */
     
  $html_str .= irp_provide ('git_command_n_commit_html', $here);
  $html_str .= '<br><br>';

  $html_str .= irp_provide ('block_current_namenew_save_link_to_return', $here);
  $html_str .= '<br>';

  $html_str .= irp_provide ('pervasive_page_footer', $here);
  $html_str .= comment_exiting_of_function_name ($here);
  
  debug_n_check ($here, '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>