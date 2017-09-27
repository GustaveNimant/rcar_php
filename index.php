<?php
include "session.php";
require_once "home_functions.php";
require_once "father_n_son_stack_module_functions.php";
require_once "mail.php";
require_once "debug_functions.php";

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
}

$program_name = $_SESSION['parameters']['program_name'];
$Program_name = ucfirst($program_name);

$subjet = "Connexion à $program_name par $usr_ip";
$message  = $usr_ip . " vient de se connecter sur $Program_name\r\n";
$message .= "http://fr.geoipview.com/?q=" . $usr_ip;

mail_send_of_subject_of_message ($subjet, $message);

# phpinfo();

$program_name = $_SESSION['parameters']['program_name'];
$Program_name = ucfirst ($program_name);

/* print "<pre>"; */
/* print ("\$Program_name $Program_name<br>"); */
/* print "</pre>"; */

date_default_timezone_set ("Europe/Paris");
$str_log = date("j F Y à G\hi:s");  
file_put_contents ("debug", $str_log . "\n");
file_put_contents ("$Program_name.log", $str_log . "\n");

array_push ($_SESSION['parameters']['stack_function_level_array'], $module);

# starts program 

/* print "<pre>"; */
/* print "module index.php calling home "; */
/* print "</pre>"; */

$html_str = irp_provide ('home', $module . '_build');

print $html_str;

?>
 