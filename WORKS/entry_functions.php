<?php

require_once "array_library.php";
require_once "common_html_library.php";
require_once "language_translate_library.php";
require_once "irp_functions.php";
require_once "file_library.php";

$module = "entry_functions";
entering_in_module ($module);

function entry_subdirectory_name_of_entry_name ($nam_ent) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent)");

  string_check_entry_name_of_string ($nam_ent);

  $dir_bas = file_basic_directory_of_name ("hd_php_server");
  $fnd = $dir_bas . $nam_ent;
  debug_n_check ($here , '$fnd', $fnd);

  exiting_from_function ($here);
  return $fnd;

};

function entry_is_subdirectory_of_entry_name ($nam_ent) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent)");

  $fnd = entry_subdirectory_name_of_entry_name ($nam_ent);

  $boo = file_exists ($fnd);
  
  exiting_from_function ($here . ' is ' . string_of_boolean ($boo) );
  return $boo;
};

function entry_subdirectory_create_of_entry_name ($nam_ent) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent)");

  if ( ! (entry_is_subdirectory_of_entry_name ($nam_ent)) ) {
      $fnd = entry_subdirectory_name_of_entry_name ($nam_ent);
      
      if (mkdir ($fnd, 0777)) {
          $log_str = "Subdirectory $fnd created with rights 0777";
          file_log_write ($here, $log_str);
      }
      else {
          print_fatal_error (
              $here,
              "subdirectory >$fnd< were successfully created",
              "it does NOT",
              "Check why");
      }
  }
  else {
      print_fatal_error (
          $here,
          "subdirectory >$fnd< did NOT exist",
          "it DOES exist",
          "Check why");
  }  
  
  exiting_from_function ($here);
  return;
};

exiting_from_module ($module);

?>