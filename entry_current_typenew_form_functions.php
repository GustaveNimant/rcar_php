<?php
require_once "irp_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function entry_current_typenew_form_select_display_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $key = str_replace('_build', '', $here);
    father_n_son_stack_entity_push_of_father_of_son ($key, "BUTTON_$key");
    
    $typ_ent_cur = irp_provide ('entry_current_type', $here);
    $en_typ_a = $_SESSION['entry_type_array'];
    $siz_typ_sel = count ($en_typ_a); 

    $get_key_sel = 'entry_current_typenew';

    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<select name="' . $get_key_sel . '"';
    $html_str .= ' size="' . $siz_typ_sel . '">';

    foreach ($en_typ_a as $en_typ) {
        $la_typ = language_translate_of_en_string ($en_typ);
        
        if ($en_typ == $typ_ent_cur) {
            $html_str .= '<option value="' . $en_typ . '" disabled>' . "\n";
        }
        else { 
            $html_str .= '<option value="' . $en_typ . '"> ' . "\n";
        }
            $html_str .= string_html_capitalized_of_string (ucfirst ($la_typ));
            $html_str .= '</option> ' . "\n";
    }
    
    $html_str .= '</select> ' . "\n";
    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here , '$html_str', $html_str);
    
    exiting_from_function ($here);
    
    return $html_str;
}


function entry_current_typenew_form_titled_gather_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $get_key = 'entry_current_typenew';
  $typ_ent_cur = irp_provide ('entry_current_type', $here);

  $en_tit = 'modify current entry type to';
  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit = string_html_capitalized_of_string ($la_bub_tit);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<b>'. "\n";
  $html_str .= common_html_span_background_color_of_html ($la_bub_Tit);
  $html_str .= '</b>'. "\n";
  $html_str .= '<br>'. "\n";
  $html_str .= irp_provide ('entry_current_typenew_form_select_display', $here);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);
  return $html_str;
}

function entry_current_typenew_form_justification_titled_gather_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'justify below your change';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit = string_html_capitalized_of_string ($la_bub_tit);

  $entity_textarea = "entry_current_typenew_justification";

  $row_hta = $_SESSION['parameters']['html_textarea_rows'];
  $col_hta = $_SESSION['parameters']['html_textarea_cols'];

  $html_str  = comment_entering_of_function_name ($here);

  $html_str .= '<legend>';
  $html_str .= common_html_span_background_color_of_html ($la_bub_Tit);
  $html_str .= '</legend>'; 
 
  $html_str .= '<textarea name="' . $entity_textarea . '"'; 
  $html_str .= ' rows="' . $row_hta. '" cols="' . $col_hta; 
  $html_str .= '"/>' . "\n";
  $html_str .= '</textarea>' . "\n";

  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);
  return $html_str;
}

function entry_current_typenew_form_submit_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'save';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit = string_html_capitalized_of_string ($la_bub_tit);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center>' . "\n";
  $html_str .= '<input type="submit"';
  $html_str .= ' value="';
  $html_str .= $la_bub_Tit;
  $html_str .= '">' . "\n";
  $html_str .= '</center>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;
}

function entry_current_typenew_form_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $script_action = 'entry_current_typenew_save_script.php';

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<form action="' . $script_action .'" method="get">' . "\n";

  $html_str .= irp_provide ('entry_current_typenew_form_titled_gather', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('entry_current_typenew_form_justification_titled_gather', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('entry_current_typenew_form_submit', $here);
  $html_str .= '</form>' . "\n";

  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  
  exiting_from_function ($here);

  return $html_str;

}

exiting_from_module ($module);

?>