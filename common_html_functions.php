<?php

require_once "common_html_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['placeholder'] = "in a textarea a documentation or example text to be over-written";

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
  $html_str .= '  <META NAME="keywords" CONTENT="democracy, d&eacute;mocratie, crowd editing, collaborative editing, cooperating editing, collective intelligence, intelligence collective; r&eacute;daction collaborative, r&eacute;daction collective, general will, volont&eacute; g&eacute;n&eacute;rale, auto regulated collaborative editing, r&eacute;daction collaborative auto-r&eacute;gul&eacute;e">' . "\n";
  $html_str .= '  <META NAME="description" CONTENT="ARCE (Auto-Regulated Collaborative Editing - r&eacute;daction collaborative auto-r&eacute;gul&eacute;e) est conçu pour que les membres d&rsquo;une communaut&eacute; d&rsquo;internautes puissent se mettre d&rsquo;accord sur le pourquoi, le comment et la destination d&rsquo;un texte, avant d&rsquo;en entreprendre l&rsquo;&eacute;criture.">' . "\n";
  $html_str .= '  <meta http-equiv="content-type" content="text/html; charset=utf-8" />' . "\n";
  $html_str .= '  <link href="' . $www_filename_css . '" rel="stylesheet" media="all" type="text/css">' . "\n";
  $html_str .= '  <link rel="icon" href="IMAGES/favicon.ico">' . "\n";
  $html_str .= ' </head>' . "\n";
  $html_str .= ' <body>' . "\n";

  if ($_SESSION['is_comment_html_active']) {
      $html_str .= '<font color=red>comment_html is ACTIVE</font>' . "\n";
      $html_str .= '<br>' . "\n";
      $html_str .= 'set $_SESSION[\'is_comment_html_active\'] = FALSE' . "\n";
      $html_str .= '<br>' . "\n";
      $html_str .= 'in module site_dependent_data.php';
      $html_str .= '<br>' . "\n";
  }

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

?>