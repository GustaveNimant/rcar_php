<?php

require_once "array_functions.php";
require_once "item_modify_save_functions.php";
require_once "file_functions.php";
require_once "item_content_by_item_name_array_functions.php";
require_once "item_create_functions.php";
require_once "debug_functions.php";
require_once "button_submit_functions.php";
require_once "irp_functions.php";
require_once "bubble_functions.php";


$module = "item_information_metadata_functions";
# entering_in_module ($module);

function item_information_metadata_en_by_item_name_array_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_name', $here);
  debug_n_check ($here , "nam_ent", $nam_ent);

  $act_ite = $_GET['action'];
  debug_n_check ($here , "GET item_action", $act_ite);

  $inf_ent_a = entry_information_array_en_of_entry_name($nam_ent);
  # debug_n_check ($here , "inf_ent_a", $inf_ent_a);

  $kin_ite  = $inf_ent_a['item_kind'];
  debug_n_check ($here , "kin_ite", $kin_ite);

  $nam_ite = irp_provide ('item_name', $here);
  debug_n_check ($here , "nam_ite", $nam_ite);

  /* $sur_by_nam_a = surname_by_name_array_make (); */
  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);
  $sur_ite = $sur_by_nam_a[$nam_ite];
  debug_n_check ($here , "sur_ite", $sur_ite);

  $inf_ite_met_a = array () ;
  $inf_ite_met_a = array_of_key_of_value_of_array ('entry_kind', $kin_ite, $inf_ite_met_a); 
  $inf_ite_met_a = array_of_key_of_value_of_array ('surname', $sur_ite, $inf_ite_met_a);
  $inf_ite_met_a = array_of_key_of_value_of_array ('entry_name', $nam_ent, $inf_ite_met_a);
  $inf_ite_met_a = array_of_key_of_value_of_array ('action', $act_ite, $inf_ite_met_a);

  # debug_n_check ($here , "inf_ite_met_a", $inf_ite_met_a);

  exiting_from_function ($here);
  return $inf_ite_met_a;
}

# exiting_from_module ($module);
?>
