<?php

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

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

function pervasive_page_header_build (){
    $here = __FUNCTION__;
    entering_in_function ($here);
    
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

function pervasive_creativecommons_url_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

    $lan = $_SESSION['parameters']['language'];

    switch ($lan) {
    case 'en' :
        $url = 'https://creativecommons.org/licenses/by-sa/3.0/legalcode';
        break;
    case 'fr' :
        $url = 'https://creativecommons.org/licenses/by-sa/3.0/legalcode.fr';
        break;
    case 'it' :
        $url = 'https://creativecommons.org/licenses/by-sa/3.0/legalcode.it';
        break;
    default:
        $url = 'https://creativecommons.org/licenses/by-sa/3.0/legalcode';
    }
        
    exiting_from_function ($here . " with \$url = $url");
    return $url;
}

function pervasive_license_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

    $en_tit = 'this code is available under the Creative Commons License';
    $la_tit = language_translate_of_en_string ($en_tit);
    $la_Tit = string_html_capitalized_of_string ($la_tit);

    $en_lic = 'license';
    $la_lic = language_translate_of_en_string ($en_lic);
    $la_Lic = string_html_capitalized_of_string ($la_lic);

    $url = irp_provide ('pervasive_creativecommons_url', $here);

    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<a href="' . $url;
    $html_str .= '" title="' . $la_Tit ; 
    $html_str .= '">';
    $html_str .= $la_Lic; 
    $html_str .= '</a>';
    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here, '$html_str', $html_str);
    exiting_from_function ($here);

    return $html_str;
}

function pervasive_page_footer_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<center>' . "\n";
    $html_str .= irp_provide ('pervasive_license', $here);
    $html_str .= '</center>' . "\n";
    $html_str .= irp_provide ('common_html_page_tail', $here);
    $html_str .= comment_exiting_of_function_name ($here);

    exiting_from_function ($here);
    
    return $html_str;
}

exiting_from_module ($module);

?>