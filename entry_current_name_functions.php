<?php

require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

$Documentation[$module]['entry_current_name'] = "is a directory name of php_server. i.e. any string expressed in the current language transformed in a Capitalized word, with blank transformed in underscores, without any accents.";
$Documentation[$module]['entry_kind'] = "is a lower case word expressed in english. Ex.: text";
$Documentation[$module]['entry_block_kind'] = "is a lower case word expressed in english. Ex.: paragraph";

entering_in_module ($module);

function entry_current_surname_from_entry_current_name_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
  
  $nam_ent_cur = irp_provide ('entry_current_name', $here);
  $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here);
  $sur_ent_cur = surname_of_name_of_surname_by_name_hash ($nam_ent_cur, $sur_by_nam_h);
  
  exiting_from_function ($here . " with \$sur_ent_cur >$sur_ent_cur<");
  return $sur_ent_cur;
}

function entry_current_namenew_from_entry_current_surnamenew_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

    if (irp_is_stored_of_irp_key ('entry_current_surnamenew', $here)) {  
        $new_sur_ent_cur = irp_provide ('entry_current_surnamenew', $here);  
        $new_nam_ent_cur = word_name_capitalized_of_string_surname ($new_sur_ent_cur);
    }
    else {
/* Improve this code is not used */    

        $new_nam_ent_cur = get_hash_retrieve_value_of_get_key_of_where ('entry_current_namenew', $here);
        print_fatal_error ($here,
        "entity >entry_current_namenew< were NOT retrieved from \$_GET",
        "it is",
        "Check why");
    }

    string_check_entry_name_of_string ($new_nam_ent_cur);

    exiting_from_function ($here . " with \$new_nam_ent_cur >$new_nam_ent_cur<");
    return $new_nam_ent_cur;
}

function entry_current_name_last_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

    if (isset ($_SESSION['get_value_by_get_key_hash']['entry_current_name'] ) ) {
        $nam_ent_las = $_SESSION['get_value_by_get_key_hash']['entry_current_name'];
        debug_n_check ($here, '$nam_ent_las', $nam_ent_las);
    }
    else {
        $nam_ent_las = 'NO_SELECTION_DONE_YET';
    }
    
    $entity_leaf = 'entry_current_name_last';
    $_SESSION['leaf_creation_function'][$entity_leaf] = $here;
    $_SESSION['creation_step_count'] = $_SESSION['creation_step_count'] + 1;
    $cre_ste = $_SESSION['creation_step_count'];
    $log_str = "step # $cre_ste created from $here";
    file_log_write ($here, $log_str);
    $_SESSION['creation_step'][$entity_leaf] = $cre_ste;

    father_n_son_stack_entity_push_of_father_of_son ($entity_leaf, "LEAF_$entity_leaf");

    $log_str = "LEAF >$entity_leaf< built with value >$nam_ent_las< in $here at creation step # $cre_ste";
    file_log_write ($here, $log_str);

    exiting_from_function ($here . " with \$nam_ent_las >$nam_ent_las<");
    return $nam_ent_las;
}

exiting_from_module ($module);

?>
