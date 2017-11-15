<?php

require_once "block_name_list_order_library.php";
require_once "entry_library.php";
require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is a string as a list of block names separated by a blank";
$Documentation[$module]['remark'] = "the order of the block names is defined by the user";

entering_in_module ($module);

function block_name_list_order_current_XXX_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $nam_ent_cur = irp_provide ('entry_current_name', $here);
    $fnd_ent_cur = entry_subdirectory_name_of_entry_name ($nam_ent_cur);
    
    if (file_directory_is_empty_of_directory_path ($fnd_ent_cur) ){
        $mest = "Entry Directory >$fnd_ent_cur< is empty";
        $log_str = "Throw new Exception with message : $mest";
        file_log_write ($here, $log_str);
        
        exiting_from_function ($here . ' with Exception ' . $mest); 
        throw new Exception ($mest);
    }
    
    $fno_nam_blo_lis = block_name_list_order_fullnameoffile_of_entry_name ($nam_ent_cur);
    debug_n_check ($here , '$fno_nam_blo_lis', $fno_nam_blo_lis);
    
    if (file_exists ($fno_nam_blo_lis)) {
        
        $nam_blo_lis = block_name_list_order_read_of_entry_name ($nam_ent_cur);  

    } else {
        print_fatal_error ($here,
        "$fno_nam_blo_lis exist",
        "it does NOT",
        "this module is obsolete");
    }
    
    # debug_n_check ($here , '$nof_blo_a', $nof_blo_a);
    
    $nam_blo_a = array_map ("file_cut_dotted_3c_extension_of_nameoffile", $nof_blo_a);
    check_is_array_unique_of_what_of_array ('block_name_list_order_current', $nam_blo_a);
    $nam_blo_lis = block_name_list_order_of_block_name_list_order_current ($nam_blo_a);

    $entity = entity_name_of_build_function_name ($here);
    father_n_son_stack_entity_push_of_father_of_son ($entity, 'READ_block_name_list_order');
    
    debug ($here , '$nam_blo_lis', $nam_blo_lis);
    exiting_from_function ($here . " ('$nam_blo_lis', $nam_blo_lis)");
    
    return $nam_blo_lis;
}

exiting_from_module ($module);

?>