<?php

require_once "git_command_library.php";
require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function block_current_undo_save_page_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);
  $sur_blo_cur = irp_provide ('block_current_surname_from_block_current_name', $here);
  $kin_blo = irp_provide ('entry_block_kind', $here);

  $en_tit = 'page for displaying the result of the revert of the ' . $kin_blo;

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

function block_current_undo_save_block_previous_checkout_build () { 
  $here = __FUNCTION__;
  entering_in_function ($here);

  $con_ite_pre = irp_provide ('item_previous_content_from_block_current_content', $here);

  $log_str = '';
  if ($con_ite_pre == 'no previous content') {
      $html_str  = comment_entering_of_function_name ($here);
      $html_str .= 'No previous block';
      $html_str .= comment_exiting_of_function_name ($here);

      $log_str .= 'No previous block';
  }
  else {
      $nam_ent_cur = irp_provide ('entry_current_name', $here);
      $nam_blo_cur = irp_provide ('block_current_name', $here);
      $ext_blo_cur = $_SESSION['parameters']['extension_block_filename'];
      $nof_blo_cur = $nam_blo_cur . '.' . $ext_blo_cur;

      $com_pre_sha = irp_provide ('git_commit_previous_sha1', $here);

      $log_str = git_checkout_of_git_commit_previous_sha1_of_entry_name_of_nameoffile ($com_pre_sha, $nam_ent_cur, $nof_blo_cur);

      $html_str  = comment_entering_of_function_name ($here);
      $html_str .= 'Previous block checked out';
      $html_str .= comment_exiting_of_function_name ($here);
  }

  file_log_write ($here, $log_str);
  exiting_from_function ($here . " with $html_str");
 
  return $html_str;
}


function block_current_undo_save_link_to_return_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
  
  $nam_ent_cur = irp_provide ('entry_current_name', $here);
  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);
  
  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center>' . "\n";
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_script_to_return ($nam_ent_cur, $sur_ent_cur, 'entry_current_display_script.php'); 
  $html_str .= '</center>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);
  
  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_current_undo_save_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $log_str   = '';

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('pervasive_page_header', $here);
  $html_str .= '<br><br> ';
                            
  $html_str .= irp_provide ('block_current_undo_save_page_title', $here);
  $html_str .= '<br><br> ';

  $html_str  .= irp_provide ('block_current_undo_save_block_previous_checkout', $here);
  $html_str .= '<br><br> ';

  $html_str .= irp_provide ('git_command_n_commit_html', $here);
  $html_str .= '<br><br> ';

  $html_str .= irp_provide ('block_current_undo_save_link_to_return', $here);

  $html_str .= irp_provide ('pervasive_page_footer', $here);
  $html_str .= comment_exiting_of_function_name ($here);

  file_log_write ($here, $log_str);

  debug_n_check ($here, '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>