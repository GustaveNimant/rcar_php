<?php

require_once "string_library.php";
require_once "array_library.php";
require_once "error_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is a set of functions";
$Documentation[$module]['what for'] = "to manage the hash \$_GET";

entering_in_module ($module);

function get_hash_store_of_get_key_of_get_value_of_where ($get_key, $get_val, $where) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($get_key, $get_val, $where)");

  if ($get_val == '') {
      print_fatal_error ($where,
      "second argument \$get_val were NOT EMPTY<br>",
      "\$get_val is EMPTY",
      "Check");
  }

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<input type="hidden" ';
  $html_str .= 'name="'  . $get_key . '" ';
  $html_str .= 'value="' . $get_val . '" /> ';
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;

}

function get_hash_retrieve_value_of_get_key_of_where ($get_key, $where) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($get_key, $where)");

  if ( (array_is_empty_of_array ($_GET))
     || array_is_empty_of_array ($_GET[$get_key])) {
      $nam_fun = $get_key . '_build';
      
      $mes  = 'Check that :<br>';
      $mes .= '1 function >' . $nam_fun . '< is implemented and accessible' . '<br>';
      $mes .= '2 line <br><i>  require_once "' . $get_key . '_functions.php";</i><br>  is present in build_requirements.php';

      print_fatal_error ($where , 
      '$_GET["' . $get_key . '"] were NOT EMPTY',
      'it is EMPTY',
      $mes);
  }

# ??  array_check_is_empty_of_what_of_array_of_where ("\$_GET", $_GET, $where);
  
  $get_val = $_GET[$get_key];
  $get_val = string_remove_control_M ($get_val);
  $get_val = trim ($get_val);

  if ($get_val == '') {
      print_html_array ($here,'<br>$_GET array is :' , $_GET);

      if (is_substring_of_substring_off_string ('_surname', $get_key)) {
          $fno_sur = surname_catalog_fullnameoffile_build ();
          $mes = "Check Surname catalog file >$fno_sur<";
      }
      else {
          $nam_fun = $get_key . '_build';

          $mes  = 'Check that :<br>';
          $mes .= '1 function >' . $nam_fun . '< is implemented and accessible' . '<br>';
          $mes .= '2 line <br><i>  require_once "' . $get_key . '_functions.php";</i><br>  is present in build_requirements.php';
      }
      
      print_fatal_error ($where, 
      '$_GET["' . $get_key . '"] were NOT empty',
      'it is EMPTY',
      $mes);
  
  } else {
      
      check_is_key_unique_in_array ($get_key, $_GET);

      $_SESSION['get_value_by_get_key_hash'][$get_key] = $get_val;

      $_SESSION['data_creation_function'][$get_key] = $where;
      $_SESSION['creation_step_count'] = $_SESSION['creation_step_count'] + 1;
      $cre_ste = $_SESSION['creation_step_count'];
      
      $_SESSION['creation_step'][$get_key] = $cre_ste;

      father_n_son_stack_entity_push_of_father_of_son ($get_key, "GET_$get_key");
 
      $log_str = "DATA >$get_key< built with value >$get_val< in $where at creation step # $cre_ste";
      file_log_write ($here, $log_str);
  }
  
  exiting_from_function ($here . " DATA >$get_key< created with value >$get_val< at step # $cre_ste");
  
  return $get_val;
}

exiting_from_module ($module);

?>