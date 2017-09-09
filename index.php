<?php
include "session.php";
require_once "home_functions.php";
require_once "father_n_son_stack_module_functions.php";
require_once "mail.php";
require_once "debug_functions.php";

$module = "index";

$subjet = "Connexion à $progam_name par $usr_ip";
$message  = $usr_ip . " vient de se connecter sur $Progam_name\r\n";
$message .= "http://fr.geoipview.com/?q=" . $usr_ip;

mail_send_of_subject_of_message ($subjet, $message);

$Documentation[$module]['Usage'] = "Initialize $_SESSION. Calls home";

if (file_exists ("install.php")) {
    if ($_GET['Fin'] <> 'ok') {
        require "install.php";
        exit;
    }else {
        shell_exec ('mv install.php install');
    }
}

$_SESSION['irp_register'] = array ();
$_SESSION['irp_stack'] = array ();

$_SESSION['item_information_metadata_en_by_item_name_array'] = array ();
$_SESSION['father_n_son_stack_module'] = array ();
$_SESSION['father_n_son_stack_entity'] = array ();
$_SESSION['deleted_irp_keys_array'] = array ();
$_SESSION['last_dollar_get_register'] = array ();
$_SESSION['get_variable_register'] = array ();
$_SESSION['cpu_n_function'] = array ();

//$nam_ser = $_SERVER['SERVER_NAME'];
//locally: localhost
//on  ovh: www.willforge.fr

//$roo_doc = $_SERVER['DOCUMENT_ROOT'];
//locally: /var/www
//on  ovh: ~/www

/* $_SESSION['parameters']['absolute_path_arce'] = getenv ('ARCE_LOCALPATH'); */
/* $_SESSION['parameters']['absolute_path_server'] = getenv ('ARCE_LOCALPATH_SERVER'); */
/* $_SESSION['parameters']['absolute_path_source'] = getenv ('ARCE_LOCALPATH_SOURCE'); */
/* $_SESSION['parameters']['program_name'] = getenv ('ARCE_LOCALNAME'); */
/* $_SESSION['parameters']['relative_path_server'] = getenv ('ARCE_LOCALNAME') . '/server'; */
/* $_SESSION['parameters']['relative_path_source'] = getenv ('ARCE_LOCALNAME') . '/php'; */

$_SESSION['parameters']['absolute_path_arce'] = '/keep/sources/rcar';
$_SESSION['parameters']['absolute_path_server'] = '/keep/sources/rcar/server';
$_SESSION['parameters']['absolute_path_source'] = '/keep/sources/rcar/php';
$_SESSION['parameters']['absolute_path_server_surname'] = '/keep/sources/rcar/server/SURNAMES';
$_SESSION['parameters']['program_name'] = 'rcar';
$_SESSION['parameters']['relative_path_server'] = '/rcar/server';
$_SESSION['parameters']['relative_path_server_surname'] = '/rcar/server/SURNAMES';
$_SESSION['parameters']['relative_path_source'] = '/rcar/php';
$_SESSION['parameters']['relative_path_source_images'] = '/rcar/php/images';

$_SESSION['parameters']['action_log_filename_extension'] = 'log';
$_SESSION['parameters']['glue'] = ' '; /* explode implode */
$_SESSION['parameters']['item_comment_filename_extension'] = 'com';
$_SESSION['parameters']['block_name_catalog_filename_extension'] = 'cat';
$_SESSION['parameters']['block_text_filename_extension'] = 'blo';
$_SESSION['parameters']['language'] = 'fr';
$_SESSION['parameters']['printed_html_string_max_size'] = 200;
$_SESSION['parameters']['surname_nameoffile_extension'] = 'sur';
$_SESSION['parameters']['www_filename_css'] = 'css/style.css';

$_SESSION['parameters']['stack_function_level_array'] = array ();
$points = "....|....|....|....|....|....|....|....|....|....|....|....|....|....|";
$_SESSION['parameters']['stack_function_level_points'] = $points;
$_SESSION['parameters']['stack_function_level_maximum'] = 200;

$_SESSION['parameters']['select_size'] = 5;
$_SESSION['parameters']['version'] = 0.01;

$_SESSION['count_entity'] = 1;
$_SESSION['cpu_active'] = 1;
$_SESSION['debug_active'] = 1;
$_SESSION['trace_active'] = 1;

$_SESSION['time_start'] = microtime (true);

$nof_deb = "debug_array.txt";
if (file_exists ($nof_deb) ){
     $str = file_get_contents ($nof_deb);
     $deb_a = unserialize ($str);
     $_SESSION['debug'] = $deb_a;
}
else {	
     $_SESSION['debug'] = array ();
}

# phpinfo();

/* print "<pre>"; */
/* print_r ($_SESSION['parameters']); */
/* print "</pre>"; */
               
$program_name = $_SESSION['parameters']['program_name'];
$Program_name = ucfirst ($program_name);

/* print "<pre>"; */
/* print ("\$program_name $program_name<br>"); */
/* print ("\$Program_name $Program_name<br>"); */
/* print "</pre>"; */

date_default_timezone_set ("Europe/Paris");
$str = date("j F Y à G\hi:s");  
file_put_contents ("debug", $str . "\n");
file_put_contents ("$Program_name.log", $str . "\n");

array_push ($_SESSION['parameters']['stack_function_level_array'], $module);

$html_str = irp_provide ('home', $module . '_build');

print $html_str;
?>
 