<?php

require_once "link_library.php";
require_once "session_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function father_n_son_stack_entity_push_of_father_of_son ($nam_fat_mod, $nam_son) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_fat_mod, $nam_son)");

  if (! isset ($_SESSION)) {
      exiting_from_function ($here . ' $_SESSION not yet set');
      return;
  }

  $nam_fat = entity_name_of_module_name ($nam_fat_mod);
  debug_n_check ($here, '$nam_fat_mod', $nam_fat_mod);
  debug_n_check ($here, '$nam_fat', $nam_fat);
  string_check_is_empty_of_what_of_where_of_string ('current entity name', $nam_fat_mod, $nam_fat);

  if (isset ($_SESSION['count_entity'])) {
      $cou_ent = $_SESSION['count_entity'];
  }
  else {
      $cou_ent = 0;
  }

  if ( ! (link_is_ok_of_module_name ($nam_fat) ) ) {
      print_fatal_error ($here,
      "\$nam_fat = >$nam_fat< were a correct module name",
      "it is NOT",
      "Check");
  }

  if ( ! (link_is_ok_of_module_name ($nam_son) ) ) {
      print_fatal_error ($here,
      "\$nam_son = >$nam_son< were a correct module name",
      "it is NOT",
      "Check");
  }

  if ( $nam_son != $nam_fat) {
      $fat_to_son = $nam_fat . ' -> ' . $nam_son;
      session_hash_push_inplace_of_key_of_value ('father_n_son_stack_entity', $fat_to_son);
  }

  exiting_from_function ($here);

  return;

}

function father_n_son_stack_entity_push_of_current_entity ($cur_ent) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($cur_ent)");

  $nam_fat = link_previous_module_name_make ();

  father_n_son_stack_entity_push_of_father_of_son ($nam_fat, $cur_ent);
  
  if ( isset ($_SESSION['father_n_son_stack_entity'])) {
      $fat_n_son_h = $_SESSION['father_n_son_stack_entity'];
      debug_n_check ($here, '$fat_n_son_h', $fat_n_son_h);
  }
  
  exiting_from_function ($here);

  return ;
}


exiting_from_module ($module);

?>