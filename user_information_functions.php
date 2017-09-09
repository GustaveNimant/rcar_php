<?php 
# "License : This code is available under the Creative Commons License https://creativecommons.org/licenses/by-sa/3.0/legalcode.fr";

require_once "string_functions.php";
require_once "management_functions.php";

$module = "user_information_functions";
# entering_in_module ($module);

function user_information_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $usr_ip = $_SERVER['REMOTE_ADDR'];
  debug_n_check ($here , "output user ip", $usr_ip);

  $dat = today (); 

  $usr_inf  = '';
  $usr_inf .= language_translate_of_en_string_of_language ('done by', $lan);
  $usr_inf .= ' ' . $usr_ip . ' ';
  $usr_inf .= language_translate_of_en_string_of_language ('on', $lan);
  $usr_inf .= ' ' . $dat . ' ';
 
  debug_n_check ($here , "output user information", $usr_inf);
  exiting_from_function ($here);
  
  return $usr_inf;
}

function who_made_a_change () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  exiting_from_function ($here);
}

# exiting_from_module ($module);

?>