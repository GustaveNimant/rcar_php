<?php
require_once "management_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function browser_name_get () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $use = $_SERVER['HTTP_USER_AGENT'];
  debug ($here, '$use', $use);
  
  if (stripos($_SERVER['HTTP_USER_AGENT'],"firefox") !== false) {
      $bro = "firefox";
  }
  if (stripos($_SERVER['HTTP_USER_AGENT'],"opr") !== false) {
      $bro = "opera";
  }
  if (stripos($_SERVER['HTTP_USER_AGENT'],"epiphany") !== false) {
      $bro = "epiphany";
  }

  exiting_from_function ($here . "with \$bro = $bro");
  return $bro;
}

exiting_from_module ($module);

?>
