<?php

require_once "debug_functions.php";

$module = "management_functions";

function is_traced ($nam_fun) {
/* Do not trace irp stuff */
/* Do not trace user stuff */

  $boo = (substr ($nam_fun, 0, 5) != "user_" )
      && ($_SESSION['trace_active']);
  
  return $boo;
}

function entering_in_function ($here) {

    if ( 
        (isset ($_SESSION['parameters']['stack_function_level_array']))
        &&    
        (isset ($_SESSION['parameters']['stack_function_level_points']))
        &&    
        (isset ($_SESSION['parameters']['stack_function_level_maximum']))
        
    ) {
        $prev = end ($_SESSION['parameters']['stack_function_level_array']);
        array_push ($_SESSION['parameters']['stack_function_level_array'], $here);
        
        $lev = count ($_SESSION['parameters']['stack_function_level_array']);
    
        if ($lev > $_SESSION['parameters']['stack_function_level_maximum']) {
            $sta_fun_lev_a = $_SESSION['parameters']['stack_function_level_array'];
            print_html_array ($here,'stack_function_level_array' , $sta_fun_lev_a);
            fatal_error ($here, "<br>Possible recursion or entering or exiting is missing<br>Function Stack Level has reached 50 in function $here");
        }
        
        $points = $_SESSION['parameters']['stack_function_level_points'];
        $str_poi = substr ($points, 0, $lev);
        
        if (is_traced ($here)) {
            print_d ("\n$str_poi entering in function " . $here . "\n"); 
            print_d ("\tcalled by " . $prev . "\n"); 
        }
        
    }
    else {
        if (is_traced ($here)) {
            print_d ("\n$entering in function " . $here . "\n"); 
        }
    }
     
   return;
};


function exiting_from_function ($here) {

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
        $here_ = word_of_ordinal_of_string (1, $here);
        
        #    print_html_scalar ($here, "\$exp_her_ >$exp_her_<", "                               were equal to \$here_ >$here_<");
        
        /* if ($exp_her_ != $here_) { */
        /*     $sta_fun_lev_a = $_SESSION['parameters']['stack_function_level_array']; */
        /*     print_html_array ($here, 'stack_function_level_array' , $sta_fun_lev_a); */
        /*     print_fatal_error ($here, */
        /*     "\$exp_her_ >$exp_her_< were equal to \$here_ >$here_<", */
        /*     "it is NOT", */
        /*     "Check" */
        /*     ); */
        /* } */
    }     
    if (is_traced ($here)) {
        print_d ("\n$str_poi exiting from function " . $here . "\n"); 
    }
    
    else {
        if (is_traced ($here)) {
            print_d ("\n$exiting from function " . $here . "\n"); 
        }
    }
    
    
    return;
};

function entering_in_module ($here) {

    if (is_traced ($here)) {
        print_d ("\n------ entering in module " . $here . " ------\n"); 
    }

    return;
};

function exiting_from_module ($here) {

    if (is_traced ($here)) {
        print_d ("\n======= exiting from module " . $here . " ======\n"); 
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

function entering_withcpu_in_function ($here) {
    if (is_cpu ($here)) {
        $cpu_in = microtime(true);
    }    
    
    return $cpu_in;
};

function exiting_withcpu_from_function ($here, $cpu_in) {

    if (is_cpu ($here)) {
        $time_here = microtime(true);
        $cpu_out = $time_here - $cpu_in;
        print_d ("\ncpu when exiting from function $here : $cpu_out microseconds\n"); 

        $str_cpu = "$cpu_out $here";
        $cpu_a = $_SESSION ['cpu_n_function'];
        array_push ($cpu_a, $str_cpu);
        $_SESSION ['cpu_n_function'] = $cpu_a;
    }

    return;
};


?>