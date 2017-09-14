<?php

require_once "irp_functions.php";

$module = module_name (__FILE__);

# entering_in_module ($module);

function block_new_name_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $irp_key = 'block_new_name';
  irp_path_clean_register_of_top_key_of_bottom_key ('entry_display', $irp_key);
  trace ($here, "GET >$irp_key< cleaning done");

  if ( isset ($_GET['block_new_name'])) {
      $nam_blo_new = array_dollar_get_retrieve_value_of_key ($irp_key, $here);
  }
  else {
      $sur_blo_new = irp_provide ('block_new_surname', $here);
      $nam_blo_new = word_name_capitalized_of_string_surname ($sur_blo_new);
  }
  
  exiting_from_function ($here . '$nam_blo_new = ' . $nam_blo_new);
  return $nam_blo_new;
}

# exiting_from_module ($module);

?>
