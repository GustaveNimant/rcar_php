<?php

require_once "irp_library.php";
require_once "surname_library.php";
require_once "surname_catalog_functions.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function name_without_surname_from_surname_of_name_without_surname_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

    $sur_wos = irp_provide ('surname_of_name_without_surname', $here);  
    $nam_wos = word_name_capitalized_of_string_surname ($sur_wos);
    
    string_check_entry_name_of_string ($nam_wos);
    
    exiting_from_function ($here . " with \$nam_wos >$nam_wos<");
    
    return $nam_wos;
}

function surname_catalog_item_add_save_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_mod_cur = module_name_of_module_fullnameoffile (__FILE__);

/* getting DATA $get_val */
  $get_key = 'surname_of_name_without_surname'; 
  $sur_wos = irp_data_value_retrieve_and_store_of_get_key_of_module_name_of_where ($get_key, $nam_mod_cur, $here);
  $nam_wos = irp_provide ('name_without_surname_from_surname_of_name_without_surname', $here);

  debug_n_check ($here , '$nam_wos', $nam_wos);

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
      debug_n_check ($here , '$sur_wos', $sur_wos);
      $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here);
      surname_by_name_hash_add_n_write_of_name_of_surname_of_current_hash ($nam_wos, $sur_wos, $sur_by_nam_h);
  }
  
  /* $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here); */
  $nof_mod = 'entry_current_display_script.php';

  $html_str = '';
  $html_str .= irp_provide ('pervasive_page_header', $here);
  $html_str .= irp_provide ('git_command_n_commit_html', $here);

  $nam_ent = irp_provide ('entry_current_name', $here);
  $sur_ent = irp_provide ('entry_current_surname_from_entry_current_name', $here);
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_return_module_nameoffile ($nam_ent, $sur_ent, $nof_mod); 
  $html_str .= irp_provide ('pervasive_page_footer', $here);
  
  debug_n_check ($here, '$html_str', $html_str);
  exiting_from_function ($here);
  
  return $html_str;
  
}

function surname_catalog_entry_add_save_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_mod_cur = module_name_of_module_fullnameoffile (__FILE__);

/* getting DATA $get_val */
  $get_key = 'surname_of_name_without_surname'; 
  $sur_wos = irp_data_value_retrieve_and_store_of_get_key_of_module_name_of_where ($get_key, $nam_mod_cur, $here);
  $nam_wos = irp_provide ('name_without_surname_from_surname_of_name_without_surname', $here);

  debug_n_check ($here , '$nam_wos', $nam_wos);

  $sur_wos = irp_provide ('surname_of_name_without_surname', $here);
  $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here);

  debug_n_check ($here, '$sur_wos', $sur_wos);
  surname_by_name_hash_add_n_write_of_name_of_surname_of_current_hash ($nam_wos, $sur_wos, $sur_by_nam_h);

  $nof_mod  = 'entry_current_display_script.php';

  $html_str = '';
  $html_str .= irp_provide ('pervasive_page_header', $here);
  $html_str .= irp_provide ('git_command_n_commit_html', $here);
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_return_module_nameoffile ($nam_wos, $sur_wos, $nof_mod);
  $html_str .= irp_provide ('pervasive_page_footer', $here);
  
  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
  
}

function surname_catalog_add_save_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);


  $nam_wos = irp_provide ('name_without_surname', $here);
  debug_n_check ($here , '$nam_wos', $nam_wos);

  if (file_is_entry_nameoffile_of_string ($nam_wos)) { 
      $html_str = irp_provide ('surname_catalog_entry_add_save', $here);
  }
  else {
      $nam_ent = irp_provide ('entry_current_name', $here);
      if (file_is_item_nameoffile_of_entry_name_of_name ($nam_ent, $nam_wos)) { 
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

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
  
}

exiting_from_module ($module);

?>