<?php

$nam_ser = $_SERVER['SERVER_NAME'];

switch ($nam_ser) {
case 'localhost' :
    $roo_doc = '/keep/sources';

    $_SESSION['is_cpu_active'] = FALSE;
    $_SESSION['is_verbose'] = TRUE;
    $_SESSION['is_very_verbose'] = FALSE;
    $_SESSION['is_debug_active'] = TRUE;
    $_SESSION['is_comment_html_active'] = FALSE;
    $_SESSION['is_comment_html_active'] = TRUE;
    
    break;

case 'www.willforge.fr' :
    $roo_doc = $_SERVER['DOCUMENT_ROOT'];

    $_SESSION['is_cpu_active'] = FALSE;
    $_SESSION['is_verbose'] = FALSE;
    $_SESSION['is_very_verbose'] = FALSE;
    $_SESSION['is_debug_active'] = FALSE;
    $_SESSION['is_comment_html_active'] = FALSE;

    break;
    
default:
    die ("Fatal error in site_dependent_data.php SERVER_NAME >$nam_ser< is undefined");
};
 
?> 