<?php

require_once "array_functions.php";
require_once "common_html_functions.php";
require_once "clean_functions.php";
require_once "label_information_functions.php";
require_once "git_command_functions.php";
require_once "language_selection_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

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

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<span id="menu-header-links">' . "\n";
  $html_str .= ' <a href="' . $url_rel . '" title="' . $bub . '">';
  $html_str .= $tit;
  $html_str .= '</a>' . "\n";
  $html_str .= '</span>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function label_html_href_make_of_en_label_name ($en_nam_lab) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($en_nam_lab)");

  $lan = $_SESSION['parameters']['language'];
  $la_nam_lab = language_translate_of_en_string ($en_nam_lab);
  $la_nam_labc = html_entity_decode ($la_nam_lab);

  $nam_ent = word_name_capitalized_of_string_surname ($la_nam_labc);
  string_check_entry_name_of_string ($nam_ent);
  $ent_inf_lan_a = entry_information_array_lan_of_entry_name ($nam_ent);

  $tit = $ent_inf_lan_a['title'];
  $Tit = ucfirst ($tit);
  $bub = $ent_inf_lan_a['bubble_href'];

  $url_rel = $ent_inf_lan_a['url_relative'];

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<span id="menu-header-links">' . "\n";
  $html_str .= '<a href="' . $url_rel . '" title="' . $bub . '">';
  $html_str .= $Tit;
  $html_str .= '</a>' . "\n";
  $html_str .= '</span>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function label_pure_html_initial_section_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<tr>' . "\n";

  $html_str .= ' <td>' . "\n";
  $html_str .= label_html_href_make_of_label ('home');
  $html_str .= ' </td>' . "\n";

  $html_str .= ' <td><b>' . "\n";
  $html_str .= label_html_href_make_of_label ('entries');
  $html_str .= ' </b></td>' . "\n";

  $html_str .= ' <td>' . "\n";
  $html_str .= label_html_href_make_of_label ('command');
  $html_str .= ' </td>' . "\n";

  $html_str .= ' <td>' . "\n";
  $html_str .= label_html_href_make_of_label ('apropos');
  $html_str .= ' </td>' . "\n";

  $html_str .= ' <td>' . "\n";
  $html_str .= button_submit_quit_html_make ();
  $html_str .= ' </td>' . "\n";

  $html_str .= ' </tr>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);


  exiting_from_function ($here);

  return $html_str;
}

function label_entry_html_initial_section_as_row_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<tr>' . "\n";

  $html_str .= ' <td colspan="2">' . "\n";
  $html_str .= label_html_href_make_of_en_label_name ('editing rules');
  $html_str .= ' </td>' . "\n";

  $html_str .= ' <td>' . "\n";
  $html_str .= label_html_href_make_of_en_label_name ('faq');
  $html_str .= ' </td>' . "\n";
 
  $html_str .= ' <td colspan="2">' . "\n";
  $html_str .= label_html_href_make_of_en_label_name ('property rules');
  $html_str .= ' </td>' . "\n";

  $html_str .= ' <td>' . "\n";
  $html_str .= label_html_href_make_of_en_label_name ('presentation');
  $html_str .= ' </td>' . "\n";

  $html_str .= ' <td>' . "\n";
  $html_str .= label_html_href_make_of_en_label_name ('usage');
  $html_str .= ' </td>' . "\n";

  $html_str .= '</tr>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function label_html_initial_section_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('label_pure_html_initial_section', $here);
  $html_str .= irp_provide ('label_entry_html_initial_section_as_row', $here);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}


exiting_from_module ($module);

?>