<?php

require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function block_new_surname_from_block_new_name_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
  
  $nam_blo_new = irp_provide ('block_new_name', $here);
  $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here);
  $sur_blo_new = surname_of_name_of_surname_by_name_hash ($nam_blo_new, $sur_by_nam_h);
  
  exiting_from_function ($here . " with \$sur_blo_new >$sur_blo_new<");
  return $sur_blo_new;
}

function block_new_name_from_block_new_surname_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

    $sur_blo_new = irp_provide ('block_new_surname', $here);  
    $nam_blo_new = word_name_capitalized_of_string_surname ($sur_blo_new);
    string_check_is_block_name_of_string ($nam_blo_new);
    
    exiting_from_function ($here . " with \$nam_blo_new >$nam_blo_new<");
    
    return $nam_blo_new;
}

exiting_from_module ($module);

?>
