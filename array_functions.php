<?php

require_once "string_functions.php";
require_once "management_functions.php";
require_once "surname_functions.php";

$module = "array_functions";
# entering_in_module ($module);

function is_empty_of_array ($arr_a) {
  $here = __FUNCTION__;
#  entering_in_function ($here);
#  # debug ($here , "input array", $arr_a); 
 
  $cou = count ($arr_a);
  $boo = ($cou == 0);
  
#  debug ($here , "output count", $cou); 
#  exiting_from_function ($here);

  return $boo;
};

function has_values_unique_of_any_array ($arr_a) {
  $here = __FUNCTION__;
#  entering_in_function ($here . "($arr_a...)");

  $new_a = array_unique ($arr_a);

  $boo = count ($new_a) == count ($arr_a);
  
#  debug ($here , "output count", $cou); 
#  exiting_from_function ($here);

  return $boo;

};

function array_duplicated_value_by_count_of_array ($arr_a) {
  $here = __FUNCTION__;
#  entering_in_function ($here . "($arr_a)");

  $new_a = array_unique ($arr_a);

  $cou_by_val_a = array();
  $tem_cou_by_val_a = array_count_values ($arr_a);
  foreach ($tem_cou_by_val_a as $val => $cou) {
      if ($cou > 1 ) {
          $cou_by_val_a[$val] = $cou;
      }
  }
  
#  debug ($here , "output count", $cou); 
#  exiting_from_function ($here);

  return $cou_by_val_a;

};

function string_capitalize_of_array ($arr_a) {
  $here = __FUNCTION__;
#  entering_in_function ($here);
#  # debug_n_check ($here , "input array", $arr_a); 
 
  foreach ($arr_a as $key => $val) {
    $out_arr[$key] = ucfirst ($val);
   }
  
#  debug_n_check ($here , "output array", $out_arr); 
#  exiting_from_function ($here);

  return $out_arr;
  };

function array_serialize_of_array_of_here ($arr_a, $her) {
  $here = __FUNCTION__;
#  entering_in_function ($here . " ($arr_a, $her)");
 
  if (array_key_exists ('', $arr_a)){
      $val = $arr_a[''];
      # debug ($her, 'arr_a', $arr_a); 
      print_fatal_error ($here, 
      "key is NOT empty for value >$val<",
      "key is empty",
      "Check array ");
  }

  $str = serialize ($arr_a);
  
#  debug_n_check ($here , "output array", $str); 
#  exiting_from_function ($here);

  return $str;
  };

function array_serialize_of_separator_of_array_by_key ($sep, $arr_a) {
  $here = __FUNCTION__;
#  entering_in_function ($here . " ($sep, $arr_a)");
  
  $str = '';
  foreach ($arr_a as $key => $val) {

      if (is_array ($val)) {
          $str .= array_serialize_of_separator_of_array_by_key ($sep, $val);
      }
      else {
          $str .= $key . $sep . $val . "\n";
      }
  }
   
#  debug_n_check ($here , '$str', $str); 
#  exiting_from_function ($here);

  return $str;
}

function array_by_key_unserialize_of_separator_of_string ($sep, $str_sur) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($sep, $str_sur)");

  $str_a = explode ("\n", $str_sur);

  $val_by_key_a = array ();
  foreach ($str_a as $key => $val) {

      $val_a = explode ($sep, $val);
      $arr_key = $val_a[0];
      $arr_val = $val_a[1];
      $val_by_key_a[$arr_key] = $arr_val;

  }
  $val_by_key_a = array_filter ($val_by_key_a);

#  # debug_n_check ($here , '$val_by_key_a', $val_by_key_a); 
  exiting_from_function ($here);
  
  return $val_by_key_a;

}

function array_by_key_unserialize_of_regular_expression_of_string ($reg_exp, $str_sur) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($reg_exp, $str_sur)");

/* $reg = "/[\s]+/" */

  $str_a = explode ("\n", $str_sur);

  $val_by_key_a = array ();
  foreach ($str_a as $key => $val) {
      $val_a = preg_split ($reg_exp, $val);
      $k = $val_a[0];
      $v = $val_a[1];
      $val_by_key_a[$k] = $v;
  }

#  # debug_n_check ($here , '$val_by_key_a', $val_by_key_a); 
  exiting_from_function ($here);
  
  return $val_by_key_a;

}

function check_is_array_unique_of_nameofarray_of_array ($nam_arr, $arr_a) { 
  $here = __FUNCTION__;
#  entering_in_function ($here);
#  # debug ($here , "input array", $arr_a); 

  if ( ! has_values_unique_of_any_array ($arr_a) ){
      $cou_by_val_a = array_duplicated_value_by_count_of_array ($arr_a);

      # debug ($here , '$cou_by_val_a', $cou_by_val_a);
      print_html_array ($here , '$cou_by_val_a', $cou_by_val_a);

      print_fatal_error ($here, 
      "array >$nam_arr< were unique",
      "it is NOT",
      "Check");
  }
 
#  exiting_from_function ($here);

}

function check_is_array_unique_of_nameofarray_of_associative_array ($nam_arr, $val_by_key_a) {
  $here = __FUNCTION__;
#  entering_in_function ($here);
#  # debug ($here , "input array", $arr_a); 

  if ( ! has_values_unique_of_any_array ($val_by_key_a) ){
      $cou_by_val_a = array_duplicated_value_by_count_of_array ($val_by_key_a);

      # debug ($here , '$cou_by_val_a', $cou_by_val_a);
      print_html_array ($here , '$cou_by_val_a', $cou_by_val_a);

      print ($here . '<br>'. 'Duplicated values:<br>');
      foreach ($cou_by_val_a as $val => $cou) {
          
          foreach ($val_by_key_a as $k => $v) {
              if ($v == $val) {
                  print ("value $val from key $k<br>");
              }
          }
      }

      print_fatal_error ($here, 
      "array >$nam_arr< were unique",
      "it is NOT",
      "Check");
  }
 
#  exiting_from_function ($here);

}

function is_value_unique_in_array ($val, $arr_a) {
  $here = __FUNCTION__;
#  entering_in_function ($here . "($val, $arr_a)");
#  debug ($here , "input value", $val); 
#  # debug ($here , "input array", $arr_a); 

  foreach ($arr_a as $key => $value) {
    if ($value == $val) {
      $res_a[] = $key;
    }
  }
  $cou = count ($res_a);
  $boo = ($cou == 1);
  
#  debug ($here , "output count", $cou); 
#  exiting_from_function ($here);

  return $boo;

};

function check_is_value_unique_in_array ($val, $arr_a) {
  $here = __FUNCTION__;
#  entering_in_function ($here);
#  debug ($here , "input value", $val); 
#  # debug ($here , "input array", $arr_a); 

  if ( ! is_value_unique_in_array ($val, $arr_a) ){
    fatal_error ($here, "value >$val< exists more than once in array");
  }
 
#  exiting_from_function ($here);

}

function is_key_unique_in_array ($key, $arr_a) {
  $here = __FUNCTION__;
#  entering_in_function ($here);
#  debug ($here , "input key", $key); 
#  # debug ($here , "input array", $arr_a); 

  foreach ($arr_a as $arr_key => $value) {
    if ($key == $arr_key) {
      $res_a[] = $value;
    }
  }
  $cou = count ($res_a);

#  debug ($here , "output count", $cou);

  $boo = ($cou == "1");
 
#  exiting_from_function ($here);

  return $boo;
}

function check_is_key_unique_in_array ($key, $arr_a) {
  $here = __FUNCTION__;
#  entering_in_function ($here);
#  debug ($here , "input key", $key); 
#  # debug ($here , "input array", $arr_a); 

  if ( ! is_key_unique_in_array ($key, $arr_a) ){
    fatal_error ($here, "value >$key< exists more than once in array");
  }
 
#  exiting_from_function ($here);

}

function array_value_exists ($ele, $arr_a) {
  $here = __FUNCTION__;
#  entering_in_function ($here);
#  debug ($here , "input key", $key); 
#  # debug ($here , "input array", $arr_a); 

  $boo = in_array ($ele, $arr_a);
 
#  exiting_from_function ($here);

  return $boo;
}

function array_merge_unique_of_array_of_array ($fir_a, $sec_a) {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $arr_a = $fir_a;
  foreach ($sec_a as $k => $v) {
      array_push ($arr_a, $v);
  }

  $mer_a = array_unique ($arr_a);
  exiting_from_function ($here);
  return $mer_a;
}

function renumber_keys_of_step_of_array ($step, $inp_arr_a) {
  $here = __FUNCTION__;
#  entering_in_function ($here);
#  debug_n_check ($here , "input step", $step); 
#  # debug_n_check ($here , "input array", $inp_arr_a); 
 
  $new_key = 0;
  foreach ($inp_arr_a as $key => $val) {
    $out_arr[$new_key] = $val;
    $new_key = $new_key + $step; 
   }
  
#  debug_n_check ($here , "output array", $out_arr); 
#  exiting_from_function ($here);

  return $out_arr;
  };

function array_swap ($key_fr, $key_to, $inp_arr_a) {
  $here = __FUNCTION__;
#  entering_in_function ($here);
#  debug_n_check ($here , "key from", $key_fr);
#  debug_n_check ($here , "key to", $key_to);
#  # debug_n_check ($here , "input array", $inp_arr_a);

  $val_fr = $inp_arr_a[$key_fr];
  $val_to = $inp_arr_a[$key_to];

  $out_arr_a = $inp_arr_a;
  $out_arr_a[$key_to] = $val_fr;
  $out_arr_a[$key_fr] = $val_to;

#  # debug_n_check ($here , "output array", $out_arr_a);

#  exiting_from_function ($here);
  return $out_arr_a;
}

function array_dollar_get_retrieve_value_of_key ($key, $mod) {
  $here = __FUNCTION__;
#  entering_in_function ($here . " ($key, $mod)");

#  debug_n_check ($here , '$_GET', $_GET);

  $val = $_GET[$key];
  $val = remove_control_M ($val);
  $val = trim ($val);

  if ($val == '') {
    print '$_GET array is :<br>';
    print_r ($_GET);
    $message  = " Fatal Error in >$mod< <br>   GET[" . $key ."] is EMPTY<br>";
    if (is_substring_of_substring_off_string ('_surname', $key)) {
        $fno_sur =  surname_catalog_fullnameoffile_make ();
        $message .= "Check that file >$fno_sur< exists";
    }
    else {
      $message .= " Check that function >${key}_build< is implemented and accessible";
    }
    fatal_error ($here , $message);

  } else {

    check_is_key_unique_in_array ($key, $_GET);
    $_SESSION['last_dollar_get_register'][$key] = $val;
    $_SESSION['get_variable_register'][$key] = $val;
    father_n_son_stack_entity_push_of_father_of_son ($key, 'GET');
    print_long ($here , "\$_GET[$key] = $val");
  }

#  debug_n_check ($here , '$val', $val);
#  exiting_from_function ($here);

  return $val;

}

function array_retrieve_value_of_key_of_array ($key, $arr_a) {
  $here = __FUNCTION__;
#  entering_in_function ($here);
#  debug_n_check ($here , "input key", $key);
#  # debug_n_check ($here , "input array", $arr_a);

  if ( ! array_key_exists ($key, $arr_a) ) {
      $str = string_html_array ($here, "Array", $arr_a);
      print_fatal_error ($here , 
      "key >$key< were found in array",
      $str,
      "Check");
      }

  $val = $arr_a[$key];

#  debug_n_check ($here , "ouput value", $val);
#  exiting_from_function ($here);

  return $val;

}

function array_retrieve_non_empty_value_of_key ($key, $arr_a) {
  $here = __FUNCTION__;
#  entering_in_function ($here);
#  debug_n_check ($here , "input key", $key);
#  # debug_n_check ($here , "input array", $arr_a);

  $val = array_retrieve_value_of_key_of_array ($key, $arr_a);
  if ( is_empty_of_string ($val) ) {
    fatal_error ($here , "value is empty for key >$key< in array");
  }

#  debug_n_check ($here , '$val', $val);
#  exiting_from_function ($here);

  return $val;

}

function array_of_key_of_value_of_array ($key, $val, $arr_a) {
  $here = __FUNCTION__;
#  entering_in_function ($here);
#  debug_n_check ($here , "input key", $key);
#  debug_n_check ($here , "input val", $val);
#  # debug ($here , "input array", $arr_a);

  if ($key == '') {
    fatal_error ($here , "key >$key< is not found in array");
  }

  $val_exi = array_search ($key, $arr_a);

  if ($val_exi == '') {
    $arr_a [$key] = $val;
  }
  else {
    if ($val_exi != $val) {
      fatal_error ($here , "value >$val< already exist with value >$val_exi< for key >$key< is not found in array");
    }
  }

#  # debug_n_check ($here , "ouput array", $arr_a);
#  exiting_from_function ($here);

  return $arr_a;

}

function array_retrieve_key_of_value ($val, $arr_a, $where) {
  $here = __FUNCTION__;
 entering_in_function ($here);
 debug_n_check ($here ,'$val', $val);
 # debug_n_check ($here , '$arr_a', $arr_a);
 
 if (is_empty_of_array ($arr_a)) {
     print_fatal_error ($where , 
     '$arr_a were NOT EMPTY',
     'it is EMPTY',
     'Check');
 }
 
 $key = array_search ($val, $arr_a);
 
 if (! isset ($key)) {
     fatal_error ($where , "value >$val< is not found in array");
 }
 
  debug_n_check ($here , '$key', $key);
  exiting_from_function ($here);
  return $key;

}

function get_retrieve_key_of_value ($val) {
  $here = __FUNCTION__;
#  entering_in_function ($here);
#  debug_n_check ($here , "input value", $val);
#  debug_n_check ($here , '$_GET', $_GET);

  check_is_value_unique_in_array ($val, $_GET);

  $key = array_retrieve_key_of_value ($val, $_GET, $here);

#  debug_n_check ($here , "ouput key", $key);
#  exiting_from_function ($here);

  return $key;

}

function last_element_of_array ($arr_a) {
  $here = __FUNCTION__;
#  entering_in_function ($here . "($arr_a)");

  /* print_html_array ($here , "input array", $arr_a);  */

  if (isset ($arr_a)) { 
      $keys = array_keys ($arr_a);
      $last_key = end ($keys);
      $last = $arr_a [$last_key];
      /* print_html_array ($here , "keys", $keys);  */
      /* print_html_scalar ($here , "last key", $last_key);  */
      /* print_html_scalar ($here , "output last", $last);  */
    #  exiting_from_function ($here);
    }
    else {
      fatal_error ($here, "input array is empty");
    }

  return $last;

};

function lowercase_n_sort_of_string_by_key_array ($str_by_key_a) {
    $here = __FUNCTION__;
    entering_in_function ($here . " (" . current($str_by_key_a) . ", ...");

    # debug_n_check ($here, '$str_by_key_a', $str_by_key_a);

    $str_a = array_values ($str_by_key_a);
    $str_low_a = array_map ("strtolower", $str_a); 
    # debug_n_check ($here, 'before sort $str_low_a', $str_low_a);

    sort ($str_low_a);

    # debug_n_check ($here, '$str_low_a', $str_low_a);
    exiting_from_function ($here);

    return $str_low_a;
}

# exiting_from_module ($module);

?>