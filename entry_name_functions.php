<?php

require_once "array_functions.php";
require_once "irp_functions.php";
require_once "management_functions.php";
require_once "entry_information_functions.php";
require_once "bubble_functions.php";
require_once "entry_display_functions.php";
require_once "surname_by_name_array_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";


$Documentation[$module]['entry_name'] = "is a directory name of php_server. i.e. any string expressed in the current language transformed in a Capitalized word, with blank transformed in underscores, without any accents.";
$Documentation[$module]['entry_kind'] = "is a lower case word expressed in english. Ex.: text";
$Documentation[$module]['entry_block_kind'] = "is a lower case word expressed in english. Ex.: paragraph";

entering_in_module ($module);

function entry_surname_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
  
  $nam_ent = irp_provide ('entry_name', $here);
  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);
  $sur_ent = surname_of_name_of_surname_by_name_array ($nam_ent, $sur_by_nam_a);
  
  debug_n_check ($here , '$sur_ent', $sur_ent);
  exiting_from_function ($here);
  
  return $sur_ent;
}

function entry_name_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

/* Improve */    
    if (irp_is_stored_of_irp_key ('entry_newsurname')) {  
        $sur_ent = irp_provide ('entry_newsurname', $here);  
        $nam_ent = word_name_capitalized_of_string_surname ($sur_ent);
    }
    else {
        $nam_ent = dollar_get_array_retrieve_value_of_key_of_where ('entry_name', $here);
    }

    string_check_entry_name_of_string ($nam_ent);
    
    debug_n_check ($here , '$nam_ent', $nam_ent);
    exiting_from_function ($here);
    
    return $nam_ent;
}

exiting_from_module ($module);

?>
