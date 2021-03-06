<?php

require_once "irp_library.php";
require_once "block_current_nameoffile_array_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function block_current_display_and_link_of_surname_by_name_hash_of_block_current_name_of_la_eol ($sur_by_nam_h, $nam_blo_cur, $la_eol) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_blo_cur");

  $sur_blo_cur = surname_of_name_of_surname_by_name_hash ($nam_blo_cur, $sur_by_nam_h);
  $sur_blo_cur = string_html_capitalized_of_string ($sur_blo_cur);
  debug_n_check ($here, '$sur_blo_cur', $sur_blo_cur); /* élément réseau */

  $script_action = 'block_current_display_script.php';

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<br>' . "\n"; /* keep */
  $html_str .= '<a href="' . $script_action;
  $html_str .= '?block_current_name=' . $nam_blo_cur . '"';
  $html_str .= '>';
  $html_str .= '<b>' . $sur_blo_cur . $la_eol . '</b>';
  $html_str .= '</a>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function toward_block_current_list_display_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_ent = irp_provide ('entry_current_surname_from_entry_current_name', $here);
  $kin_blo = irp_provide ('entry_block_kind', $here);
  $kin_blo_plu = block_kind_plural_of_block_kind ($kin_blo);

  $en_tit = 'display of ' . $kin_blo_plu . ' for entry';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_Tit = string_html_capitalized_of_string ($la_bub_tit);
  $la_Tit .= ' '; /* necessary */
  $la_Tit .= '<i><b>' . $sur_ent . '</b></i> ';

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= common_html_span_background_color_of_html ($la_Tit);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function toward_block_current_list_display_display_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $nam_ent_cur = irp_provide ('entry_current_name', $here);
    
    $la_eol = '';
    $kin_blo = irp_provide ('entry_block_kind', $here);
    if ($kin_blo == 'question') {$la_eol = language_translate_of_en_string ('?');}
    
    $html_str  = comment_entering_of_function_name ($here);
    if (block_current_nameoffile_array_is_empty_of_entry_name ($nam_ent_cur)) {
        $html_str .= '<br>'; 
    }
    else {
        $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here);
        $sur_low_a = lowercase_n_sort_of_string_by_key_array ($sur_by_nam_h);
        $nam_ent_a = irp_provide ('entry_name_array', $here);

        $con_blo_by_nam_blo_h = irp_provide ('block_content_by_block_name_hash', $here);
        $nam_blo_cur_ord_a = irp_provide ('block_name_array_order_current', $here);

        foreach ($nam_blo_cur_ord_a as $key => $nam_blo) {

            $con_blo = array_retrieve_value_of_key_of_array ($nam_blo, $con_blo_by_nam_blo_h);
            $con_ite_cur = item_current_content_off_block_current_content ($con_blo);

            $con_ite_cur_lin = replace_all_sub_sentence_by_links_of_surname_by_name_hash_of_entry_name_array_of_item_content_of_surname_lowercase_array ($sur_by_nam_h, $nam_ent_a, $con_ite_cur, $sur_low_a);
            
            $html_str .= block_current_display_and_link_of_surname_by_name_hash_of_block_current_name_of_la_eol ($sur_by_nam_h, $nam_blo, $la_eol);
            $html_str .= '<br>';  
            $html_str .= '&nbsp;&nbsp;&nbsp;<i>' . ucfirst($con_ite_cur_lin) . '</i>';
            $html_str .= '<br>' . "\n"; 

        }
        
        $html_str .= '<br> ';
    }

    $html_str .= comment_exiting_of_function_name ($here);

    debug_n_check ($here , '$html_str', $html_str);
    exiting_from_function ($here);
    
    return $html_str;
}

function toward_block_current_list_display_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

    $nam_ent_cur = irp_provide ('entry_current_name', $here);
    if (block_current_nameoffile_array_is_empty_of_entry_name ($nam_ent_cur)) {
        $html_str  = comment_entering_of_function_name ($here);
        $html_str .= comment_exiting_of_function_name ($here);
    }
    else {
        $html_str  = comment_entering_of_function_name ($here);
        $html_str .= '<center>' . "\n";
        $html_str .= irp_provide ('toward_block_current_list_display_title', $here);
        $html_str .= '</center>' . "\n";
        $html_str .= irp_provide ('toward_block_current_list_display_display', $here);
        $html_str .= comment_exiting_of_function_name ($here);
    }

    exiting_from_function ($here);
    
    return $html_str;
}

exiting_from_module ($module);

?>
