<?php

require_once "help_text_translate_register.php";

function help_text_of_string_key_of_language ($str_key, $lan) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($str_key, $lan)");

  global $help_text_by_language_by_item_a;

  # debug_n_check ($here, '$help_text_by_language_by_item_a', $help_text_by_language_by_item_a);

  $help_text_by_item_by_language_a = array ();
  foreach ($help_text_by_language_by_item_a as $en_key => $val_a) {
      foreach ($val_a as $la => $text) {
          $help_text_by_item_by_language_a[$la][$en_key] = $text;
      }
  }

  $txt_by_key_a = $help_text_by_item_by_language_a[$lan];
  $str_out = array_retrieve_value_of_key_of_array ($str_key, $txt_by_key_a);

  $html_str  = '';
  $html_str .=     '<help title="';
  $html_str .= $str_out;
  $html_str .= '"/>?</help> ';

  exiting_from_function ($here);
  debug_n_check ($here, '$str_out', $str_out);
  
  return $html_str;
}

?>