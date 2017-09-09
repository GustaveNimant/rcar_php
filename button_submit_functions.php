<?php

require_once "common_html_functions.php";
require_once "language_translate_functions.php";
require_once "button_functions.php";

$module = module_name (__FILE__);
# entering_in_module ($module);

function button_submit_quit_html_make ($lan) {
  $here = __FUNCTION__;
  entering_in_function ($here, " ($lan)");

  $script_action = 'quit.php';
  debug_n_check ($here , "script_action", $script_action);

  $html_str  = "";
  $html_str .= "\n";
  $html_str .= '<form action="' . $script_action . '" method="get"> ' . "\n";
  $html_str .= '  <input type="submit" value="';
  $html_str .= ucfirst (language_translate_of_en_string_of_language ('quit', $lan));
  $html_str .= '" title="';
  $html_str .= ucfirst (language_translate_of_en_string_of_language ('delete browsing data', $lan));
  $html_str .= '" font-variant:small-caps; background-color:red"> ' . "\n";
  $html_str .= '</form> ' . "\n";
  
  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);
  
  return $html_str;
};

function button_submit_hidden_hidden_make ($nam_ent, $nam_ite, $val_sub, $tit_but) {
  $here = __function__;
  entering_in_function ($here);

  debug_n_check ($here , " input entry_name name", $nam_ent);
  debug_n_check ($here , " input item name", $nam_ite);
  debug_n_check ($here , " input submit value", $val_sub);
  debug_n_check ($here , " input button title", $tit_but);

  $html_str = '';
  $html_str .= '<input type="hidden" name="entry_name" value="';
  $html_str .= $nam_ent;
  $html_str .= '" /> ' .  "\n";

  $html_str .= '<input type="hidden" name="item_name" value="';
  $html_str .= $nam_ite;
  $html_str .= '" /> '. "\n";

  $html_str .= '<input type="submit" value="'. $val_sub .'" title="' . $tit_but . '"/> ';

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;

}

function button_submit_justify_justify ($nam_ent, $nam_ite) {
  $here = __function__;
  entering_in_function ($here);

  debug_n_check ($here , " input entry_name name", $nam_ent);
  debug_n_check ($here , " input item name", $nam_ite);

  global $item_justification_filename_extension;
  $ext_jus = $item_justification_filename_extension;

  $hdir = specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);
  $nof_j = $nam_ite . '.' . $ext_jus;

  $path = $hdir . $nof_j;
  $con_jus = file_content_read($path);

  $tit  = '';
  $tit .= language_translate_of_en_string_of_language ('modify the justification for', $lan);
  $tit .= ' > ' . $nam_ite . "<\n";
  $tit .= $con_jus;

  $val_sub = language_translate_of_en_string_of_language ('justification', $lan);

  $script_action_j  = script_array_retrieve_module_of_function ($here);

  $html_str =  '';
 
  $html_str .= '<form action="' . $script_action_j;
  $html_str .= '" method="get"> ' .  "\n";
  $html_str .= button_submit_hidden_hidden_make ($nam_ent, $nam_ite, $val_sub, $tit);
  $html_str .= '</form> ' . "\n";


  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;

}

function button_submit_item_delete_of_entry_name_of_item_name_of_item_name_array ($nam_ent, $nam_ite, $nam_ite_a) {
  $here = __function__;
  entering_in_function ($here, "($nam_ent, $nam_ite, $nam_ite_a[0])");
  # debug_n_check ($here , '$nam_ite_a', $nam_ite_a);

  $tit  = '';
  $tit .= language_translate_of_en_string_of_language ('remove property', $lan);
  $tit .= ' > ' . $nam_ite . "<\n";

  $val_sub = language_translate_of_en_string_of_language ('remove', $lan);

  $script_action_s = script_array_retrieve_module_of_function ($here);

  $cou = count ($nam_ite_a);

  $html_str =  '';
  if ( $cou > 1 ) {
    $html_str .= '<form action="' . $script_action_s;
    $html_str .= '" method="get"> ' .  "\n"; 
    $html_str .= button_submit_hidden_hidden_make ($nam_ent, $nam_ite, $val_sub, $tit);
    $html_str .= '</form> ' . "\n";
  }

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;

}

function button_submit_modify_item_content ($nam_ent, $nam_ite) {
  $here = __function__;
  entering_in_function ($here);

  debug_n_check ($here , " input entry_name name", $nam_ent);
  debug_n_check ($here , " input item name", $nam_ite);

  $tit  = '';
  $tit .= language_translate_of_en_string_of_language ('edit property', $lan);
  $tit .= ' > ' . $nam_ite . "<\n";

  $val_sub = language_translate_of_en_string_of_language ('edit', $lan);

  $script_action_e  = script_array_retrieve_module_of_function ($here);

  $html_str =  '';

  $html_str .= '<form action="' . $script_action_e;
  $html_str .= '" method="get"> ' .  "\n";
  $html_str .= button_submit_hidden_hidden_make ($nam_ent, $nam_ite, $val_sub, $tit);
  $html_str .= '</form> ' . "\n";


  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;

}

function button_submit_modify_item_name ($nam_ent, $nam_ite) {
  $here = __FUNCTION__;
  entering_in_function ($here);
  debug_n_check ($here , "input item name", $nam_ite);
  debug_n_check ($here , "input entry_name name", $nam_ent);

  $la_str = language_translate_of_en_string_of_language ('Rename the property', $lan);

  $tit = $la_str . ' > ' . $nam_ite . "<\n";
  $val_sub = language_translate_of_en_string_of_language ('Rename', $lan);

  $script_action_m  = script_array_retrieve_module_of_function ($here);

  $html_str  = "";
  $html_str .= '<form action="' . $script_action_m;
  $html_str .= '" method="get"> ' .  "\n";
  $html_str .= button_submit_hidden_hidden_make ($nam_ent, $nam_ite, $val_sub, $tit);
  $html_str .= '</form> ' . "\n"; 

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}


function button_submit_to_return_of_surname_by_name_array_of_module_nameoffile_of_entry_name ($sur_by_nam_a, $nof_mod, $nam_ent) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nof_mod, $nam_ent");

  $sur_ent = surname_of_name_of_surname_by_name_array ($nam_ent, $sur_by_nam_a);
  $val_but = language_translate_of_en_string_of_language ('back to the entry', $lan);
  $val_but = ucfirst ($val_but);

  $script_action = $nof_mod . '?entry_name=' . $nam_ent;
  debug_n_check ($here , "script_action", $script_action);

  $_SESSION['irp_father']['entity_list'] = $here;

  $html_str  = '';
  $html_str .= '<center> ';
  $html_str .= '  <form action="' . $script_action . '"' . "\n";
  $html_str .= '" method="get"> ' . "\n";
  $html_str .= '     <input type="submit" value="';
  $html_str .= $val_but . ' ' . $sur_ent;
  $html_str .= '"> ' ."\n";
  $html_str .= '  </form> ';
  $html_str .= '</center> ';
 
  exiting_from_function ($here);

  return $html_str;
}

function button_submit_of_button_value_en_of_language ($en_val_but, $lan) {
  $here = __FUNCTION__;
  entering_in_function ($here . "($en_val_but, $lan)");

  $la_Val_but = ucfirst (language_translate_of_en_string_of_language ($en_val_but, $lan));

  $html_str  = '';
  $html_str .= '    <input type="submit" value="';
  $html_str .= $la_Val_but;
  $html_str .= '"> ' . "\n";

  exiting_from_function ($here);

  return $html_str;
}

function button_submit_centered_of_button_value_en_of_language ($en_val_but, $lan) {
  $here = __FUNCTION__;
  entering_in_function ($here . "($en_val_but, $lan)");

  $html_str  = '';
  $html_str .= '  <center> ' . "\n";
  $html_str .= button_submit_of_button_value_en_of_language ($en_val_but, $lan);
  $html_str .= '  </center> ' . "\n";

  exiting_from_function ($here);

  return $html_str;
}

# exiting_from_module ($module);

?>