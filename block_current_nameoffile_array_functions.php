<?php

require_once "irp_library.php";
require_once "block_current_nameoffile_array_library.php";

$module = module_name_of_module_nameoffile (__FILE__); 

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";
$Documentation[$module]['block_current_nameoffile'] = "block_current_name.blo";

entering_in_module ($module);

function block_current_nameoffile_array_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_current_name', $here);

  if (block_current_nameoffile_array_is_empty_of_entry_name ($nam_ent) ) {
      $log_str = "block_current_nameoffile_array is empty for Entry >$nam_ent<";
      file_log_write ($here, $log_str);
      $nof_blo_a = array ("No_block_file_yet");
  }
  else {
      $nof_blo_a = block_current_nameoffile_array_read_of_entry_name ($nam_ent);
      debug ($here , '$nof_blo_a', $nof_blo_a);
  }

  $entity = entity_name_of_build_function_name ($here);
  father_n_son_stack_entity_push_of_father_of_son ($entity, "READ_" . $entity);

  debug ($here ,'$nof_blo_a', $nof_blo_a);
  exiting_from_function ($here);
  
  return $nof_blo_a;
}

exiting_from_module ($module);

?>