<?php

require_once "management_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function tools_display ($what) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($what)");

    $eol = end_of_line ();

    switch ($what) {

    case 'cpu_n_function' :
        $cpu_n_fun_a = $_SESSION['cpu_n_function'];
        print_html_array ($here, $what, $cpu_n_fun_a);
        break;

    case 'creation_step' :
        $ses_ele_a = $_SESSION['creation_step'];
        print_html_array ($here, $what, $ses_ele_a);
        break;

    case 'data_creation_function' :
        $ses_ele_a = $_SESSION['data_creation_function'];
        print_html_array ($here, $what, $ses_ele_a);
        break;

    case 'removed_irp_keys_array' :
        $ses_reg_a = $_SESSION['removed_irp_keys_array'];
        print_html_array ($here, $what, $ses_reg_a);
        break;

    case 'father_n_son_entity' :
        $fat_n_son_h = $_SESSION['father_n_son_stack_entity'];
        print_html_array ($here, "father_n_son_stack_entity", $fat_n_son_h);
        break;
        
    case 'father_n_son_module' :
        $fat_n_son_h = $_SESSION['father_n_son_stack_module'];
        print_html_array ($here, "father_n_son_stack_module", $fat_n_son_h);
        break;
        
    case 'get' :
        print_html_array ($here, '$_GET', $_GET);
        break;

    case 'get_hash' :
        $def_var_a = get_defined_vars();
        print_html_array ($here, $what, $def_var_a);
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
        
    case 'top_key_in_get_hash_register' :
        $ses_reg_a = $_SESSION['top_key_in_get_hash_register'];
        print_html_array ($here, $what, $ses_reg_a);
        break;
        
    case 'session' :
        print_html_array ($here, '$_SESSION', $_SESSION);
        break;

    case 'session_id' :
        $ses_id = session_id ();
        print_html_scalar ($here, $what, $ses_id);
        break;

    case 'session_keys' :
        $arr_a = array_keys ($_SESSION);
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

    case 'stack_function_called_array' : 
        $sta_fun_lev_a = $_SESSION['parameters']['stack_function_called_array'];
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
    
    irp_store_force ($what, $irp_val, 'entry_current_display');
    
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
          if (isset ($_SESSION['irp_register'][$what])) {
              unset ($_SESSION['irp_register'][$what]);
          }
          else {
              print_fatal_error ($here, 
              "what to be removed were defined",
              "$what",
              "Please select one key of irp_register"
              );
          }
    }
    
    $log_str = "$what has been removed";
    print_d ($here, $log_str);
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
          $_SESSION['is_cpu_active'] = TRUE;
          break;
      case 'debug' :
          $_SESSION['is_debug_active'] = TRUE;
          break;
      case 'trace' :
          $_SESSION['is_verbose'] = TRUE;
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
          $_SESSION['is_cpu_active'] = FALSE;
          break;
      case 'debug' :
          $_SESSION['is_debug_active'] = FALSE;
          break;
      case 'trace' :
          $_SESSION['is_verbose'] = FALSE;
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

    $dir = file_specific_directory_name_of_basic_name_of_name ("hd_php_server", 'FILES');
    $nof = $what . '.txt';
    $fno = $dir . $nof;

    debug_n_check ($here , '$fno', $fno);

    switch ($what) {
    case 'cpu_n_function' :
        $arr_a = $_SESSION['cpu_n_function'];
        file_array_write ($fno, $arr_a);
        break;

    case 'removed_irp_keys_array' :
        $arr_a = $_SESSION['removed_irp_keys_array'];
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
        $val_by_key_h = $_SESSION['irp_register'];
        file_associative_array_write ($fno, $val_by_key_h);
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
        
    case 'top_key_in_get_hash_register' :
        $arr_a = $_SESSION['top_key_in_get_hash_register'];
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

function command_action_of_action_name_of_argument ($nam_act, $str_arg) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_act, $str_arg)");

  switch ($nam_act) {
      case 'debug' :
          break;
      case 'display' :
          tools_display ($str_arg);
          break;
      case 'load' :
          tools_load ($str_arg);
          break;
      case 'read' :
          tools_read ($str_arg);
          break;
      case 'remove' :
          tools_remove ($str_arg);
          break;
      case 'set' :
          tools_set ($str_arg);
          break;         
      case 'unset' :
          tools_unset ($str_arg);
          break;         
      case 'write' :
          tools_write ($str_arg);
          break;         
      default:  
          $en_mes = "no action is defined. Using action <i>display</i> as default";
          $la_mes = language_translate_of_en_string ($en_mes); 
          $la_Mes = string_html_capitalized_of_string ($la_mes);
          warning ($here, $la_Mes);
          tools_display ($str_arg);
      }
  
  exiting_from_function ($here);

  return;
}

exiting_from_module ($module);

?>
