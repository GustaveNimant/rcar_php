<?php

require_once "management_functions.php";
require_once "irp_functions.php";
require_once "entry_display_functions.php";

$module = "block_list_reorder_functions";
# entering_in_module ($module);

/* Tools */

function block_list_reorder_of_surname_by_name_array_of_entry_name_of_block_current_name_of_block_content ($sur_by_nam_a, $nam_ent, $nam_blo, $con_blo) {
  $here = __FUNCTION__;
  entering_in_function ($here);

  debug_n_check ($here , " input entry_name name", $nam_ent);
  debug_n_check ($here , " input block name", $nam_blo);
  debug_n_check ($here , " input block_content", $con_blo);

  $sur_blo = surname_of_name_of_surname_by_name_array ($nam_blo, $sur_by_nam_a);
  
  $html_str = '';
  $html_str .= '<tr> '  . "\n";
  $html_str .= '    <td width=80%><b> ' . $sur_blo . '</b></td> ';
  $html_str .= button_radio_from_to ($nam_blo);

  $html_str .= '</tr> ';

  $html_str .= '  <tr> ';
  $html_str .= '    <td colspan="1"> ' . $con_blo . '</td> ';
  $html_str .= '  </tr> ';
  $html_str .= '  <tr> ';
  $html_str .= '    <td colspan="3" height="3%"></td> ';
  $html_str .= '  </tr> ';


  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_list_reorder_content_order_html_table_array_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $nam_ent = irp_provide ('entry_name', $here);
  debug_n_check ($here , '$nam_ent', $nam_ent);

  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);
  $con_by_nam_blo_a = irp_provide ('block_content_by_block_name_array', $here);

  $arr_a = array();
  $count = 0;

  $from = language_translate_of_en_string ('from');
  $from = ucfirst ($from);
  $to = language_translate_of_en_string ('to');
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

  foreach ($con_by_nam_blo_a as $nam_blo => $con_blo) {
      $html_str .= block_list_reorder_of_surname_by_name_array_of_entry_name_of_block_current_name_of_block_content ($sur_by_nam_a, $nam_ent, $nam_blo, $con_blo);
      $arr_a[$count] = $nam_blo;
      $count++;
  }

  $html_str .= '</table> ';
  $glue = $_SESSION['parameters']['glue'];
  $ser_arr = implode ($glue, $arr_a);
  $html_str .= '<input type="hidden" name="blocks" value="' .$ser_arr . '"> ';

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* First Section Order Display Title */

function block_list_reorder_section_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $sur_ent = irp_provide ('entry_surname', $here);
  $kin_blo = irp_provide ('entry_block_kind', $here);
  $kin_blo_plu = block_kind_plural_of_block_kind ($kin_blo);

  $en_tit = 'list of ' . $kin_blo_plu . ' for entry';
  $la_bub_tit = bubble_bubbled_text_la_of_en_text ($en_tit, $lan);
  $la_Tit  = string_html_capitalized_of_string ($la_bub_tit);
  $la_Tit .= ' <i><b> ' . $sur_ent . '</b></i> ';

  $html_str  = '';
  $html_str .= common_html_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* First Section Reorder Display Blocks */

function block_list_reorder_section_display_blocks_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str = irp_provide ('block_list_reorder_content_order_html_table_array', $here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* First Section Reorder Display Action */

function block_list_reorder_section_display_action_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $move_b = ucfirst (language_translate_of_en_string ('move before'));
  $move_a = ucfirst (language_translate_of_en_string ('move after'));
  $reset = ucfirst (language_translate_of_en_string ('reset'));

  $html_str  = comment_entering_of_function_name ($here);

  $html_str .= '<center> ' . "\n";
  $html_str .= '  <table> ';

  $html_str .= '<tr> ';

  $html_str .= '<td> ';
  $html_str .= inputtypesubmit_of_en_action_name_of_button_name ('swap', 'order');
  $html_str .= '</td> ';

  $html_str .= '<td> ';
  $html_str .= inputtypesubmit_of_en_action_name_of_button_name ('move before', 'order');
  $html_str .= '</td> ';

  $html_str .= '<td> ';
  $html_str .= inputtypesubmit_of_en_action_name_of_button_name ('move after', 'order');
  $html_str .= '</td> ';

  $html_str .= '<td> ';
  $html_str .= inputtypesubmit_of_en_action_name ('reset');
  $html_str .= '</td> ';

  $html_str .= '</tr> ';

  $html_str .= '  </table> '. "\n";
  $html_str .= '</center> '. "\n";
  $html_str .= comment_exiting_of_function_name ($here);


  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* First Section Reorder Display */

function block_list_reorder_section_display_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= irp_provide ('block_list_reorder_section_title', $here);
  $html_str .= irp_provide ('block_list_reorder_section_display_blocks', $here);
  $html_str .= '<br><br>';
  $html_str .= irp_provide ('block_list_reorder_section_display_action', $here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* Page block list Reorder */

function block_list_reorder_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $script_action = 'block_list_neworder.php';

  $lan = $_SESSION['parameters']['language'];
  $nam_ent = irp_provide ('entry_name', $here);
  $nof_mod = 'entry_display.php';

  $html_str = '';
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);
  $html_str .= '<form action="' . $script_action . '" method="get"> ' . "\n";
  $html_str .= irp_provide ('block_list_reorder_section_display', $here);
  $html_str .= '</form> ' . "\n";

  $sur_ent = irp_provide ('entry_surname', $here);
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_return_module_nameoffile ($nam_ent, $sur_ent, $nof_mod, $lan); 
  
  $html_str .= irp_provide ('pervasive_html_final_section', $here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  return $html_str;
}

# exiting_from_module ($module);
?>