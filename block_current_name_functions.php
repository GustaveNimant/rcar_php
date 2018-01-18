<?php

require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

$Documentation[$module]['block_current_name'] = "is a file name of php_server. i.e. any string expressed in the current language transformed in a Capitalized word, with blank transformed in underscores, without any accents.";
$Documentation[$module]['block_current_name'] = "it is a DATA";
$Documentation[$module]['block_current_surnamenew'] = "it is a DATA";

entering_in_module ($module);

function block_current_surname_from_block_current_name_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
  
  $nam_blo_cur = irp_provide ('block_current_name', $here);
  $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here);
  $sur_blo_cur = surname_of_name_of_surname_by_name_hash ($nam_blo_cur, $sur_by_nam_h);
  
  exiting_from_function ($here . " with \$sur_blo_cur >$sur_blo_cur<");
  return $sur_blo_cur;
}

function block_current_namenew_from_block_current_surnamenew_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

/* Improve */    
    if (irp_is_stored_of_irp_key ('block_current_surnamenew', $here)) {  
        $sur_blo_cur = irp_provide ('block_current_surnamenew', $here);  
        $new_nam_blo_cur = word_name_capitalized_of_string_surname ($sur_blo_cur);
    }
    else {
        $new_nam_blo_cur = get_hash_retrieve_value_of_get_key_of_where ('block_current_namenew', $here);
    }

    string_check_is_block_name_of_string ($new_nam_blo_cur);

    exiting_from_function ($here . " with \$new_nam_blo_cur >$new_nam_blo_cur<");
    
    return $new_nam_blo_cur;
}

exiting_from_module ($module);

?>
