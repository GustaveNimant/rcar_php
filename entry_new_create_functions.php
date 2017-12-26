<?php
require_once "irp_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function entry_new_create_confirm_page_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'page for confirming the creation of a new entry';

  $la_tit = language_translate_of_en_string ($en_tit);
  $la_Tit = string_html_capitalized_of_string ($la_tit);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center>' . "\n";
  $html_str .= common_html_div_background_color_of_html ($la_Tit);
  $html_str .= '</center>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function entry_new_create_confirm_form_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_ent_new = irp_provide ('entry_new_surname', $here);  
  /* $nam_ent_new = word_name_capitalized_of_string_surname ($sur_ent_new); */
  /* string_check_entry_name_of_string ($nam_ent_new); */

  $en_tit  = 'do you want to create the entry';
  
  $la_tit  = language_translate_of_en_string ($en_tit);
  $la_tit .= ' <i><b>' . $sur_ent_new . '</b></i> ?';
  $la_Tit  = string_html_capitalized_of_string ($la_tit);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= common_html_span_background_color_of_html ($la_Tit);

/* Improve : set this instead  bubble_bubbled_la_text_of_en_text ($en_tit) */

  $html_str .= comment_exiting_of_function_name ($here);
  
  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function entry_new_create_confirm_form_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $irp_fat = str_replace('_build', '', $here);
  father_n_son_stack_entity_push_of_father_of_son ($irp_fat, "BUTTON_$irp_fat");

  $script_action = 'entry_new_create_save_script.php';
  $entity = entity_name_of_script_nameoffile ($script_action);
  father_n_son_stack_entity_push_of_father_of_son ($irp_fat, "$entity");

  $get_key_sel = 'entry_new_surname';
  $_SESSION['get_key_by_script_name'][$entity] = $get_key_sel;

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<form action="' . $script_action . '" method="get"> ' . "\n";

  $html_str .= irp_provide ('entry_new_create_confirm_form_title', $here);
  $html_str .= inputtypesubmit_of_en_action_name ('yes');

  $html_str .= '</form> ' .  "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  exiting_from_function ($here);
  return $html_str;
};

function entry_new_create_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent_new = irp_provide ('entry_new_name_from_entry_new_surname', $here);

  if (entry_is_subdirectory_of_entry_name ($nam_ent_new) ) { /* Improve */
      $en_mes_1 = "the entry";
      $en_mes_2 = "already exists";
      $la_mes_1 = language_translate_of_en_string ($en_mes_1); 
      $la_mes_2 = language_translate_of_en_string ($en_mes_2);   
      $la_mes =  $la_mes_1 . ' ' . $sur_ent_new . ' ' . $la_mes_2;
      $la_Mes = string_html_capitalized_of_string ($la_mes);

      warning ($here, $la_Mes);
      exiting_from_function ($here);
      include 'entry_list_display_script.php';
      exit;
  }

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('pervasive_page_header', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('entry_new_create_confirm_page_title', $here);
  $html_str .= '<br><br>' . "\n";
   
  $html_str .= irp_provide ('entry_new_create_confirm_form', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('pervasive_page_footer', $here);
  $html_str .= comment_exiting_of_function_name ($here);
 
  debug_n_check ($here , '$html_str',  $html_str);

  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>