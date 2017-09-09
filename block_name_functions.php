<?php

require_once "management_functions.php";
require_once "irp_functions.php";

$module = "block_name_functions";
# entering_in_module ($module);

function block_name_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $irp_key = 'block_name';

  irp_path_clean_register_of_top_key_of_bottom_key ('entry_display', $irp_key);
  trace ($here, "GET >$irp_key< cleaning done");

  if ( isset ($_GET['block_name'])) {
      $nam_ite = array_dollar_get_retrieve_value_of_key ($irp_key, $here);
  }
  else {
/* Improve */
      $sur_ite = irp_provide ('block_surname', $here);
      $nam_ite = word_name_capitalized_of_string_surname ($sur_ite);
  }
  
  exiting_from_function ($here);

  return $nam_ite;

}

# exiting_from_module ($module);

?>
