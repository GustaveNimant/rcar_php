<?php
require_once "management_functions.php";
require_once "file_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function string_remove_control_M ($str) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($str)");

  $str = preg_replace ('/(\r\n|\r|\n)/m', '', $str); 

  exiting_from_function ($here . " ($str)");
  return $str;

}

function string_html_capitalized_of_string ($str) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($str)");
  
  $str_htm = htmlentities ($str, ENT_NOQUOTES, "UTF-8"); 
  $sub_7 = substr ($str_htm, 0, 7);

  switch ($sub_7) {
  case '&acirc;'  :
      $str[0]= 'A';
      $str[1]= '';
      break;
  case '&aacute' :
      $str[0]= 'A';
      $str[1]= '';
      break;
  case '&agrave' :
      $str[0]= 'A';
      $str[1]= '';
      break;
  case '&ecirc;'  :
      $str[0]= 'E';
      $str[1]= '';
      break;
  case '&eacute' :
      $str[0]= 'E';
      $str[1]= '';
      break;
  case '&egrave' :
      $str[0]= 'E';
      $str[1]= '';
      break;
  case '&ugrave' :
      $str[0]= 'U';
      $str[1]= '';
      break;
  case '&icirc;'  :
      $str[0]= 'I';
      $str[1]= '';
      break;
  default :
    $str = ucfirst ($str);
  }

  exiting_from_function ($here . " ($str)");

  return $str;
};

function string_remove_html_entities ($html_str) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($html_str)");

  $str = preg_replace ('#&([A-za-z])(?:acute|grave|cedil|circ|orn|ring|slash|th|tilde|uml);#', '\1', $html_str);

  exiting_from_function ($here . " ($str)");

  return $str;
};

function string_remove_accents ($str) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($str)");
  
  /* get html translation of é à etc...*/
  $html_str = htmlentities ($str, ENT_NOQUOTES, "UTF-8"); 
  /* replace html form */
  $str = string_remove_html_entities ($html_str);

  exiting_from_function ($here . " ($str)");

  return $str;
};

function string_word_remove_accents ($str, $charset='utf-8')  /* why two functions ??? FCC 6th March 2016*/ {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($str)");
 
  /* get html translation of é à etc...*/
  $str = htmlentities ($str, ENT_NOQUOTES, $charset); 
  
  $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
  $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
  $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères
  
  exiting_from_function ($here . " ($str)");  
  return $str;
}

function string_replace_accents_to_html_code ($str) {
  $here = __FUNCTION__;
    entering_in_function ($here . " ($str)");
 
  $str = str_replace('á', '&aacute;', $str);
  $str = str_replace('à', '&agrave;', $str);
  $str = str_replace('â', '&acirc;', $str);
  $str = str_replace('ä', '&auml;', $str);

  $str = str_replace('é', '&eacute;', $str);
  $str = str_replace('è', '&egrave;', $str);
  $str = str_replace('ê', '&ecirc;', $str);
  $str = str_replace('ë', '&euml;', $str);

  $str = str_replace('î', '&icirc;', $str);
  $str = str_replace('ï', '&iuml;', $str);

  $str = str_replace('ô', '&ocirc;', $str);
  $str = str_replace('ö', '&ouml;', $str);

  $str = str_replace('û', '&ucirc;', $str);
  $str = str_replace('ü', '&uuml;', $str);

  $str = str_replace('ç', '&ccedil;', $str);
  
  exiting_from_function ($here . " ($str)");  
  return $str;
}

function string_is_empty_of_string ($str) {
  $here = __FUNCTION__;
  
  $bol = empty ($str); 
  
  return $bol;
};

function string_check_is_empty_of_where_of_string ($her, $str) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($str)");
  /* debug_n_check ($here , "input string", $str); */
  
  if (string_is_empty_of_string ($str)){
      print_fatal_error ($here,
      "Argument string of function $her were not empty",
      "it is empty",
      "Check");
  }

  exiting_from_function ($here . " ($str)");

  return;
};

function word_name_capitalized_of_string_surname ($str, $encoding='utf-8') {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($str)");

  $str_bef = $str;

  $str = string_remove_control_M ($str);
  $str = string_remove_accents ($str, $encoding='utf-8');
  $str = trim ($str);
  $str = str_replace(' ', '_', $str);
  $str = str_replace('\'', '_', $str);
  $str = strtolower ($str);
  $str = ucfirst ($str);

  /* $str = preg_replace ('#&([A-za-z]{2})(?:lig);#', '\1', $str); */
  /* $str = preg_replace ('#&[^;]+;#', '', $str); */

  exiting_from_function ($here . " ($str)");
  
  return $str;
};

function string_name_of_surname_capitalize ($str, $encoding='utf-8') {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($str)");
  
  $str = word_name_capitalized_of_string_surname ($str, $encoding='utf-8');
  $str = ucfirst ($str);
  
  exiting_from_function ($here . " ($str)");
  
  return $str;
};

function string_name_of_surname_lowercase ($str, $encoding='utf-8') {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($str)");

  $str = word_name_capitalized_of_string_surname ($str, $encoding='utf-8');
  $str = strtolower ($str);

  exiting_from_function ($here . " ($str)");
  
  return $str;
}

function string_is_item_name_of_string ($nam_ite){
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ite)");

  $result = preg_match ('/^[A-Z][A-Za-z_]*$/', $nam_ite);
  
  exiting_from_function ($here . " ($nam_ite)");
  return $result;
}

function check_item_name ($nam_ite){
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ite)");
  /* debug_n_check ($here , "input item name", $nam_ite); */

  if ( ! string_is_item_name_of_string ($nam_ite)) {
    fatal_error ($here, "item name >$nam_ite< is NOT canonical");
  }

  exiting_from_function ($here . " ($nam_ite)");
  return;
}

function is_block_current_name ($nam_blo){
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_blo)");

  $boo = preg_match ('/^[A-Z][A-Za-z_]*$/', $nam_blo);
  
  exiting_from_function ($here . " for block_current_name >$nam_blo< is ". string_of_boolean ($boo));
  return $boo;
}

function check_block_current_name ($nam_blo){
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_blo)");
  /* debug_n_check ($here , "input block name", $nam_blo); */

  if ( ! is_block_current_name ($nam_blo)) {
    fatal_error ($here, "block name >$nam_blo< is NOT canonical");
  }

  exiting_from_function ($here . " ($nam_blo)");
  return;
}

function item_content_clean ($con_ite) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($con_ite)");
  /* debug_n_check ($here , "input string", $con_ite); */

  $con_ite = string_remove_control_M ($con_ite);
  $con_ite = trim ($con_ite);

  /* debug_n_check ($here , "output item content", $con_ite); */
  exiting_from_function ($here);
  
  return $con_ite;

}

function string_is_entry_name_of_string ($nam_ent){
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent)");

  /* debug_n_check ($here , "input entry_name name", $nam_ent); */

  $boo = preg_match ('/^[A-Z][a-z_]*[a-z]$/', $nam_ent);

/* is also directory name */
  /* debug_n_check ($here , "result", $boo); */
  exiting_from_function ($here . " ($nam_ent)");
  return $boo;
}

function string_check_entry_name_of_string ($nam_ent){
    $here = __FUNCTION__;
      entering_in_function ($here . " ($nam_ent)");
    /* debug_n_check ($here , "input entry_name name", $nam_ent); */
    
    if ( ! string_is_entry_name_of_string ($nam_ent)) {
        fatal_error ($here, "entry_name >$nam_ent< is NOT canonical");
    }
    
    exiting_from_function ($here . " ($nam_ent)");
    return;
}

function is_label_name ($nam_lab){
    $here = __FUNCTION__;
      entering_in_function ($here . " ($nam_lab)");
    
    /* debug_n_check ($here , "input label_name name", $nam_lab); */
    
    $boo = preg_match ('/^[a-z][a-z_]*[a-z]$/', $nam_lab);
    
    /* debug_n_check ($here , "result", $boo); */
      exiting_from_function ($here . " ($nam_lab)");
    return $boo;
}

function check_label_name ($nam_lab){
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_lab)");
  /* debug_n_check ($here , "input label_name name", $nam_lab); */

  if ( ! is_label_name ($nam_lab)) {
    print_fatal_error ($here, 
    "label_name >$nam_lab< were canonical",
    "it is NOT",
    "Check");
  }

  exiting_from_function ($here . " ($nam_lab)");
  return;
}

function today () {
  $here = __FUNCTION__;
  /* nothing before date */
  date_default_timezone_set ("Europe/Paris");
  $str = date("j F Y à G\hi:s");  
  return $str;
};

function string_replace_if_exists ($here, $str_fro, $str_to, $str) {
     $here = __FUNCTION__; 
    if (substr_count ($str, $str_fro) != 0) {
        $new_str = str_replace ($str_fro, $str_to, $str);
    }
    else {
        $new_str = $str;
    }  
    
    return $new_str;
    
}

function string_replace ($here, $str_fro, $str_to, $str) {
  $here = __FUNCTION__;
  if (substr_count ($str, $str_fro) != 0) {
    $new_str = str_replace ($str_fro, $str_to, $str);
  }
  else {
      print_fatal_error (
          "in string_replace called by $here",
          "string >$str< did contain string >$str_fro<",
          "it does NOT",
          "Check"
    );
  }
  /* if ( ! strpos ($str, $str_fro)) {  */
  
  return $new_str;

}

function is_substring_of_substring_off_string ($sub_str, $str) { 
  $here = __FUNCTION__;
    if (string_is_empty_of_string ($str) || string_is_empty_of_string ($sub_str) || is_array ($str)) {
        $boo = false;
    }
    else {
        $boo = substr_count ($str, $sub_str) > 0;
    }
    return $boo; 
}

function string_last_word_of_string ($str) {
  $here = __FUNCTION__;
    $wor_a = explode (" ", $str);
    $wor = current ($wor_a);
    return $wor;
}

function string_word_of_index_of_string ($idx, $str) {
  $here = __FUNCTION__;
    $wor_a = explode (" ", $str);
    $wor = $wor_a[$idx];
    return $wor;
}

function string_word_of_ordinal_of_string ($ord, $str) {
    $here = __FUNCTION__;
    $wor_a = explode (" ", $str);
    $wor = $wor_a[$ord-1];
    return $wor;
}

function string_first_word_of_string ($str) {
  $here = __FUNCTION__;
  
  $wor_a = explode (" ", $str);
  $wor = $wor_a[0];
  return $wor;
}

function string_of_boolean ($boo) {
    $here = __FUNCTION__;
    
    if ($boo == 1) { $str = 'TRUE';}
    else {$str = 'FALSE';}
    
    return $str;
}

function pretty_string_of_array_of_index_of_eol ($str_a, $ind, $eol) {
    $here = __FUNCTION__;
    $blanks = "               ";
    $out_str = '';
    
    foreach ($str_a as $key => $val) {
        if (is_array($val)) {
            $out_str .= substr ($blanks, 0, $ind) . " array  >$key<$eol";
            $out_str .= pretty_string_of_array_of_index_of_eol ($val, ($ind + 2), $eol);
        }
        else {
            $out_str .= substr ($blanks, 0, $ind) . '  [' . $key . '] = '. $val . $eol;
        }
    }
    return $out_str;
};

function four_elements_array_of_four_keys_off_string ($key_1, $key_2, $key_3, $key_4, $str) {  
    $here = __FUNCTION__;
    entering_in_function ($here . " ($key_1, $key_2, $key_3, $key_4, $str)");
    
    $str_a = explode ("\n", $str);
    debug ($here, '$str_a', $str_a);
    
    $result_a = array ();
    foreach ($str_a as $k => $str) {
        $str_t = trim ($str);
        switch ($str_t) {
        case "$key_1" :
            $key = $str_t;
            break;
        case "$key_2" :
            $key = $str_t;
            break;
        case "$key_3" :
            $key = $str_t;
            break; 
        case "$key_4" :
            $key = $str_t;
            break; 
        default:
            if ( (isset ($result_a[$key])) && 
            ($result_a[$key] != "") ) {
                $result_a[$key] .= "\n";
                $result_a[$key] .= $str_t;
            }
            else {
                $result_a[$key] = $str_t;
            }
            break;
        }
    }
    
    debug ($here, '$result_a', $result_a);
    exiting_from_function ($here);
    
    return $result_a;
}
function is_filename_extension ($ext) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($ext)");
    
    $ext_blo = $_SESSION['parameters']['extension_block_filename'];
    $ext_cat = $_SESSION['parameters']['extension_block_name_catalog_filename'];
    $ext_com = $_SESSION['parameters']['extension_item_comment_filename'];
    
    $result = ($ext == $ext_blo)
        || ($ext == $ext_cat)
        || ($ext == $ext_com)
        ;
    
    #  debug_n_check ($here , "result ", $result);
    exiting_from_function ($here);
    
    return $result;
};

function is_item_comment_filename_extension ($ext) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($ext)");
    
    $ext_txt = $_SESSION['parameters']['extension_item_comment_filename'];
    
    $result = ($ext == $ext_txt);
    
    exiting_from_function ($here);
    
    return $result;
};

function is_block_text_filename_extension ($ext) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($ext)");

  $ext_txt = $_SESSION['parameters']['extension_block_filename'];

  $result = ($ext == $ext_txt);

  exiting_from_function ($here);

  return $result;

};

function check_block_text_filename_extension ($ext){
  $here = __FUNCTION__;
  entering_in_function ($here . " ($ext)");
  /* debug_n_check ($here , "input block name", $ext); */

  if ( ! is_block_text_filename_extension ($ext)) {
    fatal_error ($here, "block text filename extension >$ext< is NOT canonical");
  }

  exiting_from_function ($here . " ($ext)");

  return;
}

function string_of_separator_of_any_variable ($sep, $var) {
  $here = __FUNCTION__;

  if (is_array ($var)) {
      $str = array_serialize_of_separator_of_array_by_key ($sep, $var);
  }
  else {
      $str = $var;
  }
  
  return $str;
}

function string_capitalize_of_array ($arr_a) {
    $here = __FUNCTION__;
      entering_in_function ($here);
    #  # debug_n_check ($here , "input array", $arr_a); 
    
    foreach ($arr_a as $key => $val) {
        $out_arr[$key] = ucfirst ($val);
    }
    
    #  debug_n_check ($here , "output array", $out_arr); 
      exiting_from_function ($here);
    
    return $out_arr;
};

#  exiting_from_module ($module);

?>
