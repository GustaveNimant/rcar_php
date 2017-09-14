<?php

$module = module_name (__FILE__);

# entering_in_module ($module);

function now () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $tim_now = date ("H:i:s", time ());
  
#  debug_n_check ($here, '$tim_now', $tim_now);

  exiting_from_function ($here);
  return $tim_now;
}

# exiting_from_module ($module);

?>