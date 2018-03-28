<?php
require_once "irp_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function entry_new_create_page_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'page for creating of a new entry';

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

function entry_new_create_form_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'create a new entry';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit  = string_html_capitalized_of_string ($la_bub_tit);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= common_html_span_background_color_of_html ($la_bub_Tit);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function entry_new_create_type_select_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'select an entry type';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit  = string_html_capitalized_of_string ($la_bub_tit);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= common_html_span_background_color_of_html ($la_bub_Tit);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function entry_new_create_type_select_display_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $key = str_replace('_build', '', $here);
    father_n_son_stack_entity_push_of_father_of_son ($key, "BUTTON_$key");
    
    $en_typ_a = $_SESSION['entry_type_array'];

    $get_key_sel = 'entry_new_type';

    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<select name="' . $get_key_sel . '">' . "\n";

    foreach ($en_typ_a as $en_typ) {
        $la_typ = language_translate_of_en_string ($en_typ);
        
        $html_str .= '<option value="' . $en_typ . '"> ' . "\n";
        $html_str .= string_html_capitalized_of_string (ucfirst ($la_typ));
        $html_str .= '</option> ' . "\n";
    }
    
    $html_str .= '</select> ' . "\n";
    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here , '$html_str', $html_str);
    
    exiting_from_function ($here);
    
    return $html_str;
}

function entry_new_create_form_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $entity_fat = entity_name_of_build_function_name ($here);
  father_n_son_stack_entity_push_of_father_of_son ($entity_fat, "BUTTON_$entity_fat");

  $script_action = 'entry_new_create_save_script.php';

  $entity_son = entity_name_of_script_nameoffile ($script_action);
  father_n_son_stack_entity_push_of_father_of_son ($entity_fat, $entity_son);

  $get_key = 'entry_new_surname';

  $siz_hit = $_SESSION['parameters']['html_input_text_size'];

  $html_str  = comment_entering_of_function_name ($here); 
  $html_str .= '<form action="' . $script_action . '" method="get"> ' . "\n";
  $html_str .= '<br>' . "\n";
  $html_str .= '<input type="text"';
  $html_str .= ' name="' . $get_key . '"';
  $html_str .= ' size="' . $siz_hit . '"';
  $html_str .= '/>' .  "\n";
  $html_str .= '<br><br>' . "\n";
  $html_str .= irp_provide ('entry_new_create_type_select_title', $here);
  $html_str .= '<br><br>' . "\n";
  $html_str .= irp_provide ('entry_new_create_type_select_display', $here);
  $html_str .= '<br><br>' . "\n";
  $html_str .= inputtypesubmit_of_en_action_name ('create');
  $html_str .= '</form>' .  "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
};

function entry_new_create_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('pervasive_page_header', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('entry_new_create_page_title', $here);
  $html_str .= '<br><br>' . "\n";
   
  $html_str .= irp_provide ('entry_new_create_form_title', $here);
  $html_str .= '<br>' . "\n";

  $html_str .= irp_provide ('entry_new_create_form', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('pervasive_page_footer', $here);
  $html_str .= comment_exiting_of_function_name ($here);
 
  debug_n_check ($here , '$html_str',  $html_str);

  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>