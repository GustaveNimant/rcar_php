<?php
require_once "irp_library.php";
require_once "git_history_library.php";

$module = module_name_of_module_nameoffile (__FILE__);
# https://www.atlassian.com/git/tutorials/git-log
$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['git_history_quatuor'] = "since, before, entry_current_name, blob_name";

entering_in_module ($module);

/* 6deee17 fait par ::1 le 9 March 2017 à 17h49:05 */

function git_quatuor_array_build () {
  $here = __FUNCTION__;
  entering_in_function ($here . " ()");

  $before_year = irp_provide ('before_year', $here);
  $before_month = irp_provide ('before_month', $here);
  $before_day = irp_provide ('before_day', $here);

  $since_year = irp_provide ('since_year', $here);
  $since_month = irp_provide ('since_month', $here);
  $since_day = irp_provide ('since_day', $here);

  $before = $before_year . '-' . $before_month . '-' . $before_day;
  $since = $since_year . '-' . $since_month . '-' . $since_day;

  $nam_ent = irp_provide ('entry_current_name', $here);
  $nam_blo = irp_provide ('block_current_name', $here);
  
  $qua_by_a = array (
      "since" => $since,
      "before" => $before,
      "entry_current_name" => $nam_ent,
      "blob_name" => $nam_blo,
  );
  
  debug ($here, '$qua_by_a', $qua_by_a);
  exiting_from_function ($here);
  return $qua_by_a;
}

function git_quatuor_log_commit_sha1ipdate_array_build () {
  $here = __FUNCTION__;
  entering_in_function ($here . " ()");

  $hdir = file_basic_directory_of_name ("hd_php_server");
  debug_n_check ($here , '$hdir', $hdir);
   
  $qua_by_a = git_quatuor_array_build ();
  $since = $qua_by_a['since'];
  $before = $qua_by_a['before'];
  $nam_ent = $qua_by_a['entry_current_name'];
  $nam_blo = $qua_by_a['blob_name'];
  
  $str = git_log_commit_sha1ipdate_of_server_path_of_quatuor ($hdir, $since, $before, $nam_ent, $nam_blo);
  $git_qua_his_a = explode ("\n", $str);
  
  debug_n_check ($here, '$git_qua_his_a', $git_qua_his_a);
  exiting_from_function ($here);

  return $git_qua_his_a;
}

function git_blob_content_array_build () {
  $here = __FUNCTION__;
  entering_in_function ($here . " ()");

  $hdir = $_SESSION['parameters']['absolute_path_server'];
  
  /* $git_qua_his_a = git_quatuor_log_commit_sha1ipdate_array_build (); */
  /* debug_n_check ($here, '$git_qua_his_a', $git_qua_his_a); */

  $qua_by_a = git_quatuor_array_build ();
  $since = $qua_by_a['since'];
  $before = $qua_by_a['before'];
  $nam_ent = $qua_by_a['entry_current_name'];
  $nam_blo = $qua_by_a['blob_name'];

  $sha_com_a = git_commit_sha1_array_of_directory_path_of_quatuor ($hdir, $since, $before, $nam_ent, $nam_blo);
  debug ($here, '$sha_com_a', $sha_com_a);

  $con_blo_a = array () ;
  foreach ($sha_com_a as $k => $sha_com) {
      debug ($here, '$sha_com', $sha_com);
      $sha_blo = git_blob_sha1_of_commit_sha1_of_entry_name_of_blob_name ($sha_com, $nam_ent, $nam_blo);
      if ($sha_blo == 'EMPTY_BLOB_SHA1') {
      }
      else { 
          $con_blo = git_blob_content_of_blob_sha1 ($sha_blo);
          array_push ($con_blo_a, $con_blo);
      }
  }

  debug ($here, '$con_blo_a', $con_blo_a);
  
  exiting_from_function ($here);
  return $con_blo_a;
}

function git_blob_content_by_blob_sha1_hash_build () {
  $here = __FUNCTION__;
  entering_in_function ($here . " ()");

  $hdir = $_SESSION['parameters']['absolute_path_server'];

  $qua_by_a = git_quatuor_array_build ();
  $since = $qua_by_a['since'];
  $before = $qua_by_a['before'];

  $nam_ent = $qua_by_a['entry_current_name'];
  $nam_blo = $qua_by_a['blob_name'];

  $sha_com_a = git_commit_sha1_array_of_directory_path_of_quatuor ($hdir, $since, $before, $nam_ent, $nam_blo);
  debug ($here, '$sha_com_a', $sha_com_a);

  $con_blo_by_sha_blo_h = array () ;
  foreach ($sha_com_a as $k => $sha_com) {
      debug ($here, '$sha_com', $sha_com);
      $sha_blo = git_blob_sha1_of_commit_sha1_of_entry_name_of_blob_name ($sha_com, $nam_ent, $nam_blo);
      debug ($here, '$sha_blo', $sha_blo);
      if ($sha_blo == 'EMPTY_BLOB_SHA1') {
      }
      else { 
          $con_blo = git_blob_content_of_blob_sha1 ($sha_blo);
          debug ($here, '$con_blo', $con_blo);
          
          if (string_first_word_of_string ($con_blo) == 'item_current_content') {
              $con_blo_by_sha_blo_h[$sha_blo] = $con_blo;
          }
          else {
              $log_str = "No item_current_content in Block of sha1 $sha_blo in commit sha1 $sha_com. Skipped";
              file_log_write ($here, $log_str);
              break;
          }
      }
  }

  debug ($here, '$con_blo_by_sha_blo_h', $con_blo_by_sha_blo_h);
  
  exiting_from_function ($here);
  return $con_blo_by_sha_blo_h;
}

function git_commit_sha1_by_blob_sha1_hash_build () {
  $here = __FUNCTION__;
  entering_in_function ($here . " ()");

  $hdir = $_SESSION['parameters']['absolute_path_server'];

  $qua_by_a = git_quatuor_array_build ();
  $since = $qua_by_a['since'];
  $before = $qua_by_a['before'];

  $nam_ent = $qua_by_a['entry_current_name'];
  $nam_blo = $qua_by_a['blob_name'];

  $sha_com_a = git_commit_sha1_array_of_directory_path_of_quatuor ($hdir, $since, $before, $nam_ent, $nam_blo);
  debug ($here, '$sha_com_a', $sha_com_a);

  $sha_com_by_sha_blo_h = array () ;
  foreach ($sha_com_a as $k => $sha_com) {
      debug ($here, 'foreach $sha_com', $sha_com);
      $sha_blo = git_blob_sha1_of_commit_sha1_of_entry_name_of_blob_name ($sha_com, $nam_ent, $nam_blo);
      debug ($here, 'foreach $sha_blo', $sha_blo);

      if ($sha_blo == 'EMPTY_BLOB_SHA1') {
      }
      else { 
          $sha_com_by_sha_blo_h[$sha_blo] = $sha_com ;
      }
  }

  debug ($here, '$sha_com_by_sha_blo_h', $sha_com_by_sha_blo_h);
  
  exiting_from_function ($here);
  return $sha_com_by_sha_blo_h;
}

  exiting_from_module ($module);

?>