<?php

require_once "irp_functions.php";

$module = "language_selection_functions";
# entering_in_module ($module);

function language_selection_html_make_of_language ($lan) {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $script_action = 'index.php';
  debug_n_check ($here , " script_action", $script_action);

  $la_tit = language_translate_of_en_string ('select a language');
  $la_Tit = string_html_capitalized_of_string ($la_tit);
  
  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center> ' . "\n";
  $html_str .= '<form action="' . $script_action. '" method="get"> ' . "\n";

  $html_str .= common_html_background_color_of_html ($la_Tit) . "\n";

  $html_str .= '  <br><select name="language"> ' . "\n";
  $html_str .= '     <option value="fr">Fran&ccedil;ais</option> ' . "\n";
 
  $html_str .= '     <option value="en">English</option> ' . "\n";
  $html_str .= '  </select> ' . "\n";
  $html_str .= '<br><br><input type="submit" value="Ok" name="change_language"> ';

  $html_str .= '</form> ' . "\n";
  $html_str .= '</center> ' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;

};

function language_href_html_make_of_language ($lan) {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $tit = language_translate_of_en_string ('modify the language');
  
  $script_action = 'entry_list_display.php';
  
  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<span id="menu-header-links"> ';
  
  $html_str .= '<a href="index.php" title="';
  $html_str .= $tit;
  $html_str .= '"> ';
  $html_str .= language_translate_of_en_string ('language');
  $html_str .= '</a> ';
  $html_str .= "</span>";
  $html_str .= comment_exiting_of_function_name ($here);
   
  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  
  return $html_str;
}

function language_selection_section_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= language_selection_html_make_of_language ($lan);
  $html_str .= comment_exiting_of_function_name ($here);

  debug ($here , "language selection _GET", $_GET);
  exiting_from_function ($here);

  return $html_str;
}

function language_selection_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);
  $html_str .= irp_provide ('language_selection_section', $here);
  $html_str .= irp_provide ('pervasive_html_final_section', $here);
  $html_str .= comment_exiting_of_function_name ($here);

  exiting_from_function ($here);

  return $html_str;
}

# exiting_from_module ($module);

?>