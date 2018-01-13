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
    
    $dir = file_specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);
    
    $old_nof = $dir . $old_nam_blo . '.' . $ext_fil;  
    $new_nof = $dir . $new_nam_blo . '.' . $ext_fil;
    
    file_rename_of_old_of_new_of_where ($old_nof, $new_nof, $here);
    
    debug_n_check ($here , "old block file name", $old_nof);
    debug_n_check ($here , "new block file name", $new_nof);
    exiting_from_function ($here);
    
    return;
}


?>
