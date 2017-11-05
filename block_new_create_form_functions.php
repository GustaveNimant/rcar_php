<?php
require_once "irp_library.php";
require_once "entry_information_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "a user-provider for new block content"; 
$Documentation[$module]['what it does'] = "it displays the html form"; 

entering_in_module ($module);

function block_new_create_form_submit_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'create';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit = string_html_capitalized_of_string ($la_bub_tit);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center>' . "\n";
  $html_str .= '<input type="submit" value="';
  $html_str .= $la_bub_Tit;
  $html_str .= '" name="submitme">' . "\n";
  $html_str .= '</center>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;
}
function block_new_create_form_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_current_name', $here);
  $sur_ent = irp_provide ('entry_current_surname_from_entry_current_name', $here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<form action="block_new_create_save_script.php" method="get">' . "\n";

  $html_str .= get_hash_store_of_get_key_of_get_value_of_where ('block_new_create_form_action', 'create', $here);
  $html_str .= '<br><br> ';

  $html_str .= irp_provide ('item_new_create_content_form', $here);
  $html_str .= '<br><br> ';

  $html_str .= irp_provide ('item_new_create_justification', $here);
  $html_str .= '<br><br> ';

  $html_str .= irp_provide ('block_new_create_surname', $here);
  $html_str .= '<br><br> ';

  $html_str .= irp_provide ('block_new_create_form_submit', $here);
  $html_str .= '</form> ' . "\n";

  $html_str .= comment_exiting_of_function_name ($here);
  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>