<?php

require_once "string_functions.php";
require_once "array_functions.php";
require_once "error_functions.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is a set of functions";
$Documentation[$module]['what for'] = "to manage the hash \$_GET";

entering_in_module ($module);

function get_hash_store_form_of_key_of_value_of_where ($key, $val, $where) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($key, $val, $where)");

  if ($val == '') {
      print_fatal_error ($where,
      "second argument \$val were NOT EMPTY<br>",
      "\$val is EMPTY",
      "Check");
  }

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<input type="hidden" ';
  $html_str .= 'name="'  . $key . '" ';
  $html_str .= 'value="' . $val . '" /> ';
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;

}

function get_hash_retrieve_value_of_key_of_where ($key, $where) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($key, $where)");

  array_check_is_empty_of_what_of_array_of_where ("\$_GET", $_GET, $where);
  
  if (array_is_empty_of_array ($_GET[$key])){
      $nam_fun = $key . '_build';
      
      $mes  = 'Check that :<br>';
      $mes .= '1 function >' . $nam_fun . '< is implemented and accessible' . '<br>';
      $mes .= '2 line <br><i>  require_once "' . $key . '_functions.php";</i><br>  is present in build_functions.php';

      print_fatal_error ($where , 
      '$_GET["' . $key . '"] were NOT empty',
      'it is EMPTY',
      $mes);
  }

  $val = $_GET[$key];
  $val = string_remove_control_M ($val);
  $val = trim ($val);

  if ($val == '') {
      print_html_array ($here,'<br>$_GET array is :' , $_GET);

      if (is_substring_of_substring_off_string ('_surname', $key)) {
          $fno_sur = surname_catalog_fullnameoffile_make ();
          $mes = "Check Surname catalog file >$fno_sur<";
      }
      else {
          $nam_fun = $key . '_build';
          
          $mes  = 'Check that :<br>';
          $mes .= '1 function >' . $nam_fun . '< is implemented and accessible' . '<br>';
          $mes .= '2 line <br><i>  require_once "' . $key . '_functions.php";</i><br>  is present in build_functions.php';
      }
      
      print_fatal_error ($where, 
      '$_GET["' . $key . '"] were NOT empty',
      'it is EMPTY',
      $mes);
  
  } else {
      
      check_is_key_unique_in_array ($key, $_GET);

      $_SESSION['top_key_in_get_hash_register'][$key] = $val;
      $_SESSION['get_variable_register'][$key] = $val;

      father_n_son_stack_entity_push_of_father_of_son ($key, 'GET');
 
     $log_str = "\$_GET[$key] = $val";
      file_log_write ($here, $log_str);
  }
  
  debug_n_check ($here , '$val', $val);
  exiting_from_function ($here);
  
  return $val;
}

exiting_from_module ($module);

?>