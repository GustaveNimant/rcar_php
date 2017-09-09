<?php
include "session.php";
require_once "father_n_son_stack_module_functions.php";
require_once "arce_functions.php";

/* require_once "debug_html_functions.php"; */
/* require_once "parsing_modifys_items_functions.php"; */

$module = "arce";
father_n_son_stack_entity_push_of_current_entity ($module);

/* /\* save language *\/ */
/* $lan = $_SESSION['irp_register']['language']; */

/* /\* set debug *\/ */
/* $deb = $_SESSION['debug']; */

/* /\* clean irp_register *\/ */
/* $_SESSION['irp_register'] = array (); */

/* /\* reset entry_name *\/ */
/* if (isset ($nam_ent)){ */
/*     $_SESSION['irp_register']['entry_name'] = $nam_ent; */
/* } */

/* /\* reset language *\/ */
/* $_SESSION['irp_register']['language'] = $lan; */

/* /\* set debug ??? Improve*\/ */
/* $_SESSION['debug'] = $deb; */

$module = "arce";
entering_in_module ($module);

/* debug_n_check ($module , "GLOBALS", $GLOBALS); */
/* debug ($module , '$_GET', $_GET); */

/* if (isset ($_GET['language'])) { */
/*   $lan = $_GET['language']; */

/*   switch ($lan) { */
/*   case 'en' : */
/*     irp_store_force ('language', $lan); */
/*     break; */
/*   case 'fr' : */
/*     irp_store_force ('language', $lan); */
/*     break; */
/*   default : */
/*     print "Language $lan is not yet implemented<br>"; */
/*     print "The only Implemented language is fr (french)<br>"; */
/*     print "Partially Implemented language is en (english)<br>"; */
/*     print "French is set as the current language<br>"; */
/*     irp_store_force ('language', 'fr'); */
/*   } */
/* } */

irp_path_clean_register_of_top_key_of_bottom_key ($module, 'entry_name_array');

$html_str = irp_provide ($module, $module . "_build");

debug_n_check ($module , '$html_str', $html_str);

print $html_str;

$_SESSION['irp_register'] = $irp_register;

debug ($module, 'SESSION irp_register', $_SESSION['irp_register']);

exiting_from_module ($module);



?>
