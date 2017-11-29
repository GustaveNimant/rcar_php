<?php

require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function section_block_current_list_reorder_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);
  $kin_blo = irp_provide ('entry_block_kind', $here);
  $kin_blo_plu = block_kind_plural_of_block_kind ($kin_blo);

  $en_tit = 'reorder the ' . $kin_blo_plu . ' for entry';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit  = string_html_capitalized_of_string ($la_bub_tit);
  $la_bub_Tit .= ' <i><b>' . $sur_ent_cur . '</b></i> ';

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= common_html_span_background_color_of_html ($la_bub_Tit);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function no_block_current_list_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

    $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);
    
    $en_tit = 'there is no block yet in entry';

    $la_bub_tit  = bubble_bubbled_la_text_of_en_text ($en_tit);
    $la_bub_Tit  = string_html_capitalized_of_string ($la_bub_tit);
    $la_bub_Tit .= ' <i><b>' . $sur_ent_cur . '</b></i> ';
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= $la_bub_Tit;
    $html_str .= comment_exiting_of_function_name ($here);

    debug_n_check ($here , '$html_str',  $html_str);
    exiting_from_function ($here);
    
    return $html_str;
}

function only_one_block_current_list_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

    $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);
    
    $en_tit = 'there is only one block in entry';

    $la_bub_tit  = bubble_bubbled_la_text_of_en_text ($en_tit);
    $la_bub_Tit  = string_html_capitalized_of_string ($la_bub_tit);
    $la_bub_Tit .= ' <i><b>' . $sur_ent_cur . '</b></i> ';
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= $la_bub_Tit;
    $html_str .= comment_exiting_of_function_name ($here);

    debug_n_check ($here , '$html_str',  $html_str);
    exiting_from_function ($here);
    
    return $html_str;
}

function more_than_one_block_current_list_form_build () {  /* Generalize */
    $here = __FUNCTION__;
    entering_in_function ($here);

    $script_action = 'block_list_reorder_script.php';

    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<form action="' . $script_action . '" method="get"> ' . "\n";
    
    $html_str .= irp_provide ('section_block_current_list_reorder_title', $here);
    $html_str .= inputtypesubmit_of_en_action_name ('reorder');
    
    $html_str .= '</form> ' .  "\n";
    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here , '$html_str',  $html_str);
    exiting_from_function ($here);
    
    return $html_str;
}

function section_block_current_list_reorder_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $nam_blo_a = irp_provide ('block_name_array_order_current', $here);

  if (count ($nam_blo_a) == 0 ) {
      $html_str .= irp_provide ('no_block_current_list', $here);
  }
  elseif (count ($nam_blo_a) == 1 ) {
      $html_str .= irp_provide ('only_one_block_current_list', $here);
  }
  else if (count ($nam_blo_a) > 1 ) {
      $html_str .= irp_provide ('more_than_one_block_current_list_form', $here);
  }

  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>
