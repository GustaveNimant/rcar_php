<?php
require_once "basics.php";

/*  session_name() retourne le nom de la session courante. Si le paramètre name est fourni, session_name() modifiera le nom de la session et retournera l'ancien nom de la session. */

/* Le nom de la session est réinitialisé à la valeur par défaut, stockée dans session.name lors du démarrage. Ainsi, vous devez appeler session_name() pour chaque demande (et avant que les fonctions session_start() ou session_register() ne soient appelées).  */

$usr_ip = user_ip ();
$usr_ip_m = str_replace ('.', '-', $usr_ip);
$usr_ip_m = str_replace (':', '-', $usr_ip_m);

ini_set ('session.force_path', 0);
ini_set ('session.save_path', '/keep/sources/rcar/server/SESSION');

$ses_nam = session_name ('SESSION_ARCE');
$ses_id = session_id ($usr_ip_m);

if (!isset($_SESSION)) { session_start(); }

if (empty($_SESSION['count'])) {
   $_SESSION['count'] = 1;
} else {
   $_SESSION['count']++;
}

$eol = end_of_line ();

#print "session id >$ses_id<" . $eol;
print "session count >" . $_SESSION['count'] . "<" . $eol;

?>