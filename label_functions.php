<?php

require_once "array_functions.php";
require_once "common_html_functions.php";
require_once "clean_functions.php";
require_once "label_information_functions.php";
require_once "git_command_functions.php";
require_once "justification_functions.php";
require_once "language_selection_functions.php";

$module = module_name (__FILE__);

# entering_in_module ($module);

$Documentation[$module]['what is it']  = "a label is a link ( Entry or Module) displayed in the header";
$Documentation[$module]['example'] .= "Home, Entries, Faq, ...";

function label_html_href_make_of_label ($nam_lab) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_lab)");

  check_label_name ($nam_lab);

  $lan = $_SESSION['parameters']['language'];
  $ent_inf_lan_a = label_information_array_lan_of_label ($nam_lab);

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

  $html_str  = '<!-- entering in ' . $here . '-->' . "\n";
  $html_str .= '<span id="menu-header-links">' . "\n";
  $html_str .= '  <a href="' . $url_rel . '" title="' . $bub . '">';
  $html_str .= $tit;
  $html_str .= '</a>' . "\n";
  $html_str .= '</span>' . "\n";
  $html_str .= '<!-- exiting from ' . $here . '-->' . "\n";

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function label_html_href_make_of_en_label_name ($en_nam_lab) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($en_nam_lab)");

  $lan = $_SESSION['parameters']['language'];
  $la_nam_lab = language_translate_of_en_string_of_language ($en_nam_lab, $lan);
  $la_nam_labc = html_entity_decode ($la_nam_lab);

  $nam_ent = word_name_capitalized_of_string_surname ($la_nam_labc);
  check_entry_name ($nam_ent);
  $ent_inf_lan_a = entry_information_array_lan_of_entry_name ($nam_ent);

  $tit = $ent_inf_lan_a['title'];
  $Tit = ucfirst ($tit);
  $bub = $ent_inf_lan_a['bubble_href'];

  $url_rel = $ent_inf_lan_a['url_relative'];

  $html_str  = '<!-- entering in ' . $here . '-->' . "\n";
  $html_str .= '<span id="menu-header-links">' . "\n";
  $html_str .= '<a href="' . $url_rel . '" title="' . $bub . '">';
  $html_str .= $Tit;
  $html_str .= '</a>'. "\n";
  $html_str .= '</span>'. "\n";
  $html_str .= '<!-- exiting from ' . $here . '-->' . "\n";

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  return $html_str;
}

function label_pure_html_initial_section_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $html_str  = '<!-- entering in ' . $here . '-->' . "\n";
  $html_str .= '<tr>' . "\n";

  $html_str .= ' <td>' . "\n";
  $html_str .= label_html_href_make_of_label ('home') . "\n";
  $html_str .= ' </td>' . "\n";

  $html_str .= ' <td><b>' . "\n";
  $html_str .= label_html_href_make_of_label ('entries');
  $html_str .= ' </b></td>' . "\n";

  $html_str .= ' <td>' . "\n";
  $html_str .= label_html_href_make_of_label ('command') . "\n";
  $html_str .= ' </td>' . "\n";

  $html_str .= ' <td>' . "\n";
  $html_str .= label_html_href_make_of_label ('apropos') . "\n";
  $html_str .= ' </td>' . "\n";

  $html_str .= ' <td>' . "\n";
  $html_str .= button_submit_quit_html_make ($lan). "\n";
  $html_str .= ' </td>' . "\n";

  $html_str .= ' </tr>' . "\n";
  $html_str .= '<!-- exiting from ' . $here . '-->' . "\n";

  debug_n_check ($here , '$html_str', $html_str);


  exiting_from_function ($here);

  return $html_str;
}

function label_entry_html_initial_section_as_row_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $html_str  = '<!-- entering in ' . $here . '-->' . "\n";
  $html_str .= '<tr>' . "\n";

  $html_str .= ' <td colspan="2">' . "\n";
  $html_str .= label_html_href_make_of_en_label_name ('editing rules') . "\n";
  $html_str .= ' </td>' . "\n";

  $html_str .= ' <td>' . "\n";
  $html_str .= label_html_href_make_of_en_label_name ('faq') . "\n";
  $html_str .= ' </td>' . "\n";
 
  $html_str .= ' <td colspan="2">' . "\n";
  $html_str .= label_html_href_make_of_en_label_name ('property rules') . "\n";
  $html_str .= ' </td>' . "\n";

  $html_str .= ' <td>' . "\n";
  $html_str .= label_html_href_make_of_en_label_name ('presentation') . "\n";
  $html_str .= ' </td>' . "\n";

  $html_str .= ' <td>' . "\n";
  $html_str .= label_html_href_make_of_en_label_name ('usage') . "\n";
  $html_str .= ' </td>' . "\n";

  $html_str .= '</tr>' . "\n";
  $html_str .= '<!-- exiting from ' . $here . '-->' . "\n";

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function label_html_initial_section_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '<!-- entering in ' . $here . '-->' . "\n";
  $html_str .= irp_provide ('label_pure_html_initial_section', $here);
  $html_str .= irp_provide ('label_entry_html_initial_section_as_row', $here);
  $html_str .= '<!-- exiting from ' . $here . '-->' . "\n";

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}


# exiting_from_module ($module);

?>