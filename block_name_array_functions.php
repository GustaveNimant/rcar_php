<?php

require_once "block_name_catalog_functions.php";
require_once "management_functions.php";
require_once "irp_functions.php";

$module = module_name (__FILE__);

# entering_in_module ($module);

function block_name_array_update_after_block_rename ($nam_ent, $old_nam_blo, $new_nam_blo, $old_nam_blo_a) {
  $here = __FUNCTION__;
  entering_in_function ($here);

  debug_n_check ($here , '$nam_ent', $nam_ent);
  debug_n_check ($here , '$old_nam_blo', $old_nam_blo);
  debug_n_check ($here , '$new_nam_blo', $new_nam_blo);
# debug_n_check ($here , '$old_nam_blo_a', $old_nam_blo_a);

/* Keep order */

  $old_key_ite = array_retrieve_key_of_value ($old_nam_blo, $old_nam_blo_a, $here);
  $new_nam_blo_a = $old_nam_blo_a;
  $new_nam_blo_a[$old_key_ite] = $new_nam_blo;

# debug_n_check ($here , '$new_nam_blo_a', $new_nam_blo_a);
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

  $lan = $_SESSION['parameters']['language'];
  $cat_ite = irp_provide ('block_name_catalog', $here);
  debug ($here , '$cat_ite', $cat_ite);

  $glue = $_SESSION['parameters']['glue']; 
  $nam_blo_a = explode ($glue, $cat_ite);

  if (! has_values_unique_of_any_array ($nam_blo_a)){
      $en_mes_1 = 'the array';
      $en_mes_2 = 'is NOT unique';
      $la_mes_1 = language_translate_of_en_string_of_language ($en_mes_1, $lan); 
      $la_mes_2 = language_translate_of_en_string_of_language ($en_mes_2, $lan);   
      $la_mes =  $la_mes_1 . ' ' . 'block_name_array' . ' ' . $la_mes_2;
      $la_Mes = string_html_capitalized_of_string ($la_mes);
      warning ($here, $la_Mes);
  }

  $nam_blo_a = array_unique ($nam_blo_a);

  debug ($here , '$nam_blo_a', $nam_blo_a);

  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);
  surname_by_name_array_check_are_surnamed_of_nameofarray_of_current_array ('entry_name_array', $nam_blo_a, $sur_by_nam_a, $lan);

  check_is_array_unique_of_nameofarray_of_array ('block_name_array', $nam_blo_a);

  exiting_from_function ($here);

  return $nam_blo_a;
}

# exiting_from_module ($module);

?>