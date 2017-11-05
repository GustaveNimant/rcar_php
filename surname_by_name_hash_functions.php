<?php

require_once "irp_library.php";
require_once "surname_by_name_hash_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is an array equivalent to the surname_catalog";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function surname_by_name_hash_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $str_sur = irp_provide ('surname_catalog', $here) ;
  $sur_by_nam_h = surname_by_name_hash_of_surname_catalog ($str_sur);

  # debug_n_check ($here , '$sur_by_nam_h', $sur_by_nam_h);
  exiting_from_function ($here);

  return $sur_by_nam_h;

}

exiting_from_module ($module);

?>