<?php

require_once "management_library.php";
require_once "irp_library.php";
require_once "button_submit_functions.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

/* Verify  */

function block_name_array_of_surname_by_name_hash_of_block_name_array ($sur_by_nam_h, $nam_blo_a) { /* to be moved */
  $here = __FUNCTION__;
  entering_in_function ($here);
  # debug_n_check ($here , '$nam_blo_a', $nam_blo_a); 

  $html_str  = '';
  $html_str .= '<br> ';

  $ind = 0;
  foreach ($nam_blo_a as $ind_blo => $nam_blo) {
    debug_n_check ($here , '$nam_blo', $nam_blo);  
    $ind++;

    $sur_blo = surname_of_name_of_surname_by_name_hash ($nam_blo, $sur_by_nam_h);

    $html_str .= '&nbsp;' . $ind . '&nbsp;:&nbsp;<b> ';
    $html_str .= $sur_blo;
    $html_str .= '</b> ';
    $html_str .= '<br> ';
  }
    $html_str .= '<br> ';
  

  debug_n_check ($here , 'html code', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function swap_two_blocks ($nam_blo_a) {
  $here = __FUNCTION__;
  entering_in_function ($here);
  # debug_n_check ($here , '$nam_blo_a', $nam_blo_a); 

  $nam_blo_fr = get_hash_retrieve_value_of_get_key_of_where ('from', $here);
  $nam_blo_to = get_hash_retrieve_value_of_get_key_of_where ('to', $here);

  $pro_key_fr = array_retrieve_only_key_of_value_of_array_of_where ($nam_blo_fr, $nam_blo_a, $here);
  $pro_key_to = array_retrieve_only_key_of_value_of_array_of_where ($nam_blo_to , $nam_blo_a, $here);

  $mod_pro_a  = array_swap ($pro_key_fr, $pro_key_to, $nam_blo_a);

  # debug_n_check ($here , "output block name array:", $mod_pro_a); 
  exiting_from_function ($here);

  return $mod_pro_a;
}

function after_one_block ($nam_blo_a) {
  $here = __FUNCTION__;
  entering_in_function ($here);
  debug_n_check ($here , '$nam_blo_a', $nam_blo_a); 
 
  $nam_blo_fr = get_hash_retrieve_value_of_get_key_of_where ('from', $here);
  $nam_blo_to = get_hash_retrieve_value_of_get_key_of_where ('to', $here);

  debug_n_check ($here , "block name from:", $nam_blo_fr); 
  debug_n_check ($here , "block name to:", $nam_blo_to);  

  $ren_arr_a = renumber_keys_of_step_of_array (2, $nam_blo_a);
  # debug_n_check ($here , "renumbered block name array:", $ren_arr_a); 

  $pro_key_fr = array_retrieve_only_key_of_value_of_array_of_where ($nam_blo_fr, $ren_arr_a, $here);
  $pro_key_to = array_retrieve_only_key_of_value_of_array_of_where ($nam_blo_to , $ren_arr_a, $here);

  debug_n_check ($here , "key from:", $pro_key_fr); 
  debug_n_check ($here , "key to:", $pro_key_to);  

  $ren_arr_a[($pro_key_to + 1)] = $nam_blo_fr;
  unset ($ren_arr_a[$pro_key_fr]);  /* left */
  $log_str = "Key >$pro_key_fr< has been removed from array \$ren_arr_a" . "\n";

  ksort ($ren_arr_a);
  $ren_arr_a = renumber_keys_of_step_of_array (1, $ren_arr_a);
  $log_str .= "Keys of array \$ren_arr_a have been renumbered by ?" . "\n";

  file_log_write ($here, $log_str);
  debug_n_check ($here , '$ren_arr_a', $ren_arr_a); 
  exiting_from_function ('exiting :' . $here);

  return $ren_arr_a;

}

function before_one_block ($nam_blo_a) {
  $here = __FUNCTION__;
  entering_in_function ($here);
  debug_n_check ($here , '$nam_blo_a', $nam_blo_a); 
 
  $nam_blo_fr = get_hash_retrieve_value_of_get_key_of_where ('from', $here);
  $nam_blo_to = get_hash_retrieve_value_of_get_key_of_where ('to', $here);

  debug_n_check ($here , "block name from:", $nam_blo_fr); 
  debug_n_check ($here , "block name to:", $nam_blo_to);  

  $ren_arr_a = renumber_keys_of_step_of_array (2, $nam_blo_a);
  # debug_n_check ($here , "renumbered block name array:", $ren_arr_a); 

  $pro_key_fr = array_retrieve_only_key_of_value_of_array_of_where ($nam_blo_fr, $ren_arr_a, $here);
  $pro_key_to = array_retrieve_only_key_of_value_of_array_of_where ($nam_blo_to , $ren_arr_a, $here);

  debug_n_check ($here , "key from:", $pro_key_fr); 
  debug_n_check ($here , "key to:", $pro_key_to);  

  $ren_arr_a[($pro_key_to -1)] = $nam_blo_fr;
  unset ($ren_arr_a[$pro_key_fr]); /* left */
  $log_str = "Key >$pro_key_fr< has been removed from array \$ren_arr_a";

  ksort ($ren_arr_a);
  $ren_arr_a = renumber_keys_of_step_of_array (1, $ren_arr_a);
  $log_str .= "Keys of array \$ren_arr_a have been renumbered";

  file_log_write ($here, $log_str);

  debug_n_check ($here , "output block name array:", $ren_arr_a); 
  exiting_from_function ($here);

  return $ren_arr_a;

}

function block_current_name_reordered_array_of_en_order_of_block_name_array ($en_order, $old_pro_a) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($en_order, ... array)");
  # debug_n_check ($here , "old block order array", $old_pro_a);

  switch ($en_order) {
  case 'move before':
      $new_pro_a = before_one_block ($old_pro_a);
      # debug_n_check ($here , "new block order array", $new_pro_a);
      break;
  case 'move after':
      $new_pro_a = after_one_block ($old_pro_a);
      # debug_n_check ($here , "new block order array", $new_pro_a);
      break;
  case 'swap':
      $new_pro_a = swap_two_blocks ($old_pro_a);
      # debug_n_check ($here , "new block order array", $new_pro_a);
      break;
  default:
      print "<br>Fatal Error in $here : case >$order< is unknown. Check";
      break;
  }
  
  exiting_from_function ($here);
  return $new_pro_a;
}

function block_name_array_reorder_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_mod_cur = module_name_of_module_fullnameoffile (__FILE__);

  $nam_blo_a = irp_provide ('block_name_array', $here);

/* getting DATA $get_val */
  $get_key = 'block_list_reorder_la'; 
  $la_Order = irp_data_value_retrieve_and_store_of_get_key_of_module_name_of_where ($get_key, $nam_mod_cur, $here);
  $la_order = strtolower ($la_Order);
  $en_order = language_translate_to_english_of_la_string ($la_order);
  $new_nam_blo_a = block_current_name_reordered_array_of_en_order_of_block_name_array ($en_order, $nam_blo_a); 

  debug_n_check ($here , '$new_nam_blo_a_a', $new_nam_blo_a);
  exiting_from_function ($here);

  return $new_nam_blo_a;
}

function block_list_order_new_display_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);
  $kin_blo = irp_provide ('entry_block_kind', $here);
  $kin_blo_plu = block_kind_plural_of_block_kind ($kin_blo);

  $en_tit = 'new order of ' . $kin_blo_plu . ' for entry';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);
  $la_Tit .= ' <i><b> ' . $sur_ent_cur . '</b></i> ';
  
  $html_str = common_html_div_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* First Section Neworder Display Blocks */

function block_list_order_new_display_blocks_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
  
  $nam_ent_cur = irp_provide ('entry_current_name', $here);

  $new_blo_a = irp_provide ('block_name_array_reorder', $here);
  irp_store_force ('block_name_array', $new_blo_a, 'block_list_order_new');
  $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here);

  $glue = $_SESSION['parameters']['glue'];
  $la_blo_l = implode ($glue, $new_blo_a);

  $html_str  = '';
  $html_str .= block_name_array_of_surname_by_name_hash_of_block_name_array ($sur_by_nam_h, $new_blo_a);
  $html_str .= '<input type="hidden" name="block_name_catalog_new" value="' . $la_blo_l . '"> ';

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* First Section Neworder Display  */

function block_list_order_new_display_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
  
  $html_str  = '';
  $html_str .= irp_provide ('block_list_order_new_display_title', $here);
  $html_str .= irp_provide ('block_list_order_new_display_blocks', $here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}


/* Second Section Neworder Justification Title */

function block_list_order_new_justification_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'enter your justification below';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_Tit = string_html_capitalized_of_string ($la_bub_tit);

  $html_str  = '';
  $html_str .= common_html_div_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Second Section Neworder Justification Textarea */

function block_list_order_new_justification_textarea_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= '<textarea name="block_list_order_new_justification" rows="2" cols="100" />';
  $html_str .= '</textarea> ' . "\n";

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_list_order_new_justification_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= irp_provide ('block_list_order_new_justification_title', $here);
  $html_str .= '<br> ';
  $html_str .= irp_provide ('block_list_order_new_justification_textarea', $here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}
 
function block_list_order_new_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent_cur = irp_provide ('entry_current_name', $here);
  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);

  $html_str  = '';
  $html_str .= irp_provide ('pervasive_page_header', $here);

  $html_str .= '<form action="block_list_order_new_save_script.php" method="get"> ' . "\n";
  $html_str .= irp_provide ('block_list_order_new_display', $here); 
  $html_str .= irp_provide ('block_list_order_new_justification', $here); 
  $html_str .= '<br><br>';

  $html_str .= '<center>';
  $html_str .= inputtypesubmit_of_en_action_name ('save'); 
  $html_str .= '</center>';
  $html_str .= '</form> ' . "\n";
  $html_str .= '<br><br>';

  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_return_module_nameoffile ($nam_ent_cur, $sur_ent_cur, 'entry_current_display_script.php');
  $html_str .= irp_provide ('pervasive_page_footer', $here); 
  
  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
 
}

exiting_from_module ($module);

?>