<?php

require_once "array_functions.php";
require_once "file_functions.php";
require_once "git_command_functions.php";

$module = "clean_functions";
# entering_in_module ($module);

function clean () {
  $here = __FUNCTION__;
  entering_in_function ($here);
  
print 'entering in '. $here . ': SESSION<hr><pre> ';
print_r ($_SESSION);
print '</pre> ';

  /* nothing before date */
  unlink ("debug");
  unset ($_SESSION['PHPSESSID']);
  unset ($_COOKIE['PHPSESSID']);

  print 'SESSION<hr><pre> ';
  print_r ($_SESSION);
  print '</pre> ';
  
  $today = today();
  

  /* create debug file with today date at top */
  /* debug ($here, "", $today . "\n"); */
  /* git_status_check (); */

};

# exiting_from_module ($module);