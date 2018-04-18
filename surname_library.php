<?php
$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";
$Documentation[$module]['surname'] = "it is any name as it has been rentered by a user";

function word_name_capitalized_of_string_surname ($str, $encoding='utf-8') {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($str)");
    
    $str_bef = $str;
    
    $str = string_remove_control_M ($str);
    $str = string_remove_accents ($str, $encoding='utf-8');
    $str = trim ($str);
    $str = str_replace(' ', '_', $str);
    $str = str_replace('\'', '_', $str);
    $str = str_replace('-', '_', $str);
    $str = strtolower ($str);
    $str = ucfirst ($str);
    
    /* $str = preg_replace ('#&([A-za-z]{2})(?:lig);#', '\1', $str); */
    /* $str = preg_replace ('#&[^;]+;#', '', $str); */
    
    exiting_from_function ($here . " ($str)");
    
    return $str;
};

function string_name_of_surname_capitalize ($str, $encoding='utf-8') {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($str)");
    
    $str = word_name_capitalized_of_string_surname ($str, $encoding='utf-8');
    $str = ucfirst ($str);
    
    exiting_from_function ($here . " ($str)");
    
    return $str;
};

function string_name_of_surname_lowercase ($str, $encoding='utf-8') {
    $here = __FUNCTION__;
  entering_in_function ($here . " ($str)");
  
  $str = word_name_capitalized_of_string_surname ($str, $encoding='utf-8');
  $str = strtolower ($str);
  
  exiting_from_function ($here . " ($str)");
  
  return $str;
}

function surname_of_name_of_surname_by_name_hash ($nam, $sur_by_nam_h) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam, \$sur_by_nam_h)");
#  $cpu_in = entering_withcpu_in_function ($here);

  # debug_n_check ($here , '$sur_by_nam_h', $sur_by_nam_h);

  if ( ! isset ($nam) 
  ||  (string_is_empty_of_string ($nam)) ) { 
      print_fatal_error ($here,
      "name were defined",
      "it does NOT",
      "Check"
      );
  }

/* Improve FCC 18 march 2018 Moche */
  
  if ( ! isset ($sur_by_nam_h[$nam]) ) {
      irp_store_force ('name_without_surname', $nam, 'entry_current_display', $here);
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
  
  $Sur = ucfirst ($sur);

  if ($Sur != $sur)  { /* un simple test */
      print_fatal_error ($here,
      "surname for key name >$nam< were capitalized",
      "it does NOT and is >$sur<",
      "Check"
      );
  }
  
  $log_str = "Surname >$Sur< for name >$nam< and surname >$sur< has been done";
  file_log_write ($here, $log_str);

  exiting_from_function ($here . " with surname >$Sur< from name >$nam< and surname >$sur<");
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
    entering_in_function ($here . " ($sur_low)");
    debug ($here, '$sur_by_nam_h', $sur_by_nam_h);

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

    exiting_from_function ($here . " with >$nam< = \$sur_by_nam_h ($sur_low)");
    
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

?>