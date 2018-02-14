<?php

function before_year_html_make () {
    
    $cur_y = date ("Y");

    $html_str  = '';
    $html_str .= '<select name="before_year">';
    
    $count = $cur_y;
    while ($count >= 2010) {
        $html_str .= '<option>' . $count;
        $html_str .= '</option>';
        $count = $count - 1;
    }

    $html_str .= '</select>';

    return $html_str;
}

function before_month_html_make () {

    $cur_m = date ("m");

    $html_str  = '';
    $html_str .= '<select name="before_month">';
    
    $count = 1;
    while ($count <= 12) {
        if ($count == $cur_m) {
            $html_str .= '<option selected="selected">' . $count;
        }
        else {
            $html_str .= '<option>' . $count;
        }
        $html_str .= '</option>';
        $count = $count + 1;
    }

    $html_str .= '</select>';

    return $html_str;
}

function before_day_html_make () {

    $cur_d = date ("d");

    $html_str  = '';
    $html_str .= '<select name="before_day">';
    
    $count = 1;
    while ($count <= 31) {
        if ($count == $cur_d) {
            $html_str .= '<option selected="selected">' . $count;
        }
        else {
            $html_str .= '<option>' . $count;
        }
        $html_str .= '</option>';
        $count = $count + 1;
    }

    $html_str .= '</select>';

    return $html_str;
}

function before_date_html_make () {

    $html_str  = '';
    
    $html_str .= '<td>';
    $html_str .= 'before :';
    $html_str .= '</td>';
    $html_str .= '<td>';
    $html_str .= before_year_html_make ();
    $html_str .= '</td>';
    $html_str .= '<td>';
    $html_str .= before_month_html_make ();
    $html_str .= '</td>';
    $html_str .= '<td>';
    $html_str .= before_day_html_make ();
    $html_str .= '</td>';
    
    return $html_str;
        
}

function since_year_html_make () {
    
    $cur_y = date ("Y");
    
    $html_str  = '';
    $html_str .= '<select name="since_year">';
    
    $count = 2016;
    while ($count >= 2010) {
        $html_str .= '<option>' . $count;
        $html_str .= '</option>';
        $count = $count - 1;
    }
    
    $html_str .= '</select>';
    
    return $html_str;
}

function since_month_html_make () {
    
    $html_str  = '';
    $html_str .= '<select name="since_month">';
    
    $count = 1;
    while ($count <= 12) {
        $html_str .= '<option>' . $count;
        
        $html_str .= '</option>';
        $count = $count + 1;
    }
    
    $html_str .= '</select>';
    
    return $html_str;
}

function since_day_html_make () {
    
    $html_str  = '';
    $html_str .= '<select name="since_day">';
    
    $count = 1;
    while ($count <= 31) {
        $html_str .= '<option>' . $count;
        $html_str .= '</option>';
        $count = $count + 1;
    }
    
    $html_str .= '</select>';
    
    return $html_str;
}

function since_date_html_make () {

    $html_str  = '';
    $html_str .= '<td>';
    $html_str .= 'since :';
    $html_str .= '</td>';
    $html_str .= '<td>';
    $html_str .= since_year_html_make ();
    $html_str .= '</td>';
    $html_str .= '<td>';
    $html_str .= since_month_html_make ();
    $html_str .= '</td>';
    $html_str .= '<td>';
    $html_str .= since_day_html_make ();
    $html_str .= '</td>';
    
    return $html_str;
        
}

?>