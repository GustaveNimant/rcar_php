<?php
require_once "entry_type_catalog_library.php";
require_once "entry_type_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is an array equivalent to the entry_type_catalog";
$Documentation[$module]['what for'] = "to ...";

function entry_type_by_entry_name_hash_keysort ($sur_by_nam_h) {
  $here = __FUNCTION__;
  entering_in_function ($here . ' ( ...$sur_nam_a)');

  ksort ($sur_by_nam_h);

  exiting_from_function ($here);

  return $sur_by_nam_h;
}


function entry_type_by_entry_name_hash_of_entry_type_catalog ($str_sur) {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $unser_a = array_by_key_unserialize_of_separator_of_string (" : ", $str_sur);
  debug_n_check ($here , '$unser_a', $unser_a);
  # check_is_array_unique_of_what_of_hash ('entry_type_by_entry_name_hash', $unser_a);

  $sur_by_nam_h = array_filter ($unser_a); /* takes off blanks nulls etc ... */

  /* foreach ($sur_by_nam_h as $nam => $sur ) { */
  /*     entry_type_check_couple_consistency_of_name_of_entry_type ($nam, $sur); */
  /* } */

  $sur_by_nam_h = entry_type_by_entry_name_hash_keysort ($sur_by_nam_h);

  debug_n_check ($here , '$sur_by_nam_h', $sur_by_nam_h);
  exiting_from_function ($here);

  return $sur_by_nam_h;

}

function entry_type_by_entry_name_hash_put_of_entry_name_of_entry_type_of_current_array ($nam, $sur_nam, $sur_by_nam_h) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam, $sur_nam)");

  string_check_is_not_empty_of_what_of_where_of_string ("???", $here, $nam);
  string_check_is_not_empty_of_what_of_where_of_string ("???", $here, $sur_nam);
  # debug_n_check ($here , '$sur_by_nam_h', $sur_by_nam_h);

  $sur_by_nam_h [$nam] = $sur_nam;
  $sur_by_nam_h = entry_type_by_entry_name_hash_keysort ($sur_by_nam_h);

  # debug_n_check ($here , '$sur_by_nam_h', $sur_by_nam_h);
  exiting_from_function ($here);

  return $sur_by_nam_h;
}

function entry_type_by_entry_name_hash_add_n_write_of_entry_name_of_entry_type_of_current_hash ($nam_ent, $typ_ent, $old_typ_ent_by_nam_ent_h) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent, $typ_ent, \$old_typ_ent_by_nam_ent_h [...])");

  string_check_is_not_empty_of_what_of_where_of_string ("???", $here, $nam_ent);
  string_check_is_not_empty_of_what_of_where_of_string ("???", $here, $typ_ent);

  if (array_key_exists ($nam_ent, $old_typ_ent_by_nam_ent_h)) {

      $old_typ_ent = $old_typ_ent_by_nam_ent_h[$nam_ent];
      if ($old_typ_ent <> $typ_ent) {
          warning ($here, 
          "name >$nam_ent< does NOT already exists in array with old entry_type >$old_typ_ent<",
          "old entry_type >$old_typ_ent< exists and differs from new one >$typ_ent<",
          "old entry_type is replaced by new one in Entry_Type catalog");
          $old_typ_ent_by_nam_ent_h[$nam_ent] = $typ_ent;
      }

      $new_typ_ent_by_nam_ent_h = $old_typ_ent_by_nam_ent_h; /* Improve ??? */
  }
  else {
      $new_typ_ent_by_nam_ent_h = entry_type_by_entry_name_hash_put_of_entry_name_of_entry_type_of_current_array ($nam_ent, $typ_ent, $old_typ_ent_by_nam_ent_h);
  }

  irp_store_force ('entry_type_by_entry_name_hash', $new_typ_ent_by_nam_ent_h, 'entry_current_display', $here);

  entry_type_catalog_write_of_entry_type_by_entry_name_hash ($new_typ_ent_by_nam_ent_h);

  exiting_from_function ($here);

  return $new_typ_ent_by_nam_ent_h;
}

function entry_type_by_entry_name_hash_replace_n_write_of_entry_name_of_entry_typenew_of_current_hash ($nam_ent, $new_sur_nam, $sur_by_nam_h) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent, $new_sur_nam, \$sur_by_nam_h [...])");

  string_check_is_not_empty_of_what_of_where_of_string ("???", $here, $nam_ent);
  string_check_is_not_empty_of_what_of_where_of_string ("???", $here, $new_sur_nam);

  if ($new_sur_nam <> ucfirst($new_sur_nam)){
      $new_sur_nam = ucfirst($new_sur_nam);
  }

  /* $sur_by_nam_h = entry_type_by_entry_name_hash_make (); */
  # debug_n_check ($here , ' ICI ? $sur_by_nam_h', $sur_by_nam_h);
  
  $sur_by_nam_h = entry_type_by_entry_name_hash_put_of_entry_name_of_entry_type_of_current_array ($nam_ent, $new_sur_nam, $sur_by_nam_h);
 
#  debug_n_check ($here , '$sur_by_nam_h[' . $nam_ent . ']', $sur_by_nam_h[$nam_ent]);

  entry_type_catalog_write_of_entry_type_by_entry_name_hash ($sur_by_nam_h);

  if (file_is_entry_nameoffile_of_string ($nam_ent)) { 
      irp_store_force ('entry_current_entry_type', $new_sur_nam, 'entry_current_display', $here);
  }
  else {
      irp_store_force ('block_current_entry_type', $new_sur_nam, 'entry_current_display', $here);
  }

  irp_store_force ('entry_type_by_entry_name_hash', $sur_by_nam_h, 'entry_current_display', $here);

  exiting_from_function ($here . " ($nam_ent, $new_sur_nam, \$sur_by_nam_h [...])");
  return;
}

function entry_type_by_entry_name_hash_check_are_entry_typed_of_entry_name_of_array_of_current_array ($nam_ent_arr, $nam_ent_a, $sur_by_nam_h) {
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
                  warning ($here, "Array >$nam_arr< NO entry_type for name >$nam<");
                  irp_store_force ('name_without_entry_type', $nam, 'entry_current_display');
                  exiting_from_function ($here);
                  include 'entry_type_catalog_add_script.php';
                  exit;
              }
          }
      }
  }
  
  exiting_from_function ($here);
  return;
}


?>