<?php

require_once "irp_library.php";
require_once "entry_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function entry_current_namenew_save_page_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'page for displaying the result of saving the renaming of the entry';

  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);

  $la_bub_tit  = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_tit .= '<i><b> ' . $sur_ent_cur . '</b></i>';
  $la_bub_Tit = string_html_capitalized_of_string ($la_bub_tit);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center>' . "\n";
  $html_str .= common_html_div_background_color_of_html ($la_bub_Tit);
  $html_str .= '</center>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);
  
  return $html_str;
}

function entry_current_namenew_save_justification_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

/* Justification (not yet used)  */
/* getting DATA $get_val */
  $get_key = 'entry_current_namenew_justification';

  $jus_ent  = irp_data_value_retrieve_and_store_of_get_key_of_module_name_of_where ($get_key, $nam_mod_cur, $here);
  $jus_ent .= "\n" . irp_provide ('user_information', $here);
  debug_n_check ($here , '$jus_ent', $jus_ent);

  exiting_from_function ($here . " with \$jus_ent >$jus_ent<");

  return $jus_ent; 
}

function entry_current_namenew_save_entry_subdirectory_rename_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $new_sur_ent_cur = irp_provide ('entry_current_surnamenew', $here);
  debug_n_check ($here , '$new_sur_ent_cur', $new_sur_ent_cur);

  $new_nam_ent_cur = irp_provide ('entry_current_namenew_from_entry_current_surnamenew', $here);
  debug_n_check ($here , '$new_nam_ent_cur', $new_nam_ent_cur);

  $old_nam_ent_cur = irp_provide ('entry_current_name', $here);
  debug_n_check ($here , '$old_nam_ent_cur', $old_nam_ent_cur);

  $old_fno_ent_cur = file_specific_directory_name_of_basic_name_of_name ("hd_php_server", $old_nam_ent_cur);

  $log_str = '';
  if ( file_exists ($old_fno_ent_cur)) {
      entry_current_rename_subdirectory ($old_nam_ent_cur, $new_nam_ent_cur);
      $log_str = "Entry subdirectory >$old_fno_ent_cur< has been renamed as >$new_nam_ent_cur<";
  }
  else { 
      print_warning ($here,/* Improve because of TWICE */
      "Entry subdirectory $old_fno_ent_cur exist",
      "it does NOT",
      "Check");
  }

    $en_tit = 'the current entry has been renamed as';

    $la_bub_tit  = bubble_bubbled_la_text_of_en_text ($en_tit);
    $la_bub_tit .= ' <i><b> ' . $new_sur_ent_cur . '</b></i>';
    $la_bub_Tit = string_html_capitalized_of_string ($la_bub_tit);
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= $la_bub_Tit;
    $html_str .= comment_exiting_of_function_name ($here);

    exiting_from_function ($here . " with $html_str");
    return $html_str;
}

function entry_current_namenew_save_surname_catalog_update_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $new_nam_ent_cur = irp_provide ('entry_current_namenew_from_entry_current_surnamenew', $here);
    debug_n_check ($here , '$new_nam_ent_cur', $new_nam_ent_cur);

    $new_sur_ent_cur = irp_provide ('entry_current_surnamenew', $here);
    debug_n_check ($here , '$new_sur_ent_cur', $new_sur_ent_cur);
    
    $old_nam_ent_cur = irp_provide ('entry_current_name', $here);
    debug_n_check ($here , '$old_nam_ent_cur', $old_nam_ent_cur);
    
    $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here);
    
    $log_str = '';
    if (array_key_exists ($new_nam_ent_cur, $sur_by_nam_h)) {
        $old_sur_ent_cur = $sur_by_nam_h[$new_nam_ent_cur];
        surname_by_name_hash_replace_n_write_of_name_of_surnamenew_of_current_hash ($new_nam_ent_cur, $new_sur_ent_cur, $sur_by_nam_h);
        $log_str .= "Entry Surname >$old_sur_ent_cur< has been replaced by itself ? >$new_sur_ent_cur< in Surname_catalog";
    }
    else {
        surname_by_name_hash_add_n_write_of_name_of_surname_of_current_hash ($new_nam_ent_cur, $new_sur_ent_cur, $sur_by_nam_h);
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

function entry_current_namenew_save_link_to_return_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

/* Improve clean paths */
/* when returned to entry_list_display_script.php need to remove paths */

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center>' . "\n";
  $html_str .= link_to_return_of_script_to_return ('entry_list_display_script.php');
  $html_str .= '</center>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function entry_current_namenew_save_irp_path_clean () {
  $here = __FUNCTION__;
  entering_in_function ($here);

/* Clean all Father Nodes and Store New as Current */
  irp_path_clean_register_of_top_key_of_bottom_key_of_where ('index', 'READ_entry_fullnameofdirectory_array', $here); 
  irp_path_clean_register_of_top_key_of_bottom_key_of_where ('index', 'READ_surname_catalog_fullnameoffile_array', $here); 
 
  exiting_from_function ($here);
  return;
}

function entry_current_namenew_save_build (){
    $here = __FUNCTION__;
    entering_in_function ($here);

    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= irp_provide ('pervasive_page_header', $here);
    $html_str .= '<br><br>' . "\n";
    
    $html_str .= irp_provide ('entry_current_namenew_save_page_title', $here);
    $html_str .= '<br><br>' . "\n";
    
    $html_str .= irp_provide ('entry_current_namenew_save_entry_subdirectory_rename', $here);
    $html_str .= '<br>' . "\n";

    $html_str .= irp_provide ('entry_current_namenew_save_surname_catalog_update', $here);
    $html_str .= '<br><br>' . "\n";

    entry_current_namenew_save_irp_path_clean (); /* Improve */

    $html_str .= irp_provide ('git_command_n_commit_html', $here);
    $html_str .= '<br><br>' . "\n";
    
    $html_str .= irp_provide ('entry_current_namenew_save_link_to_return', $here);
    $html_str .= '<br><br>' . "\n";
    
    $html_str .= irp_provide ('pervasive_page_footer', $here);
    $html_str .= comment_exiting_of_function_name ($here);

    debug_n_check ($here, '$html_str', $html_str);
    exiting_from_function ($here);
    
    return $html_str;
}

exiting_from_module ($module);

?>