<?php
require_once "string_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);


function four_elements_array_off_block_content ($con_blo) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($con_blo)");
 
  $key_1 = "item_current_content :";
  $key_2 = "item_current_justification :";
  $key_3 = "item_previous_content :";
  $key_4 = "block_previous_sha1 :";

  $ele_a = four_elements_array_of_four_keys_off_string ($key_1, $key_2, $key_3, $key_4, $con_blo) ;
  debug ($here, '$ele_a', $ele_a);
  
  exiting_from_function ($here);
  return $ele_a;
}

function block_kind_plural_of_block_kind ($kin_blo) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($kin_blo)");

  switch ($kin_blo) {
  case 'bubble' : 
      $kin_blo_plu = 'bubbles';
      break;

  case 'paragraph' : 
      $kin_blo_plu = 'paragraphs';
      break;

  case 'property' : 
      $kin_blo_plu = 'properties';
      break;

  case 'question' : 
      $kin_blo_plu = 'questions';
      break;

  case 'rule' : 
      $kin_blo_plu = 'rules';
      break;

  default : 
      $kin_blo_plu = $kin_blo;
  }

  debug_n_check ($here , '$kin_blo_plu', $kin_blo_plu);
  exiting_from_function ($here);

  return $kin_blo_plu;

}

function block_file_rename ($nam_ent, $old_nam_blo, $new_nam_blo, $ext_fil) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($nam_ent, $old_nam_blo, $new_nam_blo, $ext_fil)");
    
    $hdir = $_SESSION['parameters']['absolute_path_server'];
    $fnd_ent = $hdir . '/' . $nam_ent;
    debug_n_check ($here , '$fnd_ent', $fnd_ent);
    
    $old_nof = $fnd_ent . '/' . $old_nam_blo . '.' . $ext_fil;  
    $new_nof = $fnd_ent . '/' . $new_nam_blo . '.' . $ext_fil;
    
    file_rename_of_old_of_new_of_where ($old_nof, $new_nof, $here);
    
    debug_n_check ($here , "old block file name", $old_nof);
    debug_n_check ($here , "new block file name", $new_nof);
    exiting_from_function ($here);
    
    return;
}

function block_display_of_block_sha_of_block_content_of_commit_sha ($sha_blo, $con_blo, $sha_com) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($sha_blo, $con_blo, $sha_com)");

    $dat_com = git_commit_commiter_date_of_commit_sha1 ($sha_com);
    $nam_com = git_commit_commiter_name_of_commit_sha1 ($sha_com);
    
    $en_dat = 'date of commit';
    $la_Dat = ucfirst (language_translate_of_en_string ($en_dat));
    
    $en_com = 'committer';
    $la_Com = ucfirst (language_translate_of_en_string ($en_com));
    
    $en_tit = 'block information'; /* date sha1 user .... */
    
    $la_Tit = ucfirst (language_translate_of_en_string ($en_tit));
    
    $html_str  = comment_entering_of_function_name ($here);
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
    $html_str .= comment_exiting_of_function_name ($here);

    exiting_from_function ($here);
    
    return $html_str;
}

?>
