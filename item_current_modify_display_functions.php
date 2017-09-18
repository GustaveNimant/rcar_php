<?php
require_once "common_html_functions.php";
require_once "irp_functions.php";

$module = module_name (__FILE__);

$Documentation[$module]['what for'] = "to display the form page where one can modify the current item";

# entering_in_module ($module);

function item_current_modify_display_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);

    $nam_ent = irp_provide ('entry_name', $here);
    $nam_blo_cur = irp_provide ('block_current_name', $here);

    $html_str  = a_href_of_entry_name_of_script_nameoffile_of_block_current_name_of_en_action ($nam_ent, 'item_current_modify_form.php', $nam_blo_cur, 'modify');

    debug_n_check ($here , '$html_str', $html_str);
    exiting_from_function ($here);

    return $html_str;
}

# exiting_from_module ($module);

?>