<?php

require_once "block_library.php";
require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function block_next_page_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_ent = irp_provide ('entry_current_surname_from_entry_current_name', $here);
  $en_kin_blo = irp_provide ('entry_block_kind', $here);
  $la_kin_blo = bubble_bubbled_la_text_of_en_text ($en_kin_blo);

  $nam_blo_cur = irp_provide ('block_current_name', $here);
  $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here);
  $sur_blo_cur = surname_of_name_of_surname_by_name_hash ($nam_blo_cur, $sur_by_nam_h);

  $en_tit = 'page for confirming the modification of ' . $en_kin_blo; 

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);

  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);
  $la_Tit .= '<i><b> ' . $sur_blo_cur . '</b></i> ';

  $en_tit =  'for entry';
  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_Tit .= lcfirst ($la_bub_tit);
  $la_Tit .= '<i><b> ' . $sur_ent . '</b></i>';

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= common_html_div_background_color_of_html ($la_Tit);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_next_save_write_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_current_name', $here);
  $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here);
  $sur_ent = surname_of_name_of_surname_by_name_hash ($nam_ent, $sur_by_nam_h);
  debug_n_check ($here, '$sur_ent', $sur_ent);

  $nam_blo_cur = irp_provide ('block_current_name', $here);
  $con_blo_nex = irp_provide ('block_next_content', $here);

/* WRITE */
  $log_str = block_content_write ($nam_ent, $nam_blo_cur, $con_blo_nex);
  file_log_write ($here, $log_str);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('git_command_n_commit_html', $here);
  $html_str .= comment_exiting_of_function_name ($here);
  
  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  
  return $html_str;
};

function block_next_save_link_to_return_block_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $get_key = 'block_current_name';
    $get_val = irp_provide ('block_current_name', $here);
    $sur_blo_cur = irp_provide ('block_current_surname_from_block_current_name', $here);
    
    $script_to_return = 'block_current_display_script.php';

    $kin_blo = irp_provide ('entry_block_kind', $here);

    $en_txt = 'back to the ' . $kin_blo;
    $la_txt  = language_translate_of_en_string ($en_txt);
    $la_Txt  = string_html_capitalized_of_string ($la_txt);
    $la_Txt .= ' <b><i>' . $sur_blo_cur . '</i></b>';

    debug_n_check ("$here", '$la_Txt', $la_Txt);
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<center>' . "\n";
    $html_str .= link_to_return_of_string_of_get_key_of_get_val_of_script_to_return ($la_Txt, $get_key, $get_val, $script_to_return) . "\n";
    $html_str .= '</center>' . "\n";
    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here , '$html_str',  $html_str);
    exiting_from_function ($here);
    
    return $html_str;
}

function block_next_save_link_to_return_entry_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent_cur = irp_provide ('entry_current_name', $here);
  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);

  $script_to_return = 'entry_current_display_script.php';

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center>';
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_script_to_return ($nam_ent_cur, $sur_ent_cur, $script_to_return);
  $html_str .= '</center>';
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}


function block_next_save_irp_path_clean () {
  $here = __FUNCTION__;
  entering_in_function ($here);

/* Clean all Father Nodes from READ : block_current_content has changed */
  irp_path_clean_register_of_top_key_of_bottom_key_of_where ('index', 'READ_block_current_nameoffile_array', $here);
 
  exiting_from_function ($here);
  return;
}

function block_next_save_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('pervasive_page_header', $here);
  $html_str .= '<br><br>';

  $html_str .= irp_provide ('block_next_page_title', $here);
  $html_str .= '<br><br>';

  $html_str .= irp_provide ('block_next_save_write', $here);
  $html_str .= '<br><br>';

  block_next_save_irp_path_clean (); /* Improve */

  $html_str .= irp_provide ('block_next_save_link_to_return_block', $here);
  $html_str .= '<br>';

  $html_str .= irp_provide ('block_next_save_link_to_return_entry', $here);
  $html_str .= '<br>';

  $html_str .= irp_provide ('pervasive_page_footer', $here);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);

  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>