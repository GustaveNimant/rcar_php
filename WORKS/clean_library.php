<?php

require_once "array_library.php";
require_once "file_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function clean () {
  $here = __FUNCTION__;
  entering_in_function ($here);
  
  print 'entering in '. $here . ': SESSION<hr><pre> ';
  print_r ($_SESSION);
  print '</pre> ';
  
  /* nothing before date */
  unlink ("debug");
  unset ($_SESSION['PHPSESSID']); /* left */
  unset ($_COOKIE['PHPSESSID']);  /* left */
  $log_str  = 'PHPSESSID has been removed from $_SESSION' . "\n";
  $log_str .= 'PHPSESSID has been removed from $_COOKIE' . "\n";
  file_log_write ($here, $log_str);

  print 'SESSION<hr><pre> ';
  print_r ($_SESSION);
  print '</pre> ';
  
  $today = today();

  /* create debug file with today date at top */
  /* debug ($here, "", $today . "\n"); */
  /* git_status_check (); */

  exiting_from_function ($here);
  return;
};

exiting_from_module ($module);