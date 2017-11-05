<?php

require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is a string as a list of name:surname separated by \\n";
$Documentation[$module]['what for'] = "to fill file Surname_catalog.cat";

entering_in_module ($module);

function surname_catalog_fullnameoffile_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $fdi_ser = $_SESSION['parameters']['absolute_path_server'];
  debug_n_check ($here , '$fdi_ser', $fdi_ser);
  $nof_sur = 'Surname_catalog.cat';
  $fno_sur = $fdi_ser . '/SURNAMES/' . $nof_sur;

  $mod_scr = entity_name_of_build_function_name ($here);
  father_n_son_stack_entity_push_of_father_of_son ($mod_scr, "READ_$mod_scr");

  debug_n_check ($here , '$fno_sur', $fno_sur);
  exiting_from_function ($here);

  return $fno_sur;
}

function surname_catalog_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
#    $cpu_in = entering_withcpu_in_function ($here);
    
    $fno_sur = irp_provide ('surname_catalog_fullnameoffile', $here);
    $cat_sur = file_content_read_of_fullnameoffile ($fno_sur);
    
#    debug_n_check ($here , '$cat_sur', ">$cat_sur<");
    
    exiting_from_function ($here);
#    exiting_withcpu_from_function ($here, $cpu_in);
    
    return $cat_sur;
}

exiting_from_module ($module);

?>