<?php
require_once "debug_library.php";

function button_hidden ($key_get, $val_but) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($key_get, $val_but)");

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<input type="hidden"';
  $html_str .= ' name="' . $key_get . '"';
  $html_str .= ' value="' . $val_but . '"/> ';
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function button_radio ($key_get, $val_but) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($key_get, $val_but)");

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<input type="radio"';
  $html_str .= ' name="' . $key_get . '"';
  $html_str .= ' value="' . $val_but . '"/> ';
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function button_radio_from_to ($nam_blo) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_blo)");

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<td width=10%> ';
  $html_str .= button_radio ('from', $nam_blo);
  $html_str .= '</td> ';
  $html_str .= '<td width=10%> ';
  $html_str .= button_radio ('to', $nam_blo);
  $html_str .= '</td> ';
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

?>
