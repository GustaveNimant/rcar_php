<?php

require_once "file_functions.php";

$module = "entry_name_array_functions";
# entering_in_module ($module);

function entry_name_array_update_n_sort ($old_nam_ent, $new_nam_ent, $old_nam_ent_a) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($old_nam_ent, $new_nam_ent, \$old_nam_ent_a)");

  # debug_n_check ($here , '$old_nam_ent_a', $old_nam_ent_a);

  $old_key_ent = array_retrieve_key_of_value ($old_nam_ent, $old_nam_ent_a, $here);
  $new_nam_ent_a = $old_nam_ent_a;
  $new_nam_ent_a[$old_key_ent] = $new_nam_ent;
  sort ($new_nam_ent_a);

  # debug_n_check ($here , '$new_nam_ent_a', $new_nam_ent_a);
  exiting_from_function ($here);

  return $new_nam_ent_a;
}

function entry_name_array_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
  $cpu_in = entering_withcpu_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $hpse_dir = basic_directory_of_name ("hd_php_server");

  $fil_a = scandir ($hpse_dir);
  if (! $fil_a) {
    fatal_error ($here, "directory >" . $hpse_dir . "< is inaccessible or empty");
  }
 
#  debug_n_check ($here, "directory", $hpse_dir);
#  # debug_n_check ($here , "list of files", $fil_a);

/* Clean names */
  $nam_ent_a = preg_grep ("/^[A-Z][a-z_]*[a-z]$/", $fil_a);
  # debug_n_check ($here, '$nam_ent_a', $nam_ent_a);

  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);
  surname_by_name_array_check_are_surnamed_of_nameofarray_of_current_array ('entry_name_array', $nam_ent_a, $sur_by_nam_a, $lan);
  check_is_array_unique_of_nameofarray_of_array ('entry_name_array', $nam_ent_a);

  # debug_n_check ($here, '$nam_ent_a', $nam_ent_a);
  exiting_from_function ($here);
  exiting_withcpu_from_function ($here, $cpu_in);

  return $nam_ent_a;
}

# exiting_from_module ($module);

?>