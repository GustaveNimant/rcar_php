<?php

require_once "management_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function father_n_son_stack_module_push_of_father_of_son ($nam_fat, $nam_son) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_fat, $nam_son)");

  if ((! isset ($_SESSION))  
  || (! isset ($_SESSION['father_n_son_stack_module'])) ) {
      exiting_from_function ($here . ' $_SESSION not yet set');
      return;
  }

  if ( ! (link_is_ok_of_module_name ($nam_fat) ) ) {
      print_fatal_error ($here,
      "\$nam_fat = $nam_fat were a correct module name",
      "it is NOT",
      "Check");
  }

  if ( ! (link_is_ok_of_module_name ($nam_son) ) ) {
      print_fatal_error ($here,
      "\$nam_son = $nam_son were a correct module name",
      "it is NOT",
      "Check");
  }

  if ( $nam_son == $nam_fat) {
      $log_str = "Names for Father module and Son are the same >$nam_son<";
      file_log_write ($here, $log_str);
  }
  else {
      $fat_to_son = $nam_fat . ' -> ' . $nam_son;
      session_hash_push_inplace_of_key_of_value ('father_n_son_stack_module', $fat_to_son);
      $fat_n_son_mod_h = $_SESSION['father_n_son_stack_module'];
      debug ($here, '$fat_n_son_mod_h', $fat_n_son_mod_h);
  }

  exiting_from_function ($here . " ($nam_fat, $nam_son)");

  return;

}

function father_n_son_stack_module_push_of_current_module ($cur_mod) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($cur_mod)");

  $pre_mod = link_previous_module_name_make ();

  father_n_son_stack_module_push_of_father_of_son ($pre_mod, $cur_mod);

  if ( isset ($_SESSION['father_n_son_stack_module'])) {
      $fat_n_son_mod_h = $_SESSION['father_n_son_stack_module'];
      debug_n_check ($here, '$fat_n_son_mod_h', $fat_n_son_mod_h);
  }
  
  exiting_from_function ($here);

  return ;
  }

exiting_from_module ($module);

?>