<?php

function is_on_web () {
    $boo = isset ($_SERVER['REMOTE_ADDR']);
    return $boo;
}

function user_ip () {
    if (is_on_web ()) {
        $usr_ip = $_SERVER['REMOTE_ADDR'];
    }
    else {
        $usr_ip = "None";
    }
    return $usr_ip;
}

function end_of_line () {
    if (is_on_web ()) {
        $eol = '<br>';
    }
    else {
        $eol = "\n";
    }
    return $eol;
}

?>