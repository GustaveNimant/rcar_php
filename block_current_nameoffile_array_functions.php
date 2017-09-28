<?php

require_once "array_functions.php";
require_once "block_modify_save_functions.php";
require_once "common_html_functions.php";
require_once "file_functions.php";

$module = "block_current_nameoffile_array_functions";
entering_in_module ($module);

$Documentation[$module]['block_current_nameoffile'] = "block_current_name.blo";

function block_current_nameoffile_array_read_of_entry_name ($nam_ent) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent)");

  $dir_pat = specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);
  debug_n_check ($here , '$dir_pat', $dir_pat);

  $nof_blo_a = file_array_of_directory_path_of_predicate ($dir_pat, "file_is_block_text_of_nameoffile");

  debug ($here , '$nof_blo_a', $nof_blo_a);
  exiting_from_function ($here);
  
  return $nof_blo_a;
}

function block_current_nameoffile_array_is_empty_of_entry_name ($nam_ent) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent)");

  $nof_blo_a = block_current_nameoffile_array_read_of_entry_name ($nam_ent);
  $boo = array_is_empty_of_array ($nof_blo_a) ;
  
  debug ($here , '$boo', $boo);
  exiting_from_function ($here);
  
  return $boo;
}

function block_current_nameoffile_array_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_name', $here);

  if (block_current_nameoffile_array_is_empty_of_entry_name ($nam_ent) ) {
      $mest = "Value is empty in function block_current_nameoffile_array_is_empty_of_entry_name for Entry name $nam_ent";
      debug ($here , 'Throw new Exception with message', $mest);
      exiting_from_function ($here . ' with ' . $mest);
      throw new Exception ($mest);
  }
  else {
      $nof_blo_a = block_current_nameoffile_array_read_of_entry_name ($nam_ent);
      debug ($here , '$nof_blo_a', $nof_blo_a);
  }

  debug ($here ,'$nof_blo_a', $nof_blo_a);
  exiting_from_function ($here);
  
  return $nof_blo_a;
}

exiting_from_module ($module);

?>