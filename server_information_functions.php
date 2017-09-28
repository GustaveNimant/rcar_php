<?php 

require_once "string_functions.php";
require_once "management_functions.php";

$module = "server_information_functions";
entering_in_module ($module);

/* $ser_rel_pat = "/php_server"; */
/* $ser_abs_pat = "/keep/sources/php_server"; */
/* $src_rel_pat = "/php_irp"; */
/* $src_abs_pat = "/keep/sources/php_irp"; */

function server_absolute_path () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $cwd = getcwd ();

  $home = getenv ('HOME');
  $path_parts = pathinfo($home);

echo "dirname ", $path_parts['dirname'], "\n";

  exiting_from_function ($here);
  
  return $ser_abs_pat;
}

function server_relative_web_path () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  exiting_from_function ($here);
  
  return $ser_rel_pat;
}

function source_absolute_path () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  exiting_from_function ($here);
  
  return $ser_abs_pat;
}

function source_relative_web_path () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  exiting_from_function ($here);
  
  return $ser_rel_pat;
}

exiting_from_module ($module);
?>