<?php

require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

# block_new_create_save_script.php?
# block_new_action=create
# &block_new_content=l'objet+de+la+volonté+générale+est+l'intérêt+général
# &block_new_surname=intérêt+général+objet+volonté+générale
# &submitme=Sauver

function block_new_create_save_content_write_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_current_name', $here);
  $nam_blo_new = irp_provide ('block_new_name_from_block_new_surname', $here);
  $con_blo_new = irp_provide ('block_new_content', $here);

  debug_n_check ($here , '$nam_blo_new', $nam_blo_new);
  debug_n_check ($here , '$con_blo_new', $con_blo_new);

  block_content_write ($nam_ent, $nam_blo_new, $con_blo_new);

  exiting_from_function ($here);

  return "write done in $here";
}

function block_new_create_exist_action_build () {
  $here = __function__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_current_name', $here);
  $nam_blo_new = irp_provide ('block_new_name', $here);

  $fnd = file_specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);
  $ext_blo = $_SESSION['parameters']['extension_block_filename'];
  $fno = $fnd . $nam_blo_new . $ext_blo;

#  $fno = fullnameoffile_of_fullnameofdirectory_of_name_of_extension ($fnd, $nam_blo_new, $ext_blo);

  if (file_exists ($fno)) {
      $html_str = span_class_of_name_of_en_text ($nam_blo_new, 'the item already exists');
      print $html_str;

      $link = "block_new_create_script.php?entry_current_name=$nam_ent";
      header('Refresh: 5; url= ' . $link);
      /* exit; */
  }
  
  exiting_from_function ($here);
  return $html_str;
}

function block_new_create_save_catalog_actualize_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_current_name', $here);
  $nam_blo_new = irp_provide ('block_new_name_from_block_new_surname', $here);

  debug_n_check ($here , '$nam_ent', $nam_ent);
  debug_n_check ($here , '$nam_blo_new', $nam_blo_new);

  $glue = $_SESSION['parameters']['glue'];
  try {
      $cat_blo = irp_provide ('block_name_list_order_current', $here);
      debug_n_check ($here , '$cat_blo', $cat_blo);
      $new_cat_blo = $cat_blo . $glue . $nam_blo_new;
  }
  catch (Exception $e) {  
      $mes = $e->getMessage();
      if ($mes = "Catalog is empty in function block_new_name_catalog_build for Entry name $nam_ent"){
          $new_cat_blo = $nam_blo_new;
      }
  }
  
  debug_n_check ($here , '$new_cat_blo', $new_cat_blo);

  irp_store_force ('block_new_name_catalog', $new_cat_blo, 'block_new_create_save');

  block_name_list_order_write_of_entry_name_of_block_name_list_order ($nam_ent, $new_cat_blo);
  
  exiting_from_function ($here);
  return $new_cat_blo;
}

function block_new_create_save_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $log_str  = '';

  $nam_ent = irp_provide ('entry_current_name', $here);
  debug_n_check ($here , '$nam_ent', $nam_ent);

  $nam_mod_cur = module_name_of_module_fullnameoffile (__FILE__);
/* getting DATA $get_val */
  $get_key = 'block_new_surname';
  $irp_val = irp_data_value_retrieve_and_store_of_get_key_of_module_name_of_where ($get_key, $nam_mod_cur, $here); 

  $sur_blo_new = $irp_val;
  $nam_blo_new = word_name_capitalized_of_string_surname ($sur_blo_new, $here);
  debug_n_check ($here , '$nam_blo_new', $nam_blo_new);
  
# Check that block name is new 
  try {
      $old_nam_blo_cur_a = irp_provide ('block_current_name_ordered_array', $here);
      debug_n_check ($here , '$old_nam_blo_cur_a', $old_nam_blo_cur_a);
      if (array_value_exists ($nam_blo_new, $old_nam_blo_cur_a) ) {
          $en_mes_1 = "the block";
          $en_mes_2 = "already exists";
          $la_mes_1 = language_translate_of_en_string ($en_mes_1); 
          $la_mes_2 = language_translate_of_en_string ($en_mes_2);   
          $la_mes =  $la_mes_1 . ' ' . $nam_blo_new . ' ' . $la_mes_2;
          $la_Mes = string_html_capitalized_of_string ($la_mes);
          warning ($here, $la_Mes);
          
          exiting_from_function ($here);
          include 'block_new_create_script.php'; /* Return to block creation */
          exit;
      }
  }
  catch (Exception $e) {  
      $mes = $e->getMessage();
      if ($mes = "Catalog is empty in function block_new_name_catalog_build for Entry name $nam_ent") {
          $log_str .= 'block_new_name_catalog is empty';
      }
  }

/* block_new_name is NEW */

/* Actualize Surname_by_name_hash Store_force and Write */

  $old_sur_by_nam_h = irp_provide ('surname_by_name_hash', $here); /* Verify */
  $sur_by_nam_h = surname_by_name_hash_add_n_write_of_name_of_surname_of_current_hash ($nam_blo_new, $sur_blo_new, $old_sur_by_nam_h);
  debug_n_check ($here , '$sur_by_nam_h', $sur_by_nam_h);

/* Actualize block_name_list_order_current and Write */

  $new_cat_blo = irp_provide ('block_new_create_save_catalog_actualize', $here);

/* Actualize block_current_name_ordered_array */
/* Clean all Father Nodes and Store New as Current */
  irp_path_clean_register_of_top_key_of_bottom_key_of_where ('entry_list_display', 'block_new_create_save_catalog_actualize', $here); 
  irp_store_data_of_get_key_of_get_value_of_where ('block_name_list_order_current', $new_cat_blo, $here);

  /* unset ($_SESSION['irp_register']['block_current_name_ordered_array']); /\* left *\/ */
  /* $log_str .= "irp_key >block_current_name_ordered_array< removed from irp_register" . "\n";  */
  /* file_log_write ($here, $log_str); */

  /* $new_nam_blo_a = irp_provide ('block_current_name_ordered_array', $here); */
  /* debug_n_check ($here , 'verify $new_nam_blo_a', $new_nam_blo_a); */

/* Display Page */

  $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here); /* Obsolete */
  debug_n_check ($here , 'verify $sur_by_nam_h', $sur_by_nam_h);
  $sur_ent = surname_of_name_of_surname_by_name_hash ($nam_ent, $sur_by_nam_h);
  $nof_mod = 'entry_current_display_script.php';

  $html_str  = '';
  $html_str .= irp_provide ('pervasive_page_header', $here);
  $html_str .= irp_provide ('git_command_n_commit_html', $here);
  $html_str .= '<br> ';

  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_return_module_nameoffile ($nam_ent, $sur_ent, $nof_mod); 
  $html_str .= irp_provide ('pervasive_page_footer', $here);

/* Log */

  $log_str .= irp_provide ('block_new_create_save_content_write', $here);
  file_log_write ($here, $log_str);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;

}

exiting_from_module ($module);

?>