<?php

require_once "file_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";
$Documentation[$module]['block_current_nameoffile'] = "block_current_name.blo";

entering_in_module ($module);

function block_current_nameoffile_array_read_of_entry_name ($nam_ent) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent)");

  $dir_pat = file_specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);
  debug_n_check ($here , '$dir_pat', $dir_pat);

  try {
      $nof_blo_a = file_array_of_directory_path_of_predicate ($dir_pat, "file_is_block_text_of_nameoffile");
      debug ($here , '$nof_blo_a', $nof_blo_a);
  } 
  catch (Exception $e) {  
      $mesc = $e->getMessage();
      if ( 
          ($mesc == "Directory exists and is empty") 
          || ($mesc == "No file found according to predicate in Directory") 
      ) {
          $log_str  = "Catch Exception with message : $mesc";
          file_log_write ($here, $log_str);

          $mest = "No Block file in Current Entry $nam_ent";
          $log_str = "Throw new Exception with message : $mest";
          file_log_write ($here, $log_str);
          
          exiting_from_function ($here . ' with Exception ' . $mest); 
          throw new Exception ($mest);
      }
  }

  $log_str  = "Block nameoffile array read from subdirectory $nam_ent";
  file_log_write ($here, $log_str);
  
  debug ($here , '$nof_blo_a', $nof_blo_a);
  exiting_from_function ($here);
  
  return $nof_blo_a;
}

function block_current_nameoffile_array_is_empty_of_entry_name ($nam_ent) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent)");

  $boo = FALSE;
  try {
      $nof_blo_a = block_current_nameoffile_array_read_of_entry_name ($nam_ent);      
  } 
  catch (Exception $e) {  
      $mesc = $e->getMessage();
      if ($mesc == "No Block file in Current Entry $nam_ent") {
          $log_str  = "Catch Exception with message : $mesc";
          file_log_write ($here, $log_str);
          $boo = TRUE;
      }
  }  
  
  exiting_from_function ($here . " is " . string_of_boolean ($boo));
  return $boo;
}

exiting_from_module ($module);

?>