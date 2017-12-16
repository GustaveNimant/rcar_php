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

function block_current_undo_save_irp_path_clean () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
/* Clean all Father Nodes from READ : block_current_content has changed */
    irp_path_clean_register_of_top_key_of_bottom_key_of_where ('index', 'READ_block_current_nameoffile_array', $here);
    
    exiting_from_function ($here);
    return;
}

function block_current_undo_save_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('pervasive_page_header', $here);
  $html_str .= '<br><br> ';
                            
  $html_str .= irp_provide ('block_current_undo_save_page_title', $here);
  $html_str .= '<br><br> ';

  $log_str   = irp_provide ('git_checkout_block_previous', $here);  /* WRITE */
  file_log_write ($here, $log_str);

  block_current_undo_save_irp_path_clean (); /* Improve */

  $html_str .= irp_provide ('git_command_n_commit_html', $here);
  $html_str .= '<br><br> ';

  $html_str .= irp_provide ('block_current_undo_save_link_to_return', $here);

  $html_str .= irp_provide ('pervasive_page_footer', $here);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here, '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>