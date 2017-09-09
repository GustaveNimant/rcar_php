<?php

require_once "management_functions.php";
require_once "irp_functions.php";

$module = "item_modify_save_functions";
# entering_in_module ($module);

/* Improve item_any_text_write */

function item_any_text_write ($what, $nam_ent, $nam_ite, $con_wha, $ext_fil) {
  $here = __FUNCTION__;
  entering_in_function ($here);
  debug_n_check ($here ,'$what', $what);
  debug_n_check ($here ,'$nam_ent', $nam_ent);
  debug_n_check ($here ,'nam_ite', $nam_ite);
  debug_n_check ($here ,'$con_wha', $con_wha);
  debug_n_check ($here ,'$ext_fil', $ext_fil);

  $dir = specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);
  $txt_nof = $dir . $nam_ite . '.' . $ext_fil;

  debug_n_check ($here , "output text file", $txt_nof);
  file_string_write ($txt_nof, $con_wha); 

  exiting_from_function ($module . ':' . $here);
}

function item_modify_save_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  /* debug_n_check ($module ,'$_GET', $_GET); */

  $lan = $_SESSION['parameters']['language'];
  $nam_ent = irp_provide ('entry_name', $here);
  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);
  $sur_ent = surname_of_name_of_surname_by_name_array ($nam_ent, $sur_by_nam_a);
  $nam_ite = irp_provide ('item_name', $here);
  $con_ite = irp_provide ('item_content', $here);

  $jus_ite = irp_provide ('justify', $here);
  $jus_ite .= "\n" . irp_provide ('user_information', $here);

  debug_n_check ($here, '$nam_ent', $nam_ent);

  $ext_txt = irp_provide ('item_text_filename_extension', $here);
  $ext_jus = irp_provide ('item_justification_filename_extension', $here);

  item_any_text_write ('item_content', $nam_ent, $nam_ite, $con_ite, $ext_txt);
  item_any_text_write ('item_justify', $nam_ent, $nam_ite, $jus_ite, $ext_jus);

  $nof_mod = 'entry_display.php';
 
  $html_str = '';
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);
  $html_str .= irp_provide ('git_command_n_commit_html', $here);
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_module_nameoffile_of_language ($nam_ent, $sur_ent, $nof_mod, $lan);
  $html_str .= irp_provide ('pervasive_html_final_section', $here);
  
  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  
  return $html_str;
};

# exiting_from_module ($module);

?>