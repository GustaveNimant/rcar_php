<?php

require_once "module_name_functions.php";
require_once "debug_functions.php";

$module = "management_functions";

function management_is_quiet_of_function_name ($nam_fun) {
  $here = __FUNCTION__;    
    $excluded_first_a = array ('array', 'check', 'now', 'string', 'surname', 'user'); 

    $wor_a = explode ("_", $nam_fun);
    $wor_fir = $wor_a[0];
    
    $boo = in_array ($wor_fir, $excluded_first_a);

    /* $str = string_of_boolean ($boo); */
    /* print "management_is_quiet_of_function_name ($nam_fun) = $str<br>"; */

  return $boo;
}

function management_is_verbose_of_function_name ($nam_fun) {
    $here = __FUNCTION__;
    $is_ver = (isset ($_SESSION['is_verbose'] ) ) &&
        ($_SESSION['is_verbose'] > 0 );

    $is_qui = management_is_quiet_of_function_name ($nam_fun);

    $boo = $is_ver && (! $is_qui) ;

    /* $str = string_of_boolean ($boo); */
    /* print "management_is_verbose_of_function_name ($nam_fun) = $str<br>"; */

  return $boo;
}

function comment_entering_of_function_name ($nam_fun) {
    $here = __FUNCTION__;
    $points = $_SESSION['parameters']['stack_function_level_points'];
    $lev_cur = count ($_SESSION['parameters']['stack_function_level_array']);
    $str_poi = substr ($points, 0, $lev_cur);
    
    $com = "<!-- $str_poi going in function $nam_fun -->\n"; 
    return $com;
};

function comment_exiting_of_function_name ($nam_fun) {
    $here = __FUNCTION__;

    $points = $_SESSION['parameters']['stack_function_level_points'];
    $lev_cur = count ($_SESSION['parameters']['stack_function_level_array']);
    $str_poi = substr ($points, 0, $lev_cur);
    
    $com = "<!-- $str_poi out  off function $nam_fun -->\n"; 
    
    return $com;
};

function management_entering_level_of_name ($nam_fun) {
    $here = __FUNCTION__;

    if ( 
        (isset ($_SESSION['parameters']['stack_function_level_array']))
        &&    
        (isset ($_SESSION['parameters']['stack_function_level_points']))
        &&    
        (isset ($_SESSION['parameters']['stack_function_level_maximum']))
        
    ) {
        
        array_push ($_SESSION['parameters']['stack_function_level_array'], $nam_fun);
        
        $lev_cur = count ($_SESSION['parameters']['stack_function_level_array']);
        $max_lev = $_SESSION['parameters']['stack_function_level_maximum'];

        if ($lev_cur > $max_lev) {
            $sta_fun_lev_a = $_SESSION['parameters']['stack_function_level_array'];
            print_html_array ($nam_fun, '$sta_fun_lev_a', $sta_fun_lev_a);
            print_fatal_error ($nam_fun, 
            "No recursion and no entering or exiting were missing",
            "Function Stack Level has reached $max_lev in function $nam_fun",
            "Check");
        }

        if ($lev_cur < 1 ) {
            $sta_fun_lev_a = $_SESSION['parameters']['stack_function_level_array'];
            print_html_array ($nam_fun, '$sta_fun_lev_a' , $sta_fun_lev_a);

            print_fatal_error ($nam_fun, 
            "Function Stack Level were greater than 0",
            "Function Stack Level is >$lev_cur< in function $nam_fun",
            "Check");
        }
    }
    
    return $lev_cur;
};

function entering_in_function ($str_fun) {
    $here = __FUNCTION__;

    $nam_fun = string_first_word_of_string ($str_fun);

    $lev_cur = management_entering_level_of_name ($nam_fun) ;

    $points = $_SESSION['parameters']['stack_function_level_points'];
    $str_poi = substr ($points, 0, $lev_cur);
        
    if (management_is_verbose_of_function_name ($nam_fun)) {
        $prev = current ($_SESSION['parameters']['stack_function_level_array']);

        if (string_is_empty_of_string ($prev)) {
            print_fatal_error ($here, 
            "function calling >$nam_fun< were defined",
            "it is NOT",
            "Check");
        }

        print_d ("\n$str_poi entering  in function " . $str_fun . "\n"); 
        print_d ("\tcalled by " . $prev . "\n"); 
    }

    return;
}

function exiting_from_function ($str_fun) {
    $here = __FUNCTION__;

    $nam_fun = string_first_word_of_string ($str_fun);

    if ( 
        (isset ($_SESSION['parameters']['stack_function_level_array']))
        &&    
        (isset ($_SESSION['parameters']['stack_function_level_points']))
        &&    
        (isset ($_SESSION['parameters']['stack_function_level_maximum']))
        
    ) {

        $lev_cur = count ($_SESSION['parameters']['stack_function_level_array']);
        $points = $_SESSION['parameters']['stack_function_level_points'];
        $str_poi = substr ($points, 0, $lev_cur);
        
        $nam_top = array_pop ($_SESSION['parameters']['stack_function_level_array']);

        if ( $nam_top != $nam_fun ) {
            print_fatal_error ($here,
            "name of current function >$nam_fun< were the same as top of stack",
            "top of stack >$nam_top<",
            "Check");
        }       

        if (management_is_verbose_of_function_name ($nam_fun)) {
            print_d ("\n$str_poi exiting from function " . $str_fun . "\n"); 
        }
        
        else {
            if (management_is_verbose_of_function_name ($nam_fun)) {
                print_d ("\n$exiting from function " . $str_fun . "\n"); 
            }
        }
    }     
    
    return;
};

function entering_in_module ($str_mod) {
    $here = __FUNCTION__;

    $nam_mod = string_first_word_of_string ($str_mod);

    if ( 
        (isset ($_SESSION['parameters']['stack_function_level_array']))
        &&    
        (isset ($_SESSION['parameters']['stack_function_level_points']))
        &&    
        (isset ($_SESSION['parameters']['stack_function_level_maximum']))
        
    ) {
        
        $lev_cur = management_entering_level_of_name ($nam_mod) ;
        
        $points = $_SESSION['parameters']['stack_function_level_points'];
        $str_poi = substr ($points, 0, $lev_cur);
        
        $prev = current ($_SESSION['parameters']['stack_function_level_array']);
        
        if (string_is_empty_of_string ($prev)) {
            print_fatal_error ($here, 
            "module calling >$nam_mod< were defined",
            "it is NOT",
            "Check");
        }
        
        print_d ("\n$str_poi entering  in module " . $str_mod . "\n"); 
        print_d ("\tcalled by " . $prev . "\n"); 
        
    }
    
    return;
}

function exiting_from_module ($str_mod) {
    $here = __FUNCTION__;

    $nam_mod = string_first_word_of_string ($str_mod);

    if ( 
        (isset ($_SESSION['parameters']['stack_function_level_array']))
        &&    
        (isset ($_SESSION['parameters']['stack_function_level_points']))
        &&    
        (isset ($_SESSION['parameters']['stack_function_level_maximum']))
        
    ) {

        $lev_cur = count ($_SESSION['parameters']['stack_function_level_array']);
        $points = $_SESSION['parameters']['stack_function_level_points'];
        $str_poi = substr ($points, 0, $lev_cur);
        
        $nam_top = array_pop ($_SESSION['parameters']['stack_function_level_array']);

        if ( $nam_top != $nam_mod ) {
            print_fatal_error ($here,
            "name of current module >$nam_mod< were the same as top of stack",
            "top of stack >$nam_top<",
            "Check");
        }       

        print_d ("\n$str_poi exiting from function " . $str_mod . "\n"); 
        
    }     

    return;
};

function is_cpu ($nam_fun) {
  $here = __FUNCTION__;
/* Do not trace irp stuff */
/* Do not trace user stuff */

  $boo = (substr ($nam_fun, 0, 5) != "user_" )
      && ($_SESSION['cpu_active']);
  
  return $boo;
}

function entering_withcpu_in_function ($nam_fun) {
  $here = __FUNCTION__;
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
        $cpu_a = $_SESSION ['cpu_n_function'];
        array_push ($cpu_a, $str_cpu);
        $_SESSION ['cpu_n_function'] = $cpu_a;
    }

    return;
};


?>