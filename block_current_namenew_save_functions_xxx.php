
function block_current_namenew_save_xxx (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_mod_cur = module_name_of_module_fullnameoffile (__FILE__);

/* getting DATA $get_val */
  $get_key = 'block_current_surnamenew'; 
  $new_sur_blo = irp_data_value_retrieve_and_store_of_get_key_of_module_name_of_where ($get_key, $nam_mod_cur, $here);

/* surnamenew -> namenew */
/* clean all fathers */

  $new_nam_blo = surname_name_of_surname ($new_sur_blo);

  print_html_array ($here , "irp_register_keys", array_keys ($_SESSION['irp_register']));

  $nam_ent_cur = irp_provide ('entry_current_name', $here);
  $old_nam_blo = irp_provide ('block_current_name', $here);

  /* Rename File block_new.blo */

  $ext_blo = $_SESSION['parameters']['extension_block_filename'];

  debug_n_check ($here , '$new_sur_blo', $new_sur_blo);
  debug_n_check ($here , '$old_nam_blo', $old_nam_blo);
  debug_n_check ($here , '$new_nam_blo', $new_nam_blo);
  debug_n_check ($here , '$ext_blo', $ext_blo);

  $old_nam_blo_a = irp_provide ('block_name_array', $here);
  check_is_array_unique_of_what_of_array ('block_nameold_array', $old_nam_blo_a);
  $new_nam_blo_a = block_name_array_update_after_block_rename ($nam_ent_cur, $old_nam_blo, $new_nam_blo, $old_nam_blo_a);
# SKIPPED  check_is_array_unique_of_what_of_array ('block_namenew_array', $new_nam_blo_a);
  debug_n_check ($here , '$old_nam_blo_a', $old_nam_blo_a);
  debug_n_check ($here , '$new_nam_blo_a', $new_nam_blo_a);

  /* File renamed in catalog */

  block_file_rename ($nam_ent_cur, $old_nam_blo, $new_nam_blo, $ext_blo);
  $new_cat_blo = block_name_catalog_of_block_name_array ($new_nam_blo_a);
  debug_n_check ($here , '$new_cat_blo', $new_cat_blo);

  block_name_catalog_write_of_entry_name_of_block_name_catalog ($nam_ent_cur, $new_cat_blo);

  /* File server/SURNAMES/Surname_catalog.cat : add "$new_nam_blo : $new_sur_blo" */

  $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here);

  if (array_key_exists ($new_nam_blo, $sur_by_nam_h)) {
      $old_sur = $sur_by_nam_h[$new_nam_blo];
      surname_by_name_hash_replace_n_write_of_name_of_surnamenew_of_current_array ($new_nam_blo, $new_sur_blo, $sur_by_nam_h);
  }
  else {
      surname_by_name_hash_add_n_write_of_name_of_surname_of_current_hash ($new_nam_blo, $new_sur_blo, $sur_by_nam_h);
  }
  
  /* Git */

  $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here); /* Verify */
  $sur_ent = surname_of_name_of_surname_by_name_hash ($nam_ent_cur, $sur_by_nam_h);
  $nof_mod = 'entry_current_display_script.php';

  $html_str = '';
  $html_str .= irp_provide ('pervasive_page_header', $here);
  $html_str .= irp_provide ('git_command_n_commit_html', $here);
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_return_module_nameoffile ($nam_ent_cur, $sur_ent, $nof_mod); 
  $html_str .= irp_provide ('pervasive_page_footer', $here);
  
  debug_n_check ($here, '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

