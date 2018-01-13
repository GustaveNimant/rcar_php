<?php

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is a string as a list of name:surname separated by \\n";
$Documentation[$module]['what for'] = "to fill file Surname_catalog.cat";


function surname_catalog_of_surname_by_name_hash ($sur_by_nam_h) {
  $here = __FUNCTION__;
  entering_in_function ($here . " (\$sur_by_nam_h, ...");

  $str_sur = '';
  foreach ($sur_by_nam_h as $nam_ite => $nam_sur) {
      $str_sur .= $nam_ite . " : " . $nam_sur . "\n";
  }

  debug_n_check ($here , '$str_sur', $str_sur);
  exiting_from_function ($here);

  return $str_sur;
}

function surname_catalog_write_of_surname_by_name_hash ($sur_by_nam_h) {
  $here = __FUNCTION__;
  entering_in_function ($here . " (\$sur_by_nam_h [...])");
#  $cpu_in = entering_withcpu_in_function ($here);
    
  $cat_sur = surname_catalog_of_surname_by_name_hash ($sur_by_nam_h);
  $fno_sur = surname_catalog_fullnameoffile_build ();
  file_string_write ($fno_sur, $cat_sur);

  exiting_from_function ($here);
#  exiting_withcpu_from_function ($here, $cpu_in);
  
  return;
}


?>