<?php
include "session.php";
require_once "irp_functions.php";
require_once "mail.php";

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

include "session_array_initialize.php";

/* --- Debugging --- */

$nof_deb = "debug_array.txt";
if (file_exists ($nof_deb) ){
     $str = file_get_contents ($nof_deb);
     $deb_a = unserialize ($str);
     $_SESSION['debug'] = $deb_a;
}
else {	
     $_SESSION['debug'] = array ();
     warning ($here, "File >$nof_deb< is missing");
}

$program_name = $_SESSION['parameters']['program_name'];
$Program_name = ucfirst($program_name);

$subjet = "Connexion à $program_name par $usr_ip";
$message  = $usr_ip . " vient de se connecter sur $Program_name\r\n";
$message .= "http://fr.geoipview.com/?q=" . $usr_ip;

# stack_function_level_array

array_push ($_SESSION['parameters']['stack_function_level_array'], "UP");
array_push ($_SESSION['parameters']['stack_function_level_array'], "TOP");
array_push ($_SESSION['parameters']['stack_function_level_array'], $module);

mail_send_of_subject_of_message ($subjet, $message);

# phpinfo();

$program_name = $_SESSION['parameters']['program_name'];
$Program_name = ucfirst ($program_name);

date_default_timezone_set ("Europe/Paris");
$dat_str = date("j F Y à G\hi:s");
$log_str = $dat_str . "\n";
file_put_contents ("debug", $log_str); 
$nof_log = "$Program_name.log";
file_put_contents ('nof_log', $log_str);

# starts program 
entering_in_module ($module);

$html_str = irp_provide ('home', $module . '_build');

print $html_str;

exiting_from_module ($module);

?>
 