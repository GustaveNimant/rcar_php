<?php

require_once "module_name_functions.php";
require_once "debug_functions.php";

$module = "management_functions";

function management_is_quiet_of_function_name ($nam_fun) {
    
    $wor_a = explode ("_", $nam_fun);
    $wor_fir = $wor_a[0];
    switch ($wor_fir) {
    case 'user' :
        $is_qui = true;
        break;
    case 'array' :
        $is_qui = true;
        break;
    case 'file' :
        $is_qui = true;
        break;
    case 'now' :
        $is_qui = true;
        break;
    default:
        $is_qui = false;
    }

    /* $str = string_of_boolean ($is_qui); */
    /* print "management_is_quiet_of_function_name ($nam_fun) = $str<br>"; */

  return $is_qui;
}

function management_is_tracable_of_function_name ($nam_fun) {
    
    $tra_ok = (isset ($_SESSION['trace_active'] ) ) &&
        ($_SESSION['trace_active'] > 0 );

    $is_qui = management_is_quiet_of_function_name ($nam_fun);

    $boo = $tra_ok && (! $is_qui) ;

    /* $str = string_of_boolean ($boo); */
    /* print "management_is_tracable_of_function_name ($nam_fun) = $str<br>"; */

  return $boo;
}

function comment_entering_of_function_name ($nam_fun) {

    $points = $_SESSION['parameters']['stack_function_level_points'];
    $lev_cur = count ($_SESSION['parameters']['stack_function_level_array']);
    $str_poi = substr ($points, 0, $lev_cur);
    
    $com = "<!-- $str_poi entering  in function $nam_fun -->\n"; 

    return $com;
};

function comment_exiting_of_function_name ($nam_fun) {

    $points = $_SESSION['parameters']['stack_function_level_points'];
    $lev_cur = count ($_SESSION['parameters']['stack_function_level_array']);
    $str_poi = substr ($points, 0, $lev_cur);
    
    $com = "<!-- $str_poi exiting from function $nam_fun -->\n"; 
    
    return $com;
};

function entering_in_function ($nam_fun) {

    if ( 
        (isset ($_SESSION['parameters']['stack_function_level_array']))
        &&    
        (isset ($_SESSION['parameters']['stack_function_level_points']))
        &&    
        (isset ($_SESSION['parameters']['stack_function_level_maximum']))
        
    ) {
        $prev = end ($_SESSION['parameters']['stack_function_level_array']);
        array_push ($_SESSION['parameters']['stack_function_level_array'], $nam_fun);
        
        $lev = count ($_SESSION['parameters']['stack_function_level_array']);
        $max_lev = $_SESSION['parameters']['stack_function_level_maximum'];

        if ($lev > $_SESSION['parameters']['stack_function_level_maximum']) {
            $sta_fun_lev_a = $_SESSION['parameters']['stack_function_level_array'];
            print_html_array ($nam_fun,'stack_function_level_array' , $sta_fun_lev_a);
            print_fatal_error ($nam_fun, 
            "No recursion and no entering or exiting were missing",
            "Function Stack Level has reached $max_lev in function $nam_fun",
            "Check");
        }
        if ($lev < 1 ) {
            $sta_fun_lev_a = $_SESSION['parameters']['stack_function_level_array'];
            print_html_array ($nam_fun,'stack_function_level_array' , $sta_fun_lev_a);

            print_fatal_error ($nam_fun, 
            "Function Stack Level were greater than 0",
            "Function Stack Level is >$lev< in function $nam_fun",
            "Check");
        }
        $points = $_SESSION['parameters']['stack_function_level_points'];
        $str_poi = substr ($points, 0, $lev);
        
        if (management_is_tracable_of_function_name ($nam_fun)) {
            print_d ("\n$str_poi entering  in function " . $nam_fun . "\n"); 
            print_d ("\tcalled by " . $prev . "\n"); 
        }
        
    }
    else {
        if (management_is_tracable_of_function_name ($nam_fun)) {
            print_d ("\n$entering in function " . $nam_fun . "\n"); 
        }
    }
     
   return;
};


function exiting_from_function ($nam_fun) {

    if ( 
        (isset ($_SESSION['parameters']['stack_function_level_array']))
        &&    
        (isset ($_SESSION['parameters']['stack_function_level_points']))
        &&    
        (isset ($_SESSION['parameters']['stack_function_level_maximum']))
        
    ) {

        $lev = count ($_SESSION['parameters']['stack_function_level_array']);
        $points = $_SESSION['parameters']['stack_function_level_points'];
        $str_poi = substr ($points, 0, $lev);
        
        $exp_her = array_pop ($_SESSION['parameters']['stack_function_level_array']);
        
        $exp_her_ = word_of_ordinal_of_string (1, $exp_her);
        $nam_fun_ = word_of_ordinal_of_string (1, $nam_fun);
        
        #    print_html_scalar ($nam_fun, "\$exp_her_ >$exp_her_<", "                               were equal to \$nam_fun_ >$nam_fun_<");
        
        /* if ($exp_her_ != $nam_fun_) { */
        /*     $sta_fun_lev_a = $_SESSION['parameters']['stack_function_level_array']; */
        /*     print_html_array ($nam_fun, 'stack_function_level_array' , $sta_fun_lev_a); */
        /*     print_fatal_error ($nam_fun, */
        /*     "\$exp_her_ >$exp_her_< were equal to \$nam_fun_ >$nam_fun_<", */
        /*     "it is NOT", */
        /*     "Check" */
        /*     ); */
        /* } */
    }     
    if (management_is_tracable_of_function_name ($nam_fun)) {
        print_d ("\n$str_poi exiting from function " . $nam_fun . "\n"); 
    }
    
    else {
        if (management_is_tracable_of_function_name ($nam_fun)) {
            print_d ("\n$exiting from function " . $nam_fun . "\n"); 
        }
    }
    
    
    return;
};

function entering_in_module ($nam_fun) {

    if (management_is_tracable_of_function_name ($nam_fun)) {
        print_d ("\n------ entering in module " . $nam_fun . " ------\n"); 
    }

    return;
};

function exiting_from_module ($nam_fun) {

    if (management_is_tracable_of_function_name ($nam_fun)) {
        print_d ("\n======= exiting from module " . $nam_fun . " ======\n"); 
    }

    return;
};

function is_cpu ($nam_fun) {
/* Do not trace irp stuff */
/* Do not trace user stuff */

  $boo = (substr ($nam_fun, 0, 5) != "user_" )
      && ($_SESSION['cpu_active']);
  
  return $boo;
}

function entering_withcpu_in_function ($nam_fun) {
    if (is_cpu ($nam_fun)) {
        $cpu_in = microtime(true);
    }    
    
    return $cpu_in;
};

function exiting_withcpu_from_function ($nam_fun, $cpu_in) {

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