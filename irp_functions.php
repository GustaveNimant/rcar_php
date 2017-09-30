<?php

require_once "build_requirements.php";

$module = module_name_of_module_nameoffile (__FILE__);

entering_in_module ($module);

$Documentation[$module]['irp_stack'] = "stacks all \$irp_key. When retrieved (\$irp_val) is added"; 

function irp_is_stored_of_irp_key ($irp_key) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($irp_key)");
    
    $irp_reg_a = $_SESSION['irp_register'];
    debug ($here , 'irp_register', $irp_reg_a);
    if ( ! is_array ($irp_reg_a) ) {
        exiting_from_function ($here . " with irp_key >" . $irp_key . "<");
        include 'index.php';
        exit;
    }
    
    $boo = FALSE;
    switch ($irp_key) {
    case 'quit' :
        break;
    default:
        if (array_key_exists ($irp_key, $irp_reg_a)){
            $log_str = "Value for key >$irp_key< already stored\n";
            file_log_write ($here, $log_str);
            $boo = TRUE;
        }
    };
    
    $str_boo = string_of_boolean ($boo);
    
    debug ($here , 'irp_register array', $irp_reg_a);
    exiting_from_function ($here . " with irp_key >" . $irp_key . "< is " . $str_boo);
    
    return $boo;
}

function irp_store ($irp_key, $irp_val) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($irp_key, ...)");
    
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
    
    if (irp_is_stored_of_irp_key ($irp_key)) {
        $old_value = $_SESSION['irp_register'][$irp_key];
        
        if ($irp_val == $old_value) {
            print "$here: Warning irp_key >$irp_key< is already stored with the same value";
        }
        else {
            print_html_variable ($here , "already stored irp_key", $irp_key);
            print_html_variable ($here , "old value",  $old_value);
            print_html_variable ($here , "new value",  $irp_val);
            print_fatal_error ($here, 
            "irp_key >$irp_key< were already stored with the same value:",
            "Old Value differs from new Value",
            "Check Values upper");
        }
    }
    
    if (
        ($irp_key == "git_command") 
        ||  
        ($irp_key == "git_command_commit") 
        ||  
        ($irp_key == "git_command_n_commit_html") 
        ||  
        ($irp_key == "user_information")
    ){
        $log_str = "Value storage skipped for key >$irp_key<"; 
    }
    else {
        $_SESSION['irp_register'][$irp_key] = $irp_val;
        $log_str = "Value stored for key >$irp_key<"; 
    }

   file_log_write ($here, $log_str);
    
    debug ($here , "irp_register", $_SESSION['irp_register']);
    exiting_from_function ($here);
    return;
}

function irp_store_force ($irp_key, $irp_val, $irp_fat) {
    $here = __function__;
    entering_in_function ($here . " ($irp_key, ..., $irp_fat)");

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
    
#    irp_path_clean_register_of_top_key_of_bottom_key ($irp_fat, $irp_key);
    $log_str = "SKIPPED Path for bottom irp_key >$irp_key< has been cleaned up to >$irp_fat<" . "\n"; 

#    unset ($_SESSION['irp_register'][$irp_key]);
    $log_str .= "SKIPPED irp_key >$irp_key< removed from irp_register" . "\n";    

    irp_store ($irp_key, $irp_val);
    $log_str .= "Value storage forced for irp_key >$irp_key<" . "\n"; 

    file_log_write ($here, $log_str);

    exiting_from_function ($here);
    return;
}

function irp_store_from_get ($get_key, $module) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($get_key)");

  $get_val = get_hash_retrieve_value_of_key_of_where ($get_key, $module);
  /* debug ($here , "get_key",  $get_key); */
  /* debug ($here , "get_val",  $get_val); */

  irp_store ($get_key, $get_val);

  $log_str = "Value stored form \$_GET['$get_key']"; 
  file_log_write ($here, $log_str);

  exiting_from_function ($here);
  return;
}

function irp_stack_path_of_key ($irp_key) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($irp_key)");
    
    $irp_sta_a = $_SESSION['irp_stack'];
    debug ($here, '$irp_sta_a', $irp_sta_a);
    
    $idx_key = array_retrieve_key_of_value ($irp_key, $irp_sta_a, $here);
    while ($idx_key) {
        $irp_sta_b = array_slice ($irp_sta_a, $idx_key +1);
        $idx_key = array_search ($irp_key, $irp_sta_b);
    }
    
    debug ($here, '$irp_sta_b', $irp_sta_b);
    exiting_from_function ($here);
    
    return $irp_sta_b ;
}

function irp_retrieve ($irp_key) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($irp_key)");
    
    $irp_reg_a = $_SESSION['irp_register'];
    debug_n_check ($here, "irp_reg_a", $irp_reg_a); 
    
    if (irp_is_stored_of_irp_key ($irp_key)) {
        
        $irp_val = $_SESSION['irp_register'][$irp_key];
        /* debug ($here , "irp_val",  $irp_val); */
        
        if (string_is_empty_of_string ($irp_val)) {
            $mest = "Irp Value is empty in function irp_retrieve for Irp irp_key $irp_key";
            exiting_from_function ($here . ' with ' . $mest);
            throw new Exception ($mest);
        }
        
/* obtain path for a stored module */
        
        #      $irp_pat_a = irp_stack_path_of_key ($irp_key);
        #      # debug ($here ,'$irp_pat_a',  $irp_pat_a);
        
        $str_val = string_of_separator_of_any_variable ('::', $irp_val);
        array_push ($_SESSION['irp_stack'], $irp_key . " ($str_val)");
        $log_str = "already stored Value pushed in irp_stack for irp_key >$irp_key< pushed in irp_stack";
        file_log_write ($here, $log_str);

        exiting_from_function ($here);
        return $irp_val;
    }
    else {
        print_html_array ($here , "irp_register", $_SESSION['irp_register']);
        exiting_from_function ($here);
        print_fatal_error ($here, 
        "irp_key >$irp_key< were storing some value",
        "it does NOT",
        "Check irp_register upper");
    }
}

function irp_remove_off_irp_register_of_irp_key ($key, $where) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($key, $where)");
    
    $log_str = "$her :irp_register[$key] cleaned";
    
    if ($key == "all"){
#        unset ($_SESSION['irp_register']);
        $log_str = "SKIPPED All irp_key removed from irp_register";    
    }
    else {
#        unset ($_SESSION['irp_register'][$key]);
        $log_str = "SKIPPED \$irp_key >$irp_key< removed from irp_register";    
    }
    
    file_log_write ($here, $log_str);

    exiting_from_function ($here);
    return;
}

function irp_clean_value_of_irp_key ($irp_key, $irp_val_sal) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($irp_key, $irp_val_sal)");
    /* Improve what is it ? */
    switch ($irp_key) {
        /* case 'item_name' : */
        /*   $irp_val = word_name_capitalized_of_string_surname ($irp_val_sal); */
        /*   break; */
    case 'item_newname' :
        $irp_val_cle = word_name_capitalized_of_string_surname ($irp_val_sal);
        break;
    case 'entry_newsurname' :
        $irp_val_cle = word_name_capitalized_of_string_surname ($irp_val_sal);
        break;
    case 'entry_name' :
        $irp_val_cle = word_name_capitalized_of_string_surname ($irp_val_sal);
        break;
    default :
        $irp_val_cle = $irp_val_sal;
    }

    $log_str =  "Value cleaned as >$irp_val_cle< for irp_key >$irp_key<";
    file_log_write ($here, $log_str);

    exiting_from_function ($here);
    return $irp_val_cle;
    
}

function irp_build_n_store ($irp_key, $nam_fat) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($irp_key, $nam_fat)");
  
  $irp_build = $irp_key . "_build";

  if (function_exists ($irp_build)) {

    $irp_fat = preg_replace ('/_build/', '', $nam_fat); 
    if ($irp_fat != $irp_key) {
        array_push ($_SESSION['irp_stack'], $irp_key);

        $log_str = "irp_key >$irp_key< pushed in irp_stack built by >$irp_fat<";
        file_log_write ($here, $log_str);
        $nam_son = $irp_key;
        father_n_son_stack_entity_push_of_father_of_son ($nam_fat, $nam_son);
    }
    else {
        $log_str = "irp_key >$irp_key< not pushed in irp_stack built by itself >$irp_fat<";
        file_log_write ($here, $log_str);
    }

    $error = eval ('$irp_val = (' . $irp_build . ' ());');

  }
  else {
/* $_GET */

      $irp_val_sal = get_hash_retrieve_value_of_key_of_where ($irp_key, $here);
      $irp_val = irp_clean_value_of_irp_key ($irp_key, $irp_val_sal);

      $irp_fat = "GET";  /* Improve true ??? */

      $log_str  = "\$_GET has " . count ($_GET) . " elements" . "\n";
      $log_str .= "function >$irp_build< does not exist" . "\n";

/* Improve entry_display is not the only one */
#      irp_path_clean_register_of_top_key_of_bottom_key ('entry_display', $irp_key);
      $log_str = "SKIPPED Path for bottom irp_key >$irp_key< has been cleaned up to entry_display" . "\n"; 
      
/* father_n_son_stack_entity */
      /* father_n_son_stack_entity_push_of_father_of_son ($irp_key, 'GET'); */
      /* father_n_son_stack_entity_push_of_current_entity ($irp_key);  */
      
      array_push ($_SESSION['irp_stack'], $irp_key);
      $log_str .= "irp_key >$irp_key< pushed in irp_stack built by >$irp_fat<";
      file_log_write ($here, $log_str);
  }
  
  if (empty ($irp_val)) {
      print_fatal_error ($here, 
      "Value for irp_key >$irp_key< were NOT empty",
      "it is EMPTY",
      "Check"
      );
  }
  
  irp_store ($irp_key, $irp_val);
  
  exiting_from_function ($here);

  return $irp_val;
}

function irp_provide ($irp_key, $cal_fun) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($irp_key, $cal_fun)");
    
    if ( ! ( 
        (is_substring_of_substring_off_string ("_build", $cal_fun)) 
        || (is_substring_of_substring_off_string ("_display", $cal_fun))
        || (is_substring_of_substring_off_string ("_write", $cal_fun)) 
    )) { 
        print_fatal_error ($here, 
        "the name of the current function contains \"_build\" as it uses an <b>irp_provide</b>",
        "<i>$cal_fun</i> as current function name",
        "Please take out all the <b>irp_provide</b>"
        );
    }
    
    $irp_fat = preg_replace ('/_build/', '', $cal_fun); 

    if (irp_is_stored_of_irp_key ($irp_key)) {
        $irp_val = irp_retrieve ($irp_key);
        $nam_son = $irp_key;
        $nam_fat = $irp_fat;  
        father_n_son_stack_entity_push_of_father_of_son ($nam_fat, $nam_son); /* may be not useful */
    }
    else {
        $log_str = "irp_key >$irp_key< not stored calling irp_build_n_store";
        file_log_write ($here, $log_str);

        $irp_val = irp_build_n_store ($irp_key, $irp_fat);
    }
    
    if (empty ($irp_val)) {
        print_fatal_error ($here, 
        "value for \$irp_key >$irp_key< were NOT empty",
        "it was empty",
        "Check"
        );
    }
    
    $_SESSION['count_entity'] = $_SESSION['count_entity'] +1;
    
    exiting_from_function ($here . " ($irp_key, $cal_fun)");
    return $irp_val;
}

function irp_father_as_current_module_of_href_link_son ($nam_hre) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($nam_hre)");
    
    $current_module = basename( $_SERVER[SCRIPT_NAME], ".php") ;
    debug_n_check ($here, '$current_module', $current_module);
    
    $_SESSION['irp_father'][$nam_hre] = $current_module;
    
    exiting_from_function ($here);
    
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
    
    exiting_from_function ($here);
    
    return ;
    
}

exiting_from_module ($module);

?>