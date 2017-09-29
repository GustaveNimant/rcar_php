<?php

require_once "language_translate_functions.php";
require_once "file_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['placeholder'] = "in a textarea a documentation or example text to be over-written";

entering_in_module ($module);

function a_href_of_entry_name_of_script_nameoffile_of_block_current_name_of_en_action ($nam_ent, $nof_scr, $nam_blo_cur, $en_act) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent, $nof_scr, $nam_blo_cur, $en_act)");

  $lan = $_SESSION['parameters']['language'];
  $la_act = language_translate_of_en_string ($en_act);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<a href="'. $nof_scr . '?'; 
  $html_str .= 'entry_name=' . $nam_ent;
  $html_str .= '&block_current_name=' . $nam_blo_cur ; 
  $html_str .= '">';
  $html_str .= $la_act;
  $html_str .= '</a>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  
  return $html_str;
}

function form_action_get_of_script_nameoffile_of_en_value_of_en_text ($nof_scr, $en_val, $en_txt) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nof_scr, $en_val, $en_txt)");

  $lan = $_SESSION['parameters']['language'];
  $la_val = ucfirst (language_translate_of_en_string ($en_val));
  $la_txt = ucfirst (language_translate_of_en_string ($en_txt));

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<form ' . "\n";
  $html_str .= 'action="' . $nof_scr . '" ';
  $html_str .= 'method="get"' . "\n";
  $html_str .= $shi . $shi . '> ' . "\n";
  $html_str .= $shi . $shi;
  $html_str .= '<input type="submit" value="';
  $html_str .= $la_val;
  $html_str .= '" title="';
  $html_str .= $la_txt;
  $html_str .= '" ';
  $html_str .= 'font-variant:small-caps; background-color:red '; /* incorrect */
  $html_str .= '> ' . "\n";
  $html_str .= $shi;
  $html_str .= '</form> ' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  
  return $html_str;
}

function inputtypehidden_store_of_get_key_of_get_value ($get_key, $get_val) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($get_key, $get_val)");

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<input type="hidden" name="' . $get_key . '" ' . "\n";
  $html_str .= 'value="' . $get_val;
  $html_str .= '"> ' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);
  
  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  
  return $html_str;
}

function inputtypesubmit_of_en_action_name ($en_nam_act) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($en_nam_act)");

  $lan = $_SESSION['parameters']['language'];
  $la_Nam_act = ucfirst (language_translate_of_en_string ($en_nam_act));

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<input type="submit" value="' . $la_Nam_act . '">' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  
  return $html_str;
}

function inputtypesubmit_of_en_action_name_of_button_name ($en_nam_act, $nam_but) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($en_nam_act, $nam_but)");

  $lan = $_SESSION['parameters']['language'];
  $la_Nam_act = ucfirst (language_translate_of_en_string ($en_nam_act));

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<input type="submit" value="' . $la_Nam_act . '" name="' . $nam_but . '">';
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  
  return $html_str;
}

function inputtypesubmit_of_en_action_name_of_en_bubble ($en_nam_act, $en_bub) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($en_nam_act, $en_bub)");
    
    $lan = $_SESSION['parameters']['language'];
    $la_Nam_act = ucfirst (language_translate_of_en_string ($en_nam_act));
    $la_bub = ucfirst (language_translate_of_en_string ($en_bub));
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<input type="submit" value="' . $la_Nam_act . '"'.  "\n";
    $html_str .= 'title="';
    $html_str .= $la_bub;
    $html_str .= '">' . "\n";
    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here , '$html_str', $html_str);
    exiting_from_function ($here);
  
  return $html_str;
}

function inputtypetext_of_get_key_of_en_placeholder ($get_key, $en_pla) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($get_key, $en_pla, $shi)");

  $la_Pla = ucfirst (language_translate_of_en_string ($en_pla));

  $tex_siz = $_SESSION['parameters']['html_text_zone_size'];

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<input type="text" ' . "\n"; 
  $html_str .= $shi;
  $html_str .= 'name="';
  $html_str .= $get_key;
  $html_str .= '" ' . "\n";
  $html_str .= 'placeholder="';
  $html_str .= $la_Pla;
  $html_str .= '" ' . "\n";
  $html_str .= 'size="';
  $html_str .= $tex_siz;
  $html_str .= '"> ' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  
  return $html_str;
}

function goto_of_script_action_of_message_of_action_name ($scr_act, $mes, $nam_act) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($scr_act, $nam_act)");

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<form action="'. $scr_act .'" method="get"> ' . "\n";
  $html_str .= $mes;
  $html_str .= inputtypesubmit_of_en_action_name ($nam_act);
  $html_str .= '</form> ' .  "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  
  return $html_str;
}


function textarea_of_get_key_of_en_placeholder ($get_key, $en_pla) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($get_key, $en_pla)");

  $lan = $_SESSION['parameters']['language'];
  $la_Pla = ucfirst (language_translate_of_en_string ($en_pla));

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<textarea name="' . $get_key . '" ';
  $html_str .= 'placeholder="';
  $html_str .= $la_Pla;
  $html_str .= '" ';
  $html_str .= 'rows="2" cols="100">' . "\n";
  $html_str .= '</textarea> ' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  
  return $html_str;
}

function span_class_of_name_of_en_text ($nam, $en_txt) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam, $en_txt)");

  $lan = $_SESSION['parameters']['language'];
  $la_txt = language_translate_of_en_string ($en_txt);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<span class="my-fieldset">' . "\n";
  $html_str .= $nam . ' : ';
  $html_str .= '<b>';
  $html_str .= '<font color="red">';
  $html_str .= $la_txt;
  $html_str .= '</font>';
  $html_str .= '</b>';
  $html_str .= '</span>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);
  
  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  
  return $html_str;
}

exiting_from_module ($module);

?>
