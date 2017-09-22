<?php

require_once "irp_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "??? "; 
$Documentation[$module]['what for'] = "to build the ???"; 

# entering_in_module ($module);

function block_new_create_button_save_build (){
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $lan = $_SESSION['parameters']['language'];

    $html_str  = '';
    $html_str .= '<center> ' . "\n";
    $html_str .= '   <input type="submit" value="';
    $html_str .= ucfirst (language_translate_of_en_string ('save'));
    $html_str .= '" name="submitme"> ' . "\n";
    $html_str .= '</center> ' . "\n";

    debug_n_check ($here , '$html_str', $html_str);
    
    exiting_from_function ($here);
    
  return $html_str;
}

# exiting_from_module ($module);

?>