<?php

require_once "array_functions.php";
require_once "logfile_functions.php";

$module = "file_functions";
# entering_in_module ($module);


function fullnameoffile_parse_array ($fno) {
    $here = __FUNCTION__;
    
    $fno_arr_a = pathinfo ($fno);
    
    /* echo $fno_arr_a['dirname'], "\n"; */
    /* echo $fno_arr_a['basename'], "\n"; */
    /* echo $fno_arr_a['extension'], "\n"; */
    /* echo $fno_arr_a['filename'], "\n"; // depuis PHP 5.2.0 */
    
  exiting_from_function ($here);
  
  return $fno_arr_a;
};

function module_name ($fno) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($fno)");
#  debug_n_check ($here , "input file name", $fno);
  
  $fno_arr_a = fullnameoffile_parse_array($fno);
  $nam_mod = $fno_arr_a['filename'];

#  debug_n_check ($here , "output extension", $ext);
  exiting_from_function ($here);
  
  return $nam_mod;
};

function get_any_file_extension ($fno) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($fno)");
#  debug_n_check ($here , "input file name", $fno);
  
  $fno_arr_a = fullnameoffile_parse_array($fno);
  $ext = $fno_arr_a['extension'];

#  debug_n_check ($here , "output extension", $ext);
  exiting_from_function ($here);
  
  return $ext;
};

function basic_directory_of_name ($nam) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam)");
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
  exiting_from_function ($here);
  
  return $dir;
};

function specific_directory_name_of_basic_name_of_name ($nam_bas, $nam) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_bas, $nam)");
  
  $dir_bas = basic_directory_of_name ($nam_bas);
  if (( substr ($nam_bas, 0, 3) == "hd_" ) 
      or (substr ($nam_bas, 0, 4) == "www_" )) {
    $dir = $dir_bas . $nam . "/";
  } else {
    fatal_error ($here,
		 "basic directory name abbreviation >" . $nam_bas . "< must start with hd_");
  };
  
#  debug_n_check ($here , "dir : ", $dir);
  exiting_from_function ($here);

  return $dir;
};

function create_specific_directory_of_basic_name_of_name ($nam_bas, $nam) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_bas, $nam)");

  $dir_nam = specific_directory_name_of_basic_name_of_name ($nam_bas, $nam);
#  debug_n_check ($here , "directory to be created", $dir_nam);
  $boo = file_exists ($dir_nam);

  if ($boo == false) {
    if ( ! mkdir ($dir_nam, 0777)) {
      $mes = "when creating directory >$dir_nam<";
      fatal_error ($here, $mes);
    }
  }

  exiting_from_function ($here);
};

function has_file_3c_extension ($fno) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($fno)");

  $boo = preg_match ('/\.[a-z][a-z][a-z]$/', $fno, $matches);

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

function get_file_3c_extension ($fno) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($fno)");

  $bool = preg_match ('/[a-z][a-z][a-z]$/', $fno, $matches);

  if (has_file_3c_extension ($fno)) {
    $result = $matches[0];
    exiting_from_function ($here);
    return $result;
  }
  else {
    fatal_error ($here,
		 "file >" . $fno . "< must have a valid extension");

  }
  exiting_from_function ($here);
}

function is_filename_extension ($ext) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($ext)");

  $ext_blo = $_SESSION['parameters']['block_text_filename_extension'];
  $ext_cat = $_SESSION['parameters']['block_name_catalog_filename_extension'];
  $ext_com = $_SESSION['parameters']['item_comment_filename_extension'];

  $result = ($ext == $ext_blo)
    || ($ext == $ext_cat)
    || ($ext == $ext_com)
    ;

#  debug_n_check ($here , "result ", $result);
  exiting_from_function ($here);

  return $result;
};

function is_item_comment_filename_extension ($ext) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($ext)");

  $ext_txt = $_SESSION['parameters']['item_comment_filename_extension'];

  $result = ($ext == $ext_txt);

  exiting_from_function ($here);

  return $result;
};

function is_block_text_filename_extension ($ext) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($ext)");

  $ext_txt = $_SESSION['parameters']['block_text_filename_extension'];

  $result = ($ext == $ext_txt);

  exiting_from_function ($here);

  return $result;

};

function check_block_text_filename_extension ($ext){
  $here = __FUNCTION__;
#  entering_in_function ($here . " ($ext)");
  /* debug_n_check ($here , "input block name", $ext); */

  if ( ! is_block_text_filename_extension ($ext)) {
    fatal_error ($here, "block text filename extension >$ext< is NOT canonical");
  }

#  exiting_from_function ($here . " ($ext)");
}

function cut_dotted_3c_extension_of_nameoffile ($nof) {
    if (has_file_3c_extension ($nof)){
        $cou = strlen ($nof) -4;
        $new_nof = substr ($nof, 0, $cou);
        return $new_nof;
    }
    else {
        $mest = "In cut_dotted_3c_extension_of_nameoffile:Nameoffile has no dotted_3c_extension";
        throw new Exception ($mest);
    }
};

function file_is_block_text_of_nameoffile ($fno) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($fno)");

  if ( ! has_file_3c_extension ($fno) ) {
    $result = 0;
    exiting_from_function ($here . ' with no 3c_extension for >' . $fno . '<');
    return $result;
  }

  $nam_blo = cut_dotted_3c_extension_of_nameoffile ($fno);
  $ext_fil = get_file_3c_extension ($fno) ;
#  debug ($here , 'block_current_name ', $nam_blo) ;

  $result = 
    is_block_current_name ($nam_blo)
    && 
    is_block_text_filename_extension ($ext_fil);

#  debug ($here , 'is_block_current_name ', string_of_boolean (is_block_current_name ($nam_blo))) ;
#  debug ($here , 'is_block_text_filename_extension', string_of_boolean (is_block_text_filename_extension ($ext_fil))) ;

  exiting_from_function ($here. ' with result ' . string_of_boolean ($result));

  return $result;
};

function file_is_entry_nameoffile_of_string ($nam) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($nam)");

    $hpse_dir = basic_directory_of_name ("hd_php_server");
    $fnod = $hpse_dir . "/" . $nam;

    $result = is_dir ($fnod);

    exiting_from_function ($here. ' with result ' . string_of_boolean ($result));
    
    return $result;
};

function is_entry_nameoffile_text_of_name ($nam) {
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

function is_item_nameoffile_of_entry_name_of_name ($nam_ent, $nam) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($nam_ent, $nam)");

    $ext_blo = $_SESSION['parameters']['block_text_filename_extension'];

    $hpse_dir = basic_directory_of_name ("hd_php_server");
    $fnod = $hpse_dir . '/' . $nam_ent;
    
    $nof = $nam . '.' . $ext_blo; 
    $fnof = $fnod . '/' . $nof;

    $result = file_exists ($fnof);

    exiting_from_function ($here. ' with result ' . string_of_boolean ($result));
    
    return $result;
};


function is_justify_text_file ($fno) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($fno)");

  if ( ! has_file_3c_extension ($fno) ) {
    $result = 0;
    exiting_from_function ($here);
    return $result;
  }

  $ext_fil = get_file_3c_extension ($fno) ;
  $nam_ite_jus = cut_justify_file_3c_extension ($fno);

  $result = 
    is_item_name ($nam_ite_jus)
    && 
    is_block_text_comment_filename_extension ($ext_fil);

  exiting_from_function ($here. ' with result ' . string_of_boolean ($result));
  
  return $result;
};

function file_surname_nameofile_extension_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $ext_sur = $_SESSION['parameters']['surname_nameoffile_extension'];

  exiting_from_function ($here . ' with $ext_sur >' . $ext_sur);
  
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

  /* $html_log = "File >$fno< written on disk"; */
  /* logfile_html_write ($html_log); */

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

  $con = pretty_string_of_array ($arr_a, 3);
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

  /* $boo = chmod ($fno, 0664); */
  /* if (! $boo){ */
  /*   fatal_error ($here, "can't chmod 0664 for file >" . $fno . "<"); */
  /* } */

  flush ();

  /* $html_log = "File >$fno< written on disk"; */
  /* logfile_html_write ($html_log); */

  exiting_from_function ($here);
}

function directory_create_or_skip ($dir_nam) {
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
}

function html_file_content_write ($fno, $con) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($fno)");

  if (get_any_file_extension ($fno) != "html") {
    fatal_error ($here, "file >" . $fno . "< not html");
  }
 
  if ($GLOBALS['DEBUG'] >= "2") {
    file_string_write ($fno, $con);
  }
    
   exiting_from_function ($here);
};

function file_content_read ($fno) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($fno)");
#  debug_n_check ($here , "input file", $fno);
 
  $con = (file_get_contents ($fno))
    or fatal_error ($here, "file >" . $fno . "< is not readable");

  $html_log = "File >$fno< read";
  logfile_html_write ($html_log);

#  debug_n_check ($here , '$con', $con);
  exiting_from_function ($here);

  return $con;
}

function file_array_of_directory_path_of_predicate ($dir_pat, $predicate) {
  $here = __FUNCTION__;
  entering_in_function ($here . "($dir_pat, $predicate)");

#  debug_n_check ($here , "directory_path", $dir_pat);
#  debug_n_check ($here , "predicate", $predicate);

  $fno_a = scandir ($dir_pat);

  if (! $fno_a) {
      $link = 'item_new_create.php?entry_name=' . $nam_ent;
      exiting_from_function ($here);
      header('Location: ' . $link);
      exit;
      
    /*
    $html_str = irp_provide ('arce_section_create_entry', $here);
    print $html_str;
    */
      $str_url = "entry_list.php?not_yet_set_entry=" . basename($dir_pat);
      header('Refresh: 5; URL=' . $str_url);
      fatal_error ($here, "directory >" . $dir_pat . "< is inaccessible or inexistant<br>
  Probably entry_name >". basename($dir_pat) ."< has not been created yet<br>
<b>Redirection dans 5 secondes</b>");
  }

/* Improve button_submit_to_return_of_surname_by_name_array_of_module_nameoffile_of_entry_name ($fno_mod, $nam_ent);  */
#  # debug_n_check ($here , "avant predicate ", $fno_a);

  $fno_fil_a = array_filter ($fno_a, $predicate);

  # debug ($here , "filtered files", $fno_fil_a);
  exiting_from_function ($here);

  return $fno_fil_a;
};


function file_rename ($old_nof, $new_nof) {
  $here = __FUNCTION__;
  entering_in_function ($here); 
#  debug_n_check ($here , "input old file", $old_nof);
#  debug_n_check ($here , "input new file", $new_nof);

  if ( ! file_exists ($old_nof) ) {
    fatal_error ($here, "file >$old_nof< does not exist");
  }

  if (! rename ($old_nof, $new_nof)) {
    fatal_error ($here, "when renaming >$old_nof<<br>to >$new_nof<");
  }

  exiting_from_function ($here . ' with file >' . $old_nof . ' renamed as '. $new_nof);
}


function file_delete ($fno) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($fno)");

  if (file_exists ($fno)) {
      if (unlink ($fno)) {
          $html_log = "File $fno has been deleted";
          logfile_html_write ($html_log);
      } else {
          fatal_error ($here, "when deleting file $fno");
      }
  }
  else {
      $html_log = "Non existing file $fno not deleted";
      logfile_html_write ($html_log);
  }

  exiting_from_function ($here . ' with file >' . $old_nof . ' deleted');
  return;
};

function file_content_delete_last_line ($con_raw) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($con_raw)");

  $str_a = explode ("\n", $con_raw);
  $last_key = array_pop ($str_a);
  $con = implode ("\n", $str_a);

  exiting_from_function ($here . ' with last line deleted from file content');
  return $con;

}

function fullnameoffile_of_name ($con_raw) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($con_raw)");


  exiting_from_function ($here);
  return $fno;

}

# exiting_from_module ($module);

?>