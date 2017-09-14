<?php

require_once "management_functions.php";
require_once "irp_functions.php";

$module = "block_next_content_functions";
# entering_in_module ($module);

function block_next_content_of_four_elements ($con_ite_nex, $jus_ite_nex, $con_ite_cur, $blo_cur_sha) {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $con_blo_nex  = '';
  $con_blo_nex .= 'item_current_content :';
  $con_blo_nex .= "\n";
  $con_blo_nex .= $con_ite_nex;
  $con_blo_nex .= "\n";

  $con_blo_nex .= 'item_current_justification :';
  $con_blo_nex .= "\n";
  $con_blo_nex .= $jus_ite_nex;
  $con_blo_nex .= "\n";

  $con_blo_nex .= 'item_previous_content :';
  $con_blo_nex .= "\n";
  $con_blo_nex .= $con_ite_cur;
  $con_blo_nex .= "\n";

  $con_blo_nex .= 'block_previous_sha1 :';
  $con_blo_nex .= "\n";
  $con_blo_nex .= $blo_cur_sha;

  debug_n_check ($here , '$con_blo_nex', $con_blo_nex);
  exiting_from_function ($here);

  return $con_blo_nex;

}

function block_next_content_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $con_ite_nex = irp_provide ('item_current_content_modified', $here);
  $jus_ite_nex = irp_provide ('item_current_modified_justification', $here);
  $con_ite_cur = irp_provide ('item_current_content', $here);
  $blo_cur_sha = irp_provide ('block_current_sha1', $here);

  $con_blo_nex = block_next_content_of_four_elements ($con_ite_nex, $jus_ite_nex, $con_ite_cur, $blo_cur_sha);

  debug_n_check ($here , '$con_blo_nex', $con_blo_nex);
  exiting_from_function ($here);

  return $con_blo_nex;

}

# exiting_from_module ($module);


?>