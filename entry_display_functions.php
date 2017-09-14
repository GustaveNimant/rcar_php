<?php

require_once "array_functions.php";
require_once "block_current_display_functions.php";
require_once "item_kind_functions.php";
require_once "bubble_functions.php";
require_once "entry_display_functions.php";
require_once "entry_information_functions.php";
require_once "irp_functions.php";
require_once "management_functions.php";
require_once "surname_by_name_array_functions.php";

$module = "entry_display_functions";
$Documentation[$module]['entry_name'] = "is a directory name of php_server. i.e. any string expressed in the current language transformed in a Capitalized word, with blank transformed in underscores, without any accents.";
$Documentation[$module]['entry_kind'] = "is a lower case word expressed in english. Ex.: text";
$Documentation[$module]['entry_item_kind'] = "is a lower case word expressed in english. Ex.: paragraph";
$Documentation[$module]['block_name_array'] = "is the same as item_name_array";

# entering_in_module ($module);

/* Improve divide module */
/* Tools */

function block_current_display_and_link_of_surname_by_name_array_of_entry_name_of_block_current_name_of_language ($sur_by_nam_a, $nam_ent, $nam_blo, $lan) {
  $here = __FUNCTION__;
  entering_in_function ($here . "($nam_ent, $nam_blo, $lan");

  $sur_blo = surname_of_name_of_surname_by_name_array ($nam_blo, $sur_by_nam_a);
  $sur_blo = string_html_capitalized_of_string ($sur_blo);

  $en_bub_lin = 'click to open the page';
  $la_bub_lin = language_translate_of_en_string_of_language ($en_bub_lin, $lan);

  $html_str  = '';
  $html_str .= '<br> ';
  $html_str .= '<a href="block_current_display.php?entry_name=' . $nam_ent . '&block_current_name=' . $nam_blo . '" title="' . $la_bub_lin . '">';
  $html_str .= '<b> ' . $sur_blo . '</b> ';
  $html_str .= '</a>';
  $html_str .= '<br> ';

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function entry_item_kind_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_name', $here);
  $inf_ent_a = entry_information_array_en_of_entry_name ($nam_ent);
  $kin_ite = $inf_ent_a['item_kind'];

  debug_n_check ($here , '$kin_ite',  $kin_ite); 
  exiting_from_function ($here);

  return $kin_ite;
}

/* First Section Create Block Title */

function entry_create_block_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $sur_ent = irp_provide ('entry_surname', $here);
  $kin_ite = irp_provide ('entry_item_kind', $here);

  $en_tit = 'create a new ' . $kin_ite . ' for entry';

  $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);
  $la_Tit .= ' <i><b> ' . $sur_ent . '</b></i> ';

  $html_str = $la_Tit;

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* First Section Create Block Title and Action */

function entry_create_block_title_n_action_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $script_action = 'block_new_create_form.php';
  $en_val_but = 'create';

  $html_str  = '';
  $html_str .= '<form action="'. $script_action .'" method="get"> ' . "\n";
  $html_str .= irp_provide ('entry_create_block_title', $here);
  $html_str .= button_submit_of_button_value_en_of_language ($en_val_but, $lan);
  $html_str .= '</form> ' .  "\n";

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* First Section Create Block */

function entry_create_block_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html = irp_provide ('entry_create_block_title_n_action', $here);
  $html_str = common_html_background_color_of_html ($html);

  debug_n_check ($here , '$html_str',  $html_str);

  exiting_from_function ($here);

  return $html_str;
}

/*  Second Section Reorder Block Title */

function entry_reorder_block_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $sur_ent = irp_provide ('entry_surname', $here);
  $kin_ite = irp_provide ('entry_item_kind', $here);
  $kin_ite_plu = item_kind_plural_of_item_kind ($kin_ite);

  $en_tit = 'reorder the ' . $kin_ite_plu . ' for entry';

  $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);
  $la_Tit .= ' <i><b> ' . $sur_ent . '</b></i> ';

  debug_n_check ($here , '$la_Tit',  $la_Tit);
  exiting_from_function ($here);

  return $la_Tit;
}

/* Second Section Reorder Block Title and Action */

function entry_reorder_block_title_n_action_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $script_action = 'block_list_reorder.php';
  $en_val_but = 'reorder';

  $html_str  = '';
  $html_str .= '<form action="'. $script_action .'" method="get"> ' . "\n";
  $html_str .= irp_provide ('entry_reorder_block_title', $here);
  $html_str .= button_submit_of_button_value_en_of_language ($en_val_but, $lan);
  $html_str .= '</form> ' .  "\n";

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Second Section Reorder block */

function entry_reorder_block_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html = irp_provide ('entry_reorder_block_title_n_action', $here);
  $html_str = common_html_background_color_of_html ($html);

  debug_n_check ($here , '$html_str',  $html_str);

  exiting_from_function ($here);

  return $html_str;
}

/* Third Section display Title */

function entry_display_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $sur_ent = irp_provide ('entry_surname', $here);
  $kin_ite = irp_provide ('entry_item_kind', $here);
  $kin_ite_plu = item_kind_plural_of_item_kind ($kin_ite);

  $en_tit = 'list of ' . $kin_ite_plu . ' for entry';

  $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
  $la_Tit = string_html_capitalized_of_string ($la_bub_tit);
  $la_Tit .= ' <i><b> ' . $sur_ent . '</b></i> ';

  $html_str = common_html_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Third Section Display Action */

function entry_display_action_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $nam_ent = irp_provide ('entry_name', $here);

  if (block_current_nameoffile_array_is_empty_of_entry_name ($nam_ent)) {
      $html_str = '<br> ';
  }
  else {

      $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);

      $con_blo_by_nam_blo_a = irp_provide ('block_content_by_block_name_array', $here);
      debug_n_check ($here, '$con_blo_by_nam_blo_a', $con_blo_by_nam_blo_a);

      foreach ($con_blo_by_nam_blo_a as $nam_blo => $con_blo) {
          $con_ite_cur = item_current_content_off_block_content ($con_blo);

          $html_str .= block_current_display_and_link_of_surname_by_name_array_of_entry_name_of_block_current_name_of_language ($sur_by_nam_a, $nam_ent, $nam_blo, $lan); 
          $html_str .= $con_ite_cur;
          $html_str .= '<br> '; 
      }
      
      $html_str .= '<br> ';
  }

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  
  return $html_str;
}

/* Third Section Display */

function entry_display_title_n_action_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= irp_provide ('entry_display_title', $here);
  $html_str .= irp_provide ('entry_display_action', $here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Display entry */

function entry_display_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $nof_mod = 'entry_list.php';
  
  $html_str  = '';
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);
  $html_str .= irp_provide ('entry_create_block', $here);

  try {
      $nam_blo_a = irp_provide ('block_name_array', $here);
      if (count ($nam_blo_a) > 1 ) {
          $html_str .= irp_provide ('entry_reorder_block', $here);
      }
  } 
  catch (Exception $e) {}

  $html_str .= irp_provide ('entry_display_title_n_action', $here);
  $html_str .= link_to_return_of_module_nameoffile_of_language ($nof_mod, $lan);
  $html_str .= irp_provide ('pervasive_html_final_section', $here);

  exiting_from_function ($here);
  return $html_str;
}

# exiting_from_module ($module);

?>
