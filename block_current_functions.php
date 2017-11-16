<?php

require_once "debug_array_library.php";
require_once "block_library.php";
require_once "irp_library.php";

$module = "block_current_functions";

# $Documentation[$module]['surname_local_array'] = "the array of the surnames that begins as the current word";

entering_in_module ($module);

function block_current_content_of_four_elements ($con_ite_cur, $jus_ite_cur, $con_ite_pre, $blo_pre_sha) {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $con_blo_cur  = '';
  $con_blo_cur .= 'item_current_content :';
  $con_blo_cur .= "\n";
  $con_blo_cur .= $con_ite_cur;
  $con_blo_cur .= "\n";

  $con_blo_cur .= 'item_current_justification :';
  $con_blo_cur .= "\n";
  $con_blo_cur .= $jus_ite_cur;
  $con_blo_cur .= "\n";

  $con_blo_cur .= 'item_previous_content :';
  $con_blo_cur .= "\n";
  $con_blo_cur .= $con_ite_cur;
  $con_blo_cur .= "\n";

  $con_blo_cur .= 'block_previous_sha1 :';
  $con_blo_cur .= "\n";
  $con_blo_cur .= $blo_pre_sha;

  debug_n_check ($here , '$con_blo_cur', $con_blo_cur);
  exiting_from_function ($here);

  return $con_blo_cur;

}

function block_content_write ($nam_ent, $nam_blo, $con_blo) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($nam_ent, $nam_blo, $con_blo)");

    $ext_blo = $_SESSION['parameters']['extension_block_filename'];
    debug_n_check ($here ,'$ext_blo', $ext_blo);

    $dir = file_specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);
    $nof_blo = $dir . $nam_blo . '.' . $ext_blo;
    debug_n_check ($here , '$nof_blo', $nof_blo);

    file_string_write ($nof_blo, $con_blo); 

    $log_str = "Block new content >$con_blo_new< has been written on entry subdirectory $nam_ent_cur";
    
    exiting_from_function ($here. " ($nam_ent, $nam_blo, $con_blo)");
    return $log_str;
}

function block_current_file_fullname_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent_cur = irp_provide ('entry_current_name', $here);
  $hdir = file_specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent_cur);
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

function item_current_content_of_block_current_content ($con_blo_cur) {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $ele_a = four_elements_array_off_block_content ($con_blo_cur);
    $key = 'item_current_content :';
    
    $ite_cur_con = array_retrieve_value_of_key_of_array ($key, $ele_a);
    
    debug_n_check ($here, '$ite_cur_con', $ite_cur_con);
    exiting_from_function ($here);
    return $ite_cur_con;
}

function item_current_content_from_block_current_content_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $con_blo_by_nam_blo_h = irp_provide ('block_content_by_block_name_hash', $here);
    $nam_blo_cur = irp_provide ('block_current_name', $here);
    $con_blo_cur = array_retrieve_value_of_key_of_array ($nam_blo_cur, $con_blo_by_nam_blo_h);
    $ele_a = four_elements_array_off_block_content ($con_blo_cur);
    $key = 'item_current_content :';
    
    $ite_cur_con = array_retrieve_value_of_key_of_array ($key, $ele_a);
    
    debug_n_check ($here, '$ite_cur_con', $ite_cur_con);
    exiting_from_function ($here);
    return $ite_cur_con;
}

function item_current_justification_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
 
  $con_blo_by_nam_blo_h = irp_provide ('block_content_by_block_name_hash', $here);
  $nam_blo_cur = irp_provide ('block_current_name', $here);
  $con_blo_cur = array_retrieve_value_of_key_of_array ($nam_blo_cur, $con_blo_by_nam_blo_h);
  $ele_a = four_elements_array_off_block_content ($con_blo_cur);
  
  $key = 'item_current_justification :';

  $ite_cur_jus = array_retrieve_value_of_key_of_array ($key, $ele_a);

  debug_n_check ($here, '$ite_cur_jus', $ite_cur_jus);
  exiting_from_function ($here);
  return $ite_cur_jus;
}

function item_previous_content_from_block_current_content_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $con_blo_by_nam_blo_h = irp_provide ('block_content_by_block_name_hash', $here);
    $nam_blo_cur = irp_provide ('block_current_name', $here);
    $con_blo_cur = array_retrieve_value_of_key_of_array ($nam_blo_cur, $con_blo_by_nam_blo_h);
    $ele_a = four_elements_array_off_block_content ($con_blo_cur);
    $key = 'item_previous_content :';
    
    $ite_pre_con = array_retrieve_value_of_key_of_array ($key, $ele_a);
    
    debug_n_check ($here, '$ite_pre_con', $ite_pre_con);
    exiting_from_function ($here);
    return $ite_pre_con;
}

function block_previous_sha1_from_block_current_content_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $con_blo_by_nam_blo_h = irp_provide ('block_content_by_block_name_hash', $here);
    $nam_blo_cur = irp_provide ('block_current_name', $here);
    $con_blo_cur = array_retrieve_value_of_key_of_array ($nam_blo_cur, $con_blo_by_nam_blo_h);
    $ele_a = four_elements_array_off_block_content ($con_blo_cur);
    
    $key = 'block_previous_sha1 :';
    
    $blo_pre_sha = array_retrieve_value_of_key_of_array ($key, $ele_a);
    
    debug_n_check ($here, '$blo_pre_sha', $blo_pre_sha);
    exiting_from_function ($here);  
    return $blo_pre_sha;
}

exiting_from_module ($module);

?>
