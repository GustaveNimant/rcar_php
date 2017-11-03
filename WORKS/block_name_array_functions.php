<?php
require_once "irp_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function block_name_array_update_after_block_rename ($nam_ent, $old_nam_blo, $new_nam_blo, $old_nam_blo_a) {
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

function block_name_array_update_after_block_create ($nam_ent, $nam_blo, $nam_blo_a) {
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

function block_name_array_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $cat_blo = irp_provide ('block_name_catalog_current', $here);
  debug ($here , '$cat_blo', $cat_blo);

  $glue = $_SESSION['parameters']['glue']; 
  $nam_blo_a = explode ($glue, $cat_blo);

  if (! has_values_unique_of_any_array ($nam_blo_a)){
      $en_mes_1 = 'the array';
      $en_mes_2 = 'is NOT unique';
      $la_mes_1 = language_translate_of_en_string ($en_mes_1); 
      $la_mes_2 = language_translate_of_en_string ($en_mes_2);   
      $la_mes =  $la_mes_1 . ' ' . 'block_name_array' . ' ' . $la_mes_2;
      $la_Mes = string_html_capitalized_of_string ($la_mes);
      warning ($here, $la_Mes);
  }

  $nam_blo_a = array_unique ($nam_blo_a);

  debug ($here , '$nam_blo_a', $nam_blo_a);

  $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here);
  surname_by_name_hash_check_are_surnamed_of_nameofarray_of_current_array ('entry_name_array', $nam_blo_a, $sur_by_nam_h);

  check_is_array_unique_of_what_of_array ('block_name_array', $nam_blo_a);

  exiting_from_function ($here);

  return $nam_blo_a;
}

exiting_from_module ($module);

?>