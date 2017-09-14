<?php

require_once "management_functions.php";
require_once "irp_functions.php";
require_once "array_functions.php";
require_once "surname_catalog_functions.php";

$module = "surname_by_name_array_functions";
# entering_in_module ($module);

$Documentation[$module]['surname_by_name_array'] = "it is an array equivalent to the surname_catalog";
# "License : This code is available under the Creative Commons License https://creativecommons.org/licenses/by-sa/3.0/legalcode.fr";

function surname_by_name_array_keysort ($sur_by_nam_a) {
  $here = __FUNCTION__;
  entering_in_function ($here . ' ( ...$sur_nam_a)');

  ksort ($sur_by_nam_a);

  exiting_from_function ($here);

  return $sur_by_nam_a;
}


function surname_by_name_array_of_surname_catalog ($str_sur) {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $unser_a = array_by_key_unserialize_of_separator_of_string (" : ", $str_sur);
  # debug_n_check ($here , '$unser_a', $unser_a);
  check_is_array_unique_of_nameofarray_of_associative_array ('surname_by_name_array', $unser_a);

  $sur_by_nam_a = array_filter ($unser_a);

  foreach ($sur_by_nam_a as $nam => $sur ) {
      check_couple_consistency_of_name_of_surname ($nam, $sur);
  }

  $sur_by_nam_a = surname_by_name_array_keysort ($sur_by_nam_a);

  # debug_n_check ($here , '$sur_by_nam_a', $sur_by_nam_a);
  exiting_from_function ($here);

  return $sur_by_nam_a;

}

function surname_by_name_array_make () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $str_sur = surname_catalog_read ();
  $sur_by_nam_a = surname_by_name_array_of_surname_catalog ($str_sur);

  # debug_n_check ($here , '$sur_by_nam_a', $sur_by_nam_a);
  exiting_from_function ($here);

  return $sur_by_nam_a;

}

function surname_by_name_array_delete_of_nameofarray_of_array__ ($nam, $sur_by_nam_a) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam)");

  unset ($sur_by_nam_a[$nam]);

  # debug_n_check ($here , '$sur_by_nam_a', $sur_by_nam_a);
  exiting_from_function ($here);

  return $sur_by_nam_a;
}

function surname_by_name_array_put_of_name_of_surname_of_current_array ($nam, $sur_nam, $sur_by_nam_a) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam, $sur_nam)");

  check_is_empty_of_here_of_string ($here, $nam);
  check_is_empty_of_here_of_string ($here, $sur_nam);
  # debug_n_check ($here , '$sur_by_nam_a', $sur_by_nam_a);

  $sur_by_nam_a [$nam] = $sur_nam;
  $sur_by_nam_a = surname_by_name_array_keysort ($sur_by_nam_a);

  # debug_n_check ($here , '$sur_by_nam_a', $sur_by_nam_a);
  exiting_from_function ($here);

  return $sur_by_nam_a;
}

function surname_by_name_array_add_n_write_of_name_of_surname_of_current_array ($nam, $sur_nam, $old_sur_by_nam_a) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam, $sur_nam, \$old_sur_by_nam_a [...])");

  check_is_empty_of_here_of_string ($here, $nam);
  check_is_empty_of_here_of_string ($here, $sur_nam);
  # debug_n_check ($here , '$old_sur_by_nam_a', $old_sur_by_nam_a);

  if ($sur_nam <> ucfirst($sur_nam)){
      $sur_nam = ucfirst($sur_nam);
  }

  if (array_key_exists ($nam, $old_sur_by_nam_a)) {

      $old_sur = $old_sur_by_nam_a[$nam];
      if ($old_sur <> $sur_nam) {
          print_fatal_error ($here, 
          "name >$nam< already exists in array with old surname >$old_sur<",
          "old surname >$old_sur< differs from new one >$sur_nam<",
          "correct by hand file SURNAMES/Surname_catalog.cat");
      }

      $new_sur_by_nam_a = $old_sur_by_nam_a; 
  }
  else {
      $new_sur_by_nam_a = surname_by_name_array_put_of_name_of_surname_of_current_array ($nam, $sur_nam, $old_sur_by_nam_a);
  }
  

  irp_store_force ('surname_by_name_array', $new_sur_by_nam_a, 'entry_display');
  surname_catalog_write_of_surname_by_name_array ($new_sur_by_nam_a);

  exiting_from_function ($here);

  return $new_sur_by_nam_a;
}

function surname_by_name_array_replace_n_write_of_name_of_newsurname_of_current_array ($nam, $new_sur_nam, $sur_by_nam_a) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam, $new_sur_nam, \$sur_by_nam_a [...])");

  check_is_empty_of_here_of_string ($here, $nam);
  check_is_empty_of_here_of_string ($here, $new_sur_nam);

  if ($new_sur_nam <> ucfirst($new_sur_nam)){
      $new_sur_nam = ucfirst($new_sur_nam);
  }

  /* $sur_by_nam_a = surname_by_name_array_make (); */
  # debug_n_check ($here , ' ICI ? $sur_by_nam_a', $sur_by_nam_a);
  
  $sur_by_nam_a = surname_by_name_array_put_of_name_of_surname_of_current_array ($nam, $new_sur_nam, $sur_by_nam_a);
 
  debug_n_check ($here , '$sur_by_nam_a[' . $nam . ']', $sur_by_nam_a[$nam]);

  surname_catalog_write_of_surname_by_name_array ($sur_by_nam_a);

  if (file_is_entry_nameoffile_of_string ($nam)) { 
      irp_store_force ('entry_surname', $new_sur_nam, 'entry_display');
  }
  else {
      irp_store_force ('block_surname', $new_sur_nam, 'entry_display');
  }

  irp_store_force ('surname_by_name_array', $sur_by_nam_a, 'entry_display');

  exiting_from_function ($here);

  return;
}

function surname_by_name_array_check_are_surnamed_of_nameofarray_of_current_array ($nam_arr, $nam_a, $sur_by_nam_a) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_arr, \$nam_a, \$sur_by_nam_a)");

  # debug_n_check ($here , '$sur_by_nam_a', $sur_by_nam_a);

  foreach ($nam_a as $k => $nam) {

      if (! is_empty_of_string ($nam)) { /* Improve */

          $sur = $sur_by_nam_a[$nam];

          debug ($here , '$nam', ">$nam<");
          debug ($here , '$sur', ">$sur<");
          
          if (is_empty_of_string ($sur)) {
              warning ($here, "Array >$nam_arr< NO surname for name >$nam<");
              irp_store_force ('name_without_surname', $nam, 'entry_display');
              exiting_from_function ($here);
              include 'surname_catalog_add.php';
              exit;
          }
          
      }
  }
  
  exiting_from_function ($here);
  return;
}

function surname_by_name_array_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $irp_key = 'surname_by_name_array';
  $sur_by_nam_a = surname_by_name_array_make ();
  father_n_son_stack_entity_push_of_father_of_son ($irp_key, 'READ');
    
  # debug_n_check ($here , '$sur_by_nam_a', $sur_by_nam_a);
  exiting_from_function ($here);

  return $sur_by_nam_a;

}

# exiting_from_module ($module);

?>