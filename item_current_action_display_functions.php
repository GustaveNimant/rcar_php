<?php

require_once "common_html_functions.php";
require_once "language_translate_functions.php";
require_once "irp_functions.php";

$module = "item_current_action_display_functions";
# entering_in_module ($module);

function item_current_action_display_links_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

    $nam_blo_cur = irp_provide ('block_current_name', $here);
    $nam_ent = irp_provide ('entry_name', $here);
    $lan = $_SESSION['parameters']['language'];

    $en_act_ite = 'modify';

    $nof_mod = "item_current_" . $en_act_ite . ".php";
    debug_n_check ($here , '$nof_mod',  $nof_mod);
    $la_act_ite = language_translate_of_en_string_of_language ($en_act_ite, $lan);

    $html_str .= '<a href="'. $nof_mod . '?entry_name=' . $nam_ent . '&block_current_name=' . $nam_blo_cur . '">';
    $html_str .= $la_act_ite;
    $html_str .= '</a>';

    debug_n_check ($here , '$html_str', $html_str);
    exiting_from_function ($here);
    return $html_str;
}

function item_current_action_display_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= '<br><br>';
  $html_str .= irp_provide ('item_current_action_display_links', $here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

# exiting_from_module ($module);

?>