<?php
require_once "management_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function help_text_of_help_key ($key_hel) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($key_hel)");

  include "help_text_translate_register.php";

  # debug_n_check ($here, '$help_text_by_language_by_item_a', $help_text_by_language_by_item_a);

  $lan = $_SESSION['parameters']['language'];

  foreach ($help_text_by_language_by_item_a as $hel_key => $txt_by_la_a) {
    $txt_hel = $txt_by_la_a[$lan];
  }

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<help title="';
  $html_str .= $txt_hel;
  $html_str .= '"/>?</help>';
  $html_str .= comment_exiting_of_function_name ($here);

  exiting_from_function ($here);
  return $html_str;

}

?>