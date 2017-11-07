<?php

require_once "management_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

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

exiting_from_module ($module);

?>