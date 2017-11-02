<?php

function module_name_of_module_fullnameoffile ($fno) {
    $here = __FUNCTION__;
    $fno_arr_a = pathinfo ($fno);
    $nam_mod = $fno_arr_a['filename'];
    
    return $nam_mod;
};

function module_name_of_module_nameoffile ($nof_mod) {
    $here = __FUNCTION__;    
    $ind_php = stripos ($nof_mod, '.php');
    $nam_mod = basename (substr ($nof_mod, 0, $ind_php));
    
    return $nam_mod;
}

function module_name_of_module_functions_fullnameoffile ($fno) {
    $here = __FUNCTION__;    
    $nam_mod = module_name_of_module_fullnameoffile ($fno) ;
    $ind_php = stripos ($nam_mod, '_functions');
    $nam_mod_scr = (substr ($nam_mod, 0, $ind_php));
    
    return $nam_mod_scr;
}

function entity_name_of_module_name ($nam_mod) {
    $here = __FUNCTION__;    
    $nam_entity = str_replace ('_script', '', $nam_mod);
    
    return $nam_entity;
}

function entity_name_of_module_script_fullnameoffile ($fno) {
    $here = __FUNCTION__;    
    $nam_mod = module_name_of_module_fullnameoffile ($fno) ;
    $ind_php = stripos ($nam_mod, '_script');
    $nam_entity = (substr ($nam_mod, 0, $ind_php));
    
    return $nam_entity;
}

function entity_name_of_build_function_name ($nam_fun) {
    $here = __FUNCTION__;    
    $nam_mod = str_replace ('_build', '', $nam_fun);
    return $nam_mod;
}

?>