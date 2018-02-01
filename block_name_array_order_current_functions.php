<?php
require_once "irp_library.php";
require_once "block_name_list_order_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is the array of the Block name on disk";
$Documentation[$module]['remark'] = "to ...";

entering_in_module ($module);

function block_name_array_order_current_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

/* $nof_blo_cur_a is the array of files */
/* $nam_blo_ord_a is the array of order */

  $nam_ent_cur = irp_provide ('entry_current_name', $here);
  $nof_blo_cur_a = irp_provide ('block_current_nameoffile_array', $here); /* blocks that are on disk */      
  debug ($here , '$nof_blo_cur_a', $nof_blo_cur_a);

  /* get ordered list from disk */
  /* $nam_blo_lis_cur = block_name_list_order_current_string_read_of_entry_name ($nam_ent_cur); */
  $nam_blo_lis_cur = irp_provide ('block_name_list_order_current_string', $here);
  debug ($here , '$nam_blo_lis_cur', $nam_blo_lis_cur);

  $entity = entity_name_of_build_function_name ($here);
  father_n_son_stack_entity_push_of_father_of_son ($entity, "READ_block_name_list_order_current");

  $glue = $_SESSION['parameters']['glue']; 
  $nam_blo_ord_a = explode ($glue, $nam_blo_lis_cur);
  debug ($here , '$nam_blo_ord_a', $nam_blo_ord_a);

  $ext_blo = $_SESSION['parameters']['extension_block_filename'];

  $cou_nof_blo_cur = count ($nof_blo_cur_a);
  $cou_nam_blo_ord = count ($nam_blo_ord_a);

  $is_obsolete_block_name_list_order_string = TRUE;

  if ($cou_nam_blo_ord == $cou_nof_blo_cur) {
      $nam_blo_cur_ord_a = $nam_blo_ord_a;
      $is_obsolete_block_name_list_order_string = FALSE;
  }
  elseif ($cou_nam_blo_ord > $cou_nof_blo_cur) {
      $nam_blo_cur_ord_a = $nam_blo_ord_a;

      /* more names in Block_name_list_order_string.lis than there are Block files */

      foreach ($nam_blo_ord_a as $key => $nam_blo) {
          debug ($here , 'foreach 1 $nam_blo', $nam_blo);
          $nof_blo = $nam_blo . '.' . $ext_blo;
          if (! in_array ($nof_blo, $nof_blo_cur_a)) {
              unset ($nam_blo_cur_ord_a[$nam_blo]);
              debug_long ($here , 'Block $nam_blo has been excluded from list');
          }
      }
  }
  elseif ($cou_nam_blo_ord < $cou_nof_blo_cur) {
      $nam_blo_cur_ord_a = $nam_blo_ord_a;

      /* more current Block files than in Block_name_list_order_string.lis */
      
      foreach ($nof_blo_cur_a as $key => $nof_blo) {
          $nam_blo = str_replace (".$ext_blo", '', $nof_blo);
          debug ($here , 'foreach 2 $nam_blo', $nam_blo);
          if (! in_array ($nam_blo, $nam_blo_ord_a)) {
              array_push ($nam_blo_cur_ord_a, $nam_blo);
              debug_long ($here , 'Block $nam_blo has been added to list');
          }
      }
  }   

  /* Improve delete file Block_name_list_order_string.lis */

  if ($is_obsolete_block_name_list_order_string) {
      $hdir = $_SESSION['parameters']['absolute_path_server'];
      $fnd_ent_cur = $hdir . '/' . $nam_ent_cur;
      debug_n_check ($here , '$fnd_ent_cur', $fnd_ent_cur);

      $ext_nam_blo_lis = $_SESSION['parameters']['extension_block_name_list_order_filename'];
      $fno_nam_blo_lis = $fnd_ent_cur . '/' . 'Block_name_list_order_string' . '.' . $ext_nam_blo_lis;

      irp_path_clean_register_of_top_key_of_bottom_key_of_where ('index', 'block_name_list_order_current_string', $here);

      file_remove_of_fullnameoffile ($fno_nam_blo_lis);
  }

  check_is_array_unique_of_what_of_array ('$nam_blo_cur_ord_a', $nam_blo_cur_ord_a);
   
  $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here);
  surname_by_name_hash_check_are_surnamed_of_nameofarray_of_current_array ('entry_name_array', $nam_blo_cur_ord_a, $sur_by_nam_h);
  
  debug ($here , '$nam_blo_cur_ord_a', $nam_blo_cur_ord_a);
  exiting_from_function ($here);
  
  return $nam_blo_cur_ord_a;
}

exiting_from_module ($module);

?>