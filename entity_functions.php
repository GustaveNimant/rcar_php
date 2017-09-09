<?php

require_once "management_functions.php";
require_once "item_functions.php";
require_once "entry_display_functions.php";

$module = "entity_functions";
$Documentation[$module]['entity'] = "is an entry, an item";
$Documentation[$module]['entity_kind'] = "either 'entry' or 'item'";

# entering_in_module ($module);

function entity_is_entry_of_entity_name_of_entry_name_array ($nam_ety, $nam_ent_a) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($nam_ety, \$nam_ent_a");
    
    $boo = in_array ($nam_ety, $nam_ent_a);

    debug_n_check ($here , '$boo', $boo);
    exiting_from_function ($here);
    
    return $boo;
}

function entity_is_item_of_entity_name_of_item_name_array ($nam_ety, $nam_ite_a) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($nam_ety, \$nam_ite_a");
    
    $boo = in_array ($nam_ety, $nam_ite_a);

    debug_n_check ($here , '$boo', $boo);
    exiting_from_function ($here);
    
    return $boo;
}

function entity_kind_of_entity_name_of_entry_name_array_of_item_name_array ($nam_ety, $nam_ent_a, $nam_ite_a) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($nam_ety, \$nam_ent_a, \$nam_ite_a");
    
    if (entity_is_item_of_entity_name_of_item_name_array ($nam_ety, $nam_ite_a)) {
        $kin_ety = 'item';
    }
    else if (entity_is_entry_of_entity_name_of_entry_name_array ($nam_ety, $nam_ent_a) ) {
        $kin_ety = 'entry';
    }
    else {
        print_fatal_error ($here,
        "entity kind for entity name >$nam_ety< were \"item\" or \"entry\"",
        "none",
        "Check"
        );
    }

    debug_n_check ($here , '$kin_ety', $kin_ety);
    exiting_from_function ($here);
    
    return $kin_ety;
}


# exiting_from_module ($module);

?>
