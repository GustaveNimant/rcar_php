<?php

require_once "irp_functions.php";

$module = module_name (__FILE__);

$Documentation[$module]['what is it'] = "display the action to be done on a block"; 

# entering_in_module ($module);

function block_current_display_action_title_build () {
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
  $html_str  = "\n";
  $html_str .= '<a href="'. $nof_mod . '?entry_name=' . $nam_ent . '&block_current_name=' . $nam_blo_cur . '">';
  $html_str .= $la_act_blo;
  $html_str .= '</a>' . "\n";

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_current_display_action_links_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

    $nam_blo_cur = irp_provide ('block_current_name', $here);
    $nam_ent = irp_provide ('entry_name', $here);
    $lan = $_SESSION['parameters']['language'];

    $en_act_blo_a = array ('delete', 'history', 'rename');

    $html_str = '';
    foreach ($en_act_blo_a as $en_act_blo) {

        $nof_mod = 'block_current_' . $en_act_blo . '_form.php';
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

function block_current_display_action_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= '<br><br>';
  $html_str .= irp_provide ('block_current_display_action_title', $here);
  $html_str .= '<br>';
  $html_str .= irp_provide ('block_current_display_action_links', $here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

# exiting_from_module ($module);

?>