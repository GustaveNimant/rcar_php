<?php
require_once "common_html_functions.php";
require_once "language_translate_functions.php";

$module = module_name (__FILE__);

# entering_in_module ($module);

$Documentation[$module]['module_fullnameoffile'] = "the name of the php file with its path"; 
$Documentation[$module]['module_nameoffile'] = "the name of the php file without its path"; 
$Documentation[$module]['module_name'] = "the name of the php file without its path without .php extension"; 

function link_is_ok_of_module_name ($nam_mod) {

    $boo = ! (
        (is_substring_of_substring_off_string ("http:", $nam_mod))
        ||
        (is_substring_of_substring_off_string ("?", $nam_mod))
        ||
        (is_substring_of_substring_off_string (".php", $nam_mod))
        ||
        (is_substring_of_substring_off_string ("\/", $nam_mod))
    );
    
    return $boo;
}

function link_module_name_of_module_nameoffile ($nof_mod) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nof_mod)");

  $ind_php = stripos ($nof_mod, '.php');
  $nam_mod = basename (substr ($nof_mod, 0, $ind_php));

  /* if (is_empty_of_string ($nam_mod)) { */
  /*     print_fatal_error ($here, */
  /*     "\$nam_mod were NOT empty", */
  /*     "it is EMPTY", */
  /*     "Check HTTP_REFERER = >$url_rel<"); */
  /* } */

  debug_n_check ("$here", '$nam_mod', $nam_mod);
  exiting_from_function ($here);

  return $nam_mod;
}

function link_module_name_of_url_relative ($url_rel) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($url_rel)");

  $nof_mod = str_replace ('http://', '', $url_rel); 
  $nam_mod = link_module_name_of_module_nameoffile ($nof_mod);

  debug_n_check ("$here", '$nam_mod', $nam_mod);
  exiting_from_function ($here);

  return $nam_mod;
}

function link_previous_module_name_make () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $url_rel = $_SERVER["HTTP_REFERER"];
  print_long ($here, '$url_rel >' . $url_rel . '<');

  if (is_empty_of_string ($url_rel)) {
      $url_rel = 'http://top.php';
  }

  $pre_mod = link_module_name_of_url_relative ($url_rel);

  debug_n_check ($here, '$pre_mod', $pre_mod);
  exiting_from_function ($here);

  return $pre_mod;
}

function link_to_return_of_entry_name_of_entry_surname_of_return_module_nameoffile ($nam_ent, $sur_ent, $nof_mod) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent, $sur_ent, $nof_mod)");

  $lan = $_SESSION['parameters']['language'];
  $en_txt = 'back to the entry';
  $la_txt = language_translate_of_en_string_of_language ($en_txt, $lan);
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
  $la_txt = language_translate_of_en_string_of_language ('back to the module', $lan);
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