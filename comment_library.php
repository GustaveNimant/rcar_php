<?php
require_once "session_hash_initialize_hash.php";

function comment_entering_of_function_name ($nam_fun) {
    $here = __FUNCTION__;

    if ($_SESSION['is_comment_html_active']) {
        $dot_list = $_SESSION['parameters']['stack_function_level_dot_list'];
        $lev_cur = count ($_SESSION['parameters']['stack_function_called_array']);
        $str_poi = substr ($dot_list, 0, $lev_cur);
        
        $com = "<!-- $str_poi going in function $nam_fun -->\n";
    }
    else { 
        $com = "";
    }
    return $com;
};

function comment_exiting_of_function_name ($nam_fun) {
    $here = __FUNCTION__;

    if ($_SESSION['is_comment_html_active']) {
        $dot_list = $_SESSION['parameters']['stack_function_level_dot_list'];
        $lev_cur = count ($_SESSION['parameters']['stack_function_called_array']);
        $str_poi = substr ($dot_list, 0, $lev_cur);
        
        $com = "<!-- $str_poi out  off function $nam_fun -->\n"; 
    }
    else { 
        $com = "";
    }
    
    return $com;
};

?>