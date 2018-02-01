<?php

require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function block_content_formatting_of_block_content ($con_blo) {
  $here = __FUNCTION__;
  entering_in_function ($here);

# replace double space by <br>
  $con_blo_for = str_replace('  ', '<br> ', $con_blo);

  debug ($here , '$con_for_blo', $con_blo_for);
  exiting_from_function ($here);

  return $con_blo_for;
}

function block_content_by_block_name_hash_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_current_name', $here);
  $nam_blo_a = irp_provide ('block_name_array_order_current', $here);

  if (array_is_empty_of_array ($nam_blo_a)) {
    $con_by_nam_blo_a = array ();
  }
  else {
      $hdir = $_SESSION['parameters']['absolute_path_server'];
      $fdi_ent = $hdir . '/' . $nam_ent;
      debug_n_check ($here , "fdi_ent", $fdi_ent);

      $ext_blo = $_SESSION['parameters']['extension_block_filename'];
      
      $con_blo_by_nam_blo_a = array ();
      foreach ($nam_blo_a as $nam_blo) {
          $fno_blo = $fdi_ent . '/' . $nam_blo . '.' . $ext_blo;
          
/* Read Block_content from Disk */      
      $con_blo = file_content_read_of_fullnameoffile ($fno_blo);

      if (string_is_empty_of_string ($con_blo)) {
          fatal_error ($here, "block >$nam_blo< has an EMPTY content");
      }
      
      $con_blo_by_nam_blo_a[$nam_blo] = $con_blo;
    }
  }
  
  debug_n_check ($here , '$con_blo_by_nam_blo_a', $con_blo_by_nam_blo_a);
  exiting_from_function ($here);

  return $con_blo_by_nam_blo_a;
};

function block_content_formatted_by_block_name_list_order_current_string_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $con_by_nam_blo_a = irp_provide ('block_content_by_block_name_hash', $here);

  $con_blo_for_by_nam_blo_a = array ();
  foreach ($con_by_nam_blo_a as $nam_blo => $con_blo) {
      $con_blo_for = block_content_formatting_of_block_content ($con_blo);
      $con_blo_for_by_nam_blo_a[$nam_blo] = $con_blo_for;
  }

  debug_n_check ($here , '$con_blo_for_by_nam_blo_a', $con_blo_for_by_nam_blo_a);
  exiting_from_function ($here);

  return $con_blo_for_by_nam_blo_a;
}

exiting_from_module ($module);

?>
