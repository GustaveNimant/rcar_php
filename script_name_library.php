<?php

function script_name_of_script_fullnameoffile ($fno) {
    $here = __FUNCTION__;
    $fno_arr_a = pathinfo ($fno);
    $nam_scr = $fno_arr_a['filename'];
    
    return $nam_scr;
};

function script_name_of_script_nameoffile ($nof_mod) {
    $here = __FUNCTION__;    
    $ind_php = stripos ($nof_mod, '.php');
    $nam_scr = basename (substr ($nof_mod, 0, $ind_php));
    
    return $nam_scr;
}

function entity_name_of_script_name ($nam_scr) {
    $here = __FUNCTION__;    
    $nam_entity = str_replace ('_script', '', $nam_scr);
    
    return $nam_entity;
}

function entity_name_of_script_fullnameoffile ($fno) {
    $here = __FUNCTION__;    
    $nam_scr = script_name_of_script_fullnameoffile ($fno);
    $nam_entity = entity_name_of_script_name ($nam_scr);
    
    return $nam_entity;
}

?>