<?php
require_once "surname_catalog_library.php";
require_once "surname_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is an array equivalent to the surname_catalog";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function surname_by_name_hash_keysort ($sur_by_nam_h) {
  $here = __FUNCTION__;
  entering_in_function ($here . ' ( ...$sur_nam_a)');

  ksort ($sur_by_nam_h);

  exiting_from_function ($here);

  return $sur_by_nam_h;
}


function surname_by_name_hash_of_surname_catalog ($str_sur) {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $unser_a = array_by_key_unserialize_of_separator_of_string (" : ", $str_sur);
  # debug_n_check ($here , '$unser_a', $unser_a);
  check_is_array_unique_of_what_of_hash ('surname_by_name_hash', $unser_a);

  $sur_by_nam_h = array_filter ($unser_a);

  foreach ($sur_by_nam_h as $nam => $sur ) {
      surname_check_couple_consistency_of_name_of_surname ($nam, $sur);
  }

  $sur_by_nam_h = surname_by_name_hash_keysort ($sur_by_nam_h);

  # debug_n_check ($here , '$sur_by_nam_h', $sur_by_nam_h);
  exiting_from_function ($here);

  return $sur_by_nam_h;

}

function surname_by_name_hash_put_of_name_of_surname_of_current_array ($nam, $sur_nam, $sur_by_nam_h) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam, $sur_nam)");

  string_check_is_empty_of_what_of_where_of_string ("???", $here, $nam);
  string_check_is_empty_of_what_of_where_of_string ("???", $here, $sur_nam);
  # debug_n_check ($here , '$sur_by_nam_h', $sur_by_nam_h);

  $sur_by_nam_h [$nam] = $sur_nam;
  $sur_by_nam_h = surname_by_name_hash_keysort ($sur_by_nam_h);

  # debug_n_check ($here , '$sur_by_nam_h', $sur_by_nam_h);
  exiting_from_function ($here);

  return $sur_by_nam_h;
}

function surname_by_name_hash_add_n_write_of_name_of_surname_of_current_hash ($nam, $sur_nam, $old_sur_by_nam_h) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam, $sur_nam, \$old_sur_by_nam_h [...])");

  string_check_is_empty_of_what_of_where_of_string ("???", $here, $nam);
  string_check_is_empty_of_what_of_where_of_string ("???", $here, $sur_nam);
  # debug_n_check ($here , '$old_sur_by_nam_h', $old_sur_by_nam_h);

  if ($sur_nam <> ucfirst($sur_nam)){
      $sur_nam = ucfirst($sur_nam);
  }

  if (array_key_exists ($nam, $old_sur_by_nam_h)) {

      $old_sur = $old_sur_by_nam_h[$nam];
      if ($old_sur <> $sur_nam) {
          warning ($here, 
          "name >$nam< does NOT already exists in array with old surname >$old_sur<",
          "old surname >$old_sur< exists and differs from new one >$sur_nam<",
          "old surname is replaced by new one in Surname catalog");
          $old_sur_by_nam_h[$nam] = $sur_nam;
      }

      $new_sur_by_nam_h = $old_sur_by_nam_h; /* Improve ??? */
  }
  else {
      $new_sur_by_nam_h = surname_by_name_hash_put_of_name_of_surname_of_current_array ($nam, $sur_nam, $old_sur_by_nam_h);
  }

  irp_store_force ('surname_by_name_hash', $new_sur_by_nam_h, 'entry_current_display', $here);

  surname_catalog_write_of_surname_by_name_hash ($new_sur_by_nam_h);

  exiting_from_function ($here);

  return $new_sur_by_nam_h;
}

function surname_by_name_hash_replace_n_write_of_name_of_surnamenew_of_current_hash ($nam, $new_sur_nam, $sur_by_nam_h) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam, $new_sur_nam, \$sur_by_nam_h [...])");

  string_check_is_empty_of_what_of_where_of_string ("???", $here, $nam);
  string_check_is_empty_of_what_of_where_of_string ("???", $here, $new_sur_nam);

  if ($new_sur_nam <> ucfirst($new_sur_nam)){
      $new_sur_nam = ucfirst($new_sur_nam);
  }

  /* $sur_by_nam_h = surname_by_name_hash_make (); */
  # debug_n_check ($here , ' ICI ? $sur_by_nam_h', $sur_by_nam_h);
  
  $sur_by_nam_h = surname_by_name_hash_put_of_name_of_surname_of_current_array ($nam, $new_sur_nam, $sur_by_nam_h);
 
#  debug_n_check ($here , '$sur_by_nam_h[' . $nam . ']', $sur_by_nam_h[$nam]);

  surname_catalog_write_of_surname_by_name_hash ($sur_by_nam_h);

  if (file_is_entry_nameoffile_of_string ($nam)) { 
      irp_store_force ('entry_current_surname', $new_sur_nam, 'entry_current_display', $here);
  }
  else {
      irp_store_force ('block_current_surname', $new_sur_nam, 'entry_current_display', $here);
  }

  irp_store_force ('surname_by_name_hash', $sur_by_nam_h, 'entry_current_display', $here);

  exiting_from_function ($here . " ($nam, $new_sur_nam, \$sur_by_nam_h [...])");
  return;
}

function surname_by_name_hash_check_are_surnamed_of_nameofarray_of_current_array ($nam_arr, $nam_a, $sur_by_nam_h) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_arr, \$nam_a, \$sur_by_nam_h)");

  # debug_n_check ($here , '$sur_by_nam_h', $sur_by_nam_h);

  foreach ($nam_a as $k => $nam) {

      if ( isset ($nam)) { /* Improve */
          if ( (! string_is_empty_of_string ($nam)) 
          && ( isset ($sur_by_nam_h[$nam])) ) { /* Improve */
              
              $sur = $sur_by_nam_h[$nam];
              
#             debug ($here , '$nam', ">$nam<");
#             debug ($here , '$sur', ">$sur<");
              
              if (string_is_empty_of_string ($sur)) {
                  warning ($here, "Array >$nam_arr< NO surname for name >$nam<");
                  irp_store_force ('name_without_surname', $nam, 'entry_current_display');
                  exiting_from_function ($here);
                  include 'surname_catalog_add_script.php';
                  exit;
              }
          }
      }
  }
  
  exiting_from_function ($here);
  return;
}

exiting_from_module ($module);

?>