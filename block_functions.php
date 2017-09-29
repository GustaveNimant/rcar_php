<?php

require_once "string_functions.php";
require_once "irp_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);
entering_in_module ($module);

function four_elements_array_off_block_content ($con_blo) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($con_blo)");
 
  $key_1 = "item_current_content :";
  $key_2 = "item_current_justification :";
  $key_3 = "item_previous_content :";
  $key_4 = "block_previous_sha1 :";

  $ele_a = four_elements_array_of_four_keys_off_string ($key_1, $key_2, $key_3, $key_4, $con_blo) ;
  debug ($here, '$ele_a', $ele_a);
  
  exiting_from_function ($here);
  return $ele_a;
}

function item_current_content_off_block_content ($con_blo) {
  $here = __FUNCTION__;
  entering_in_function ($here);

  debug ($here, '$con_blo', $con_blo);
  
  $ele_a = four_elements_array_off_block_content ($con_blo) ;
  $con_ite_cur = $ele_a ['item_current_content :'];
  
  debug ($here, '$con_ite_cur', $con_ite_cur);

  exiting_from_function ($here);
  
  return $con_ite_cur;
}

function block_content_write ($nam_ent, $nam_blo, $con_blo) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($nam_ent, $nam_blo, $con_blo)");

    $ext_blo = $_SESSION['parameters']['extension_block_filename'];
    debug_n_check ($here ,'$ext_blo', $ext_blo);

    $dir = specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);
    $nof_blo = $dir . $nam_blo . '.' . $ext_blo;
    debug_n_check ($here , '$nof_blo', $nof_blo);

    file_string_write ($nof_blo, $con_blo); 
    
    exiting_from_function ($module . ':' . $here);
    return;
}

exiting_from_module ($module);

?>
