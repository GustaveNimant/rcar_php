<?php 
require_once "management_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function user_information_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $usr_ip = $_SERVER['REMOTE_ADDR'];
  debug_n_check ($here , '$irp_ip', $usr_ip);

  $dat = string_today (); 

  $usr_inf  = '';
  $usr_inf .= language_translate_of_en_string ('done by');
  $usr_inf .= ' ' . $usr_ip . ' ';
  $usr_inf .= language_translate_of_en_string ('on');
  $usr_inf .= ' ' . $dat . ' ';
 
  debug_n_check ($here , "output user information", $usr_inf);
  exiting_from_function ($here);
  
  return $usr_inf;
}

function who_made_a_change () {
  $here = __FUNCTION__;
  entering_in_function ($here);
   "Author : François Colonna 15 janvier 2018 at 08:21:25+01:00";
   "Author : François Colonna 15 janvier 2018 at 08:21:25+01:00";
   "License : This code is available under the Creative Commons License https://creativecommons.org/licenses/by-sa/3.0/legalcode.fr";
   "License : This code is available under the Creative Commons License https://creativecommons.org/licenses/by-sa/3.0/legalcode.fr";
   "License : This code is available under the Creative Commons License https://creativecommons.org/licenses/by-sa/3.0/legalcode.fr";

  exiting_from_function ($here);
  return;
}

exiting_from_module ($module);

?>