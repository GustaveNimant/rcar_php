<?php
require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what for'] = "to display the form page where one can modify the current item";

entering_in_module ($module);

function toward_item_next_create_title_build () { 
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

function toward_item_next_content_build (){
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

function toward_item_next_justify_title_build () { 
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

function toward_item_next_justification_select_n_textarea_build (){
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $en_pla = 'enter your justification';
    $la_Pla = ucfirst (language_translate_of_en_string ($en_pla));
    debug_n_check ($here , '$la_Pla',  $la_Pla);  
    
    $entity_textarea = 'item_next_justification';

    $row_hta = $_SESSION['parameters']['html_textarea_rows'];
    $col_hta = $_SESSION['parameters']['html_textarea_cols'];

    $nam_jus_nex_h = $_SESSION['item_next_justification_hash']; 

    $con_jus_ite_cur = irp_provide ('item_current_justification_from_block_current_content', $here);

    $len = strpos ($con_jus_ite_cur, ':');
    $nam_jus_ite_cur = trim (substr ($con_jus_ite_cur, 0, $len));
    debug_n_check ($here , '$nam_jus_ite_cur', $nam_jus_ite_cur);

    if (array_key_exists ($nam_jus_ite_cur, $nam_jus_nex_h)) {
        $nam_jus_nex_a = array_keys_from_key_value_of_hash_of_key ($nam_jus_nex_h, $nam_jus_ite_cur); 
    }
    else {
        $nam_jus_nex_a = array_keys ($nam_jus_nex_h);
    }
    
    debug_n_check ($here , '$con_jus_ite_cur', $con_jus_ite_cur);
    debug_n_check ($here , '$nam_jus_ite_cur', $nam_jus_ite_cur);

    $nam_jus_any_a = $_SESSION['item_any_justification_array'];
    $nam_jus_a = array_merge ($nam_jus_any_a, $nam_jus_nex_a);

    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= justification_select_of_justification_name_array ($nam_jus_a);
    $html_str .= '<br>' . "\n";
    $html_str .= '<textarea name="' . $entity_textarea; 
    $html_str .= '" placeholder="';
    $html_str .= $la_Pla;
    $html_str .= '" rows="' . $row_hta . '" cols="' . $col_hta;
    $html_str .= '"/>';
    $html_str .= '</textarea>' . "\n";
    $html_str .= comment_exiting_of_function_name ($here);

    debug_n_check ($here , '$html_str',  $html_str);
    exiting_from_function ($here);

    return $html_str;
}

function toward_item_next_create_form_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $entity_fat = entity_name_of_build_function_name ($here);
  father_n_son_stack_entity_push_of_father_of_son ($entity_fat, "BUTTON_$entity_fat");

  $script_action = 'block_next_save_script.php';
  $entity_son = entity_name_of_script_nameoffile ($script_action);
  father_n_son_stack_entity_push_of_father_of_son ($entity_fat, $entity_son);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<form ' . "\n";
  $html_str .= 'method="get" action="' . $script_action. '">' . "\n";
  
  $html_str .= '<br>';
  $html_str .= irp_provide ('toward_item_next_create_title', $here);
  $html_str .= '<br>';

  $html_str .= irp_provide ('toward_item_next_content', $here);
  $html_str .= '<br><br>';

  $html_str .= irp_provide ('toward_item_next_justify_title', $here);
  $html_str .= '<br>';
  $html_str .= irp_provide ('toward_item_next_justification_select_n_textarea', $here);
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