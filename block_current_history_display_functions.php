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

  foreach ($con_blo_by_sha_blo_h as $sha_blo => $con_blo) {

      debug_n_check ($here, '$sha_blo', $sha_blo);
      debug_n_check ($here, '$con_blo', $con_blo);

      if ($sha_blo == "EMPTY_BLOB_SHA1") {
          break;
      }

      $sha_com = $sha_com_by_sha_blo_h[$sha_blo];

      $dat_com = git_commit_commiter_date_of_commit_sha1 ($sha_com);
      $nam_com = git_commit_commiter_name_of_commit_sha1 ($sha_com);

      $en_dat = 'date of commit';
      $la_Dat = ucfirst (language_translate_of_en_string ($en_dat));

      $en_com = 'committer';
      $la_Com = ucfirst (language_translate_of_en_string ($en_com));

      $en_tit = 'block information'; /* date sha1 user .... */
      $la_Tit = ucfirst (language_translate_of_en_string ($en_tit));


      $html_str .= '<b>' . common_html_span_background_color_of_html ($la_Tit) . '</b>';
      $html_str .= '<br><br>';
      $html_str .= '<b>' . $la_Dat . '</b> : ' . $dat_com  ;
      $html_str .= '<br><br>';
      $html_str .= '<b>' . $la_Com . '</b> : ' . $nam_com  ;
      $html_str .= '<br><br>';

      $en_tit = 'blob current sha1';
      $la_Tit = ucfirst (language_translate_of_en_string ($en_tit));

      $html_str .= common_html_span_background_color_of_html ($la_Tit);
      $html_str .= ' :<br>';
      $html_str .= $sha_blo;
      $html_str .= '<br><br>';

      $en_tit = 'item current content';
      $la_Tit = ucfirst (language_translate_of_en_string ($en_tit));
      $html_str .= common_html_span_background_color_of_html ($la_Tit);
      $html_str .= ' :<br>';
      $con_ite_cur = item_current_content_of_block_current_content ($con_blo);
      $html_str .= $con_ite_cur;
      $html_str .= '<br><br>';

      $en_tit = 'item current justification';
      $la_Tit = ucfirst (language_translate_of_en_string ($en_tit));
      $html_str .= common_html_span_background_color_of_html ($la_Tit);
      $html_str .= ' :<br>';
      $jus_ite_cur = item_current_justification_of_block_current_content ($con_blo);
      $html_str .= $jus_ite_cur;
      $html_str .= '<br><br>';

      $en_tit = 'item previous content';
      $la_Tit = ucfirst (language_translate_of_en_string ($en_tit));
      $html_str .= common_html_span_background_color_of_html ($la_Tit);
      $html_str .= ' :<br>';
      $con_ite_pre = item_previous_content_of_block_current_content ($con_blo);
      $html_str .= $con_ite_pre;
      $html_str .= '<br><br>';

      $en_tit = 'block previous sha1';
      $la_Tit = ucfirst (language_translate_of_en_string ($en_tit));
      $html_str .= common_html_span_background_color_of_html ($la_Tit);
      $html_str .= ' :<br>';
      $sha_blo_pre = block_previous_sha1_of_block_current_content ($con_blo);
      $html_str .= $sha_blo_pre;
      $html_str .= '<br>';

      $html_str .= '<br>';
  }

  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}


function block_current_history_display_link_to_return_build () {
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
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('block_current_history_display_link_to_return', $here);

  $html_str .= irp_provide ('pervasive_page_footer', $here);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>