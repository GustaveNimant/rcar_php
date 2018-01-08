<?php

require_once "irp_library.php";
require_once "block_list_order_new_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function block_name_list_order_new_form_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);
  $kin_blo = irp_provide ('entry_block_kind', $here);
  $kin_blo_plu = block_kind_plural_of_block_kind ($kin_blo);

  $en_tit = 'new order of ' . $kin_blo_plu . ' for entry';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);
  $la_Tit .= ' <i><b> ' . $sur_ent_cur . '</b></i> ';
  
  $html_str = common_html_div_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_name_list_order_new_form_blocks_display_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

    $nam_blo_ord_new_a = irp_provide ('block_name_list_order_new_array', $here);
    $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here);
    
    $glue = $_SESSION['parameters']['glue'];
    $nam_blo_ord_new_str = implode ($glue, $nam_blo_ord_new_a);
    
    $entity_inputtype = 'block_name_list_order_new_string';

    $html_str  = comment_entering_of_function_name ($here);

    $html_str .= block_name_list_order_current_of_surname_by_name_hash_of_block_name_list_order_current ($sur_by_nam_h, $nam_blo_ord_new_a);

    $html_str .= '<input type="hidden" name="' . $entity_inputtype;
    $html_str .= '" value="' . $nam_blo_ord_new_str;
    $html_str .= '">';
    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here , '$html_str', $html_str);
    exiting_from_function ($here);
    
    return $html_str;
}

function block_name_list_order_new_justification_title_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $en_tit = 'enter your justification below';
    
    $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
    $la_Tit = string_html_capitalized_of_string ($la_bub_tit);
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= common_html_div_background_color_of_html ($la_Tit);
    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here , '$html_str', $html_str);
    exiting_from_function ($here);
    
    return $html_str;
}

function block_name_list_order_new_justification_textarea_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $entity_textarea = 'block_name_list_order_new_justification';
    $row_hta = $_SESSION['parameters']['html_textarea_rows'];
    $col_hta = $_SESSION['parameters']['html_textarea_cols'];

    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<textarea name="' . $entity_textarea; 
    $html_str .= '" rows="' . $row_hta .'" cols="' .$col_hta;
    $html_str .= '"/>';
    $html_str .= '</textarea> ' . "\n";
    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here , '$html_str', $html_str);
    exiting_from_function ($here);
    
    return $html_str;
}

function block_name_list_order_new_form_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

    $entity_fat = entity_name_of_build_function_name ($here);

    $script_action = 'block_name_list_order_new_string_save_script.php';
    $entity_son = entity_name_of_script_nameoffile ($script_action);
    father_n_son_stack_entity_push_of_father_of_son ($entity_fat, $entity_son);

    $get_key = 'block_name_list_order_new_string';
    $_SESSION['get_key_by_script_name'][$entity_son] = $get_key;

    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<form action="' . $script_action .'" method="get"> ' . "\n";

    $html_str .= irp_provide ('block_name_list_order_new_form_title', $here);
    $html_str .= irp_provide ('block_name_list_order_new_form_blocks_display', $here);
    $html_str .= irp_provide ('block_name_list_order_new_justification_title', $here);
    $html_str .= '<br> ';
    $html_str .= irp_provide ('block_name_list_order_new_justification_textarea', $here);

    $html_str .= '<br><br>';
    $html_str .= '<center>';
    $html_str .= inputtypesubmit_of_en_action_name ('save'); 
    $html_str .= '</center>';
    $html_str .= '</form> ' . "\n";

    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here , '$html_str', $html_str);
  
    exiting_from_function ($here);
    
    return $html_str;
    
}

exiting_from_module ($module);

?>
