<?php

require_once "management_functions.php";
require_once "irp_functions.php";
require_once "button_submit_functions.php";

$module = "item_list_neworder_functions";
# entering_in_module ($module);

/* Verify  */

function item_name_array_of_surname_by_name_array_of_item_name_array ($sur_by_nam_a, $nam_ite_a) { /* to be moved */
  $here = __FUNCTION__;
  entering_in_function ($here);
  # debug_n_check ($here , '$nam_ite_a', $nam_ite_a); 

  $html_str  = '';
  $html_str .= '<br> ';

  $ind = 0;
  foreach ($nam_ite_a as $ind_ite => $nam_ite) {
    debug_n_check ($here , '$nam_ite', $nam_ite);  
    $ind++;

    $sur_ite = surname_of_name_of_surname_by_name_array ($nam_ite, $sur_by_nam_a);

    $html_str .= '&nbsp;' . $ind . '&nbsp;:&nbsp;<b> ';
    $html_str .= $sur_ite;
    $html_str .= '</b> ';
    $html_str .= '<br> ';
  }
    $html_str .= '<br> ';
  

  debug_n_check ($here , 'html code', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function swap_two_items ($nam_ite_a) {
  $here = __FUNCTION__;
  entering_in_function ($here);
  # debug_n_check ($here , '$nam_ite_a', $nam_ite_a); 

  $nam_ite_fr = array_dollar_get_retrieve_value_of_key ('from', $here);
  $nam_ite_to = array_dollar_get_retrieve_value_of_key ('to', $here);

  $pro_key_fr = array_retrieve_key_of_value ($nam_ite_fr, $nam_ite_a, $here);
  $pro_key_to = array_retrieve_key_of_value ($nam_ite_to , $nam_ite_a, $here);

  $mod_pro_a  = array_swap ($pro_key_fr, $pro_key_to, $nam_ite_a);

  # debug_n_check ($here , "output item name array:", $mod_pro_a); 
  exiting_from_function ($here);

  return $mod_pro_a;
}

function after_one_item ($nam_ite_a) {
  $here = __FUNCTION__;
  entering_in_function ($here);
  # debug_n_check ($here , '$nam_ite_a', $nam_ite_a); 
 
  $nam_ite_fr = array_dollar_get_retrieve_value_of_key ('from', $here);
  $nam_ite_to = array_dollar_get_retrieve_value_of_key ('to', $here);

  debug_n_check ($here , "item name from:", $nam_ite_fr); 
  debug_n_check ($here , "item name to:", $nam_ite_to);  

  $ren_arr_a = renumber_keys_of_step_of_array (2, $nam_ite_a);
  # debug_n_check ($here , "renumbered item name array:", $ren_arr_a); 

  $pro_key_fr = array_retrieve_key_of_value ($nam_ite_fr, $ren_arr_a, $here);
  $pro_key_to = array_retrieve_key_of_value ($nam_ite_to , $ren_arr_a, $here);

  debug_n_check ($here , "key from:", $pro_key_fr); 
  debug_n_check ($here , "key to:", $pro_key_to);  

  $ren_arr_a[($pro_key_to + 1)] = $nam_ite_fr;
  unset ($ren_arr_a[$pro_key_fr]);
  ksort ($ren_arr_a);
  $ren_arr_a = renumber_keys_of_step_of_array (1, $ren_arr_a);

  # debug_n_check ($here , "output item name array:", $ren_arr_a); 
  exiting_from_function ('exiting :' . $here);

  return $ren_arr_a;

}

function before_one_item ($nam_ite_a) {
  $here = __FUNCTION__;
  entering_in_function ($here);
  # debug_n_check ($here , '$nam_ite_a', $nam_ite_a); 
 
  $nam_ite_fr = array_dollar_get_retrieve_value_of_key ('from', $here);
  $nam_ite_to = array_dollar_get_retrieve_value_of_key ('to', $here);

  debug_n_check ($here , "item name from:", $nam_ite_fr); 
  debug_n_check ($here , "item name to:", $nam_ite_to);  

  $ren_arr_a = renumber_keys_of_step_of_array (2, $nam_ite_a);
  # debug_n_check ($here , "renumbered item name array:", $ren_arr_a); 

  $pro_key_fr = array_retrieve_key_of_value ($nam_ite_fr, $ren_arr_a, $here);
  $pro_key_to = array_retrieve_key_of_value ($nam_ite_to , $ren_arr_a, $here);

  debug_n_check ($here , "key from:", $pro_key_fr); 
  debug_n_check ($here , "key to:", $pro_key_to);  

  $ren_arr_a[($pro_key_to -1)] = $nam_ite_fr;
  unset ($ren_arr_a[$pro_key_fr]);
  ksort ($ren_arr_a);
  $ren_arr_a = renumber_keys_of_step_of_array (1, $ren_arr_a);

  # debug_n_check ($here , "output item name array:", $ren_arr_a); 
  exiting_from_function ('exiting :' . $here);

  return $ren_arr_a;

}

function item_name_reordered_array_of_item_name_array_of_language ($old_pro_a, $lan) {
  $here = __FUNCTION__;
  entering_in_function ($here . "(... array, $lan)");
  # debug_n_check ($here , "old item order array", $old_pro_a);

  $order_lan = array_dollar_get_retrieve_value_of_key ('order', $here);
  debug_n_check ($here , '$order_lan', $order_lan);
  $order_lan = lcfirst ($order_lan);
  $order = language_translate_to_english_of_language_of_lan_string ($lan, $order_lan);

  switch ($order) {
  case 'move before':
    $new_pro_a = before_one_item ($old_pro_a);
    # debug_n_check ($here , "new item order array", $new_pro_a);
    exiting_from_function ($here);
    return  $new_pro_a;
    break;
  case 'move after':
    $new_pro_a = after_one_item ($old_pro_a);
    # debug_n_check ($here , "new item order array", $new_pro_a);
    exiting_from_function ($here);
   return  $new_pro_a;
    break;
  case 'swap':
    $new_pro_a = swap_two_items ($old_pro_a);
    # debug_n_check ($here , "new item order array", $new_pro_a);
    exiting_from_function ($here);
    return  $new_pro_a;    
    break;
  default:
    print "<br>Fatal Error in $here : case >$order< is unknown. Check";
    exiting_from_function ($here);
    break;
  }

}

function item_name_array_reorder_build () {
  $here = __FUNCTION__;

  $lan = $_SESSION['parameters']['language'];
  $nam_ite_a = irp_provide ('item_name_array', $here);

  $new_nam_ite_a = item_name_reordered_array_of_item_name_array_of_language ($nam_ite_a, $lan); 

  # debug_n_check ($here , '$new_nam_ite_a_a', $new_nam_ite_a);
  exiting_from_function ($here);

  return $new_nam_ite_a;
}

/* First Section Neworder Display Title */

function item_list_neworder_display_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $sur_ent = irp_provide ('entry_surname', $here);
  $kin_ite = irp_provide ('entry_item_kind', $here);
  $kin_ite_plu = item_kind_plural_of_item_kind ($kin_ite);

  $en_tit = 'new order of ' . $kin_ite_plu . ' for entry';

  $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);
  $la_Tit .= ' <i><b> ' . $sur_ent . '</b></i> ';
  
  $html_str = common_html_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* First Section Neworder Display Items */

function item_list_neworder_display_items_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
  
  $nam_ent = irp_provide ('entry_name', $here);

  $new_ite_a = irp_provide ('item_name_array_reorder', $here);
  irp_store_force ('item_name_array', $new_ite_a, 'item_list_neworder');
  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);

  global $glue;
  $la_ite_l = implode ($glue, $new_ite_a);

  $html_str  = '';
  $html_str .= item_name_array_of_surname_by_name_array_of_item_name_array ($sur_by_nam_a, $new_ite_a);
  $html_str .= '<input type="hidden" name="item_sequence_string" value="' . $la_ite_l . '"> ';

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* First Section Neworder Display  */

function item_list_neworder_display_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
  
  $html_str  = '';
  $html_str .= irp_provide ('item_list_neworder_display_title', $here);
  $html_str .= irp_provide ('item_list_neworder_display_items', $here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}


/* Second Section Neworder Justification Title */

function item_list_neworder_justification_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $en_tit = 'enter your justification below';

  $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
  $la_Tit = string_html_capitalized_of_string ($la_bub_tit);

  $html_str  = '';
  $html_str .= common_html_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Second Section Neworder Justification Textarea */

function item_list_neworder_justification_textarea_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= '<textarea name="justification" rows="2" cols="100" />';
  $html_str .= '</textarea> ' . "\n";

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Second Section Neworder Justification */

function item_list_neworder_justification_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= irp_provide ('item_list_neworder_justification_title', $here);
  $html_str .= '<br> ';
  $html_str .= irp_provide ('item_list_neworder_justification_textarea', $here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Page item list Neworder */
 
function item_list_neworder_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $nam_ent = irp_provide ('entry_name', $here);
  $sur_ent = irp_provide ('entry_surname', $here);
  $nof_mod = 'entry_display.php';
  $script_action = 'item_list_neworder_save.php';

  $html_str  = '';
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);

  $html_str .= '<form action="' . $script_action . '" method="get"> ' . "\n";
  $html_str .= irp_provide ('item_list_neworder_display', $here); 
  $html_str .= irp_provide ('item_list_neworder_justification', $here); 
  $html_str .= '<br><br> ';
  $html_str .= button_submit_centered_of_button_value_en_of_language ('save', $lan); 
  $html_str .= '</form> ' . "\n";
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_module_nameoffile_of_language ($nam_ent, $sur_ent, $nof_mod, $lan);
  $html_str .= irp_provide ('pervasive_html_final_section', $here); 
  
  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
 
}

# exiting_from_module ($module);

?>