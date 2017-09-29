<?php

require_once "irp_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "display the possible actions to be done on a block"; 
$Documentation[$module]['what for'] = "to delete, show history, rename"; 

entering_in_module ($module);

function block_current_display_actions_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $en_tit = 'select one of the actions to be performed on current block';
  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_Tit = string_html_capitalized_of_string ($la_bub_tit);
  $la_colon = language_translate_of_en_string (':');

  $la_Tit = '<b>' . $la_Tit . $la_colon . '</b>';

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= common_html_background_color_of_html ($la_Tit);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_current_display_actions_link_of_en_block_action ($nof_mod, $nam_ent, $nam_blo_cur, $la_act_blo) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($en_act_blo)");

  $html_str  = comment_entering_of_function_name ($here);
  $html_str  = "\n";
  $html_str .= '<a href="'. $nof_mod . '?entry_name=' . $nam_ent . '&block_current_name=' . $nam_blo_cur . '">';
  $html_str .= $la_act_blo;
  $html_str .= '</a>' . "\n";

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_current_display_actions_links_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

    $nam_blo_cur = irp_provide ('block_current_name', $here);
    $nam_ent = irp_provide ('entry_name', $here);
    $lan = $_SESSION['parameters']['language'];

    $en_act_blo_a = array ('delete', 'history', 'rename');

    $html_str  = comment_entering_of_function_name ($here);
    foreach ($en_act_blo_a as $en_act_blo) {

        $nof_mod = 'block_current_' . $en_act_blo . '_display.php';
        debug_n_check ($here , '$nof_mod',  $nof_mod);
        $la_act_blo = language_translate_of_en_string ($en_act_blo);

        $html_str .= '<a href="'. $nof_mod . '?entry_name=' . $nam_ent . '&block_current_name=' . $nam_blo_cur . '">';
        $html_str .= $la_act_blo;
        $html_str .= '</a>';
        
        $html_str .= '&nbsp;&nbsp;&nbsp;&nbsp;';
    }
    $html_str .= comment_exiting_of_function_name ($here); 

    debug_n_check ($here , '$html_str', $html_str);
    exiting_from_function ($here);
    
    return $html_str;
}

function block_current_display_actions_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<br><br>';
  $html_str .= irp_provide ('block_current_display_actions_title', $here);
  $html_str .= '<br>';
  $html_str .= irp_provide ('block_current_display_actions_links', $here);
  $html_str .= comment_exiting_of_function_name ($here); 

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>