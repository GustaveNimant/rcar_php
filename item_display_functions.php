<?php

require_once "array_functions.php";
require_once "item_modify_save_functions.php";
require_once "common_html_functions.php";
require_once "item_name_catalog_functions.php";
require_once "language_translate_functions.php";
require_once "link_functions.php";
require_once "irp_functions.php";
require_once "justification_functions.php";

$module = "item_display_functions";
# entering_in_module ($module);

/* Improve move elsewhere */

function item_content_display_of_item_name__XX ($nam_ite) {
  $here = __FUNCTION__;
  entering_in_function ($here . "($nam_ite)");

  $nam_ent = irp_provide ('entry_name', $here);
  $hdir = specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);

  global $item_text_filename_extension;
  $ext_txt = $item_text_filename_extension;
  $hnof = $dir_pat . $nam_ite . '.' . $ext_txt ;

  $con_ite = file_content_read ($hnof);

  debug ($here , "output item content", $con_ite);
  exiting_from_function ($here);

  return $con_ite;
};

function item_display_and_link_of_surname_by_name_array_of_entry_name_of_item_name_of_language ($sur_by_nam_a, $nam_ent, $nam_ite, $lan) {
  $here = __FUNCTION__;
  entering_in_function ($here . "($nam_ent, $nam_ite, $lan");

  $sur_ite = surname_of_name_of_surname_by_name_array ($nam_ite, $sur_by_nam_a);
  $sur_ite = string_html_capitalized_of_string ($sur_ite);

  $en_bub_lin = 'click to open the page';
  $la_bub_lin = language_translate_of_en_string_of_language ($en_bub_lin, $lan);

  $html_str  = '';
  $html_str .= '<br> ';
  $html_str .= '<a href="item_display.php?entry_name=' . $nam_ent . '&item_name=' . $nam_ite . '" title="' . $la_bub_lin . '">';
  $html_str .= '<b> ' . $sur_ite . '</b> ';
  $html_str .= '</a>';
  $html_str .= '<br> ';

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* First Section Page Title */

function item_display_section_page_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $sur_ent = irp_provide ('entry_surname', $here);
  $kin_ite = irp_provide ('entry_item_kind', $here);
  $nam_ite = irp_provide ('item_name', $here);
  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);

  $sur_ite = surname_of_name_of_surname_by_name_array ($nam_ite, $sur_by_nam_a);

  $en_tit =  $kin_ite;
  $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
  $la_Tit = string_html_capitalized_of_string ($la_bub_tit);
  $la_Tit .= '<i><b> ' . $sur_ite . '</b></i> ';

  $en_tit =  'for entry';
  $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
  $la_Tit .= lcfirst ($la_bub_tit);
  $la_Tit .= '<i><b> ' . $sur_ent . '</b></i> ';

  $html_str = common_html_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function item_display_content_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ite = irp_provide ('item_name', $here);
  $con_ite_a = irp_provide ('item_content_by_item_name_array', $here);

  $con_ite = array_retrieve_value_of_key_of_array ($nam_ite, $con_ite_a);
  $html_str  = "";
  $html_str .= '<br>';
  $html_str .= $con_ite;

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function item_display_justify_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $en_tit = "content of the current justification";
  $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
  $la_Tit = string_html_capitalized_of_string ($la_bub_tit);

  $html_str = common_html_background_color_of_html ($la_Tit);
  
  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function item_display_justify_content_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ite = irp_provide ('item_name', $here);
  $nam_ent = irp_provide ('entry_name', $here);

  $con_jus_ite = justification_get_content_of_item_name_of_entry_name ($nam_ite, $nam_ent);
  $con_jus_ite = string_replace_if_exists ($here, "\n", '<br><br>', $con_jus_ite);

  $html_str  = "";
  $html_str .= '<i>';
  $html_str .= $con_jus_ite;
  $html_str .= '</i>';
  
  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function item_display_justify_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= '<br><br>';
  $html_str .= irp_provide ('item_display_justify_title', $here);
  $html_str .= '<br>';
  $html_str .= irp_provide ('item_display_justify_content', $here);
  $html_str .= '<br><br>';

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function item_display_action_link_of_en_item_action ($nof_mod, $nam_ent, $nam_ite, $la_act_ite) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($en_act_ite)");

  $html_str  = '';
  $html_str .= '<a href="'. $nof_mod . '?entry_name=' . $nam_ent . '&item_name=' . $nam_ite . '">';
  $html_str .= $la_act_ite;
  $html_str .= '</a>';

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function item_display_action_links_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

    $nam_ite = irp_provide ('item_name', $here);
    $nam_ent = irp_provide ('entry_name', $here);
    $lan = $_SESSION['parameters']['language'];

    $en_act_ite_a = array ('delete', 'modify', 'justify', 'rename', 'history');

    $html_str = '';
    $html_str .= '<br>';
    $html_str .= '<center>';
    foreach ($en_act_ite_a as $en_act_ite) {

        $nof_mod = "item_" . $en_act_ite . ".php";
        debug_n_check ($here , '$nof_mod',  $nof_mod);
        $la_act_ite = language_translate_of_en_string_of_language ($en_act_ite, $lan);

        $html_str .= '<a href="'. $nof_mod . '?entry_name=' . $nam_ent . '&item_name=' . $nam_ite . '">';
        $html_str .= $la_act_ite;
        $html_str .= '</a>';
        
        $html_str .= '&nbsp;&nbsp;&nbsp;&nbsp;';
    }
    $html_str .= '</center>';

    debug_n_check ($here , '$html_str', $html_str);
    exiting_from_function ($here);
    return $html_str;
}

/* Page item */

function item_display_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $nam_ent = irp_provide ('entry_name', $here);
  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);
  $sur_ent = surname_of_name_of_surname_by_name_array ($nam_ent, $sur_by_nam_a);

  $nof_mod = 'entry_display.php';

  $html_str  = '';
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);

  $html_str .= irp_provide ('item_display_section_page_title', $here);
  $html_str .= irp_provide ('item_display_content', $here);
  $html_str .= irp_provide ('item_display_justify', $here);
  $html_str .= irp_provide ('item_display_action_links', $here);

  $html_str .= '<br>';
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_module_nameoffile_of_language ($nam_ent, $sur_ent, $nof_mod, $lan);

  $html_str .= irp_provide ('pervasive_html_final_section', $here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  return $html_str;
}

# exiting_from_module ($module);

?>