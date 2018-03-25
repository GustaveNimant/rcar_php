<?php

require_once "directory_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function entry_name_array_update_n_sort_of_old_of_new_of_array ($old_nam_ent, $new_nam_ent, $old_nam_ent_a) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($old_nam_ent, $new_nam_ent, \$old_nam_ent_a)");

  debug_n_check ($here , '$old_nam_ent_a', $old_nam_ent_a);

  $old_key_ent = array_retrieve_only_key_of_value_of_array_of_where ($old_nam_ent, $old_nam_ent_a, $here);
  debug_n_check ($here , '$old_key_ent', $old_key_ent);
  $new_nam_ent_a = $old_nam_ent_a;
  $new_nam_ent_a[$old_key_ent] = $new_nam_ent;
  sort ($new_nam_ent_a);

  debug_n_check ($here , '$new_nam_ent_a', $new_nam_ent_a);
  exiting_from_function ($here);

  return $new_nam_ent_a;
}

function entry_fullnameofdirectory_array_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $dir_pat = file_basic_directory_of_name ("hd_php_server");
  if (file_directory_is_empty_of_directory_path ($dir_pat)) {
      print_fatal_error ($here, 
      "directory >" . $dir_pat . "< were not EMPTY",
      "it is EMPTY",
      "Check why");
  }

  $fnd_a = fullnameoffile_array_of_directory_path ($dir_pat); 

  $entity = entity_name_of_build_function_name ($here);
  father_n_son_stack_entity_push_of_father_of_son ($entity, "READ_$entity");

  exiting_from_function ($here);
  return $fnd_a;
}

function entry_name_array_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $fnd_a = irp_provide ('entry_fullnameofdirectory_array', $here); 

/* Extract Entry names array */
  $nam_ent_a = preg_grep ("/^[A-Z][a-z_]*[a-z]$/", $fnd_a);

  $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here);
  surname_by_name_hash_check_are_surnamed_of_what_of_name_array_of_current_hash ('entry_name_array', $nam_ent_a, $sur_by_nam_h);
  check_is_array_unique_of_what_of_array ('entry_name_array', $nam_ent_a);

  exiting_from_function ($here);
  return $nam_ent_a;
}

exiting_from_module ($module);

?>