<?php

require_once "management_functions.php";
require_once "irp_functions.php";

$module = module_name (__FILE__);
$Documentation[$module]['what is it'] = "";

# entering_in_module ($module);

function block_current_name_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $irp_key = 'block_current_name';

  irp_path_clean_register_of_top_key_of_bottom_key ('entry_display', $irp_key);
  trace ($here, "GET >$irp_key< cleaning done");

  if ( isset ($_GET['block_current_name'])) {
      $nam_blo = array_dollar_get_retrieve_value_of_key ($irp_key, $here);
  }
  else {

      $sur_blo = irp_provide ('block_surname', $here);
      $nam_blo = word_name_capitalized_of_string_surname ($sur_blo);
  }
  
  exiting_from_function ($here);

  return $nam_blo;

}

# exiting_from_module ($module);

?>
