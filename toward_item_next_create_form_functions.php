<?php
require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what for'] = "to display the form page where one can modify the current item";

entering_in_module ($module);

function subsection_item_next_create_title_build () { 
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'modify the text below';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit = string_html_capitalized_of_string ($la_bub_tit);
  $la_bub_Tit = '<b>' . $la_bub_Tit . '</b>';

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= common_html_span_background_color_of_html ($la_bub_Tit);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function subsection_item_next_content_build (){
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $con_ite_cur = irp_provide ('item_current_content_from_block_current_content', $here);
    debug_n_check ($here , '$con_ite_cur', $con_ite_cur);
    
    $entity_textarea = 'item_next_content';

    $row_hta = $_SESSION['parameters']['html_textarea_rows'];
    $col_hta = $_SESSION['parameters']['html_textarea_cols'];
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<textarea name="' . $entity_textarea; 
    $html_str .= '" rows="' . $row_hta .'" cols="' .$col_hta;
    $html_str .= '"/>';
    $html_str .= $con_ite_cur;
    $html_str .= '</textarea> ' . "\n";
    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here , '$html_str',  $html_str);
    exiting_from_function ($here);

  return $html_str;
}

function subsection_item_next_justify_title_build () { 
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $en_tit = 'enter your justification below';
    
    $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
    $la_bub_Tit = string_html_capitalized_of_string ($la_bub_tit);
    $la_bub_Tit = '<b>' . $la_bub_Tit . '</b>';
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= common_html_span_background_color_of_html ($la_bub_Tit);
    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here , '$html_str',  $html_str);
    exiting_from_function ($here);
    
    return $html_str;
}

function subsection_item_next_justification_build (){
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $entity_textarea = 'item_next_justification';

    $row_hta = $_SESSION['parameters']['html_textarea_rows'];
    $col_hta = $_SESSION['parameters']['html_textarea_cols'];
    
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

function toward_item_next_create_form_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $script_action = 'block_next_save_script.php';
 
  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<form ' . "\n";
  $html_str .= 'method="get" action="' . $script_action. '">' . "\n";
  
  $html_str .= '<br>';
  $html_str .= irp_provide ('subsection_item_next_create_title', $here);
  $html_str .= '<br>';

  $html_str .= irp_provide ('subsection_item_next_content', $here);

  $html_str .= '<br><br>';

  $html_str .= irp_provide ('subsection_item_next_justify_title', $here);
  $html_str .= '<br>';

  $html_str .= irp_provide ('subsection_item_next_justification', $here);
  $html_str .= '<br>';

  $html_str .= '<center>';
  $html_str .= inputtypesubmit_of_en_action_name ('save');
  $html_str .= '</center>';

  $html_str .= '</form> ' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>