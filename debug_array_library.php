<?php

require_once "management_library.php";
require_once "debug_html_library.php";
require_once "file_library.php";

function module_function_variable_line_array_read () {
  $here = __FUNCTION__;
  /* entering_in_function ($here); */

  /* Improve */
  $nof = "debug_mod_fun_var.txt";

  $str = file_content_read_of_fullnameoffile ($nof);
  $lin_a = explode ("\n", $str);
  $lin_a = array_filter ($lin_a);

  /* print_html_array ($here, "<br>lin_a", $lin_a); */
  /* exiting_from_function ($here); */
  return $lin_a;
}

function module_function_variable_hash_make () {
  $here = __FUNCTION__;
  /* entering_in_function ($here); */

  $lin_a = module_function_variable_line_array_read ();

  foreach ($lin_a as $key => $lin) {
    $mfv_a = explode (';', $lin);

    /* print 'entering in function module_function_variable_hash_make<pre> '; */
    /* print_r ($mfv_a); */
    /* print '</pre> '; */

    $mod = $mfv_a [0];
    $fun = $mfv_a [1];
    $var = $mfv_a [2];

    if (!isset ($mod_fun_var_h[$mod][$fun])) {
    /* print '<pre> is not set </pre> '; */
	$mod_fun_var_h[$mod][$fun] = array ();
    }

    $mod_fun_var_h[$mod][$fun][$var] = array ();

    /* print '<pre> '; */
    /* print "\$lin = $lin<br>"; */
    /* print "\$mod = $mod<br>"; */
    /* print "\$fun = $fun<br>"; */
    /* print "\$var = $var<br>"; */

    /* print "\$mod_fun_var_h = <br>"; */
    /* print_r ($mod_fun_var_h); */
    /* print '</pre> '; */

  }

  /* print '<pre>exiting from ' . $here . '<br> '; */
  /* print "\$mod_fun_var_h = <br>"; */
  /* print_r ($mod_fun_var_h); */
  /* print '</pre> '; */

  /* exiting_from_function ($here); */

  return $mod_fun_var_h;
}

function module_array_make () {
  $here = __FUNCTION__;
  /* entering_in_function ($here); */
  /* print 'entering in function ' . $here. '<pre> '; */

  $mod_fun_var_h = module_function_variable_hash_make ();

  $mod_a = array_keys ($mod_fun_var_h);
  array_unshift ($mod_a, 'any');

  /* print '<pre> '; */
  /* print "\$mod_fun_var_h = <br>"; */
  /* print_r ($mod_fun_var_h); */

  /* print "exiting from module_array_make \$mod_a = <br><pre>"; */
  /* print_r ($mod_a); */
  /* print '</pre> '; */

 /* print 'exiting from function ' . $here. '<pre> '; */

  return $mod_a;
}

function modules_names_on_list () {
  $mod_a = module_array_make ();

  $html_str  = '';
  $html_str .= '<form action="" method="get"> ';
  $html_str .= '<select name="selected_module_name"> ';

  if (isset ($_GET['selected_module_name'])) {
    $str = $_GET['selected_module_name'];
  }else{
    $str = 'Choisir un module';
  }
  
  $html_str .= '<option selected> ';
  $html_str .= $str;

  foreach ($mod_a as $key => $val) {
    $html_str .= '<option> ' . $val;
  }

  $html_str .= '</select> ';
  $html_str .= '<input type="submit" value="Valider"> ';
  $html_str .= '</form> ';

  return $html_str;
}

function function_array_make () {
  /* print '<pre>entering in module_array_make</pre> '; */

  $mod_fun_var_h = module_function_variable_hash_make ();
  $nam_mod = $_SESSION['selected_module_name'];

      /* print "<pre>"; */
      /* print "\$mod_fun_var_h = <br>"; */
      /* print_r ($mod_fun_var_h); */
      /* print "</pre>"; */

  $fun_a = array ();
  
  if ($nam_mod == 'any') {
    $mod_a = array_keys ($mod_fun_var_h);
    foreach ($mod_a as $key => $val){

      $fun_cur_a = array_keys ($mod_fun_var_h[$val]);

      /* print "<pre>"; */
      /* print "module = $val <br>"; */

      /* print "\$fun_cur_a = <br><pre>"; */
      
      /* print_r ($fun_cur_a); */
      /* print '</pre> '; */
      
      $res_a = array_merge ($fun_a, $fun_cur_a);
      $fun_a = $res_a;

    }
  }
  else {
    $fun_cur_a = array_keys ($mod_fun_var_h[$nam_mod]);
    $res_a = array_merge ($fun_a, $fun_cur_a);
    $fun_a = $res_a;
  }

  /* print '<pre> '; */
  /* print "\$mod_fun_var_h['$nam_mod'] = <br>"; */
  /* print_r ($mod_fun_var_h[$nam_mod]); */

  /* print "exiting from function_array_make \$fun_a = <br><pre>"; */
  /* print_r ($fun_a); */
  /* print '</pre> '; */

  sort ($fun_a);
  array_unshift ($fun_a, 'any');
  $fun_a = array_unique ($fun_a);
  $fun_a = array_filter ($fun_a);

  return $fun_a;
}

function functions_names_on_list () {

  $html_str  = '';
  $html_str .= '<form action="" method="get"> ';
  $html_str .= '<select name="selected_function_name"> ';
  $html_str .= '<option selected>Choisir une fonction';

  if (isset ($_GET['selected_module_name'])) {
    $nam_mod = $_GET['selected_module_name'];
    $_SESSION['selected_module_name'] = $nam_mod;
    /* print "Selected Module : $nam_mod"; */

    $fun_a = function_array_make ();
    
    foreach ($fun_a as $key => $val) {
      if ($val == 'none') {
	$html_str .= '<option selected> ' . 'none';
	$_SESSION['selected_function_name'] = 'none';
      }else{
	$html_str .= '<option> ' . $val;
      }
    }
    $html_str .= '</select> ';
  }
  
  $html_str .= '<input type="submit" value="Valider"> ';
  $html_str .= '</form> ';
  
  return $html_str;  
}

function variable_array_make () {
  $here = __FUNCTION__;
  print 'entering in function ' . $here. '<pre> '; 

  $mod_fun_var_h = module_function_variable_hash_make ();

      /* print "<pre>"; */
      /* print "\$mod_fun_var_h= <br>"; */
      /* print_r ($mod_fun_var_h); */
      /* print '</pre> '; */

  $nam_mod = $_SESSION['selected_module_name'];
  $nam_fun = $_SESSION['selected_function_name'];

  /* print_html_array ($here, "mod_fun_var_h", $mod_fun_var_h); */
  /* print_html_array ($here, "_SESSION", $_SESSION); */

  /*     print "<pre> xxx in $here :<br>"; */
  /*     print "module = $nam_mod <br>"; */
  /*     print "function = $nam_fun <br>"; */
  /*     print "\$mod_fun_var_h[$nam_mod] = <br><pre>"; */
  /*     print_r ($mod_fun_var_h[$nam_mod]); */
  /*     print '</pre> '; */

  $var_a = array ();
  
  if ($nam_mod == 'any' && $nam_fun = 'any') {
    
    $mod_a = array_keys ($mod_fun_var_h);

    foreach ($mod_a as $key => $nam_mod){

      /* print "<pre> any et any "; */
      /* print "module = $nam_mod <br>"; */
      /* print "\$mod_fun_var_h[$nam_mod] = <br><pre>"; */
      /* print_r ($mod_fun_var_h[$nam_mod]); */
      /* print '</pre> '; */
      
      $fun_a = array_keys ($mod_fun_var_h[$nam_mod]);

      /* print "<pre>"; */
      /* print "module = $nam_mod <br>"; */
      /* print "\$fun_a = <br><pre>"; */
      /* print_r ($fun_a); */
      /* print '</pre> '; */
      
      foreach ($fun_a as $key => $nam_fun){
	
      	$var_cur_a = array_keys ($mod_fun_var_h[$nam_mod][$nam_fun]);
	
      	/* print "<pre>"; */
      	/* print "function = $val <br>"; */
      	/* print "\$var_cur_a = <br><pre>"; */
      	/* print_r ($var_cur_a); */
      	/* print '</pre> '; */
	
	$res_a = array_merge ($var_a, $var_cur_a);
	$var_a = $res_a;
      }
    }
  }
  else if ($nam_mod != 'any' && $nam_fun == 'any') {

      /* print "<pre> pas any et any "; */
      /* print "module = $nam_mod <br>"; */
      /* print "\$mod_fun_var_h[$nam_mod] = <br><pre>"; */
      /* print_r ($mod_fun_var_h[$nam_mod]); */
      /* print '</pre> '; */

    $fun_a = array_keys ($mod_fun_var_h[$nam_mod]);

      /* print "<pre>"; */
      /* print "module = $nam_mod <br>"; */
      /* print "\$fun_a = <br><pre>"; */
      /* print_r ($fun_a); */
      /* print '</pre> '; */

    foreach ($fun_a as $key => $nam_fun){

      $var_cur_a = array_keys ($mod_fun_var_h[$nam_mod][$nam_fun]);

      /* print "<pre>"; */
      /* print "function = $nam_fun <br>"; */
      /* print "\$var_cur_a = <br><pre>"; */
      /* print_r ($var_cur_a); */
      /* print '</pre> '; */
      
      $res_a = array_merge ($var_a, $var_cur_a);
      $var_a = $res_a;
    }
  }
  else {
    /* print "<pre> pas any et pas any "; */
    /* print "module = $nam_mod <br>"; */
    /* print "function = $nam_fun <br>"; */
    /* print "\$mod_fun_var_h[$nam_mod][$nam_fun] = <br><pre>"; */
    /* print_r ($mod_fun_var_h[$nam_mod][$nam_fun]); */
    /* print '</pre> '; */
    
    $var_a = array_keys ($mod_fun_var_h[$nam_mod][$nam_fun]);

      /* print "<pre>"; */
      /* print "\$var_a = <br><pre>"; */
      /* print_r ($var_a); */
      /* print '</pre> '; */
  }

  sort ($var_a);
  array_unshift ($var_a, 'any');
  $var_a = array_unique ($var_a);
  $var_a = array_filter ($var_a);

  print 'exiting from function ' . $here. '<pre> ';

  return $var_a;
}

function variables_names_on_list () {

  $html_str  = '';
  $html_str .= '<form action="" method="get"> ';
  $html_str .= '<select name="selected_variable_name"> ';
  $html_str .= '<option selected>Choisir une variable';

  if (isset ($_GET['selected_function_name'])) {
    $selected_function_name = $_GET['selected_function_name'];
    $_SESSION['selected_function_name'] = $selected_function_name;
    $selected_module_name = $_SESSION['selected_module_name'];
    
    $var_a = variable_array_make ();
    foreach ($var_a as $key => $val) {
      $html_str .= '<option> ' . $val;
    }
     $html_str .= '</select> ';
  }
  /*  elseif ( $_SESSION['selected_function_name'] = 'none') { */
  /*   $selected_function_name = $_SESSION['selected_function_name']; */
  /*   $selected_module_name = $_SESSION['selected_module_name']; */
    
  /*   foreach ($arr_mod[$selected_module_name][$selected_function_name] as $key => $val) { */
  /*     $html_str .= '<option> ' . $val; */
  /*   } */
    
  /*   $html_str .= '</select> '; */
  /* } */
  
  $html_str .= '<input type="submit" value="Valider"> ';
  $html_str .= '</form> ';
  
  return $html_str;

}

function session_debug_array_read () {
  $here = __FUNCTION__;
  /* entering_in_function ($here); */

  /* Improve */
  $nof_deb = "debug_array.txt";

  $str = file_content_read_of_fullnameoffile ($nof_deb);
  $lin_a = unserialize ($str);

  /* print_html_array ($here, "<br>unserialize array", $lin_a); */ 
  /* exiting_from_function ($here); */
  return $lin_a;
}

function session_debug_array_make () {
  $here = __FUNCTION__;

  print 'entering in function ' . $here. '<pre> '; 

  if (isset($_GET['selected_variable_name'])) {

      $_SESSION['selected_variable_name'] = $_GET['selected_variable_name'];
      
      $selected_module_name = $_SESSION['selected_module_name'];
      $selected_function_name = $_SESSION['selected_function_name'];
      $selected_variable_name = $_SESSION['selected_variable_name'];

      $deb_pre_a = $_SESSION['debug'];

      $deb_cur_a[$selected_function_name][$selected_variable_name] = 'ok';

      print_html_array($here, "<br>deb_pre_a", $deb_pre_a);
      print_html_array($here, "<br>deb_cur_a", $deb_cur_a);


      if (isset ($deb_pre_a)) {

	if ($deb_pre_a[$selected_function_name][$selected_variable_name] == "ok") {
	  $deb_a = $deb_pre_a;
	  print_html_array ($here, "<br>deb_pre_a not empty deb_cur_a", $deb_cur_a);   
	}
	else {
	  $deb_a = array_merge_recursive ($deb_pre_a, $deb_cur_a);
	  print_html_array ($here, "<br>merge deb_a", $deb_a);
	}  
      }
      else {
	$deb_a = $deb_cur_a;
	print_html_array ($here, "<br>deb_pre_a is empty and deb_cur_a", $deb_cur_a);   
	
      }
      
      print_html_array ($here, "<br>deb_a", $deb_a);

      $_SESSION['debug'] = $deb_a;
  }

  print 'exiting from function ' . $here. '<pre> ';

  /* exiting_from_function ($here); */
}

function session_debug_array_write () {
  $here = __FUNCTION__;
  /* print 'entering in function ' . $here. '<pre> '; */ 

  $deb_a = session_debug_array_make ();

  if (array_is_empty_of_array ($deb_a)){
    fatal_error ($here, "array deb_a is empty.<br>go to URL arce/php/debug_index.php");
  }

  /* print_html_array ($here, "<br>deb_a", $deb_a); */

  $str = serialize ($deb_a);
  $nof_deb = "debug_array.txt";
  file_string_write ($nof_deb, $str, $here);

  /* print 'exiting from function ' . $here. '<pre> '; */
}

function session_debug_array_html_make () {

  $selected_module_name = $_SESSION['selected_module_name'];
  $selected_function_name = $_SESSION['selected_function_name'];
  $selected_variable_name = $_SESSION['selected_variable_name'];
  
  $html_str  = "Module : $selected_module_name<br>";
  $html_str .= "Function : $selected_function_name<br>";
  $html_str .= "Variable : $selected_variable_name<br>";
  $html_str .= "<br>";

  return $html_str;
  
}

function button_reset_session_debug () {

  $html_str  = '';
  $html_str .= '<form action="" method="get"> ' . "\n";
  $html_str .= '<input type="submit" name="reset_debug" value="Reset debug session"> ';
  $html_str .= '</form> ' . "\n";

  return $html_str;
}

?>