<?php

require_once "debug_functions.php";

$module = "button_functions";
# entering_in_module ($module);

function button_radio ($key_get, $val_but) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($key_get, $val_but)");

  $html_str  = '';
  $html_str .= '<input type="radio"';
  $html_str .= ' name="' . $key_get . '"';
  $html_str .= ' value="' . $val_but . '"/> ';

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;

  }

function button_hidden ($key_get, $val_but) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($key_get, $val_but)");

  $html_str  = '';
  $html_str .= '<input type="hidden"';
  $html_str .= ' name="' . $key_get . '"';
  $html_str .= ' value="' . $val_but . '"/> ';

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;

  }

function button_radio_from_after_before_of_entry_name_of_item_name_of_language ($nam_ent, $nam_ite, $lan) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent, $nam_ite, $lan)");

  $html_str = '';
  $html_str .= '<br> ' . "\n";

  $html_str .= '<input type="radio" name="from" value="' . $nam_ite . '"/> ';
  $html_str .= language_translate_of_en_string_of_language ('From', $lan) . "\n";
  $html_str .= '<br> ' . "\n";


  $html_str .= '<input type="radio" name="after" value="' . $nam_ite . '"/> ';
  $html_str .= language_translate_of_en_string_of_language ('After', $lan) . "\n";
  $html_str .= '<br> ' . "\n";

  $html_str .= '<input type="radio" name="before" value="' . $nam_ite . '"/> ';
  $html_str .= language_translate_of_en_string_of_language ('Before', $lan) . "\n";
  $html_str .= '<br> ' . "\n";

  $html_str .= '  <input type="hidden" name="entry_name" value="';
  $html_str .= $nam_ent;
  $html_str .= '" /> ' .  "\n";

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;

}

function button_radio_from_to ($nam_ite) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ite)");

  $html_str  = '';
  $html_str .= '<td width=10%> ';
  $html_str .= button_radio ('from', $nam_ite);
  $html_str .= '</td> ';
  $html_str .= '<td width=10%> ';
  $html_str .= button_radio ('to', $nam_ite);
  $html_str .= '</td> ';

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;

}


# exiting_from_module ($module);

?>
