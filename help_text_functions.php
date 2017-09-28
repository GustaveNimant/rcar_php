<?php

function help_text_of_help_key_of_language ($key_hel, $lan) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($key_hel, $lan)");

  include "help_text_translate_register.php";

  # debug_n_check ($here, '$help_text_by_language_by_item_a', $help_text_by_language_by_item_a);

  foreach ($help_text_by_language_by_item_a as $hel_key => $txt_by_la_a) {
    $txt_hel = $txt_by_la_a[$lan];
  }

  $html_str  = '';
  $html_str .=     '<help title="';
  $html_str .= $txt_hel;
  $html_str .= '"/>?</help> ';

  exiting_from_function ($here);
  return $html_str;

}

?>