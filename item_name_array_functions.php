<?php

require_once "irp_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

$Documentation[$module]['item_name_array'] = "is the same as block_name_list_order_current_string";

function item_name_array_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_blo_a = irp_provide ('block_name_array_order_current', $here);
  debug ($here , '$nam_blo_a', $nam_blo_a);

  $nam_ite_a = $nam_blo_a;

  exiting_from_function ($here);

  return $nam_ite_a;
}

exiting_from_module ($module);

?>