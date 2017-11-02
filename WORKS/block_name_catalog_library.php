<?php

require_once "block_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is a string as a list of block names separated by a blank";
$Documentation[$module]['remark'] = "the order of the block names is defined by the user";

entering_in_module ($module);

function block_name_catalog_fullnameoffile_of_entry_name ($nam_ent) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent)");

  $dir = file_specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);
  $ext_cat = $_SESSION['parameters']['extension_block_name_catalog_filename'];
  $fno_cat = $dir . 'Block_name_catalog.' . $ext_cat;

  debug_n_check ($here , '$fno_cat', $fno_cat);
  exiting_from_function ($here);

  return $fno_cat;
}

function block_name_catalog_remove_block_name_of_entry_name_of_block_name_catalog_of_block_current_name ($nam_ent, $cat_blo, $nam_blo) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent, $cat_blo, $nam_blo)"); 

  $str = preg_replace('/\b'. $nam_blo . '\b/', "", $cat_blo);
  $cat_blo_new = str_replace("  ", " ", $str);

  debug_n_check ($here , '$cat_blo_new', $cat_blo_new);

  exiting_from_function ($here);

  return $cat_blo_new;
}

function block_name_catalog_read_of_entry_name ($nam_ent) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent)");

  $dir_pat = file_specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);
  debug_n_check ($here , "directory path", $dir_pat);

  $ext_cat = $_SESSION['parameters']['extension_block_name_catalog_filename'];
  $hnof = $dir_pat . 'Block_name_catalog.' . $ext_cat;

  $str = file_content_read_of_fullnameoffile ($hnof);
  $cat_blo = trim ($str, " \t\n\r\0\x0B");

  exiting_from_function ($here . " with \$cat_blo >$cat_blo<");

  return $cat_blo;
};

function block_name_catalog_of_block_name_array ($nam_blo_a){
  $here = __FUNCTION__;
  entering_in_function ($here);

  array_check_is_empty_of_what_of_array_of_where ('block_name_array', $nam_blo_a, $here);

  $glue = $_SESSION['parameters']['glue'];
  $str = implode ($glue, $nam_blo_a);
  $cat_blo = trim ($str, " \t\n\r\0\x0B");

  exiting_from_function ($here . " with \$cat_blo >$cat_blo<");

  return $cat_blo;
}

function block_name_catalog_write_of_entry_name_of_block_name_catalog ($nam_ent, $cat_blo){
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent, $cat_blo)");
  
  $fno_cat = block_name_catalog_fullnameoffile_of_entry_name ($nam_ent);
  file_string_write ($fno_cat, $cat_blo);

  $log_str = "block_name_catalog_current written as $fno_cat";
  file_log_write ($here, $log_str);

  exiting_from_function ($here . " ($nam_ent, $cat_blo)");
  return;
}

exiting_from_module ($module);

?>