<?php

require_once "array_functions.php";
require_once "common_html_functions.php";
require_once "language_translate_functions.php";
require_once "irp_functions.php";
require_once "file_functions.php";

$module = "entry_functions";
# entering_in_module ($module);

function entry_subdirectory_name_of_entry_name ($nam_ent) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent)");

  string_check_entry_name_of_string ($nam_ent);

  $dir_bas = basic_directory_of_name ("hd_php_server");
  $fnd = $dir_bas . $nam_ent;
  debug_n_check ($here , '$fnd', $fnd);

  exiting_from_function ($here);
  return $fnd;

};

function entry_subdirectory_create_of_subdirectory_name ($fnd) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($fnd)");

  if (! file_exists ($fnd)) {
      mkdir ($fnd, 0777);
  }
  else {
      print_fatal_error (
          $here,
          "subdirectory >$fnd< did not exist",
          "it DOES exist",
          "Check why"
      );
  }  

  exiting_from_function ($here);
  return;
};

# exiting_from_module ($module);

?>