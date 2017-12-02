<?php
require_once "irp_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it saves on disk the new order defined by the user";
$Documentation[$module]['remark'] = "not to be confused with the new order obtained after adding a block";

entering_in_module ($module);

function block_name_list_order_new_string_save_page_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);
  $kin_blo = irp_provide ('entry_block_kind', $here);

  if ($kin_blo == 'question'){
      $en_tit = 'page for displaying the result of reordering the ' . $kin_blo . 's for the'; 
  } 
  else {
      $en_tit = 'page for displaying the result of reordering the ' . $kin_blo . 's for entry'; 
  }

  $la_bub_tit  = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_tit .= '<i><b> ' . $sur_ent_cur . '</b></i>';
  $la_bub_Tit = string_html_capitalized_of_string ($la_bub_tit);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center>' . "\n";
  $html_str .= common_html_div_background_color_of_html ($la_bub_Tit);
  $html_str .= '</center>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);
  
  return $html_str;
}

function block_name_list_order_string_write_build () { /* user driven */
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_mod_cur = module_name_of_module_fullnameoffile (__FILE__);

/* Improve  */
  $get_key = 'block_name_list_order_new_string';
  $new_lis_blo = irp_data_value_retrieve_and_store_of_get_key_of_module_name_of_where ($get_key, $nam_mod_cur, $here);

/* Write Improve */
  $nam_ent_cur = irp_provide ('entry_current_name', $here);
  $log_str = block_name_list_order_write_of_entry_name_of_block_name_list_order_string ($nam_ent_cur, $new_lis_blo);
  father_n_son_stack_entity_push_of_father_of_son ("WRITE_block_name_list_order", $get_key);

  exiting_from_function ($here);

  return $log_str;
}

function block_name_list_order_new_string_save_irp_path_clean () {
  $here = __FUNCTION__;
  entering_in_function ($here);

/* Clean all Father Nodes and Store New as Current */
  irp_path_clean_register_of_top_key_of_bottom_key_of_where ('index', 'READ_block_name_list_order_current', $here); 
  
  exiting_from_function ($here);
  return;
}

function block_name_list_order_new_string_save_link_to_return_build () {
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

function block_name_list_order_new_string_save_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('pervasive_page_header', $here);
  $html_str .= '<br><br>';

  $html_str .= irp_provide ('block_name_list_order_new_string_save_page_title', $here);
  $html_str .= '<br><br>';

  $log_str   = irp_provide ('block_name_list_order_string_write', $here);
  file_log_write ($here, $log_str);

  block_name_list_order_new_string_save_irp_path_clean ();

  $html_str .= irp_provide ('git_command_n_commit_html', $here);
  $html_str .= '<br><br>';

  $html_str .= irp_provide ('block_name_list_order_new_string_save_link_to_return', $here); 
  $html_str .= '<br><br>';

  $html_str .= irp_provide ('pervasive_page_footer', $here);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);
  
  return $html_str;
}
  
exiting_from_module ($module);

?>