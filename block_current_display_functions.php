<?php
require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function block_current_display_page_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'page for displaying the';

  $en_kin_blo = irp_provide ('entry_block_kind', $here);
  $en_tit .= ' ' . $en_kin_blo; 
  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);

  $sur_blo_cur = irp_provide ('block_current_surname_from_block_current_name', $here);

  $la_bub_Tit  = string_html_capitalized_of_string ($la_bub_tit);
  $la_bub_Tit .= ' <i><b> ' . $sur_blo_cur . '</b></i> ';

  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);
 
  $en_tit = 'for entry';

  $la_bub_Tit .= bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit .= ' <i><b> ' . $sur_ent_cur . '</b></i>';

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center>' . "\n";
  $html_str .= common_html_div_background_color_of_html ($la_bub_Tit);
  $html_str .= '</center>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_current_actions_title_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $entity = entity_name_of_build_function_name ($here);
    father_n_son_stack_entity_push_of_father_of_son ($entity, 'CONSTANT_' . $entity);
    
    $en_tit = 'select one of the actions to be performed on current block';
    
    $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
    $la_Tit = string_html_capitalized_of_string ($la_bub_tit);
    $la_colon = language_translate_of_en_string (':');
    
    $la_Tit = '<b>' . $la_Tit . $la_colon . '</b>';
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= common_html_span_background_color_of_html ($la_Tit);
    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here , '$html_str',  $html_str);
    exiting_from_function ($here);
    
    return $html_str;
}

function block_current_display_link_to_return_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent_cur = irp_provide ('entry_current_name', $here);
  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);

  $script_to_return = 'entry_current_display_script.php';

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center>';
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_script_to_return ($nam_ent_cur, $sur_ent_cur, $script_to_return);
  $html_str .= '</center>';
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_current_display_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);

  $html_str .= irp_provide ('pervasive_page_header', $here);
  $html_str .= '<br>' . "\n";

  $html_str .= irp_provide ('block_current_display_page_title', $here);
  $html_str .= '<br>' . "\n";

  $html_str .= irp_provide ('item_current_content_display_n_modify', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('item_current_justification_display', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('item_previous_content_display', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('block_previous_sha1_display', $here); 
  $html_str .= '<br><br>' . "\n";

# beginning of href_list  
  $html_str .= irp_provide ('block_current_actions_title', $here); 
  $html_str .= '<br>' . "\n";

  $html_str .= irp_provide ('toward_block_current_remove', $here);
  $html_str .= '&nbsp;&nbsp;';

  $html_str .= irp_provide ('toward_block_current_history', $here);
  $html_str .= '&nbsp;&nbsp;';

  $html_str .= irp_provide ('toward_block_current_rename', $here);
  $html_str .= '&nbsp;&nbsp;';

  $html_str .= irp_provide ('toward_block_current_undo', $here);

# end of href_list
  $html_str .= '<br><br>';

  $html_str .= irp_provide ('block_current_display_link_to_return', $here);
  $html_str .= '<br><br>';

  $html_str .= irp_provide ('pervasive_page_footer', $here);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  return $html_str;
}

exiting_from_module ($module);

?>