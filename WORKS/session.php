<?php

if(isset ($_SERVER['REMOTE_ADDR'])){
    $usr_ip = $_SERVER['REMOTE_ADDR'];
    $eol = '<br>';
}
else {
    $usr_ip = "None";
    $eol = "\n";
}

$usr_ip_m = str_replace ('.', '-', $usr_ip);
$usr_ip_m = str_replace (':', '-', $usr_ip_m);

ini_set ('session.force_path', 0);
ini_set ('session.save_path', '/keep/sources/rcar/server/SESSION');

$ses_nam = session_name ('SESSION_ARCE');
$ses_id = session_id ($usr_ip_m);

if (!isset($_SESSION)) { 
    session_start(); 
}

if (empty($_SESSION['count'])) {
    $_SESSION['count'] = 1;
} else {
    $_SESSION['count']++;
}

# print "session id >$ses_id<" . $eol;
# print "session.php : session count >" . $_SESSION['count'] . "<" . $eol;

?>