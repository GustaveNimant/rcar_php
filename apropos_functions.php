<?php

require_once "array_functions.php";
require_once "item_modify_save_functions.php";
require_once "file_functions.php";
require_once "debug_functions.php";
require_once "button_submit_functions.php";
require_once "irp_functions.php";
require_once "bubble_functions.php";

$module = "apropos_functions";
# entering_in_module ($module);

function apropos_content_by_block_name_array_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent = irp_provide ('entry_name', $here);
  $nam_blo_a = irp_provide ('block_name_array', $here);

  if (is_empty_of_array ($nam_blo_a)) {
    $con_by_nam_blo_a = array ();
  }
  else {
    $hdir = specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);
    debug_n_check ($here , "hdir", $hdir);

    $ext_blo = $_SESSION['parameters']['block_text_filename_extension'];

    foreach ($nam_blo_a as $nam_blo) {
      $fno_blo = $hdir . $nam_blo . '.' .  $ext_blo;
      
      $con_blo = file_content_read ($fno_blo);
      $con_by_nam_blo_a[$nam_blo] = $con_blo;
    }
  }

  # debug ($here , "output apropos_content_by_block_name_array", $con_by_nam_blo_a);
  exiting_from_function ($here);

  return $con_by_nam_blo_a;
};


function apropos_display_item_html_make_of_entry_name_of_item_name_of_item_content_of_item_name_array_of_language ($nam_ent, $nam_ite, $con_ite, $nam_ite_a, $lan) {
  $here = __FUNCTION__;
  entering_in_function ($here . "($nam_ent, $nam_ite, $con_ite, $nam_ite_a[0], $lan)");

  $la_Str = ucfirst (language_translate_of_en_string_of_language ('action', $lan));

  $html_str = '';

  $html_str .= '<b> ' . $nam_ite . '</b> ';

  $html_str .= '<span id="right"> ';
  $html_str .= '<table> '; 
  $html_str .= '<tr><td> ';
  $html_str .= button_submit_modify_item_name ($nam_ent, $nam_ite);
  $html_str .= '</td><td> ';
  $html_str .= button_submit_modify_item_content ($nam_ent, $nam_ite);
  $html_str .= '</td><td> ';
  $html_str .= button_submit_justify_justify ($nam_ent, $nam_ite);
  $html_str .= '</td><td> ';
  $html_str .= button_submit_item_delete_of_entry_name_of_item_name_of_item_name_array ($nam_ent, $nam_ite, $nam_ite_a);
  $html_str .= '</td></tr></table> ';
  $html_str .= '</span> ';
  $html_str .= '<br> ';

  $html_str .= $con_ite;
  $html_str .= '<br> ';
 
  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function apropos_display_item_array_html_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $nam_ent = irp_provide ('entry_name', $here);

  $con_by_nam_ite_a = irp_provide ('item_content_linked_by_item_name_array', $here);
  # debug_n_check ($here , '$con_by_nam_ite_a', $con_by_nam_ite_a);

  $nam_ite_a = irp_provide ('item_name_array', $here);
  # debug_n_check ($here , '$nam_ite_a', $nam_ite_a);

  $html_str = '';
  foreach ($con_by_nam_ite_a as $nam_ite => $con_ite) {
      $html_str .= apropos_display_item_html_make_of_entry_name_of_item_name_of_item_content_of_item_name_array_of_language ($nam_ent, $nam_ite, $con_ite, $nam_ite_a, $lan);
  }
   
  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function apropos_display_section_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $version   = $_SESSION['parameters']['version'];
  $nam_pro = $_SESSION['parameters']['program_name'];
  $NAM_PRO = strtoupper ($nam_pro);

  $html_str  = ''; 
  $html_str .= "$NAM_PRO Version $version<br>"; 
  $html_str .= 'Contact : <a href="mailto:arce@willforge.fr?subject=A propos d\'Arce">arce@willforge.fr</a><br>'; 
  $html_str .= 'Copyright : Creative Commons'; 

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;
}

/* Section New property */

function apropos_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);
  $html_str .= irp_provide ('apropos_display_section', $here);
  $html_str .= irp_provide ('pervasive_html_final_section', $here);


  exiting_from_function ($here);

  return $html_str;
}

# exiting_from_module ($module);

?>