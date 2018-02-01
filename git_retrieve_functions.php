<?php
require_once "irp_library.php";

function git_commit_previous_sha1_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $git_qua_his_a = irp_provide ('git_quatuor_log_commit_sha1ipdate_array', $here);
  $pre_lin = $git_qua_his_a[1];
  $com_pre_sha = string_word_of_ordinal_of_string (1, $pre_lin); 
  
  exiting_from_function ($here . " with \$com_pre_sha >$com_pre_sha<");
  return $com_pre_sha;
}

function git_commit_block_previous_log_array_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $hdir = file_basic_directory_of_name ("hd_php_server");
  $nam_ent_cur = irp_provide ('entry_current_name', $here);
  $nam_blo_cur = irp_provide ('block_current_name', $here);
  
  $cou = 2;
  $log_git_a = git_log_array_of_count_of_directory_path_of_entry_name_of_block_name ($cou, $hdir, $nam_ent_cur, $nam_blo_cur);

  debug_n_check ($here, '$log_git_a', $log_git_a);
  exiting_from_function ($here);
  return $log_git_a;
}

function git_commit_block_previous_sha1_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $hdir = file_basic_directory_of_name ("hd_php_server");
  $nam_ent_cur = irp_provide ('entry_current_name', $here);
  $nam_blo_cur = irp_provide ('block_current_name', $here);
  
  $log_git_a = irp_provide ('git_commit_block_previous_log_array', $here);
  debug_n_check ($here, '$log_git_a', $log_git_a);

  $pre_lin = $log_git_a[1];

  debug_n_check ($here, '$pre_lin', $pre_lin);
  $blo_pre_sha = string_word_of_glue_of_ordinal_of_string (' ', 1, $pre_lin); 

  exiting_from_function ($here . " with \$blo_pre_sha >$blo_pre_sha<");
  return $blo_pre_sha;
}

function git_commit_all_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $hdir = file_basic_directory_of_name ("hd_php_server");
  debug_n_check ($here , '$hdir', $hdir);

  $git_cmd = "git show entry_list_display_functions.php";
  
  $cmd = "$git_cmd";

  $out_str = shell_exec ($cmd);

  exiting_from_function ($here);

  return $out_str;
}

function git_checkout_block_previous_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $nam_ent_cur = irp_provide ('entry_current_name', $here);
    $nam_blo_cur = irp_provide ('block_current_name', $here);
    $ext_blo_cur = $_SESSION['parameters']['extension_block_filename'];
    $nof_blo_cur = $nam_blo_cur . '.' . $ext_blo_cur;

    $com_pre_sha = irp_provide ('git_commit_block_previous_sha1', $here);
    
    $log_str = git_checkout_of_git_commit_previous_sha1_of_entry_name_of_nameoffile ($com_pre_sha, $nam_ent_cur, $nof_blo_cur);
    
    exiting_from_function ($here);
    
    return $log_str;
}

?>