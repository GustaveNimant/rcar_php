<?php

require_once "irp_functions.php";
require_once "bubble_functions.php";
require_once "button_submit_functions.php";
require_once "common_html_functions.php";

$module = module_name (__FILE__);

# entering_in_module ($module);

/* Second Section Item_Current Content Old */


/* Third Section Item_Current Content New Create */
/* Third Section Item_Current Content New Create Title */


/* Fourth Section Modification Justify */

/* Fourth Section Item_Current Justify New Create Title */

function item_current_modify_form_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $nam_ent = irp_provide ('entry_name', $here);
  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);

  $sur_ent = surname_of_name_of_surname_by_name_array ($nam_ent, $sur_by_nam_a);

  $script_action = 'block_content_modify_save.php';

  $html_str  = '';
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);
  $html_str .= irp_provide ('item_current_modify_form_page_title', $here);
  $html_str .= '<form> ' . "\n";
  $html_str .= method_get_in_form_of_action_module_of_shift ('block_current_modify_save.php', ' ');
  $html_str .= '> ';
  $html_str .= form_array_dollar_get_store_of_key_of_value_of_here ('item_current_action', 'modify', $here);

  $html_str .= '<br><br>';
  $html_str .= irp_provide ('item_current_modify_form_current_content', $here);
  $html_str .= '<br><br> ';
  $html_str .= irp_provide ('item_current_modify_form_new_create_content', $here);
  $html_str .= '<br><br> ';
  $html_str .= irp_provide ('item_current_modify_form_new_create_justification', $here);
  $html_str .= '<br><br>';
  $html_str .= '<center>';
  $html_str .= inputtypesubmit_of_name_of_en_value_of_shift (' ', 'save', '  ');
  $html_str .= '</center>';
  $html_str .= '</form> ' . "\n";

  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_return_module_nameoffile ($nam_ent, $sur_ent, 'block_current_display');

  $html_str .= irp_provide ('pervasive_html_final_section', $here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;

}

# exiting_from_module ($module);

?>