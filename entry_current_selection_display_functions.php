<?php
require_once "irp_library.php";

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

    $select_size = $_SESSION['parameters']['select_size'];
    $nam_ent_a = irp_provide ('entry_name_array', $here);
    $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here);

    $get_key_sel = 'entry_current_name';

    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<select name="'. $get_key_sel . '"'; 
    $html_str .= ' size="' . $select_size . '"'; 
    $html_str .= '>' . "\n";
    
    foreach ($nam_ent_a as $nam_ent) {
        $sur_ent = surname_of_name_of_surname_by_name_hash ($nam_ent, $sur_by_nam_h);

        debug_n_check ($here, 'foreach $nam_ent', $nam_ent);
        
        if ( ! isset ($_SESSION['is_label_entity_name'][$nam_ent])) { 
            /* labels are accessed directly */

            $nam_ent_las = irp_provide ('entry_current_name_last', $here);       
            debug_n_check ($here, '$nam_ent_las', $nam_ent_las);

            if ($nam_ent_las != 'no selection done yet') {

                if ($nam_ent_las == $nam_ent) {
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
    }
    
    $html_str .= '</select>' . "\n";
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