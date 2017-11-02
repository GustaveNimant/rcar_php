<?php

require_once "surname_by_name_hash_functions.php";
require_once "surname_catalog_add_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

$Documentation[$module]['surname'] = "it is any name as it has been rentered by a user";

function surname_of_name_of_surname_by_name_hash ($nam, $sur_by_nam_h) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam, \$sur_by_nam_h)");
#  $cpu_in = entering_withcpu_in_function ($here);

  /* $sur_by_nam_h = surname_by_name_hash_make (); */
  # debug_n_check ($here , '$sur_by_nam_h', $sur_by_nam_h);

  if ( ! isset ($nam) 
  ||  (string_is_empty_of_string ($nam)) ) { 
      print_fatal_error ($here,
      "name were defined",
      "it does NOT",
      "Check"
      );
  }

/* Moche */
  
  if ( ! isset ($sur_by_nam_h[$nam]) ) {
      irp_store_force ('name_without_surname', $nam, 'entry_current_display');
      exiting_from_function ($here . " with \$nam >$nam<");
      include 'surname_catalog_add_script.php';
      exit;
  }
  
  $sur = $sur_by_nam_h[$nam];

  if (string_is_empty_of_string ($sur))  {
      print_fatal_error ($here,
      "surname for key name >$nam< in surname_by_name_hash were defined",
      "it does NOT",
      "Check"
      );
  }
  
  $sur = ucfirst ($sur);

  $log_str = "Surname >$sur< for name >$nam< has been done";
  file_log_write ($here, $log_str);

  exiting_from_function ($here . " with surname >$sur< from name >$nam<");
#  exiting_withcpu_from_function ($here, $cpu_in);

  return $sur;
}

function surname_name_of_surname ($sur) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($sur)");

  $nam = word_name_capitalized_of_string_surname ($sur, $encoding='utf-8');

  exiting_from_function ($here . " with name >$nam< from surname >$sur<");

  return $nam;
}

function surname_is_couple_consistent_of_name_of_surname ($nam, $sur) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam, $sur)");

  $boo = surname_name_of_surname ($sur) == $nam;
 
#  debug_n_check ($here , '$boo', $boo);
  exiting_from_function ($here . ' with \$boo ' . $boo);

  return $boo;
}

function surname_check_couple_consistency_of_name_of_surname ($nam, $sur) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam, $sur)");

  if ( ! surname_is_couple_consistent_of_name_of_surname ($nam, $sur)) {
      $nam_tmp = surname_name_of_surname ($sur);

      print_fatal_error ($here,
      "Name >$nam< in Surname_catalog were >$nam_tmp<", 
      "Name >$nam< is inconsistent with its Surname >$sur<",
      "Check Surname Catalog file");
  }
 
  exiting_from_function ($here . " with name >$nam< and surname >$sur<");
  return;
}

function name_of_surname_lowercase_of_surname_by_name_hash ($sur_low, $sur_by_nam_h) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($sur_low, $sur_by_nam_h[0])");

    foreach ($sur_by_nam_h as $nam_cur => $sur_cur) {
        $sur_low_cur = strtolower ($sur_cur);
         debug_n_check ($here , '$sur_cur', $sur_cur);
        if ($sur_low_cur == $sur_low) {
            $nam = $nam_cur;
            break;
        }
        /* else { */
        /*     print_fatal_error ($here, */
        /*     "some lowercase surname equal >$sur_low<", */
        /*     "not any", */
        /*     "Check" */
        /*     ); */
        /* } */
    }

    exiting_from_function ($here . " with name >$nam< from surname >$sur_low<");
    
    return $nam;
}

function surname_is_entry_of_entry_name_array_of_surname_lowercase_of_surname_by_name_hash ($nam_ent_a, $sur_low, $sur_by_nam_h) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($sur_low, \$sur_by_nam_h");
    
    $nam_ent = name_of_surname_lowercase_of_surname_by_name_hash ($sur_low, $sur_by_nam_h);
    $boo = in_array ($nam_ent, $nam_ent_a);

    exiting_from_function ($here . " with boolean " . string_of_boolean ($boo));
    
    return $boo;
}

exiting_from_module ($module);

?>