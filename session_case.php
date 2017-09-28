<?php
require_once "debug_functions.php";

print "serveur >$nam_ser<<br>";
switch ($nam_ser) {
case 'localhost' :
    $ses_pat = '/home/colonna/sources/arce/server/SESSION/';
case 'www.willforge.fr' :
    $ses_pat = '/homez.792/willforg/SESSION';
default:
    print_fatal_error ($here, 
    'Server Name were one of "localhost" | "www.willforge.fr"',
    $nam_ser,
    "Please add it"
    );
};

print "Session Path set to $ses_pat for serveur $nam_ser<br>";
$ses_pat = session_save_path ($ses_pat);
$ses_nam = session_name ('SESSION_ARCE');
$str = session_id ('arce');
session_start ();


/* $ses_nam = session_name ('SESSION_ARCE'); */
/* echo " ses_nam >$ses_nam< <br>"; */
/* session_start (); */
/* $usr_ip = $_SERVER['REMOTE_ADDR']; */
/* echo " usr_ip >$usr_ip<<br>"; */
/* $_SESSION['ip'] = $usr_ip; */
/* $str = session_id ($usr_ip); */
/* echo " str >$str<<br>"; */

/* echo "_SESSION:<br>"; */
/* print_r ($_SESSION); */
/* echo "<br>"; */
?>