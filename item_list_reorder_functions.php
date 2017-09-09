<?php

require_once "management_functions.php";
require_once "irp_functions.php";
require_once "entry_display_functions.php";

$module = "item_list_reorder_functions";
# entering_in_module ($module);

/* Tools */

function item_list_reorder_of_surname_by_name_array_of_entry_name_of_item_name_of_item_content ($sur_by_nam_a, $nam_ent, $nam_ite, $con_ite) {
  $here = __FUNCTION__;
  entering_in_function ($here);

  debug_n_check ($here , " input entry_name name", $nam_ent);
  debug_n_check ($here , " input item name", $nam_ite);
  debug_n_check ($here , " input item_content", $con_ite);

  $sur_ite = surname_of_name_of_surname_by_name_array ($nam_ite, $sur_by_nam_a);
  
  $html_str = '';
  $html_str .= '<tr> '  . "\n";
  $html_str .= '    <td width=80%><b> ' . $sur_ite . '</b></td> ';
  $html_str .= button_radio_from_to ($nam_ite);

  $html_str .= '</tr> ';

  $html_str .= '  <tr> ';
  $html_str .= '    <td colspan="1"> ' . $con_ite . '</td> ';
  $html_str .= '  </tr> ';
  $html_str .= '  <tr> ';
  $html_str .= '    <td colspan="3" height="3%"></td> ';
  $html_str .= '  </tr> ';


  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function item_list_reorder_content_order_html_table_array_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $nam_ent = irp_provide ('entry_name', $here);
  debug_n_check ($here , '$nam_ent', $nam_ent);

  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);
  $con_by_nam_ite_a = irp_provide ('item_content_by_item_name_array', $here);

  $arr_a = array();
  $count = 0;

  $from = language_translate_of_en_string_of_language ('from', $lan);
  $from = ucfirst ($from);
  $to = language_translate_of_en_string_of_language ('to', $lan);
  $to = ucfirst ($to);

  $html_str  = '';
  $html_str .= '<table> ';

  $html_str .= "\n" . '  <tr> ';
  $html_str .= "\n" . '    <td width="70%"></td> ';
  $html_str .= '<td width="10%"> ';
  $html_str .= $from;
  $html_str .= "\n" . '    </td> ';
  $html_str .= "\n" . '    <td width="10%"> ';
  $html_str .= $to;
  $html_str .= "\n" . '    </td> ';
  $html_str .= "\n" . '  </tr> ';

  foreach ($con_by_nam_ite_a as $nam_ite => $con_ite) {
      $html_str .= item_list_reorder_of_surname_by_name_array_of_entry_name_of_item_name_of_item_content ($sur_by_nam_a, $nam_ent, $nam_ite, $con_ite);
      $arr_a[$count] = $nam_ite;
      $count++;
  }

  $html_str .= '</table> ';
  global $glue;
  $ser_arr = implode ($glue, $arr_a);
  $html_str .= '<input type="hidden" name="items" value="' .$ser_arr . '"> ';

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* First Section Order Display Title */

function item_list_reorder_section_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $sur_ent = irp_provide ('entry_surname', $here);
  $kin_ite = irp_provide ('entry_item_kind', $here);
  $kin_ite_plu = item_kind_plural_of_item_kind ($kin_ite);

  $en_tit = 'list of ' . $kin_ite_plu . ' for entry';
  $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);
  $la_Tit .= ' <i><b> ' . $sur_ent . '</b></i> ';

  $html_str  = '';
  $html_str .= common_html_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* First Section Reorder Display Items */

function item_list_reorder_section_display_items_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str = irp_provide ('item_list_reorder_content_order_html_table_array', $here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* First Section Reorder Display Action */

function item_list_reorder_section_display_action_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $swap = ucfirst (language_translate_of_en_string_of_language ('swap', $lan));
  $move_b = ucfirst (language_translate_of_en_string_of_language ('move before', $lan));
  $move_a = ucfirst (language_translate_of_en_string_of_language ('move after', $lan));
  $reset = ucfirst (language_translate_of_en_string_of_language ('reset', $lan));

  $html_str  = '';

  $html_str .= '<center> ' . "\n";
  $html_str .= '<table> ';

  $html_str .= '<tr> ';

  $html_str .= '<td> ';
  $html_str .= '<input type="submit" value="';
  $html_str .= $swap;
  $html_str .= '" name="order"/> '. "\n";
  $html_str .= '</td> ';

  $html_str .= '<td> ';
  $html_str .= '<input type="submit" value="';
  $html_str .= $move_b;
  $html_str .= '" name="order"/> ' . "\n";
  $html_str .= '</td> ';

  $html_str .= '<td> ';
  $html_str .= '<input type="submit" value="';
  $html_str .= $move_a;
  $html_str .= '" name="order"/> ' . "\n";
  $html_str .= '</td> ';

  $html_str .= '<td> ';
  $html_str .= '<input type="reset" value="';
  $html_str .= $reset;
  $html_str .= '"/> '. "\n";
  $html_str .= '</td> ';

  $html_str .= '</tr> ';

  $html_str .= '</table> '. "\n";
  $html_str .= '</center> '. "\n";


  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* First Section Reorder Display */

function item_list_reorder_section_display_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= irp_provide ('item_list_reorder_section_title', $here);
  $html_str .= irp_provide ('item_list_reorder_section_display_items', $here);
  $html_str .= '<br><br>';
  $html_str .= irp_provide ('item_list_reorder_section_display_action', $here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Page item list Reorder */

function item_list_reorder_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $script_action = 'item_list_neworder.php';

  $lan = $_SESSION['parameters']['language'];
  $nam_ent = irp_provide ('entry_name', $here);
  $nof_mod = 'entry_display.php';

  $html_str = '';
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);
  $html_str .= '<form action="' . $script_action . '" method="get"> ' . "\n";
  $html_str .= irp_provide ('item_list_reorder_section_display', $here);
  $html_str .= '</form> ' . "\n";

  $sur_ent = irp_provide ('entry_surname', $here);
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_module_nameoffile_of_language ($nam_ent, $sur_ent, $nof_mod, $lan); 
  
  $html_str .= irp_provide ('pervasive_html_final_section', $here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  return $html_str;
}

# exiting_from_module ($module);
?>