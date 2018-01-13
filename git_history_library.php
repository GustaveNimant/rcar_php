<?php
require_once "management_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";


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

  $hdir = file_basic_directory_of_name ("hd_php_server");
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

function git_log_of_count_of_directory_path_of_entry_name_of_block_name ($cou, $hdir, $nam_ent, $nam_blo) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($cou, $hdir, $nam_ent, $nam_blo)");

    $ext_blo = $_SESSION['parameters']['extension_block_filename'];
    $nof_blo = $nam_blo . '.' . $ext_blo; 

    $cmd_git  = "cd $hdir; ";
    $cmd_git .= 'git log -' . $cou . ' --pretty=format:"%H %s" ./' . $nam_ent . '/'. $nof_blo;

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

function git_log_array_of_count_of_directory_path_of_entry_name_of_block_name ($cou, $hdir, $nam_ent, $nam_blo) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($cou, $hdir, $nam_ent, $nam_blo)");

    $log_git = git_log_of_count_of_directory_path_of_entry_name_of_block_name ($cou, $hdir, $nam_ent, $nam_blo);
    debug_n_check ($here , '$log_git', $log_git);

    $log_git_a = explode ("\n", $log_git);
    if (array_is_empty_of_array ($log_git_a)) {
        print_fatal_error ($here,
        "selected commit array were NOT empty",
        'it is EMPTY',
        'Check'
        );
    }

    debug_n_check ($here, '$log_git_a', $log_git_a);

    exiting_from_function ($here);
    return $log_git_a;
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

  $hdir = file_basic_directory_of_name ("hd_php_server");
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


?>