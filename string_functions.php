<?php

/* require_once "common_html_functions.php";  */
require_once "management_functions.php";
require_once "file_functions.php";

$module = "string_functions";
# entering_in_module ($module);

function remove_control_M ($str) {
  $here = __FUNCTION__;
#  entering_in_function ($here . "($str)");

  $str = preg_replace ('/(\r\n|\r|\n)/m', '', $str); 

#  exiting_from_function ($here . "($str)");
  return $str;

}

function string_html_capitalized_of_string ($str) {
  $here = __FUNCTION__;
#  entering_in_function ($here . "($str)");
  
  $str_htm = htmlentities ($str, ENT_NOQUOTES); 
  $sub_7 = substr ($str_htm, 0, 7);

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

#  exiting_from_function ($here . "($str)");

  return $str;
};

function string_remove_html_entities ($html_str) {
  $here = __FUNCTION__;
#  entering_in_function ($here . "($html_str)");

  $str = preg_replace ('#&([A-za-z])(?:acute|grave|cedil|circ|orn|ring|slash|th|tilde|uml);#', '\1', $html_str);

#  exiting_from_function ($here . "($str)");

  return $str;
};

function string_remove_accents ($str) {
  $here = __FUNCTION__;
#  entering_in_function ($here . "($str)");
  
  /* get html translation of é à etc...*/
  $html_str = htmlentities ($str, ENT_NOQUOTES, "UTF-8"); 
  /* replace html form */
  $str = string_remove_html_entities ($html_str);

#  exiting_from_function ($here . "($str)");

  return $str;
};

function word_remove_accents ($str, $charset='utf-8')  /* why two functions ??? FCC 6th March 2016*/ 
{
  $here = __FUNCTION__;
#  entering_in_function ($here . "($str)");
 
  /* get html translation of é à etc...*/
  $str = htmlentities ($str, ENT_NOQUOTES, $charset); 
  
  $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
  $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
  $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères
  
#  exiting_from_function ($here . "($str)");  
  return $str;
}

function replace_accents_to_html_code ($str) {
  $here = __FUNCTION__;
  #  entering_in_function ($here . "($str)");
 
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
  
#  exiting_from_function ($here . "($str)");  
  return $str;
}

function create_array_of_string_before_and_after_cleaning ($str_bef, $str_aft) {
  $here = __FUNCTION__;
#  entering_in_function ($here . " ($str_bef, $str_aft)");

#  exiting_from_function ($here);
}

function is_empty_of_string ($str) {
  $here = __FUNCTION__;
#  entering_in_function ($here . " ($str)");
  /* debug_n_check ($here , "input string", $str); */
  
  $bol = empty ($str); 
  
  /* if ($bol){ */
  /*     debug_n_check ($here , "output string", "TRUE"); */
  /* } */
  /* else { */
  /*     debug_n_check ($here , "output string", "FALSE"); */
  /* } */

#  exiting_from_function ($here . " ($str)");

  return $bol;
};

function check_is_empty_of_here_of_string ($her, $str) {
  $here = __FUNCTION__;
#  entering_in_function ($here . " ($str)");
  /* debug_n_check ($here , "input string", $str); */
  
  if (is_empty_of_string ($str)){
      print_fatal_error ($here,
      "Argument string of function $her were not empty",
      "it is empty",
      "Check");
  }

#  exiting_from_function ($here . " ($str)");

  return $bol;
};

function word_name_capitalized_of_string_surname ($str, $encoding='utf-8') {
  $here = __FUNCTION__;
#  entering_in_function ($here . " ($str)");

  $str_bef = $str;

  $str = remove_control_M ($str);
  $str = string_remove_accents ($str, $encoding='utf-8');
  $str = trim ($str);
  $str = str_replace(' ', '_', $str);
  $str = str_replace('\'', '_', $str);
  $str = strtolower ($str);
  $str = ucfirst ($str);

  /* $str = preg_replace ('#&([A-za-z]{2})(?:lig);#', '\1', $str); */
  /* $str = preg_replace ('#&[^;]+;#', '', $str); */

#  exiting_from_function ($here . " ($str)");
  
  return $str;
};

function string_name_of_surname_capitalize ($str, $encoding='utf-8') {
  $here = __FUNCTION__;
#  entering_in_function ($here . " ($str)");
  
  $str = word_name_capitalized_of_string_surname ($str, $encoding='utf-8');
  $str = ucfirst ($str);
  
#  exiting_from_function ($here . " ($str)");
  
  return $str;
};

function string_name_of_surname_lowercase ($str, $encoding='utf-8') {
  $here = __FUNCTION__;
#  entering_in_function ($here . " ($str)");

  $str = word_name_capitalized_of_string_surname ($str, $encoding='utf-8');
  $str = strtolower ($str);

#  exiting_from_function ($here . " ($str)");
  
  return $str;
}

function is_item_name ($nam_ite){
  $here = __FUNCTION__;
#  entering_in_function ($here . " ($nam_ite)");

  $result = preg_match ('/^[A-Z][A-Za-z_]*$/', $nam_ite);
  
#  exiting_from_function ($here . " ($nam_ite)");
  return $result;
}

function check_item_name ($nam_ite){
  $here = __FUNCTION__;
#  entering_in_function ($here . " ($nam_ite)");
  /* debug_n_check ($here , "input item name", $nam_ite); */

  if ( ! is_item_name ($nam_ite)) {
    fatal_error ($here, "item name >$nam_ite< is NOT canonical");
  }

#  exiting_from_function ($here . " ($nam_ite)");
}

function is_block_current_name ($nam_blo){
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_blo)");

  $result = preg_match ('/^[A-Z][A-Za-z_]*$/', $nam_blo);
  
  exiting_from_function ($here . " for block_current_name >$nam_blo< is ". string_of_boolean ($result));
  return $result;
}

function check_block_current_name ($nam_blo){
  $here = __FUNCTION__;
#  entering_in_function ($here . " ($nam_blo)");
  /* debug_n_check ($here , "input block name", $nam_blo); */

  if ( ! is_block_current_name ($nam_blo)) {
    fatal_error ($here, "block name >$nam_blo< is NOT canonical");
  }

#  exiting_from_function ($here . " ($nam_blo)");
}

function item_content_clean ($con_ite) {
  $here = __FUNCTION__;
#  entering_in_function ($here . " ($con_ite)");
  /* debug_n_check ($here , "input string", $con_ite); */

  $con_ite = remove_control_M ($con_ite);
  $con_ite = trim ($con_ite);

  /* debug_n_check ($here , "output item content", $con_ite); */
#  exiting_from_function ($here);
  
  return $con_ite;

}

function is_entry_name ($nam_ent){
  $here = __FUNCTION__;
#  entering_in_function ($here . " ($nam_ent)");

  /* debug_n_check ($here , "input entry_name name", $nam_ent); */

  $result = preg_match ('/^[A-Z][a-z_]*[a-z]$/', $nam_ent);

/* is also directory name */
  /* debug_n_check ($here , "result", $result); */
#  exiting_from_function ($here . " ($nam_ent)");
  return $result;
}

function check_entry_name ($nam_ent){
  $here = __FUNCTION__;
#  entering_in_function ($here . " ($nam_ent)");
  /* debug_n_check ($here , "input entry_name name", $nam_ent); */

  if ( ! is_entry_name ($nam_ent)) {
    fatal_error ($here, "entry_name >$nam_ent< is NOT canonical");
  }

#  exiting_from_function ($here . " ($nam_ent)");
}

function is_label_name ($nam_lab){
  $here = __FUNCTION__;
#  entering_in_function ($here . " ($nam_lab)");

  /* debug_n_check ($here , "input label_name name", $nam_lab); */

  $result = preg_match ('/^[a-z][a-z_]*[a-z]$/', $nam_lab);

  /* debug_n_check ($here , "result", $result); */
#  exiting_from_function ($here . " ($nam_lab)");
  return $result;
}

function check_label_name ($nam_lab){
  $here = __FUNCTION__;
#  entering_in_function ($here . " ($nam_lab)");
  /* debug_n_check ($here , "input label_name name", $nam_lab); */

  if ( ! is_label_name ($nam_lab)) {
    print_fatal_error ($here, 
    "label_name >$nam_lab< were canonical",
    "it is NOT",
    "Check");
  }

#  exiting_from_function ($here . " ($nam_lab)");
}

function today () {
  /* nothing before date */
  date_default_timezone_set ("Europe/Paris");
  $str = date("j F Y à G\hi:s");  
  return $str;
};

function string_replace_if_exists ($here, $str_fro, $str_to, $str) {
    
    if (substr_count ($str, $str_fro) != 0) {
        $new_str = str_replace ($str_fro, $str_to, $str);
    }
    else {
        $new_str = $str;
    }  
    
    return $new_str;
    
}

function string_replace ($here, $str_fro, $str_to, $str) {

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
    if (is_empty_of_string ($str) || is_empty_of_string ($sub_str) || is_array ($str)) {
        $boo = false;
    }
    else {
        $boo = substr_count ($str, $sub_str) > 0;
    }
    return $boo; 
}

function last_word_of_string ($str) {
    $wor_a = explode (" ", $str);
    $wor = end ($wor_a);
    return $wor;
}

function word_of_index_of_string ($idx, $str) {
    $wor_a = explode (" ", $str);
    $wor = $wor_a[$idx];
    return $wor;
}

function word_of_ordinal_of_string ($ord, $str) {
    $wor = word_of_index_of_string ($ord -1, $str);
    return $wor;
}

function string_of_boolean ($boo) {
    
    if ($boo == 1) { $str = 'TRUE';}
    else {$str = 'FALSE';}
    
    return $str;
}

function pretty_string_of_array ($str_a, $ind) {
    $blanks = "               ";
    $out_str = '';
    foreach ($str_a as $key => $value) {
        if (is_array($value)) {

            $out_str .= substr ($blanks, 0, $ind) . " array  >$key<<br>";
            $out_str .= pretty_string_of_array ($value, ($ind + 2));
        }
        else {
            $out_str .= substr ($blanks, 0, $ind) . '  [' . $key . '] = '. $value . "<br>";
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
          if ($result_a[$key] != "") {
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

?>
