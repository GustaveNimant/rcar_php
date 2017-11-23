<?php
require_once "irp_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function subsection_select_entry_current_display_title_build () {
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

function subsection_select_entry_current_display_menuselect_entry_build () { /* move in some tools */
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $select_size = $_SESSION['parameters']['select_size'];
    $nam_ent_a = irp_provide ('entry_name_array', $here);
    $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here);
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<select name="entry_current_name" size="' . $select_size . '" >' . "\n";
    
    foreach ($nam_ent_a as $nam_ent) {
        $sur_ent = surname_of_name_of_surname_by_name_hash ($nam_ent, $sur_by_nam_h);
        
        if (isset ($_SESSION['get_value_by_get_key_hash']['entry_current_name'] ) ) {
            $ent_sel = $_SESSION['get_value_by_get_key_hash']['entry_current_name'];
            if ($ent_sel == $nam_ent) {
                $html_str .= '  <option value="' . $nam_ent . '" selected> ' . $sur_ent . '</option>' . "\n";
            }
            else {
                $html_str .= '  <option value="' . $nam_ent . '"> ' . $sur_ent . '</option>' . "\n";
            }
        }
        else {
            $html_str .= '  <option value="' . $nam_ent . '"> ' . $sur_ent . '</option>' . "\n";
        }
    }
    
    $html_str .= '</select>' . "\n";
    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here , '$html_str',  $html_str);
    exiting_from_function ($here);
    
    return $html_str;
}

function subsection_select_entry_current_display_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $script_action = 'entry_current_display_script.php';
    $entity = entity_name_of_script_nameoffile ($script_action);

    $get_key_sel = 'entry_current_name';
    $_SESSION['get_key_by_script_name'][$entity] = $get_key_sel;

    $html_str  = comment_entering_of_function_name ($here); 
    $html_str .= '<form action="' . $script_action .'" method="get"> ' . "\n";
    $html_str .= '<br>' .  "\n";
    $html_str .= irp_provide ('subsection_select_entry_current_display_menuselect_entry', $here);
    $html_str .= inputtypesubmit_of_en_action_name ('select');
    $html_str .= '</form>' .  "\n";
    $html_str .= comment_exiting_of_function_name ($here);

#    $_SESSION['link_to_return'][$nof_mod]['entry_current_name'] = $get_val;

    exiting_from_function ($here);
    debug_n_check ($here, '$html_str', $html_str);
    
    return $html_str;
};

function section_select_entry_current_display_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $html_str  = comment_entering_of_function_name ($here); 
    $html_str .= irp_provide ('subsection_select_entry_current_display_title', $here);
    $html_str .= irp_provide ('subsection_select_entry_current_display', $here);
    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here , '$html_str',  $html_str);
    
    exiting_from_function ($here);

    return $html_str;
}


exiting_from_module ($module);

?>