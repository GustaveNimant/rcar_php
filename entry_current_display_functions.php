<?php

require_once "irp_library.php";
require_once "link_to_return_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['entry_current_name'] = "is a directory name of php_server. i.e. any string expressed in the current language transformed in a Capitalized word, with blank transformed in underscores, without any accents.";
$Documentation[$module]['what for'] = "to ...";
$Documentation[$module]['entry_kind'] = "is a lower case word expressed in english. Ex.: text";
$Documentation[$module]['entry_block_kind'] = "is a lower case word expressed in english. Ex.: paragraph";
$Documentation[$module]['block_name_list_order_current'] = "is the same as item_name_array";

entering_in_module ($module);

function entry_current_display_page_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);

  $en_tit = 'page for displaying the entry';

  $la_bub_tit  = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit  = string_html_capitalized_of_string ($la_bub_tit);
  $la_bub_Tit .= ' <i><b>' . $sur_ent_cur . '</b></i> ';

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center>';
  $html_str .= common_html_div_background_color_of_html ($la_bub_Tit);
  $html_str .= '</center>';
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function entry_current_link_to_return_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<center>';
    $html_str .= link_to_return_of_return_module_nameoffile ('entry_list_display_script.php');
    $html_str .= '</center>';
    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here , '$html_str',  $html_str);
    exiting_from_function ($here);
    
  return $html_str;
}

function entry_current_display_build (){
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $html_str  = comment_entering_of_function_name ($here);
    
    $html_str .= irp_provide ('pervasive_page_header', $here);
    $html_str .= '<br>' . "\n";
    
    $html_str .= '<center>' . "\n";
    $html_str .= irp_provide ('entry_current_display_page_title', $here);
    $html_str .= '</center>' . "\n";
    $html_str .= '<br>' . "\n";
    
    $html_str .= irp_provide ('section_block_new_create', $here);
    $html_str .= '<br>' . "\n";
    
    $html_str .= irp_provide ('section_block_current_list_reorder', $here);
    $html_str .= '<br><br>' . "\n";

    $html_str .= irp_provide ('section_block_current_list_display', $here);
    $html_str .= '<br>' . "\n";

    $html_str .= '<center>' . "\n";
    $html_str .= irp_provide ('entry_current_link_to_return', $here);
    $html_str .= '</center>' . "\n";
    $html_str .= '<br>' . "\n";
    
    $html_str .= irp_provide ('pervasive_page_footer', $here);
    $html_str .= comment_exiting_of_function_name ($here);
    
    exiting_from_function ($here);
    
  return $html_str;
}

exiting_from_module ($module);

?>
