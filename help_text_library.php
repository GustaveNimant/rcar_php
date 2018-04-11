<?php
require_once "management_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);


function help_text_of_help_key ($key_hel) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($key_hel)");

  include "help_text_translate_hash.php";
  debug_n_check ($here, '$help_text_by_language_by_item_h', $help_text_by_language_by_item_h);

  $lan = $_SESSION['parameters']['language'];


  if (isset ($help_text_by_language_by_item_h[$key_hel])) {
      $la_txt_hel = $help_text_by_language_by_item_h[$key_hel][$lan];
  }
  else {
      print_fatal_error ($here,
      "help key >$key_hel< were defined in hash",
      "it is NOT",
      "add it to hash in module help_text_translate_hash.php");
  }

  debug_n_check ($here, '$la_txt_hel', $la_txt_hel);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<help title="';
  $html_str .= $la_txt_hel;
  $html_str .= '"/>?</help>';
  $html_str .= comment_exiting_of_function_name ($here);

  exiting_from_function ($here);
  return $html_str;

}


?>