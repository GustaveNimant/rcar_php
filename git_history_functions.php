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
  
  $qua_by_a = array (
      "since" => "2016-05-18",
      "before" => "2017-12-31",
      "entry_current_name" => "Utilisation", 
      "blob_name" => "Menu_faq.blo",
  );
 
  debug ($here, '$qua_by_a', $qua_by_a);
  exiting_from_function ($here);
  return $qua_by_a;
}

function git_quatuor_history_array_build () {
  $here = __FUNCTION__;
  entering_in_function ($here . " ()");

  $hdir = file_basic_directory_of_name ("hd_php_server");
  debug_n_check ($here , '$hdir', $hdir);
   
  $qua_by_a = git_quatuor_array_build ();
  $since = $qua_by_a['since'];
  $before = $qua_by_a['before'];
  $nam_ent = $qua_by_a['entry_current_name'];
  $nam_blo = $qua_by_a['blob_name'];
  
  $str = git_log_commit_sha1ipdate_of_directory_path_of_quatuor ($hdir, $since, $before, $nam_ent, $nam_blo);
  $git_qua_his_a = explode ("\n", $str);
  
  debug ($here, '$git_qua_his_a', $git_qua_his_a);
  exiting_from_function ($here);
  return $git_qua_his_a;
}

function git_blob_content_array_build () {
  $here = __FUNCTION__;
  entering_in_function ($here . " ()");

  $hdir = file_basic_directory_of_name ("hd_php_server");
  debug_n_check ($here , '$hdir', $hdir);

  $qua_by_a = git_quatuor_history_array_build ();
  $since = $qua_by_a['since'];
  $before = $qua_by_a['before'];
  $nam_ent = $qua_by_a['entry_current_name'];
  $nam_blo = $qua_by_a['blob_name'];

  $sha_com_a = git_commit_sha1_array_of_directory_path_of_quatuor ($hdir, $since, $before, $nam_ent, $nam_blo);
  debug ($here, '$sha_com_a', $sha_com_a);

  $con_blo_a = array () ;
  foreach ($sha_com_a as $k => $sha_com) {
      debug ($here, '$sha_com', $sha_com);
      $sha_blo = git_blob_sha1_of_entry_name_of_blob_name_of_commit_sha1 ($nam_ent, $nam_blo, $sha_com);
      $con_blo = git_blob_content_of_blob_sha1 ($sha_blo);
      array_push ($con_blo_a, $con_blo);
  }

  debug ($here, '$con_blo_a', $con_blo_a);

  exiting_from_function ($here);
  return $con_blo_a;
}

  exiting_from_module ($module);

?>