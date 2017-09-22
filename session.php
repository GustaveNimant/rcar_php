<?php
/*  session_name() retourne le nom de la session courante. Si le paramètre name est fourni, session_name() modifiera le nom de la session et retournera l'ancien nom de la session. */

/* Le nom de la session est réinitialisé à la valeur par défaut, stockée dans session.name lors du démarrage. Ainsi, vous devez appeler session_name() pour chaque demande (et avant que les fonctions session_start() ou session_register() ne soient appelées).  */

if (isset ($_SERVER['REMOTE_ADDR'])) {
    $usr_ip = $_SERVER['REMOTE_ADDR'];
    $eol = '<br>';
}
else {
    $usr_ip = "None";
    $eol = "\n";
}

if (!isset($_SESSION)) { 
    $usr_ip_m = str_replace ('.', '-', $usr_ip);
    $usr_ip_m = str_replace (':', '-', $usr_ip_m);
    
    ini_set ('session.force_path', 0);
    ini_set ('session.save_path', '../server/SESSION');
    
    $ses_nam = session_name ('SESSION_ARCE');
    $str = session_id ($usr_ip_m);

    session_start(); 
}

if (empty($_SESSION['count'])) {
   $_SESSION['count'] = 1;
} else {
   $_SESSION['count']++;
}

# print 'session id >' . session_id () . '<' . $eol;
print "session count >" . $_SESSION['count'] . "<" . $eol;

?>