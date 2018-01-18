<?php
require_once "irp_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function entry_current_rename_form_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);
 
  $en_bub_tit = 'rename the entry';

  $la_bub_tit  = bubble_bubbled_la_text_of_en_text ($en_bub_tit);
  $la_bub_Tit  = string_html_capitalized_of_string ($la_bub_tit);
  $la_bub_Tit .= ' <i><b>' . ucfirst ($sur_ent_cur) . '</b></i> ';

  $html_str  = comment_entering_of_function_name ($here); 
  $html_str .= common_html_span_background_color_of_html ($la_bub_Tit);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function entry_current_rename_form_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent_cur = irp_provide ('entry_current_name', $here);
  debug_n_check ($here , '$nam_ent_cur', $nam_ent_cur);

  $script_action = 'entry_current_rename_script.php';

  $html_str  = comment_entering_of_function_name ($here); 
  $html_str .= '<form action="' . $script_action .'" method="get">' . "\n";
  $html_str .= irp_provide ('entry_current_rename_form_title', $here);
  $html_str .= inputtypesubmit_of_en_action_name ('rename');
  $html_str .= '</form>' .  "\n";
  $html_str .= comment_exiting_of_function_name ($here);
 
  exiting_from_function ($here);
  debug_n_check ($here, '$html_str', $html_str);

  return $html_str;
};

exiting_from_module ($module);

?>