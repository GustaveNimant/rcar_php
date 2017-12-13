<?php

require_once "management_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function git_checkout_of_entry_name_of_nameoffile ($nam_ent_cur, $nof_blo_cur) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent_cur, $nof_blo_cur)");

  $hdir = file_basic_directory_of_name ("hd_php_server");
  debug_n_check ($here , '$hdir', $hdir);
  
  $cmd_git  = "cd $hdir" . "$nam_ent_cur; "; 
  $cmd_git .= "git checkout $nof_blo_cur";
  debug ($here , '$cmd_git', $cmd_git);

  $log_str = shell_exec ($cmd_git);
  debug ($here, '$log_str', $log_str);

  if ( ! string_is_empty_of_string ($log_str)) {
      print_fatal_error ($here,
      "message from git command >$cmd_git< were empty",
      "it is NOT empty >$log_str<",
      'chown -R www-data.www-data server will probably do the job'
      );
  } 

  exiting_from_function ($here);
  return $log_str;

}

function git_checkout_of_git_commit_previous_sha1_of_entry_name_of_nameoffile ($com_pre_sha, $nam_ent_cur, $nof_blo_cur) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($com_pre_sha, $nam_ent_cur, $nof_blo_cur)");

  $hdir = file_basic_directory_of_name ("hd_php_server");
  debug_n_check ($here , '$hdir', $hdir);
  
  $cmd_git  = "cd $hdir" . "$nam_ent_cur; "; 
  $cmd_git .= "git checkout $com_pre_sha $nof_blo_cur";
  debug ($here , '$cmd_git', $cmd_git);

  $she_str  = shell_exec ($cmd_git); 
  debug ($here, '$she_str', $she_str);

  if ( ! string_is_empty_of_string ($she_str)) {
      print_fatal_error ($here,
      "message from git command >$cmd_git< were empty",
      "it is NOT empty >$she_str<",
      'chown -R www-data.www-data server will probably do the job'
      );
  } 

  $log_str  = $cmd_git; 

  exiting_from_function ($here);
  return $log_str;

}

function git_command_add_all_files ($dir, $nof_a) {
  $here = __FUNCTION__;
  entering_in_function ($here);

  debug_n_check ($here , "input directory", $dir);
  # debug_n_check ($here , "input file name array", $nof_a);

  $cmd_git = 'git add ';
  while (list($key, $nof) = each ($nof_a)) {
    $cmd_git .= ' ' . $nof;
  }

  exiting_from_function ($here);
  debug_n_check ($here , '$cmd_git', $cmd_git);

  return $cmd_git;
}

function git_has_nothing_to_commit_status () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $log_sta = git_command_status_build ();
  debug_n_check ($here , '$log_sta', $log_sta);
  $cou_en1 = substr_count ($log_sta, 'nothing to commit (working directory clean)');
  $cou_en2 = substr_count ($log_sta, 'nothing to commit, working directory clean');
  $cou_fr = substr_count ($log_sta, 'rien à valider, la copie de travail est propre');

  $cou = $cou_en1 + $cou_en2 + $cou_fr;
  debug_n_check ($here , '$cou', $cou);

  $boo = ($cou == '1');

  exiting_from_function ($here);

  return $boo;
}

function git_status_information_retrieve ($str) {
  $here = __FUNCTION__;
  entering_in_function ($here);
  debug_n_check ($here , "input git status information", $str);

  $remainder_a = explode ("\n", $str);
  # debug_n_check ($here , "explode git status information remainder", $remainder_a);

  $remainder_a = preg_replace ('/^#/', '', $remainder_a);
  # debug_n_check ($here , "replace git status information remainder", $remainder_a);

  $ext_txt = $_SESSION['parameters']['extension_block_filename'];
  $ext_cat = $_SESSION['parameters']['extension_block_name_list_order_filename'];
  $ext_com = $_SESSION['parameters']['extension_item_comment_filename'];

  $ext_str = "($ext_cat|$ext_com|$ext_txt)";

  /* removed */

  $reg_fil = '\s+[A-Z]\w+\/[A-Z]\w+\.' . $ext_str .'\s*$/';
  $pattern = '/^\s+removed:' . $reg_fil;

  $removed_a = preg_grep ($pattern, $remainder_a);
  # debug ($here , "git removed array", $removed_a);

  $remainder_a = array_diff ($remainder_a, $removed_a);
  # debug_n_check ($here , "after removed git status information remainder", $remainder_a);

  /* modified */

  $pattern = '/modified:' . $reg_fil;
  $modified_a = preg_grep ($pattern, $remainder_a);

  # debug ($here , "git modified array", $modified_a);

  $remainder_a = array_diff ($remainder_a, $modified_a);
  # debug_n_check ($here , "after modified git status information remainder", $remainder_a);

  /* new file */
  $regexp = '/^\s*[A-Z]\w+\/[A-Z]\w+(_\w+)+'. $ext_str . '\s*$/';

  $new_file_a = preg_grep ($regexp, $remainder_a);
  # debug ($here , "git new file array", $new_file_a);

  $git_sta_inf_a = array ('modified' => $modified_a,
		      'new_file' => $new_file_a,
		      'removed'  => $removed_a);

  $remainder_a = array_diff ($remainder_a, $new_file_a);

  debug ($here , "output git status information array modified ", $git_sta_inf_a['modified']);
  debug ($here , "output git status information array removed ", $git_sta_inf_a['removed']);
  debug ($here , "output git status information array new_file ", $git_sta_inf_a['new_file']);
  # debug_n_check ($here , "output git status information remainder", $remainder_a);

  exiting_from_function ($here);

  return $git_sta_inf_a;
}

function git_command_information_make ($git_sta_inf_a) {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $remove_a = $git_sta_inf_a['removed'];
  $new_file_a = $git_sta_inf_a['new_file'];
  $modified_a = $git_sta_inf_a['modified'];

  # debug ($here , "input git status information array modified ", $modified_a);
  # debug ($here , "input git status information array removed ", $removed_a);
  # debug ($here , "input git status information array new_file ", $new_file_a);

  $rm_inf_a = preg_replace ('/(\s|removed:)/', '', $remove_a);
  # debug ($here , "output git command information rm", $rm_inf_a);

  $modified_a = preg_replace ('/(\s|modified:)/', '', $modified_a);
  # debug ($here , "output git command information array modified ", $modified_a);

  $new_file_a = preg_replace ('/\s/', '', $new_file_a);
  # debug ($here , "output git command information array new_file ", $new_file_a);

  $add_inf_a = array_merge ($modified_a, $new_file_a);

  $cmd_git_inf_a = array ('add' => $add_inf_a,
			  'rm'  => $rm_inf_a);

  # debug ($here , "output git command information add", $add_inf_a);

  exiting_from_function ($here);

  return $cmd_git_inf_a;

}

function git_command_make ($cmd_git_inf_a) {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $cmd_git  = '';

  $cmd_git_add_a = $cmd_git_inf_a['add'];
  # debug ($here , "input git command information add array", $cmd_git_add_a);

  if (!array_is_empty_of_array ($cmd_git_add_a)) {
    $cmd_git .= 'git add ';
    $cmd_git .= implode (' ', $cmd_git_add_a);
    $cmd_git .= " ;\n";
  }

  $cmd_git_rm_a = $cmd_git_inf_a['rm'];
  # debug ($here , "input git command information rm array", $cmd_git_rm_a);
  if (!array_is_empty_of_array ($cmd_git_rm_a)) { 
    $cmd_git .= 'git rm ';
    $cmd_git .= implode (' ', $cmd_git_rm_a);
    $cmd_git .= " ;\n";
  }

  debug ($here , "output git command", $cmd_git);

  exiting_from_function ($here);

  return $cmd_git;
}

function git_command_provide () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $log_sta = git_command_status_build ();
  debug_n_check ($here , "git log status", $log_sta);

  $git_sta_inf_a = git_status_information_retrieve ($log_sta);

  $cmd_git_inf_a = git_command_information_make ($git_sta_inf_a);

  $cmd_git = git_command_make ($cmd_git_inf_a);

  debug ($here , '$cmd_git', $cmd_git);
  exiting_from_function ($here);

  return $cmd_git;
}

exiting_from_module ($module);

?>