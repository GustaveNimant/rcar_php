<?php

# voir block_new_create_save_old_functions.php

require_once "irp_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function block_new_create_save_page_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);
  $kin_blo = irp_provide ('entry_block_kind', $here);

  if ($kin_blo == 'question'){
      $en_tit = 'page for displaying the result of creation of a new ' . $kin_blo . ' for the'; 
  } 
  else {
      $en_tit = 'page for displaying the result of creation of a new ' . $kin_blo . ' for entry'; 
  }

  $la_bub_tit  = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_tit .= '<i><b> ' . $sur_ent_cur . '</b></i>';
  $la_bub_Tit = string_html_capitalized_of_string ($la_bub_tit);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center>' . "\n";

  if (isset ($_SESSION['message'])) {
      $mes = $_SESSION['message'];
      if ($mes != '') {
          $html_str .= '<br>' . "\n";
          $html_str .= $mes;
          $html_str .= '<br>' . "\n";
      }
  }
  
  $html_str .= common_html_div_background_color_of_html ($la_bub_Tit);
  $html_str .= '</center>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);
  
  return $html_str;
}

function check_is_block_new_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_blo_new = irp_provide ('block_new_name_from_block_new_surname', $here);

  try {
      $old_nam_blo_cur_a = irp_provide ('block_name_array', $here);
      debug_n_check ($here , '$old_nam_blo_cur_a', $old_nam_blo_cur_a);

      if (array_value_exists ($nam_blo_new, $old_nam_blo_cur_a) ) {
          $en_mes_1 = "the block";
          $en_mes_2 = "already exists";
          $la_mes_1 = language_translate_of_en_string ($en_mes_1); 
          $la_mes_2 = language_translate_of_en_string ($en_mes_2);   
          $la_mes =  $la_mes_1 . ' ' . $nam_blo_new . ' ' . $la_mes_2;
          $la_Mes = string_html_capitalized_of_string ($la_mes);
          warning ($here, $la_Mes);
          
          exiting_from_function ($here);
  
          $_SESSION['message'] = $la_Mes;

          include 'block_new_create_script.php'; /* Return to block creation */
          exit;
      }
  }
  catch (Exception $e) {  
      $mes = $e->getMessage();
      $nam_ent = irp_provide ('entry_current_name', $here);
      if ($mes = "Catalog is empty in function block_new_name_catalog_build for Entry name $nam_ent") {
          $log_str .= 'block_new_name_catalog is empty';
      }
  }

  $log_str = "Block >$nam_blo_new< has been checked as new";

  exiting_from_function ($here . " with $log_str");
  return $log_str; 
}

function block_new_content_write_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_mod_cur = module_name_of_module_fullnameoffile (__FILE__);

/* getting DATA $get_val */
  $get_key = 'block_new_surname';
  $sur_blo_new = irp_data_value_retrieve_and_store_of_get_key_of_module_name_of_where ($get_key, $nam_mod_cur, $here);
  $nam_blo_new = irp_provide ('block_new_name_from_block_new_surname', $here);

  $log_str = irp_provide ('check_is_block_new', $here);

  $con_blo_new = irp_provide ('block_new_content', $here);

  $nam_ent = irp_provide ('entry_current_name', $here);

  debug_n_check ($here , '$nam_blo_new', $nam_blo_new);
  debug_n_check ($here , '$con_blo_new', $con_blo_new);

  block_content_write ($nam_ent, $nam_blo_new, $con_blo_new);

  $html_str  = irp_provide ('git_command_n_commit_html', $here);

  exiting_from_function ($here);
  return $html_str;
}

function block_new_create_save_link_to_return_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center>' . "\n";
  $html_str .= link_to_return_of_return_module_nameoffile ('entry_list_display_script.php');
  $html_str .= '</center>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_new_create_save_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('pervasive_page_header', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('block_new_create_save_page_title', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('block_new_content_write', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('block_new_create_save_link_to_return', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('pervasive_page_footer', $here);
  $html_str .= comment_exiting_of_function_name ($here);
 
  debug_n_check ($here, '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
  
}

exiting_from_module ($module);

?>