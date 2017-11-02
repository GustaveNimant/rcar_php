<?php

require_once "language_library.php";
require_once "language_translate_library.php";
require_once "file_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['placeholder'] = "in a textarea a documentation or example text to be over-written";

entering_in_module ($module);

function common_html_page_head_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $www_filename_css = $_SESSION['parameters']['www_filename_css'];
#  debug_n_check ($here, '$www_filename_css', $www_filename_css);

  $nam_pro = $_SESSION['parameters']['program_name'];
  $Nam_pro = ucfirst ($nam_pro);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<!DOCTYPE html>' . "\n";
  $html_str .= '<html>' . "\n";
  $html_str .= ' <head>' . "\n";
  $html_str .= '  <title>' . $Nam_pro . '</title>' . "\n";
  $html_str .= '  <meta name="robots" CONTENT="index,follow">' . "\n";
  $html_str .= '  <META NAME="keywords" CONTENT="democracy, d&eacute;mocratie, collaborative editing, r&eacute;daction collaborative, general will, volont&eacute; g&eacute;n&eacute;rale, auto regulated collaborative editing, r&eacute;daction collaborative auto-r&eacute;gul&eacute;e">' . "\n";
  $html_str .= '  <META NAME="description" CONTENT="ARCE (Auto-Regulated Collaborative Editing - r&eacute;daction collaborative auto-r&eacute;gul&eacute;e) est conçu pour que les membres d&rsquo;une communaut&eacute; d&rsquo;internautes puissent se mettre d&rsquo;accord sur le pourquoi, le comment et la destination d&rsquo;un texte, avant d&rsquo;en entreprendre l&rsquo;&eacute;criture.">' . "\n";
  $html_str .= '  <meta http-equiv="content-type" content="text/html; charset=utf-8" />' . "\n";
  $html_str .= '  <link href="' . $www_filename_css . '" rel="stylesheet" media="all" type="text/css">' . "\n";
  $html_str .= '  <link rel="icon" href="images/favicon.ico">' . "\n";
  $html_str .= ' </head>' . "\n";
  $html_str .= ' <body>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

#  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
};

function common_html_page_tail_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= ' </body> ' . "\n";
  $html_str .= '</html> ' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

#  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
};

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
  $html_str .= common_html_div_background_color_of_html ($tit);
  $html_str .= $html_txt . "\n"; 
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

function common_html_css_style_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<style type="text/css"> ' . "\n";
  $html_str .= ' ul ul {display: none;}' . "\n";
  $html_str .= 'li:hover ul.niveau2, li li:hover {display:block;}' . "\n";
  $html_str .= '</style> ' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>