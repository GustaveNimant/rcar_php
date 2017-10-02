<?php

require_once "irp_functions.php";
require_once "bubble_functions.php";
require_once "button_submit_functions.php";
require_once "common_html_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function item_current_modify_form_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $nam_ent = irp_provide ('entry_name', $here);
  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);

  $sur_ent = surname_of_name_of_surname_by_name_array ($nam_ent, $sur_by_nam_a);

  $script_action = 'block_content_modify_save.php';

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);
  $html_str .= irp_provide ('item_current_modify_form_page_title', $here);

  $html_str .= '<form ' . "\n";
  $html_str .= 'method="get" action="block_current_modify_save.php">' . "\n";
  
  $html_str .= get_hash_store_form_of_key_of_value_of_where ('item_current_action', 'modify', $here);

  $html_str .= '<br><br>';
  $html_str .= irp_provide ('item_current_modify_form_current_content', $here);
  $html_str .= '<br><br> ';
  $html_str .= irp_provide ('item_current_modify_form_new_create_content', $here);
  $html_str .= '<br><br> ';
  $html_str .= irp_provide ('item_current_modify_form_new_create_justification', $here);
  $html_str .= '<br><br>';
  $html_str .= '<center>';
  $html_str .= inputtypesubmit_of_en_action_name ('save');
  $html_str .= '</center>';
  $html_str .= '</form> ' . "\n";

  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_return_module_nameoffile ($nam_ent, $sur_ent, 'block_current_display');

  $html_str .= irp_provide ('pervasive_html_final_section', $here);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;

}

exiting_from_module ($module);

?>