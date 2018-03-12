<?php
require_once "irp_library.php";
require_once "item_any_content_linked_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";
$Documentation[$module]['surname_local_array'] = "the array of the surnames that begins as the current word";

/*
let sub_sentence in their original case

$sen_ori="Toutes les populations ont une Volonté générale et une volonté populaire";
#           0     1       2       3   4    5         6     7  8    9      10  

*/

entering_in_module ($module);

function item_current_content_linked_by_item_name_hash_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $con_by_nam_blo_a = irp_provide ('block_content_by_block_name_hash', $here);

  $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here); 
  $sur_low_a = lowercase_n_sort_of_string_by_key_array ($sur_by_nam_h);
  $nam_ent_a = irp_provide ('entry_name_array', $here);

  $con_ite_cur_by_nam_blo_a = array ();
  foreach ($con_by_nam_blo_a as $nam_blo => $con_blo) {
      $con_ite_cur = item_current_content_off_block_current_content ($con_blo);

      $wor_lin_cur = replace_all_sub_sentence_by_links_of_surname_by_name_hash_of_entry_name_array_of_item_content_of_surname_lowercase_array ($sur_by_nam_h, $nam_ent_a, $con_ite_cur, $sur_low_a);

      $con_ite_cur_by_nam_blo_a [$nam_blo] = $wor_lin_cur;

  }

  debug ($here, '$con_ite_cur_by_nam_blo_a', $con_ite_cur_by_nam_blo_a);
  exiting_from_function ($here);
  
  return $con_ite_cur_by_nam_blo_a;
}

function item_current_content_linked_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here); 
  $sur_low_a = lowercase_n_sort_of_string_by_key_array ($sur_by_nam_h);
  $nam_ent_a = irp_provide ('entry_name_array', $here);
  
  $con_ite_cur = irp_provide ('item_current_content_from_block_current_content', $here);
  $con_ite_cur_lin = replace_all_sub_sentence_by_links_of_surname_by_name_hash_of_entry_name_array_of_item_content_of_surname_lowercase_array ($sur_by_nam_h, $nam_ent_a, $con_ite_cur, $sur_low_a);

  debug ($here, '$con_ite_cur_lin', $con_ite_cur_lin);
  exiting_from_function ($here);
  
  return $con_ite_cur_lin;
}

exiting_from_module ($module);

?>
