<?php
require_once "common_html_functions.php";
require_once "language_translate_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

# entering_in_module ($module);

$Documentation[$module]['module_fullnameoffile'] = "the name of the php file with its path"; 
$Documentation[$module]['module_nameoffile'] = "the name of the php file without its path"; 
$Documentation[$module]['module_name_of_module_fullnameoffile'] = "the name of the php file without its path without .php extension"; 

function link_to_return_of_entry_name_of_entry_surname_of_return_module_nameoffile ($nam_ent, $sur_ent, $nof_mod) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent, $sur_ent, $nof_mod)");

  $lan = $_SESSION['parameters']['language'];
  $en_txt = 'back to the entry';
  $la_txt = language_translate_of_en_string ($en_txt);
  $la_Txt  = string_html_capitalized_of_string ($la_txt);

  debug_n_check ("$here", '$la_Txt', $la_Txt);

  $html_str  = '';
  $html_str .= '<center> ';
  $html_str .= '<a href="' . $nof_mod . '?entry_name=' . $nam_ent . '">';
  $html_str .= $la_Txt. ' ' . $sur_ent;
  $html_str .= '</a>';
  $html_str .= '</center> ';
 
  exiting_from_function ($here);

  return $html_str;
}

function link_to_return_of_return_module_nameoffile ($nof_mod) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nof_mod)");

  $nam_mod = str_replace ('.php', '', $nof_mod);

  $lan = $_SESSION['parameters']['language'];
  $la_txt = language_translate_of_en_string ('back to the module');
  $la_Txt = string_html_capitalized_of_string ($la_txt);

  debug_n_check ("$here", '$la_Txt', $la_Txt);

  $html_str  = '';
  $html_str .= '<center> ';
  $html_str .= '<a href="' . $nof_mod . '">';
  $html_str .= $la_Txt. ' ' . $nam_mod;
  $html_str .= '</a>';
  $html_str .= '</center> ';
 
  exiting_from_function ($here);

  return $html_str;
}

# exiting_from_module ($module);

?>