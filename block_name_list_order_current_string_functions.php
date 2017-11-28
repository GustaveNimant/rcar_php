<?php
require_once "irp_library.php";
require_once "block_name_list_order_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);
$Documentation[$module]['what is it'] = "it reads the Block name list ordered from disk";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function block_name_list_order_current_string_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_current_name', $here);
  $nof_blo_cur_a = irp_provide ('block_current_nameoffile_array', $here); /* blocks that are on disk */      

  $nam_blo_lis = block_name_list_order_current_string_read_of_entry_name ($nam_ent); /* get ordered list from disk */

  $entity = entity_name_of_build_function_name ($here);
  father_n_son_stack_entity_push_of_father_of_son ($entity, "READ_block_name_list_order_current");

  exiting_from_function ($here . " with \$nam_blo_lis >$nam_blo_lis<");

  return $nam_blo_lis;
}

exiting_from_module ($module);

?>