<?php

$module = "language_functions";
# entering_in_module ($module);

function language_from_navigator () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

  debug_n_check ($here, "langage du navigateur", $lan); 
  exiting_from_function ($here);

  return $lan;
}

/* function display_string_language ($here, $lan, $key) { */
/*   debug_n_check ($here , "language", $lan); */
/*   debug_n_check ($here , "key", $key); */

/*   global $here; */
/*   $str = ($here[$lan][$key]); */
/*   debug_n_check ($here , "string language", $str); */
  
/*   return $str; */

/* }; */

function language_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

/* Improve */
  /* $lan = language_from_navigator (); */
  /* debug_n_check ($here , "language", $lan); */

  $lan = 'fr'; 

  /* if ($lan == "") { */
  /*   $lan = 'fr'; */
  /*   warning ($here, "no language from navigator. language set to $lan"); */
  /* } */
  /* else { */
  /*   /\* warning ($here, "language from navigator. language set to $lan"); *\/ */
  /* } */
  
  debug_n_check ($here , "language", $lan);
  exiting_from_function ($here);
  
  return $lan;  
}

# exiting_from_module ($module);
?>
