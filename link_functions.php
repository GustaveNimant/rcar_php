<?php
require_once "file_functions.php";
require_once "language_translate_functions.php";

$module = module_name_of_module_nameoffile (__FILE__);

# entering_in_module ($module);

$Documentation[$module]['module_fullnameoffile'] = "the name of the php file with its path"; 
$Documentation[$module]['module_nameoffile'] = "the name of the php file without its path"; 
$Documentation[$module]['module_name_of_module_nameoffile'] = "the name of the php file without its path without .php extension"; 

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

function link_module_name_of_url_relative ($url_rel) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($url_rel)");

  $nof_mod = str_replace ('http://', '', $url_rel); 
  $nam_mod = module_name_of_module_nameoffile ($nof_mod);

  exiting_from_function ($here . ' with $nam_mod >' . $nam_mod . '<');

  return $nam_mod;
}

function link_previous_module_name_make () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  if (isset ($_SERVER["HTTP_REFERER"]) ) {
      $url_rel = $_SERVER["HTTP_REFERER"];
      print_long ($here, '$url_rel >' . $url_rel . '<');
      if (is_empty_of_string ($url_rel)) {
          $url_rel = 'http://top.php';
      }
  }  
  else {    
      $url_rel = 'http://top.php';
  }
  
  $pre_mod = link_module_name_of_url_relative ($url_rel);

  exiting_from_function ($here . ' with $pre_mod >' . $pre_mod . '<');

  return $pre_mod;
}

# exiting_from_module ($module);

?>