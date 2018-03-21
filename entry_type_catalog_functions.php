<?php

require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is a string as a list of name:entry_type separated by \\n";
$Documentation[$module]['what for'] = "to fill file Entry_type_catalog.cat";

entering_in_module ($module);

function entry_type_catalog_fullnameoffile_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $fno_typ_ent = $_SESSION['parameters']['absolute_path_server_entry_type_catalog'];
    $entity = entity_name_of_build_function_name ($here);
    father_n_son_stack_entity_push_of_father_of_son ($entity, "READ_$entity");
    
    debug_n_check ($here , '$fno_typ_ent', $fno_typ_ent);
    exiting_from_function ($here);
    
    return $fno_typ_ent;
}

function entry_type_catalog_update_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $fno_typ_ent = irp_provide ('entry_type_catalog_fullnameoffile', $here);
    $typ_ent_cat_unu = file_content_read_of_fullnameoffile ($fno_typ_ent);
    
    $nam_ent_a = irp_provide ('entry_name_array', $here);
/* update catalog */
    $typ_ent_cat_u = entry_type_catalog_updated_of_entry_name_array_of_entry_type_catalog_unupdated ($nam_ent_a, $typ_ent_cat_unu); 
    debug_n_check ($here, '$typ_ent_cat_u', $typ_ent_cat_u);
    
    exiting_from_function ($here);
    
    return $typ_ent_cat_u;
}

function entry_type_catalog_build () { /* may need some cleaning */
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $fno_typ_ent = irp_provide ('entry_type_catalog_fullnameoffile', $here);

    if (file_is_empty_of_fullnameoffile ($fno_typ_ent)) {
        $typ_ent_cat = "EMPTY_ENTRY_TYPE_CATALOG";
    } 
    else {
/* entry_type_catalog should be synchronized with entry_name_array */
/* ici check that file is uptodate */
#        $typ_ent_cat = irp_provide ('entry_type_catalog_update', $here);
        $typ_ent_cat_unu = file_content_read_of_fullnameoffile ($fno_typ_ent);
        $nam_ent_a = irp_provide ('entry_name_array', $here);
        $typ_ent_cat = entry_type_catalog_updated_of_entry_name_array_of_entry_type_catalog_unupdated ($nam_ent_a, $typ_ent_cat_unu);
        
    }
    debug_n_check ($here , '$typ_ent_cat', ">$typ_ent_cat<");
    
    exiting_from_function ($here);
    
    return $typ_ent_cat;
}

exiting_from_module ($module);

?>