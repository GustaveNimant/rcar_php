<?php

require_once "father_n_son_stack_entity_library.php";
require_once "get_hash_library.php";
require_once "build_requirements.php";

$module = module_name_of_module_nameoffile (__FILE__);

entering_in_module ($module);

$Documentation[$module]['irp_stack'] = "stacks all \$irp_key. When retrieved (\$irp_val) is added"; 

function irp_is_providable_of_irp_key ($irp_key, $caller) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($irp_key, $caller)");
    
    $irp_build = $irp_key . "_build";

    $boo = function_exists ($irp_build);

    exiting_from_function ($here . " is " . string_of_boolean ($boo));
    return $boo;
}

function irp_is_data_of_irp_key ($irp_key, $caller) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($irp_key, $caller)");

    $boo = ( (isset ($_SESSION))
        && (isset ($_SESSION['is_data_entity_name'][$irp_key])) 
        && ($_SESSION['is_data_entity_name'][$irp_key]) 
        );
    
    exiting_from_function ($here . " is " . string_of_boolean ($boo));
    return $boo;
}

function irp_is_stored_of_irp_key ($irp_key, $caller) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($irp_key, $caller)");

    if ( ! (   
        (isset ($_SESSION))
        && (isset ($_SESSION['irp_register']))
        && (is_array ($_SESSION['irp_register']) ) 
    ) ) {
        exiting_from_function ($here . " ($irp_key)");
        include 'index.php';
        exit;
    }

    $boo = FALSE;
    switch ($irp_key) {
    case 'quit' :
        break;
    default:
        if (array_key_exists ($irp_key, $_SESSION['irp_register']) ){
            $log_str = "Value for key >$irp_key< is already stored " . string_of_boolean ($boo) . " from $caller\n";
            file_log_write ($here, $log_str);
            $boo = TRUE;
        }
    };
    
    debug ($here , 'irp_register_keys', array_keys ($_SESSION['irp_register']));
    exiting_from_function ($here . " with irp_key >" . $irp_key . "< is " . string_of_boolean ($boo));
    
    return $boo;
}

function irp_store_nondata ($irp_key, $irp_val, $caller) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($irp_key, \$irp_val, $caller)");

    if (
        ($irp_key == "git_command") 
        || 
        ($irp_key == "git_command_commit") 
        ||  
        ($irp_key == "git_command_n_commit_html") 
        ||  
        ($irp_key == "user_information")
    ){
        $log_str = "Value storage skipped for key >$irp_key< from $caller"; 
        file_log_write ($here, $log_str);

        exiting_from_function ($here . " ($irp_key, \$irp_val, $caller)");
        return;
    }
    
    if ($_SESSION['parameters']['irp_nondata_storage_is_enabled']) {  
        
        if (irp_is_stored_of_irp_key ($irp_key, $here)) {
            $old_value = $_SESSION['irp_register'][$irp_key];
            
            if ($irp_val == $old_value) {
                $cre_ste = $_SESSION['creation_step'][$irp_key];
                $log_str = "Warning storage skipped for already stored NONDATA (step # $cre_ste) irp_key >$irp_key< with the same value from $caller". "\n"; 
                file_log_write ($here, $log_str);
                exiting_from_function ($here  . " ($irp_key, \$irp_val)");
                return;
            }
            else {
                print_html_variable ($here , "already stored irp_key", $irp_key);
                print_html_variable ($here , "old value",  $old_value);
                print_html_variable ($here , "new value",  $irp_val);
                
                print_fatal_error ($here, 
                "NONDATA irp_key >$irp_key< were already stored with the same value:",
                "old and new Values differ",
                "Check Values upper");
            }
        } 
        else { /* nondata NOT yet stored and storage enabled */

            $_SESSION['irp_register'][$irp_key] = $irp_val;
            $log_str = "storage done for NONDATA >$irp_key< from $caller"; 
            file_log_write ($here, $log_str);
        }
    } 
    else { /* NONDATA storage disabled */
        $log_str  = "NONDATA irp_key >$irp_key< is not stored" . "\n"; 
        $log_str .= "Warning irp_key >$irp_key< storage disabled for NONDATA from $caller" . "\n"; 
        file_log_write ($here, $log_str);
    }

    debug ($here , 'irp_register_keys', array_keys ($_SESSION['irp_register']));
    exiting_from_function ($here . " ($irp_key, \$irp_val)");
    return;
}

function irp_remove_off_irp_register_of_irp_key ($irp_key, $where) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($irp_key, $where)");
    
    $log_str = "irp_register[$irp_key] cleaned from $where";
    file_log_write ($here, $log_str);

    if ($irp_key == "all"){
        unset ($_SESSION['irp_register']);
        $log_str = "All irp_key removed from irp_register";    
    }
    else {
        unset ($_SESSION['irp_register'][$irp_key]);
        $log_str = "\$irp_key >$irp_key< removed from irp_register from $where";    
    }
    
    file_log_write ($here, $log_str);

    exiting_from_function ($here  . " ($irp_key, $where)");
    return;
}

function irp_clean_value_of_irp_key ($irp_key, $irp_val_sal, $caller) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($irp_key, $irp_val_sal, $caller)");
    /* Improve what is it ? */
    switch ($irp_key) {
        /* case 'item_name' : */
        /*   $irp_val = word_name_capitalized_of_string_surname ($irp_val_sal); */
        /*   break; */
    case 'item_newname' :
        $irp_val_cle = word_name_capitalized_of_string_surname ($irp_val_sal);
        break;
    case 'entry_current_surnamenew' :
        $irp_val_cle = word_name_capitalized_of_string_surname ($irp_val_sal);
        break;
    case 'entry_current_name' :
        $irp_val_cle = word_name_capitalized_of_string_surname ($irp_val_sal);
        break;
    default :
        $irp_val_cle = $irp_val_sal;
    }

    $log_str =  "Value cleaned as >$irp_val_cle< for irp_key >$irp_key< from $caller";
    file_log_write ($here, $log_str);

    exiting_from_function ($here . " ($irp_key, $irp_val_sal, $caller)");
    return $irp_val_cle;
    
}

function irp_store_data ($irp_key, $irp_val, $caller) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($irp_key, \$irp_val, $caller)");
    
    if (irp_is_stored_of_irp_key ($irp_key, $here)) {
        $old_value = $_SESSION['irp_register'][$irp_key];
        
        if ($irp_val == $old_value) {
            $log_str  = "Warning DATA irp_key >$irp_key< is already stored with the same value" . "\n";
            $log_str .= "Warning storage for DATA irp_key >$irp_key< skipped from caller" . "\n"; 
            file_log_write ($here, $log_str);
            exiting_from_function ($here . " ($irp_key, \$irp_val)");
            return;
        }
        else {
            $_SESSION['irp_register'][$irp_key] = $irp_val;
            $log_str  = "Warning DATA irp_key >$irp_key< is already stored with an other value" . "\n"; 
            $log_str .= "Warning DATA irp_key >$irp_key< storage redone from caller" . "\n"; 
            file_log_write ($here, $log_str);
        }
    }
    else { /* not yet stored */
        $_SESSION['irp_register'][$irp_key] = $irp_val;

        if (! isset ($_SESSION['creation_step'][$irp_key])) {
            $eol = end_of_line ();
            print_html_variable ($here , "DATA irp_key", $irp_key);
            print_html_array ($here, '$_SESSION["data_creation_function"]', $_SESSION['data_creation_function']);
            print_html_array ($here, '$_SESSION["creation_step"]', $_SESSION['creation_step']);
             
            print_fatal_error ($here, 
            "DATA irp_key >$irp_key< had a defined creation step",
            "it has NOT",
            "Add $eol \$_SESSION['creation_step']['$irp_key'] = <i>step number</i> $eol in Creation function");
        }

        $cre_ste = $_SESSION['creation_step'][$irp_key];
        $log_str = "first storage done for DATA >$irp_key< with value >$irp_val< from $caller";
        file_log_write ($here, $log_str);
    }
    
    exiting_from_function ($here . " ($irp_key, \$irp_val, $caller)");
    return;
}

function irp_store_data_of_get_key_of_get_value_of_where ($get_key, $get_val, $where) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($get_key, $get_val, $where)");
    
    /* print_html_array ($here, '$_SESSION["is_data_entity_name"]', $_SESSION['is_data_entity_name']); */
    /* print_html_array ($here, '$_SESSION["creation_step"]', $_SESSION['creation_step']); */
    /* print_html_array ($here, '$_SESSION["data_creation_function"]', $_SESSION['data_creation_function']); */
    /* print_html_array ($here, '$_SESSION["module_wheretoact_nameoffile"]', $_SESSION['module_wheretoact_nameoffile']); */

    irp_store_data ($get_key, $get_val, $where);
    
    $log_str = "DATA irp_key >$get_key< has been stored with value >$get_val< in $where";
    file_log_write ($here, $log_str);
    
    exiting_from_function ($here . " ($get_key, $get_val, $where)");
    
  return $get_val;
}

function irp_data_value_only_store_of_get_key_of_module_name_of_where ($get_key, $module, $where) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($get_key, $module, $where)");

  if (irp_is_stored_of_irp_key ($get_key, $here)) { /* occurs when returning to module really ?*/
      $get_val = irp_retrieve ($get_key, $here);
      $log_str = "WARNING : irp_key >$get_key< irp_val >$get_val< is already stored";
  }
  else {
      $get_val = get_hash_retrieve_value_of_get_key_of_where ($get_key, $where);
      irp_store_data_of_get_key_of_get_value_of_where ($get_key, $get_val, $where);
      $log_str = "DATA with irp_key >$get_key< irp_val >$get_val< has been stored from $where";

      $entity_fat = entity_name_of_module_name ($module);
      father_n_son_stack_entity_push_of_father_of_son ($entity_fat, $get_key);
  }

  debug_n_check ($here, '$get_val', $get_val);
  debug_n_check ($here, '$log_str', $log_str);
  exiting_from_function ($here  . " ($get_key, $module, $where)");

  return $log_str;
}

function irp_data_value_only_store_of_get_key_of_script_name_of_where ($get_key, $script, $where) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($get_key, $script, $where)");

  $log_str = irp_data_value_only_store_of_get_key_of_module_name_of_where ($get_key, $script, $where);

  debug_n_check ($here, '$log_str', $log_str);
  exiting_from_function ($here  . " ($get_key, $script, $where)");
  return $log_str;
}

function irp_data_value_retrieve_and_store_of_get_key_of_module_name_of_where ($get_key, $module, $where) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($get_key, $module, $where)");

  if (irp_is_stored_of_irp_key ($get_key, $here)) { /* occurs when returning to module */
      $get_val = irp_retrieve ($get_key, $here);
      $log_str = " recovering DATA irp_key >$get_key< irp_val >$get_val<";
  }
  else {
      $get_val = get_hash_retrieve_value_of_get_key_of_where ($get_key, $where);
      irp_store_data_of_get_key_of_get_value_of_where ($get_key, $get_val, $where);
      $log_str = " with irp_key >$get_key< irp_val >$get_val<";
  }

  file_log_write ($here, $log_str);

  debug_n_check ($here, '$get_val', $get_val);
  exiting_from_function ($here  . " ($get_key, $module, $where)");
  return $get_val;
}

function irp_data_value_retrieve_and_store_of_get_key_of_script_name_of_where ($get_key, $module, $where) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($get_key, $module, $where)");

  $get_val = irp_data_value_retrieve_and_store_of_get_key_of_module_name_of_where ($get_key, $module, $where);

  debug_n_check ($here, '$get_val', $get_val);
  exiting_from_function ($here  . " ($get_key, $module, $where)");
  return $get_val;
}


function irp_path_data_clean_new_bottom_key_store_of_bottom_key_of_module_name_of_where ($bot_key, $module, $where) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($bot_key, $module)");
  
  if (irp_is_stored_of_irp_key ($bot_key, $here)) {
      $bot_val = irp_retrieve ($bot_key, $here);
      debug ($here, '$bot_val', $bot_val);
      if (isset ($_GET[$bot_key])) {
          if ($bot_val != $_GET[$bot_key]) {
              irp_path_clean_register_of_top_key_of_bottom_key_of_where ($module, $bot_key, $where);
              $get_val = get_hash_retrieve_value_of_get_key_of_where ($bot_key, $here);
              irp_store_data_of_get_key_of_get_value_of_where ($bot_key, $get_val, $here);
          }
          else {
              $log_str = "No path cleaning. bottom key >$bot_key< value >$bot_val< unchanged from where";
              file_log_write ($here, $log_str);
          }
      }
      else {
          irp_path_clean_register_of_top_key_of_bottom_key_of_where ($module, $bot_key, $where);
          irp_store_data_of_get_key_of_get_value_of_where ($bot_key, $bot_val, $here, $where);
      }
  }

  exiting_from_function ($here . " ($bot_key, $module)");
  return;
}

function irp_path_data_clean_new_bottom_key_store_of_bottom_key_of_script_name_of_where ($bot_key, $module, $where) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($bot_key, $module)");

  irp_path_data_clean_new_bottom_key_store_of_bottom_key_of_module_name_of_where ($bot_key, $module, $where);

  exiting_from_function ($here . " ($bot_key, $module)");
  return;
}

function irp_path_read_clean_new_bottom_key_store_of_bottom_key_of_module_name_of_where ($bot_key, $module, $where) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($bot_key, $module)");
  
  exiting_from_function ($here . " ($bot_key, $module)");
  return;
}

function irp_store ($irp_key, $irp_val, $caller) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($irp_key, \$irp_val, $caller)");
    
    $eol = end_of_line ();

    if (empty ($irp_val)) {  
        print_html_array ($here , "irp_register", $_SESSION['irp_register']);
        print_fatal_error ($here, 
        "Value for irp_key >$irp_key< were NOT empty",
        "it is EMPTY",
        "Check irp_register upper");
    }
    
    if (empty($irp_key)) {
        print_fatal_error ($here, 
        "irp_key \$irp_key were NOT empty",
        "it is EMPTY",
        "Check");
    }

    if (irp_is_data_of_irp_key ($irp_key, $here)) {
        $irp_val = irp_store_data ($irp_key, $irp_val, $caller);
    }
    else {
        $irp_val = irp_store_nondata ($irp_key, $irp_val, $caller);
    }

    exiting_from_function ($here . " ($irp_key, \$irp_val, $caller)");
    return;
}

function irp_store_force ($irp_key, $irp_val, $irp_fat, $caller) {
    $here = __function__;
    entering_in_function ($here . " ($irp_key, \$irp_val, $irp_fat, $caller)");

    if (empty ($irp_val)) {  
        print_html_array ($here , "irp_register", $_SESSION['irp_register']);
        print_fatal_error ($here, 
        "Value for irp_key >$irp_key< were NOT empty",
        "it is EMPTY",
        "Check irp_register upper");
    }
    
    if (empty($irp_key)) {
        print_fatal_error ($here, 
        "irp_key \$irp_key were NOT empty",
        "it is EMPTY",
        "Check");
    }
    
# SKIPPED   irp_path_clean_register_of_top_key_of_bottom_key_of_where ($irp_fat, $irp_key, $irp_fat . "_build");
    $log_str = "SKIPPED Path for bottom irp_key >$irp_key< has been cleaned up to >$irp_fat<" . "\n"; 

    irp_remove_off_irp_register_of_irp_key ($irp_key, $here);
    
    $_SESSION['creation_step_count'] = $_SESSION['creation_step_count'] + 1;
    $_SESSION['creation_step'][$irp_key] = $_SESSION['creation_step_count'];  

    irp_store ($irp_key, $irp_val, $here);

    $log_str .= "Value storage forced for irp_key >$irp_key<" . "\n"; 
    $log_str .= "irp_key >$irp_key< re-built from $caller";
    file_log_write ($here, $log_str);

    exiting_from_function ($here . " ($irp_key, \$irp_val, $irp_fat, $caller)");
    return;
}

function irp_stack_path_of_key ($irp_key) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($irp_key)");
    
    $irp_sta_a = $_SESSION['irp_stack'];
    debug ($here, '$irp_sta_a', $irp_sta_a);
    
    $idx_key = array_retrieve_only_key_of_value_of_array_of_where ($irp_key, $irp_sta_a, $here);
    while ($idx_key) {
        $irp_sta_b = array_slice ($irp_sta_a, $idx_key +1);
        $idx_key = array_search ($irp_key, $irp_sta_b);
    }
    
    debug ($here, '$irp_sta_b', $irp_sta_b);
    exiting_from_function ($here . " ($irp_key)");
    
    return $irp_sta_b ;
}

function irp_retrieve ($irp_key, $caller) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($irp_key, $caller)");
    
    $irp_reg_a = $_SESSION['irp_register'];
    debug ($here , 'irp_register_keys', array_keys ($_SESSION['irp_register']));
    
    if (irp_is_stored_of_irp_key ($irp_key, $here)) {
        
        $irp_val = $_SESSION['irp_register'][$irp_key];
        /* debug ($here , "irp_val",  $irp_val); */
        
        if (string_is_empty_of_string ($irp_val)) {
            $mest = "Irp Value is empty in function irp_retrieve for Irp irp_key $irp_key";
            exiting_from_function ($here . ' with Exception ' . $mest);
            throw new Exception ($mest);
        }
        
/* obtain path for a stored module */
        
        #      $irp_pat_a = irp_stack_path_of_key ($irp_key);
        #      # debug ($here ,'$irp_pat_a',  $irp_pat_a);
        
        $str_val = string_of_separator_of_any_variable ('::', $irp_val);
        array_push ($_SESSION['irp_stack'], $irp_key . " ($str_val)");

        $log_str = "already stored Value pushed in irp_stack for irp_key >$irp_key< pushed in irp_stack from $caller";
        file_log_write ($here, $log_str);

        $log_str = "irp_key >$irp_key< has been retrieved from $caller";
        file_log_write ($here, $log_str);

        exiting_from_function ($here . " ($irp_key, $caller)");

        return $irp_val;
    }
    else {
        print_html_array ($here , "irp_register", $_SESSION['irp_register']);
        exiting_from_function ($here . " with irp_key >$irp_key<");

        print_fatal_error ($here, 
        "irp_key >$irp_key< were storing some value",
        "it does NOT",
        "Check irp_register upper");
    }
}

function irp_build ($irp_key, $nam_fat, $caller) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($irp_key, $nam_fat, $caller)");
  
  $irp_build = $irp_key . "_build";

  if ( ! function_exists ($irp_build)) {
      $mes  = 'Check that :<br>';
      $mes .= '1 entity >' . $irp_key . '< may be a DATA missing from $_SESSION["is_data_entity_name"]' . '<br>';
      $mes .= '2 function >' . $irp_build . '< is implemented and accessible' . '<br>';
      $mes .= '3 line <br><i>  require_once "' . $irp_key . '_functions.php";</i><br>  is present in build_requirements.php<br>';

      $nam_scr  = str_replace ('_functions', '', $irp_key);
      $nam_scr .= '.php';

      $mes .= "4 try<br> cp template_script.php $nam_scr <br>";
      
      print_fatal_error ($here, 
      "Building function DOES exists",
      "it does NOT",
      $mes);
  }

    $irp_fat = preg_replace ('/_build/', '', $nam_fat); 
    if ($irp_fat != $irp_key) {
        array_push ($_SESSION['irp_stack'], $irp_key);

        $log_str = "irp_key >$irp_key< pushed in irp_stack built by >$irp_fat< from $caller";
        file_log_write ($here, $log_str);
        $nam_son = $irp_key;
        father_n_son_stack_entity_push_of_father_of_son ($nam_fat, $nam_son);
    }
    else {
        $log_str = "irp_key >$irp_key< not pushed in irp_stack built by itself >$irp_fat< from $caller";
        file_log_write ($here, $log_str);
    }

    $error = eval ('$irp_val = (' . $irp_build . ' ());');

    if (empty ($irp_val)) {
        print_fatal_error ($here, 
        "Value built for irp_key >$irp_key< were NOT empty",
        "it is EMPTY",
        "Check function $irp_build"
        );
    }
  
    $_SESSION['creation_step_count'] = $_SESSION['creation_step_count'] + 1;
    $_SESSION['creation_step'][$irp_key] = $_SESSION['creation_step_count'];  

    $log_str = "irp_key >$irp_key< built from $caller";
    file_log_write ($here, $log_str);
  
    exiting_from_function ($here . " ($irp_key, $nam_fat)");
    
    return $irp_val;
}

function irp_build_n_store ($irp_key, $nam_fat, $caller) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($irp_key, $nam_fat, $caller)");
  
  $irp_val = irp_build ($irp_key, $nam_fat, $here);

  irp_store ($irp_key, $irp_val, $here);

  $log_str = "irp_key >$irp_key< has been built and stored from $caller";
  file_log_write ($here, $log_str);

  exiting_from_function ($here . " ($irp_key, $nam_fat)");
  
  return $irp_val;
}

function irp_provide_nondata ($irp_key, $caller) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($irp_key, $caller)");

    $irp_fat = preg_replace ('/_build/', '', $caller); 

    if (irp_is_stored_of_irp_key ($irp_key, $here)) {
        if ($_SESSION['parameters']['irp_nondata_storage_is_enabled']) {
            $irp_val = irp_retrieve ($irp_key, $here);
            $nam_son = $irp_key;
            $nam_fat = $irp_fat;  
            father_n_son_stack_entity_push_of_father_of_son ($nam_fat, $nam_son); /* may be not useful */
        }
        else {
            $log_str = "irp_store NONDATA NOT active : irp_key >$irp_key< is stored. Calling irp_build_n_store anyway from $caller";
            file_log_write ($here, $log_str);

            $irp_val = irp_build_n_store ($irp_key, $irp_fat);
        }
    }
    else { /* not stored */
        $log_str = "irp_key >$irp_key< not stored calling irp_build_n_store from $caller";
        file_log_write ($here, $log_str);

        $irp_val = irp_build_n_store ($irp_key, $irp_fat, $here);
    }
    
    exiting_from_function ($here . " ($irp_key, $caller)");
    return $irp_val;
}

function irp_provide_data ($irp_key, $caller) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($irp_key, $caller)");

    if ( ! irp_is_data_of_irp_key ($irp_key, $here)) {
        print_fatal_error ($here, 
        "irp_key >$irp_key< were a DATA",
        "it is NOT",
        "Check"
        );
    }
                
    if (irp_is_stored_of_irp_key ($irp_key, $here)) {
        $irp_val = irp_retrieve ($irp_key, $here);
        $nam_son = $irp_key;
        $nam_fat = preg_replace ('/_build/', '', $caller); 
        father_n_son_stack_entity_push_of_father_of_son ($nam_fat, $nam_son); /* may be not useful */

        $log_str = "DATA irp_key >$irp_key< is stored and retrieved with value >$irp_val< from $caller";
        file_log_write ($here, $log_str);
    }
    else { /* not stored */
        $cure  = '';
        $cure .= "in function <i>$caller</i> where DATA is retrieved add these lines :<br>";
        $cure .= "<br>";
        $cure .= '   $nam_mod_cur = module_name_of_module_fullnameoffile (__FILE__);';
        $cure .= "<br>";
        $cure .= '/* getting DATA $get_val */';
        $cure .= "<br>"; 
        $cure .= '   $get_key = \'' . $irp_key .'\';'; 
        $cure .= "<br>"; 
        $cure .= '   $irp_val = irp_data_value_retrieve_and_store_of_get_key_of_module_name_of_where ($get_key, $nam_mod_cur, $here);';

        print_fatal_error ($here,
        "DATA >$irp_key< were already stored",
        "it is NOT",
        $cure);
    }
    
    if (empty ($irp_val)) {
        print_fatal_error ($here, 
        "value for \$irp_key >$irp_key< were NOT empty",
        "it is EMPTY",
        "Check"
        );
    }
    
    exiting_from_function ($here . " ($irp_key, $caller)");
    return $irp_val;
}

function irp_provide ($irp_key, $caller) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($irp_key, $caller)");
    
    if ( ! ( 
        ($caller == "command_display")
        ||
        (is_substring_of_substring_off_string ("_build", $caller)) 
        || 
        (is_substring_of_substring_off_string ("_script", $caller))
    )) { 
        print_fatal_error ($here, 
        "the name of the current function ends with \"_build\" as it uses an <i><b>irp_provide</b></i>",
        "<i><b>$caller</b></i> as current function name",
        "Please take out all the <i><b>irp_provide</b></i> inside"
        );
    }

    if (irp_is_data_of_irp_key ($irp_key, $here)) {
        $irp_val = irp_provide_data ($irp_key, $caller);
    }
    else {
        $irp_val = irp_provide_nondata ($irp_key, $caller);
    }

    if (empty ($irp_val)) {
        print_fatal_error ($here, 
        "value for \$irp_key >$irp_key< were NOT empty",
        "it is EMPTY",
        "Check"
        );
    }
    
    $_SESSION['count_entity'] = $_SESSION['count_entity'] +1;

    $log_str =  "irp_key >$irp_key< has been provided from $caller";
    file_log_write ($here, $log_str);

    exiting_from_function ($here . " ($irp_key, $caller)");
    return $irp_val;
}

function irp_father_as_current_module_of_href_link_son ($nam_hre) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($nam_hre)");
    
    $current_module = basename( $_SERVER[SCRIPT_NAME], ".php") ;
    debug_n_check ($here, '$current_module', $current_module);
    
    $_SESSION['irp_father'][$nam_hre] = $current_module;
    
    exiting_from_function ($here. " ($nam_hre)");
    
    return ;
    
}

function irp_father_of_module_of_son__XX ($nam_fat, $nam_son) {
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
        $_SESSION['irp_father'][$nam_son] = $nam_fat;
    }
    
    exiting_from_function ($here . " ($nam_fat, $nam_son)");
    
    return ;
    
}

exiting_from_module ($module);

?>