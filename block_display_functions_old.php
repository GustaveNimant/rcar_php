<?php

require_once "array_functions.php";
require_once "block_modify_save_functions.php";
require_once "common_html_functions.php";
require_once "block_name_catalog_functions.php";
require_once "language_translate_functions.php";
require_once "link_functions.php";
require_once "irp_functions.php";
require_once "justification_functions.php";

$module = "block_display_functions";
# entering_in_module ($module);

/* Improve move elsewhere */

function block_content_display_of_block_current_name__XX ($nam_blo) {
  $here = __FUNCTION__;
  entering_in_function ($here . "($nam_blo)");

  $nam_ent = irp_provide ('entry_name', $here);
  $hdir = specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);

  $ext_blo = $_SESSION['parameters']['block_filename_extension'];
  $nof_blo = $dir_pat . $nam_blo . '.' . $ext_blo ;

  $con_blo = file_content_read ($nof_blo);

  debug ($here , "output block content", $con_blo);
  exiting_from_function ($here);

  return $con_blo;
};

function block_display_and_link_of_surname_by_name_array_of_entry_name_of_block_current_name_of_language ($sur_by_nam_a, $nam_ent, $nam_blo, $lan) {
  $here = __FUNCTION__;
  entering_in_function ($here . "($nam_ent, $nam_blo, $lan");

  $sur_blo = surname_of_name_of_surname_by_name_array ($nam_blo, $sur_by_nam_a);
  $sur_blo = string_html_capitalized_of_string ($sur_blo);

  $en_bub_lin = 'click to open the page';
  $la_bub_lin = language_translate_of_en_string_of_language ($en_bub_lin, $lan);

  $html_str  = '';
  $html_str .= '<br> ';
  $html_str .= '<a href="block_display.php?entry_name=' . $nam_ent . '&block_current_name=' . $nam_blo . '" title="' . $la_bub_lin . '">';
  $html_str .= '<b> ' . $sur_blo . '</b> ';
  $html_str .= '</a>';
  $html_str .= '<br> ';

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* First Section Page Title */

function block_display_section_page_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $sur_ent = irp_provide ('entry_surname', $here);
  $kin_blo = irp_provide ('entry_block_kind', $here);
  $nam_blo = irp_provide ('block_current_name', $here);
  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);

  $sur_blo = surname_of_name_of_surname_by_name_array ($nam_blo, $sur_by_nam_a);

  $en_tit =  $kin_blo;
  $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
  $la_Tit = string_html_capitalized_of_string ($la_bub_tit);
  $la_Tit .= '<i><b> ' . $sur_blo . '</b></i> ';

  $en_tit =  'for entry';
  $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
  $la_Tit .= lcfirst ($la_bub_tit);
  $la_Tit .= '<i><b> ' . $sur_ent . '</b></i> ';

  $html_str = common_html_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_display_content_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_blo = irp_provide ('block_current_name', $here);
  $con_blo_a = irp_provide ('block_content_by_block_name_array', $here);

  $con_blo = array_retrieve_value_of_key_of_array ($nam_blo, $con_blo_a);
  $html_str  = "";
  $html_str .= '<br>';
  $html_str .= $con_blo;

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_display_justify_title_build () {
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

function block_display_justify_content_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_blo = irp_provide ('block_current_name', $here);
  $nam_ent = irp_provide ('entry_name', $here);

  $con_jus_blo = justification_get_content_of_block_current_name_of_entry_name ($nam_blo, $nam_ent);
  $con_jus_blo = string_replace_if_exists ($here, "\n", '<br><br>', $con_jus_blo);

  $html_str  = "";
  $html_str .= '<i>';
  $html_str .= $con_jus_blo;
  $html_str .= '</i>';
  
  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_display_justify_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= '<br><br>';
  $html_str .= irp_provide ('block_display_justify_title', $here);
  $html_str .= '<br>';
  $html_str .= irp_provide ('block_display_justify_content', $here);
  $html_str .= '<br><br>';

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_display_action_link_of_en_block_action ($nof_mod, $nam_ent, $nam_blo, $la_act_blo) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($en_act_blo)");

  $html_str  = '';
  $html_str .= '<a href="'. $nof_mod . '?entry_name=' . $nam_ent . '&block_current_name=' . $nam_blo . '">';
  $html_str .= $la_act_blo;
  $html_str .= '</a>';

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_display_action_links_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

    $nam_blo = irp_provide ('block_current_name', $here);
    $nam_ent = irp_provide ('entry_name', $here);
    $lan = $_SESSION['parameters']['language'];

    $en_act_blo_a = array ('delete', 'modify', 'justify', 'rename', 'history');

    $html_str = '';
    $html_str .= '<br>';
    $html_str .= '<center>';
    foreach ($en_act_blo_a as $en_act_blo) {

        $nof_mod = "block_" . $en_act_blo . ".php";
        debug_n_check ($here , '$nof_mod',  $nof_mod);
        $la_act_blo = language_translate_of_en_string_of_language ($en_act_blo, $lan);

        $html_str .= '<a href="'. $nof_mod . '?entry_name=' . $nam_ent . '&block_current_name=' . $nam_blo . '">';
        $html_str .= $la_act_blo;
        $html_str .= '</a>';
        
        $html_str .= '&nbsp;&nbsp;&nbsp;&nbsp;';
    }
    $html_str .= '</center>';

    debug_n_check ($here , '$html_str', $html_str);
    exiting_from_function ($here);
    return $html_str;
}

/* Page block */

function block_display_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $nam_ent = irp_provide ('entry_name', $here);
  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);
  $sur_ent = surname_of_name_of_surname_by_name_array ($nam_ent, $sur_by_nam_a);

  $nof_mod = 'entry_display.php';

  $html_str  = '';
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);

  $html_str .= irp_provide ('block_display_section_page_title', $here);
  $html_str .= irp_provide ('block_display_content', $here);
  $html_str .= irp_provide ('block_display_justify', $here);
  $html_str .= irp_provide ('block_display_action_links', $here);

  $html_str .= '<br>';
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_module_nameoffile_of_language ($nam_ent, $sur_ent, $nof_mod, $lan);

  $html_str .= irp_provide ('pervasive_html_final_section', $here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  return $html_str;
}

# exiting_from_module ($module);

?>