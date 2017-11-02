<?php

function is_on_web () {
  $here = __FUNCTION__;
    $boo = isset ($_SERVER['REMOTE_ADDR']);
    return $boo;
}

function user_ip () {
  $here = __FUNCTION__;
    if (is_on_web ()) {
        $usr_ip = $_SERVER['REMOTE_ADDR'];
    }
    else {
        $usr_ip = "None";
    }
    return $usr_ip;
}

function end_of_line () {
  $here = __FUNCTION__;
    if (is_on_web ()) {
        $eol = '<br>';
    }
    else {
        $eol = "\n";
    }
    return $eol;
}

function print_get_hash_of_where ($where) {
  $here = __FUNCTION__;
    $eol = end_of_line ();
    print "in $where \$_GET is:" . $eol;
    foreach ($_GET as $key => $val) {
        print '$_GET["' . $key . '"] = ' . $val . $eol;
    }
return;
}

function first_word_of_string ($str) {
  $here = __FUNCTION__;

  if ($str == '') {die ("$here: string is EMPTY");}

  $wor_a = explode (" ", $str);
  $wor = $wor_a[0];
  
  return $wor;
}

function mail_send_of_subject_of_message ($sub, $mes) {
  $here = __FUNCTION__;
    $to = "arce@willforge.fr";
    mail ($to, $sub, $mes);
    return;
}

function print_d ($str) {
  $here = __FUNCTION__;
    $nof_deb = $_SESSION['debug_nameoffile'];
    file_put_contents ($nof_deb, $str, FILE_APPEND); 
    return;
};

function now () {
  $here = __FUNCTION__;
  $tim_now = date ("H:i:s", time ());
  return $tim_now;
}

function previous_function_in_stack () {
    $here = __FUNCTION__;

    if (isset($_SESSION['parameters']['stack_function_called_array'])) {
        $sta_fun_a = ($_SESSION['parameters']['stack_function_called_array']);
        $cur = array_pop ($sta_fun_a);
        $prev = array_pop ($sta_fun_a);
    }
    else {
        $prev = "not yet set";
    }
    return $prev;
}

function ante_previous_function_in_stack () {
    $here = __FUNCTION__;

    if (isset($_SESSION['parameters']['stack_function_called_array'])) {
        $sta_fun_a = ($_SESSION['parameters']['stack_function_called_array']);
        $cur = array_pop ($sta_fun_a);
        $prev = array_pop ($sta_fun_a);
        $ante_prev = array_pop ($sta_fun_a);
    }
    else {
        $ante_prev = "not yet set";
    }
    return $ante_prev;
}

function basics_file_log_write ($where, $log_str) {
  $here = __FUNCTION__;

  if (isset ($_SESSION['parameters'])){
      $nof_log = $_SESSION['log_nameoffile'];
      
      $now = now();
      
      $head = "\n$now" . ': ' . $where . ' : ';
      $htm_tri = trim ($log_str, " \t\n\r\0\x0B"); 
      $str = preg_replace ('/\n/', $head, $htm_tri); /* to have "here : " on every line */ 
      
      $txt_log = $now . ': ' . $where . ' : ' . $str;
      
      file_put_contents ($nof_log, $txt_log . "\n", FILE_APPEND); 
  }

  return;
};

?>