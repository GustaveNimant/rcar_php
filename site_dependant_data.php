<?php

$nam_ser = $_SERVER['SERVER_NAME'];

switch ($nam_ser) {
case 'localhost' :
    $roo_doc = '/keep/sources/';
    break;

case 'www.willforge.fr' :
    $roo_doc = $_SERVER['DOCUMENT_ROOT'];
    break;
    
default:
    die ("Fatal error in site_dependant_data.php SERVER_NAME >$nam_ser< is undefined");
};
 
?> 