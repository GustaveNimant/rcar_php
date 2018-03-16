<?php

require_once "language_translate_library.php";
require_once "file_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['placeholder'] = "in a textarea a documentation or example text to be over-written";


function a_href_of_entry_name_of_script_nameoffile_of_block_current_name_of_en_action ($nam_ent, $nof_scr, $nam_blo_cur, $en_act) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent, $nof_scr, $nam_blo_cur, $en_act)");

  $la_act = language_translate_of_en_string ($en_act);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<a href="'. $nof_scr . '?'; 
  $html_str .= 'entry_current_name=' . $nam_ent;
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
  $html_str .= '<input type="hidden" name="' . $get_key . '"';
  $html_str .= ' value="' . $get_val;
  $html_str .= '"> ' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);
  
  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  
  return $html_str;
}

function inputtypereset_of_en_action_name () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $la_Nam_act = ucfirst (language_translate_of_en_string ('reset'));

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<input type="reset" value="' . $la_Nam_act . '">' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  
  return $html_str;
}

function inputtypesubmit_of_en_action_name ($en_nam_act) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($en_nam_act)");

  $la_Nam_act = ucfirst (language_translate_of_en_string ($en_nam_act));

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<input type="submit" value="' . $la_Nam_act . '">' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  
  return $html_str;
}

function inputtypesubmit_la_translate_of_en_action_name_of_button_name ($en_nam_act, $nam_but) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($en_nam_act, $nam_but)");

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

function inputtypetext_of_get_key_of_placeholder ($get_key, $pla_hol) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($get_key, $pla_hol)");

  $tex_siz = $_SESSION['parameters']['html_input_text_size'];

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<input type="text"' . "\n"; 
  $html_str .= ' name="';
  $html_str .= $get_key;
  $html_str .= '"' . "\n";
  $html_str .= ' placeholder="';
  $html_str .= $pla_hol;
  $html_str .= '"' . "\n";
  $html_str .= ' size="';
  $html_str .= $tex_siz;
  $html_str .= '">' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  
  return $html_str;
}

function inputtypetext_of_get_key_of_default_value ($get_key, $def_val) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($get_key, $def_val)");

  $tex_siz = $_SESSION['parameters']['html_input_text_size'];

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<input type="text"' . "\n"; 
  $html_str .= ' name="';
  $html_str .= $get_key;
  $html_str .= '"' . "\n";
  $html_str .= ' value="';
  $html_str .= $def_val;
  $html_str .= '"' . "\n";
  $html_str .= ' size="';
  $html_str .= $tex_siz;
  $html_str .= '">' . "\n";
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
    
    $la_Pla = ucfirst (language_translate_of_en_string ($en_pla));
    
    $row_hta = $_SESSION['parameters']['html_textarea_rows'];
    $col_hta = $_SESSION['parameters']['html_textarea_cols'];
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<textarea name="' . $entity_textarea . '" ';
    $html_str .= 'placeholder="';
    $html_str .= $la_Pla;
    $html_str .= '" ';
    $html_str .= 'rows="' . $row_hta . '" cols="' .$col_hta . '">';
    $html_str .= '</textarea> ' . "\n";
    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here , '$html_str', $html_str);
    exiting_from_function ($here . " ($get_key, $en_pla)");
    
    return $html_str;
}

function textarea_of_la_string ($str) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($str)");
    
    $row_hta = $_SESSION['parameters']['html_textarea_rows'];
    $col_hta = $_SESSION['parameters']['html_textarea_cols'];
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str  = '<textarea ';
    $html_str .= 'rows="' . $row_hta . '" cols="' .$col_hta;
    $html_str .= '">';
    $html_str .= $str;
    $html_str .= '</textarea> ' . "\n";
    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here , '$html_str', $html_str);
    exiting_from_function ($here . " ($str)");
    
    return $html_str;
}

function textarea_disabled_of_la_string ($str) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($str)");
    
    $row_hta = $_SESSION['parameters']['html_textarea_rows'];
    $col_hta = $_SESSION['parameters']['html_textarea_cols'];
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<textarea disabled ';
    $html_str .= 'rows="' . $row_hta . '" cols="' .$col_hta;
    $html_str .= '">';
    $html_str .= $str;
    $html_str .= '</textarea> ' . "\n";
    $html_str .= comment_exiting_of_function_name ($here);
      
    debug_n_check ($here , '$html_str', $html_str);
    exiting_from_function ($here . " ($str)");
    
    return $html_str;
}

function div_of_string ($str) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($str)");
  
  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<div style="width:500px; height:50px">';
  $html_str .= $str;
  $html_str .= '</div>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);
  
  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here . " ($str)");
  
  return $html_str;
}

function span_class_of_name_of_en_text ($nam, $en_txt) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam, $en_txt)");

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


?>
