<?php

require_once "language_library.php";
require_once "language_translate_library.php";
require_once "file_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['placeholder'] = "in a textarea a documentation or example text to be over-written";

function common_html_div_background_color_of_html ($tit) {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str = comment_entering_of_function_name ($here);
  if ($tit != '') {
    $html_str .= '<div class="my-div">' . "\n";
    $html_str .= $tit;
    $html_str .= '</div>' . "\n";
  }
  $html_str .= comment_exiting_of_function_name ($here);

#  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function common_html_span_background_color_of_html ($tit) {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str = comment_entering_of_function_name ($here);
  if ($tit != '') {
      $html_str .= '<span class="my-div">';
      $html_str .= $tit;
      $html_str .= '</span>' . "\n";
  }
  $html_str .= comment_exiting_of_function_name ($here);

#  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function common_html_page_title_centered_of_title ($tit, $shi) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($tit, $shi)");

  $html_str = comment_entering_of_function_name ($here);
  if ($tit != '') {
      $html_str .= '<center>' . "\n";
      $html_str .= $shi;
      $html_str .= '<div class="my-div">';
      $html_str .= $tit; 
      $html_str .= '</div>' . "\n";
      $html_str .= '</center>' . "\n";
  }
      $html_str .= comment_exiting_of_function_name ($here);

#  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function common_html_entitled_text_of_title_of_text ($tit, $html_txt) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($tit, $html_txt)");
  
  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= common_html_span_background_color_of_html ($tit);
  $html_str .= '<br>' . "\n"; 
  $html_str .= '&nbsp;&nbsp;&nbsp;&nbsp;' . $html_txt . "\n"; 
  $html_str .= comment_exiting_of_function_name ($here);

  exiting_from_function ($here);
  
  return $html_str;
}
        
function common_html_css_survol_of_la_title ($la_tit) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($la_tit)");

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<ul class="niveau1"><li> ' . "\n";
  $html_str .= $la_tit;
  $html_str .= '<ul class="niveau2"> ' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

?>