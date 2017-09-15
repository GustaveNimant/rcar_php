<?php

require_once "array_functions.php";
require_once "common_html_functions.php";
require_once "clean_functions.php";
require_once "label_information_functions.php";
require_once "git_command_functions.php";
require_once "justification_functions.php";
require_once "language_selection_functions.php";

$module = "label_functions";
# entering_in_module ($module);

$Documentation[$module]['label']  = "a label is a link ( Entry or Module) displayed in the header";
$Documentation[$module]['label'] .= "Example : Home, Entries, Faq, ...";

function label_html_href_make_of_label ($nam_lab, $lan) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_lab, $lan)");
  check_label_name ($nam_lab);

  $ent_inf_lan_a = label_information_array_lan_of_label ($nam_lab, $lan);

  $tit = $ent_inf_lan_a['title'];
  $tit = ucfirst ($tit);
  $bub = $ent_inf_lan_a['bubble_href'];

  $nam_pro = $_SESSION['parameters']['program_name'];
  $NAM_PRO = strtoupper ($nam_pro);

  if ($bub == 'ARCE Version') { /* Improve put it in translation */
      $version   = $_SESSION['parameters']['version'];
      $bub .= " $version";
  }

  $url_rel = $ent_inf_lan_a['url_relative'];

/*
  $nam_pre = link_previous_module_name_make ();
  $nam_son = string_replace_if_exists ($here, '.php', '', $url_rel);
  father_n_son_stack_entity_push_of_father_of_son ($nam_pre, $nam_son);
*/

  $html_str  = '';
  $html_str .= '<span id="menu-header-links"> ';
  $html_str .= '<a href="' . $url_rel . '" title="' . $bub . '"> ';
  $html_str .= $tit;
  $html_str .= '</a> ';

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function label_html_href_make_of_entry ($nam_lab_en, $lan) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_lab_en, $lan)");

  $nam_lab_la = language_translate_of_en_string_of_language ($nam_lab_en, $lan);
  $nam_lab_lac = html_entity_decode ($nam_lab_la);
  $nam_ent = word_name_capitalized_of_string_surname ($nam_lab_lac);

  /* debug_n_check ($here , '$nam_lab_la', $nam_lab_la); */
  /* debug_n_check ($here , '$nam_lab_lac', $nam_lab_lac); */
  /* debug_n_check ($here , '$nam_ent', $nam_ent); */

  check_entry_name ($nam_ent);
  /* irp_path_clean_register_of_irp_key ('entry_name'); */

  $ent_inf_lan_a = entry_information_array_lan_of_entry_name ($nam_ent, $lan);

  $tit = $ent_inf_lan_a['title'];
  $tit = ucfirst ($tit);
  $bub = $ent_inf_lan_a['bubble_href'];

  $url_rel = $ent_inf_lan_a['url_relative'];

  /* $nam_pre = link_previous_module_name_make (); */
  /* $nam_son = link_module_name_of_url_relative ($url_rel); */
  /* irp_father_of_module_of_son ($nam_pre, $nam_son); */

  $html_str  = '';
  $html_str .= '<span id="menu-header-links"> ';
  $html_str .= '<a href="' . $url_rel . '" title="' . $bub . '"> ';
  $html_str .= $tit;
  $html_str .= '</a> ';

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  return $html_str;
}

function label_pure_html_initial_section_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $html_str .= '<td> ';
  $html_str .= "\n" . label_html_href_make_of_label ('home', $lan);
  $html_str .= '</td> ';
  $html_str .= '<td><b>';
  $html_str .= "\n" . label_html_href_make_of_label ('entries', $lan);
  $html_str .= '</b></td> ';
  /* $html_str .= '<td> '; */
  /* $html_str .= "\n" . label_html_href_make_of_label ('language', $lan); */
  /* $html_str .= '</td> '; */
  $html_str .= '<td> ';
  $html_str .= "\n" . label_html_href_make_of_label ('command', $lan);
  $html_str .= '</td> ';
  $html_str .= '<td> ';
  $html_str .= "\n" . label_html_href_make_of_label ('apropos', $lan);
  $html_str .= '</td> ';
  $html_str .= '<td> ';
  $html_str .= "\n" . button_submit_quit_html_make ($lan);
  $html_str .= '</td> ';

  $html_str .= '</tr> ';

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function label_entry_html_initial_section_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $html_str .= '<tr> ';

  $html_str .= '<td colspan="2"> ';
  $html_str .= "\n" . label_html_href_make_of_entry ('editing rules', $lan);
  $html_str .= '</td> ';

  $html_str .= '<td> ';
  $html_str .= "\n" . label_html_href_make_of_entry ('faq', $lan);
  $html_str .= '</td> ';
 
  $html_str .= '<td colspan="2"> ';
  $html_str .= "\n" . label_html_href_make_of_entry ('property rules', $lan);
  $html_str .= '</td> ';

  $html_str .= '<td> ';
  $html_str .= "\n" . label_html_href_make_of_entry ('presentation', $lan);
  $html_str .= '</td> ';

  $html_str .= '<td> ';
  $html_str .= "\n" . label_html_href_make_of_entry ('usage', $lan);
  $html_str .= '</td> ';
  $html_str .= '</tr> ';

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function label_html_initial_section_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = "";
  $html_str .= irp_provide ('label_pure_html_initial_section', $here);
  $html_str .= irp_provide ('label_entry_html_initial_section', $here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}


# exiting_from_module ($module);

?>