<?php

require_once "management_functions.php";

$module = "father_n_son_stack_entity_functions";
# entering_in_module ($module);

function father_n_son_stack_entity_push_of_father_of_son ($nam_fat, $nam_son) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_fat, $nam_son)");

#  debug_n_check ($here, '$nam_fat', $nam_fat);
#  debug_n_check ($here, '$nam_son', $nam_son);
  $count = $_SESSION['count_entity'];

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
      $fat_n_son_a = $_SESSION['father_n_son_stack_entity'];

      if ( is_array ($fat_n_son_a) ) {
          if ( ! array_value_exists ($duo, $fat_n_son_a) ) {
              array_push ($fat_n_son_a, $duo);
              trace ($here, "push \$duo >$duo< in father_n_son_stack_entity" );
              $_SESSION['father_n_son_stack_entity'] = $fat_n_son_a;
          }
          #      # debug_n_check ($here, '$fat_n_son_a', $fat_n_son_a);
      }
  }

  exiting_from_function ($here);

  return;

}

function father_n_son_stack_entity_push_of_current_entity ($nam_son) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_son)");

#  debug_n_check ($here, '$nam_son', $nam_son);

  $nam_fat = link_previous_module_name_make ();

  father_n_son_stack_entity_push_of_father_of_son ($nam_fat, $nam_son);

  $fat_n_son_a = $_SESSION['father_n_son_stack_entity'];

 # debug_n_check ($here, '$fat_n_son_a', $fat_n_son_a);

  exiting_from_function ($here);

  return ;
}


# exiting_from_module ($module);

?>