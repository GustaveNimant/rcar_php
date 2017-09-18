<?php

require_once "string_functions.php";
require_once "debug_html_functions.php";
require_once "debug_array_functions.php";

$module = module_name (__FILE__);

function print_d ($str) {
  file_put_contents ("debug", $str, FILE_APPEND); 
};

function pretty_of_key_of_string ($key, $str) {
    print_d ( "[" . $key . "] = ". $value . "\n");
};

function print_long ($here, $str) {
    if ($_SESSION['debug_active']) {
        print_d ($here . ' ' . $str . "\n"); 
    }
};

function pretty_of_string_of_key ($str, $key) {
  print_d ( "[" . $key . "] = ". $value . "\n");
};

function print_pretty_string_of_array ($str_a, $ind) {
    foreach ($str_a as $key => $value) {
        if (is_array($value)) {
            $str = "               ";
            $sub = substr ($str, 0, $ind);
            print_d ($sub . " array  >$key<\n");
            pretty_string_of_array ($value, ($ind + 2));
        }
        else {
            $str = "               ";
            $sub = substr ($str, 0, $ind);
            print_d ($sub . "  [" . $key . "] = ". $value . "\n");
        }
    }
};

function print_dr ($str_a) {
    if (count ($str_a) > 0 ){
        $str = pretty_string_of_array ($str_a, 0);
        print_d ($str);
    }
};

function debug_a ($her, $nam, $var_a) {
    print_d  ("\n<DEBUG> in function : $her:\n$nam\n>");
    print_dr ($var_a);
    print_d  ("<\n");
};

function debug_v ($her, $nam, $var) {
    print_d  ("\n<DEBUG> in function : $her: >$nam< ");
    print_d ($var);
    print_d  ("\n");
};

function debug_array ($her, $str, $var_a) {
    print_d  ("\n<DEBUG> in function : $her:\n$str:\n");
    print_dr ($var_a);
    print_d  ("\n");
};

function debug_string ($her, $str) {
    print_d  ("\n<DEBUG> in function : $her: $str\n");
};

function debug ($nam_fun, $nam_var, $var) {

    if ( ! $_SESSION['debug_active']) {
        return;
    }

  /* if (! isset ($_SESSION['debug'])) { */

  /*   $mes  = "fatal error when entering in debug<br>"; */
  /*   $mes .= "\$_SESSION['debug'] is not set<br>"; */
  /*   $mes .= "with nam_fun = >$nam_fun< nam_var = >$nam_var<<br>"; */
  /*   $mes .= " \$_SESSION content:<br>"; */

  /*   print_html_array ("debug", $mes, $_SESSION); */
  /*   /\* fatal_error ($nam_fun, "in function debug"); *\/ */
  /*   exit; */
  /* } else { */
  /*   /\* print "<pre> nam_fun = $nam_fun \$_SESSION is set</pre>"; *\/ */
  /* } */

  $debug_array = $_SESSION['debug'];

  /* if (isset ($debug_array)){ */
  /*   print_html_array ("debug", "debug_array", $debug_array); */
  /* } */
  
  if ( (isset ($debug_array[$nam_fun][$nam_var])) ||
  (isset ($debug_array[$nam_fun]['any']))    ||
  (isset ($debug_array['any'][$nam_var]))    ||
  (isset ($debug_array['any']['any'])) ) {
      
      if (is_array ($var)) {
          debug_a ($nam_fun, $nam_var, $var);
      }
      else {
          debug_v ($nam_fun, $nam_var, $var);
      }
  }
  return;
};

function check ($her, $nam, $var) {
  if (count($var) == 0) {
    fatal_error ($her,  "check says : variable >$nam< is empty");
  }
};

function debug_n_check ($her, $nam, $var) {
    debug ($her, $nam, $var);
    check ($her, $nam, $var);
}

function trace ($her, $mes) {
    if ($_SESSION['trace_active']) {
        print_d ("\n<TRACE> in : $her : $mes\n");    
    }
};

function debug_href_html_make () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $script_action = script_array_retrieve_module_of_function ($here);
#  debug_n_check ($here , "script_action", $script_action);

  $tit = language_translate_of_en_string_of_language ('Debugging', $lan);
  
  $html_str  = '';
  $html_str .= '<span id="menu-header-links"> ';   

  $html_str .= '<a href="debug_index.php" target="_blank" title="';
  $html_str .= $tit;
  $html_str .= '"> ';
  $html_str .= 'Debug';
  $html_str .= '</a> ';
  $html_str .= "</span>";

  exiting_from_function ($here);
  
  return $html_str;


}

function debug_register ($her, $irp_key) {

    $fno = 'debug_register.txt';
    $str  = "\nFunction " . $her . "\n";
    $str .= '>' . $irp_key . '<' . "\n";
    $str .= '>>' . $_SESSION['irp_register'][$irp_key] . '<<' . "\n";
    file_put_contents ($fno, $str, FILE_APPEND);
}

function debug_get_defined_variables () {
    $arr = get_defined_vars();
    print_r ($arr);
}

?>