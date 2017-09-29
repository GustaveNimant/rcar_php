<?php

require_once "management_functions.php";
require_once "irp_functions.php";
require_once "surname_by_name_array_functions.php";
require_once "surname_catalog_add_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);
entering_in_module ($module);

$Documentation[$module]['surname'] = "it is any name as it has been rentered by a user";

function surname_of_name_of_surname_by_name_array ($nam, $sur_by_nam_a) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam)");
  $cpu_in = entering_withcpu_in_function ($here);

  /* $sur_by_nam_a = surname_by_name_array_make (); */
  # debug_n_check ($here , '$sur_by_nam_a', $sur_by_nam_a);

  $sur = $sur_by_nam_a[$nam];
  debug ($here , '$sur', $sur);

  if (string_is_empty_of_string ($sur)) {
      /* print_fatal_error ($here, */
      /* "name >$nam< had a surname", */
      /* "it does not", */
      /* "Check" */
      /* ); */
      #      warning ($here, "NO surname for name >$nam<", $lan);
      irp_store_force ('name_without_surname', $nam, 'entry_display');
      exiting_from_function ($here);
      include 'surname_catalog_add.php';
      exit;
  }

  $sur = ucfirst ($sur);

  $log_str = "Surname >$sur< for name >$nam< has been done";
  file_log_write ($here, $log_str);

  debug_n_check ($here , '$sur', $sur);
  exiting_from_function ($here);
  exiting_withcpu_from_function ($here, $cpu_in);

  return $sur;
}

function surname_name_of_surname ($sur) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($sur)");

  $nam = word_name_capitalized_of_string_surname ($sur, $encoding='utf-8');

  debug_n_check ($here , '$nam', $nam);
  exiting_from_function ($here);

  return $nam;
}

function surname_is_couple_consistent_of_name_of_surname ($nam, $sur) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam, $sur)");

  $boo = surname_name_of_surname ($sur) == $nam;
 
  debug_n_check ($here , '$boo', $boo);
  exiting_from_function ($here . ' with $boo ' . $boo);

  return $boo;
}

function surname_check_couple_consistency_of_name_of_surname ($nam, $sur) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam, $sur)");

  if ( ! surname_is_couple_consistent_of_name_of_surname ($nam, $sur)) {
      $nam_tmp = surname_name_of_surname ($sur);

      print_fatal_error ($here,
      "Name >$nam< in Surname_catalog were >$nam_tmp<", 
      "Name >$nam< is inconsistent with its Surname <$sur<",
      "Check Surname Catalog file");
  }
 
  exiting_from_function ($here);
  return;
}

function nasurname_me_of_surname_lowercase_of_surname_by_name_arraray ($sur_low, $sur_by_nam_a) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($sur_low, $sur_by_nam_a[0])");

    foreach ($sur_by_nam_a as $nam_cur => $sur_cur) {
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

    debug_n_check ($here , '$nam', $nam);
    exiting_from_function ($here);
    
    return $nam;
}

function surname_is_entry_of_entry_name_array_of_surname_lowercase_of_surname_by_name_array ($nam_ent_a, $sur_low, $sur_by_nam_a) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($sur_low, \$sur_by_nam_a");
    
    $nam_ent = nasurname_me_of_surname_lowercase_of_surname_by_name_arraray ($sur_low, $sur_by_nam_a);
    $boo = in_array ($nam_ent, $nam_ent_a);

    debug_n_check ($here , '$boo', $boo);
    exiting_from_function ($here);
    
    return $boo;
}

?>