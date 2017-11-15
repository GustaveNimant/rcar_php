<?php
require_once "irp_library.php";
require_once "block_name_list_order_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function block_name_list_order_current_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_current_name', $here);
  $nof_blo_cur_a = irp_provide ('block_current_nameoffile_array', $here); /* blocks that are on disk */      

  $nam_blo_lis = block_name_list_order_read_of_entry_name ($nam_ent); /* get ordered list from disk */

  $entity = entity_name_of_build_function_name ($here);
  father_n_son_stack_entity_push_of_father_of_son ($entity, "READ_block_name_list_order");

  $glue = $_SESSION['parameters']['glue']; 
  $nam_blo_ord_a = explode ($glue, $nam_blo_lis);

  $ext_blo = $_SESSION['parameters']['extension_block_filename'];
  $nam_blo_cur_ord_a = array ();

  foreach ($nam_blo_ord_a as $key => $nam_blo) {
      debug ($here , '$nam_blo', $nam_blo);
      $nof_blo = $nam_blo . '.' . $ext_blo;
      if (in_array ($nof_blo, $nof_blo_cur_a)) {
          array_push ($nam_blo_cur_ord_a, $nam_blo);
          unset ($nof_blo_cur_a[$nof_blo]);
      }
  }
  
  if (count ($nof_blo_cur_a > 0)) {
      foreach ($nof_blo_cur_a as $key => $nof_blo) {
          $nam_blo = str_replace (".$ext_blo", '', $nof_blo);
          array_push ($nam_blo_cur_ord_a, $nam_blo);
      }
  }

  if (! has_values_unique_of_any_array ($nam_blo_cur_ord_a)) {
      $en_mes_1 = 'the array';
      $en_mes_2 = 'is NOT unique';
      $la_mes_1 = language_translate_of_en_string ($en_mes_1); 
      $la_mes_2 = language_translate_of_en_string ($en_mes_2);   
      $la_mes =  $la_mes_1 . ' ' . 'block_name_list_order_current' . ' ' . $la_mes_2;
      $la_Mes = string_html_capitalized_of_string ($la_mes);
      warning ($here, $la_Mes);
  }

  $nam_blo_cur_ord_a = array_unique ($nam_blo_cur_ord_a);
  debug ($here , '$nam_blo_cur_ord_a', $nam_blo_cur_ord_a);

  $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here);
  surname_by_name_hash_check_are_surnamed_of_nameofarray_of_current_array ('entry_name_array', $nam_blo_cur_ord_a, $sur_by_nam_h);

  check_is_array_unique_of_what_of_array ('block_name_list_order_current', $nam_blo_cur_ord_a);

  exiting_from_function ($here);

  return $nam_blo_cur_ord_a;
}

exiting_from_module ($module);

?>