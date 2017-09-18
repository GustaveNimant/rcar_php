<?php
require_once "father_n_son_stack_module_functions.php";
require_once "father_n_son_stack_entity_functions.php";

$Documentation[$module]['irp_stack'] = "stacks all \$irp_key. When retrieved (\$irp_val) is added"; 

function irp_father_array_of_irp_key ($irp_key, $fat_n_son_a) {
/* any father of $irp_key */
/* the father calls its sons (as in a Tree) */
/* [89] => entry_block_kind (87) calls -> entry_name */
/*         father (1)                    son (last) */

  $here = __FUNCTION__;
  entering_in_function ($here . " ($irp_key)");

#  # debug_n_check ($here, '$fat_n_son_a', $fat_n_son_a);
  /* print_html_scalar ($here, '$irp_key', $irp_key); */
       
  $father_a = array ();
  /* $son = $irp_key; */
  /* array_push ($father_a, $son); */

  if (is_array ($fat_n_son_a)) {
      foreach ($fat_n_son_a as $idx => $line) {
          $fat_cur = word_of_ordinal_of_string (1, $line);
          $son_cur = last_word_of_string ($line);
          
          #      debug_n_check ($here, '$fat_cur >'. $fat_cur .'< $son_cur >', $son_cur . '<'); 
          
          if ($son_cur == $irp_key) {
              if ( ! in_array ($fat_cur, $father_a)){
                  array_push ($father_a, $fat_cur);
                  #              debug_string ($here, 'for irp_key >'. $irp_key . '< $fat_cur >' . $fat_cur . '< ADDED to array'); 
              }
          }
      }
  }      
#  # debug ($here, 'for $irp_key >'. $irp_key . '< $father_a', $father_a);
  exiting_from_function ($here);

  return $father_a;
}

function irp_father_array_next_step_of_irp_father_array ($old_fat_a, $fat_n_son_a) {
  $here = __FUNCTION__;
  entering_in_function ($here . " (array array)");
  
# debug ($here, '$old_fat_a', $old_fat_a); 
  
  $father_a = $old_fat_a;
  foreach ($old_fat_a as $idx => $old_fat) {

      $irp_key = $old_fat;
      $new_fat_a = irp_father_array_of_irp_key ($irp_key, $fat_n_son_a);
# debug ($here, 'for irp_key '. $irp_key . ' new_fat_a', $new_fat_a);

      foreach ($new_fat_a as $i => $new_fat) {

          if ( ! in_array ($new_fat, $father_a)) {
              print_html_scalar ($here, 'push $new_fat', $new_fat . ' for $irp_key ' . $irp_key);
#              debug_n_check ($here, 'push $new_fat', $new_fat . ' for $irp_key ' . $irp_key);           
              array_push ($father_a, $new_fat);
          }
      }
  }
# debug ($here, '$father_a', $father_a);
  exiting_from_function ($here);

  return $father_a;
}

function irp_father_array_increment_next_step_of_top_key_of_irp_father_array ($top_key, $old_fat_a, $fat_n_son_a) {
  $here = __FUNCTION__;
  entering_in_function ($here . " (array array)");
  
# debug ($here, '$old_fat_a', $old_fat_a); 
  
  $inc_fat_a = array ();
  foreach ($old_fat_a as $idx => $old_fat) {

      $irp_key = $old_fat;

#      debug ($here, '$irp_key', $irp_key); 

      if ($irp_key == $top_key) {
#          debug ($here, 'break for $irp_key', $irp_key); 
      }
      else {
          $fat_a = irp_father_array_of_irp_key ($irp_key, $fat_n_son_a);
          
          foreach ($fat_a as $i => $fat) {
              if (
                  ( ! in_array ($fat, $old_fat_a)) 
                  || 
                  ( ! in_array ($fat, $inc_fat_a)) 
              ) {
#                  debug ($here, '$fat >', $fat . '< pushed in $inc_fat_a'); 
                  array_push ($inc_fat_a, $fat);
              }
          }
      }
  }
  
  $inc_fat_a = array_unique ($inc_fat_a);

#  debug ($here, '$irp_key', $irp_key); 
#  # debug ($here, '$inc_fat_a', $inc_fat_a);
  exiting_from_function ($here);

  return $inc_fat_a;
}

function irp_path_of_local_bottom_key ($loc_bot_key, $top_key, $fat_n_son_a) {
    
    $fat_a = irp_father_array_of_irp_key ($loc_bot_key, $fat_n_son_a);
    
    $cur_fat_a = $fat_a;
    
    foreach ($fat_a as $idx => $fat) {
        
        if ($fat == $top_key) {
        }
        else { 
            $inc_fat_a = irp_path_of_local_bottom_key ($fat, $top_key, $fat_n_son_a);
            $cur_fat_a = array_merge_unique_of_array_of_array ($cur_fat_a, $inc_fat_a);
        }
    }
    
    return $cur_fat_a;
};

function irp_father_array_all_steps_of_top_key_of_bottom_key ($top_key, $bot_key, $fat_n_son_a) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($top_key, $bot_key)");

  $bot_fat_a = irp_father_array_of_irp_key ($bot_key, $fat_n_son_a);
#  # debug ($here, 'for bot_key >'. $bot_key . '< $bot_fat_a is', $bot_fat_a);

  if (count ($bot_fat_a) < 0) {
      exiting_from_function ($here);
      print_fatal_error ($here, 
      'Array $bot_fat_a had at least one element i.e. $bot_key had one father',
      'only one element >' . $bot_fat_a[0] . '<',
      'Check top_key >'. $top_key . '< bot_key >'. $bot_key . '<');
      return ;
  }

  $max_ste = count ($fat_n_son_a);
#  debug ($here, '$max_ste', $max_ste);
  $continue=TRUE;
  $new_fat_a = array ();
  $cur_fat_a = $bot_fat_a;
  $step = 0;
  while ($continue) {

      $inc_fat_a = irp_father_array_increment_next_step_of_top_key_of_irp_father_array ($top_key, $cur_fat_a, $fat_n_son_a);

#      # debug ($here, 'loop_while $step '. $step . ' $cur_fat_a', $cur_fat_a);
#      # debug ($here, 'loop_while $step '. $step . ' $inc_fat_a', $inc_fat_a);

      $continue = (count ($inc_fat_a) != 0); 
      
      $mer_fat_a = array_merge_unique_of_array_of_array ($cur_fat_a, $inc_fat_a);
      $new_fat_a = array_merge_unique_of_array_of_array ($new_fat_a, $mer_fat_a);

#      debug ($here, 'loop_while $step '. $step . ' $continue', $continue . '<');
#      # debug ($here, 'loop_while $step '. $step . ' $mer_fat_a', $mer_fat_a);
#      # debug ($here, 'loop_while $step '. $step . ' $new_fat_a', $new_fat_a);

      $cur_fat_a = $inc_fat_a;
      
      $step++;

      if ($step > $max_ste) {
          $continue = 0;
          /* print_fatal_error ($here,  */
          /* "current step were lower than maximum $max_ste", */
          /* "step is $step ", */
          /* "Check"); */
      } 
  }
  
#  debug ($here, 'last $step', $step);
#  # debug ($here, '$new_fat_a', $new_fat_a);
  exiting_from_function ($here);

  return $new_fat_a;
}

function irp_path_clean_register_of_top_key_of_bottom_key ($top_key, $bot_key) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($top_key, $bot_key)");
  $cpu_in = entering_withcpu_in_function ($here);

  $fat_n_son_a = $_SESSION['father_n_son_stack_entity'];
#  # debug_n_check ($here, '$fat_n_son_a', $fat_n_son_a);
  
  $irp_pat_a = irp_father_array_all_steps_of_top_key_of_bottom_key ($top_key, $bot_key, $fat_n_son_a);
  array_push ($irp_pat_a, $bot_key);
  
  $_SESSION['deleted_irp_keys_array'] = $irp_pat_a;
#  # debug ($here, 'deleting $irp_pat_a', $irp_pat_a);
  
  if ( ! (is_empty_of_array ($irp_pat_a))) {
      foreach ($irp_pat_a as $idx => $nam) {
          unset ($_SESSION['irp_register'][$nam]);
          /* print_html_scalar ($here, 'irp_register [' . $nam . '] deleted', $nam);  */
      }
  }

  if ( is_array ($_SESSION['irp_register']) ) {  
      $irp_reg_a = $_SESSION['irp_register'];
      $irp_key_a = array_keys ($irp_reg_a);
      #  # debug ($here, 'saving $irp_key_a', $irp_key_a);
  }

  exiting_withcpu_from_function ($here . " in module $top_key", $cpu_in);
  exiting_from_function ($here);
  return ;
}

function irp_path_clean_from_dollar_get_key_of_module ($module) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($module)");
    
    $get_a = $_GET;
    debug ($here, '$_GET', $_GET);
    
    foreach ($get_a as $bot_key => $val) {
        debug ($here, '$bot_key', $bot_key);
        irp_path_clean_register_of_top_key_of_bottom_key ($module, $bot_key);
    }
    
    unset ($_GET);

    exiting_from_function ($here);
    return ;  
}

?>