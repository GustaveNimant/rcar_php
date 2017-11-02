<?php

require_once "irp_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function block_new_create_surname_inputtypetext_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $kin_blo = irp_provide ('entry_block_kind', $here);
  $en_nam_blo = 'enter the name of the ' . $kin_blo;
  $la_nam_blo = ucfirst (language_translate_of_en_string ($en_nam_blo));

  $nam = 'block_new_surname';
  $html_str  = '';
  $html_str .= '<input ' . "\n";
  $html_str .= 'type="text" '; 
  $html_str .= 'name="block_new_surname" size="40" placeholder="';
  $html_str .= $la_nam_blo . "\n";
  $html_str .= '"> ';

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>