<?php 

require_once "management_functions.php";
require_once "irp_functions.php";

$module = "item_justify_save_functions";
# entering_in_module ($module);

function item_justify_save_build () {
  $here = __FUNCTION__;
  entering_in_function ($here . '()');
  
  $lan = $_SESSION['parameters']['language'];
  $nam_ite = irp_provide ('item_name', $here);
  $nam_ent = irp_provide ('entry_name', $here);
  $jus_ite_mod = irp_provide ('item_justification_modified', $here);

  justification_check ($jus_ite_mod);
  $inf_use = user_information_build ();
  $jus_ite_mod .= "\n" . $inf_use;

  global $item_justification_filename_extension;
  $ext_jus = $item_justification_filename_extension;
  
  $hdir = specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);
  $nof = $nam_ite . '.' . $ext_jus;
  file_put_contents ($hdir . $nof, $jus_ite_mod);
  
  $html_str = '';
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);
  $html_str .= irp_provide ('git_command_n_commit_html', $here);

  $nof_mod = 'entry_display.php';
  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);
  $sur_ent = surname_of_name_of_surname_by_name_array ($nam_ent, $sur_by_nam_a);
  $nof_mod = 'entry_display.php';


  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_module_nameoffile_of_language ($nam_ent, $sur_ent, $nof_mod, $lan); 

  $html_str .= irp_provide ('pervasive_html_final_section', $here);
  
  debug_n_check ($module , '$html_str', $html_str);
  
  
  exiting_from_function ($here);
  
  return $html_str;
}

# exiting_from_module ($module);

?>