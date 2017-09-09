<?php

require_once "management_functions.php";
require_once "irp_functions.php";
require_once "button_functions.php";
require_once "entry_information_functions.php";
require_once "block_information_functions.php";
require_once "block_name_array_functions.php";

$module = "block_create_save_functions";
# entering_in_module ($module);

function block_create_content_write_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_name', $here);
  $nam_blo = irp_provide ('block_name', $here);
  $con_blo = irp_provide ('block_content', $here);

  $ext_blo = $_SESSION['parameters']['block_text_filename_extension'];

  block_any_text_write ('block content', $nam_ent, $nam_blo, $con_blo, $ext_blo);

  exiting_from_function ($here);

  return "write done in $here";
}

function block_create_exist_action_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $nam_ent = irp_provide ('entry_name', $here);
  $nam_blo = irp_provide ('block_name', $here);
  $con_blo = irp_provide ('block_content', $here);

  $dir = specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);

  $ext_blo = $_SESSION['parameters']['block_text_filename_extension'];
  $nof_blo = $dir . $nam_blo . $ext_blo;
 
  $html_str  = '';

  if (file_exists ($nof_blo)) {
      /* $html_str .= irp_provide ('pervasive_html_initial_section', $here); */
      $html_str .= '<span class="my-fieldset"> ';
      $html_str .= $nam_blo . ' : ';
      $html_str .= '<b><font color="red"> ';
      $html_str .= language_translate_of_en_string_of_language ('the block already exists', $lan);
      $html_str .= '</font></b> ';
      $html_str .= '</span> ';
      /* $html_str .= irp_provide ('pervasive_html_final_section', $here); */
      echo $html_str;
      /* $_GET['block_content'] = $con_blo; */

      $link = "block_create.php?entry_name=$nam_ent";
      header('Refresh: 5; url= ' . $link);
      /* exit; */
  }
  
  exiting_from_function ($here);
  return $html_str;
}

function block_create_save_catalog_actualize_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_name', $here);
  $nam_blo = irp_provide ('block_name', $here);

  debug_n_check ($here , '$nam_ent', $nam_ent);
  debug_n_check ($here , '$nam_blo', $nam_blo);

  $glue = $_SESSION['parameters']['glue'];
  try {
      $cat_blo = irp_provide ('block_name_catalog', $here);
      debug_n_check ($here , '$cat_blo', $cat_blo);
      $new_cat_blo = $cat_blo . $glue . $nam_blo;
  }
  catch (Exception $e) {  
      $mesc = $e->getMessage();
      if ($mesc = "Catalog is empty in function block_name_catalog_build for Entry name $nam_ent"){
          debug ($here, 'Catch Exception with message', $mesc);
          $new_cat_blo = $nam_blo;
      }
  }
  
  debug_n_check ($here , '$new_cat_blo', $new_cat_blo);

  irp_store_force ('block_name_catalog', $new_cat_blo, 'block_create_save');

  block_name_catalog_write_of_entry_name_of_block_name_catalog ($nam_ent, $new_cat_blo);
  
  return $new_cat_blo;
}

function block_create_save_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_log  = '';

  $lan = $_SESSION['parameters']['language'];
  $nam_ent = irp_provide ('entry_name', $here);
  debug_n_check ($here , '$nam_ent', $nam_ent);

/* GET created block block_surname */

  $sur_blo = irp_provide ('block_surname', $here);  /* GET */
  $nam_blo = word_name_capitalized_of_string_surname ($sur_blo, $here);
  debug_n_check ($here , '$nam_blo', $nam_blo);
  
/* Check if block_name already exists in block_name_array. Get block_name_array from Old Catalog */

  try {
      $old_nam_blo_a = irp_provide ('block_name_array', $here);
      # debug_n_check ($here , '$old_nam_blo_a', $old_nam_blo_a);
      if (array_value_exists ($nam_blo, $old_nam_blo_a) ) {
          $en_mes_1 = "the block";
          $en_mes_2 = "already exists";
          $la_mes_1 = language_translate_of_en_string_of_language ($en_mes_1, $lan); 
          $la_mes_2 = language_translate_of_en_string_of_language ($en_mes_2, $lan);   
          $la_mes =  $la_mes_1 . ' ' . $nam_blo . ' ' . $la_mes_2;
          $la_Mes = string_html_capitalized_of_string ($la_mes);
          warning ($here, $la_Mes);
          
          exiting_from_function ($here . ' with ' . $la_Mes); 
          include 'block_create.php'; /* Return to block creation */
          exit;
      }
  }
  catch (Exception $e) {  
      $mesc = $e->getMessage();
      if ($mesc = "Catalog is empty in function block_name_catalog_build for Entry name $nam_ent") {
          $html_log .= 'Block_name_catalog is empty';
      }
  }

/* block_name is NEW */

/* Actualize Surname_by_name_array Store_force and Write */

  $old_sur_by_nam_a = irp_provide ('surname_by_name_array', $here); /* Verify */
  # debug_n_check ($here , '$old_sur_by_nam_a', $old_sur_by_nam_a);
  $sur_by_nam_a = surname_by_name_array_add_n_write_of_name_of_surname_of_current_array ($nam_blo, $sur_blo, $old_sur_by_nam_a);
  # debug_n_check ($here , '$sur_by_nam_a', $sur_by_nam_a);

/* Actualize Block_name_catalog and Write */

  $new_cat_blo = irp_provide ('block_create_save_catalog_actualize', $here);

/* Actualize Block_name_array */

  unset ($_SESSION['irp_register']['block_name_array']);
  $new_nam_blo_a = irp_provide ('block_name_array', $here);
  # debug_n_check ($here , 'verify $new_nam_blo_a', $new_nam_blo_a);

/* Display Page */

  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here); /* Obsolete */
  # debug_n_check ($here , 'verify $sur_by_nam_a', $sur_by_nam_a);
  $sur_ent = surname_of_name_of_surname_by_name_array ($nam_ent, $sur_by_nam_a);
  $nof_mod = 'entry_display.php';

  $html_str  = '';
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);
  $html_str .= irp_provide ('git_command_n_commit_html', $here);
  $html_str .= '<br> ';

  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_module_nameoffile_of_language ($nam_ent, $sur_ent, $nof_mod, $lan); 
  $html_str .= irp_provide ('pervasive_html_final_section', $here);

/* Log */

  $html_log .= irp_provide ('block_create_content_write', $here);
  /* $html_log .= irp_provide ('block_name_list_catalog_write', $here); */
  logfile_html_write ($html_log);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;

}

# exiting_from_module ($module);
?>