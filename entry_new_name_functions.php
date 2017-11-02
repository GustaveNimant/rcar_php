<?php

require_once "irp_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function entry_new_surname_from_entry_new_name_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
  
  $nam_ent_new = irp_provide ('entry_new_name', $here);
  $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here);
  $sur_ent_new = surname_of_name_of_surname_by_name_hash ($nam_ent_new, $sur_by_nam_h);
  
  exiting_from_function ($here . " with \$sur_ent_new >$sur_ent_new<");
  return $sur_ent_new;
}

function entry_new_name_from_entry_new_surname_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

    $sur_ent_new = irp_provide ('entry_new_surname', $here);  
    $nam_ent_new = word_name_capitalized_of_string_surname ($sur_ent_new);
    string_check_entry_name_of_string ($nam_ent_new);
    
    exiting_from_function ($here . " with \$nam_ent_new >$nam_ent_new<");
    
    return $nam_ent_new;
}

exiting_from_module ($module);

?>
