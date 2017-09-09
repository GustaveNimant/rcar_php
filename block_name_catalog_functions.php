<?php

/*  */
require_once "array_functions.php";
require_once "file_functions.php";
require_once "block_nameoffile_array_functions.php";

require_once "irp_functions.php";

$module = "block_name_catalog_functions";
# entering_in_module ($module);

$Documentation[$module]['block_name_array'] = "it is an array of block names";
$Documentation[$module]['block_name_catalog'] = "it is a string as a list of block names separated by a space";
$Documentation[$module]['block_name_catalog'] = "the order is defined";

function block_name_catalog_fullnameoffile_of_entry_name ($nam_ent) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent)");

  $dir = specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);

  $ext_cat = $_SESSION['parameters']['block_name_catalog_filename_extension'];
  debug_n_check ($here , '$ext_cat', $ext_cat);

  $fno_cat = $dir . 'Block_name_catalog.' . $ext_cat;

  debug_n_check ($here , '$fno_cat', $fno_cat);
  exiting_from_function ($here);

  return $fno_cat;
}

function block_name_catalog_delete_of_entry_name_of_block_name_catalog_of_block_name ($nam_ent, $cat_blo, $nam_blo) {
  $here = __FUNCTION__;
  entering_in_function ($here . "($nam_ent, $cat_blo, $nam_blo)"); 

  $str = preg_replace('/\b'. $nam_blo . '\b/', "", $cat_blo);
  $cat_blo_new = str_replace("  ", " ", $str);

  debug_n_check ($here , '$cat_blo_new', $cat_blo_new);

  exiting_from_function ($here);

  return $cat_blo_new;
}


function block_name_catalog_read_of_entry_name ($nam_ent) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent)");

  $dir_pat = specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);
  debug_n_check ($here , "directory path", $dir_pat);

  $ext_cat = $_SESSION['parameters']['block_name_catalog_filename_extension'];
  $hnof = $dir_pat . 'Block_name_catalog.' . $ext_cat;

  $str = file_content_read ($hnof);
  $cat_blo = trim ($str, " \t\n\r\0\x0B");
  debug_n_check ($here , "after trim string", $cat_blo);

  debug ($here , '$cat_blo', $cat_blo);
  exiting_from_function ($here);

  return $cat_blo;
};

function block_name_catalog_of_block_name_array ($nam_blo_a){
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_blo_a[0], ...)");

  $glue = $_SESSION['parameters']['glue'];
  debug_n_check ($here , "glue", $glue);
  $str = implode ($glue, $nam_blo_a);
  $cat_blo = trim ($str, " \t\n\r\0\x0B");

  debug ($here , '$cat_blo', $cat_blo);
  exiting_from_function ($here);

  return $cat_blo;
}

function block_name_catalog_write_of_entry_name_of_block_name_catalog ($nam_ent, $cat_blo){
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent, $cat_blo)");
  
  $fno_cat = block_name_catalog_fullnameoffile_of_entry_name ($nam_ent);
  file_string_write ($fno_cat, $cat_blo);
  
  exiting_from_function ($here);
  return;
}

function block_name_catalog_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_name', $here);
  $fno_cat = block_name_catalog_fullnameoffile_of_entry_name ($nam_ent);
  debug_n_check ($here , '$fno_cat', $fno_cat);

  if (file_exists ($fno_cat)) {
      
      $cat_blo = block_name_catalog_read_of_entry_name ($nam_ent);  
      
  } else {
      try {
          $nof_blo_a = irp_provide ('block_nameoffile_array', $here);
      } 
      catch (Exception $e) {  
          $mesc = $e->getMessage();
          if ($mesc = "Value is empty in function block_nameoffile_array_build:for Entry name $nam_ent") {
              debug ($here, 'Catch Exception with message', $mesc);
              $mest = "Catalog is empty in function block_name_catalog_build for Entry name $nam_ent";
              debug ($here, 'Throw new Exception with message', $mest);
              exiting_from_function ($here . ' with ' . $mest); 
              throw new Exception ($mest);
          }
      }
      
      # debug_n_check ($here , '$nof_blo_a', $nof_blo_a);

      $nam_blo_a = array_map ("cut_dotted_3c_extension_of_nameoffile", $nof_blo_a);
      check_is_array_unique_of_nameofarray_of_array ('block_name_array', $nam_blo_a);
      $cat_blo = block_name_catalog_of_block_name_array ($nam_blo_a);

  }
  
  debug ($here , '$cat_blo', $cat_blo);
  exiting_from_function ($here . " ('$cat_blo', $cat_blo)");
  
  return $cat_blo;
  
}

# exiting_from_module ($module);

?>