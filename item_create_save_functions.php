<?php

require_once "management_functions.php";
require_once "irp_functions.php";
require_once "button_functions.php";
require_once "entry_information_functions.php";
require_once "item_information_functions.php";
require_once "item_name_array_functions.php";

$module = "item_create_save_functions";
# entering_in_module ($module);

function item_create_content_write_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_name', $here);
  $nam_ite = irp_provide ('item_name', $here);
  $con_ite = irp_provide ('item_content', $here);

  global $item_text_filename_extension;
  $ext_txt = $item_text_filename_extension;

  item_any_text_write ('item content', $nam_ent, $nam_ite, $con_ite, $ext_txt);

  exiting_from_function ($here);

  return "write done in $here";
}

function item_create_justification_write_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_name', $here);
  $nam_ite = irp_provide ('item_name', $here);
  $jus_ite = irp_provide ('item_justify', $here);

  global $item_justification_filename_extension;
  $ext_jus = $item_justification_filename_extension;

  item_any_text_write ('item justify', $nam_ent, $nam_ite, $jus_ite, $ext_jus);

  exiting_from_function ($here)
;
  return "write done in $here";
}

function item_create_exist_action_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $nam_ent = irp_provide ('entry_name', $here);
  $nam_ite = irp_provide ('item_name', $here);
  $con_ite = irp_provide ('item_content', $here);
  $jus_ite = irp_provide ('item_justify', $here);

  $dir = specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);

  global $item_text_filename_extension;
  $ext = $item_text_filename_extension;

  $txt_nof = $dir . $nam_ite . $ext;
 
  $html_str  = '';

  if (file_exists ($txt_nof)) {
      /* $html_str .= irp_provide ('pervasive_html_initial_section', $here); */
      $html_str .= '<span class="my-fieldset"> ';
      $html_str .= $nam_ite . ' : ';
      $html_str .= '<b><font color="red"> ';
      $html_str .= language_translate_of_en_string_of_language ('the item already exists', $lan);
      $html_str .= '</font></b> ';
      $html_str .= '</span> ';
      /* $html_str .= irp_provide ('pervasive_html_final_section', $here); */
      echo $html_str;
      /* $_GET['item_content'] = $con_ite; */
      /* $_GET['justification'] = $jus_ite; */

      $link = "item_create.php?entry_name=$nam_ent";
      header('Refresh: 5; url= ' . $link);
      /* exit; */
  }
  
  exiting_from_function ($here);
  return $html_str;
}

function item_create_save_catalog_actualize_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_name', $here);
  $nam_ite = irp_provide ('item_name', $here);

  debug_n_check ($here , '$nam_ent', $nam_ent);
  debug_n_check ($here , '$nam_ite', $nam_ite);

  global $glue;
  try {
      $cat_ite = irp_provide ('item_name_catalog', $here);
      debug_n_check ($here , '$cat_ite', $cat_ite);
      $new_cat_ite = $cat_ite . $glue . $nam_ite;
  }
  catch (Exception $e) {  
      $mes = $e->getMessage();
      if ($mes = "Catalog is empty in function item_name_catalog_build for Entry name $nam_ent"){
          $new_cat_ite = $nam_ite;
      }
  }
  
  debug_n_check ($here , '$new_cat_ite', $new_cat_ite);

  irp_store_force ('item_name_catalog', $new_cat_ite, 'item_create_save');

  item_name_catalog_write_of_entry_name_of_item_name_catalog ($nam_ent, $new_cat_ite);
  
  return $new_cat_ite;
}

function item_create_save_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_log  = '';

  $lan = $_SESSION['parameters']['language'];
  $nam_ent = irp_provide ('entry_name', $here);
  debug_n_check ($here , '$nam_ent', $nam_ent);

/* GET created item item_surname */

  $sur_ite = irp_provide ('item_surname', $here);  /* GET */
  $nam_ite = word_name_capitalized_of_string_surname ($sur_ite, $here);
  debug_n_check ($here , '$nam_ite', $nam_ite);
  
/* Check if item_name already exists in item_name_array. Get item_name_array from Old Catalog */

  try {
      $old_nam_ite_a = irp_provide ('item_name_array', $here);
      # debug_n_check ($here , '$old_nam_ite_a', $old_nam_ite_a);
      if (array_value_exists ($nam_ite, $old_nam_ite_a) ) {
          $en_mes_1 = "the item";
          $en_mes_2 = "already exists";
          $la_mes_1 = language_translate_of_en_string_of_language ($en_mes_1, $lan); 
          $la_mes_2 = language_translate_of_en_string_of_language ($en_mes_2, $lan);   
          $la_mes =  $la_mes_1 . ' ' . $nam_ite . ' ' . $la_mes_2;
          $la_Mes = string_html_capitalized_of_string ($la_mes);
          warning ($here, $la_Mes);
          
          exiting_from_function ($here);
          include 'item_create.php'; /* Return to item creation */
          exit;
      }
  }
  catch (Exception $e) {  
      $mes = $e->getMessage();
      if ($mes = "Catalog is empty in function item_name_catalog_build for Entry name $nam_ent") {
          $html_log .= 'Item_name_catalog is empty';
      }
  }

/* item_name is NEW */

/* Actualize Surname_by_name_array Store_force and Write */

  $old_sur_by_nam_a = irp_provide ('surname_by_name_array', $here); /* Verify */
  # debug_n_check ($here , '$old_sur_by_nam_a', $old_sur_by_nam_a);
  $sur_by_nam_a = surname_by_name_array_add_n_write_of_name_of_surname_of_current_array ($nam_ite, $sur_ite, $old_sur_by_nam_a);
  # debug_n_check ($here , '$sur_by_nam_a', $sur_by_nam_a);

/* Actualize Item_name_catalog and Write */

  $new_cat_ite = irp_provide ('item_create_save_catalog_actualize', $here);

/* Actualize Item_name_array */

  unset ($_SESSION['irp_register']['item_name_array']);
  $new_nam_ite_a = irp_provide ('item_name_array', $here);
  # debug_n_check ($here , 'verify $new_nam_ite_a', $new_nam_ite_a);

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

  $html_log .= irp_provide ('item_create_content_write', $here);
  $html_log .= irp_provide ('item_create_justification_write', $here);
  /* $html_log .= irp_provide ('item_name_list_catalog_write', $here); */
  logfile_html_write ($html_log);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;

}

# exiting_from_module ($module);
?>