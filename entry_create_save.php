<?php
include "session.php";

print ("keys \$_SESSION avant<br>");
print_r (array_keys ($_SESSION));
print ("<br>");
print (" fin keys <br>");
print ("<br>");
print ("\$_SESSION['irp_register'] avant<br>");
print_r ($_SESSION['irp_register']);
print ("<br>");
print ("\$_SESSION['irp_stack'] avant irp_functions.php<br>");
print_r ($_SESSION['irp_stack']);
print ("<br>");
print ("\$_SESSION['parameters'] avant irp_functions.php<br>");
print_r ($_SESSION['parameters']);
print ("<br>");
print ("\$_SESSION['get_variable_register'] avant irp_functions.php<br>");
print_r ($_SESSION['get_variable_register']);
print ("<br>");
print ("\$_SESSION['deleted_irp_keys_array'] avant irp_functions.php<br>");
print_r ($_SESSION['deleted_irp_keys_array']);
print ("<br>");

require_once "entry_create_save_functions.php";

print ("<br><br>XXX après<br><br>");
print ("keys \$_SESSION après<br>");
print_r (array_keys ($_SESSION));
print ("<br>");
print ("\$_SESSION['irp_register'] après entry_create_save_functions.php<br>");
print_r ($_SESSION['irp_register']);
print ("<br>");
print ("\$_SESSION['irp_stack'] après entry_create_save_functions.php<br>");
print_r ($_SESSION['irp_stack']);
print ("<br>");
print ("\$_SESSION['parameters'] après entry_create_save_functions.php<br>");
print_r ($_SESSION['parameters']);
print ("<br>");
print ("\$_SESSION['get_variable_register'] après entry_create_save_functions.php<br>");
print_r ($_SESSION['get_variable_register']);
print ("<br>");
print ("\$_SESSION['deleted_irp_keys_array'] après entry_create_save_functions.php<br>");
print_r ($_SESSION['deleted_irp_keys_array']);
print ("<br>");



require_once "father_n_son_stack_module_functions.php";


$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

# father_n_son_stack_entity_push_of_current_entity ($module);
# $html_str = irp_provide ($module, $module . "_build");
$html_str = entry_create_save_build ();

print ("\$_SESSION['irp_register']après<br>");
print_r ($_SESSION['irp_register']);
print ("<br>");

print $html_str;

# irp_path_clean_register_of_top_key_of_bottom_key ($module, 'GET');

exiting_from_module ($module);

?>