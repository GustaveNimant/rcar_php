<?php
require_once "irp_functions.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is a section of entry_list_display page";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function subsection_entry_new_create_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_bub_tit = 'create a new entry';
  $la_bub_Tit = bubble_bubbled_capitalized_la_text_of_en_text ($en_bub_tit);

  $html_str  = comment_entering_of_function_name ($here); 
  $html_str .= common_html_div_background_color_of_html ($la_bub_Tit);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function subsection_entry_new_create_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $module = module_name_of_module_nameoffile (__FILE__);

  $irp_fat = str_replace('_build', '', $here);
  father_n_son_stack_entity_push_of_father_of_son ($irp_fat, "BUTTON_$irp_fat");

  $html_str  = comment_entering_of_function_name ($here); 
  $html_str .= '<form action="entry_new_create_script.php" method="get"> ' . "\n";
  $html_str .= '<br>' . "\n";
  $html_str .= '<input type="text" size="20" name="entry_new_surname" value=""/>' .  "\n";
  $html_str .= inputtypesubmit_of_en_action_name ('create');
  $html_str .= inputtypehidden_store_of_clicked_module_name ($module);
  $html_str .= '</form>' .  "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
};

function section_entry_new_create_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here); 
  $html_str .= irp_provide ('subsection_entry_new_create_title', $here);
  $html_str .= irp_provide ('subsection_entry_new_create', $here);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>