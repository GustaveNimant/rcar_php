<?php
require_once "irp_library.php";
require_once "item_any_content_linked_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function item_current_justification_linked_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here); 
  $sur_low_a = lowercase_n_sort_of_string_by_key_array ($sur_by_nam_h);
  $nam_ent_a = irp_provide ('entry_name_array', $here);
  
  $jus_ite_cur = irp_provide ('item_current_justification_from_block_current_content', $here);
  $jus_ite_cur_lin = replace_all_sub_sentence_by_links_of_surname_by_name_hash_of_entry_name_array_of_item_content_of_surname_lowercase_array ($sur_by_nam_h, $nam_ent_a, $jus_ite_cur, $sur_low_a);

  debug ($here, '$con_ite_cur_lin', $jus_ite_cur_lin);
  exiting_from_function ($here);
  
  return $jus_ite_cur_lin;
}

exiting_from_module ($module);

?>
