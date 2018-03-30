function entry_current_namenew_save_entry_type_catalog_update_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $new_nam_ent_cur = irp_provide ('entry_current_namenew_from_entry_current_surnamenew', $here);
    debug_n_check ($here , '$new_nam_ent_cur', $new_nam_ent_cur);

#    $new_sur_ent_cur = irp_provide ('entry_current_surnamenew', $here);
#    debug_n_check ($here , '$new_sur_ent_cur', $new_sur_ent_cur);
    
    $old_nam_ent_cur = irp_provide ('entry_current_name', $here);
    debug_n_check ($here , '$old_nam_ent_cur', $old_nam_ent_cur);
    
    $typ_ent_by_nam_ent_h = irp_provide ('entry_type_by_entry_name_hash', $here);
    
    $log_str = '';
    if (array_key_exists ($new_nam_ent_cur, $typ_ent_by_nam_ent_h)) {
        $old_sur_ent_cur = $typ_ent_by_nam_ent_h[$new_nam_ent_cur];
        entry_type_by_entry_name_hash_replace_n_write_of_name_of_surnamenew_of_current_hash ($new_nam_ent_cur, $new_sur_ent_cur, $typ_ent_by_nam_ent_h);
        $log_str .= "Entry Surname >$old_sur_ent_cur< has been replaced by itself ? >$new_sur_ent_cur< in Surname_catalog";
    }
    else {
        entry_type_by_entry_name_hash_add_n_write_of_name_of_surname_of_current_hash ($new_nam_ent_cur, $new_sur_ent_cur, $typ_ent_by_nam_ent_h);
        $log_str .= "Entry Surname >$new_sur_ent_cur< has been added to Surname_catalog";
    }

    file_log_write ($here, $log_str);

    $nof_sur_cat = $_SESSION['parameters']['nameoffile_surname_catalog'];
 
    $en_tit = 'the new entry name and surname have been introduced in';

    $la_bub_tit  = bubble_bubbled_la_text_of_en_text ($en_tit);
    $la_bub_tit .= ' <i><b> ' . $nof_sur_cat . '</b></i>';
    $la_bub_Tit = string_html_capitalized_of_string ($la_bub_tit);
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= $la_bub_Tit;
    $html_str .= comment_exiting_of_function_name ($here);

    exiting_from_function ($here . " with $html_str");
    return $html_str;
}
