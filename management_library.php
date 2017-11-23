<?php

require_once "basics_library.php";
require_once "module_name_library.php";
require_once "error_library.php";

$module = "management_functions";

function management_excluded_first_word_function_build () {
  $here = __FUNCTION__;    

  $excluded_first_a = array (
      'array', 'check', 'label', 'file', 
      'language', 'now', 'string', 
      'surname', 'user', 'word'
  ); 
  
  return $excluded_first_a;
}

function management_is_quiet_of_function_name ($nam_fun) {
    $here = __FUNCTION__;    
    
    $excluded_first_a = management_excluded_first_word_function_build ();
    
    $wor_a = explode ("_", $nam_fun);
    $wor_fir = $wor_a[0];
    
    $boo = in_array ($wor_fir, $excluded_first_a);
    /* $str = string_of_boolean ($boo); */
    /* print "management_is_quiet_of_function_name ($nam_fun) = $str<br>"; */
    
    return $boo;
}

function management_is_verbose_of_function_name ($nam_fun) {
    $here = __FUNCTION__;

    $is_ver_ver = (isset ($_SESSION['is_very_verbose']) ) && ($_SESSION['is_very_verbose']);
    if ($is_ver_ver) {
        $boo = TRUE;
    }
    else {
        $is_ver = (isset ($_SESSION['is_verbose'] ) ) && ($_SESSION['is_verbose']);
        $is_qui = management_is_quiet_of_function_name ($nam_fun);
        
        $boo = $is_ver && (! $is_qui) ;
    }     

  return $boo;
}

function comment_entering_of_function_name ($nam_fun) {
    $here = __FUNCTION__;

    $dot_list = $_SESSION['parameters']['stack_function_level_dot_list'];
    $lev_cur = count ($_SESSION['parameters']['stack_function_called_array']);
    $str_poi = substr ($dot_list, 0, $lev_cur);
    
    $com = "<!-- $str_poi going in function $nam_fun -->\n"; 
    return $com;
};

function comment_exiting_of_function_name ($nam_fun) {
    $here = __FUNCTION__;

    $dot_list = $_SESSION['parameters']['stack_function_level_dot_list'];
    $lev_cur = count ($_SESSION['parameters']['stack_function_called_array']);
    $str_poi = substr ($dot_list, 0, $lev_cur);
    
    $com = "<!-- $str_poi out  off function $nam_fun -->\n"; 
    
    return $com;
};

function management_entering_level_of_name ($nam) {
    $here = __FUNCTION__;

    if ( 
        (isset ($_SESSION['parameters']['stack_function_called_array']))
        &&    
        (isset ($_SESSION['parameters']['stack_function_level_dot_list']))
        &&    
        (isset ($_SESSION['parameters']['stack_function_level_maximum']))
        
    ) {

/* name is either function OR module */

        array_push ($_SESSION['parameters']['stack_function_called_array'], $nam);
        
        $lev_cur = count ($_SESSION['parameters']['stack_function_called_array']);
        $max_lev = $_SESSION['parameters']['stack_function_level_maximum'];

        if ($lev_cur > $max_lev) {
            $sta_fun_lev_a = $_SESSION['parameters']['stack_function_called_array'];
            print_html_array ($nam, '$sta_fun_lev_a', $sta_fun_lev_a);
            print_fatal_error ($nam, 
            "No recursion and no entering or exiting were missing",
            "Function Stack Level has reached $max_lev in function $nam",
            "Check");
        }

        if ($lev_cur < 1 ) {
            $sta_fun_lev_a = $_SESSION['parameters']['stack_function_called_array'];
            print_html_array ($nam, '$sta_fun_lev_a' , $sta_fun_lev_a);

            print_fatal_error ($nam, 
            "Function Stack Level were greater than 0",
            "Function Stack Level is >$lev_cur< in function $nam",
            "Check");
        }
    }
    else {
        $lev_cur = -1;
    }

    return $lev_cur;
};

function entering_in_function ($str_fun) {
    $here = __FUNCTION__;

    if ( 
        (isset ($_SESSION['parameters']['stack_function_called_array']))
        &&    
        (isset ($_SESSION['parameters']['stack_function_level_dot_list']))
        &&    
        (isset ($_SESSION['parameters']['stack_function_level_maximum']))
    ) {
        $nam_fun = string_first_word_of_string ($str_fun);

        $eol = end_of_line ();

        $prev = end ($_SESSION['parameters']['stack_function_called_array']);

        $lev_cur = management_entering_level_of_name ($nam_fun) ;
        
        $dot_list = $_SESSION['parameters']['stack_function_level_dot_list'];
        $str_poi = substr ($dot_list, 0, $lev_cur);
        
        if (management_is_verbose_of_function_name ($nam_fun)) {

            /* debug ($here, '$nam_fun', $nam_fun); */
            /* debug ($here, '$lev_cur', $lev_cur); */
            /* debug ($here, 'stack_function_called_array', $_SESSION['parameters']['stack_function_called_array']); */
            /* debug ($here, '$prev', $prev); */
            
            if (string_is_empty_of_string ($prev)) {
                print_fatal_error ($here, 
                "function calling >$nam_fun< were defined",
                "it is NOT",
                "Check");
            }
            
            print_d ("\n$str_poi entering  in function " . $str_fun . "\n"); 
            if ($prev == "irp_provide") {
                $pre_pre = ante_previous_function_in_stack ();
                print_d ("\tcalled by " . $prev . " also by " . $pre_pre . "\n"); 
            }
            else {
                print_d ("\tcalled by " . $prev . "\n"); 
            }
        }
    }

    return;
}

function exiting_from_function ($str_fun) {
    $here = __FUNCTION__;

    if ( 
        (isset ($_SESSION['parameters']['stack_function_called_array']))
        &&
        (isset ($_SESSION['parameters']['stack_function_level_dot_list']))
        &&    
        (isset ($_SESSION['parameters']['stack_function_level_maximum']))
    ) {

        $eol = end_of_line ();
        $nam_fun = string_first_word_of_string ($str_fun);

        $lev_cur = count ($_SESSION['parameters']['stack_function_called_array']);
        $dot_list = $_SESSION['parameters']['stack_function_level_dot_list'];
        $str_poi = substr ($dot_list, 0, $lev_cur);

        $nam_top = array_pop ($_SESSION['parameters']['stack_function_called_array']);

        if ( $nam_top != $nam_fun ) {
#            print_html_array ($here . ' called by ' . $nam_fun, ' stack_function_called_array ', $_SESSION['parameters']['stack_function_called_array']);

            warning ($nam_fun,
            "name of current function >$nam_fun< were the top of stack",
            "top of stack >$nam_top<",
            "Check array upper");
        }       

        if (management_is_verbose_of_function_name ($nam_fun)) {
            print_d ("\n$str_poi exiting from function " . $str_fun . "\n"); 
        }
    }     
    
    return;
};

function entering_in_module ($str_mod) {
    $here = __FUNCTION__;

    if ( 
        (isset ($_SESSION['parameters']['stack_function_called_array']))
        &&    
        (isset ($_SESSION['parameters']['stack_function_level_dot_list']))
        &&    
        (isset ($_SESSION['parameters']['stack_function_level_maximum']))
        
    ) {
        $eol = end_of_line ();
        /* print ($here . '>' . $str_mod . '<' . $eol); */
        
        $nam_mod = first_word_of_string ($str_mod);
        
        $prev = end ($_SESSION['parameters']['stack_function_called_array']);
        
        $lev_cur = management_entering_level_of_name ($nam_mod) ;
        
        $dot_list = $_SESSION['parameters']['stack_function_level_dot_list'];
        $str_poi = substr ($dot_list, 0, $lev_cur);
        
        if ($prev == '') {
            print_fatal_error ($here, 
            "module calling >$nam_mod< were defined",
            "it is NOT",
            "Check");
        }
        
        print_d ("\n$str_poi entering  in module " . $str_mod . "\n"); 

        if ($prev == "irp_provide") {
            $pre_pre = ante_previous_function_in_stack ();
            print_d ("\tcalled by " . $prev . " also by " . $pre_pre . "\n"); 
        }
        else {
            print_d ("\tcalled by " . $prev . "\n"); 
        }
    }
    
    return;
}

function exiting_from_module ($str_mod) {
    $here = __FUNCTION__;

    if ( 
        (isset ($_SESSION['parameters']['stack_function_called_array']))
        &&    
        (isset ($_SESSION['parameters']['stack_function_level_dot_list']))
        &&    
        (isset ($_SESSION['parameters']['stack_function_level_maximum']))
    ) {

        $nam_mod = first_word_of_string ($str_mod);

        $lev_cur = count ($_SESSION['parameters']['stack_function_called_array']);
        $dot_list = $_SESSION['parameters']['stack_function_level_dot_list'];
        $str_poi = substr ($dot_list, 0, $lev_cur);
        
        $nam_top = array_pop ($_SESSION['parameters']['stack_function_called_array']);

        if ( $nam_top != $nam_mod ) {

            array_push ($_SESSION['parameters']['stack_function_called_array'], $nam_top);
#            print_html_array ($here, 'stack_function_called_array', $_SESSION['parameters']['stack_function_called_array']);
            warning ($here,
            "name of current module >$nam_mod< were the top of stack",
            "top of stack >$nam_top<",
            "Check");
        }       

        print_d ("\n$str_poi exiting from module " . $str_mod . "\n"); 
        
    }     

    return;
};

function is_cpu ($nam_fun) {
  $here = __FUNCTION__;
/* Do not trace irp stuff */
/* Do not trace user stuff */

  $boo = (substr ($nam_fun, 0, 5) != "user_" )
      && ($_SESSION['is_cpu_active']);
  
  return $boo;
}

function entering_withcpu_in_function ($nam_fun) {
  $here = __FUNCTION__;
  $cpu_in = 0;
  if (is_cpu ($nam_fun)) {
      $cpu_in = microtime(true);
  }    
  
  return $cpu_in;
};

function exiting_withcpu_from_function ($nam_fun, $cpu_in) {
    $here = __FUNCTION__;
    if (is_cpu ($nam_fun)) {
        $time_here = microtime(true);
        $cpu_out = $time_here - $cpu_in;
        print_d ("\ncpu when exiting from function $nam_fun : $cpu_out microseconds\n"); 
        
        $str_cpu = "$cpu_out $nam_fun";
        array_push ($_SESSION['cpu_n_function'], $str_cpu);
    }
    
    return;
};


?>