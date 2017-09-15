<?php

require_once "management_functions.php";

$module = "block_kind_functions";
# entering_in_module ($module);

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

# exiting_from_module ($module);

?>
