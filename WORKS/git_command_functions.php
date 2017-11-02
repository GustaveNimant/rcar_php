<?php

require_once "irp_functions.php";
require_once "common_html_library.php";

$module = "git_command_functions";

entering_in_module ($module);

function item_name_array_of_hd_directory_of_entry_name ($hdir, $nam_ent) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($hdir, $nam_ent, $ext_fil)");

  $ext_fil = $_SESSION['parameters']['extension_block_name_catalog_filename'];
  $nam_fil = $nam_ent . "/" . 'Item_name_catalog.' . $ext_fil;
 
  debug_n_check ($here , '$nam_fil', $nam_fil);
  exiting_from_function ($here);

  return $nam_fil;
}

function item_any_text_filename ($hdir, $nam_ent, $nam_ite, $ext_fil) {
  $here = __FUNCTION__;
  entering_in_function ($here);

  debug_n_check ($here , " input hdir", $hdir);
  debug_n_check ($here , " input item name", $nam_ite);
  debug_n_check ($here , " input entry_current_name", $nam_ent);
  debug_n_check ($here , " input file extension", $ext_fil);

  $nam_fil = $nam_ent . "/" . $nam_ite . '.' . $ext_fil;
 
  debug_n_check ($here , '$nam_fil', $nam_fil);
  exiting_from_function ($here);

  return $nam_fil;
}

function git_command_status () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $hdir = file_basic_directory_of_name ("hd_php_server");
  debug_n_check ($here , "hd directory", $hdir);
  
  $cmd_git  = 'cd ' . $hdir . ';';
  $cmd_git .= 'git add .;';
  $cmd_git .= 'git status';
  debug_n_check ($here , '$cmd_git', $cmd_git);

  $log_git = shell_exec ($cmd_git);
 
  debug_n_check ($here , '$log_git', $log_git);
  exiting_from_function ($here);

  return $log_git;
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

function git_commands_all_files_build () {
  $here = __FUNCTION__;

  $hdir = file_basic_directory_of_name ("hd_php_server");
  debug_n_check ($here , "hdir", $hdir);

  $cmd_git_add_all_file = git_command_add_all_files ($hdir, $nof_a);
  $cmd_git_commit_all_file = irp_provide ('git_command_commit', $here);
  
  $log_git  = '';
  $log_git .= $cmd_git_add_all_file ;
  $log_git .= $cmd_git_commit_all_file ;

  debug_n_check ($here , '$log_git', $log_git);
  return $log_git;
}

function git_initial () {
  $here = __FUNCTION__;

  entering_in_function ($here);

  $html_str  = '';
  $html_str .= "<br>git commit -a -m &lt;message&gt;<br>";

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function git_is_nothing_to_commit_status () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $log_sta = git_command_status ();
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

function git_status_check_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);


  $lang_err = language_translate_of_en_string ('Error');
  $lang_com = language_translate_of_en_string ('Take a previously committed');

  if (git_is_nothing_to_commit_status ()){ 
    $html_str = '';
    $html_str .= irp_provide ('common_html_page_head', $here);
    $html_str .= common_html_entitled_text_of_title_of_text ($lang_err . ', ' . $lang_com);
    $html_str .= git_initial ();
    $html_str .= irp_provide ('button_submit_select_language', $here);
    $html_str .= irp_provide ('common_html_page_tail', $here);

    debug_n_check ($here , '$html_str', $html_str);

    print $html_str;

    exit;
  }
 
 exiting_from_function ($here);
 return;
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
  $ext_cat = $_SESSION['parameters']['extension_block_name_catalog_filename'];
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

  $log_sta = git_command_status ();
  debug_n_check ($here , "git log status", $log_sta);

  $git_sta_inf_a = git_status_information_retrieve ($log_sta);

  $cmd_git_inf_a = git_command_information_make ($git_sta_inf_a);

  $cmd_git = git_command_make ($cmd_git_inf_a);

  debug ($here , '$cmd_git', $cmd_git);
  exiting_from_function ($here);

  return $cmd_git;
}

function git_command_commit_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $hdir = file_basic_directory_of_name ("hd_php_server");
  debug_n_check ($here , '$hdir', $hdir);

  $mes_git  = irp_provide ('user_information', $here);

  $cmd_git  = 'cd ' . $hdir . ';';
  $cmd_git .= git_command_provide ();
  $cmd_git .= 'git commit -a -m "' . $mes_git . '"';

  debug_n_check ($here , '$cmd_git', $cmd_git);
  $log_git = shell_exec ($cmd_git);

  if (string_is_empty_of_string ($log_git)) {
      print_fatal_error ($here,
      'log of git command were NOT empty',
      'it is empty',
      'chown -R www-data.www-data server  will probably do the job'
      );
  } 
  debug ($here , '$log_git', $log_git);

  $res_a['git command'] = $cmd_git;
  $res_a['git command log'] = $log_git;

  # debug_n_check ($here , '$res_a', $res_a);
  exiting_from_function ($here);

  return $res_a;
}

function git_command_n_commit_html_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $res_a = irp_provide ('git_command_commit', $here);

  $cmd_git = $res_a['git command'];
  debug_n_check ($here , '$cmd_git', $cmd_git);

  $log_git = $res_a['git command log'];
  debug_n_check ($here , '$git log', $log_git);
 
  $html_cmd_git = str_replace(';git', '<br>git', $cmd_git);

  if (git_is_nothing_to_commit_status ()) {
      $log_status = language_translate_of_en_string ('commit successful : working directory clean');
      /* Improve translation */
      $html_log_status = str_replace(';git', '<br>git', $log_status);

      $html_str  = comment_entering_of_function_name ($here);
      $html_str .= common_html_entitled_text_of_title_of_text ("Git command", $html_cmd_git);
      $html_str .= '<br><br>';
      $html_str .= common_html_entitled_text_of_title_of_text ("Git status", $html_log_status);
      $html_str .= comment_exiting_of_function_name ($here);
  }
  
  else {
      
      fatal_error ($here, language_translate_of_en_string ("git commit failed"));
  }

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);
  
  return $html_str;
 } 

function git_command_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
  

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('pervasive_page_header', $here);
 
  if (git_is_nothing_to_commit_status ()){
 
    $html_str .= '<span class="my-fieldset"> ';
    $html_str .= language_translate_of_en_string ('commit successful : working directory clean');
    $html_str .= '<br> ';

  } else {
    
    $html_str .= irp_provide ('git_command_n_commit_html', $here);
    $html_str .= '</span> ';
  
  }  
 
  $html_str .= irp_provide ('pervasive_page_footer', $here);
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>