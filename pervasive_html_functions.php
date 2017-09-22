<?php

require_once "array_functions.php";
require_once "common_html_functions.php";
require_once "clean_functions.php";
require_once "entry_information_functions.php";
require_once "git_command_functions.php";
require_once "language_selection_functions.php";
require_once "label_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

# entering_in_module ($module);

function pervasive_html_Auto_Regulated_Collaborative_Editing_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  switch ($lan) {
  case 'en' :
      $html_str = '<b>A</b><i>uto-</i><b>R</b><i>egulated</i> <b>C</b><i>ollaborative</i> <b>E</b><i>diting</i> ';
      break;
  case 'fr' :
      $html_str = '<b>R</b><i>&eacute;daction</i> <b>C</b><i>ollaborative</i> <b>A</b><i>uto-</i><b>R</b><i>&eacute;gul&eacute;e</i>';
      break;
  }

#  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function pervasive_html_initial_section_build (){
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    /* $path =  $_SERVER['PHP_SELF']; */
    /* $http = basename($path); */
    
    $nam_pro = $_SESSION['parameters']['program_name'];
    $NAM_PRO = strtoupper ($nam_pro);
    
    $pag_hea = irp_provide ('common_html_page_head', $here); 
    $ARCE    = irp_provide ('pervasive_html_Auto_Regulated_Collaborative_Editing', $here);
    $pag_ini = irp_provide ('label_html_initial_section', $here);
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= $pag_hea;
    
    $html_str .= '<table> ' . "\n";

    $html_str .= ' <tr> ' . "\n";
    $html_str .= '  <td rowspan="3">' . "\n";
    $html_str .= '   <header_sitename> ' . "\n";
    $html_str .= $NAM_PRO . "\n";
    $html_str .= '   </header_sitename> ' . "\n";
    $html_str .= '  </td> ' . "\n";
    
    $html_str .= '  <td colspan="6">' . "\n";
    $html_str .= $ARCE . "\n";
    $html_str .= '  </td>' . "\n";
    $html_str .= ' </tr>' . "\n";
    $html_str .= $pag_ini;

    $html_str .= '</table>' . "\n";

    $html_str .= comment_exiting_of_function_name ($here);
    $html_str .= "\n";
    $html_str .= '<!-- === end of page header === -->' . "\n";
    $html_str .= "\n";
    
    #  debug_n_check ($here , '$html_str', $html_str);
    exiting_from_function ($here);

    return $html_str;

}

function pervasive_html_final_section_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str = '';
  $pag_tai = irp_provide ('common_html_page_tail', $here);
  $html_str .= $pag_tai;

  exiting_from_function ($here);

  return $html_str;
}

# exiting_from_module ($module);

?>