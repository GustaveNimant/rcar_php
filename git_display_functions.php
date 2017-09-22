<?php

require_once "common_html_functions.php";
require_once "management_functions.php";
require_once "debug_functions.php";


function display_all_commits () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $serv = "../server";
  $git_cmd = "git show entry_list_display_functions.php";
  
  $cmd = "$git_cmd";

  $out_str = shell_exec ($cmd);

  exiting_from_function ($here);

  return $out_str;
}
print "<pre>";
print display_all_commits ();
print "</pre>";
?>