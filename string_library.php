<?php
require_once "management_library.php";
require_once "file_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

function string_remove_control_M ($str) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($str)");

  $str = preg_replace ('/(\r\n|\r|\n)/m', '', $str); 

  exiting_from_function ($here . " without $str");
  return $str;

}

function string_html_capitalized_of_string ($str) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($str)");

  $fir_cha = $str[0];
  if ($fir_cha == '&') {
        $str[1] = ucfirst ($str[1]);
  }
  else {
      $str = ucfirst ($str);
  }
  
  exiting_from_function ($here . " with $str");
  return $str;
};

function string_html_capitalized_accented_of_string_accented ($str) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($str)");
    
    $str_htm = htmlentities ($str, ENT_QUOTES, "UTF-8"); 

    $fir_cha = $str_htm[0];

    if ($fir_cha == '&') {
        $str_htm[1] = ucfirst ($str_htm[1]);
    }
    else {
        $str_htm = ucfirst ($str_htm);
    }

    exiting_from_function ($here . " with $str_htm");
    return $str_htm;
};


function string_remove_html_entities ($html_str) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($html_str)");

  $str = preg_replace ('#&([A-za-z])(?:acute|grave|cedil|circ|orn|ring|slash|th|tilde|uml);#', '\1', $html_str);

  exiting_from_function ($here . " ($str)");

  return $str;
};

function string_remove_accents ($str) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($str)");
  
  /* get html translation of é à etc...*/
  $html_str = htmlentities ($str, ENT_NOQUOTES, "UTF-8"); 
  /* replace html form */
  $str = string_remove_html_entities ($html_str);

  exiting_from_function ($here . " ($str)");

  return $str;
};

function string_word_remove_accents ($str, $charset='utf-8')  /* why two functions ??? FCC 6th March 2016*/ {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($str)");
 
  /* get html translation of é à etc...*/
  $str = htmlentities ($str, ENT_NOQUOTES, $charset); 
  
  $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
  $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
  $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères
  
  exiting_from_function ($here . " ($str)");  
  return $str;
}

function string_replace_accents_to_html_code ($str) {
  $here = __FUNCTION__;
    entering_in_function ($here . " ($str)");
 
  $str = str_replace('á', '&aacute;', $str);
  $str = str_replace('à', '&agrave;', $str);
  $str = str_replace('â', '&acirc;', $str);
  $str = str_replace('ä', '&auml;', $str);

  $str = str_replace('é', '&eacute;', $str);
  $str = str_replace('è', '&egrave;', $str);
  $str = str_replace('ê', '&ecirc;', $str);
  $str = str_replace('ë', '&euml;', $str);

  $str = str_replace('î', '&icirc;', $str);
  $str = str_replace('ï', '&iuml;', $str);

  $str = str_replace('ô', '&ocirc;', $str);
  $str = str_replace('ö', '&ouml;', $str);

  $str = str_replace('û', '&ucirc;', $str);
  $str = str_replace('ü', '&uuml;', $str);

  $str = str_replace('ç', '&ccedil;', $str);
  
  exiting_from_function ($here . " ($str)");  
  return $str;
}

function string_is_empty_of_string ($str) {
  $here = __FUNCTION__;
  
  $bol = empty ($str); 
  
  return $bol;
};

function string_check_is_not_empty_of_what_of_where_of_string ($what, $where, $str) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($what, $where, $str)");

  if (string_is_empty_of_string ($str)){
      print_fatal_error ($here,
      "Argument string ($what) of function $where were NOT EMPTY",
      "it is empty",
      "Check");
  }

  exiting_from_function ($here . " ($str)");

  return;
};

function word_name_capitalized_of_string_surname ($str, $encoding='utf-8') {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($str)");

  $str_bef = $str;

  $str = string_remove_control_M ($str);
  $str = string_remove_accents ($str, $encoding='utf-8');
  $str = trim ($str);
  $str = str_replace(' ', '_', $str);
  $str = str_replace('\'', '_', $str);
  $str = str_replace('-', '_', $str);
  $str = strtolower ($str);
  $str = ucfirst ($str);

  /* $str = preg_replace ('#&([A-za-z]{2})(?:lig);#', '\1', $str); */
  /* $str = preg_replace ('#&[^;]+;#', '', $str); */

  exiting_from_function ($here . " ($str)");
  
  return $str;
};

function string_name_of_surname_capitalize ($str, $encoding='utf-8') {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($str)");
  
  $str = word_name_capitalized_of_string_surname ($str, $encoding='utf-8');
  $str = ucfirst ($str);
  
  exiting_from_function ($here . " ($str)");
  
  return $str;
};

function string_name_of_surname_lowercase ($str, $encoding='utf-8') {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($str)");

  $str = word_name_capitalized_of_string_surname ($str, $encoding='utf-8');
  $str = strtolower ($str);

  exiting_from_function ($here . " ($str)");
  
  return $str;
}

function string_is_item_name_of_string ($nam_ite){
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ite)");

  $result = preg_match ('/^[A-Z][A-Za-z_]*$/', $nam_ite);
  
  exiting_from_function ($here . " ($nam_ite)");
  return $result;
}

function check_item_name ($nam_ite){
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ite)");
  /* debug_n_check ($here , "input item name", $nam_ite); */

  if ( ! string_is_item_name_of_string ($nam_ite)) {
    fatal_error ($here, "item name >$nam_ite< is NOT canonical");
  }

  exiting_from_function ($here . " ($nam_ite)");
  return;
}

function string_is_block_current_name_of_string ($nam_blo){
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_blo)");

  $boo = preg_match ('/^[A-Z][A-Za-z_]*$/', $nam_blo);
  
  exiting_from_function ($here . " for block_current_name >$nam_blo< is ". string_of_boolean ($boo));
  return $boo;
}

function string_check_is_block_name_of_string ($nam_blo){
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_blo)");
  /* debug_n_check ($here , "input block name", $nam_blo); */

  if ( ! string_is_block_current_name_of_string ($nam_blo)) {
    print_fatal_error ($here, 
    "block name >$nam_blo< were NOT canonical",
    "it is NOT",
    "Check function <i><b>word_name_capitalized_of_string_surname</b></i>");
  }

  exiting_from_function ($here . " ($nam_blo)");
  return;
}

function item_content_clean ($con_ite) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($con_ite)");
  /* debug_n_check ($here , "input string", $con_ite); */

  $con_ite = string_remove_control_M ($con_ite);
  $con_ite = trim ($con_ite);

  /* debug_n_check ($here , "output item content", $con_ite); */
  exiting_from_function ($here);
  
  return $con_ite;

}

function string_is_entry_name_of_string ($nam_ent){
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent)");

  /* debug_n_check ($here , "input entry_current_name name", $nam_ent); */

  $boo = preg_match ('/^[A-Z][a-z_]*[a-z]$/', $nam_ent);

/* is also directory name */
  /* debug_n_check ($here , "result", $boo); */
  exiting_from_function ($here . " ($nam_ent)");
  return $boo;
}

function string_check_entry_name_of_string ($nam_ent){
    $here = __FUNCTION__;
      entering_in_function ($here . " ($nam_ent)");
    /* debug_n_check ($here , "input entry_current_name name", $nam_ent); */
    
    if ( ! string_is_entry_name_of_string ($nam_ent)) {
        print_fatal_error ($here, 
        "entry_current_name >$nam_ent< were canonical",
        "it is NOT",
        "Check");
    }
    
    exiting_from_function ($here . " ($nam_ent)");
    return;
}

function is_label_name ($nam_lab){
    $here = __FUNCTION__;
      entering_in_function ($here . " ($nam_lab)");
    
    /* debug_n_check ($here , "input label_name name", $nam_lab); */
    
    $boo = preg_match ('/^[a-z][a-z_]*[a-z]$/', $nam_lab);
    
    /* debug_n_check ($here , "result", $boo); */
      exiting_from_function ($here . " ($nam_lab)");
    return $boo;
}

function check_label_name ($nam_lab){
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_lab)");
  /* debug_n_check ($here , "input label_name name", $nam_lab); */

  if ( ! is_label_name ($nam_lab)) {
    print_fatal_error ($here, 
    "label_name >$nam_lab< were canonical",
    "it is NOT",
    "Check");
  }

  exiting_from_function ($here . " ($nam_lab)");
  return;
}

function today () {
  $here = __FUNCTION__;
  /* nothing before date */
  date_default_timezone_set ("Europe/Paris");
  $str = date("j F Y à G\hi:s");  
  return $str;
};

function string_replace_if_exists ($here, $str_fro, $str_to, $str) {
     $here = __FUNCTION__; 
    if (substr_count ($str, $str_fro) != 0) {
        $new_str = str_replace ($str_fro, $str_to, $str);
    }
    else {
        $new_str = $str;
    }  
    
    return $new_str;
    
}

function string_replace ($here, $str_fro, $str_to, $str) {
  $here = __FUNCTION__;
  if (substr_count ($str, $str_fro) != 0) {
    $new_str = str_replace ($str_fro, $str_to, $str);
  }
  else {
      print_fatal_error (
          "in string_replace called by $here",
          "string >$str< did contain string >$str_fro<",
          "it does NOT",
          "Check"
    );
  }
  /* if ( ! strpos ($str, $str_fro)) {  */
  
  return $new_str;

}

function is_substring_of_substring_off_string ($sub_str, $str) { 
  $here = __FUNCTION__;
    if (string_is_empty_of_string ($str) || string_is_empty_of_string ($sub_str) || is_array ($str)) {
        $boo = false;
    }
    else {
        $boo = substr_count ($str, $sub_str) > 0;
    }
    return $boo; 
}

function check_is_substring_of_substring_off_string ($sub_str, $str) { 
  $here = __FUNCTION__;
  if ( ! is_substring_of_substring_off_string ($sub_str, $str)) {
      print_fatal_error ($here,
          "substring >$sub_str< were contained into string >$str<",
          "it is NOT",
          "Check"
      );
  }

  return;
}

function string_last_word_of_string ($str) {
    $here = __FUNCTION__;
    $wor_a = explode (" ", $str);
    $wor = end ($wor_a);
    return $wor;
}

function string_word_of_index_of_string ($idx, $str) {
  $here = __FUNCTION__;
    $wor_a = explode (" ", $str);
    $wor = $wor_a[$idx];
    return $wor;
}

function string_word_of_glue_of_ordinal_of_string ($glue, $ord, $str) {
    $here = __FUNCTION__;
    $wor_a = explode ($glue, $str);
    $cou = count ($wor_a);
    if ($cou < $ord) {
        print_fatal_error ($here,
        "word number $ord were NOT lower than array cardinal",
        'array cardinal is $cou',
        'Check');
    }
    if ($ord < 1) {
        print_fatal_error ($here,
        "word number $ord were NOT lower than 1",
        'it is < 1',
        'Check');
    }

    $wor = $wor_a[$ord-1];

    if ($wor == '') {
        print_fatal_error ($here,
        "word number $ord exists in string $str",
        'it does NOT',
        'Check');
    }
    return $wor;
}

function string_word_of_ordinal_of_string ($ord, $str) {
    $here = __FUNCTION__;
    $wor_a = explode (" ", $str);
    $wor = $wor_a[$ord-1];
    return $wor;
}

function string_first_word_of_string ($str) {
  $here = __FUNCTION__;

  if (string_is_empty_of_string ($str)) {
      print_fatal_error (
          "$here",
          "input string were NOT EMPTY",
          "it is EMPTY",
          "Check");
  }
  else { 
      $wor_a = explode (" ", $str);
      $wor = $wor_a[0];
  } 

  return $wor;
}

function string_of_boolean ($boo) {
    $here = __FUNCTION__;
    
    if ($boo == 1) { $str = 'TRUE';}
    else {$str = 'FALSE';}
    
    return $str;
}

function four_elements_array_of_four_keys_off_string ($key_1, $key_2, $key_3, $key_4, $str) {  
    $here = __FUNCTION__;
    entering_in_function ($here . " ($key_1, $key_2, $key_3, $key_4, $str)");

    check_is_substring_of_substring_off_string ($key_1, $str);
    check_is_substring_of_substring_off_string ($key_2, $str);
    check_is_substring_of_substring_off_string ($key_3, $str);
    check_is_substring_of_substring_off_string ($key_4, $str);
  
    $str_a = explode ("\n", $str);
    debug ($here, '$str_a', $str_a);
    
    $result_a = array ();
    foreach ($str_a as $k => $str) {
        $str_t = trim ($str);
        switch ($str_t) {
        case "$key_1" :
            $key = $str_t;
            $result_a[$key] = '';
            break;
        case "$key_2" :
            $key = $str_t;
            $result_a[$key] = '';
            break;
        case "$key_3" :
            $key = $str_t;
            $result_a[$key] = '';
            break; 
        case "$key_4" :
            $key = $str_t;
            $result_a[$key] = '';
            break; 
        default:
            if ( (isset ($result_a[$key])) && 
            ($result_a[$key] != "") ) {
                $result_a[$key] .= "\n";
                $result_a[$key] .= $str_t;
            }
            else {
                $result_a[$key] = $str_t;
            }
            break;
        }
    }
    
    check_has_no_empty_value_of_any_array ($result_a);

    debug ($here, '$result_a', $result_a);
    exiting_from_function ($here);
    
    return $result_a;
}
function is_filename_extension ($ext) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($ext)");
    
    $ext_blo = $_SESSION['parameters']['extension_block_filename'];
    $ext_cat = $_SESSION['parameters']['extension_block_name_list_order_filename'];
    $ext_com = $_SESSION['parameters']['extension_item_comment_filename'];
    
    $result = ($ext == $ext_blo)
        || ($ext == $ext_cat)
        || ($ext == $ext_com)
        ;
    
    #  debug_n_check ($here , "result ", $result);
    exiting_from_function ($here);
    
    return $result;
};

function string_is_item_comment_filename_extension_of_string ($ext) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($ext)");
    
    $ext_txt = $_SESSION['parameters']['extension_item_comment_filename'];
    
    $boo= ($ext == $ext_txt);
   
    exiting_from_function ($here . " is " . string_of_boolean ($boo));
    
    return $boo;
};

function string_is_block_text_filename_extension_of_string ($ext) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($ext)");

  $ext_txt = $_SESSION['parameters']['extension_block_filename'];

  $boo = ($ext == $ext_txt);

  exiting_from_function ($here . " is " . string_of_boolean ($boo));

  return $boo;

};

function check_block_text_filename_extension ($ext){
  $here = __FUNCTION__;
  entering_in_function ($here . " ($ext)");
  /* debug_n_check ($here , "input block name", $ext); */

  if ( ! string_is_block_text_filename_extension_of_string ($ext)) {
    fatal_error ($here, "block text filename extension >$ext< is NOT canonical");
  }

  exiting_from_function ($here . " ($ext)");

  return;
}

function string_of_separator_of_any_variable ($sep, $var) {
  $here = __FUNCTION__;

  if (is_array ($var)) {
      $str = array_serialize_of_separator_of_array_by_key ($sep, $var);
  }
  else {
      $str = $var;
  }
  
  return $str;
}

function string_capitalize_of_array ($arr_a) {
    $here = __FUNCTION__;
      entering_in_function ($here);
    #  # debug_n_check ($here , "input array", $arr_a); 
    
    foreach ($arr_a as $key => $val) {
        $out_arr[$key] = ucfirst ($val);
    }
    
    #  debug_n_check ($here , "output array", $out_arr); 
      exiting_from_function ($here);
    
    return $out_arr;
};

function string_of_array_of_shift ($var_a, $shi){	
    $here = __FUNCTION__;

    $eol = end_of_line (); 
    
    $str = '';
    if ( (isset ($var_a)) && (is_array ($var_a) ) ) {
        foreach ($var_a as $key => $val) {
            $str .= $shi . " [$key] => ";
            
            if (is_array ($val)) {
                $shi_shi = $shi . "  ";
                $str_val = string_of_array_of_shift ($val, $shi_shi);
                $str .= $eol;
                $str .= $str_val;
            }
            else {
                $str .= $val . $eol;
            }
        }
    }
    
    return $str;
}

function string_of_array ($var_a){	
    $here = __FUNCTION__;

    $str = string_of_array_of_shift ($var_a, '');
    return $str;
}
;;

function string_of_variable ($var){
    $here = __FUNCTION__;
    
    if (is_array ($var)) {
        $str = string_of_array ($var, '');
    }
    else {
        $str = $var;
    }
    
    return $str;
}

function string_html_of_variable ($var){
    $here = __FUNCTION__;
    
    $html_str  = '<pre>' . "\n";
    $html_str .= string_of_variable ($var);
    $html_str .= '</pre>' . "\n";	

    return $html_str;
}

function string_pretty_of_array_of_index_of_eol ($str_a, $ind, $eol) {
    $here = __FUNCTION__;

    $blanks = "               ";
    $out_str = '';
    
    foreach ($str_a as $key => $val) {
        if (is_array($val)) {
            $out_str .= substr ($blanks, 0, $ind) . " array  >$key<$eol";
            $out_str .= string_pretty_of_array_of_index_of_eol ($val, ($ind + 2), $eol);
        }
        else {
            $out_str .= substr ($blanks, 0, $ind) . '  [' . $key . '] = '. $val . $eol;
        }
    }
    return $out_str;
};

function string_pretty_of_array ($str_a) {
    $here = __FUNCTION__;

    $eol = end_of_line ();
    $ind = 3;

    $str = string_pretty_of_array_of_index_of_eol ($val, ($ind + 2), $eol);
    return $str;
};


?>
