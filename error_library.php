<?php

require_once "file_library.php";
require_once "language_translate_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

function html_warning ($her, $la_mes){
    $here = __FUNCTION__; 

    $en_tx1 = 'warning';
    $la_tx1 = language_translate_of_en_string ($en_tx1);
    $la_Tx1 = string_html_capitalized_of_string ($la_tx1);

    $en_tx2 = 'in';
    $la_tx2 = language_translate_of_en_string ($en_tx2);

    $html_str  = '';
    $html_str .= '<html>' . "\n";
    $html_str .= '  <body>' . "\n";
    $html_str .= '     <b><font color=green>' . $la_Tx1 .'</font></b> ';
    $html_str .= $la_tx2 . "\n";
    $html_str .= '<i>';
    $html_str .= $her;
    $html_str .= '</i> ' . "\n";
    $html_str .= $la_mes;
    $html_str .= '  </body>';
    $html_str .= '</html>';
    $html_str .= '<br>';

    return $html_str;
}

function warning ($where, $la_mes){
    $here = __FUNCTION__; 

    $html_str = html_warning ($where, $la_mes);
#    print $html_str;
    print_d ($html_str);

    file_log_write ($where, 'Warning : ' . $la_mes);
    return;
}

function print_warning ($her, $mes_exp, $mes_fou, $mes_cur){
    $here = __FUNCTION__; 

    $en_mes  = '<br>';
    $en_mes .= '&nbsp;Expecting : ' . $mes_exp . '<br> '; 
    $en_mes .= '&nbsp;Found : ' . $mes_fou . '<br> '; 
    $en_mes .= '&nbsp;Cure : ' . $mes_cur;
    
    $html_str = warning ($her, $en_mes);

    print $html_str;
    return;
}

function html_fatal_error ($her, $en_mes){
    $here = __FUNCTION__; 

    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<html>' . "\n";
    $html_str .= '  <body>' . "\n";
    $html_str .= '     <b><font color=red>Fatal Error</font></b> ';
    $html_str .= 'in ' . "\n";
    $html_str .= '<i>';
    $html_str .= $her;
    $html_str .= '</i> ' . "\n";
    $html_str .= $en_mes;
    $html_str .= '  </body>';
    $html_str .= '</html>';
    $html_str .= comment_exiting_of_function_name ($here);

    return $html_str;
}

function print_fatal_error ($her, $mes_exp, $mes_fou, $mes_cur){
    $here = __FUNCTION__; 

    $en_mes  = '<br>';
    $en_mes .= '&nbsp;Expecting : ' . $mes_exp . '<br> '; 
    $en_mes .= '&nbsp;Found : ' . $mes_fou . '<br> '; 
    $en_mes .= '&nbsp;Cure : ' . $mes_cur;
    
    $html_str = html_fatal_error ($her, $en_mes);

    print $html_str;

    print '<br><br>Backtrace is:';
 
    print '<pre> ';
    debug_print_backtrace(); 
    flush ();
    print '</pre> ';
    
    die ();
    return;
}

?>