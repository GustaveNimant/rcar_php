<?php

require_once "irp_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is the content of the next block";
$Documentation[$module]['what for'] = "to store the modification of the current block";

entering_in_module ($module);

function item_next_justification_checked_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $jus_ite_cur = irp_provide ('item_current_justification_from_block_current_content', $here);
  $jus_ite_nex = irp_provide ('item_next_justification', $here);

  $ind_jus_ite_cur = $_SESSION['item_next_justification_array'][$jus_ite_cur];
  $ind_jus_ite_nex = $_SESSION['item_next_justification_array'][$jus_ite_nex];

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
