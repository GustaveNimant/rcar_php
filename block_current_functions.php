<?php

require_once "debug_array_functions.php";
require_once "block_functions.php";
require_once "irp_functions.php";

$module = "block_current_functions";

# $Documentation[$module]['surname_local_array'] = "the array of the surnames that begins as the current word";

entering_in_module ($module);

function block_current_content_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
 
  $nam_blo_cur = irp_provide ('block_current_name', $here); 
  $con_blo_a = irp_provide ('block_content_by_block_name_array', $here);
  $con_blo_cur = array_retrieve_value_of_key_of_array ($nam_blo_cur, $con_blo_a);

  debug_n_check ($here, '$con_blo_cur', $con_blo_cur);
  exiting_from_function ($here);
  return $con_blo_cur;
}

function block_current_four_elements_array_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
 
  $con_blo_cur = irp_provide ('block_current_content', $here); 
  $ele_a = four_elements_array_off_block_content ($con_blo_cur);

  debug_n_check ($here, '$ele_a', $ele_a);
  exiting_from_function ($here);
  return $ele_a;
}

function item_current_content_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
 
  $ele_a = irp_provide ('block_current_four_elements_array', $here);
  $key = 'item_current_content :';

  $result = array_retrieve_value_of_key_of_array ($key, $ele_a);

  debug_n_check ($here, '$result', $result);
  exiting_from_function ($here);
  return $result;
}

function item_current_justification_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
 
  $ele_a = irp_provide ('block_current_four_elements_array', $here);
  $key = 'item_current_justification :';

  $result = array_retrieve_value_of_key_of_array ($key, $ele_a);

  debug_n_check ($here, '$result', $result);
  exiting_from_function ($here);
  return $result;
}

function block_current_file_fullname_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_name', $here);
  $hdir = specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);
  debug_n_check ($here , '$hdir', $hdir);

  $ext_blo = $_SESSION['parameters']['extension_block_filename'];

  $nam_blo_cur = irp_provide ('block_current_name', $here);
  $fno_blo_cur = $hdir . $nam_blo_cur . '.' .  $ext_blo;

  debug_n_check ($here , '$fno_blo_cur', $fno_blo_cur);

  exiting_from_function ($here);
  return $fno_blo_cur;

}

function block_current_sha1_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $fno_blo_cur = irp_provide ('block_current_file_fullname', $here);

  $blo_cur_sha = sha1_file ($fno_blo_cur);
 
  debug_n_check ($here , '$blo_cur_sha', $blo_cur_sha);
  exiting_from_function ($here);

  return $blo_cur_sha;

}

function item_previous_content_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
 
  $ele_a = irp_provide ('block_current_four_elements_array', $here);
  $key = 'item_previous_content :';

  $result = array_retrieve_value_of_key_of_array ($key, $ele_a);

  debug_n_check ($here, '$result', $result);
  exiting_from_function ($here);
  
  return $result;
}

function block_previous_sha1_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
 
  $ele_a = irp_provide ('block_current_four_elements_array', $here);
  $key = 'block_previous_sha1 :';

  $result = array_retrieve_value_of_key_of_array ($key, $ele_a);

  debug_n_check ($here, '$result', $result);
  exiting_from_function ($here);  
  return $result;
}


exiting_from_module ($module);

?>
