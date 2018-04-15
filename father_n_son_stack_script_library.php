<?php
require_once "management_library.php";

$module = module_name_of_module_nameoffile (__FILE__);


$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

function father_n_son_stack_script_push_of_father_of_son ($nam_fat, $nam_son) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_fat, $nam_son)");

  if (! isset ($_SESSION)) {
      exiting_from_function ($here . ' $_SESSION not yet set');
      return;
  }

  if ( ! (link_is_ok_of_script_name ($nam_fat) ) ) {
      print_fatal_error ($here,
      "\$nam_fat = $nam_fat were a correct script name",
      "it is NOT",
      "Check");
  }

  if ( ! (link_is_ok_of_script_name ($nam_son) ) ) {
      print_fatal_error ($here,
      "\$nam_son = $nam_son were a correct script name",
      "it is NOT",
      "Check");
  }

  if ( $nam_son == $nam_fat) {
      $log_str = "Names for Father script and Son are the same >$nam_son<";
      file_log_write ($here, $log_str);

      /* Improve to avoid error messages */
      /* include 'index.php';  */
      /* exiting_from_function ($here . " ($nam_fat, $nam_son)"); */
      /* return; */

  }
  else {
      if (isset ($_SESSION['father_n_son_stack_script'])) {
          $fat_to_son = $nam_fat . ' -> ' . $nam_son;
          session_hash_push_inplace_of_key_of_value ('father_n_son_stack_script', $fat_to_son);

          $fat_n_son_mod_h = $_SESSION['father_n_son_stack_script'];
          debug ($here, '$fat_n_son_mod_h', $fat_n_son_mod_h);
      }
/*       else {  */
/* /\* Improve to avoid error messages *\/ */
/*           include "index.php"; */
/*           exiting_from_function ($here); */
/*           return; */
/*       } */
  }

  exiting_from_function ($here . " ($nam_fat, $nam_son)");

  return;

}

function father_n_son_stack_script_push_of_current_script ($cur_mod) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($cur_mod)");

  $pre_mod = link_previous_script_name_make ();
  debug_n_check ($here, '$pre_mod', $pre_mod);

  father_n_son_stack_script_push_of_father_of_son ($pre_mod, $cur_mod);

  if ( isset ($_SESSION['father_n_son_stack_script'])) {
#      print_html_array ($here, '$_SESSION["father_n_son_stack_script"]', $_SESSION['father_n_son_stack_script']);
      $fat_n_son_mod_h = $_SESSION['father_n_son_stack_script'];
      debug_n_check ($here, '$fat_n_son_mod_h', $fat_n_son_mod_h);
  }
  
  exiting_from_function ($here);

  return ;
  }


?>