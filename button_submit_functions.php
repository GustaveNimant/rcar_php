<?php

require_once "common_html_library.php";
require_once "language_translate_library.php";
require_once "button_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);
entering_in_module ($module);

function button_submit_quit_html_make () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $script_action = 'quit_script.php';

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<form action="' . $script_action . '" method="get">' . "\n";
  $html_str .= '<input type="submit" value="';
  $html_str .= ucfirst (language_translate_of_en_string ('quit'));
  $html_str .= '" title="';
  $html_str .= ucfirst (language_translate_of_en_string ('remove browsing data'));
  $html_str .= '" font-variant:small-caps; background-color:red>' . "\n";
  $html_str .= '</form> ' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);
  
  return $html_str;
};

function button_submit_hidden_hidden_make ($nam_ent, $nam_ite, $val_sub, $tit_but) {
  $here = __function__;
  entering_in_function ($here . " ($nam_ent, $nam_ite, $val_sub, $tit_but)");

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<input type="hidden" name="entry_current_name" value="';
  $html_str .= $nam_ent;
  $html_str .= '" /> ' .  "\n";

  $html_str .= '<input type="hidden" name="item_name" value="';
  $html_str .= $nam_ite;
  $html_str .= '" /> '. "\n";

  $html_str .= '<input type="submit" value="'. $val_sub .'" title="' . $tit_but . '"/> ';
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function button_submit_item_remove_of_entry_name_of_item_name_of_item_name_array ($nam_ent, $nam_ite, $nam_ite_a) {
  $here = __function__;
  entering_in_function ($here, "($nam_ent, $nam_ite, $nam_ite_a[0])");
  # debug_n_check ($here , '$nam_ite_a', $nam_ite_a);

  $tit  = '';
  $tit .= language_translate_of_en_string ('remove property');
  $tit .= ' > ' . $nam_ite . "<\n";

  $val_sub = language_translate_of_en_string ('remove');

  $script_action_s = script_array_retrieve_module_of_function ($here);

  $cou = count ($nam_ite_a);

  $html_str  = comment_entering_of_function_name ($here);
  if ( $cou > 1 ) {
    $html_str .= '<form action="' . $script_action_s;
    $html_str .= '" method="get"> ' .  "\n"; 
    $html_str .= button_submit_hidden_hidden_make ($nam_ent, $nam_ite, $val_sub, $tit);
    $html_str .= '</form> ' . "\n";
  }
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;

}

function button_submit_modify_item_content ($nam_ent, $nam_ite) {
  $here = __function__;
  entering_in_function ($here);

  debug_n_check ($here , " input entry_current_name name", $nam_ent);
  debug_n_check ($here , " input item name", $nam_ite);

  $tit  = '';
  $tit .= language_translate_of_en_string ('edit property');
  $tit .= ' > ' . $nam_ite . "<\n";

  $val_sub = language_translate_of_en_string ('edit');

  $script_action_e  = script_array_retrieve_module_of_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<form action="' . $script_action_e;
  $html_str .= '" method="get"> ' .  "\n";
  $html_str .= button_submit_hidden_hidden_make ($nam_ent, $nam_ite, $val_sub, $tit);
  $html_str .= '</form> ' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;

}

function button_submit_modify_item_name ($nam_ent, $nam_ite) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent, $nam_ite)");

  $kin_blo = irp_provide ('entry_block_kind', $here);

  $en_txt = 'rename the '; 
  $la_Txt = ucfirst (language_translate_of_en_string ($en_txt) ) . $kin_blo;

  $la_Tit = $la_Txt . ' >' . $nam_ite . "<\n";
  $val_sub = language_translate_of_en_string ('Rename');

  $script_action_m  = script_array_retrieve_module_of_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<form action="' . $script_action_m;
  $html_str .= '" method="get"> ' .  "\n";
  $html_str .= button_submit_hidden_hidden_make ($nam_ent, $nam_ite, $val_sub, $la_Tit);
  $html_str .= '</form> ' . "\n"; 
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function button_submit_to_return_of_surname_by_name_hash_of_module_nameoffile_of_entry_name ($sur_by_nam_h, $nof_mod, $nam_ent) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nof_mod, $nam_ent");

  $sur_ent = surname_of_name_of_surname_by_name_hash ($nam_ent, $sur_by_nam_h);
  $val_but = language_translate_of_en_string ('back to the entry');
  $val_but = ucfirst ($val_but);

  $script_action = $nof_mod . '?entry_current_name=' . $nam_ent;
  debug_n_check ($here , "script_action", $script_action);

  $_SESSION['irp_father']['entity_list'] = $here;

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center> ';
  $html_str .= '  <form action="' . $script_action . '"' . "\n";
  $html_str .= '" method="get"> ' . "\n";
  $html_str .= '     <input type="submit" value="';
  $html_str .= $val_but . ' ' . $sur_ent;
  $html_str .= '"> ' ."\n";
  $html_str .= '  </form> ';
  $html_str .= '</center> ';
  $html_str .= comment_exiting_of_function_name ($here); 
  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>