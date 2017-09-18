<?php

require_once "language_functions.php";
require_once "language_translate_functions.php";
require_once "file_functions.php";

$module = module_name (__FILE__);

$Documentation[$module]['placeholder'] = "in a textarea a documentation or example text to be over-written";

# entering_in_module ($module);

function common_html_page_head_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $www_filename_css = $_SESSION['parameters']['www_filename_css'];
  debug_n_check ($here, '$www_filename_css', $www_filename_css);

  $nam_pro = $_SESSION['parameters']['program_name'];
  $Nam_pro = ucfirst ($nam_pro);

  $html_str  = '<!DOCTYPE html>' . "\n";
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
 
#  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
};

function common_html_page_tail_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= ' </body> ' . "\n";
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
    $html_str .= '<div class="my-div">' . "\n";
    $html_str .= $tit . "\n";
    $html_str .= '</div>' . "\n";
  }

#  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function common_html_page_title_centered_of_title ($tit, $shi) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($tit, $shi)");

  $html_str = '';
  if ($tit != "") {
      $html_str .= '<center>' . "\n";
      $html_str .= $shi;
      $html_str .= '<div class="my-div">';
      $html_str .= $tit; 
      $html_str .= '</div>' . "\n";
      $html_str .= '</center>';
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
  
  $html_str  = '';
  $html_str .= common_html_background_color_of_html ($tit);
  $html_str .= "<br>\n"; 
  $html_str .= $html_txt . "\n"; 
  
#  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  
  return $html_str;
}


function a_href_of_entry_name_of_script_nameoffile_of_block_current_name_of_en_action ($nam_ent, $nof_scr, $nam_blo_cur, $en_act) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent, $nof_scr, $nam_blo_cur, $shi)");

  $lan = $_SESSION['parameters']['language'];
  $la_act = language_translate_of_en_string_of_language ($en_act, $lan);

  $html_str  = '';
  $html_str .= '<br><br>';
  $html_str .= '<a href="'. $nof_scr . '?'; 
  $html_str .= 'entry_name=' . $nam_ent;
  $html_str .= '&block_current_name=' . $nam_blo_cur ; 
  $html_str .= '">';
  $html_str .= $la_act;
  $html_str .= '</a>';
  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  
  return $html_str;
}

function form_action_get_of_script_nameoffile_of_en_value_of_en_text_of_shift ($nof_scr, $en_val, $en_txt, $shi) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nof_scr, $en_val, $en_txt, $shi)");

  $lan = $_SESSION['parameters']['language'];
  $la_val = ucfirst (language_translate_of_en_string_of_language ($en_val, $lan));
  $la_txt = ucfirst (language_translate_of_en_string_of_language ($en_txt, $lan));

  $html_str  = '';
  $html_str .= $shi . '<form ' . "\n";
  $html_str .= $shi . $shi;
  $html_str .= 'action="' . $nof_scr . '" ';
  $html_str .= 'method="get"' . "\n";
  $html_str .= $shi . $shi . '> ' . "\n";
  $html_str .= $shi . $shi;
  $html_str .= '<input type="submit" value="';
  $html_str .= $la_val;
  $html_str .= '" title="';
  $html_str .= $la_txt;
  $html_str .= '" ';
  $html_str .= 'font-variant:small-caps; background-color:red ';
  $html_str .= '> ' . "\n";
  $html_str .= $shi;
  $html_str .= '</form> ' . "\n";

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  
  return $html_str;
}

function inputtypehidden_of_name_of_en_value ($nam, $en_val, $shi) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam, $en_val, $shi)");

  $lan = $_SESSION['parameters']['language'];
  $la_val = ucfirst (language_translate_of_en_string_of_language ($en_val, $lan));

  $tex_siz = $_SESSION['parameters']['html_text_zone_size'];

  $html_str  = '';
  $html_str .= '<input type="hidden" ' . "\n"; 
  $html_str .= $shi;
  $html_str .= 'name="';
  $html_str .= $nam;
  $html_str .= '" ' . "\n";
  $html_str .= 'value="';
  $html_str .= $la_val;
  $html_str .= '"> ' . "\n";

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  
  return $html_str;
}

function inputtypesubmit_of_name_of_en_value_of_shift ($nam, $en_val, $shi) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam, $shi)");

  $lan = $_SESSION['parameters']['language'];
  $la_Val = ucfirst (language_translate_of_en_string_of_language ($en_val, $lan));

  $html_str  = '';
  $html_str .= '<input type="submit" ' . "\n"; 
  $html_str .= $shi;
  if ( ! is_empty_of_string ($nam)) {$html_str .= 'name="' . $nam . '" ';}
  $html_str .= 'value="' . $la_Val . '" ';
  $html_str .= '"> ' . "\n";

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  
  return $html_str;
}

function inputtypetext_of_name_of_en_placeholder ($nam, $en_pla, $shi) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam, $en_pla, $shi)");

  $lan = $_SESSION['parameters']['language'];
  $la_Pla = ucfirst (language_translate_of_en_string_of_language ($en_pla, $lan));

  $tex_siz = $_SESSION['parameters']['html_text_zone_size'];

  $html_str  = '';
  $html_str .= '<input type="text" ' . "\n"; 
  $html_str .= $shi;
  $html_str .= 'name="';
  $html_str .= $nam;
  $html_str .= '" ' . "\n";
  $html_str .= 'placeholder="';
  $html_str .= $la_Pla;
  $html_str .= '" ' . "\n";
  $html_str .= 'size="';
  $html_str .= $tex_siz;
  $html_str .= '" ' . "\n";
  $html_str .= '"> ' . "\n";

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  
  return $html_str;
}

function method_get_in_form_of_action_module_of_shift ($mod_act, $shi) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($mod_act, $shi)");

  $html_str  = '';
  $html_str .= $shi;
  $html_str .= 'method="get" ';
  $html_str .= 'action="'. $mod_act . '"';

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  
  return $html_str;
}

function textarea_of_name_of_en_placeholder ($nam, $en_pla, $shi) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam, $en_pla, $shi)");

  $lan = $_SESSION['parameters']['language'];
  $la_Pla = ucfirst (language_translate_of_en_string_of_language ($en_pla, $lan));

  $html_str  = '';
  $html_str .= '<textarea ' . "\n"; 
  $html_str .= $shi;
  $html_str .= 'name="' . $nam . '" ';
  $html_str .= 'rows="2" cols="100" ';
  $html_str .= 'placeholder="';
  $html_str .= $la_Pla;
  $html_str .= '">' . "\n";
  $html_str .= '</textarea> ' . "\n";

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  
  return $html_str;
}

function textarea_of_name_of_content_placeholder ($nam, $con_pla, $shi) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam, $con_pla, $shi)");

  $html_str  = '';
  $html_str .= '<textarea ' . "\n"; 
  $html_str .= $shi;
  $html_str .= 'name="' . $nam . '" ';
  $html_str .= 'rows="2" cols="100" ';
  $html_str .= 'placeholder="';
  $html_str .= $con_pla;
  $html_str .= '">' . "\n";
  $html_str .= '</textarea> ' . "\n";

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  
  return $html_str;
}

function span_class_of_name_of_en_text ($nam, $en_txt) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($str)");

  $lan = $_SESSION['parameters']['language'];
  $la_txt = language_translate_of_en_string_of_language ($en_txt, $lan);

  $html_str  = '';
  $html_str .= '<span class="my-fieldset">' . "\n";
  $html_str .= $nam . ' : ';
  $html_str .= '<b>';
  $html_str .= '<font color="red">';
  $html_str .= $la_txt;
  $html_str .= '</font>';
  $html_str .= '</b>';
  $html_str .= '</span>' . "\n";
  
  debug_n_check ($here , '$html_str', $html_str);
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