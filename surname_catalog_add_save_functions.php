<?php

require_once "management_functions.php";
require_once "irp_functions.php";
require_once "surname_functions.php";
require_once "surname_catalog_functions.php";
require_once "string_functions.php";

$module = "surname_catalog_add_save_functions";
# entering_in_module ($module);

function surname_catalog_item_add_save_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_wos = irp_provide ('name_without_surname', $here);
  debug_n_check ($module , '$nam_wos', $nam_wos);

  $nam_ent_a = irp_provide ('entry_name_array', $here);

  if (array_key_exists ($nam_wos, $nam_ent_a)) {
      print_fatal_error ($here,
      "\$nam_wos were an item name",
      "it is an entry name",
      "Please correct this"
      );
  }
  else {
      $sur_wos = irp_provide ('surname_of_name_without_surname', $here);
      debug_n_check ($module , '$sur_wos', $sur_wos);
      $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);
      surname_by_name_array_add_n_write_of_name_of_surname_of_current_array ($nam_wos, $sur_wos, $sur_by_nam_a);
  }
  
  $lan = $_SESSION['parameters']['language'];
  /* $sur_by_nam_a = irp_provide ('surname_by_name_array', $here); */
  $nof_mod = 'entry_display.php';

  $html_str = '';
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);
  $html_str .= irp_provide ('git_command_n_commit_html', $here);

  $nam_ent = irp_provide ('entry_name', $here);
  $sur_ent = irp_provide ('entry_surname', $here);
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_module_nameoffile_of_language ($nam_ent, $sur_ent, $nof_mod, $lan); 
  $html_str .= irp_provide ('pervasive_html_final_section', $here);
  
  debug_n_check ($module , '$html_str', $html_str);
  exiting_from_function ($here);
  
  return $html_str;
  
}

function surname_catalog_entry_add_save_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_wos = irp_provide ('name_without_surname', $here);
  debug_n_check ($module , '$nam_wos', $nam_wos);

  $sur_wos = irp_provide ('surname_of_name_without_surname', $here);
  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);

  debug_n_check ($module , '$sur_wos', $sur_wos);
  surname_by_name_array_add_n_write_of_name_of_surname_of_current_array ($nam_wos, $sur_wos, $sur_by_nam_a);

  $lan = $_SESSION['parameters']['language'];
  $nof_mod  = 'entry_display.php';

  $html_str = '';
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);
  $html_str .= irp_provide ('git_command_n_commit_html', $here);
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_module_nameoffile_of_language ($nam_wos, $sur_wos, $nof_mod, $lan);
  $html_str .= irp_provide ('pervasive_html_final_section', $here);
  
  debug_n_check ($module , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
  
}

function surname_catalog_add_save_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_wos = irp_provide ('name_without_surname', $here);
  debug_n_check ($module , '$nam_wos', $nam_wos);

  if (file_is_entry_nameoffile_of_string ($nam_wos)) { 
      $html_str = irp_provide ('surname_catalog_entry_add_save', $here);
  }
  else {
      $nam_ent = irp_provide ('entry_name', $here);
      if (is_item_nameoffile_of_entry_name_of_name ($nam_ent, $nam_wos)) { 
          $html_str = irp_provide ('surname_catalog_item_add_save', $here);
      }
      else {
          print_fatal_error ($here,
          "\$nam_wos were either an item or an entry name",
          "it is neither an item or an entry name",
          "Check"
          );
      }
  }

  debug_n_check ($module , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
  
}

# exiting_from_module ($module);

?>