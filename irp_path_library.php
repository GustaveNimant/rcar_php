<?php
require_once "father_n_son_stack_entity_library.php";
require_once "father_n_son_stack_module_library.php";

$Documentation[$module]['irp_stack'] = "stacks all \$irp_key. When retrieved (\$irp_val) is added"; 

function irp_father_array_of_irp_key_of_father_n_son_hash ($irp_key, $fat_n_son_h) {
  $here = __FUNCTION__;
#  entering_in_function ($here . " ($irp_key)");
  $eol = end_of_line ();

#  debug ($here,'$fat_n_son_h', $fat_n_son_h);

  $son = $irp_key;
  $father_a = array ();

  foreach ($fat_n_son_h as $idx => $line) {

#      debug ($here,'$line', $line);

      $son_cur = string_last_word_of_string ($line);
      $fat = string_word_of_ordinal_of_string (1, $line);
#      debug_long ($here,'$son_cur >' . $son_cur . '< $fat >' . $fat .'<');

      if ($son_cur == $irp_key) {
          if ( ! in_array ($fat, $father_a)){
              array_push ($father_a, $fat);
#              debug_long ($here,'$fat >' . $fat .'< pushed');
          }
      }
  }

  if (array_is_empty_of_array ($father_a)) {
      debug ($here, '$fat_n_son_h', $fat_n_son_h);
      print_warning ($here,
      "at least one father exists for \$irp_key >$irp_key<",
      "NONE",
      "Check \$irp_key name and \$fat_n_son_h hash upper");
  }
  
#  debug ($here,'$father_a', $father_a);
#  exiting_from_function ($here . " ($irp_key)");
  return $father_a;
}

function irp_path_of_bottom_key_of_step_of_top_key_of_father_n_son_hash ($ste, $bot_key, $top_key, $fat_n_son_h) {
    $here = __FUNCTION__;
#    entering_in_function ($here . " ($ste, $bot_key, $top_key)");

    $eol = end_of_line ();

#    debug ($here,'$fat_n_son_h', $fat_n_son_h);
    
    $max_ste = $_SESSION['parameters']['irp_path_step_number_maximum'];
    $fat_a = irp_father_array_of_irp_key_of_father_n_son_hash ($bot_key, $fat_n_son_h);
    
#    debug ($here,'$fat_a', $fat_a);
    $cur_fat_a = $fat_a;
    
    foreach ($fat_a as $idx => $fat) {

#        debug ($here,'$fat', $fat);
        if ($fat == $top_key) {
#            debug_long ($here, 'done' . $eol);
        }
        else { 
            $ste = $ste + 1;
#            debug_long ($here, 'step # ' . $ste . ' $fat ' . $fat . $eol);
            if ($ste < $max_ste ) {
                $bot_key = $fat;
                $inc_fat_a = irp_path_of_bottom_key_of_step_of_top_key_of_father_n_son_hash ($ste, $bot_key, $top_key, $fat_n_son_h);
                if (array_is_empty_of_array ($inc_fat_a) ) {
#                    debug_long ($here, 'reached empty increment array at step # ' . $ste . $eol);
                    break;
                }
                else {
#                    debug ($here, '$inc_fat_a', $inc_fat_a);
                    $cur_fat_a = array_merge_unique_of_array_of_array ($cur_fat_a, $inc_fat_a);
#                    debug ($here, '$cur_fat_a', $cur_fat_a);
                }
            }
            else {
                print_fatal_error ($here,
                "maximum number of recursive steps $max_ste were NOT reached",
                "it has been reached",
                "Check");
            }
        }
    }

#    debug ($here,'$cur_fat_a', $cur_fat_a);
#    exiting_from_function ($here . " ($ste, $bot_key, $top_key)");
    
    return $cur_fat_a;
};

function irp_path_clean_register_of_top_key_of_bottom_key_of_where ($top_key, $bot_key, $where) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($top_key, $bot_key, $where)");

  $fat_n_son_h = $_SESSION['father_n_son_stack_entity'];
  debug ($here, '$fat_n_son_h', $fat_n_son_h);

  $ste = 0;  
  $irp_pat_a = irp_path_of_bottom_key_of_step_of_top_key_of_father_n_son_hash ($ste, $bot_key, $top_key, $fat_n_son_h);
  
  $_SESSION['removed_irp_keys_array'] = $irp_pat_a;
  debug ($here, 'removed irp_path array', $irp_pat_a);
  
  if ( ! (array_is_empty_of_array ($irp_pat_a))) {
      foreach ($irp_pat_a as $idx => $irp_key) {
#          debug ($here, '$_SESSION["irp_register"]',$_SESSION['irp_register']);
          unset ($_SESSION['irp_register'][$irp_key]);
          $log_str = "irp_key >$irp_key< has been removed off irp_register from $where";
          file_log_write ($here, $log_str);
      }
  }

  if ( is_array ($_SESSION['irp_register']) ) {  
      $irp_reg_a = $_SESSION['irp_register'];
      $irp_key_a = array_keys ($irp_reg_a);
      debug ($here, 'saved $irp_key_a', $irp_key_a);
  }

  $log_str = "all irp_path from >$bot_key< to >$top_key< have been removed off irp_register from $where";
  file_log_write ($here, $log_str);

  exiting_from_function ($here);

  return ;
}

function irp_path_clean_register_of_top_key_of_bottom_key_included_of_where ($top_key, $bot_key, $where) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($bot_key, $where)");

  irp_path_clean_register_of_top_key_of_bottom_key_of_where ($top_key, $bot_key, $where); 

  unset ($_SESSION['irp_register'][$bot_key]);

  exiting_from_function ($here);
  return ;
}


function irp_path_clean_register_of_bottom_key_of_where ($bot_key, $where) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($bot_key, $where)");

  $top_key = 'index';
  irp_path_clean_register_of_top_key_of_bottom_key_of_where ($top_key, $bot_key, $where); 

  exiting_from_function ($here);
  return ;
}


?>