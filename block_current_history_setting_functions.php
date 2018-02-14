<?php
require_once "irp_library.php";
require_once "date_selected_functions.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function block_current_history_setting_page_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);
  $sur_blo_cur = irp_provide ('block_current_surname_from_block_current_name', $here);
  $kin_blo = irp_provide ('entry_block_kind', $here);

  $en_tit = 'page for selecting the limits of the history of the ' . $kin_blo;  

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit  = string_html_capitalized_of_string ($la_bub_tit);
  $la_bub_Tit .= ' <i><b> ' . $sur_blo_cur . '</b></i> '; 

  $en_tit = 'for entry';
  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit .= $la_bub_tit;
  $la_bub_Tit .= ' <i><b> ' . $sur_ent_cur . '</b></i> '; 
  
  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center>';
  $html_str .= common_html_div_background_color_of_html ($la_bub_Tit);
  $html_str .= '</center>';
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_current_history_setting_form_build (){
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $script_action = 'block_current_history_display_script.php';

    $la_Nam_act = ucfirst (language_translate_of_en_string ('validate'));

    $la_Nam_yea = ucfirst (language_translate_of_en_string ('year'));
    $la_Nam_mon = ucfirst (language_translate_of_en_string ('month'));
    $la_Nam_day = ucfirst (language_translate_of_en_string ('day'));

    $html_str  = comment_entering_of_function_name ($here);

    $html_str .= '<form action="' . $script_action . '" method="get">';
    $html_str .= '<table>';
    $html_str .= '<tr>';
    $html_str .= '<td></td>';
    $html_str .= "<td>$la_Nam_yea</td>";
    $html_str .= "<td>$la_Nam_mon</td>";
    $html_str .= "<td>$la_Nam_day</td>";
    $html_str .= '</tr>';
    $html_str .= '<tr>';
    $html_str .= since_date_html_make ();
    $html_str .= '</tr>';
    $html_str .= '<tr>';
    $html_str .= before_date_html_make ();
    $html_str .= '</tr>';
    $html_str .= '</table>';
    $html_str .= '<center>';
    $html_str .= '<input type="submit" value="' . $la_Nam_act . '">' . "\n";
    $html_str .= '</center>';
    $html_str .= '</form>';

    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here , '$html_str',  $html_str);
    exiting_from_function ($here);

  return $html_str;
}


function block_current_history_setting_link_to_return_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent_cur = irp_provide ('entry_current_name', $here);
  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);

  $script_to_return = 'entry_current_display_script.php';

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center>' . "\n";
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_script_to_return ($nam_ent_cur, $sur_ent_cur, $script_to_return);
  $html_str .= '</center>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_current_history_setting_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('pervasive_page_header', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('block_current_history_setting_page_title', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('block_current_history_setting_form', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('block_current_history_setting_link_to_return', $here);

  $html_str .= irp_provide ('pervasive_page_footer', $here);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>