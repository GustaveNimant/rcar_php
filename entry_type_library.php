<?php
require_once "entry_type_catalog_add_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";


$Documentation[$module]['entry_type'] = "it is any name as it has been rentered by a user";

function entry_type_of_entry_name_of_entry_type_by_entry_name_hash ($nam_ent, $typ_ent_by_nam_ent_h) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent, \$typ_ent_by_nam_ent_h)");

  debug_n_check ($here , '$typ_ent_by_nam_ent_h', $typ_ent_by_nam_ent_h);

  if ( ! isset ($nam_ent) 
  ||  (string_is_empty_of_string ($nam_ent)) ) { 
      print_fatal_error ($here,
      "entry name were defined",
      "it does NOT",
      "Check"
      );
  }

/* Improve FCC 18 march 2018 Moche */
  
  if ( ! isset ($typ_ent_by_nam_ent_h[$nam_ent]) ) {
      irp_store_force ('entry_name_without_entry_type', $nam_ent, 'entry_current_display', $here);
      exiting_from_function ($here . " with \$nam_ent >$nam_ent<");
      include 'entry_type_catalog_add_script.php';
      exit;
  }
  
  $sur = $typ_ent_by_nam_ent_h[$nam_ent];

  if (string_is_empty_of_string ($sur))  {
      print_fatal_error ($here,
      "entry_type for key name >$nam_ent< in entry_type_by_entry_name_hash were defined",
      "it does NOT",
      "Check"
      );
  }
  
  $Sur = ucfirst ($sur);

  if ($Sur != $sur)  { /* un simple test */
      print_fatal_error ($here,
      "entry_type for key name >$nam_ent< were capitalized",
      "it does NOT and is >$sur<",
      "Check"
      );
  }
  
  $log_str = "Entry_Type >$Sur< for name >$nam_ent< and entry_type >$sur< has been done";
  file_log_write ($here, $log_str);

  exiting_from_function ($here . " with entry_type >$Sur< from name >$nam_ent< and entry_type >$sur<");
#  exiting_withcpu_from_function ($here, $cpu_in);

  return $sur;
}

function entry_type_name_of_entry_type ($sur) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($sur)");

  $nam_ent = word_name_capitalized_of_string_entry_type ($sur, $encoding='utf-8');

  exiting_from_function ($here . " with name >$nam_ent< from entry_type >$sur<");

  return $nam_ent;
}

function entry_type_is_couple_consistent_of_name_of_entry_type ($nam_ent, $sur) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent, $sur)");

  $boo = entry_type_name_of_entry_type ($sur) == $nam_ent;
 
#  debug_n_check ($here , '$boo', $boo);
  exiting_from_function ($here . ' with \$boo ' . $boo);

  return $boo;
}

function entry_type_check_couple_consistency_of_name_of_entry_type ($nam_ent, $sur) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent, $sur)");

  if ( ! entry_type_is_couple_consistent_of_name_of_entry_type ($nam_ent, $sur)) {
      $nam_ent_tmp = entry_type_name_of_entry_type ($sur);

      print_fatal_error ($here,
      "Name >$nam_ent< in Entry_Type_catalog were >$nam_ent_tmp<", 
      "Name >$nam_ent< is inconsistent with its Entry_Type >$sur<",
      "Check Entry_Type Catalog file");
  }
 
  exiting_from_function ($here . " with name >$nam_ent< and entry_type >$sur<");
  return;
}

function name_of_entry_type_lowercase_of_entry_type_by_entry_name_hash ($sur_low, $typ_ent_by_nam_ent_h) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($sur_low)");
    debug ($here, '$typ_ent_by_nam_ent_h', $typ_ent_by_nam_ent_h);

    foreach ($typ_ent_by_nam_ent_h as $nam_ent_cur => $sur_cur) {
        $sur_low_cur = strtolower ($sur_cur);
         debug_n_check ($here , '$sur_cur', $sur_cur);
        if ($sur_low_cur == $sur_low) {
            $nam_ent = $nam_ent_cur;
            break;
        }
        /* else { */
        /*     print_fatal_error ($here, */
        /*     "some lowercase entry_type equal >$sur_low<", */
        /*     "not any", */
        /*     "Check" */
        /*     ); */
        /* } */
    }

    exiting_from_function ($here . " with >$nam_ent< = \$typ_ent_by_nam_ent_h ($sur_low)");
    
    return $nam_ent;
}

function entry_type_is_entry_of_entry_name_array_of_entry_type_lowercase_of_entry_type_by_entry_name_hash ($nam_ent_ent_a, $sur_low, $typ_ent_by_nam_ent_h) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($sur_low, \$typ_ent_by_nam_ent_h");
    
    $nam_ent = name_of_entry_type_lowercase_of_entry_type_by_entry_name_hash ($sur_low, $typ_ent_by_nam_ent_h);
    $boo = in_array ($nam_ent_ent, $nam_ent_a);

    exiting_from_function ($here . " with boolean " . string_of_boolean ($boo));
    
    return $boo;
}


?>