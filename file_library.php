<?php

require_once "array_library.php";
require_once "file_log_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function file_fullnameoffile_parse_array ($fno) {
    $here = __FUNCTION__;
    
    $fno_arr_a = pathinfo ($fno);
    
    /* echo $fno_arr_a['dirname'], "\n"; */
    /* echo $fno_arr_a['basename'], "\n"; */
    /* echo $fno_arr_a['extension'], "\n"; */
    /* echo $fno_arr_a['filename'], "\n"; // depuis PHP 5.2.0 */
    
  return $fno_arr_a;
};

function file_get_any_extension ($fno) {
  $here = __FUNCTION__;
#  debug_n_check ($here , "input file name", $fno);
  
  $fno_arr_a = file_fullnameoffile_parse_array($fno);
  $ext = $fno_arr_a['extension'];

#  debug_n_check ($here , "output extension", $ext);
  return $ext;
};

function file_is_directory_of_directory_path ($dir_pat) {
  $here = __FUNCTION__;
  $boo = is_dir ($dir_pat);
  return $boo;
};

function file_basic_directory_of_name ($nam) {
  $here = __FUNCTION__;
#  debug_n_check ($here , '$nam', $nam);

  $src_abs_pat = $_SESSION['parameters']['absolute_path_source'];
  $src_rel_pat = $_SESSION['parameters']['relative_path_source'];
  $ser_abs_pat = $_SESSION['parameters']['absolute_path_server'];
  $ser_rel_pat = $_SESSION['parameters']['relative_path_server'];
  $ser_abs_pat_sur = $_SESSION['parameters']['absolute_path_server_surname'];
  $src_rel_pat_ima = $_SESSION['parameters']['relative_path_source_images'];

  $dir_a = 
    array (
	   "hd_php" => "$src_abs_pat/",
	   "hd_php_server" => "$ser_abs_pat/",
	   "hd_php_server_surname" => "$ser_abs_pat_sur/",
	   "www_php" => "$src_rel_pat/",
	   "www_php_server" => "$ser_rel_pat/",
	   "www_php_img" => "$src_rel_pat_ima/",
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
  
#  debug_n_check ($here , "output directory name", $dir);
  return $dir;
};

function file_specific_directory_name_of_basic_name_of_name ($nam_bas, $nam) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_bas, $nam)");
  
  $dir_bas = file_basic_directory_of_name ($nam_bas);
  if (( substr ($nam_bas, 0, 3) == "hd_" ) 
  or (substr ($nam_bas, 0, 4) == "www_" )) {
      $dir = $dir_bas . $nam . "/";
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

  $dir_nam = file_specific_directory_name_of_basic_name_of_name ($nam_bas, $nam);
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

function file_has_3c_extension_of_anynameoffile ($ano) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($ano)");

  $boo = preg_match ('/\.[a-z][a-z][a-z]$/', $ano, $matches);

  if ($boo) {
    $result = $matches[0];
    $str = "TRUE";
  }
  else {
    $result = $boo;
    $str = "FALSE";
  }

#  debug_n_check ($here , '$result', $result);
  exiting_from_function ($here . ' with result ' . $str);

  return $result;
};

function file_get_3c_extension_of_anynameoffile ($ano) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($ano)");

  $bool = preg_match ('/[a-z][a-z][a-z]$/', $ano, $matches);

  if (file_has_3c_extension_of_anynameoffile ($ano)) {
    $result = $matches[0];
    exiting_from_function ($here);
    return $result;
  }
  else {
    fatal_error ($here,
		 "file >" . $ano . "< must have a valid extension");

  }
  exiting_from_function ($here);
}

function file_cut_dotted_3c_extension_of_nameoffile ($nof) {
    $here = __FUNCTION__;
    if (file_has_3c_extension_of_anynameoffile ($nof)){
        $cou = strlen ($nof) -4;
        $new_nof = substr ($nof, 0, $cou);
        return $new_nof;
    }
    else {
        $mest = "In file_cut_dotted_3c_extension_of_nameoffile:Nameoffile has no dotted_3c_extension";
        throw new Exception ($mest);
    }
};

function file_is_block_text_of_nameoffile ($nof) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($nof)");
    
    if ( ! file_has_3c_extension_of_anynameoffile ($nof) ) {
        $boo = FALSE;
        $message = ' with no 3c_extension for >' . $nof . '<';
    }
    else {
        $nam_blo = file_cut_dotted_3c_extension_of_nameoffile ($nof);
        $ext_fil = file_get_3c_extension_of_anynameoffile ($nof) ;
        
        $boo = 
            string_is_block_current_name_of_string ($nam_blo)
            && 
            string_is_block_text_filename_extension_of_string ($ext_fil);
    }

    exiting_from_function ($here . " is " . string_of_boolean ($boo));
    
    return $boo;
};

function file_is_entry_nameoffile_of_string ($nam) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($nam)");
    
    $hpse_dir = file_basic_directory_of_name ("hd_php_server");
    $fnod = $hpse_dir . "/" . $nam;
    
    $result = is_dir ($fnod);

    exiting_from_function ($here. ' with result ' . string_of_boolean ($result));
    
    return $result;
};

function file_is_entry_nameoffile_text_of_name ($nam) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($nam)");

    $result = file_is_entry_nameoffile_of_string ($nam) 
        && (
            (substr ($nam_fun, -6) != "_texte")
            || (substr ($nam_fun, -5) != "_text" )
        );
    
    exiting_from_function ($here. ' with result ' . string_of_boolean ($result));
    
    return $result;
};

function file_is_item_nameoffile_of_entry_name_of_name ($nam_ent, $nam) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($nam_ent, $nam)");

    $ext_blo = $_SESSION['parameters']['extension_block_filename'];

    $hpse_dir = file_basic_directory_of_name ("hd_php_server");
    $fnod = $hpse_dir . '/' . $nam_ent;
    
    $nof = $nam . '.' . $ext_blo; 
    $fnof = $fnod . '/' . $nof;

    $result = file_exists ($fnof);

    exiting_from_function ($here. ' with result ' . string_of_boolean ($result));
    
    return $result;
};


function file_is_justify_text_of_fullnameoffile ($fno) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($fno)");

  if ( ! file_has_3c_extension_of_anynameoffile ($fno) ) {
    $result = 0;
  }
  else {
      $ext_fil = file_get_3c_extension_of_anynameoffile ($fno) ;
      $nam_ite_jus = cut_justify_file_3c_extension ($fno);
      
      $result = 
          string_is_item_name_of_string ($nam_ite_jus)
          && 
          is_block_text_comment_filename_extension ($ext_fil);
  }
  
  exiting_from_function ($here. ' with result ' . string_of_boolean ($result));

  return $result;
};

function file_is_existing_of_fullnameoffile ($fno) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($fno)");

  $boo = file_exists ($fno);

  exiting_from_function ($here);
  return $boo;
};

function file_check_exists_of_fullnameoffile ($fno) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($fno)");

  if ( ! file_exists ($fno) ) {
      print_fatal_error ($here,
      "file >$fno< existed",
      "it does NOT",
      "Check");
  }
  
  exiting_from_function ($here);
  return;
};

function file_surname_nameofile_extension_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $ext_sur = $_SESSION['parameters']['extension_surname_nameoffile'];

  exiting_from_function ($here . ' with \$ext_sur >' . $ext_sur);
  
  return $ext_sur;
}

function file_string_write ($fno, $con) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($fno, ... some content ...");

  check ($here, '$con', $con);
 
  file_put_contents ($fno, $con)
    or fatal_error ($here, "file >" . $fno . "< has got a problem. Probably rights are uncorrect.Check");

  /* $boo = chmod ($fno, 0664); */
  /* if (! $boo){ */
  /*   fatal_error ($here, "can't chmod 0664 for file >" . $fno . "<"); */
  /* } */

  flush ();

  /* $log_str = "File >$fno< written on disk"; */
  /* file_log_write ($here, $log_str); */

  exiting_from_function ($here);
  return;
}

function file_array_write ($fno, $arr_a) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($fno, ... some content ...");

  check ($here, '$arr_a', $arr_a);

  $con = implode ("\n", $arr_a);
  file_string_write ($fno, $con);

  exiting_from_function ($here);
  return;
}

function file_associative_array_write ($fno, $arr_a) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($fno, ... some content ...");

  check ($here, '$arr_a', $arr_a);

  $con = string_pretty_of_array_of_index_of_eol ($arr_a, 3, "\n");
  file_string_write ($fno, $con);

  exiting_from_function ($here);
  return;
}

function file_content_append ($fno, $con) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($fno)");

  check ($here, "input content", $con);
 
  file_put_contents ($fno, $con, FILE_APPEND)
    or fatal_error ($here, "file >" . $fno . "< has got a problem. Probably rights are uncorrect.Check");

  flush ();

  exiting_from_function ($here);
  return;
}

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

function file_html_content_write ($fno, $con) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($fno)");
  
  if (file_get_any_extension ($fno) != "html") {
      fatal_error ($here, "file >" . $fno . "< not html");
  }
  
  if ($GLOBALS['DEBUG'] >= "2") {
      file_string_write ($fno, $con);
  }
  
  exiting_from_function ($here);
  return;
};

function file_content_read_of_fullnameoffile ($fno) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($fno)");
    #  debug_n_check ($here , "input file", $fno);
    
    $con = file_get_contents ($fno);
    if (! $con ) {
        print_fatal_error ($here, 
        "file >$fno< were readable",
        "it is NOT",
        "Check");
    }

    $prev = previous_function_in_stack ();
    $log_str = "File >$fno< read in $prev";
    file_log_write ($here, $log_str);
    
    #  debug_n_check ($here , '$con', $con);
    exiting_from_function ($here);
    
    return $con;
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

function fullnameoffile_array_of_directory_path ($dir_pat) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($dir_pat)");

  $fno_a = scandir ($dir_pat);
  $fno_fil_a = array ();
  foreach ($fno_a as $key => $val) {
      if ($val != '.' && $val != '..') {
          array_push ($fno_fil_a, $val);
      } 
  }

  exiting_from_function ($here);
  return $fno_fil_a;
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


function file_rename_of_old_of_new_of_where ($old_nof, $new_nof, $where) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($old_nof, $new_nof, $where)"); 
    
    if ( ! file_exists ($old_nof) ) {
        print_fatal_error ($here . ' in ' . $where , 
        "file >$old_nof< exists",
        "it does NOT",
        "Check"
        );
    }
    
    if (! rename ($old_nof, $new_nof)) {
        print_fatal_error ($here . ' in ' . $where , 
        "renaming file >$old_nof< as >$new_nof< were successful",
        "it is NOT",
        "Check");
    }
    
    $log_str = "file >$old_nof< has been renamed as >$new_nof<";
    file_log_write ($here, $log_str);
 
    exiting_from_function ($here . ' with file >' . $old_nof . ' renamed as '. $new_nof);
    return;
}


function file_remove_of_fullnameoffile ($fno) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($fno)");
    
    if (file_exists ($fno)) {
        if (unlink ($fno)) {
            $log_str = "File $fno has been removed";
            file_log_write ($here, $log_str);
        } else {
            fatal_error ($here, "when deleting file $fno");
        }
    }
    else {
        $log_str = "Non existing file $fno not removed";
        file_log_write ($here, $log_str);
    }
    
    exiting_from_function ($here . ' with file >' . $old_nof . ' removed');
    return;
};

function file_content_remove_last_line ($con_raw) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($con_raw)");
    
    $str_a = explode ("\n", $con_raw);
    $last_key = array_pop ($str_a);
    $con = implode ("\n", $str_a);
    
    exiting_from_function ($here . ' with last line removed from file content');
    return $con;
    
}

exiting_from_module ($module);

?>