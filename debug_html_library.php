<?php

function print_html_scalar ($her, $mes, $var){	

  print "<pre>in $her : ";	
  print "$mes<br>";
  print "$var<br>";
  print '</pre> ';

}

function string_html_shorten_of_key_of_string ($key, $str_big){	
    $here = __FUNCTION__;
    
    if ( 
        (! is_substring_of_substring_off_string ("<html>", $str_big))
        && (! is_substring_of_substring_off_string ("<input", $str_big))
        && (! is_substring_of_substring_off_string ("<textarea", $str_big))
        && (! is_substring_of_substring_off_string ("<link", $str_big))
        && (! is_substring_of_substring_off_string ("<select", $str_big))
        && (! is_substring_of_substring_off_string ("/textarea>", $str_big))
        && (! is_substring_of_substring_off_string ("<div", $str_big))
        && (! is_substring_of_substring_off_string ("/div>", $str_big))
        && (! is_substring_of_substring_off_string ("<a href", $str_big))
        && (! is_substring_of_substring_off_string ("<span", $str_big))
        && (! is_substring_of_substring_off_string ("/span>", $str_big))
    ){
        $str_cut = " [$key] => $str_big<br>";
    }
    else {
        $max_len = $_SESSION['parameters']['printed_html_string_max_size'];
        $len = strlen ($str_big);
        if ($len < $max_len ) {
            $str_cut = $str_big;
        }
        else {
            $str_cut = substr ($str_big, 0, $max_len);
        }
    }

    return $str_cut;
}

function print_html_array ($where, $mes, $var_a){	
    $eol = end_of_line ();;

    if (is_array ($var_a)) {

        print "<pre>in $where :";
        print "$mes :$eol";
        print_r ($var_a);
        print "</pre>$eol";

        /* $html_str  = ''; */
        /* $html_str .= "<pre>in $her :";	 */
        /* $html_str .= "$mes" . $eol; */
        /* $html_str .= string_html_of_array ($her, $mes, $var_a); */
        /* $html_str .= "</pre>";	 */
        /* print $html_str; */

    }
    else {
        print_fatal_error ($where, 
        "argument were an array",
        "it is NOT",
        "Check");
    }

}

function print_html_variable ($where, $mes, $var){	

    if (is_array ($var)) {
        print_html_array ($where, $mes, $var);
    }
    else {
        print_html_scalar ($where, $mes, $var);
    }
}

?>