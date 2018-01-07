<?php

require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function block_new_content_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

/* Improve : should be elsewhere and irp_provide used to make father -> son link */

  $nam_mod_cur = module_name_of_module_fullnameoffile (__FILE__);
  $entity_fat = entity_name_of_build_function_name ($here);

/* getting DATA $get_val */
  /* $get_key = 'item_new_content'; */
  /* father_n_son_stack_entity_push_of_father_of_son ($entity_fat, $get_key); */
  /* $irp_val = irp_data_value_retrieve_and_store_of_get_key_of_module_name_of_where ($get_key, $nam_mod_cur, $here);  */
  /* $con_ite_new = $irp_val; */

/* getting DATA $get_val */
  /* $get_key = 'item_new_justification'; */
  /* father_n_son_stack_entity_push_of_father_of_son ($entity_fat, $get_key); */
  /* $irp_val = irp_data_value_retrieve_and_store_of_get_key_of_module_name_of_where ($get_key, $nam_mod_cur, $here);  */
  /* $jus_ite_new = $irp_val; */

  $con_ite_new = irp_provide ('item_new_content', $here);
  $jus_ite_new = irp_provide ('item_new_justification', $here);

  
  $con_blo_new  = '';

  $con_blo_new .= 'item_current_content :' . "\n";
  $con_blo_new .= $con_ite_new . "\n";

  $con_blo_new .= 'item_current_justification :' . "\n";
  $con_blo_new .= $jus_ite_new . "\n";

  $con_blo_new .= 'item_previous_content :' . "\n";
  $con_blo_new .= "no previous content\n";

  $con_blo_new .= 'block_previous_sha1 :' . "\n";
  $con_blo_new .= "notanyprevioussha1inanynewblockcontent00\n";

  debug_n_check ($here , '$con_blo_new', $con_blo_new);

  exiting_from_function ($here);

  return $con_blo_new;
}

exiting_from_module ($module);

?>