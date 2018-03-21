<?php
require_once "management_library.php";

function entry_typed_menuselect_of_entry_name_array_of_surname_by_name_hash_of_entry_current_name_last_of_select_size ($nam_ent_a, $sur_by_nam_h, $nam_ent_las, $siz_sel) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($nam_ent_las, $siz_sel)");

    $get_key_sel = 'entry_current_name';

    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<select name="'. $get_key_sel . '"'; 
    $html_str .= ' size="' . $siz_sel . '"'; 
    $html_str .= '>' . "\n";
    
    foreach ($nam_ent_a as $nam_ent) {
        $sur_ent = surname_of_name_of_surname_by_name_hash ($nam_ent, $sur_by_nam_h);
        $Sur_ent = string_html_capitalized_accented_of_string_accented ($sur_ent); /* Improve  Surname accented capitalized */
        
        debug_n_check ($here, 'foreach $nam_ent', $nam_ent);
        
        if ($nam_ent_las != 'NO_SELECTION_DONE_YET') {
            
            if ($nam_ent_las == $nam_ent) {
                $html_str .= '  <option value="' . $nam_ent . '" selected> ' . $Sur_ent . '</option>' . "\n";
            }
            else {
                $html_str .= '  <option value="' . $nam_ent . '"> ' . $Sur_ent . '</option>' . "\n";
            }
        }
        else {
            $html_str .= '  <option value="' . $nam_ent . '"> ' . $Sur_ent . '</option>' . "\n";
        }
    }
    
    $html_str .= '</select>' . "\n";
    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here , '$html_str',  $html_str);
    exiting_from_function ($here);
    
    return $html_str;
}

function entry_typed_selection_size_of_entry_type_by_entry_name_hash ($typ_ent_by_nam_ent_h) {
    $here = __FUNCTION__;
    entering_in_function ($here);

    $typ_ent_a = $_SESSION['entry_type_array'];
    
    $siz_sel = 0;
    foreach ($typ_ent_a as $key => $en_typ_ent) {
        
        if ($en_typ_ent <> 'header') {
            $nam_ent_k = array_keys ($typ_ent_by_nam_ent_h, $en_typ_ent);
            $cou_typ = count ($nam_ent_k);

            if ( $cou_typ > $siz_sel ) {
                $siz_sel = $cou_typ;
            }
        }
    }

    if ($siz_sel > $_SESSION['parameters']['select_size']) {
        $siz_sel = $_SESSION['parameters']['select_size'];
    }

    debug_n_check ($here , '$siz_sel',  $siz_sel);
    exiting_from_function ($here);
    
    return $siz_sel;
}

?>