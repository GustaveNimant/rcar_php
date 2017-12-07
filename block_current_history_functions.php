<?php
require_once "irp_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function block_current_history_section_page_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);
  $sur_blo_cur = irp_provide ('block_current_surname_from_block_current_name', $here);
  $kin_blo = irp_provide ('entry_block_kind', $here);

  $en_tit = 'page for displaying the history of the ' . $kin_blo;  

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit  = string_html_capitalized_of_string ($la_bub_tit);
  $la_bub_Tit .= ' <i><b> ' . $sur_blo_cur . '</b></i> '; 

  $en_tit = 'for entry';
  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit .= $la_bub_tit;
  $la_bub_Tit .= ' <i><b> ' . $sur_ent_cur . '</b></i> '; 
  
  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center>';
  $html_str .= common_html_div_background_color_of_html ($la_bub_Tit);
  $html_str .= '</center>';
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_current_history_section_justify_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'enter your justification below';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);
 
  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= common_html_span_background_color_of_html ($la_Tit);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_current_history_section_justify_textarea_build (){
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $col_hta = $_SESSION['parameters']['html_textarea_cols'];
    $row_hta = $_SESSION['parameters']['html_textarea_rows'];
    
    $entity_textarea = 'block_current_history_justification';

    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<textarea name="' . $entity_textarea; 
    $html_str .= '" rows="' . $row_hta .'" cols="' .$col_hta;
    $html_str .= '"/>';
    $html_str .= '</textarea> ' . "\n";
    $html_str .= comment_exiting_of_function_name ($here);

    debug_n_check ($here , '$html_str',  $html_str);
    exiting_from_function ($here);
    
    return $html_str;
}

function block_current_history_section_justify_build (){
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $html_str  = '';
    $html_str .= irp_provide ('block_current_history_section_justify_title', $here);
    $html_str .= irp_provide ('block_current_history_section_justify_textarea', $here);
    
    debug_n_check ($here , '$html_str',  $html_str);
    exiting_from_function ($here);
    
  return $html_str;
}

function block_current_history_section_save_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= '<center> ';
  $html_str .= '<input type="submit" value="';
  $html_str .= ucfirst (language_translate_of_en_string ('history'));
  $html_str .= '" name="submitme"> ' . "\n";
  $html_str .= '</center> ' . "\n";

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;

}

function block_current_history_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_current_name', $here);
  $nam_ite = irp_provide ('block_current_name', $here);
  $nof_mod = 'entry_current_display_script.php';

  $script_action = 'block_current_history_save.php';

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('pervasive_page_header', $here);
  $html_str .= '<br><br> ';

  $html_str .= irp_provide ('block_current_history_section_page_title', $here);
  $html_str .= '<br><br> ';
  /* $html_str .= '<form action="' . $script_action. '" method="get"> ' . "\n"; */
  /* $html_str .= '<input type="hidden" name="block_current_name" value="'; */
  /* $html_str .= $nam_ite; */
  /* $html_str .= '">'; */
  /* $html_str .= irp_provide ('block_current_history_section_justify', $here); */
  /* $html_str .= '<br><br> '; */
  /* $html_str .= irp_provide ('block_current_history_section_save', $here); */
  /* $html_str .= '    </form> ' . "\n"; */

  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_script_to_return ($nam_ent, $sur_ent_cur, $nof_mod); 
  $html_str .= irp_provide ('pervasive_page_footer', $here);
  $html_str .= comment_exiting_of_function_name ($here);


  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>