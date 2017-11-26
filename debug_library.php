<?php
require_once "basics_library.php";
require_once "file_library.php";
require_once "string_library.php";
require_once "debug_html_library.php";
require_once "debug_array_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

function pretty_of_key_of_string ($key, $str) {
    print_d ( "[" . $key . "] = ". $value . "\n");
};

function debug_long ($here, $str) {
    if ( (isset ($_SESSION['is_debug_active']) 
    && $_SESSION['is_debug_active'] > 0)  ) {
        print_d ($here . ' ' . $str . "\n"); 
    }
};

function pretty_of_string_of_key ($str, $key) {
  print_d ( "[" . $key . "] = ". $value . "\n");
};

function print_pretty_string_of_array_of_index ($str_a, $ind) {
    foreach ($str_a as $key => $value) {
        if (is_array($value)) {
            $str = "               ";
            $sub = substr ($str, 0, $ind);
            print_d ($sub . " array  >$key<\n");
            string_pretty_of_array_of_index_of_eol ($value, ($ind + 2), "\n");
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
        $str = string_pretty_of_array_of_index_of_eol ($str_a, 0, "\n");
        print_d ("\n" . $str);
    }
};

function debug_a ($her, $nam, $var_a) {
    print_d  ("\n<DEBUG> in function : $her:\n$nam\n>");
    print_dr ($var_a);
    print_d  ("<\n");
};

function debug_v ($her, $nam, $var) {
    print_d  ("\n<DEBUG> in function : $her: >$nam< ");
    print_d (">$var<");
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

    if ((isset($_SESSION['is_debug_active']) && ($_SESSION['is_debug_active'] < 1))) {
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

    /* if (isset ($_SESSION)) { */
    /*     if (isset ($_SESSION['debug'])) { */
    /*         $debug_array = $_SESSION['debug']; */
            
    /*         if ( (isset ($debug_array[$nam_fun][$nam_var])) || */
    /*         (isset ($debug_array[$nam_fun]['any']))    || */
    /*         (isset ($debug_array['any'][$nam_var]))    || */
    /*         (isset ($debug_array['any']['any'])) ) { */
                
    /*             if (is_array ($var)) { */
    /*                 debug_a ($nam_fun, $nam_var, $var); */
    /*             } */
    /*             else { */
    /*                 debug_v ($nam_fun, $nam_var, $var); */
    /*             } */
    /*         } */
    /*     } */
    /* } */


    if (isset ($_SESSION)) {
        if ( (isset ($_SESSION['is_debug_active']) 
        && $_SESSION['is_debug_active'] > 0)  ) {
            
            if (is_array ($var)) {
                debug_a ($nam_fun, $nam_var, $var);
            }
            else {
                debug_v ($nam_fun, $nam_var, $var);
            }
        }
    }
    return;
};
    
function check ($her, $nam, $var) {
  if (count($var) == 0) {
    print_fatal_error ($her,  
    "variable >$nam< were NOT empty",
    "it is EMPTY",
    "Check");
  }
};

function debug_n_check ($her, $nam, $var) {
    debug ($her, $nam, $var);
    check ($her, $nam, $var);
}

function debug_href_html_make () {
  $here = __FUNCTION__;

  $script_action = script_array_retrieve_module_of_function ($here);
#  debug_n_check ($here , "script_action", $script_action);

  $tit = language_translate_of_en_string ('Debugging');
  
  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<span id="menu-header-links"> ';   

  $html_str .= '<a href="debug_index.php" target="_blank" title="';
  $html_str .= $tit;
  $html_str .= '"> ';
  $html_str .= 'Debug';
  $html_str .= '</a> ';
  $html_str .= "</span>";
  $html_str .= comment_exiting_of_function_name ($here);

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

function trace ($her, $mes) {
    if ( (isset ($_SESSION['is_verbose']) 
              && $_SESSION['is_verbose'] > 0)  ) {
        print_d ("\n<TRACE> in $her : $mes\n");    
    }
};

?>