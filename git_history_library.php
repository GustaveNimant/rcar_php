<?php
require_once "management_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

function four_words_off_ls_tree_line ($lin_lst) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($lin_lst)");
    
/* Ex.: lin_lst : 100644 blob 3e756621cb2417a91f0c2c896c24e1972b92e060\tCitoyen.ite    */
/*                            two_wor_a[0]                              two_wor_a[1]   */
/*            four_wor_a[0] four_wor_a[1] four_wor_a[2]                 four_wor_a[3]  */
    
    if ($lin_lst == 'EMPTY_LS_TREE_OUPUT') {
        $sha_blo = 'EMPTY_BLOB_SHA1';
        debug ($here , '$sha_blo', $sha_blo);
        
        exiting_from_function ($here);
        return $sha_blo;
    }
    
    $str_tri = trim ($lin_lst, " \t\n\r\0\x0B");
    debug ($here , '$str_tri', $str_tri);
    
    $two_wor_a = explode ("\t", $str_tri);
    debug ($here , '$two_wor_a', $two_wor_a);
    
    $four_wor_a = explode (" ", $two_wor_a[0]);
    array_push ($four_wor_a, $two_wor_a[1]);
    
    debug ($here , '$four_wor_a', $four_wor_a);
    
    exiting_from_function ($here);
    
    return $four_wor_a;
}

function git_log_commit_sha1ipdate_of_server_path_of_quatuor ($hdir, $since, $before, $nam_ent, $nam_blo) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($hdir, $since, $before, $nam_ent, $nam_blo)");

/* 7a2638f fait par ::1 le 22 January 2018 Ã  17h34:56 */
/* 60f6345 fait par ::1 le 5 November 2017 Ã  16h33:54 */
/* 9f03383 fait par ::1 le 28 October 2017 Ã  13h19:48 */

  $ext_blo = $_SESSION['parameters']['extension_block_filename'];
  $nof_blo = $nam_blo . '.' . $ext_blo; 
  $fno_blo = $hdir . '/' . $nam_ent . '/'. $nof_blo;
  
  $cmd_git  = "cd $hdir" . ';'; 
  $cmd_git .= ' git log --pretty=format:"%H %s" ';
  if ($since != "") {
      $cmd_git .= ' --since="' . $since . '"';
  }
  if ($before != "") {
      $cmd_git .= ' --before="' . $before . '"';

  }
  $cmd_git .= ' -- ' . $fno_blo; 

  debug_n_check ($here , '$cmd_git', $cmd_git);

  $log_git = shell_exec ($cmd_git);

  if (string_is_empty_of_string ($log_git)) {
      print_fatal_error ($here,
      "log of git command >$cmd_git< were NOT empty",
      'it is empty',
      'chown -R www-data.www-data server  will probably do the job'
      );
  } 
  debug_n_check ($here , '$log_git', $log_git);

  exiting_from_function ($here);
  return $log_git;
}

function git_ls_tree_string_of_commit_sha1_of_entry_name ($sha_com, $nam_ent) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($sha_com, $nam_ent)");

/* 100755 blob 97165023228f5f02706a4552d2fc9ac98170c077	Block_name_list_order_string.lis */
/* 100755 blob 3405f4b78cc7b7b50eee483123ec287e89a32ebc	Interet_general_objet_volonte_generale.blo */
/* 100755 blob 6d8f012024dd9fecf40afdccd00bde1419239851	Pas_particuliere.blo */
/* 100755 blob 68364df6ec36e8a87264a371592ec3474d0ecc90	Protocole.blo */

  $hdir = $_SESSION['parameters']['absolute_path_server'];
  debug_n_check ($here , '$hdir', $hdir);
  
  $cmd_git  = "cd $hdir" . '/' . "$nam_ent; "; 
  $cmd_git .= "git ls-tree $sha_com";
  debug ($here , '$cmd_git', $cmd_git);

  $str_lst = shell_exec ($cmd_git);

  if (string_is_empty_of_string ($str_lst)) {
      $str_lst = 'EMPTY_LS_TREE_OUPUT';
  } 
  debug ($here , '$str_lst', $str_lst);

  exiting_from_function ($here);
  return $str_lst;
}

function git_ls_tree_line_array_of_commit_sha1_of_entry_name ($sha_com, $nam_ent) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($sha_com, $nam_ent)");

/* Array */
/* ( */
/*     [0] => 100755 blob 97165023228f5f02706a4552d2fc9ac98170c077	Block_name_list_order_string.lis */
/*     [1] => 100755 blob 3405f4b78cc7b7b50eee483123ec287e89a32ebc	Interet_general_objet_volonte_generale.blo */
/*     [2] => 100755 blob 6d8f012024dd9fecf40afdccd00bde1419239851	Pas_particuliere.blo */
/*     [3] => 100755 blob 68364df6ec36e8a87264a371592ec3474d0ecc90	Protocole.blo */
/* ) */

  $str_lst = git_ls_tree_string_of_commit_sha1_of_entry_name ($sha_com, $nam_ent);

  if ($str_lst == 'EMPTY_LS_TREE_OUPUT') {
      $lin_lst_a = array ('EMPTY_BLOB_SHA1');
      debug ($here , '$lin_lst_a', $lin_lst_a);

      exiting_from_function ($here);
      return $lin_lst_a;
  }

  $str_tri = trim ($str_lst, " \t\n\r\0\x0B");
  $lin_lst_a = explode ("\n", $str_tri);
  debug ($here , '$lin_lst_a', $lin_lst_a);

  exiting_from_function ($here);
  return $lin_lst_a;
}

function git_blob_sha1_of_commit_sha1_of_entry_name_of_blob_name ($sha_com, $nam_ent, $nam_blo) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($sha_com, $nam_ent, $nam_blo)");

/* lin_str : 100755 blob 68364df6ec36e8a87264a371592ec3474d0ecc90	Protocole.blo */
/*                  four_wor_a[0] four_wor_a[1] four_wor_a[2]       four_wor_a[3] */

  $lin_lst_a = git_ls_tree_line_array_of_commit_sha1_of_entry_name ($sha_com, $nam_ent);
  debug_n_check ($here , '$lin_lst_a', $lin_lst_a);

  $ext_blo = $_SESSION['parameters']['extension_block_filename'];
  $nof_blo = $nam_blo . '.' . $ext_blo;

  $sha_blo = "";
  foreach ($lin_lst_a as $k => $lin_lst) {
      debug_n_check ($here , '$lin_lst', $lin_lst);

      if ($lin_lst == "EMPTY_BLOB_SHA1") {
          break;
      }

      $four_wor_a = four_words_off_ls_tree_line ($lin_lst);
      debug_n_check ($here , '$four_wor_a', $four_wor_a);

      $git_typ = $four_wor_a[1];
      debug_n_check ($here , '$git_typ', $git_typ);
      $nof = $four_wor_a[3];
      debug_n_check ($here , '$nof', $nof);

      if ($git_typ == "blob" ) {
          if ($nof == $nof_blo) {
              $sha_blo = $four_wor_a[2];
              debug_n_check ($here , 'loop $nof $sha_blo', $nof . ' ' . $sha_blo);
          }
      }
  }
   
  if (string_is_empty_of_string ($sha_blo)) {
      $sha_blo = 'EMPTY_BLOB_SHA1';

      print_warning ($here, 
      "Blob_sha1 were NOT empty", 
      "it is EMPTY",
      "it is set to >$sha_blo<");
  }

  debug ($here , '$sha_blo', $sha_blo);
  exiting_from_function ($here);

  return $sha_blo;
}

function git_commit_sha1_by_blob_sha1_hash_of_commit_sha1_of_entry_name_of_blob_name ($sha_com, $nam_ent, $nam_blo) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($sha_com, $nam_ent, $nam_blo)");

/* Ex.: lin_lst : 100644 blob 3e756621cb2417a91f0c2c896c24e1972b92e060\tCitoyen.ite    */
/*                            two_wor_a[0]                              two_wor_a[1]   */
/*            four_wor_a[0] four_wor_a[1] four_wor_a[2]                 four_wor_a[3]  */

  $str_lst = git_ls_tree_string_of_commit_sha1_of_entry_name ($sha_com, $nam_ent);
  debug ($here , '$str_lst', $str_lst);

  if ($str_lst == 'EMPTY_LS_TREE_OUPUT') {
      $sha_blo = 'EMPTY_BLOB_SHA1';
      debug ($here , '$sha_blo', $sha_blo);

      exiting_from_function ($here);
      return $sha_blo;
  }

  $str_tri = trim ($str_lst, " \t\n\r\0\x0B");
  $str_blo_a = explode ("\n", $str_tri);
  debug ($here , '$str_blo_a', $str_blo_a);

  $ext_blo = $_SESSION['parameters']['extension_block_filename'];
  $nof_blo = $nam_blo . '.' . $ext_blo;

  $sha_com_by_sha_blo_h = array ();
  foreach ($str_blo_a as $k => $lin_str) {

      $four_wor_a = four_words_off_ls_tree_line ($lin_lst);

      $nof = $four_wor_a[3];
      debug ($here , '$nof', $nof);

      $git_typ = $four_wor_a[1];

      if ($git_typ == "blob" ) {

      if ($nof == $nof_blo) {
          $sha_blo = $four_wor_a[2];
          $sha_com_by_sha_blo_h[$sha_blo] = $sha_com;	
          debug ($here , 'loop $sha_blo', $nof . ' ' . $sha_blo);
      }
	 }
  }
  
  debug_n_check ($here , '$sha_com_by_sha_blo_h', $sha_com_by_sha_blo_h);
  exiting_from_function ($here);

  return $sha_com_by_sha_blo_h;
}

function git_log_of_count_of_directory_path_of_entry_name_of_block_name ($cou, $hdir, $nam_ent, $nam_blo) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($cou, $hdir, $nam_ent, $nam_blo)");

    $ext_blo = $_SESSION['parameters']['extension_block_filename'];
    $nof_blo = $nam_blo . '.' . $ext_blo; 
    $fno_blo = $hdir . '/' . $nam_ent . '/'. $nof_blo;

    $cmd_git  = "cd $hdir; ";
    $cmd_git .= 'git log -' . $cou . ' --pretty=format:"%H %s" -- ' . $fno_blo; 
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
        'Check array upper');
    }

    if (count ($log_git_a) < $cou) {
        print_html_array ($here, '$log_git_a', $log_git_a);

        print_fatal_error ($here,
        "count for \$log_git_a were > $cou for block $nam_ent/$nam_blo.blo",
        "count for \$log_git_a is = ". count ($log_git_a),
        "Check");
    }

    debug_n_check ($here, '$log_git_a', $log_git_a);

    exiting_from_function ($here);
    return $log_git_a;
}

function git_commit_sha1_array_of_directory_path_of_quatuor ($hdir, $since, $before, $nam_ent, $nam_blo) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($hdir, $since, $before, $nam_ent, $nam_blo)");

/* Array */
/* ( */
/*     [0] => 7a2638f9414445159bbdf7f5f858687954a6c180 */
/*     [1] => 60f634500cdfadf3d890ef1717b7778fae2a35c6 */
/*     [2] => 9f03383e1a04af6d7fb0d1b1eefe38b42d6a851d */
/* ) */
    
    $log_str = git_log_commit_sha1ipdate_of_server_path_of_quatuor ($hdir, $since, $before, $nam_ent, $nam_blo);
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

function git_blob_content_of_blob_sha1 ($sha_blo) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($sha_blo)");
/* Ex.: Un citoyen n'appartient qu'à une seule population */

  if ($sha_blo == 'EMPTY_BLOB_SHA1') {
      $con_blo = 'INEXISTANT_BLOB';
      debug ($here , '$con_blo', $con_blo);
      exiting_from_function ($here);
      return $con_blo;
  }

  $hdir = $_SESSION['parameters']['absolute_path_server'];
  debug_n_check ($here , '$hdir', $hdir);
  
  $cmd_git  = "cd $hdir;"; 
  $cmd_git .= " git cat-file -p $sha_blo";
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