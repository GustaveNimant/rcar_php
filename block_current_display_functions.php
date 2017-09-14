<?php

require_once "array_functions.php";
require_once "block_modify_save_functions.php";
require_once "common_html_functions.php";
require_once "block_name_catalog_functions.php";
require_once "language_translate_functions.php";
require_once "link_functions.php";
require_once "irp_functions.php";
require_once "justification_functions.php";

$module = "block_current_display_functions";
# entering_in_module ($module);

/* First Section Page Title */

function block_current_display_section_page_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $sur_ent = irp_provide ('entry_surname', $here);
  $kin_blo = irp_provide ('entry_item_kind', $here);
  $nam_blo_cur = irp_provide ('block_current_name', $here);
  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);
  $sur_blo_cur = surname_of_name_of_surname_by_name_array ($nam_blo_cur, $sur_by_nam_a);

  $en_tit =  $kin_blo;
  $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
  $la_Tit = string_html_capitalized_of_string ($la_bub_tit);
  $la_Tit .= '<i><b> ' . $sur_blo_cur . '</b></i> ';

  $en_tit =  'for entry';
  $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
  $la_Tit .= lcfirst ($la_bub_tit);
  $la_Tit .= '<i><b> ' . $sur_ent . '</b></i> ';

  $html_str = common_html_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}


# block_previous_sha1

function block_previous_sha1_display_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $en_tit = "previous block sha1";
  $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
  $la_Tit = string_html_capitalized_of_string ($la_bub_tit);
  $la_Tit = '<b>' . $la_Tit . '</b>';

  $html_str = common_html_background_color_of_html ($la_Tit);
  
  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_previous_sha1_display_content_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $blo_cur_sha = irp_provide ('block_previous_sha1', $here);

  $html_str  = '';
  $html_str .= $blo_cur_sha;

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_previous_sha1_display_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= '<br><br>';
  $html_str .= irp_provide ('block_previous_sha1_display_title', $here);
  $html_str .= '<br>';
  $html_str .= irp_provide ('block_previous_sha1_display_content', $here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

# links for actions on current item

function block_current_action_display_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $en_tit = 'select one of the actions to be performed on current block';
  $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
  $la_Tit = string_html_capitalized_of_string ($la_bub_tit);
  $la_colon = language_translate_of_en_string_of_language (':', $lan);

  $la_Tit = '<b>' . $la_Tit . $la_colon . '</b>';

  $html_str = common_html_background_color_of_html ($la_Tit);
  
  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_current_display_action_link_of_en_block_action ($nof_mod, $nam_ent, $nam_blo_cur, $la_act_blo) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($en_act_blo)");

  $html_str  = '';
  $html_str .= '<a href="'. $nof_mod . '?entry_name=' . $nam_ent . '&block_current_name=' . $nam_blo_cur . '">';
  $html_str .= $la_act_blo;
  $html_str .= '</a>';

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_current_action_display_links_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

    $nam_blo_cur = irp_provide ('block_current_name', $here);
    $nam_ent = irp_provide ('entry_name', $here);
    $lan = $_SESSION['parameters']['language'];

    $en_act_blo_a = array ('delete', 'history', 'rename');

    $html_str = '';
    foreach ($en_act_blo_a as $en_act_blo) {

        $nof_mod = "block_current_" . $en_act_blo . ".php";
        debug_n_check ($here , '$nof_mod',  $nof_mod);
        $la_act_blo = language_translate_of_en_string_of_language ($en_act_blo, $lan);

        $html_str .= '<a href="'. $nof_mod . '?entry_name=' . $nam_ent . '&block_current_name=' . $nam_blo_cur . '">';
        $html_str .= $la_act_blo;
        $html_str .= '</a>';
        
        $html_str .= '&nbsp;&nbsp;&nbsp;&nbsp;';
    }

    debug_n_check ($here , '$html_str', $html_str);
    exiting_from_function ($here);
    return $html_str;
}

function block_current_action_display_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= '<br><br>';
  $html_str .= irp_provide ('block_current_action_display_title', $here);
  $html_str .= '<br>';
  $html_str .= irp_provide ('block_current_action_display_links', $here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Page block */

function block_current_display_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $nam_ent = irp_provide ('entry_name', $here);
  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);
  $sur_ent = surname_of_name_of_surname_by_name_array ($nam_ent, $sur_by_nam_a);

  $nof_mod = 'entry_display.php';

  $html_str  = '';
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);
  $html_str .= irp_provide ('block_current_display_section_page_title', $here);

  $html_str .= irp_provide ('item_current_content_display', $here);
  $html_str .= irp_provide ('item_current_action_display', $here);
  $html_str .= irp_provide ('item_current_justification_display', $here);
  $html_str .= irp_provide ('item_previous_content_display', $here); 

  $html_str .= irp_provide ('block_previous_sha1_display', $here); 
  $html_str .= irp_provide ('block_current_action_display', $here);

  $html_str .= '<br><br>';
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_module_nameoffile_of_language ($nam_ent, $sur_ent, $nof_mod, $lan);

  $html_str .= irp_provide ('pervasive_html_final_section', $here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  return $html_str;
}

# exiting_from_module ($module);

?>