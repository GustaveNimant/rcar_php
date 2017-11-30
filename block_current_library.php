<?php
require_once "block_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";


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

    $log_str = "Block new content >$con_blo< has been written on entry subdirectory $nam_ent";
    
    exiting_from_function ($here. " ($nam_ent, $nam_blo, $con_blo)");
    return $log_str;
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

function item_current_justification_of_block_current_content ($con_blo_cur) {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $ele_a = four_elements_array_off_block_content ($con_blo_cur);
    $key = 'item_current_justification :';
    
    $ite_cur_jus = array_retrieve_value_of_key_of_array ($key, $ele_a);
    
    debug_n_check ($here, '$ite_cur_jus', $ite_cur_jus);
    exiting_from_function ($here);
    return $ite_cur_jus;
}

exiting_from_module ($module);

?>
