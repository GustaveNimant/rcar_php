<?php

require_once "irp_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "the html textarea to get new item justification"; 
$Documentation[$module]['what for'] = "to set it into \$_GET"; 

entering_in_module ($module);

function item_new_create_justification_textarea_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $kin_blo = irp_provide ('entry_block_kind', $here);
  $en_pla = 'enter the text of the ' . $kin_blo;
  
  $html_str  = textarea_of_get_key_of_en_placeholder ('item_new_justification', $en_pla, '  ');

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>