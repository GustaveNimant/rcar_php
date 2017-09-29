<?php

function print_html_scalar ($her, $mes, $var){	

  print "<pre>in $her :";	
  print "$mes<br>";
  print "$var<br>";
  print '</pre> ';

}

function string_html_of_array ($var_a){	
    $here = __FUNCTION__;
    
    $html_str = '';
    if (isset ($var_a) ) {
        if (is_array ($var_a)) {
            foreach ($var_a as $key => $val) {
                if ( 
                    (! is_substring_of_substring_off_string ("<html>", $val))
                    && (! is_substring_of_substring_off_string ("<input", $val))
                    && (! is_substring_of_substring_off_string ("<textarea", $val))
                    && (! is_substring_of_substring_off_string ("<link", $val))
                    && (! is_substring_of_substring_off_string ("<select", $val))
                    && (! is_substring_of_substring_off_string ("/textarea>", $val))
                    && (! is_substring_of_substring_off_string ("<div", $val))
                    && (! is_substring_of_substring_off_string ("/div>", $val))
                    && (! is_substring_of_substring_off_string ("<a href", $val))
                    && (! is_substring_of_substring_off_string ("<span", $val))
                    && (! is_substring_of_substring_off_string ("/span>", $val))
                ){
                    $html_str .= " [$key] => $val<br>";
                }
                else {
                    $max_len = $_SESSION['parameters']['printed_html_string_max_size'];
                    $len = strlen ($val);
                    if ($len < $max_len ) {
                        $html_str .= " [$key] => $val<br>";
                    }
                    else {
                        $val_cut = substr ($val, 0, $max_len);
                        $html_str .= " [$key] => $val_cut<br>";
                    }
                }
            }
        }
    }

    return $html_str;
}

function string_html_of_variable ($var){

    if (is_array ($var)) {
        $html_str = string_html_of_array ($var);
    }
    else {
        $html_str = $var;
    }
    
    return $html_str;
}

function print_html_array ($her, $mes, $var_a){	
    $html_str  = '';
    $html_str .= "<pre>in $her :";	
    $html_str .= "$mes<br>";
    $html_str .= string_html_of_array ($her, $mes, $var_a);

    print $html_str;
}

function print_html_variable ($her, $mes, $var){	
    $html_str  = '';
    $html_str .= "<pre>in $her :";	
    $html_str .= "$mes<br>";
    $html_str .= string_html_of_variable ($var);
    $html_str .= "<br>";	
    $html_str .= "</pre>";
	
    print $html_str;
}

?>