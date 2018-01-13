<?php

require_once "string_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";


function array_first_dots_last_element_of_array ($arr_a) {
  $here = __FUNCTION__;
  entering_in_function ($here);
#  # debug ($here , "input array", $arr_a); 

  $first = $arr_a[0];
  $last = end ($arr_a);

  if (is_array ($first)) {
      $first = array_first_dots_last_element_of_array ($first);
  }

  if (is_array ($last)) {
      $last = array_first_dots_last_element_of_array ($last);
  }

  $str = $first . ' ... ' . $last;

#  debug ($here , "output count", $cou); 
  exiting_from_function ($here);

  return $str;
};

function array_is_empty_of_array ($arr_a) {
  $here = __FUNCTION__;
  entering_in_function ($here);
#  # debug ($here , "input array", $arr_a); 
 
  $cou = count ($arr_a);
  $boo = ($cou == 0);
  
#  debug ($here , "output count", $cou); 
  exiting_from_function ($here);

  return $boo;
};

function array_check_is_empty_of_what_of_array_of_where ($what, $arr_a, $where) {
  $here = __FUNCTION__;
  entering_in_function ($here);
#  # debug ($here . " ($what, $arr_a, $where)");
 
  if (array_is_empty_of_array ($arr_a)) {
      print_fatal_error ($where,
      "array $what were NOT empty",
      "it is EMPTY",
      "Check");
  }
  
#  debug ($here , "output count", $cou); 
  exiting_from_function ($here);

  return;
};

function has_values_unique_of_any_array ($arr_a) {
  $here = __FUNCTION__;
  entering_in_function ($here . " (\$arr_a...)");

  debug ($here, '$arr_a', $arr_a);
  $uni_a = array_unique ($arr_a);
  debug ($here, '$uni_a', $uni_a);
  $boo = count ($uni_a) == count ($arr_a);
  
  exiting_from_function ($here . " is " . string_of_boolean ($boo));

  return $boo;

};

function check_has_values_unique_of_any_array ($arr_a) {
  $here = __FUNCTION__;
  entering_in_function ($here);
#  # debug ($here , "input array", $arr_a); 
 
  if (has_values_unique_of_any_array ($arr_a)) {
      print_fatal_error ($her,
      "array \$arr_a had only UNIQUE values",
      "it is EMPTY",
      "Check");
  }
  
#  debug ($here , "output count", $cou); 
  exiting_from_function ($here);

  return;
};

function check_has_no_empty_value_of_any_array ($arr_a) {
  $here = __FUNCTION__;
  entering_in_function ($here);
#  # debug ($here , "input array", $arr_a); 
 
  foreach ($arr_a as $key => $val) {
      if (is_array ($val)) {
          array_check_is_empty_of_what_of_array_of_where ("Value for key >$key<", $val, $here); 
      }
      else {
          string_check_is_empty_of_what_of_where_of_string ("Value for key >$key<", $here, $val);
      }
  }
  
#  debug ($here , "output count", $cou); 
  exiting_from_function ($here);

  return;
};

function array_duplicated_value_by_count_of_array ($arr_a) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($arr_a)");

  $cou_by_val_a = array();
  $tem_cou_by_val_a = array_count_values ($arr_a);
  foreach ($tem_cou_by_val_a as $val => $cou) {
      if ($cou > 1 ) {
          $cou_by_val_a[$val] = $cou;
      }
  }
  
#  debug ($here , "output count", $cou); 
  exiting_from_function ($here);

  return $cou_by_val_a;

};

function array_serialize_of_array_of_where ($arr_a, $where) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($arr_a, $where)");
 
  if (array_key_exists ('', $arr_a)){
      $val = $arr_a[''];
      # debug ($her, 'arr_a', $arr_a); 
      print_fatal_error ($here . ' in ' . $where , 
      "key is NOT empty for value >$val<",
      "key is empty",
      "Check array ");
  }

  $str = serialize ($arr_a);
  
#  debug_n_check ($here , "output array", $str); 
  exiting_from_function ($here);

  return $str;
  };

function array_serialize_of_separator_of_array_by_key ($sep, $arr_a) {
  $here = __FUNCTION__;
  
  $str = '';
  foreach ($arr_a as $key => $val) {

      if (is_array ($val)) {
          $str .= array_serialize_of_separator_of_array_by_key ($sep, $val);
      }
      else {
          $str .= $key . $sep . $val . "\n";
      }
  }
   
  return $str;
}

function array_by_key_unserialize_of_separator_of_string ($sep, $str_sur) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($sep, $str_sur)");

  $str_tri = trim ($str_sur, " \t\n\r\0\x0B");
  $str_a = explode ("\n", $str_tri);
  
  $val_by_key_h = array ();
  foreach ($str_a as $key => $val) {
      
      $val_a = explode ($sep, $val);
      if (count ($val_a) > 1) {
          $arr_key = $val_a[0];
          $arr_val = $val_a[1];
          $val_by_key_h[$arr_key] = $arr_val;
      }
      else {
          print_fatal_error ($here,
          "separator >$sep< were found at least once in string",
          "string is >$val<",
          "Check");
      }
  }
  
  $val_by_key_h = array_filter ($val_by_key_h);
  
  #  # debug_n_check ($here , '$val_by_key_h', $val_by_key_h); 
  exiting_from_function ($here);
  
  return $val_by_key_h;
  
}

function array_by_key_unserialize_of_regular_expression_of_string ($reg_exp, $str_sur) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($reg_exp, $str_sur)");

/* $reg = "/[\s]+/" */

  $str_a = explode ("\n", $str_sur);

  $val_by_key_h = array ();
  foreach ($str_a as $key => $val) {
      $val_a = preg_split ($reg_exp, $val);
      $k = $val_a[0];
      $v = $val_a[1];
      $val_by_key_h[$k] = $v;
  }

#  # debug_n_check ($here , '$val_by_key_h', $val_by_key_h); 
  exiting_from_function ($here);
  
  return $val_by_key_h;

}

function check_is_array_unique_of_what_of_array ($nam_arr, $arr_a) { 
  $here = __FUNCTION__;
  entering_in_function ($here);
#  # debug ($here , "input array", $arr_a); 

  if ( ! has_values_unique_of_any_array ($arr_a) ){
      $eol = end_of_line ();

      print_html_array ($here , $nam_arr, $arr_a);
      $cou_by_val_a = array_duplicated_value_by_count_of_array ($arr_a);
      
      print "Duplicated values for array $nam_arr$eol";
      foreach ($cou_by_val_a as $key => $cou) {
          print ("$cou values $key in array $nam_arr$eol");
      }

      print_fatal_error ($here, 
      "array >$nam_arr< were unique",
      "it is NOT",
      "Check message upper");
  }
 
  exiting_from_function ($here);
  return;
}

function check_is_array_unique_of_what_of_hash ($nam_arr, $val_by_key_h) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_arr)");
#  # debug ($here , '$arr_a', $arr_a); 

  if ( ! has_values_unique_of_any_array ($val_by_key_h) ){
      $cou_by_val_a = array_duplicated_value_by_count_of_array ($val_by_key_h);

      debug ($here , '$cou_by_val_a', $cou_by_val_a);
      print_html_array ($here , '$cou_by_val_a', $cou_by_val_a);

      print ($here . '<br>'. 'Duplicated values:<br>');
      foreach ($cou_by_val_a as $val => $cou) {
          
          foreach ($val_by_key_h as $k => $v) {
              if ($v == $val) {
                  debug_long ($here, "value $val from key $k<br>");
                  print ("value $val from key $k<br>");
              }
          }
      }

      print_fatal_error ($here, 
      "array >$nam_arr< were unique",
      "it is NOT",
      "Check");
  }
 
  exiting_from_function ($here);
  return;
}

function is_value_unique_in_array ($val, $arr_a) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($val, $arr_a)");
#  debug ($here , "input value", $val); 
#  # debug ($here , "input array", $arr_a); 

  foreach ($arr_a as $key => $value) {
    if ($value == $val) {
      $res_a[] = $key;
    }
  }
  $cou = count ($arr_a);
  $boo = ($cou == 1);
  
#  debug ($here , "output count", $cou); 
  exiting_from_function ($here);

  return $boo;

};

function check_is_value_unique_in_array ($val, $arr_a) {
  $here = __FUNCTION__;
  entering_in_function ($here);
#  debug ($here , "input value", $val); 
#  # debug ($here , "input array", $arr_a); 

  if ( ! is_value_unique_in_array ($val, $arr_a) ){
      print_html_array ($here , '$arr_a', $arr_a);
      print_fatal_error ($here, 
      "value >$val< exists only ONCE in array",
      "it does NOT",
      "Check array upper");
  }
 
  exiting_from_function ($here);
  return;
}

function is_key_unique_in_array ($key, $arr_a) {
    $here = __FUNCTION__;
    entering_in_function ($here);
    #  debug ($here , "input key", $key); 
    #  # debug ($here , "input array", $arr_a); 
    
    if ( ! is_array ($arr_a)) {
        print_fatal_error ($here,  
        "second argument were an ARRAY",
        "it is NOT",
        "Check");
    }

    foreach ($arr_a as $arr_key => $value) {
        if ($key == $arr_key) {
            $res_a[] = $value;
        }
    }
    $cou = count ($res_a);
    
    #  debug ($here , "output count", $cou);
    
    $boo = ($cou == "1");
    
    exiting_from_function ($here);
    
    return $boo;
}

function check_is_key_unique_in_array ($key, $arr_a) {
  $here = __FUNCTION__;
  entering_in_function ($here);
#  debug ($here , "input key", $key); 
#  # debug ($here , "input array", $arr_a); 

  if ( ! is_key_unique_in_array ($key, $arr_a) ){
    fatal_error ($here, "value >$key< exists more than once in array");
  }
 
  exiting_from_function ($here);
  return;
}

function array_exists_of_value_of_array ($ele, $arr_a) {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    if ( ! is_array ($arr_a)) {
        print_fatal_error ($here,  
        "second argument were an ARRAY",
        "it is NOT",
        "Check");
    }
    
    if (array_is_empty_of_array ($arr_a)) {
        $boo = false;
    }
    else {
        $boo = in_array ($ele, $arr_a);
    }
    
    exiting_from_function ($here);
    
    return $boo;
}

function array_check_exists_of_value_of_array ($val, $arr_a) {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    if ( ! array_exists_of_value_of_array ($val, $arr_a)) {
        print_html_array ($here, '$arr_a', $arr_a);
        print_fatal_error ($here,  
        "value $val exists in array",
        "it does NOT",
        "Check array above");
    }
    exiting_from_function ($here);
    
    return;
}

function array_remove_all_of_value_of_array ($val, $arr_a) {
    $here = __FUNCTION__;
    entering_in_function ($here);

    array_exists_of_value_of_array ($val, $arr_a);

    $del_a = array ();
    foreach ($arr_a as $k => $v) {
        if ($v != $val) {
            array_push ($del_a, $v);
        }
    }

    exiting_from_function ($here);
    return $del_a;
}

function array_first_key_of_value_of_array ($val, $arr_a) {
    $here = __FUNCTION__;
    entering_in_function ($here);

    array_check_exists_of_value_of_array ($val, $arr_a);

    foreach ($arr_a as $k => $v) {
        if ($v == $val) {
            $key = $k;
            break;
        }
    }

    exiting_from_function ($here);
    return $key;
}

function array_remove_first_of_value_of_array ($val, $arr_a) {
    $here = __FUNCTION__;
    entering_in_function ($here);

    array_check_exists_of_value_of_array ($val, $arr_a);

    $del_a = $arr_a;
    $key = array_first_key_of_value_of_array ($val, $del_a);
    unset ($del_a[$key]);

    exiting_from_function ($here);
    return $del_a;
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
  entering_in_function ($here);
#  debug_n_check ($here , "input step", $step); 
#  # debug_n_check ($here , "input array", $inp_arr_a); 
 
  $new_key = 0;
  foreach ($inp_arr_a as $key => $val) {
    $out_arr[$new_key] = $val;
    $new_key = $new_key + $step; 
   }
  
#  debug_n_check ($here , "output array", $out_arr); 
  exiting_from_function ($here);

  return $out_arr;
};

function array_swap ($key_fr, $key_to, $inp_arr_a) {
  $here = __FUNCTION__;
  entering_in_function ($here);
#  debug_n_check ($here , "key from", $key_fr);
#  debug_n_check ($here , "key to", $key_to);
#  # debug_n_check ($here , "input array", $inp_arr_a);

  $val_fr = $inp_arr_a[$key_fr];
  $val_to = $inp_arr_a[$key_to];

  $out_arr_a = $inp_arr_a;
  $out_arr_a[$key_to] = $val_fr;
  $out_arr_a[$key_fr] = $val_to;

#  # debug_n_check ($here , "output array", $out_arr_a);

  exiting_from_function ($here);
  return $out_arr_a;
}

function array_retrieve_value_of_key_of_array ($key, $arr_a) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($key, \$arr_a)");
  debug_n_check ($here , '$arr_a', $arr_a);

  if ( ! is_array ($arr_a)) {
      print_fatal_error ($here,  
      "second argument were an ARRAY",
      "it is NOT",
      "Check");
      }

  if ( count ($arr_a) == 0) {
      print_fatal_error ($here,  
      "Array argument were NOT empty",
      "it is EMPTY",
      "Check");
      }

  if ( ! array_key_exists ($key, $arr_a) ) {
      $str = string_html_of_array ($arr_a);
      print_fatal_error ($here , 
      "key >$key< were found in array",
      $str,
      "Check");
      }

  $val = $arr_a[$key];

  exiting_from_function ($here . " with \$val >$val<");

  return $val;

}

function array_retrieve_non_empty_value_of_key_of_array_of_where ($key, $arr_a, $where) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($key, \$arr_a, $where)");
debug_n_check ($here , "input array", $arr_a);

  $val = array_retrieve_value_of_key_of_array ($key, $arr_a);
  if ( string_is_empty_of_string ($val) ) {
    fatal_error ($here , "value is empty for key >$key< in array");
  }

#  debug_n_check ($here 
  exiting_from_function ($here . " with \$val >$val<");

  return $val;

}

function array_of_key_of_value_of_array ($key, $val, $arr_a) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($key, $val, \$arr_a)");
  debug_n_check ($here , '$arr_a', $arr_a);

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

  debug_n_check ($here , '$arr_a', $arr_a);
  exiting_from_function ($here);

  return $arr_a;

}

function array_retrieve_key_array_of_value_of_array_of_where ($val, $arr_a, $where) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($val, \$arr_a, $where)");
    debug_n_check ($here, '$arr_a', $arr_a);
    
    if (array_is_empty_of_array ($arr_a)) {
        print_fatal_error ($here . ' in ' . $where , 
        '$arr_a were NOT EMPTY',
        'it is EMPTY',
        'Check');
    }
    
    $key_a = array_keys ($arr_a, $val);
    
    if (! isset ($key_a)) {
        fatal_error ($where , "value >$val< is not found in array");
    }
    
    debug_n_check ($here , '$key_a', $key_a);
    exiting_from_function ($here);
    return $key_a;
}

function array_retrieve_only_key_of_value_of_array_of_where ($val, $arr_a, $where) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($val, \$arr_a, $where)");
    debug_n_check ($here, '$arr_a', $arr_a);
    
    if (array_is_empty_of_array ($arr_a)) {
        print_fatal_error ($here . ' in ' . $where , 
        '$arr_a were NOT EMPTY',
        'it is EMPTY',
        'Check');
    }

    $key_a = array_keys ($arr_a, $val);
    
    if ($key_a) {
        if ( count ($key_a) == 1) {
            $key = $key_a[0];
        }
        else {
            print_html_array ($where, '$key_a', $key_a);
            print_fatal_error ($here . ' in ' . $where , 
            "only ONE key defined value $val",
            'it defines the keys shown upper',
            'Check');
        }
    }
    else {
        print_html_array ($where, '$arr_a', $arr_a);
        print_fatal_error ($here . ' in ' . $where , 
        "at least ONE key defined value $val",
        'it defines NO key',
        'Check array upper');
    }
    
    exiting_from_function ($here . " with $key >$key<");
    return $key;
}

function get_retrieve_key_of_value ($val) {
  $here = __FUNCTION__;
  entering_in_function ($here);
#  debug_n_check ($here , "input value", $val);
#  debug_n_check ($here , '$_GET', $_GET);

  check_is_value_unique_in_array ($val, $_GET);

  $key = array_retrieve_only_key_of_value_of_array_of_where ($val, $_GET, $here);

  exiting_from_function ($here . " with $key >$key<");

  return $key;

}

function array_current_element_of_array ($arr_a) {
  $here = __FUNCTION__;
  entering_in_function ($here . " (\$arr_a)");

  debug_n_check ($here , '$arr_a', $arr_a); 
  
  array_check_is_empty_of_what_of_array_of_where ('an array', $arr_a, $here);
  
  if (isset ($arr_a)) { 
      $keys = array_keys ($arr_a);
      $cur_key = current ($keys);
      $cur = $arr_a [$cur_key];
      exiting_from_function ($here . " with $cur >$cur<");
  }
  
  return $cur;

};

function array_last_element_of_array ($arr_a) {
  $here = __FUNCTION__;
  entering_in_function ($here . " (\$arr_a)");

  debug_n_check ($here , '$arr_a', $arr_a); 

  array_check_is_empty_of_what_of_array_of_where ('an array', $arr_a, $here);

  if (isset ($arr_a)) { 
      $keys = array_keys ($arr_a);
      $last_key = end ($keys);
      $last = $arr_a [$last_key];
      exiting_from_function ($here . " with $last >$last<");
    }

  return $last;

};

function lowercase_n_sort_of_string_by_key_array ($str_by_key_a) {
    $here = __FUNCTION__;
    entering_in_function ($here . " (\$str_by_key_a");

    # debug_n_check ($here, '$str_by_key_a', $str_by_key_a);

    $str_a = array_values ($str_by_key_a);
    $str_low_a = array_map ("strtolower", $str_a); 
    # debug_n_check ($here, 'before sort $str_low_a', $str_low_a);

    sort ($str_low_a);

    # debug_n_check ($here, '$str_low_a', $str_low_a);
    exiting_from_function ($here);
    return $str_low_a;
}

function list_remove_of_glue_of_element_of_list ($glu, $ele, $lis) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($glu, $ele, $lis)");

    $arr_a = explode ($glu, $lis);
    $del_a = array_remove_first_of_value_of_array ($ele, $arr_a);
    $lis_del = implode ($glu, $del_a);

    exiting_from_function ($here . " ($glu, $ele, $lis)");
    return $lis_del;
}

function ___array_push_inplace_of_array_name_of_value_of_array ($nam_arr, $val, $arr_a) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($nam_arr, $val, \$arr_a)");

    if (! is_array ($arr_a)) {
        print_fatal_error ($here,
        "Array >$nam_arr< were an array",
        "it is NOT an ARRAY",
        "Check");
    }

    $cou_in = count ($arr_a);
    array_push ($arr_a, $val);
    $cou_out = count ($arr_a);

  print "in $here ici<br>";
  print "val is :<br>";
  print_r ($val); 
  print "<br>end is :<br>";
  print_r (end ($arr_a)); 
  print "<br>count is :" . count ($arr_a); 
  print "<br>fin<br>";

    if ($cou_out != $cou_in + 1) {
        print_fatal_error ($here,
        "after pushing element >$val< array >$nam_arr< count >$cou_in< were incremented by 1",
        "array new count is >$cou_out<",
        "Check");
    }
    else {
        $log_str = "Value >$val< has been pushed at top of array >$nam_arr<";
        file_log_write ($here, $log_str);
    }


    exiting_from_function ($here . " with count = $cou_out");
    return;
}


?>