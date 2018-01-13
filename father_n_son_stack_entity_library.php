<?php
require_once "link_library.php";
require_once "session_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";


function father_n_son_stack_entity_push_of_father_of_son ($nam_fat_mod, $nam_son) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_fat_mod, $nam_son)");

  if (! isset ($_SESSION)) {
      exiting_from_function ($here . ' $_SESSION not yet set');
      return;
  }

  $entity = entity_name_of_module_name ($nam_fat_mod);
  debug_n_check ($here, '$nam_fat_mod', $nam_fat_mod);
  debug_n_check ($here, '$entity', $entity);
  string_check_is_empty_of_what_of_where_of_string ('current entity name', $nam_fat_mod, $entity);

  if (isset ($_SESSION['count_entity'])) {
      $cou_ent = $_SESSION['count_entity'];
  }
  else {
      $cou_ent = 0;
  }

  if ( ! (link_is_ok_of_module_name ($entity) ) ) {
      print_fatal_error ($here,
      "\$entity = >$entity< were a correct module name",
      "it is NOT",
      "Check");
  }

  if ( ! (link_is_ok_of_module_name ($nam_son) ) ) {
      print_fatal_error ($here,
      "\$nam_son = >$nam_son< were a correct module name",
      "it is NOT",
      "Check");
  }

  if ( $nam_son == $entity) {
      $log_str = "Names for Father entity and Son are the same >$nam_son<";
      file_log_write ($here, $log_str);
  }
  else {
      $fat_to_son = $entity . ' -> ' . $nam_son;
      session_hash_push_inplace_of_key_of_value ('father_n_son_stack_entity', $fat_to_son);
  }

  exiting_from_function ($here . " ($nam_fat_mod, $nam_son)");

  return;

}

function father_n_son_stack_entity_push_of_current_entity ($cur_ent) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($cur_ent)");

  $pre_mod = link_previous_module_name_make ();

  father_n_son_stack_entity_push_of_father_of_son ($pre_mod, $cur_ent);
  
  if ( isset ($_SESSION['father_n_son_stack_entity'])) {
      $fat_n_son_ent_h = $_SESSION['father_n_son_stack_entity'];
      debug_n_check ($here, '$fat_n_son_ent_h', $fat_n_son_ent_h);
  }
  
  exiting_from_function ($here);
  return ;
}



?>