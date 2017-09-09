<?php

require_once "management_functions.php";
require_once "irp_functions.php";

$module = "item_list_neworder_save_functions";
# entering_in_module ($module);

function item_name_array_justification_write_of_entry_name_of_user_information_of_language ($nam_ent, $use_inf, $lan) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent, $use_inf, $lan)");

  $jus_ite = array_dollar_get_retrieve_value_of_key ('justification', $module);
  $subname = substr ($jus_ite, 0, 10);

  $jus_ite  = array_dollar_get_retrieve_value_of_key ('justification', $module);
  $jus_ite .= "\n";
  $jus_ite .=  $use_inf;

  $lan_ent = language_translate_of_en_string_of_language ('enter here', $lan);
  if ($subname == $lan_ent) {
    print '<span class="my-fieldset"><center><b> ';
    print language_translate_of_en_string_of_language ('enter a justification', $lan);
    print "</b></center></span><br>";
    exit;
  }

  global $item_justification_filename_extension;
  $ext_jus = $item_justification_filename_extension;

  $hdir = specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);
  $jus_nof = $hdir . 'Item_name_catalog.' . $ext_jus;

  debug_n_check ($here , "output justification file", $jus_nof);
  file_string_write ($jus_nof, $jus_ite); 

  exiting_from_function ($here);
}

function item_list_neworder_save_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  debug_n_check ($here , '$_GET', $_GET);

  $html_str  = '';
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);
  
  $lan = $_SESSION['parameters']['language'];
  $nam_ent = irp_provide ('entry_name', $here);
  debug_n_check ($here, '$entry_name', $nam_ent);
  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);
  $sur_ent = surname_of_name_of_surname_by_name_array ($nam_ent, $sur_by_nam_a);

  $new_cat_ite = irp_provide ('item_sequence_string', $here); /* GET */

  item_name_catalog_write_of_entry_name_of_item_name_catalog ($nam_ent, $new_cat_ite);
  
  $usr_inf = irp_provide ('user_information', $here);
  item_name_array_justification_write_of_entry_name_of_user_information_of_language ($nam_ent, $usr_inf, $lan);
  
  $html_str .= irp_provide ('git_command_n_commit_html', $here);

  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);
  $nof_mod = 'entry_display.php';
 
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_module_nameoffile_of_language ($nam_ent, $sur_ent, $nof_mod, $lan); 
 
  $html_str .= irp_provide ('pervasive_html_final_section', $here);

  debug_n_check ($here , "output html code", $html_str);

  exiting_from_function ($here);
  
  return $html_str;
}
  
# exiting_from_module ($module);

?>