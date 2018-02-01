<?php

require_once "file_library.php";

function file_is_directory_of_directory_path ($dir_pat) {
  $here = __FUNCTION__;
  $boo = is_dir ($dir_pat);
  return $boo;
};

function file_basic_directory_of_name ($nam) {
  $here = __FUNCTION__;
  debug_n_check ($here , '$nam', $nam);

  $src_abs_pat = $_SESSION['parameters']['absolute_path_source'];
  $src_rel_pat = $_SESSION['parameters']['relative_path_source'];
  $ser_abs_pat = $_SESSION['parameters']['absolute_path_server'];
  $ser_rel_pat = $_SESSION['parameters']['relative_path_server'];
  $ser_abs_pat_sur = $_SESSION['parameters']['absolute_path_server_surname'];
  $src_rel_pat_ima = $_SESSION['parameters']['relative_path_source_images'];

  $dir_a = 
    array (
	   "hd_php" => "$src_abs_pat",
	   "hd_php_server" => "$ser_abs_pat",
	   "hd_php_server_surname" => "$ser_abs_pat_sur",
	   "www_php" => "$src_rel_pat",
	   "www_php_server" => "$ser_rel_pat",
	   "www_php_img" => "$src_rel_pat_ima",
	   );
  
#  # debug_n_check ($here , "directory array", $dir_a);

  $dir = $dir_a[$nam];
  if (!isset ($dir) ) {
    print "\n\nFatal error:\n";
    print "Expecting  : >$nam< were hd_php | hd_php_server | www_php | www_php_server\n";
    print "Found      : >$nam<\n";
    print "Cure : Check\n";
    exit;
  }
  
  debug_n_check ($here , '$dir_pat', $dir);
  return $dir;
};

function file_specific_directory_name_of_basic_name_of_name_NOT ($nam_bas, $nam) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_bas, $nam)");
  
  $dir_bas = file_basic_directory_of_name ($nam_bas);
  if (( substr ($nam_bas, 0, 3) == "hd_" ) 
  or (substr ($nam_bas, 0, 4) == "www_" )) {
      $dir = $dir_bas . '/' . $nam ;
  } else {
      print_fatal_error ($here,
      "basic directory name abbreviation were starting with hd_",
      "basic directory name abbreviation >" . $nam_bas . "<",
      "Check");
  };
  
  #  debug_n_check ($here , "dir : ", $dir);
  exiting_from_function ($here);
  
  return $dir;
};

function file_create_specific_directory_of_basic_name_of_name ($nam_bas, $nam) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_bas, $nam)");

  $hdir = $_SESSION['parameters']['absolute_path_server'];
  $dir_nam = $hdir . '/' . $nam;
#  debug_n_check ($here , "directory to be created", $dir_nam);
  $boo = file_exists ($dir_nam);

  if ($boo == false) {
    if ( ! mkdir ($dir_nam, 0777)) {
      $mes = "when creating directory >$dir_nam<";
      fatal_error ($here, $mes);
    }
  }

  exiting_from_function ($here);
  return;
};

function file_directory_create_or_skip ($dir_nam) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($dir_nam)");

  $boo = file_exists ($dir_nam);

  if ($boo == false) {
    if ( ! mkdir ($dir_nam, 0777)) {
      $mes = "when creating directory >$dir_nam<";
      fatal_error ($here, $mes);
    }
  }

  exiting_from_function ($here);
  return;
}

function file_directory_is_not_empty_of_directory_path ($dir_pat) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($dir_pat)");

  $fno_a = scandir ($dir_pat);

  $boo = FALSE;
  foreach ($fno_a as $key => $val) {
      if ($val != '.' && $val != '..') {
          $boo = TRUE;
          break;
      } 
  }
  
  exiting_from_function ($here . " is " . string_of_boolean ($boo));
  return $boo;
}

function file_directory_is_empty_of_directory_path ($dir_pat) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($dir_pat)");

  $boo = ! file_directory_is_not_empty_of_directory_path ($dir_pat);
  
  exiting_from_function ($here . " is " . string_of_boolean ($boo));
  return $boo;
}

function file_directory_name_of_directory_path ($fno) {
    $here = __FUNCTION__;
    $fno_arr_a = pathinfo ($fno);
    $nam_dir = $fno_arr_a['filename'];
    
    return $nam_dir;
};



function file_array_of_directory_path_of_predicate ($dir_pat, $predicate) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($dir_pat, $predicate)");

  if ( ! file_is_directory_of_directory_path ($dir_pat)) {
      print_fatal_error ($here, 
      "path >$dir_pat< were a directory path",
      "it does NOT",
      "Check");
  }
  if (file_directory_is_empty_of_directory_path ($dir_pat)) {
      $mest = "Directory exists and is empty";
      $log_str = "Throw new Exception from with message : $mest";
      file_log_write ($here, $log_str);

      exiting_from_function ($here . ' with Exception ' . $mest);
      throw new Exception ($mest);
  }
  else {      
      $fno_a = fullnameoffile_array_of_directory_path ($dir_pat);
      $fno_fil_a = array_filter ($fno_a, $predicate);
      $fno_fil_a = array_values ($fno_fil_a);

      if (array_is_empty_of_array ($fno_fil_a)) {
          $mest = "No file found according to predicate $predicate in Directory";
          $log_str = "Throw new Exception from with message : $mest";
          file_log_write ($here, $log_str);
          
          exiting_from_function ($here . ' with Exception ' . $mest);
          throw new Exception ($mest);
      }

  }

  exiting_from_function ($here);
  return $fno_fil_a;
};

?>