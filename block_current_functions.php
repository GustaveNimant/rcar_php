<?php

require_once "block_current_library.php";
require_once "irp_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

# $Documentation[$module]['surname_local_array'] = "the array of the surnames that begins as the current word";

entering_in_module ($module);

function block_current_file_fullname_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent_cur = irp_provide ('entry_current_name', $here);

  $hdir = $_SESSION['parameters']['absolute_path_server'];
  $fnd_ent_cur = $hdir . '/' . $nam_ent_cur;
  debug_n_check ($here , '$fnd_ent_cur', $fnd_ent_cur);

  $ext_blo = $_SESSION['parameters']['extension_block_filename'];

  $nam_blo_cur = irp_provide ('block_current_name', $here);
  $fno_blo_cur = $fnd_ent_cur . '/' . $nam_blo_cur . '.' .  $ext_blo;

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

function item_current_justification_from_block_current_content_build () {
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
