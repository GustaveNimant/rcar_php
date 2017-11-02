<?php

require_once "management_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function father_n_son_stack_module_push_of_father_of_son ($nam_fat, $nam_son) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_fat, $nam_son)");

  debug_n_check ($here, '$nam_fat', $nam_fat);
  debug_n_check ($here, '$nam_son', $nam_son);

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

  if ( $nam_son != $nam_fat) {
      $duo = $nam_fat . ' -> ' . $nam_son;

      $fat_n_son_h = $_SESSION['father_n_son_stack_module'];
      if (!array_is_empty_of_array ($fat_n_son_h)) { 
          array_push ($fat_n_son_h, $duo);
          trace ($here, "push \$duo >$duo< in father_n_son_stack_module" );
      }
      
      # debug ($here, '$fat_n_son_h', $fat_n_son_h);
  }
  
  exiting_from_function ($here);

  return;

}

function father_n_son_stack_module_push_of_current_module ($nam_son) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_son)");

  debug_n_check ($here, '$nam_son', $nam_son);

  $nam_fat = link_previous_module_name_make ();

  father_n_son_stack_module_push_of_father_of_son ($nam_fat, $nam_son);

  $fat_n_son_h = $_SESSION['father_n_son_stack_module'];

  # debug ($here, '$fat_n_son_h', $fat_n_son_h);

  array_push ($_SESSION['irp_stack'], $nam_son);
  trace ($here, ">$nam_son< pushed in irp_stack built by >$nam_fat<");

  exiting_from_function ($here);

  return ;
  }

exiting_from_module ($module);

?>