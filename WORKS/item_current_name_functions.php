<?php

require_once "management_library.php";
require_once "irp_functions.php";

$module = "item_current_name_functions";
entering_in_module ($module);

function item_current_name_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $irp_key = 'item_current_name';

  irp_path_clean_register_of_top_key_of_bottom_key_of_where ('entry_current_display', $irp_key);
  trace ($here, "GET >$irp_key< cleaning done");

  if (isset ($_GET['item_current_name'])) {
      $nam_ite = get_hash_retrieve_value_of_get_key_of_where ($irp_key, $here);
  }
  else {
      $sur_ite = irp_provide ('item_surname', $here);
      $nam_ite = word_name_capitalized_of_string_surname ($sur_ite);
  }
  
  exiting_from_function ($here);

  return $nam_ite;

}

exiting_from_module ($module);

?>
