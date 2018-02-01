<?php

require_once "array_library.php";
require_once "file_log_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";


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
    
    $hdir = $_SESSION['parameters']['absolute_path_server'];
    $fnod = $hdir . '/' . $nam;
    
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

    $hpse_dir = $_SESSION['parameters']['absolute_path_server_surname'];
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
    or print_fatal_error ($here, 
    "file >" . $fno . "< were ok",
    "it has got a problem", 
    "Probably rights are uncorrect");

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

function file_hash_write ($fno, $arr_a) {
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

function file_rename_of_old_of_new_of_where ($old_nof, $new_nof, $where) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($old_nof, $new_nof, $where)"); 
    
    if ( file_exists ($new_nof) ) {
        print_fatal_error ($here . ' in ' . $where , 
        "file >$new_nof< does NOT exists",
        "it DOES",
        "Check"
        );
    }
    
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
    
    $log_str = "file >$old_nof< has been renamed as >$new_nof< in $where";
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
    
    exiting_from_function ($here . ' with file >' . $fno . ' removed');
    return;
};

function file_content_remove_last_line ($con_raw) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($con_raw)");
    
    $str_a = explode ("\n", $con_raw);
    array_pop ($str_a);
    $con = implode ("\n", $str_a);
    
    exiting_from_function ($here . ' with last line removed from file content');
    return $con;
    
}


?>