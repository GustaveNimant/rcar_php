<?php

require_once "array_functions.php";
require_once "irp_functions.php";
require_once "management_functions.php";
require_once "item_information_functions.php";
require_once "entry_information_functions.php";
require_once "file_functions.php";

$module = "item_list_functions";
# entering_in_module ($module);

$irp_register = $_SESSION['irp_register'];
debug ($module, 'SESSION irp_register', $irp_register);

function item_ok_and_display_of_surname_by_name_array_of_entry_name_of_item_name_of_item_content ($sur_by_nam_a, $nam_ent, $nam_ite, $con_ite) {
  $here = __FUNCTION__;
  entering_in_function ($here);
 
  debug_n_check ($here , "input entry_name name", $nam_ent);
  debug_n_check ($here , "input item name", $nam_ite);
  debug_n_check ($here , "input item content", $con_ite);

  $sur_ite = surname_of_name_of_surname_by_name_array ($nam_ite, $sur_by_nam_a);
  $sur_ite = string_html_capitalized_of_string ($sur_ite);

  $html_str  = '';
  $html_str .= '<br> ';

  $html_str .= button_radio ('item_name', $nam_ite);
  $html_str .= '<b> ' . $sur_ite . '</b> ';

  $html_str .= '<br> ';

  $html_str .= $con_ite;
  $html_str .= '<br> ';

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function item_surname_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  if ( isset ($_GET['item_name_input'])) {
   
/* create surname from user GET */
      $sur_ite = array_dollar_get_retrieve_value_of_key ('item_name_input', $here);
  }
  else {

      if ( isset ($_GET['item_surname'])) {
          
/* get surname from user selection GET */
          $sur_ite = array_dollar_get_retrieve_value_of_key ('item_surname', $here);
      }
      else {
  
/* get from disk if item_name exists */
 
          if (irp_is_stored ('item_name')) {
              $nam_ite = irp_provide ('item_name', $here);
              /* $sur_by_nam_a = surname_by_name_array_make (); ???? */
              $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);
              $sur_ite = $sur_by_nam_a[$nam_ite];
          }
          else {
              debug ($here, 'irp_register', $_SESSION['irp_register']);
              fatal_error ($here, "item_name is neither stored nor in GET");
          }
      }
  }

  debug_n_check ($here , '$sur_ite', $sur_ite);
  exiting_from_function ($here);
  
  return $sur_ite;
}

function item_title_section_make ($tit_sec) {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= '<br><div class="my-div"> ';
  $html_str .= $tit_sec;
  $html_str .= '  </div> ' . "\n";


  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function item_text_filename_extension_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
  
  global $item_text_filename_extension;
  $ext_txt = $item_text_filename_extension;
  
  debug_n_check ($here , '$ext_txt', $ext_txt);
  exiting_from_function ($here);
  
  return $ext_txt;
}

function item_justification_filename_extension_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  global $item_justification_filename_extension;
  $ext_jus = $item_justification_filename_extension;

  debug_n_check ($here , '$ext_jus', $ext_jus);
  exiting_from_function ($here);
  
  return $ext_jus;
}

function item_name_catalog_filename_extension_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
  
  global $block_name_catalog_filename_extension;
  $ext_cat = $block_name_catalog_filename_extension;
  
  debug_n_check ($here , '$ext_cat', $ext_cat);
  exiting_from_function ($here);
  
  return $ext_cat;
}

# exiting_from_module ($module);

?>
