<?php
require_once "file_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

entering_in_module ($module);

function session_check_not_empty_array_of_key ($key) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($key)");

  $arr_a = $_SESSION[$key]; 

  print "in $here ici<br>";
  print_r ($arr_a);
  print "<br>fin<br>";
  exit;

  if (array_is_empty_of_array ($arr_a)) {
      print_fatal_error ($here,
      "Array \$_SESSION['\$key']['$sub_key'] were NOT EMPTY",
      'it is EMPTY',
      'Check'
      );
  }
  
  exiting_from_function ($here);
  return;
}

function session_check_end_value_of_key_of_sub_key_of_value ($key, $sub_key, $val) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($key, $sub_key, $val)");

  $arr_a = $_SESSION[$key][$sub_key];

  print "in $here ici<br>";
  print_r ($arr_a);
  print "<br>fin<br>";

  if (is_array ($arr_a) ) {
 
      $end_ele  = end ($arr_a);
      if ( $end_ele != $val) {
          print_fatal_error ($here,
          "end element of array \$_SESSION['$key']['$sub_key'] were equal to >$val<",
          "end element is >$end_ele<",
          'Check'
          );
      }
  }
  else {
      print_fatal_error ($here,  
      "\$_SESSION['$key']['$sub_key'] were an ARRAY",
      "it is NOT",
      "Check");
  }

  exiting_from_function ($here);
  return;
}

function session_check_end_value_of_key_of_value ($key, $val) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($key, $val)");

  $eol = end_of_line ();

  if (is_array ($_SESSION[$key]) ) {
      
      $end_ele = end ($_SESSION[$key]);
      if ( $end_ele != $val) {
          print "array dump$eol";
          print_r ($_SESSION[$key]);

          print_fatal_error ($here,
          "end element of array \$_SESSION['$key'] were equal to >$val<",
          "end element is >$end_ele<",
          'Check array upper'
          );
      }
  }
  else {
      print_fatal_error ($here,  
      "\$_SESSION['$key'] were an ARRAY",
      "it is NOT",
      "Check");
  }

  exiting_from_function ($here);
  return;
}

function session_remove () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $boo = session_destroy ();  

  if (! $boo) {
      $ses_pat = session_save_path ();
      $ses_nam = session_name ();
      $ses_id = session_id ();
      
      print "Name \$ses_nam = $ses_nam<br>";
      print "Session path \$ses_pat = $ses_pat<br>"; 
      print "Session Id \$ses_id  = >$ses_id<<br>";

      print_fatal_error ($here,
      "session $ses_pat/$ses_nam were destroyed",
      "it is NOT",
      "Check");
  }

  exiting_from_function ($here);
  return;
}

function session_obsolete_remove () {
  $here = __FUNCTION__;
  entering_in_function ($here);
  
  $roo_doc = $_SERVER['DOCUMENT_ROOT'];
  $ser_rel_pat = "/arce/server";
  $ser_abs_pat = $roo_doc . $ser_rel_pat;
  $ses_abs_pat = $ser_abs_pat . '/SESSION';
  $fil_a = scandir ($ses_abs_pat);

  foreach ($fil_a as $k => $fil) {

      if (substr ($fil, 0, 5) == 'sess_') {

          $fil_abs_pat =  $ses_abs_pat . '/' . $fil;
          $tim_sec_fil = filemtime ($fil_abs_pat);
          $dat_fil = date ("F d Y H:i:s.", $tim_sec_fil);

          $tim_sec_day = 12 * 3600 ;
          $tim_sec_now = time ();

          $dat_now = date ("F d Y H:i:s.", $tim_sec_now);
          $dat_lim = date ("F d Y H:i:s.", $tim_sec_lim);
          $tim_sec_lim = $tim_sec_now - $tim_sec_day;
          $dat_lim = date ("F d Y H:i:s.", $tim_sec_lim);

          if ($tim_sec_fil < $tim_sec_lim) {
              unlink ($fil_abs_pat);
              $log_str = "$dat_now : Session file $fil_abs_pat has been removed";
              file_log_write ($here, $log_str);
          }
      }
  }

  exiting_from_function ($here);
  return;
}

function session_hash_push_inplace_of_key_of_value ($key, $val) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($key, \$val)");
    
# Example array $_SESSION['father_n_son_stack_entity'] 
 
    if (isset ($_SESSION)) {
        if (isset ($_SESSION[$key])) {
            if ( is_array ($_SESSION[$key]) ) {
                if ( ! array_value_exists ($val, $_SESSION[$key]) ) {
                    array_push ($_SESSION[$key], $val);
#                    $nam_arr = '$_SESSION["'. $key. '"]';
#                    array_push_inplace_of_array_name_of_value_of_array ($nam_arr, $val, $_SESSION[$key]);
                }
            }
        }  
    }

  /* print "in $here ici<br>"; */
  /* print "key is \"$key\"<br>"; */
  /* print "val is :<br>"; */
  /* print_r ($val);  */
  /* print "<br>end is :<br>"; */
  /* print_r (end ($_SESSION[$key]));  */
  /* print "<br>count is :" . count ($_SESSION[$key]);  */
  /* print "<br>fin<br>"; */
    
#    session_check_end_value_of_key_of_value ($key, $val);
    
    $log_str = "Value >$val< has been successfully pushed inplace in \$_SESSION['$key'] array";
    file_log_write ($here, $log_str);
    
    exiting_from_function ($here);
return;
}

function session_hash_push_inplace_of_key_of_sub_key_of_value ($key, $sub_key, $val) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($key, $sub_key, \$val)");
    
# Example $_SESSION['irp_register']['newname'] 
 
    if (isset ($_SESSION)) {
        $arr_a = $_SESSION[$key][$sub_key];
        if ( is_array ($arr_a) ) {
            if ( ! array_value_exists ($val, $arr_a) ) {
                array_push_inplace_of_array_name_of_value_of_array ($sub_key, $val, $arr_a);
                $_SESSION[$key][$sub_key] = $val;
            }
        }
    }
    
    session_check_value_of_key_of_sub_key_of_value ($key, $sub_key, $val);
    
    $log_str = "Value >$val< has been successfully pushed inplace in \$_SESSION['$key']['$sub_key'] array";
    file_log_write ($here, $log_str);
    
    exiting_from_function ($here);
return;
}


exiting_from_module ($module);

?>