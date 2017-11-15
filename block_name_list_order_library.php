<?php

require_once "block_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is a string as a list of block names separated by a blank";
$Documentation[$module]['remark'] = "the order of the block names is defined by the user it is a FILE_CONTENT";
$Documentation[$module]['not irp_provided'] = "the order of the block names is never kept in irp_register";
$Documentation[$module]['READ_'] = "READ_block_name_list_order";
$Documentation[$module]['WRITE_'] = "WRITE_block_name_list_order";

entering_in_module ($module);

function block_name_list_order_fullnameoffile_of_entry_name ($nam_ent) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent)");

  $dir = file_specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);
  $ext_nam_blo_lis = $_SESSION['parameters']['extension_block_name_list_order_filename'];
  $fno_nam_blo_lis = $dir . 'Block_name_list_order.' . $ext_nam_blo_lis;

  debug_n_check ($here , '$fno_nam_blo_lis', $fno_nam_blo_lis);
  exiting_from_function ($here);

  return $fno_nam_blo_lis;
}

function block_name_list_order_remove_block_name_of_entry_name_of_block_name_list_order_of_block_current_name ($nam_ent, $nam_blo_lis, $nam_blo) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent, $nam_blo_lis, $nam_blo)"); 

  $str = preg_replace('/\b'. $nam_blo . '\b/', "", $nam_blo_lis);
  $nam_blo_lis_new = str_replace("  ", " ", $str);

  debug_n_check ($here , '$nam_blo_lis_new', $nam_blo_lis_new);

  exiting_from_function ($here);

  return $nam_blo_lis_new;
}

function block_name_list_order_read_of_entry_name ($nam_ent) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent)");

  $dir_pat = file_specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);
  $ext_nam_blo_lis = $_SESSION['parameters']['extension_block_name_list_order_filename'];
  $fno_nam_blo_lis = $dir_pat . 'Block_name_list_order.' . $ext_nam_blo_lis;

  $str = file_content_read_of_fullnameoffile ($fno_nam_blo_lis);
  $nam_blo_lis = trim ($str, " \t\n\r\0\x0B");

  $log_str = "block_name_list_order read from $fno_nam_blo_lis";
  file_log_write ($here, $log_str);

  exiting_from_function ($here . " with \$nam_blo_lis >$nam_blo_lis<");

  return $nam_blo_lis;
};

function block_name_list_order_of_block_name_list_order_current ($nam_blo_a){
  $here = __FUNCTION__;
  entering_in_function ($here);

  array_check_is_empty_of_what_of_array_of_where ('block_name_list_order_current', $nam_blo_a, $here);

  $glue = $_SESSION['parameters']['glue'];
  $str = implode ($glue, $nam_blo_a);
  $nam_blo_lis = trim ($str, " \t\n\r\0\x0B");

  exiting_from_function ($here . " with \$nam_blo_lis >$nam_blo_lis<");

  return $nam_blo_lis;
}

function block_name_list_order_write_of_entry_name_of_block_name_list_order ($nam_ent, $nam_blo_lis){
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent, $nam_blo_lis)");
  
  $fno_nam_blo_lis = block_name_list_order_fullnameoffile_of_entry_name ($nam_ent);
  file_string_write ($fno_nam_blo_lis, $nam_blo_lis);

  $log_str = "block_name_list_order written as $fno_nam_blo_lis";

  exiting_from_function ($here . " ($nam_ent, $nam_blo_lis)");
  return $log_str;
}

exiting_from_module ($module);

?>