<?php
require_once "irp_library.php";
require_once "entry_current_selection_display_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function entry_current_selection_display_form_title_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $en_tit = 'select an existing entry to display its blocks';

    $la_bub_Tit = bubble_bubbled_capitalized_la_text_of_en_text ($en_tit);
   
    debug_n_check ($here , '$la_bub_Tit',  $la_bub_Tit);

    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= common_html_span_background_color_of_html ($la_bub_Tit);
    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here , '$html_str',  $html_str);
    exiting_from_function ($here);
    
    return $html_str;
}

function entry_current_selection_display_menuselect_build () { /* move in some tools */
    $here = __FUNCTION__;
    entering_in_function ($here);

    $nam_ent_a = irp_provide ('entry_name_array', $here);
    debug_n_check ($here, '$nam_ent_a', $nam_ent_a);
    $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here);
    $nam_ent_las = irp_provide ('entry_current_name_last', $here);       
    debug_n_check ($here, '$nam_ent_las', $nam_ent_las);

    $typ_ent_by_nam_ent_h = irp_provide ('entry_type_by_entry_name_hash', $here);
    $typ_ent_a = $_SESSION['entry_type_array'];

    debug_n_check ($here, '$typ_ent_a', $typ_ent_a);

    $siz_sel = entry_typed_selection_size_of_entry_type_by_entry_name_hash ($typ_ent_by_nam_ent_h);

    $html_str  = comment_entering_of_function_name ($here); 
    $html_str .= '<table>' . "\n";
    $html_str .= '<tr>' . "\n";

    foreach ($typ_ent_a as $key => $en_typ_ent) {

        debug_n_check ($here, '$en_typ_ent', $en_typ_ent);
        
        if ($en_typ_ent <> 'header') {
            $nam_ent_k = array_keys ($typ_ent_by_nam_ent_h, $en_typ_ent);

            if (count ($nam_ent_k) <> 0 ) {
                
                debug_n_check ($here, '$nam_ent_k', $nam_ent_k);

                $la_typ_ent = language_translate_of_en_string ($en_typ_ent); 
                $la_Typ_ent = string_html_capitalized_of_string ($la_typ_ent);

                debug_n_check ($here, '$la_Typ_ent', $la_Typ_ent);

                $html_str .= '<td>' . "\n";
                $html_str .= '<table>' . "\n";
                $html_str .= '<tr>' . "\n";
                $html_str .= '<td><center><b><i>' . $la_Typ_ent . '</i></b></center></td>' . "\n";
                $html_str .= '</tr>' . "\n";
                $html_str .= '<tr>' . "\n";
                $html_str .= '<td>' . "\n";
                
                $html_str .= entry_typed_menuselect_of_entry_name_array_of_surname_by_name_hash_of_entry_current_name_last_of_select_size ($nam_ent_k, $sur_by_nam_h, $nam_ent_las, $siz_sel);
                
                $html_str .= '</td>' . "\n";
                $html_str .= '</tr>' . "\n";
                $html_str .= '</table>' . "\n";
                $html_str .= '</td>' . "\n";
            }
        }
    }
    
    $html_str .= '</tr>' . "\n";
    $html_str .= '</table>' . "\n";
    $html_str .= comment_exiting_of_function_name ($here);
 
    debug_n_check ($here , '$html_str',  $html_str);
    exiting_from_function ($here);
    
    return $html_str;
}

function entry_current_selection_display_form_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $script_action = 'entry_current_display_script.php';

    $html_str  = comment_entering_of_function_name ($here); 
    $html_str .= '<form action="' . $script_action .'" method="get"> ' . "\n";
    $html_str .= '<br>' .  "\n";

    $html_str .= irp_provide ('entry_current_selection_display_menuselect', $here);

    $html_str .= inputtypesubmit_of_en_action_name ('select');
    $html_str .= '</form>' .  "\n";
    $html_str .= comment_exiting_of_function_name ($here);

    exiting_from_function ($here);
    debug_n_check ($here, '$html_str', $html_str);
    
    return $html_str;
};

function entry_current_selection_display_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $html_str  = comment_entering_of_function_name ($here); 
    $html_str .= irp_provide ('entry_current_selection_display_form_title', $here);
    $html_str .= irp_provide ('entry_current_selection_display_form', $here);
    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here , '$html_str',  $html_str);
    
    exiting_from_function ($here);

    return $html_str;
}


exiting_from_module ($module);

?>