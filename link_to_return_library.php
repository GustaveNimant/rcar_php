<?php
require_once "common_html_library.php";
require_once "management_library.php";
require_once "language_translate_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

$Documentation[$module]['module_fullnameoffile'] = "the name of the php file with its path"; 
$Documentation[$module]['module_nameoffile'] = "the name of the php file without its path"; 
$Documentation[$module]['module_name_of_module_fullnameoffile'] = "the name of the php file without its path without .php extension"; 
$Documentation[$module]['link_to_return'] = '<a href="module_name.php">clickable_text</a>';
$Documentation[$module]['link_to_return_with_get'] = '<a href="module_name.php?get_key=get_val">clickable_text</a>';

function link_to_return_of_string_of_get_key_of_get_val_of_script_to_return ($str, $get_key, $get_val, $scr_ret) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($str, $get_key, $get_val, $scr_ret)");

  $_SESSION['link_to_return'][$scr_ret][$get_key] = $get_val;

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<a href="' . $scr_ret; 
  $html_str .= '?'. $get_key .'=' . $get_val;
  $html_str .= '">';
  $html_str .= $str;
  $html_str .= '</a>';
  $html_str .= comment_exiting_of_function_name ($here);

  exiting_from_function ($here);

  return $html_str;
}

function link_to_return_of_script_to_return_of_get_key_of_get_val ($scr_ret, $get_key, $get_val) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($scr_ret)");

  $_SESSION['link_to_return'][$scr_ret][$get_key] = $get_val;

  $nam_mod = str_replace ('.php', '', $scr_ret);

  $en_tit = 'back to';
  $la_tit = language_translate_of_en_string ($en_tit);
  $la_Tit = string_html_capitalized_of_string ($la_tit);

  debug_n_check ("$here", '$la_Tit', $la_Tit);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<a href="' . $scr_ret . '?' . $get_key . '=' . $get_val . '">';
  $html_str .= $la_Tit. ' ' . '<b>' . $nam_mod . '</b>';
  $html_str .= '</a>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  exiting_from_function ($here);

  return $html_str;
}

function link_to_return_of_entry_name_of_entry_surname_of_script_to_return ($nam_ent, $sur_ent, $scr_ret) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent, $sur_ent, $scr_ret)");

  $en_tit = 'back to entry';

  $la_tit = language_translate_of_en_string ($en_tit);
  $la_Tit = string_html_capitalized_of_string ($la_tit);

  debug_n_check ("$here", '$la_Tit', $la_Tit);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<a href="' . $scr_ret; 
  $html_str .= '?entry_current_name=' . $nam_ent;
  $html_str .= '">';
  $html_str .= $la_Tit. ' <b><i>' . $sur_ent . '</i></b>';
  $html_str .= '</a>';
  $html_str .= comment_exiting_of_function_name ($here);

  exiting_from_function ($here);

  return $html_str;
}

function link_to_return_of_script_to_return ($scr_ret) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($scr_ret)");

  $nam_scr = str_replace ('.php', '', $scr_ret);

  $en_tit = 'back to script';

  $la_tit = language_translate_of_en_string ($en_tit);
  $la_Tit = string_html_capitalized_of_string ($la_tit);

  debug_n_check ("$here", '$la_Tit', $la_Tit);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<a href="' . $scr_ret . '">';
  $html_str .= $la_Tit. ' ' . '<b>' . $nam_scr . '</b>';
  $html_str .= '</a>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  exiting_from_function ($here);

  return $html_str;
}

function link_to_return_of_la_title_of_script_to_return ($la_tit, $scr_ret) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($la_tit, $scr_ret)");

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<a href="' . $scr_ret . '">';
  $html_str .= $la_tit;
  $html_str .= '</a>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);
  
  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>