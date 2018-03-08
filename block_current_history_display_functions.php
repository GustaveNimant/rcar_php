<?php
require_once "irp_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function block_current_history_display_page_title_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);
  $sur_blo_cur = irp_provide ('block_current_surname_from_block_current_name', $here);
  $kin_blo = irp_provide ('entry_block_kind', $here);

  $en_tit = 'page for displaying the history of the ' . $kin_blo;  

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit  = string_html_capitalized_of_string ($la_bub_tit);
  $la_bub_Tit .= ' <i><b> ' . $sur_blo_cur . '</b></i> '; 

  $en_tit = 'for entry';
  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit .= $la_bub_tit;
  $la_bub_Tit .= ' <i><b> ' . $sur_ent_cur . '</b></i> '; 
  
  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center>';
  $html_str .= common_html_div_background_color_of_html ($la_bub_Tit);
  $html_str .= '</center>';
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_current_history_display_content_array_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent_cur = irp_provide ('entry_current_name', $here);
  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);

  $con_blo_by_sha_blo_h = irp_provide ('git_blob_content_by_blob_sha1_hash', $here);
  debug_n_check ($here, '$con_blo_by_sha_blo_h', $con_blo_by_sha_blo_h);

  $sha_com_by_sha_blo_h = irp_provide ('git_commit_sha1_by_blob_sha1_hash', $here);

  $html_str  = comment_entering_of_function_name ($here);

/* Improve alternate background */
  $cou_blo = 0;
  foreach ($con_blo_by_sha_blo_h as $sha_blo => $con_blo) {

      if ($sha_blo == "EMPTY_BLOB_SHA1") {
          break;
      }
      
      $sha_com = $sha_com_by_sha_blo_h[$sha_blo];
    
      $cou_blo = $cou_blo +1;
      debug_n_check ($here, '$cou_blo $sha_blo', 'block # ' . $cou_blo . ' sha1 = ' . $sha_blo);
      debug_n_check ($here, '$cou_blo $sha_blo', 'block # ' . $cou_blo . ' content = ' . $con_blo);

      $blo_str  = block_display_of_block_sha_of_block_content_of_commit_sha ($sha_blo, $con_blo, $sha_com);
      $blo_str .= '<hr>' . "\n";
      if ($cou_blo%2 == 0) {
          $html_str .= common_html_div_yellow_background_color_of_html ($blo_str);
      } else {
          $html_str .= common_html_div_green_background_color_of_html ($blo_str);
      }
  }

  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_current_history_display_link_to_return_block_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $get_key = 'block_current_name';
    $get_val = irp_provide ('block_current_name', $here);
    $sur_blo_cur = irp_provide ('block_current_surname_from_block_current_name', $here);
    
    $script_to_return = 'block_current_display_script.php';

    $kin_blo = irp_provide ('entry_block_kind', $here);

    $en_txt = 'back to the ' . $kin_blo;

    $la_txt  = language_translate_of_en_string ($en_txt);
    $la_Txt  = string_html_capitalized_of_string ($la_txt);
    $la_Txt .= ' <b><i>' . $sur_blo_cur . '</i></b>';

    debug_n_check ("$here", '$la_Txt', $la_Txt);
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<center>' . "\n";
    $html_str .= link_to_return_of_string_of_get_key_of_get_val_of_script_to_return ($la_Txt, $get_key, $get_val, $script_to_return) . "\n";
    $html_str .= '</center>' . "\n";
    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here , '$html_str',  $html_str);
    exiting_from_function ($here);
    
    return $html_str;
}

function block_current_history_display_link_to_return_entry_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent_cur = irp_provide ('entry_current_name', $here);
  $sur_ent_cur = irp_provide ('entry_current_surname_from_entry_current_name', $here);

  $script_to_return = 'entry_current_display_script.php';

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center>' . "\n";
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_script_to_return ($nam_ent_cur, $sur_ent_cur, $script_to_return);
  $html_str .= '</center>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function block_current_history_display_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('pervasive_page_header', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('block_current_history_display_page_title', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('block_current_history_display_content_array', $here);
  $html_str .= '<br>' . "\n";

  $html_str .= irp_provide ('block_current_history_display_link_to_return_block', $here);
  $html_str .= '<br>' . "\n";

  $html_str .= irp_provide ('block_current_history_display_link_to_return_entry', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('pervasive_page_footer', $here);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>