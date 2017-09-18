<?php

require_once "irp_functions.php";
require_once "common_html_functions.php";

$module = module_name (__FILE__);

# entering_in_module ($module);

function block_current_rename_form_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $nam_ent = irp_provide ('entry_name', $here);
  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);
  $sur_ent = surname_of_name_of_surname_by_name_array ($nam_ent, $sur_by_nam_a);

  $nof_mod = 'entry_display.php';

  $html_str  = '';
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);
  $html_str .= irp_provide ('block_current_rename_form_page_title', $here);

  $html_str .= '<form' . "\n";
  $html_str .= method_get_in_form_of_action_module_of_shift ('block_current_rename_save.php', '  ');
  $html_str .= '> '; 

  $html_str .= '<br><br> ';
  $html_str .= irp_provide ('block_current_rename_newname', $here);
  $html_str .= '<br><br><br> ';
  $html_str .= irp_provide ('block_current_rename_justification', $here);
  $html_str .= '<br><br> ';
  $html_str .= button_submit_centered_of_button_value_en_of_language ('save', $lan);
  $html_str .= '</form> ' . "\n";

  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_return_module_nameoffile ($nam_ent, $sur_ent, $nof_mod, $lan);
  $html_str .= irp_provide ('pervasive_html_final_section', $here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

# exiting_from_module ($module);

?>