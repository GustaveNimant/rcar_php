<?php

require_once "management_functions.php";
require_once "irp_functions.php";
require_once "array_functions.php";

$module = "surname_catalog_functions";
# entering_in_module ($module);

$Documentation[$module]['surname_catalog'] = "it is a string as a list of name:surname separated by \\n";
$Documentation[$module]['Surname_catalog.cat'] = "it is the nameoffile where the surname_catalog is dumped";

function surname_catalog_fullnameoffile_make () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $fdi_ser = $_SESSION['parameters']['absolute_path_server'];
  debug_n_check ($here , '$fdi_ser', $fdi_ser);
  $nof_sur = 'Surname_catalog.cat';
  $fno_sur = $fdi_ser . '/SURNAMES/' . $nof_sur;

  debug_n_check ($here , '$fno_sur', $fno_sur);
  exiting_from_function ($here);

  return $fno_sur;
}

function surname_catalog_of_surname_by_name_array ($sur_by_nam_a) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($sur_by_nam_a[0], ...");

  $str_sur = "";
  foreach ($sur_by_nam_a as $nam_ite => $nam_sur) {
      $str_sur .= $nam_ite . " : " . $nam_sur . "\n";
  }

  debug_n_check ($here , '$str_sur', $str_sur);
  exiting_from_function ($here);

  return $str_sur;
}

function surname_catalog_write_of_surname_by_name_array ($sur_by_nam_a) {
  $here = __FUNCTION__;
  entering_in_function ($here . " (\$sur_by_nam_a [...])");
  $cpu_in = entering_withcpu_in_function ($here);
    
  $cat_sur = surname_catalog_of_surname_by_name_array ($sur_by_nam_a);
  $fno_sur = surname_catalog_fullnameoffile_make ();
  file_string_write ($fno_sur, $cat_sur);

  exiting_from_function ($here);
  exiting_withcpu_from_function ($here, $cpu_in);
  
  return;
}

function surname_catalog_read () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    $cpu_in = entering_withcpu_in_function ($here);
    
    $fno_sur = surname_catalog_fullnameoffile_make ();
    $cat_sur = file_content_read ($fno_sur);
    
    debug_n_check ($here , '$cat_sur', $cat_sur);
    
    exiting_from_function ($here);
    exiting_withcpu_from_function ($here, $cpu_in);
    
    return $cat_sur;
}

?>