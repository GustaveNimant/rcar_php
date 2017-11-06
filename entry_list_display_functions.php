<?php
require_once "irp_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "the page where any entry can be accessed";
$Documentation[$module]['what for'] = "to select an entry for displaying its blocks";
$Documentation[$module]['what for'] = "to select an entry for renaming";
$Documentation[$module]['what for'] = "to create a new entry";

entering_in_module ($module);

function entry_list_display_page_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'page for displaying the list of all entries';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit  = string_html_capitalized_of_string ($la_bub_tit);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= common_html_div_background_color_of_html ($la_bub_Tit) . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function entry_list_display_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  print_get_hash_of_where ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('pervasive_page_header', $here);
  $html_str .= '<br>' . "\n";

  $html_str .= '<center>' . "\n";

  $html_str .= irp_provide ('entry_list_display_page_title', $here);
  $html_str .= '<br>' . "\n";

  $html_str .= irp_provide ('section_select_entry_current_display', $here);
  $html_str .= '<br>' . "\n";

  $html_str .= irp_provide ('section_select_entry_current_rename', $here);
  $html_str .= '<br>' . "\n";

  $html_str .= irp_provide ('section_entry_new_create', $here);
  $html_str .= '</center>' . "\n";

  $html_str .= irp_provide ('pervasive_page_footer', $here);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str); 
  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>