<?php

require_once "array_functions.php";
require_once "item_modify_save_functions.php";
require_once "file_functions.php";
require_once "debug_functions.php";
require_once "button_submit_functions.php";
require_once "irp_functions.php";
require_once "bubble_functions.php";

$module = "item_content_by_item_name_array_functions";
# entering_in_module ($module);

$irp_register = $_SESSION['irp_register'];
debug ($module, 'SESSION irp_register', $irp_register);

function item_content_formatting_of_item_content ($con_ite) {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $con_ite_for = str_replace('  ', '<br> ', $con_ite);

  debug ($here , "output item formatted", $con_ite_for);
  exiting_from_function ($here);

  return $con_ite_for;
}

function item_content_by_item_name_array_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_name', $here);
  $nam_ite_a = irp_provide ('item_name_array', $here); /* Use exception*/

/* Use exception*/

  if (is_empty_of_array ($nam_ite_a)) {
    $con_by_nam_ite_a = array ();
  }
  else {
    $hdir = specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);
    debug_n_check ($here , "hdir", $hdir);

    global $item_text_filename_extension;
    $ext_txt = $item_text_filename_extension;

    foreach ($nam_ite_a as $nam_ite) {
      $fnof_txt = $hdir . $nam_ite . '.' .  $ext_txt;

/* Read Item_content from Disk */      
      $con_ite = file_content_read ($fnof_txt);

      if (is_empty_of_string ($con_ite)) {
	fatal_error ($here, "item >$nam_ite< has an EMPTY content");
      }
      
      $con_ite_for = item_content_formatting_of_item_content ($con_ite);
      /* $con_ite =  item_content_filtered_after_ckeditor_of_string ($con_ite) */;
      
      $con_by_nam_ite_a[$nam_ite] = $con_ite_for;
    }
  }
  
  # debug ($here , "output item_content_by_item_name_array", $con_by_nam_ite_a);
  exiting_from_function ($here);

  return $con_by_nam_ite_a;
};
# exiting_from_module ($module);
?>
