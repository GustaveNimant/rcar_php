<?php
require_once "irp_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function entry_new_create_save_page_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_ent_cur = irp_provide ('entry_new_surname', $here);

  $en_tit = 'page for displaying the result of creation of the new entry'; 

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

function entry_new_create_save_subdirectory_create_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_ent_new = irp_provide ('entry_new_surname', $here); /* ??? */ 
  $nam_ent_new = irp_provide ('entry_new_name_from_entry_new_surname', $here); 
  
  debug_n_check ($here, '$nam_ent_new', $nam_ent_new);

  $eol = end_of_line ();

  $en_tit = 'the directory of entry';
  $la_tit = language_translate_of_en_string ($en_tit);
  
/* new entry */

  if (entry_is_subdirectory_of_entry_name ($nam_ent_new) ) {
      $la_cre = language_translate_of_en_string ('already exists');
  } else {
      entry_subdirectory_create_of_entry_name ($nam_ent_new);
      $la_cre = language_translate_of_en_string ('has been created');
  }

  $html_str = $la_tit . ' <b><i>' . $nam_ent_new . '</i></b> ' . $la_cre;

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function entry_new_create_save_surname_update_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $sur_ent_new = irp_provide ('entry_new_surname', $here); /* ??? */ 
    $nam_ent_new = irp_provide ('entry_new_name_from_entry_new_surname', $here); 
    
    debug_n_check ($here, '$nam_ent_new', $nam_ent_new);
    
    $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here);

    surname_by_name_hash_add_n_write_of_name_of_surname_of_current_hash ($nam_ent_new, $sur_ent_new, $sur_by_nam_h) ;
    $fno_sur_cat = $_SESSION['parameters']['absolute_path_server_surname_catalog'];
    $log_str = "entry_new_surname >$sur_ent_new< has been added to $fno_sur_cat";
    
    exiting_from_function ($here);
    return $log_str;
}


function entry_new_create_save_irp_path_clean () {
  $here = __FUNCTION__;
  entering_in_function ($here);
  
  irp_path_clean_register_of_top_key_of_bottom_key_of_where ('index', 'READ_entry_fullnameofdirectory_array', $here); 
  
  exiting_from_function ($here);
  return;
}


function entry_new_create_save_link_to_return_build () {
  $here = __function__;
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

function entry_new_create_save_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('pervasive_page_header', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('entry_new_create_save_page_title', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('entry_new_create_save_subdirectory_create', $here);
  $html_str .= '<br><br>' . "\n";

  $log_str   = irp_provide ('entry_new_create_save_surname_update', $here);
  file_log_write ($here, $log_str);

  entry_new_create_save_irp_path_clean ();

  $html_str .= irp_provide ('git_command_n_commit_html', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('entry_new_create_save_link_to_return', $here);
  $html_str .= '<br><br>' . "\n";
  
  $html_str .= irp_provide ('pervasive_page_footer', $here);
  $html_str .= comment_exiting_of_function_name ($here);
  
  debug_n_check ($here , '$html_str',  $html_str);

  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>