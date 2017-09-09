<?php

require_once "string_functions.php";
require_once "irp_functions.php";

$module = module_name (__FILE__);
# entering_in_module ($module);

function block_surname_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  if ( isset ($_GET['block_name_input'])) {
   
/* create surname from user GET */
      $sur_blo = array_dollar_get_retrieve_value_of_key ('block_name_input', $here);
  }
  else {

      if ( isset ($_GET['block_surname'])) {
          
/* get surname from user selection GET */
          $sur_blo = array_dollar_get_retrieve_value_of_key ('block_surname', $here);
      }
      else {
  
/* get from disk if block_name exists */
 
          if (irp_is_stored ('block_name')) {
              $nam_blo = irp_provide ('block_name', $here);
              /* $sur_by_nam_a = surname_by_name_array_make (); ???? */
              $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);
              $sur_blo = $sur_by_nam_a[$nam_blo];
          }
          else {
              debug ($here, 'irp_register', $_SESSION['irp_register']);
              fatal_error ($here, "block_name is neither stored nor in GET");
          }
      }
  }

  debug_n_check ($here , '$sur_blo', $sur_blo);
  exiting_from_function ($here);
  
  return $sur_blo;
}

# exiting_from_module ($module);

?>


