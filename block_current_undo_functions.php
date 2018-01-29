<?php
require_once "irp_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function block_current_undo_page_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);
  $sur_ite_cur = irp_provide ('block_current_surname_from_block_current_name', $here);

  $kin_blo = irp_provide ('entry_block_kind', $here);

  $en_tit = 'page for undoing the ' . $kin_blo;  

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit  = string_html_capitalized_of_string ($la_bub_tit);
  $la_bub_Tit .= ' <i><b> ' . $sur_ite_cur . '</b></i> '; 

  $en_tit = 'for entry';
  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit .= $la_bub_tit;
  $la_bub_Tit .= ' <i><b> ' . $sur_ent_cur . '</b></i> '; 
  
  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center>' . "\n";
  $html_str .= common_html_div_background_color_of_html ($la_bub_Tit);
  $html_str .= '</center>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}


function block_current_undo_link_to_return_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

    $get_key = 'block_current_name';
    $get_val = irp_provide ('block_current_name', $here);
    $sur_blo_cur = irp_provide ('block_current_surname_from_block_current_name', $here);
    
    $script_to_return = 'block_current_display_script.php';

    $kin_blo = irp_provide ('entry_block_kind', $here);

    $en_txt = 'back to the ' . $kin_blo;
    $la_txt  = language_translate_of_en_string ($en_txt);
    $la_Txt  = string_html_capitalized_of_string ($la_txt);
    $la_Txt .= ' <b><i>' . $sur_blo_cur . '</i></b>';

    debug_n_check ("$here", '$la_Txt', $la_Txt);
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<center>' . "\n";
    $html_str .= link_to_return_of_string_of_get_key_of_get_val_of_script_to_return ($la_Txt, $get_key, $get_val, $script_to_return) . "\n";
    $html_str .= '</center>' . "\n";
    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here , '$html_str',  $html_str);
    exiting_from_function ($here);
    
    return $html_str;
}

function block_current_undo_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_blo_cur = irp_provide ('block_current_name', $here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('pervasive_page_header', $here);
  $html_str .= '<br><br>';

  $html_str .= irp_provide ('block_current_undo_page_title', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('block_current_undo_form', $here);
  $html_str .= '<br><br>';

  $html_str .= irp_provide ('block_current_undo_link_to_return', $here);

  $html_str .= irp_provide ('pervasive_page_footer', $here);
  $html_str .= comment_exiting_of_function_name ($here);


  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;
}


exiting_from_module ($module);

?>