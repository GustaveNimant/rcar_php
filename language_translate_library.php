<?php

require_once "array_library.php";
require_once "language_library.php";
require_once "language_translate_hash.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

function language_translate_of_en_string ($en_str) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($en_str)");

  $lan = $_SESSION['parameters']['language'];
  $language_translate_hash = $_SESSION['language_translate_hash'];
  
  if ($lan == 'en') {
      $la_str = $en_str;
  } else {
      $la_str = $language_translate_hash[$en_str][$lan];
  }

  if (isset ($la_str)){
      if ($la_str == '...') {
          print_fatal_error ($here, 
          "english sentence >$en_str< had a translation to language >$lan<",
          "translation has not yet been given",
          "replace ... by the translation in <b><i>language_translate_hash.php</i></b>");
      }
  }
  else {
      debug ($here, '$language_translate_hash', $language_translate_hash);
      
      $mes = "add these lines to module language_translate_hash.php :<br><br>" . 
          "&nbsp;&nbsp;&nbsp;'" . $en_str ."' => <br>" . 
          "&nbsp;&nbsp;&nbsp;array (<br>" . 
          "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'fr' => '...',<br>" . 
          "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'it' => '???',<br>" . 
          "&nbsp;&nbsp;&nbsp;),";
      
      print_fatal_error ($here, 
      "english sentence >$en_str< had a translation to language >$lan<",
      "NO such translation exists",
      $mes);
  }

#  debug_n_check ($here , "$en_str in $lan is", $la_str);
  exiting_from_function ($here . " ($en_str)");
  
  return $la_str;  
}

function language_translate_texts_english_by_language_hash () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  include "language_translate_hash.php";

  foreach ($language_translate_hash as $en_str => $val_a) {
    $la_str = $val_a [$lan];
    $en_txt_by_la_txt_h [$la_str] = $en_str;
  }

#  debug_n_check ($here , '$en_txt_by_la_txt_h', $en_txt_by_la_txt_h);
  exiting_from_function ($here);
  
  return $en_txt_by_la_txt_h;
}

function language_translate_to_english_of_la_string ($la_str) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($la_str)"); 

  $lan = $_SESSION['parameters']['language'];
  debug_n_check ($here , '$lan', $lan);

  if ($lan == 'en') {
    $en_str = $la_str;
  }
  else {
      debug_n_check ($here , '$la_str', $la_str);
      $la_str_h = htmlentities ($la_str);
      debug_n_check ($here , '$la_str_h', $la_str_h);
      $en_txt_by_la_txt_h = language_translate_texts_english_by_language_hash ();
      debug_n_check ($here , '$en_txt_by_la_txt_h', $en_txt_by_la_txt_h);
      
      if (array_key_exists ($la_str_h, $en_txt_by_la_txt_h) ) {
          $en_str = $en_txt_by_la_txt_h[$la_str_h];
          debug_n_check ($here , '$en_str', $en_str);
      }
      else {
          print_html_array ($here, '$en_txt_by_la_txt_h', $en_txt_by_la_txt_h);
          print_fatal_error ($here,
          "element >$la_str_h< were a key of hash \$en_txt_by_la_txt_h",
          "it is NOT",
          "Check hash upper"); 
      }
  }
  
  exiting_from_function ($here . "with \$en_str = $en_str");
  
  return $en_str;  
}


?>
