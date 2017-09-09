<?php

require_once "array_functions.php";
require_once "block_modify_save_functions.php";
require_once "file_functions.php";
require_once "block_create_functions.php";
require_once "debug_functions.php";
require_once "button_submit_functions.php";
require_once "irp_functions.php";
require_once "bubble_functions.php";

$module = "block_content_by_block_name_array_functions";
# entering_in_module ($module);

$irp_register = $_SESSION['irp_register'];
debug ($module, 'SESSION irp_register', $irp_register);

function block_content_formatting_of_block_content ($con_blo) {
  $here = __FUNCTION__;
  entering_in_function ($here);

# replace double space by <br>
  $con_blo_for = str_replace('  ', '<br> ', $con_blo);

  debug ($here , '$con_for_blo', $con_blo_for);
  exiting_from_function ($here);

  return $con_blo_for;
}

function block_content_by_block_name_array_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_name', $here);
  $nam_blo_a = irp_provide ('block_name_array', $here); /* Use exception*/

/* Use exception*/

  if (is_empty_of_array ($nam_blo_a)) {
    $con_by_nam_blo_a = array ();
  }
  else {
    $hdir = specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);
    debug_n_check ($here , "hdir", $hdir);

    $ext_blo = $_SESSION['parameters']['block_text_filename_extension'];

    $con_blo_by_nam_blo_a = array ();
    foreach ($nam_blo_a as $nam_blo) {
      $fno_blo = $hdir . $nam_blo . '.' .  $ext_blo;

/* Read Block_content from Disk */      
      $con_blo = file_content_read ($fno_blo);

      if (is_empty_of_string ($con_blo)) {
          fatal_error ($here, "block >$nam_blo< has an EMPTY content");
      }
      
      $con_blo_by_nam_blo_a[$nam_blo] = $con_blo;
    }
  }
  
  debug_n_check ($here , '$con_blo_by_nam_blo_a', $con_blo_by_nam_blo_a);
  exiting_from_function ($here);

  return $con_blo_by_nam_blo_a;
};

function block_content_formatted_by_block_name_array_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $con_by_nam_blo_a = irp_provide ('block_content_by_block_name_array', $here);

  $con_blo_for_by_nam_blo_a = array ();
  foreach ($con_by_nam_blo_a as $nam_blo => $con_blo) {
      $con_blo_for = block_content_formatting_of_block_content ($con_blo);
      /* $con_blo_for = block_content_filtered_after_ckeditor_of_string ($con_blo_for) */;
      $con_blo_for_by_nam_blo_a[$nam_blo] = $con_blo_for;
  }

  debug_n_check ($here , '$con_blo_for_by_nam_blo_a', $con_blo_for_by_nam_blo_a);
  exiting_from_function ($here);

  return $con_blo_for_by_nam_blo_a;
}

# exiting_from_module ($module);
?>
