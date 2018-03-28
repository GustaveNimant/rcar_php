<?php
require_once "entry_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function entry_current_typenew_save_page_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'page for displaying the result of saving the retyping of the entry';

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

function entry_current_typenew_save_justification_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $typ_ent_jus  = irp_provide ('entry_current_typenew_justification', $here);
  $typ_ent_jus .= "\n" . irp_provide ('user_information', $here);
  debug_n_check ($here , '$typ_ent_jus', $jus_ent);

  exiting_from_function ($here . " with \$typ_ent_jus >$typ_ent_jus<");

  return $jus_ent; 
}

function entry_current_typenew_save_entry_retype_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $new_typ_ent_cur = irp_provide ('entry_current_typenew', $here);
  debug_n_check ($here , '$new_typ_ent_cur', $new_typ_ent_cur);

  $nam_ent_cur = irp_provide ('entry_current_name', $here);
  debug_n_check ($here , '$nam_ent_cur', $nam_ent_cur);

  $hdir = $_SESSION['parameters']['absolute_path_server'];
  $old_fnd_ent_cur = $hdir . '/' . $old_nam_ent_cur;
  debug_n_check ($here , '$old_fnd_ent_cur', $old_fnd_ent_cur);

  $log_str = '';
  if ( file_exists ($old_fnd_ent_cur)) {
      entry_current_retype_subdirectory ($old_nam_ent_cur, $new_nam_ent_cur);
      $log_str = "Entry subdirectory >$old_fnd_ent_cur< has been retyped as >$new_nam_ent_cur<";
  }
  else { 
      print_fatal_error ($here,
      "Entry subdirectory $old_fnd_ent_cur exist",
      "it does NOT",
      "Check");
  }

    $en_tit = 'the current entry has been retyped as';

    $la_bub_tit  = bubble_bubbled_la_text_of_en_text ($en_tit);
    $la_bub_tit .= ' <i><b> ' . $new_typ_ent_cur . '</b></i>';
    $la_bub_Tit = string_html_capitalized_of_string ($la_bub_tit);
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= $la_bub_Tit;
    $html_str .= comment_exiting_of_function_name ($here);

    exiting_from_function ($here . " with $html_str");
    return $html_str;
}

function entry_current_typenew_save_entry_type_catalog_update_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $new_typ_ent_cur = irp_provide ('entry_current_typenew', $here);
    debug_n_check ($here , '$new_typ_ent_cur', $new_typ_ent_cur);

    $old_typ_ent_cur = irp_provide ('entry_current_type', $here);
    debug_n_check ($here , '$old_typ_ent_cur', $old_typ_ent_cur);

    $nam_ent_cur = irp_provide ('entry_current_name', $here);
    debug_n_check ($here , '$nam_ent_cur', $nam_ent_cur);
    
    $typ_ent_by_nam_ent_h = irp_provide ('entry_type_by_entry_name_hash', $here);
    
    $log_str = '';
    if (array_key_exists ($new_typ_ent_cur, $typ_ent_by_nam_ent_h)) {
        $old_sur_ent_cur = $typ_ent_by_nam_ent_h[$new_typ_ent_cur];

        entry_type_by_entry_name_hash_replace_n_write_of_entry_name_of_entry_typenew_of_current_hash ($nam_ent_cur, $new_typ_ent_cur, $typ_ent_by_nam_ent_h);

        $log_str .= "Entry Type >$old_sur_ent_cur< has been replaced by itself ? >$new_typ_ent_cur< in Entry_type_catalog";
    }
    else {
        entry_type_by_entry_name_hash_add_n_write_of_entry_name_of_entry_type_of_current_hash ($nam_ent_cur, $new_typ_ent_cur, $typ_ent_by_nam_ent_h);

        $log_str .= "Entry >$nam_ent_cur< has been retyped >$new_typ_ent_cur< in entry type catalog";
    }

    file_log_write ($here, $log_str);

    $fno_typ_ent_cat = $_SESSION['parameters']['absolute_path_server_entry_type_catalog'];
 
    $en_tit = 'the current entry has been retyped in catalog';

    $la_bub_tit  = bubble_bubbled_la_text_of_en_text ($en_tit);
    $la_bub_tit .= ' <i><b> ' . $fno_typ_ent_cat . '</b></i>';
    $la_bub_Tit = string_html_capitalized_of_string ($la_bub_tit);
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= $la_bub_Tit;
    $html_str .= comment_exiting_of_function_name ($here);

    exiting_from_function ($here . " with $html_str");
    return $html_str;
}

function entry_current_typenew_save_link_to_return_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'back to entry list';
  
  $la_tit = language_translate_of_en_string ($en_tit);
  
  $script_to_return = 'entry_list_display_script.php';
  
  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center>' . "\n";
  $html_str .= link_to_return_of_la_title_of_script_to_return ($la_tit, $script_to_return);
  $html_str .= '</center>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function entry_current_typenew_save_build (){
    $here = __FUNCTION__;
    entering_in_function ($here);

    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= irp_provide ('pervasive_page_header', $here);
    $html_str .= '<br><br>' . "\n";
    
    $html_str .= irp_provide ('entry_current_typenew_save_page_title', $here);
    $html_str .= '<br><br>' . "\n";
    
    /* $html_str .= irp_provide ('entry_current_typenew_save_entry_retype', $here); */
    /* $html_str .= '<br>' . "\n"; */

    $html_str .= irp_provide ('entry_current_typenew_save_entry_type_catalog_update', $here);
    $html_str .= '<br><br>' . "\n";

    $html_str .= irp_provide ('git_command_n_commit_html', $here);
    $html_str .= '<br><br>' . "\n";
    
    $html_str .= irp_provide ('entry_current_typenew_save_link_to_return', $here);
    $html_str .= '<br><br>' . "\n";
    
    $html_str .= irp_provide ('pervasive_page_footer', $here);
    $html_str .= comment_exiting_of_function_name ($here);

    debug_n_check ($here, '$html_str', $html_str);
    exiting_from_function ($here);
    
    return $html_str;
}

exiting_from_module ($module);

?>