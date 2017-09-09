<?php

require_once "management_functions.php";
require_once "language_functions.php";
require_once "language_translate_functions.php";
require_once "file_functions.php";

$module = "common_html_functions";
# entering_in_module ($module);

function common_html_page_head_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $www_filename_css = $_SESSION['parameters']['www_filename_css'];
  debug_n_check ($here, '$www_filename_css', $www_filename_css);

  $nam_pro = $_SESSION['parameters']['program_name'];
  $Nam_pro = ucfirst ($nam_pro);

  $html_str  = '';
  $html_str .= '<html> ';

  $html_str .= "\n";
  $html_str .= '  <head>';
  $html_str .= "\n";
  $html_str .= "<title>$Nam_pro</title>";
  $html_str .= '<meta name="robots" CONTENT="index,follow">';
  $html_str .= '<META NAME="keywords" CONTENT="democracy, d&eacute;mocratie, collaborative editing, r&eacute;daction collaborative, general will, volont&eacute; g&eacute;n&eacute;rale, auto regulated collaborative editing, r&eacute;daction collaborative auto-r&eacute;gul&eacute;e"> ';
  $html_str .= "\n";
  $html_str .= '<META NAME="description" CONTENT="ARCE (Auto-Regulated Collaborative Editing - r&eacute;daction collaborative auto-r&eacute;gul&eacute;e) est conçu pour que les membres d&rsquo;une communaut&eacute; d&rsquo;internautes puissent se mettre d&rsquo;accord sur le pourquoi, le comment et la destination d&rsquo;un texte, avant d&rsquo;en entreprendre l&rsquo;&eacute;criture."> ';
  $html_str .= "\n";
  $html_str .= '<meta http-equiv="content-type" content="text/html; charset=utf-8" /> ';
  $html_str .= "\n";
  $html_str .= '    <link href="' . $www_filename_css . '" rel="stylesheet" media="all" type="text/css"> ';
  $html_str .= "\n";
  $html_str .= '<link rel="icon" href="images/favicon.ico"> ';
  $html_str .= "\n" . '  </head> ';
  $html_str .= "\n";
  $html_str .= '  <body> ';
  $html_str .= "\n";
 
#  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
};

function common_html_page_tail_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str = '';
  $html_str .= '  </body> ' . "\n";
  $html_str .= '</html> ' . "\n";

#  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
};

function common_html_background_color_of_html ($tit) {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str = '';
  if ($tit != "") {
    $html_str .= '<div class="my-div"> ';
    $html_str .= $tit; 
    $html_str .= '</div> '. "\n";
  }

#  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function common_html_page_title_centered_of_title ($tit) {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str = '';
  if ($tit != "") {
      $html_str .= '<center> ';
      $html_str .= '<div class="my-div"> ';
      $html_str .= $tit; 
      $html_str .= '</div> '. "\n";
      $html_str .= '</center> ';
  }

#  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function common_html_entitled_text_of_title_of_text ($tit, $html_txt) {
  $here = __FUNCTION__;
  entering_in_function ($here);
#  debug_n_check ($here , '$tit', $tit);
#  debug_n_check ($here , '$html_txt', $html_txt);
  
  $html_str = '';
  $html_str .= common_html_background_color_of_html ($tit);
  $html_str .= "<br>\n"; 
  $html_str .= $html_txt; 
  $html_str .= "\n";
  
#  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  
  return $html_str;
}

function enter_below_your_text_section_of_action ($nam_act){
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_act)");

  $en_tit = 'enter your '. $nam_act . ' below'; 
  $la_tit = language_translate_of_en_string_of_language ($en_tit, $lan);
  $la_tit = ucfirst ($la_tit);
  $htm_tit = common_html_background_color_of_html ($la_tit);

  $html_str = '';
  $html_str .= $htm_tit;
  $html_str .= '<br> ';
  $html_str .= '<textarea name="' . $nam_act . '" rows="2" cols="100" /> ';
  $html_str .= '</textarea> ' . "\n";

#  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;

}

function enter_below_your_text_and_get_section_of_action ($nam_act){
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_act)");

  $en_tit = 'enter your '. $nam_act . ' below'; 
  $la_tit = language_translate_of_en_string_of_language ($en_tit, $lan);
  $la_tit = string_html_capitalized_of_string ($la_tit);
  $htm_tit = common_html_background_color_of_html ($la_tit);

  $html_str = '';
  $html_str .= $htm_tit;
  $html_str .= '<br> ';
  $html_str .= '<textarea name="' . $nam_act . '" rows="2" cols="100" /> ';
  $html_str .= '</textarea> ' . "\n";
  
  $html_str .= '<input type="hidden" name="item_content_previous" value="' . $con_ite . '"> ';

#  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;

}

function common_html_css_survol_of_la_title ($la_tit) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($la_tit)");

  $html_str  = '';
  $html_str .= '<ul class="niveau1"><li> ' . "\n";
  $html_str .= $la_tit;
  $html_str .= '<ul class="niveau2"> ' . "\n";

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function common_html_css_style_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= '<style type="text/css"> ' . "\n";
  $html_str .= ' ul ul {display: none;}' . "\n";
  $html_str .= 'li:hover ul.niveau2, li li:hover {display:block;}' . "\n";
  $html_str .= '</style> ' . "\n";

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

# exiting_from_module ($module);

?>