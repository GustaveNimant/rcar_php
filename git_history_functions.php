<?php
include "session.php";
require_once "irp_functions.php";
require_once "common_html_functions.php";

$module = "git_history_functions";
entering_in_module ($module);

/* 6deee17 fait par ::1 le 9 March 2017 à 17h49:05 */

function git_history_quatuor_build () {
  $here = __FUNCTION__;
  entering_in_function ($here . " ()");
  
  $qua_by_a = array (
      "since" => "2016-05-18",
      "before" => "2017-03-10",
      "entry_name" => "Population", 
      "blob_name" => "Citoyen.ite",
  );
 
  debug ($here, '$qua_a', $qua_a);
  exiting_from_function ($here);
  return $qua_by_a;
}

function git_log_shaipdate_of_directory_path_of_quatuor ($hdir, $since, $before, $nam_ent, $nam_blo) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($hdir, $since, $before, $nam_ent, $nam_blo)");

  $fno_blo = $hdir . $nam_ent . '/' . $nam_blo;

  $cmd_git  = "cd $hdir"; 
  $cmd_git .= '; git log --pretty=format:"%h %s" ';
  if ($since != "") {
      $cmd_git .= ' --since="' . $since . '"';
  }
  if ($before != "") {
      $cmd_git .= ' --before="' . $before . '"';

  }
  $cmd_git .= ' ' . $fno_blo; 

  debug_n_check ($here , '$cmd_git', $cmd_git);
  debug ($here , '$cmd_git', $cmd_git);

  $log_git = shell_exec ($cmd_git);

  if (string_is_empty_of_string ($log_git)) {
      print_fatal_error ($here,
      "log of git command >$cmd_git< were NOT empty",
      'it is empty',
      'chown -R www-data.www-data server  will probably do the job'
      );
  } 
  debug ($here , '$log_git', $log_git);

  exiting_from_function ($here);
  return $log_git;
}

function git_ls_tree_of_entry_name_of_commit_sha ($nam_ent, $sha_com) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent, $sha_com)");

/* 100644 blob 3e756621cb2417a91f0c2c896c24e1972b92e060	Citoyen.ite */

  $hdir = basic_directory_of_name ("hd_php_server");
  debug_n_check ($here , '$hdir', $hdir);
  
  $cmd_git  = "cd $hdir$nam_ent; "; 
  $cmd_git .= "git ls-tree $sha_com";
  debug ($here , '$cmd_git', $cmd_git);

  $log_git = shell_exec ($cmd_git);

  if (string_is_empty_of_string ($log_git)) {
      print_fatal_error ($here,
      "log of git command >$cmd_git< were NOT empty",
      'it is empty',
      'chown -R www-data.www-data server  will probably do the job'
      );
  } 
  debug ($here , '$log_git', $log_git);

  exiting_from_function ($here);
  return $log_git;
}

function git_blob_sha_of_entry_name_of_blob_name_of_commit_sha ($nam_ent, $nam_blo, $sha_com) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent, $nam_blo, $sha_com)");

/* Ex.: str : 100644 blob 3e756621cb2417a91f0c2c896c24e1972b92e060	Citoyen.ite */
/*                          wor_a[0]                                wor_a[1]    */
/*            w_a[0] w_a[1] w_a[2]                                  wor_a[1]    */
  $str = git_ls_tree_of_entry_name_of_commit_sha ($nam_ent, $sha_com);
#  debug ($here , '$str', $str);
  $str_blo_a = explode ("\n", $str);
#  debug ($here , '$str_blo_a', $str_blo_a);

  $sha_blo = "";
  foreach ($str_blo_a as $k => $str) {
      $wor_a = explode ("\t", $str);
#      debug ($here , '$wor_a', $wor_a);
      $nam = $wor_a[1];
#      debug ($here , '$nam', $nam);
      if ($nam == $nam_blo) {
          $w_a = explode (" ", $wor_a[0]);
#          debug ($here , '$w_a', $w_a);
          if ($w_a[1] == "blob" ) {
              $sha_blo = $w_a[2];
          }
      }
  }

  if (string_is_empty_of_string ($sha_blo)) {
      warning ($here, 'Blob_sha is empty. Reset to empty_sha');
      $sha_blo = 'empty_sha';
  }

  debug ($here , '$sha_blo', $sha_blo);
  exiting_from_function ($here);

  return $sha_blo;
}

function git_sha_commit_array_of_directory_path_of_quatuor ($hdir, $since, $before, $nam_ent, $nam_blo) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($hdir, $since, $before, $nam_ent, $nam_blo)");
    
    $log_str = git_log_shaipdate_of_directory_path_of_quatuor ($hdir, $since, $before, $nam_ent, $nam_blo);

    /* 6deee17 fait par ::1 le 9 March 2017 à 17h49:05 */
    /* 7349de0 fait par ::1 le 6 March 2017 à 18h08:01 */

    debug ($here , '$log_str', $log_str);
    $str_a = explode ("\n", $log_str);
    
    $sha_com_a = array ();
    foreach ($str_a as $k => $str) {
        $wor_a = explode (" ", $str);
        $sha = $wor_a[0];
        array_push ($sha_com_a, $sha);
    }
    
    if (array_is_empty_of_array ($sha_com_a)) {
        print_fatal_error ($here,
        "selected commit array were NOT empty",
        'it is EMPTY',
        'Check'
        );
    }

    debug_n_check ($here, '$sha_com_a', $sha_com_a);

    exiting_from_function ($here);
    return $sha_com_a;
}

function git_blob_content_of_blob_sha ($sha_blo) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($sha_blo)");
/* Ex.: Un citoyen n'appartient qu'à une seule population */

  if ($sha_blo == 'empty_sha') {
      $con_blo = 'inexistant_blob';
      debug ($here , '$con_blo', $con_blo);
      exiting_from_function ($here);
      return $con_blo;
  }

  $hdir = basic_directory_of_name ("hd_php_server");
  debug_n_check ($here , '$hdir', $hdir);
  
  $cmd_git  = "cd $hdir; "; 
  $cmd_git .= "git cat-file -p $sha_blo";
  debug_n_check ($here , '$cmd_git', $cmd_git);
  debug ($here , '$cmd_git', $cmd_git);

  $con_blo = shell_exec ($cmd_git);

  if (string_is_empty_of_string ($con_blo)) {
      print_fatal_error ($here,
      "content of blob from git command >$cmd_git< were NOT empty",
      'it is empty',
      'chown -R www-data.www-data server will probably do the job'
      );
  } 
  debug ($here , '$con_blo', $con_blo);

  exiting_from_function ($here);
  return $con_blo;
}

function git_history_build () {
  $here = __FUNCTION__;
  entering_in_function ($here . " ()");

  $hdir = basic_directory_of_name ("hd_php_server");
  debug_n_check ($here , '$hdir', $hdir);
   
  $qua_by_a = git_history_quatuor_build ();
  $since = $qua_by_a['since'];
  $before = $qua_by_a['before'];
  $nam_ent = $qua_by_a['entry_name'];
  $nam_blo = $qua_by_a['blob_name'];
  
  $str = git_log_shaipdate_of_directory_path_of_quatuor ($hdir, $since, $before, $nam_ent, $nam_blo);
  $str_a = explode ("\n", $str);
  
  debug ($here, '$str_a', $str_a);
  exiting_from_function ($here);
  return $str_a;
}

function git_blob_content_array_build () {
  $here = __FUNCTION__;
  entering_in_function ($here . " ()");

  $hdir = basic_directory_of_name ("hd_php_server");
  debug_n_check ($here , '$hdir', $hdir);

  $qua_by_a = git_history_quatuor_build ();
  $since = $qua_by_a['since'];
  $before = $qua_by_a['before'];
  $nam_ent = $qua_by_a['entry_name'];
  $nam_blo = $qua_by_a['blob_name'];

  $sha_com_a = git_sha_commit_array_of_directory_path_of_quatuor ($hdir, $since, $before, $nam_ent, $nam_blo);
  debug ($here, '$sha_com_a', $sha_com_a);

  $con_blo_a = array () ;
  foreach ($sha_com_a as $k => $sha_com) {
      debug ($here, '$sha_com', $sha_com);
      $sha_blo = git_blob_sha_of_entry_name_of_blob_name_of_commit_sha ($nam_ent, $nam_blo, $sha_com);
      $con_blo = git_blob_content_of_blob_sha ($sha_blo);
      array_push ($con_blo_a, $con_blo);
  }

  debug ($here, '$con_blo_a', $con_blo_a);

  exiting_from_function ($here);
  return $con_blo_a;
}


?>