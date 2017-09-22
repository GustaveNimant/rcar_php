<?php

require_once "array_functions.php";
require_once "irp_functions.php";
require_once "management_functions.php";
require_once "entry_information_functions.php";
require_once "item_functions.php";
require_once "item_display_functions.php";
require_once "bubble_functions.php";
require_once "entry_name_functions.php";
require_once "entry_display_functions.php";
require_once "surname_by_name_array_functions.php";

$module = "entry_text_name_functions";
$Documentation[$module]['entry_text_name'] = "is a directory name of php_server. i.e. any string expressed in the current language transformed in a Capitalized word, with blank transformed in underscores, without any accents.";

# entering_in_module ($module);

function entry_text_name_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

/* Improve */    
    if (irp_is_stored_of_irp_key ('entry_name')) {  
        $nam_ent = irp_provide ('entry_name', $here);  
        $nam_txt_ent = $nam_ent . '_text'; 
    }
    else {
        print_fatal_error ($here,
        "entry_name exists",
        "it does NOT",
        "Check");
    }
    
    string_check_entry_name_of_string ($nam_txt_ent);
    
    debug_n_check ($here , '$nam_txt_ent', $nam_txt_ent);
    exiting_from_function ($here);
    
    return $nam_txt_ent;
}

# exiting_from_module ($module);

?>
