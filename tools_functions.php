<?php
require_once "irp_functions.php";
require_once "git_history_functions.php";
require_once "session_functions.php";
require_once "father_n_son_stack_module_functions.php";
require_once "father_n_son_stack_entity_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function tools_display ($what) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($what)");
    
    switch ($what) {
    case 'cpu_n_function' :
        $cpu_n_fun_a = $_SESSION['cpu_n_function'];
        print_html_array ($here, $what, $cpu_n_fun_a);
        break;

    case 'deleted_irp_keys_array' :
        $ses_reg_a = $_SESSION['deleted_irp_keys_array'];
        print_html_array ($here, $what, $ses_reg_a);
        break;

    case 'dollar_get_array' :
        $def_var_a = get_defined_vars();
        print_html_array ($here, $what, $def_var_a);
        break;

    case 'father_n_son_entity' :
        $fat_n_son_a = $_SESSION['father_n_son_stack_entity'];
        print_html_array ($here, "father_n_son_stack_entity", $fat_n_son_a);
        break;
        
    case 'father_n_son_module' :
        $fat_n_son_a = $_SESSION['father_n_son_stack_module'];
        print_html_array ($here, "father_n_son_stack_module", $fat_n_son_a);
        break;
        
    case 'get_variable_register' :
        $ses_reg_a = $_SESSION['get_variable_register'];
        print_html_array ($here, $what, $ses_reg_a);
        break;

    case 'get_defined_variables' :
        $def_var_a = get_defined_vars();
        print_html_array ($here, $what, $def_var_a);
        break;

    case 'git_commit' :
        $html_str = git_command_n_commit_html_build ();
        print $html_str;
        break;

    case 'git_history' :
        $str_a = git_history_build ();
        print_html_array ($here, $what, $str_a);
        break;
        
    case 'irp_father' :
        $irp_fat_a = $_SESSION['irp_father'];
        print_html_array ($here, $what, $irp_fat_a);
        break;
        
    case 'irp_path' :
        $bot = "item_display";
        $up = "entry_array";
        $irp_pat_a = irp_path_of_bottom_of_up ($bot, $up);
        print_html_array ($here, $what, $irp_pat_a);
        break;
        
    case 'irp_register' :
        $irp_reg_a = $_SESSION['irp_register'];
        print_html_array ($here, $what, $irp_reg_a);
        break;
        
    case 'irp_register_keys' :
        $irp_reg_a = $_SESSION['irp_register'];
        $irp_key_a = array_keys ($irp_reg_a);

        print_html_array ($here, $what, $irp_key_a);
        break;

    case 'irp_stack' :
        $irp_sta_a = $_SESSION['irp_stack'];
        print_html_array ($here, $what, $irp_sta_a);
        break;
        
    case 'last_dollar_get_register' :
        $ses_reg_a = $_SESSION['last_dollar_get_register'];
        print_html_array ($here, $what, $ses_reg_a);
        break;
        
    case 'session' :
        print_html_array ($here, $what, $_SESSION);
        break;

    case 'session_id' :
        $ses_id = session_id ();
        print_html_scalar ($here, $what, $ses_id);
        break;

    case 'session_keys' :
        $ses_a = $_SESSION;
        $arr_a = array_keys ($ses_a);
        print_html_array ($here, $what, $arr_a);
        break;

    case 'session_name' :
        $ses_nam = session_name ();
        print_html_scalar ($here, $what, $ses_nam);
        break;
        
    case 'session_path' : 
        $ses_pat = session_save_path ();
        print_html_scalar ($here, $what, $ses_pat);
        break;

    case 'session_parameters' : 
        $ses_par_a = $_SESSION['parameters'];
        print_html_array ($here, $what, $ses_par_a);
        break;

    case 'stack_function_level_array' : 
        $sta_fun_lev_a = $_SESSION['parameters']['stack_function_level_array'];
        print_html_array ($here, $what, $sta_fun_lev_a);
        break;

    default:
        $res = irp_provide ($what, $here);
        debug_n_check ($here , '$res', $res);
        
        debug ($here , "XXX irp_register", $_SESSION['irp_register']); 

        if (is_array ($res)) {
            print_html_array ($here, $what, $res);
        }
        else {
            print_html_scalar ($here, $what, $res);
        }
    };
    
    $log_str = "Entity $what displayed";
    file_log_write ($here, $log_str);
    
    exiting_from_function ($here . " ($what)");
    return $log_str;
}

function tools_read ($what) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($what)");

    fatal_error ($here, "Not yet implemented");
    exiting_from_function ($here . " ($what)");
    return;
}

function tools_load ($what) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($what)");

    $fun_read = $what . "_read";
    debug_n_check ($here, '$fun_read', $fun_read);
    if (function_exists ($fun_read)) {
        $error = eval ('$irp_val = (' . $fun_read . ' ());');
    }
    else {
        fatal_error ($here, "function >$fun_read< does not exist");
    }
    
    irp_store_force ($what, $irp_val, 'entry_display');
    
    $log_str = "Entity >$what< loaded from disk";
    file_log_write ($here, $log_str);

    exiting_from_function ($here . " ($what)");
    return;
}

function tools_remove ($what) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($what)");

    switch ($what) {
      case 'irp_register' :
          $_SESSION['irp_register'] = '';
          break;
      case 'session' :
          $id_ses = session_id ();
          session_remove ($id_ses);
          break;
      default:
          print_fatal_error ($here, 
          "what to be removed were defined",
          "$what",
          "Please select one of irp_register |"
          );
    };
    
    $log_str = "$what has been removed";
    file_log_write ($here, $log_str);

    exiting_from_function ($here . " ($what)");
    return $log_str;

}

function tools_set ($what) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($what)");

    switch ($what) {
      case 'count_entity' :
          $_SESSION['count_entity'] = 1;
          break;
      case 'cpu' :
          $_SESSION['cpu_active'] = 1;
          break;
      case 'debug' :
          $_SESSION['debug_active'] = 1;
          break;
      case 'trace' :
          $_SESSION['is_verbose'] = 1;
          break;
      default:
          print_fatal_error ($here, 
          "what to be set were defined",
          "$what",
          "Please select one of count_entity | cpu | debug | trace"
          );
    };
    
    $log_str = "$what has been set";
    file_log_write ($here, $log_str);

    exiting_from_function ($here . " ($what)");
    return $log_str;

}

function tools_unset ($what) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($what)");

    switch ($what) {
      case 'count_entity' :
          $_SESSION['count_entity'] = 0;
          break;
      case 'cpu' :
          $_SESSION['cpu_active'] = 0;
          break;
      case 'debug' :
          $_SESSION['debug_active'] = 0;
          break;
      case 'trace' :
          $_SESSION['is_verbose'] = 0;
          break;
      default:
          print_fatal_error ($here, 
          "what to be unset were defined",
          "$what",
          "Please select one of count_entity | cpu | debug | trace"
          );
    };
    
    $log_str = "$what has been removed";
    file_log_write ($here, $log_str);

    exiting_from_function ($here . " ($what)");
    return $log_str;

}

function tools_write ($what) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($what)");

    $dir = specific_directory_name_of_basic_name_of_name ("hd_php_server", 'FILES');
    $nof = $what . '.txt';
    $fno = $dir . $nof;

    debug_n_check ($here , '$fno', $fno);

    switch ($what) {
    case 'cpu_n_function' :
        $arr_a = $_SESSION['cpu_n_function'];
        file_array_write ($fno, $arr_a);
        break;

    case 'deleted_irp_keys_array' :
        $arr_a = $_SESSION['deleted_irp_keys_array'];
        file_array_write ($fno, $arr_a);
        break;

    case 'father_n_son_entity' :
        $arr_a = $_SESSION['father_n_son_stack_entity'];
        file_array_write ($fno, $arr_a);
        break;
        
    case 'father_n_son_module' :
        $arr_a = $_SESSION['father_n_son_stack_module'];
        file_array_write ($fno, $arr_a);
        break;
        
    case 'get_variable_register' :
        $arr_a = $_SESSION['get_variable_register'];
        file_array_write ($fno, $arr_a);
        break;

    case 'git_commit' :
        $html_str = git_command_n_commit_html_build ();
        print $html_str;
        break;
        
    case 'irp_father' :
        $arr_a = $_SESSION['irp_father'];
        file_array_write ($fno, $arr_a);
        break;
        
    case 'irp_path' :
        $bot = "item_display";
        $up = "entry_array";
        $arr_a = irp_path_of_bottom_of_up ($bot, $up);
        file_array_write ($fno, $arr_a);
        break;
        
    case 'irp_register' :
        $val_by_key_a = $_SESSION['irp_register'];
        file_associative_array_write ($fno, $val_by_key_a);
        break;
        
    case 'irp_register_keys' :
        $irp_reg_a = $_SESSION['irp_register'];
        $arr_a = array_keys ($irp_reg_a);
        file_array_write ($fno, $arr_a);
        break;

    case 'irp_stack' :
        $arr_a = $_SESSION['irp_stack'];
        file_array_write ($fno, $arr_a);
        break;
        
    case 'last_dollar_get_register' :
        $arr_a = $_SESSION['last_dollar_get_register'];
        file_array_write ($fno, $arr_a);
        break;
        
    case 'session' :
        file_associative_array_write ($fno, $_SESSION);
        break;
        
    case 'session_keys' :
        $ses_a = $_SESSION;
        $arr_a = array_keys ($ses_a);
        file_array_write ($fno, $arr_a);
        break;

    default:
        $res = irp_provide ($what, $here);
        debug_n_check ($here , '$res', $res);

        if (is_array ($res)) {
            file_array_write ($fno, $res);
        }
        else {
            file_string_write ($fno, $res);
        }

    };
    
    $log_str = "Entity $what displayed";
    file_log_write ($here, $log_str);
    
    exiting_from_function ($here . " ($what)");
    return $log_str;

}

exiting_from_module ($module);

?>