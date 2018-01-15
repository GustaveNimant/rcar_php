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

  $dir_pat = file_specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);
  $ext_nam_blo_lis = $_SESSION['parameters']['extension_block_name_list_order_filename'];
  $fno_nam_blo_lis = $dir_pat . 'Block_name_list_order_string.' . $ext_nam_blo_lis;

  if (file_is_existing_of_fullnameoffile ($fno_nam_blo_lis)) {
      /* get ordered list from disk */
      $nam_blo_lis = block_name_list_order_current_string_read_of_entry_name ($nam_ent); 

      /* Improve check adequacy of Block_name_list_order_string.lis and array of nameoffile  */
  }
  else {
      /* create blocks order string from what is on disk */      
      $nof_blo_cur_a = irp_provide ('block_current_nameoffile_array', $here); 
      debug ($here , '$nof_blo_cur_a', $nof_blo_cur_a);
      $nam_blo_lis = block_name_list_order_of_block_nameoffile_array_order ($nof_blo_cur_a);
      debug ($here , '$nam_blo_lis', $nam_blo_lis);

      $log_str = block_name_list_order_write_of_entry_name_of_block_name_list_order_string ($nam_ent, $nam_blo_lis);
      file_log_write ($here, $log_str);

/* Improve is that correct ? */
      $entity = entity_name_of_build_function_name ($here);
      father_n_son_stack_entity_push_of_father_of_son ("WRITE_block_name_list_order_current_string", $entity);
  }

  $entity = entity_name_of_build_function_name ($here);
  father_n_son_stack_entity_push_of_father_of_son ($entity, "READ_block_name_list_order_current_string");

  exiting_from_function ($here . " with \$nam_blo_lis >$nam_blo_lis<");

  return $nam_blo_lis;
}

exiting_from_module ($module);

?>