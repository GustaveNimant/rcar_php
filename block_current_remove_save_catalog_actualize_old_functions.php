function block_current_remove_save_catalog_actualize_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent_cur = irp_provide ('entry_current_name', $here);
  $nam_blo_cur = irp_provide ('block_current_name', $here);

  debug_n_check ($here , "input entry_current_name", $nam_ent_cur);
  debug_n_check ($here , "input block name", $nam_blo_cur);

  $dir = file_specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent_cur);

  $cat_blo = irp_provide ('block_name_list_order_current', $here);

  $con_cat_blo = block_name_list_order_remove_block_name_of_entry_name_of_block_name_list_order_of_block_current_name ($nam_ent_cur, $cat_blo, $nam_blo_cur);
  $ext_cat = $_SESSION['parameters']['extension_block_name_list_order_filename'];
  $nof = "Block_name_list_order." . $ext_cat;

  if ($con_cat_blo == "") {
      $fno = $dir . $nof;
      if ( ! file_exists ($fno)) {
          $en_tx1 = 'file';
          $en_tx2 = 'does not exist';
          $en_tx3 = 'not removed';
          $la_tx1 = language_translate_of_en_string ($en_tx1);
          $la_tx2 = language_translate_of_en_string ($en_tx2);
          $la_tx3 = language_translate_of_en_string ($en_tx3);
          $la_Tx3  = string_html_capitalized_of_string ($la_tx3);

          warning ($here, $la_tx1 . $fno . ' ' . $la_tx2 . '. ' . $la_Tx3);
      }
      else {
          unlink ($fno);
      }
      
  } else {
      file_string_write ($dir . $nof, $con_cat_blo);
  }

  $log_str = $nof . " file updated on disk";
  exiting_from_function ($here);
  return $log_str; 
}

