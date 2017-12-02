<?php

require_once "irp_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function block_list_reorder_of_surname_by_name_hash_of_entry_name_of_block_current_name_of_item_content_of_la_eol ($sur_by_nam_h, $nam_ent, $nam_blo, $con_blo, $la_eol) {
  $here = __FUNCTION__;
  entering_in_function ($here);

  debug_n_check ($here , " input entry_current_name name", $nam_ent);
  debug_n_check ($here , " input block name", $nam_blo);
  debug_n_check ($here , " input block_content", $con_blo);

  $sur_blo = surname_of_name_of_surname_by_name_hash ($nam_blo, $sur_by_nam_h);
  
  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<tr> '  . "\n";
  $html_str .= '<td width=80%><b> ' . $sur_blo . $la_eol . '</b></td> ';
  $html_str .= button_radio_from_to ($nam_blo);
  $html_str .= '</tr> ';

  $html_str .= '<tr> ';
  $html_str .= '<td colspan="1"> ' . '&nbsp;&nbsp;&nbsp;<i>' . $con_blo . '</i></td> ';
  $html_str .= '</tr> ';
  $html_str .= '<tr> ';
  $html_str .= '<td colspan="3" height="3%"></td> ';
  $html_str .= '</tr> ';
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_list_reorder_page_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_ent = irp_provide ('entry_current_surname_from_entry_current_name', $here);
  $kin_blo = irp_provide ('entry_block_kind', $here);
  $kin_blo_plu = block_kind_plural_of_block_kind ($kin_blo);

  $en_tit = 'page for reordering the ' . $kin_blo_plu . ' of the entry';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);
  $la_Tit .= ' <i><b> ' . $sur_ent . '</b></i> ';
  
  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center>'. "\n";
  $html_str .= common_html_div_background_color_of_html ($la_Tit);
  $html_str .= '</center>'. "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_list_reorder_order_table_header_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $la_from = language_translate_of_en_string ('from');
  $la_from = ucfirst ($la_from);
  $la_to = language_translate_of_en_string ('to');
  $la_to = ucfirst ($la_to);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<table>' . "\n";
  $html_str .= '<tr>' . "\n";
  $html_str .= '<td width="70%"></td>' . "\n";
  $html_str .= '<td width="10%">' . "\n";
  $html_str .= $la_from;
  $html_str .= '</td>' . "\n";
  $html_str .= '<td width="10%">';
  $html_str .= $la_to;
  $html_str .= '</td>' . "\n";
  $html_str .= '</tr>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_list_reorder_order_loop_table_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_current_name', $here);
  debug_n_check ($here , '$nam_ent', $nam_ent);

  $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here);
  $con_by_nam_blo_a = irp_provide ('block_content_by_block_name_hash', $here);
  $nam_blo_a = irp_provide ('block_name_array_order_current', $here);

  $arr_a = array();
  $count = 0;
  $la_eol = '';
  $kin_blo = irp_provide ('entry_block_kind', $here);
  if ($kin_blo == 'question') {$la_eol = language_translate_of_en_string ('?');}
  
  $html_str  = comment_entering_of_function_name ($here);

  foreach ($nam_blo_a as $key => $nam_blo) {
      $con_blo = $con_by_nam_blo_a[$nam_blo];
      $con_ite_cur = item_current_content_of_block_current_content ($con_blo) ;
      $con_ite = str_replace ("\n", "<br>", $con_ite_cur);

      $html_str .= block_list_reorder_of_surname_by_name_hash_of_entry_name_of_block_current_name_of_item_content_of_la_eol ($sur_by_nam_h, $nam_ent, $nam_blo, $con_ite, $la_eol);

      $arr_a[$count] = $nam_blo;
      $count++;
  }

  $html_str .= '</table>' . "\n";

  $glue = $_SESSION['parameters']['glue'];
  $ser_arr = implode ($glue, $arr_a);

  $entity_inputtype = 'block_list_order_new';
  $html_str .= '<input type="hidden" name="' . $entity_inputtype . '" value="' .$ser_arr . '">' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_list_reorder_action_table_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $move_b = ucfirst (language_translate_of_en_string ('move before'));
  $move_a = ucfirst (language_translate_of_en_string ('move after'));
  $reset = ucfirst (language_translate_of_en_string ('reset'));

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<table>';
  $html_str .= '<tr>' . "\n";
  $html_str .= '<td>';
  $html_str .= inputtypesubmit_la_translate_of_en_action_name_of_button_name ('swap', 'block_name_list_reorder_action_la');
  $html_str .= '</td>' . "\n";
  $html_str .= '<td>';
  $html_str .= inputtypesubmit_la_translate_of_en_action_name_of_button_name ('move before', 'block_name_list_reorder_action_la');
  $html_str .= '</td>' . "\n";
  $html_str .= '<td>';
  $html_str .= inputtypesubmit_la_translate_of_en_action_name_of_button_name ('move after', 'block_name_list_reorder_action_la');
  $html_str .= '</td>' . "\n";
  $html_str .= '<td>';
  $html_str .= inputtypereset_of_en_action_name ();
  $html_str .= '</td>' . "\n";
  $html_str .= '</tr>' . "\n";
  $html_str .= '</table>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_list_reorder_form_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $script_action = 'block_name_list_order_new_script.php';

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<form action="' . $script_action . '" method="get"> ' . "\n";

  $html_str .= '<center>' . "\n";
  $html_str .= irp_provide ('block_list_reorder_action_table', $here);
  $html_str .= '</center>' . "\n";

  $html_str .= irp_provide ('block_list_reorder_order_table_header', $here);
  $html_str .= '<br>' . "\n";
  $html_str .= irp_provide ('block_list_reorder_order_loop_table', $here);

  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_list_reorder_link_to_return_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent_cur = irp_provide ('entry_current_name', $here);
  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center>' . "\n";
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_script_to_return ($nam_ent_cur, $sur_ent_cur, 'entry_current_display_script.php'); 
  $html_str .= '</center>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_list_reorder_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('pervasive_page_header', $here);
  $html_str .= '<br>';

  $html_str .= irp_provide ('block_list_reorder_page_title', $here);
  $html_str .= '<br><br>';

  $html_str .= irp_provide ('block_list_reorder_form', $here);
  $html_str .= '<br>';

  $html_str .= irp_provide ('block_list_reorder_link_to_return', $here);

  $html_str .= irp_provide ('pervasive_page_footer', $here);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  return $html_str;
}

exiting_from_module ($module);

?>