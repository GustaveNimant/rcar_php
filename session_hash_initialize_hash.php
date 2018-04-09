<?php
require_once "site_dependent_data.php";

/* --- $_SESSION --- */

#$points = "....x....x....x....x....x....x....x....x....x....x....x....x....x....x";
#$points = "    x    x    x    x    x    x    x    x    x    x    x    x    x    x";
$points = "....|....|....|....|....|....|....|....|....|....|....|....|....|....|";

$_SESSION['message'] = '';

$_SESSION['count_entity'] = 1;
$_SESSION['cpu_n_function'] = array ();


$_SESSION['is_constant_module_name'] = array (); /* constant html text  */
$_SESSION['is_leaf_entity_name'] = array ();     /* constant ? */
$_SESSION['is_label_entity_name'] = array ();    /* keys are entry_name */
$_SESSION['is_goto_entity_name'] = array ();     /* '<a href="module_name.php" */

$_SESSION['parameters']['array_is_empty'] = 'Array_is_empty';

/* ?name=value => name is a data entity */
/* &name=value => name is a data entity */

$_SESSION['is_calculated_entity_name'] = array (
);

$_SESSION['is_data_entity_name'] = array (
    'block_current_name' => TRUE,
    'block_current_surname' => TRUE,

    'block_current_namenew' => TRUE,
    'block_current_surnamenew' => TRUE,
    'block_current_surnamenew_justification' => TRUE,

    'block_current_content' => TRUE, 

#    'block_name_list_order_new_string' => TRUE,
#    'block_name_list_order_new_justification' => TRUE,

    'block_name_list_reorder_action_la' => TRUE,

    'block_next_name' => TRUE,
    'block_next_surname' => TRUE,

    'block_new_name' => TRUE,
    'block_new_surname' => TRUE,

    'block_previous_name' => TRUE,
    'block_previous_surname' => TRUE,

    'block_previous_sha1' => TRUE, 

    'command_action' => TRUE, 
    'command_argument' => TRUE, 

    'entry_current_name' => TRUE,
    'entry_current_surname' => TRUE,

    'entry_current_namenew' => TRUE,
    'entry_current_namenew_justification' => TRUE,
    'entry_current_surnamenew' => TRUE,
    'entry_current_typenew' => TRUE,

    'entry_new_name' => TRUE,
    'entry_new_surname' => TRUE,
    'entry_new_type' => TRUE,

    'item_next_content' => TRUE,
    'item_next_justification' => TRUE,

    'item_new_content' => TRUE,
    'item_new_justification' => TRUE,

    'item_new_content' => TRUE,

    'item_new_name' => TRUE,
    'item_new_surname' => TRUE,

    'item_next_name' => TRUE,
    'item_next_surname' => TRUE,

    'item_current_content' => TRUE,  
    'item_current_justification' => TRUE, 
    'item_previous_content' => TRUE,

    'surname_of_name_without_surname' => TRUE,
    'entry_type_of_entry_name_without_entry_type' => TRUE,
);

$_SESSION['is_read_entity_name'] = array (
    'block_name_list_order_current_string' => TRUE,
    'surname_catalog' => TRUE,
    'entry_type_catalog' => TRUE,
    'entry_fullnameofdirectory_array' => TRUE,
);

$_SESSION['entry_current_renamed'] = array ();

$_SESSION['creation_step_count'] = 0;
$_SESSION['creation_step'] = array () ; /* of any entity or page */
$_SESSION['data_creation_function'] = array ();
$_SESSION['leaf_creation_function'] = array ();

$_SESSION['get_value_by_get_key_hash'] = array ();

$_SESSION['entry_current_name_last'] = 'NO_SELECTION_DONE_YET';

/* $_SESSION['module_wheretoact_nameoffile']['entry_current_name'] = $nam_mod_act; */
/* $_SESSION['module_wheretoact_nameoffile'][$nam_sel] = $nam_mod_act; */
$_SESSION['module_wheretoact_nameoffile'] = array (); 

$_SESSION['module_wheretoget_value_nameoffile'] = array ();
$_SESSION['link_to_return'] = array ();

$_SESSION['removed_irp_keys_array'] = array ();
$_SESSION['father_n_son_stack_entity'] = array ();
$_SESSION['father_n_son_stack_module'] = array ();
$_SESSION['father_n_son_stack_script'] = array ();

$_SESSION['irp_register'] = array ();
$_SESSION['irp_stack'] = array ();

$_SESSION['item_information_metadata_en_by_item_name_array'] = array ();

include "language_translate_hash.php";

$_SESSION['language_translate_hash'] = $language_translate_hash;

$_SESSION['parameters']['absolute_path_rcar'] = $roo_doc . '/rcar';

$_SESSION['parameters']['absolute_path_server'] = $roo_doc . '/rcar/server';

/* surnames */
$_SESSION['parameters']['relative_path_server_surname'] = '/rcar/server/SURNAMES';
$_SESSION['parameters']['absolute_path_server_surname'] = $roo_doc . '/rcar/server/SURNAMES';
$_SESSION['parameters']['nameoffile_surname_catalog'] = 'Surname_catalog.cat';
$_SESSION['parameters']['absolute_path_server_surname_catalog'] = $_SESSION['parameters']['absolute_path_server_surname'] . '/' . $_SESSION['parameters']['nameoffile_surname_catalog'];

/* entry_types */
$_SESSION['parameters']['relative_path_server_entry_type'] = '/rcar/server/ENTRY_TYPES';
$_SESSION['parameters']['absolute_path_server_entry_type'] = $roo_doc . '/rcar/server/ENTRY_TYPES';
$_SESSION['parameters']['nameoffile_entry_type_catalog'] = 'Entry_type_catalog.cat';
$_SESSION['parameters']['absolute_path_server_entry_type_catalog'] = $_SESSION['parameters']['absolute_path_server_entry_type'] . '/' . $_SESSION['parameters']['nameoffile_entry_type_catalog'];

$_SESSION['entry_type_array'] = array (
    'general will',
    'header',  
    'concept', 
    'blockchain',
    'miscellaneous',
);

$_SESSION['item_any_justification_array'] = array (
    'orthograph',
    'grammar',
    'clarification',
);

$_SESSION['item_new_justification_array'] = array (
    'definition',
    'grievance',
    'genesis',
    'issue',
);

$_SESSION['item_next_justification_hash'] = array (
    'restricted grievance' => "1",
    'simplification' => "2",
    'generalization' => "3",
    'ambiguity' => "4",
    'precision' => "4",
    'divergency' => "5",
    'assertion' => "6",
    'formalized assertion' => "7",
);

$_SESSION['parameters']['absolute_path_source'] = $roo_doc . '/rcar/php';

$_SESSION['parameters']['relative_path_server'] = '/rcar/server';
$_SESSION['parameters']['relative_path_source'] = '/rcar/php';
$_SESSION['parameters']['relative_path_source_images'] = '/rcar/php/IMAGES';

$_SESSION['parameters']['extension_action_log_filename'] = 'log';
$_SESSION['parameters']['extension_block_filename'] = 'blo';
$_SESSION['parameters']['extension_block_name_list_order_filename'] = 'lis';
$_SESSION['parameters']['extension_item_comment_filename'] = 'com';
$_SESSION['parameters']['extension_surname_nameoffile'] = 'sur';

$_SESSION['parameters']['glue'] = ' '; /* explode implode */

$_SESSION['parameters']['html_input_text_size'] = 44;
$_SESSION['parameters']['html_textarea_rows'] = 2;
$_SESSION['parameters']['html_textarea_cols'] = 50;

$_SESSION['parameters']['irp_nondata_storage_is_enabled'] = TRUE;

$_SESSION['parameters']['language'] = 'fr';
$_SESSION['parameters']['printed_html_string_max_size'] = 200;
$_SESSION['parameters']['program_name'] = 'rcar';

$_SESSION['parameters']['select_size'] = 20;

$_SESSION['parameters']['stack_function_called_array'] = array ();
array_push ($_SESSION['parameters']['stack_function_called_array'], "UP");
array_push ($_SESSION['parameters']['stack_function_called_array'], "TOP");

$_SESSION['parameters']['irp_path_step_number_maximum'] = 50;

$_SESSION['parameters']['stack_function_level_maximum'] = 250;
$_SESSION['parameters']['stack_function_level_dot_list'] = $points;

$_SESSION['parameters']['version_number'] = "1.00";
$_SESSION['parameters']['version_title'] = 'Blockchain & Git';
$_SESSION['parameters']['www_filename_css'] = 'CSS/style.css';

$_SESSION['time_start'] = microtime (TRUE);

$program_name = $_SESSION['parameters']['program_name'];
$Program_name = ucfirst ($program_name);

$nof_deb = "$Program_name.deb";
$_SESSION['debug_nameoffile'] = $nof_deb;

$nof_log = "$Program_name.log";
$_SESSION['log_nameoffile'] = $nof_log;

?>