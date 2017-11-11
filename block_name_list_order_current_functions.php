<?php

require_once "block_name_list_order_library.php";
require_once "entry_library.php";
require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is a string as a list of block names separated by a blank";
$Documentation[$module]['remark'] = "the order of the block names is defined by the user";

entering_in_module ($module);

function block_name_list_order_current_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $nam_ent = irp_provide ('entry_current_name', $here);
    $fnd_ent = entry_subdirectory_name_of_entry_name ($nam_ent);
    
    if (file_directory_is_empty_of_directory_path ($fnd_ent) ){
        $mest = "Entry Directory >$fnd_ent< is empty";
        $log_str = "Throw new Exception with message : $mest";
        file_log_write ($here, $log_str);
        
        exiting_from_function ($here . ' with Exception ' . $mest); 
        throw new Exception ($mest);
    }
    
    $fno_cat = block_name_list_order_fullnameoffile_of_entry_name ($nam_ent);
    debug_n_check ($here , '$fno_cat', $fno_cat);
    
    if (file_exists ($fno_cat)) {
        
        $cat_blo = block_name_list_order_read_of_entry_name ($nam_ent);  
        
    } else {
        print_fatal_error ($here,
        "$fno_cat exist",
        "it does NOT",
        "this module is obsolete");
    }
    
    # debug_n_check ($here , '$nof_blo_a', $nof_blo_a);
    
    $nam_blo_a = array_map ("file_cut_dotted_3c_extension_of_nameoffile", $nof_blo_a);
    check_is_array_unique_of_what_of_array ('block_current_name_ordered_array', $nam_blo_a);
    $cat_blo = block_name_list_order_of_block_current_name_ordered_array ($nam_blo_a);
    

    $entity = entity_name_of_build_function_name ($here);
    father_n_son_stack_entity_push_of_father_of_son ($entity, "READ_$entity");
    
    debug ($here , '$cat_blo', $cat_blo);
    exiting_from_function ($here . " ('$cat_blo', $cat_blo)");
    
    return $cat_blo;
}

exiting_from_module ($module);

?>