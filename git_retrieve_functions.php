<?php
require_once "irp_library.php";

function git_commit_previous_sha1_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $git_qua_his_a = irp_provide ('git_quatuor_history_array', $here);
  $pre_lin = $git_qua_his_a[1];
  $com_pre_sha = string_word_of_ordinal_of_string (1, $pre_lin); 
  
  exiting_from_function ($here . " with \$com_pre_sha >$com_pre_sha<");
  return $com_pre_sha;
}

function git_commit_all_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $serv = "../server";
  $git_cmd = "git show entry_list_display_functions.php";
  
  $cmd = "$git_cmd";

  $out_str = shell_exec ($cmd);

  exiting_from_function ($here);

  return $out_str;
}


?>