<?php

require_once "irp_library.php";
require_once "block_list_order_new_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function block_name_list_order_new_array_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_mod_cur = module_name_of_module_fullnameoffile (__FILE__);

  $nam_blo_ord_cur_a = irp_provide ('block_name_array_order_current', $here);

/* getting DATA $get_val */
  /* $get_key = 'block_name_list_reorder_action_la';  */
  /* $la_Order = irp_data_value_retrieve_and_store_of_get_key_of_module_name_of_where ($get_key, $nam_mod_cur, $here); */

  $la_Order = irp_provide ('block_name_list_reorder_action_la', $here);
  $la_order = strtolower ($la_Order);
  $en_order = language_translate_to_english_of_la_string ($la_order);

/* ICI 
  $from = irp_provide ('from', $here);
  $to = irp_provide ('to', $here);
  $nam_blo_ord_new_a = block_current_name_reordered_array_of_en_order_of_block_name_list_order_current_of_from_of_o  ($en_order, $nam_blo_ord_cur_a, $from, $to); 
*/

  $nam_blo_ord_new_a = block_current_name_reordered_array_of_en_order_of_block_name_list_order_current ($en_order, $nam_blo_ord_cur_a); 

  debug_n_check ($here , '$nam_blo_ord_new_a', $nam_blo_ord_new_a);
  exiting_from_function ($here);

  return $nam_blo_ord_new_a;
}

exiting_from_module ($module);

?>