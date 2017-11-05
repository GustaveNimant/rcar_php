<?php

require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

$Documentation[$module]['block_current_name'] = "is a directory name of php_server. i.e. any string expressed in the current language transformed in a Capitalized word, with blank transformed in underscores, without any accents.";
$Documentation[$module]['block_kind'] = "is a lower case word expressed in english. Ex.: text";
$Documentation[$module]['block_block_kind'] = "is a lower case word expressed in english. Ex.: paragraph";

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

function block_current_name_from_block_current_surnamenew_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

/* Improve */    
    if (irp_is_stored_of_irp_key ('block_current_surnamenew')) {  
        $sur_blo_cur = irp_provide ('block_current_surnamenew', $here);  
        $nam_blo_cur = word_name_capitalized_of_string_surname ($sur_blo_cur);
    }
    else {
        $nam_blo_cur = get_hash_retrieve_value_of_get_key_of_where ('block_current_name', $here);
    }

    string_check_is_block_name_of_string ($nam_blo_cur);
    
    exiting_from_function ($here . " with \$nam_blo_cur >$nam_blo_cur<");
    
    return $nam_blo_cur;
}

exiting_from_module ($module);

?>
