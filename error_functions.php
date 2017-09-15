<?php

require_once "file_functions.php";

$module = module_name (__FILE__);

function warning ($her, $en_mes){
    $lan = $_SESSION['parameters']['language'];

/* Improve content of $en_mes has variable names */
    $en_txt = 'warning in';
    $la_txt = language_translate_of_en_string_of_language ($en_txt, $lan); 

    /* $la_mes = language_translate_of_en_string_of_language ($en_mes, $lan);  */

    $la_Txt = string_html_capitalized_of_string ($la_txt);
    print ('<br>' . $la_Txt . ' : ' . $her . '<br> ' . $en_mes . '<br> ');

    return;
}

function fatal_error ($her, $mes){

    $html_str  = '';
    $html_str .= '<html>' . "\n";
    $html_str .= '  <body>' . "\n";
    $html_str .= '     <b><font color=red>Fatal Error</font></b> ';
    $html_str .= 'in ' . "\n";
    $html_str .= '<i>';
    $html_str .= $her;
    $html_str .= '</i> ' . "\n";
    $html_str .= $mes;
    $html_str .= '  </body>';
    $html_str .= '</html>';

    return $html_str;
}

function print_fatal_error ($her, $mes_exp, $mes_fou, $mes_cur){

    $mes  = '<br>';
    $mes .= '&nbsp;Expecting : ' . $mes_exp . '<br> '; 
    $mes .= '&nbsp;Found : ' . $mes_fou . '<br> '; 
    $mes .= '&nbsp;Cure : ' . $mes_cur;
    
    $html_str = fatal_error ($her, $mes);

    print $html_str;

    print '<br><br>Backtrace is:';
 
    print '<pre> ';
    debug_print_backtrace(); 
    flush ();
    print '</pre> ';

    die ();
}

?>