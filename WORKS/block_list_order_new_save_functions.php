<?php

require_once "management_library.php";
require_once "irp_functions.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function block_list_order_new_save_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_mod_cur = module_name_of_module_fullnameoffile (__FILE__);

/* getting DATA $get_val */
  $get_key = 'block_name_catalog_new';
  $new_cat_blo = irp_data_value_retrieve_and_store_of_get_key_of_module_name_of_where ($get_key, $nam_mod_cur, $here);

  $nam_ent_cur = irp_provide ('entry_current_name', $here);
  block_name_catalog_write_of_entry_name_of_block_name_catalog ($nam_ent_cur, $new_cat_blo);

/* Clean all Father Nodes and Store New as Current */
#  irp_path_clean_register_of_top_key_of_bottom_key_of_where ('entry_list_display', 'block_name_catalog_current', $here); 
#  irp_store_data_of_get_key_of_get_value_of_where ('block_name_catalog_current', $new_cat_blo, $here);

/* Not yet used */  
  /* $usr_inf = irp_provide ('user_information', $here); */
  /* block_name_array_justification_write_of_entry_name_of_user_information ($nam_ent, $usr_inf); */

  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);

  $html_str  = '';
  $html_str .= irp_provide ('pervasive_page_header', $here);
  $html_str .= '<br><br>';

  $html_str .= irp_provide ('git_command_n_commit_html', $here);
  $html_str .= '<br><br>';

  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_return_module_nameoffile ($nam_ent_cur, $sur_ent_cur, 'entry_current_display_script.php'); 

  $html_str .= irp_provide ('pervasive_page_footer', $here);

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);
  
  return $html_str;
}
  
exiting_from_module ($module);

?>