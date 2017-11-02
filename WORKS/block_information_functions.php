<?php

require_once "array_library.php";
require_once "block_modify_save_functions.php";
require_once "file_library.php";
require_once "block_content_by_block_name_hash_functions.php";
require_once "block_create_functions.php";
require_once "debug_library.php";
require_once "button_submit_functions.php";
require_once "irp_functions.php";
require_once "bubble_library.php";

$module = "block_information_functions";
entering_in_module ($module);

function block_information_texts_defaults_array_en_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $kin_blo = irp_provide ('block_kind', $here);
  $sur_ite = irp_provide ('block_current_surname_from_block_current_name', $here);
  $act_ite = irp_provide ('block_action', $here);
  $sur_ent = irp_provide ('entry_current_surname_from_entry_current_name', $here);
  $nam_ite = irp_provide ('block_current_name', $here);
  $nam_ent = irp_provide ('entry_current_name', $here);

  $kin_blo_a = array ('article', 'paragraph', 'property', 'rule');
  $act_ite_a = array ('create', 'remove', 'justify', 'modify', 'rename');

  $tit_sec_a = array ( 'top_section' => 
		       array (
			      'text 2' => 'for entry',
			      'block_kind' => $kin_blo,
			      'block_current_surname' => $sur_ite,
			      'entry_current_surname' => $sur_ent,
			      ),
		       );

  $bub_sec_a = array ( 'bubble_section' => 
		       array (
			      /* ucfirst ($act_ite), */
			      $kin_blo,
			      'entry',
			      )
		       );     

  $inf_ite_txt_def_a = array_merge ($tit_sec_a, $bub_sec_a);

  # debug_n_check ($here , "inf_ite_txt_def_a", $inf_ite_txt_def_a);

  exiting_from_function ($here);

  return $inf_ite_txt_def_a;
}

function block_information_texts_specific_array_en_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
  
  $kin_blo = irp_provide ('block_kind', $here);
  $sur_ite = irp_provide ('block_current_surname_from_block_current_name', $here);
  $act_ite = irp_provide ('block_action', $here);
  $sur_ent = irp_provide ('entry_current_surname_from_entry_current_name', $here);
  $nam_ite = irp_provide ('block_current_name', $here);
  $nam_ent = irp_provide ('entry_current_name', $here);
  
  $inf_ite_txt_spe_a = array (); 
  $spe_ite_a = $inf_ite_txt_spe_a[$en_key][$kin_blo];

  switch ($kin_blo) {
  case 'article' :
    $spe_ite_a['create']['top_section']['text 1'] = $act_ite . ' the ' . $kin_blo;
    $spe_ite_a['remove']['top_section']['text 1'] = $act_ite . ' the ' . $kin_blo;
    $spe_ite_a['justify']['top_section']['text 1'] = $act_ite . ' the ' . $kin_blo;
    $spe_ite_a['modify']['top_section']['text 1'] = $act_ite . ' the ' . $kin_blo;
    $spe_ite_a['rename']['top_section']['text 1'] = $act_ite . ' the ' . $kin_blo;
    break;
  case 'paragraph' :
    $spe_ite_a['create']['top_section']['text 1'] = $act_ite . ' the ' . $kin_blo;
    $spe_ite_a['remove']['top_section']['text 1'] = $act_ite . ' the ' . $kin_blo;
    $spe_ite_a['justify']['top_section']['text 1'] = $act_ite . ' the ' . $kin_blo;
    $spe_ite_a['modify']['top_section']['text 1'] = $act_ite . ' the ' . $kin_blo;
    $spe_ite_a['rename']['top_section']['text 1'] = $act_ite . ' the ' . $kin_blo;
    break;
  case 'property' :
    $spe_ite_a['create']['top_section']['text 1'] = $act_ite . ' the ' . $kin_blo;
    $spe_ite_a['remove']['top_section']['text 1'] = $act_ite . ' the ' . $kin_blo;
    $spe_ite_a['justify']['top_section']['text 1'] = $act_ite . ' the ' . $kin_blo;
    $spe_ite_a['modify']['top_section']['text 1'] = $act_ite . ' the ' . $kin_blo;
    $spe_ite_a['rename']['top_section']['text 1'] = $act_ite . ' the ' . $kin_blo;
    break;
  case 'rule' :
    $spe_ite_a['create']['top_section']['text 1'] = $act_ite . ' the ' . $kin_blo;
    $spe_ite_a['remove']['top_section']['text 1'] = $act_ite . ' the ' . $kin_blo;
    $spe_ite_a['justify']['top_section']['text 1'] = $act_ite . ' the ' . $kin_blo;
    $spe_ite_a['modify']['top_section']['text 1'] = $act_ite . ' the ' . $kin_blo;
    $spe_ite_a['rename']['top_section']['text 1'] = $act_ite . ' the ' . $kin_blo;
    break;
  default : 
    fatal_error ($here, "unkown entry_kind >$kin_blo<for block >$en_key<");
  }
  
  $inf_ite_txt_spe_a[$en_key][$kin_blo][$act_ite] = $spe_ite_a[$act_ite];
  # debug_n_check ($here , "output block_information array specific in english", $inf_ite_txt_spe_a);

  exiting_from_function ($here);

  return $spe_ite_a[$act_ite];
  
};

function block_information_texts_array_en_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
  
  $inf_def_a = irp_provide ('block_information_texts_defaults_array_en', $here);
  $inf_spe_a = irp_provide ('block_information_texts_specific_array_en', $here);

  # debug_n_check ($here , "inf_spe_a", $inf_spe_a);
  # debug_n_check ($here , "inf_def_a", $inf_def_a);

  $inf_ite_txt_a = array_merge_recursive ($inf_spe_a, $inf_def_a); 
  # debug_n_check ($here , '$inf_ite_txt_a', $inf_ite_txt_a);

  exiting_from_function ($here);

  return $inf_ite_txt_a;
 }

function block_information_texts_array_lan_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  include "language_translate_register.php";

  $en_txt_by_en_key_txt_a = irp_provide ('block_information_texts_array_en', $here);

  $inf_ite_txt_lan_a = array ();
  /* en_key_txt = top_section bubble_section */

  foreach ($en_txt_by_en_key_txt_a as $en_key_txt => $arr_tit_a) {
	
    if ($en_key_txt == 'top_section') {
      
      $worlan_a = array ();   
      foreach ($arr_tit_a as $k => $w_en) {

	if (is_substring_of_substring_off_string ('text ', $k)){
	  $worlan_a[$k] = $worlan;
	}
      }
      $inf_ite_txt_lan_a[$en_key_txt] = $worlan_a;
    }
    else if ($en_key_txt == 'bubble_section') {

      $worlan_a = array ();   
      foreach ($arr_tit_a as $k => $w_en) {

	$worlan_a[$k] = $worlan;
	
      }
      $inf_ite_txt_lan_a[$en_key_txt] = $worlan_a;
    }
    else {
      $mes  = "expecting \$en_key_txt were top_section or bubble_section\n";
      $mes .= "found     \$en_key_txt = $en_key_txt";
      fatal_error ($here, $mes);
    }
  }

  # debug_n_check ($here , '$inf_ite_txt_lan_a', $inf_ite_txt_lan_a);
  exiting_from_function ($here);
  
  return $inf_ite_txt_lan_a;
}


exiting_from_module ($module);

?>