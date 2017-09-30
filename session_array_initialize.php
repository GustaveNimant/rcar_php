<?php
/* --- $_SESSION --- */

$points = "....|....|....|....|....|....|....|....|....|....|....|....|....|....|";

$_SESSION['count_entity'] = 1;
$_SESSION['cpu_active'] = 1;
$_SESSION['cpu_n_function'] = array ();
$_SESSION['debug_active'] = 1;
$_SESSION['deleted_irp_keys_array'] = array ();
$_SESSION['father_n_son_stack_entity'] = array ();
$_SESSION['father_n_son_stack_module'] = array ();
$_SESSION['get_variable_register'] = array ();

$_SESSION['irp_register_bis'] = array ();
$_SESSION['irp_register'] = array ();
$_SESSION['irp_stack'] = array ();

$_SESSION['item_information_metadata_en_by_item_name_array'] = array ();
include "language_translate_register.php";
$_SESSION['language_translate_register'] = $language_translate_register;
$_SESSION['last_dollar_get_register'] = array ();

$_SESSION['parameters']['absolute_path_arce'] = '/keep/sources/rcar';
$_SESSION['parameters']['absolute_path_server'] = '/keep/sources/rcar/server';
$_SESSION['parameters']['absolute_path_server_surname'] = '/keep/sources/rcar/server/SURNAMES';
$_SESSION['parameters']['absolute_path_source'] = '/keep/sources/rcar/php';

$_SESSION['parameters']['extension_action_log_filename'] = 'log';
$_SESSION['parameters']['extension_block_filename'] = 'blo';
$_SESSION['parameters']['extension_block_name_catalog_filename'] = 'cat';
$_SESSION['parameters']['extension_item_comment_filename'] = 'com';
$_SESSION['parameters']['extension_surname_nameoffile'] = 'sur';

$_SESSION['parameters']['glue'] = ' '; /* explode implode */
$_SESSION['parameters']['html_text_zone_size'] = 40;
$_SESSION['parameters']['language'] = 'fr';
$_SESSION['parameters']['printed_html_string_max_size'] = 200;
$_SESSION['parameters']['program_name'] = 'rcar';

$_SESSION['parameters']['relative_path_server'] = '/rcar/server';
$_SESSION['parameters']['relative_path_server_surname'] = '/rcar/server/SURNAMES';
$_SESSION['parameters']['relative_path_source'] = '/rcar/php';
$_SESSION['parameters']['relative_path_source_images'] = '/rcar/php/images';

$_SESSION['parameters']['select_size'] = 6;

$_SESSION['parameters']['stack_function_level_array'] = array ();
$_SESSION['parameters']['stack_function_level_maximum'] = 200;
$_SESSION['parameters']['stack_function_level_points'] = $points;

$_SESSION['parameters']['version'] = 0.01;
$_SESSION['parameters']['www_filename_css'] = 'css/style.css';

$_SESSION['time_start'] = microtime (true);
$_SESSION['is_verbose'] = 1;

?>