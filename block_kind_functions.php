<?php

require_once "management_functions.php";

$module = "block_kind_functions";
# entering_in_module ($module);

function block_kind_plural_of_block_kind ($kin_ite) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($kin_ite)");

  switch ($kin_ite) {
  case 'bubble' : 
      $kin_ite_plu = 'bubbles';
      break;

  case 'paragraph' : 
      $kin_ite_plu = 'paragraphs';
      break;

  case 'property' : 
      $kin_ite_plu = 'properties';
      break;

  case 'question' : 
      $kin_ite_plu = 'questions';
      break;

  case 'rule' : 
      $kin_ite_plu = 'rules';
      break;

  default : 
      $kin_ite_plu = $kin_ite;
  }


  debug_n_check ($here , '$kin_ite_plu', $kin_ite_plu);
  exiting_from_function ($here);

  return $kin_ite_plu;

}

# exiting_from_module ($module);

?>
