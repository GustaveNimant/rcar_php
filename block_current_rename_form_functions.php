<?php

require_once "irp_functions.php";
require_once "common_html_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function block_current_rename_form_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_name', $here);
  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);
  $sur_ent = surname_of_name_of_surname_by_name_array ($nam_ent, $sur_by_nam_a);

  $nof_mod = 'entry_display.php';

  $html_str  = comment_entering_of_function_name ($here);

  $html_str .= '<form action="block_current_rename_save.php" method="get"> ' . "\n";
  $html_str .= '<br><br>';
  $html_str .= irp_provide ('block_current_rename_newname_surname', $here);
  $html_str .= '<br><br><br>';
  $html_str .= irp_provide ('block_current_rename_justification', $here);
  $html_str .= '<br><br>';
  $html_str .= '<center>' . "\n";
  $html_str .= inputtypesubmit_of_en_action_name ('save');
  $html_str .= '</center>' . "\n";
  $html_str .= '</form>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>