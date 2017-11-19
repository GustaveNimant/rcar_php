<?php
require_once "management_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function block_name_array_order_current_update_after_block_rename ($nam_ent, $old_nam_blo, $new_nam_blo, $old_nam_blo_a) {
  $here = __FUNCTION__;
  entering_in_function ($here);

  debug_n_check ($here , '$nam_ent', $nam_ent);
  debug_n_check ($here , '$old_nam_blo', $old_nam_blo);
  debug_n_check ($here , '$new_nam_blo', $new_nam_blo);
# debug_n_check ($here , '$old_nam_blo_a', $old_nam_blo_a);

/* Keep order */

  $old_key_blo = array_retrieve_only_key_of_value_of_array_of_where ($old_nam_blo, $old_nam_blo_a, $here);
  debug_n_check ($here , '$old_key_blo', $old_key_blo);
  $new_nam_blo_a = $old_nam_blo_a;
  $new_nam_blo_a[$old_key_blo] = $new_nam_blo;

  debug_n_check ($here , '$new_nam_blo_a', $new_nam_blo_a);
  exiting_from_function ($here);

  return $new_nam_blo_a;
}

function block_name_array_order_current_update_after_block_create ($nam_ent, $nam_blo, $nam_blo_a) {
  $here = __FUNCTION__;
  entering_in_function ($here);

  debug_n_check ($here , '$nam_ent', $nam_ent);
  debug_n_check ($here , '$nam_blo', $nam_blo);
# debug_n_check ($here , '$nam_blo_a', $nam_blo_a);

  array_push ($nam_blo_a, $nam_blo);

# debug_n_check ($here , '$nam_blo_a', $nam_blo_a);
  exiting_from_function ($here);

  return $nam_blo_a;
}

exiting_from_module ($module);

?>