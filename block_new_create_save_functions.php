<?php

require_once "irp_functions.php";
require_once "button_functions.php";
require_once "entry_information_functions.php";
require_once "block_information_functions.php";
require_once "block_name_array_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

# entering_in_module ($module);

# block_new_create_save.php?
# block_new_action=create
# &block_new_content=l'objet+de+la+volonté+générale+est+l'intérêt+général
# &block_new_surname=intérêt+général+objet+volonté+générale
# &submitme=Sauver

function block_new_create_save_content_write_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_name', $here);
  $nam_blo_new = irp_provide ('block_new_name', $here);
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

  $lan = $_session['parameters']['language'];
  $nam_ent = irp_provide ('entry_name', $here);
  $nam_blo_new = irp_provide ('block_new_name', $here);

  $fnd = specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);
  $ext_blo = $_SESSION['parameters']['extension_block_filename'];
  $fno = $fnd . $nam_blo_new . $ext_blo;

#  $fno = fullnameoffile_of_fullnameofdirectory_of_name_of_extension ($fnd, $nam_blo_new, $ext_blo);

  if (file_exists ($fno)) {
      $html_str = span_class_of_name_of_en_text ($nam_blo_new, 'the item already exists');
      print $html_str;

      $link = "block_new_create.php?entry_name=$nam_ent";
      header('Refresh: 5; url= ' . $link);
      /* exit; */
  }
  
  exiting_from_function ($here);
  return $html_str;
}

function block_new_create_save_catalog_actualize_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_name', $here);
  $nam_blo_new = irp_provide ('block_new_name', $here);

  debug_n_check ($here , '$nam_ent', $nam_ent);
  debug_n_check ($here , '$nam_blo_new', $nam_blo_new);

  $glue = $_SESSION['parameters']['glue'];
  try {
      $cat_blo = irp_provide ('block_name_catalog', $here);
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

  block_name_catalog_write_of_entry_name_of_block_name_catalog ($nam_ent, $new_cat_blo);
  
  return $new_cat_blo;
}

function block_new_create_save_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_log  = '';

  $lan = $_SESSION['parameters']['language'];
  $nam_ent = irp_provide ('entry_name', $here);
  debug_n_check ($here , '$nam_ent', $nam_ent);

  $sur_blo_new = irp_provide ('block_new_surname', $here); 
  $nam_blo_new = word_name_capitalized_of_string_surname ($sur_blo_new, $here);
  debug_n_check ($here , '$nam_blo_new', $nam_blo_new);
  
# Check block name is new 
  try {
      $old_nam_blo_cur_a = irp_provide ('block_name_array', $here);
      debug_n_check ($here , '$old_nam_blo_cur_a', $old_nam_blo_cur_a);
      if (array_value_exists ($nam_blo_new, $old_nam_blo_a) ) {
          $en_mes_1 = "the block";
          $en_mes_2 = "already exists";
          $la_mes_1 = language_translate_of_en_string ($en_mes_1); 
          $la_mes_2 = language_translate_of_en_string ($en_mes_2);   
          $la_mes =  $la_mes_1 . ' ' . $nam_blo_new . ' ' . $la_mes_2;
          $la_Mes = string_html_capitalized_of_string ($la_mes);
          warning ($here, $la_Mes);
          
          exiting_from_function ($here);
          include 'block_new_create.php'; /* Return to block creation */
          exit;
      }
  }
  catch (Exception $e) {  
      $mes = $e->getMessage();
      if ($mes = "Catalog is empty in function block_new_name_catalog_build for Entry name $nam_ent") {
          $html_log .= 'block_new_name_catalog is empty';
      }
  }

/* block_new_name is NEW */

/* Actualize Surname_by_name_array Store_force and Write */

  $old_sur_by_nam_a = irp_provide ('surname_by_name_array', $here); /* Verify */
  $sur_by_nam_a = surname_by_name_array_add_n_write_of_name_of_surname_of_current_array ($nam_blo_new, $sur_blo_new, $old_sur_by_nam_a);
  debug_n_check ($here , '$sur_by_nam_a', $sur_by_nam_a);

/* Actualize block_name_catalog and Write */

  $new_cat_blo = irp_provide ('block_new_create_save_catalog_actualize', $here);

/* Actualize block_name_array */

  unset ($_SESSION['irp_register']['block_name_array']);
  $new_nam_blo_a = irp_provide ('block_name_array', $here);
  debug_n_check ($here , 'verify $new_nam_blo_a', $new_nam_blo_a);

/* Display Page */

  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here); /* Obsolete */
  debug_n_check ($here , 'verify $sur_by_nam_a', $sur_by_nam_a);
  $sur_ent = surname_of_name_of_surname_by_name_array ($nam_ent, $sur_by_nam_a);
  $nof_mod = 'entry_display.php';

  $html_str  = '';
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);
  $html_str .= irp_provide ('git_command_n_commit_html', $here);
  $html_str .= '<br> ';

  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_return_module_nameoffile ($nam_ent, $sur_ent, $nof_mod, $lan); 
  $html_str .= irp_provide ('pervasive_html_final_section', $here);

/* Log */

  $html_log .= irp_provide ('block_new_create_save_content_write', $here);
  logfile_html_write ($html_log);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;

}

# exiting_from_module ($module);

?>