<?php

require_once "irp_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is the content of the next block";
$Documentation[$module]['what for'] = "to store the modification of the current block";

entering_in_module ($module);

function item_next_justification_checked_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

/* Improve check Sélectionner un justificatif */
  $con_jus_ite_cur = irp_provide ('item_current_justification_from_block_current_content', $here);
  $con_jus_ite_nex = irp_provide ('item_next_justification', $here);
  debug_n_check ($here , '$con_jus_ite_cur', $con_jus_ite_cur);
  debug_n_check ($here , '$con_jus_ite_nex', $con_jus_ite_nex);

  $nam_jus_ite_cur = string_first_word_of_string ($con_jus_ite_cur);
  $nam_jus_ite_nex = irp_provide ('justification_name', $here);
  debug_n_check ($here , '$nam_jus_ite_cur', $nam_jus_ite_cur);
  debug_n_check ($here , '$nam_jus_ite_nex', $nam_jus_ite_nex);

  $ind_jus_ite_cur = $_SESSION['item_next_justification_hash'][$nam_jus_ite_cur];
  if (string_is_empty_of_string ($ind_jus_ite_cur) ) {
      $ind_jus_ite_cur = 0;
  }
  $ind_jus_ite_nex = $_SESSION['item_next_justification_hash'][$nam_jus_ite_nex];
  if (string_is_empty_of_string ($ind_jus_ite_nex) ) {
      print_fatal_error ($here,
      "item justification >$nam_jus_ite_nex< were defined in hash",
      "it is NOT",
      "Check");
  }

  debug_n_check ($here , '$ind_jus_ite_cur', $ind_jus_ite_cur);
  debug_n_check ($here , '$ind_jus_ite_nex', $ind_jus_ite_nex);

  if ($ind_jus_ite_nex < $ind_jus_ite_cur) {
      $log_str = "Current item justification >$ind_jus_ite_nex< < >$ind_jus_ite_cur";
      include 'item_current_modify_script.php';
      return $log_str;
  }
  else {
      $log_str = "Current item justification >$ind_jus_ite_nex< >= >$ind_jus_ite_cur";
  }

  debug_n_check ($here , '$log_str', $log_str);
  exiting_from_function ($here);

  return $log_str;

}
