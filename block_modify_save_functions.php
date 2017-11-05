<?php

require_once "management_library.php";
require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function block_modify_save_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  /* debug_n_check ($here,'$_GET', $_GET); */

  $nam_ent = irp_provide ('entry_current_name', $here);
  $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here);
  $sur_ent = surname_of_name_of_surname_by_name_hash ($nam_ent, $sur_by_nam_h);
  $nam_blo = irp_provide ('block_current_name', $here);
  $con_blo = irp_provide ('block_content', $here);

  debug_n_check ($here, '$nam_ent', $nam_ent);

  $ext_blo = $_SESSION['parameters']['extension_block_filename'];
  block_any_text_write ('block_content', $nam_ent, $nam_blo, $con_blo, $ext_blo);

  $nof_mod = 'entry_current_display_script.php';
 
  $html_str = '';
  $html_str .= irp_provide ('pervasive_page_header', $here);
  $html_str .= irp_provide ('git_command_n_commit_html', $here);
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_return_module_nameoffile ($nam_ent, $sur_ent, $nof_mod);
  $html_str .= irp_provide ('pervasive_page_footer', $here);
  
  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  
  return $html_str;
};

exiting_from_module ($module);

?>