<?php

require_once "irp_functions.php";
require_once "entry_information_functions.php";
require_once "entry_display_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "a user-provider for new block content"; 
$Documentation[$module]['what it does'] = "it displays the html form"; 

# entering_in_module ($module);

function block_new_create_form_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $nam_ent = irp_provide ('entry_name', $here);
  $sur_ent = irp_provide ('entry_surname', $here);

  $nof_mod = 'entry_display.php';

  $html_str = '';
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);
  $html_str .= irp_provide ('block_new_create_form_page_title', $here);

  $html_str .= '<form' . "\n";
  $html_str .= method_get_in_form_of_action_module_of_shift ('block_new_create_save.php', '  ');
  $html_str .= '> '; 

  $html_str .= form_array_dollar_get_store_of_key_of_value_of_here ('block_new_action', 'create', $here);
#  $html_str .= '<input type="hidden" name="block_new_action" value="create" /> ';

  $html_str .= '<br><br> ';
  $html_str .= irp_provide ('item_new_create_content_form', $here);
  $html_str .= '<br><br> ';
  $html_str .= irp_provide ('item_new_create_justification', $here);
  $html_str .= '<br><br> ';
  $html_str .= irp_provide ('block_new_create_surname', $here);
  $html_str .= '<br><br> ';
  $html_str .= irp_provide ('block_new_create_button_save', $here);

  $html_str .= '</form> ' . "\n";

  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_return_module_nameoffile ($nam_ent, $sur_ent, $nof_mod, $lan);

  $html_str .= irp_provide ('block_new_create_block_list', $here);
  $html_str .= irp_provide ('pervasive_html_final_section', $here);
  
  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;
}

# exiting_from_module ($module);

?>