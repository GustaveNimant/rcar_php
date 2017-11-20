<?php

require_once "irp_library.php";
require_once "git_command_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

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

function git_status_check_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);


  $lang_err = language_translate_of_en_string ('Error');
  $lang_com = language_translate_of_en_string ('Take a previously committed');

  if (git_has_nothing_to_commit_status ()){ 
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

  if (git_has_nothing_to_commit_status ()) {
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
      $la_exp = language_translate_of_en_string ("git commit succeeded");
      $la_fou = language_translate_of_en_string ("git commit failed");
      print_fatal_error ($here, 
      $la_exp, $la_fou, "Check");
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
 
  if (git_has_nothing_to_commit_status ()){
 
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