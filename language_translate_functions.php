<?php

require_once "array_functions.php";
require_once "language_functions.php";
require_once "language_translate_register.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

# entering_in_module ($module);

/* function language_translate_from_en_for_install ($en_str) { */
/*  $here = __FUNCTION__; */
/*  $lan = $_COOKIE['lan']; */

/*  include "language_translate_register.php"; */
 
/*  if ($lan == 'en') { */
/*    $la_str = $en_str; */
/*  } else { */
/*    $la_str = $install_language_translate_register[$en_str][$lan]; */
/*  } */
 
/*  if (! isset ($la_str)){ */
/*    debug ($here, "language_translate_register", $language_translate_register); */
/*    fatal_error ($here, "no translation in $lan for english sentence >$en_str<", $la_str); */
/*   } */

/*   return $la_str;   */
/* } */


/* function language_translate_from_en_help ($en_str) { */
/*   $here = __FUNCTION__; */
/*   entering_in_function ($here); */
/*   debug_n_check ($here , "input english string", $en_str); */

/*   $lan = $_SESSION['parameters']['language']; */

/*   include "language_translate_register.php"; */
/*   debug ($here, "include help_language_translate_register", $help_language_translate_register); */

/*   $la_str = $help_language_translate_register[$en_str][$lan]; */
 
/*   debug_n_check ($here , "output string in $lan", $la_str); */
/*   exiting_from_function ($here); */

/*   return $la_str;   */
/* } */

function language_translate_of_en_string ($en_str) {
  $here = __FUNCTION__;
#  entering_in_function ($here . " ($en_str)");

  $lan = $_SESSION['parameters']['language'];
  $language_translate_register = $_SESSION['language_translate_register'];
  
  if ($lan == 'en') {
      $la_str = $en_str;
  } else {
      $la_str = $language_translate_register[$en_str][$lan];
  }
  
  if (! isset ($la_str)){
    debug ($here, "language_translate_register", $language_translate_register);
    print_fatal_error ($here, 
          "a translation to language >$lan< for english sentence >$en_str<",
          "no such translation",
    "add these lines to module language_translate_register.php :<br><br>" . 
"&nbsp;&nbsp;&nbsp;'" . $en_str ."' => <br>" . 
"&nbsp;&nbsp;&nbsp;array (<br>" . 
"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'fr' => '...',<br>" . 
"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'it' => '???',<br>" . 
"&nbsp;&nbsp;&nbsp;),"
    );
  }

#  debug_n_check ($here , "$en_str in $lan is", $la_str);
#  exiting_from_function ($here);

  return $la_str;  
}

function translate_language_texts_english_by_language_array () {
  $here = __FUNCTION__;
  /* entering_in_function ($here); */

  $lan = $_SESSION['parameters']['language'];
  include "language_translate_register.php";

  foreach ($language_translate_register as $en_str => $val_a) {

    $la_str = $val_a [$lan];
    /* debug_n_check ($here , "en_str", $en_str); */
    /* debug_n_check ($here , "lan_str", $la_str); */
    $texts_english_by_language_a [$la_str] = $en_str;

  }

  /* # debug_n_check ($here , "output bi_language array", $texts_english_by_language_a); */
  /* exiting_from_function ($here); */

  return $texts_english_by_language_a;
}

function language_translate_to_english_of_la_string ($la_str) {
  $here = __FUNCTION__;
  /* entering_in_function ($here . " ($la_str)"); */

  $lan = $_SESSION['parameters']['language'];
  if ($lan == "en") {
    $en_str = $la_str;
  }
  else {
    $la_str_h = htmlentities ($la_str);
#    debug_n_check ($here , '$la_str_h', $la_str_h);
    $bi_lan_a = translate_language_texts_english_by_language_array ();
#    debug_n_check ($here , '$bi_lan_a', $bi_lan_a);
    $en_str = $bi_lan_a[$la_str]; 
 }

     if (array_key_exists($la_str_h, $bi_lan_a)){
       $en_str = $bi_lan_a[$la_str_h];
     }
     else {
       print_html_array ($here , '$bi_lan_a', $bi_lan_a);
       fatal_error ($here, "element >$la_str_h< not in array $\bi_lan_a"); 
     }
  
#  debug_n_check ($here , "output string in english", $en_str);
#  exiting_from_function ($here);

  return $en_str;  
}

# exiting_from_module ($module);

?>
