<?php

function module_name_of_module_fullnameoffile ($fno) {
  
    $fno_arr_a = pathinfo ($fno);
    $nam_mod = $fno_arr_a['filename'];
    
    return $nam_mod;
};

function module_name_of_module_nameoffile ($nof_mod) {
    
    $ind_php = stripos ($nof_mod, '.php');
    $nam_mod = basename (substr ($nof_mod, 0, $ind_php));
    
    return $nam_mod;
}

?>