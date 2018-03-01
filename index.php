<?php

include "session.php";
require_once "irp_library.php";
require_once "browser_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['Usage'] = "Initialize \$_SESSION. Calls home";

if (file_exists ("install.php")) {
    if ($_GET['Fin'] <> 'ok') {
        require "install.php";
        exit;
    }else {
        shell_exec ('mv install.php install');
    }
}

entering_in_module ($module);

# print "index.php : include session_hash_initialize_hash.php$eol";
include "session_hash_initialize_hash.php";

/* --- Debugging --- */

$nof_deb = "debug_array.txt";
if (file_exists ($nof_deb) ){
     $str = file_get_contents ($nof_deb);
     $deb_a = unserialize ($str);
     $_SESSION['debug'] = $deb_a;
}
else {	
     $_SESSION['debug'] = array ();
     print_warning ($module, 
     "File >$nof_deb< exists",
     "it does NOT",
     "Run perl script"
     );
}

$program_name = $_SESSION['parameters']['program_name'];
$Program_name = ucfirst($program_name);

$browser_name = browser_name_get ();
$Browser_name = ucfirst ($browser_name);
$_SESSION['parameters']['browser_name'] = $browser_name;

$subjet = "Connexion à $program_name par $usr_ip";
$message  = $usr_ip . " vient de se connecter sur $Program_name\r\n";
$message .= "http://fr.geoipview.com/?q=" . $usr_ip;

# stack_function_called_array

array_push ($_SESSION['parameters']['stack_function_called_array'], $module);

mail_send_of_subject_of_message ($subjet, $message);

# phpinfo();

date_default_timezone_set ("Europe/Paris");
$dat_str = date("j F Y à G\hi:s");
$log_str = $dat_str . "\n";

$nof_deb = $_SESSION['debug_nameoffile'];
file_put_contents ($nof_deb, $log_str); 

$nof_log = $_SESSION['log_nameoffile'];
file_put_contents ($nof_log, $log_str);

# starts program 
# Mind url is still index.php
# home_script.php is never called. Need some <a href="home_script.php">
# therefore TOP instead of home in stack

$html_str = irp_provide ('home', $module . '_build');

print $html_str;

exiting_from_module ($module);

?>
 